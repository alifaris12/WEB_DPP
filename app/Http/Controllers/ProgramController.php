<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramKerjasama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProgramImport;
use App\Imports\ProgramKerjasamaImport;

class ProgramController extends Controller
{
    /** ====================================================
     * INDEX: Daftar Program Penelitian & Pengabdian
     * ==================================================== */
    public function index(Request $request)
    {
        $query = Program::query();

        if ($request->filled('skema')) {
            $query->where('skema', $request->skema);
        }

        if ($request->filled('tahun')) {
            $query->where('tahun', $request->tahun);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('ketua', 'like', "%{$search}%")
                    ->orWhere('anggota', 'like', "%{$search}%");
            });
        }

        $table = (new Program)->getTable();
        $sortCol = Schema::hasColumn($table, 'created_at') ? 'created_at' : 'id';

        $perPage = $request->filled('per_page') ? (int) $request->per_page : 500;
        $perPage = in_array($perPage, [10, 25, 50, 100, 200, 500]) ? $perPage : 500;

        $programs = $query->orderByDesc($sortCol)->paginate($perPage)->withQueryString();

        $skemas = Program::select('skema')->distinct()->pluck('skema');
        $tahuns = Program::select('tahun')->distinct()->orderByDesc('tahun')->pluck('tahun');

        $chartYearFilter = $request->filled('chart_tahun') ? $request->chart_tahun : null;
        
        $chartQuery = Program::query();
        if ($chartYearFilter) {
            $chartQuery->where('tahun', '<=', $chartYearFilter);
        }
        
        $chartData = $chartQuery->selectRaw('skema, SUM(dana) as total_dana')
            ->groupBy('skema')
            ->orderBy('total_dana', 'desc')
            ->get();

        $view = (Auth::check() && Auth::user()->role === 'user') ? 'user.program-daftar' : 'admin.program-daftar';

        return view($view, compact('programs', 'skemas', 'tahuns', 'chartData', 'chartYearFilter'));
    }

    /** ====================================================
     * STORE: Simpan Program Baru
     * ==================================================== */
    public function store(Request $request)
    { 
        $kategori = strtolower($request->input('kategori', 'penelitian'));

        if ($kategori === 'kerjasama') {
            $validated = $request->validate([
                'mitra_kerjasama' => 'required|string|max:200|unique:program_kerjasama,mitra_kerjasama',
                'tahun'           => 'required|digits:4',
                'jangka_waktu'    => 'required|string|max:100',
                'tanggal_mulai'   => 'required|date',
                'tanggal_selesai' => 'required|date',
                'tingkat'         => 'required|in:nasional,internasional',
                'file'            => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:5120',
            ], [
                'mitra_kerjasama.unique' => 'Nama mitra kerjasama sudah pernah diinput sebelumnya.',
                'file.max' => 'Ukuran file maksimal 5MB.',
            ]);

            // Handle file upload
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('kerjasama_files', $fileName, 'public');
                $validated['file_path'] = $filePath;
            }

            ProgramKerjasama::create($validated);

            return redirect()->route('daftar.kerjasama.nasional')
                ->with('success', 'Program Kerjasama berhasil ditambahkan.');
        }

        $validated = $request->validate([
            'tahun'    => 'required|digits:4',
            'kategori' => 'required|string|max:100',
            'skema'    => 'required|string|max:100',
            'judul'    => 'required|string|max:255|unique:programs,judul',
            'ketua'    => 'required|string|max:100',
            'anggota'  => 'nullable|string|max:255',
            'dana'     => 'required',
            'file'     => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:5120',
        ], [
            'judul.unique' => 'Judul program sudah pernah diinput sebelumnya.',
            'file.max' => 'Ukuran file maksimal 5MB.',
        ]);

        $validated['dana'] = (int) preg_replace('/\D/', '', $request->input('dana'));

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('program_files', $fileName, 'public');
            $validated['file_path'] = $filePath;
        }

        Program::create($validated);

        return redirect()->route('daftar.program')
            ->with('success', 'Program berhasil ditambahkan.');
    }

    /** ====================================================
     * EDIT: Tampilkan Form Edit Program
     * ==================================================== */
    public function edit($id)
    {
        $program = Program::findOrFail($id);
        return view('admin.program-edit', compact('program'));
    }

    /** ====================================================
     * UPDATE: Update Program
     * ==================================================== */
    public function updateProgram(Request $request, $id)
    {
        $program = Program::findOrFail($id);

        $validated = $request->validate([
            'tahun'    => 'required|digits:4',
            'kategori' => 'required|string|max:100',
            'skema'    => 'required|string|max:100',
            'judul'    => 'required|string|max:255|unique:programs,judul,' . $id,
            'ketua'    => 'required|string|max:100',
            'anggota'  => 'nullable|string|max:255',
            'dana'     => 'required',
            'file'     => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:5120',
        ], [
            'judul.unique' => 'Judul program sudah pernah diinput sebelumnya.',
            'file.max' => 'Ukuran file maksimal 5MB.',
        ]);

        $validated['dana'] = (int) preg_replace('/\D/', '', $request->input('dana'));

        // Handle file upload
        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($program->file_path && Storage::disk('public')->exists($program->file_path)) {
                Storage::disk('public')->delete($program->file_path);
            }

            // Upload new file
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('program_files', $fileName, 'public');
            $validated['file_path'] = $filePath;
        }

        $program->update($validated);

        return redirect()->route('daftar.program')
            ->with('success', 'Program berhasil diperbarui.');
    }

    /** ====================================================
     * DESTROY: Hapus Program
     * ==================================================== */
    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        
        // Delete file if exists (akan otomatis terpanggil dari boot method)
        // Tapi kita bisa panggil manual juga untuk memastikan
        if ($program->file_path && Storage::disk('public')->exists($program->file_path)) {
            Storage::disk('public')->delete($program->file_path);
        }
        
        $program->delete();

        return redirect()->route('daftar.program')
            ->with('success', 'Program berhasil dihapus.');
    }
    /** ====================================================
     * INDEX PROGRAM PENELITIAN
     * ==================================================== */
    public function indexPenelitian(Request $request)
    {
        $query = Program::where('kategori', 'penelitian');

        // Filter skema
        if ($request->filled('skema')) {
            $query->where('skema', $request->skema);
        }

        // Filter tahun
        if ($request->filled('tahun')) {
            $query->where('tahun', $request->tahun);
        }

        // Filter pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('ketua', 'like', "%{$search}%")
                    ->orWhere('anggota', 'like', "%{$search}%");
            });
        }

        $programs = $query->orderByDesc('created_at')->paginate(50);

        return view('admin.program-penelitian', compact('programs'));
    }

    /** ====================================================
     * UPDATE: Edit Program Kerjasama
     * ==================================================== */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'mitra_kerjasama' => 'required|string|max:200',
            'tahun' => 'required|digits:4',
            'jangka_waktu' => 'required|string|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'tingkat' => 'required|in:nasional,internasional',
        ]);

        // Cari program kerjasama berdasarkan ID dan lakukan pembaruan
        $programKerjasama = ProgramKerjasama::findOrFail($id);
        $programKerjasama->update($validated);

        // Redirect ke halaman daftar kerjasama nasional
        return redirect()->route('daftar.kerjasama.nasional')
            ->with('success', 'Program Kerjasama berhasil diperbarui.');
    }

    /** ====================================================
     * SHOW: Detail Program (Penelitian dan Pengabdian)
     * ==================================================== */
    public function show(ProgramKerjasama $program)
    {
        return response()->json($program); // Mengirim data dalam format JSON
    }

    /** ====================================================
     * SHOW: Detail Program (nasional dan internasional)
     * ==================================================== */
public function showKerjasama($id)
{
    $programKerjasama = ProgramKerjasama::findOrFail($id);
    return view('admin.program-kerjasama-show', compact('programKerjasama'));
}

    // Halaman untuk edit program kerjasama
public function editKerjasama($id)
{
    $programKerjasama = ProgramKerjasama::findOrFail($id);
    return view('admin.program-kerjasama-edit', compact('programKerjasama'));
}

// Update Program Kerjasama
public function updateKerjasama(Request $request, $id)
{
    $validated = $request->validate([
        'mitra_kerjasama' => 'required|string|max:200',
        'tahun' => 'required|digits:4',
        'jangka_waktu' => 'required|string|max:100',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date',
        'tingkat' => 'required|in:nasional,internasional',
    ]);

    // Cari program kerjasama berdasarkan ID dan lakukan pembaruan
    $programKerjasama = ProgramKerjasama::findOrFail($id);
    $programKerjasama->update($validated);

    // Redirect ke halaman daftar kerjasama nasional
    return redirect()->route('daftar.kerjasama.nasional')
        ->with('success', 'Program Kerjasama berhasil diperbarui.');
}

    /** ====================================================
     * FORM INPUT KERJASAMA
     * ==================================================== */
    public function inputKerjasama()
    {
        return view('admin.program-input-kerjasama');
    }

    /** ====================================================
     * DAFTAR SEMUA PROGRAM KERJASAMA (WITH CHART)
     * ==================================================== */
    public function daftarKerjasama(Request $request)
    {
        // Mengambil data program kerjasama berdasarkan filter yang diterima
        $query = ProgramKerjasama::query();

        if ($request->filled('tingkat')) {
            $query->where('tingkat', $request->tingkat);
        }

        if ($request->filled('tahun')) {
            $query->where('tahun', $request->tahun);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('mitra_kerjasama', 'like', "%{$search}%");
            });
        }

        // Filter untuk user biasa: sembunyikan program yang sudah selesai (tanggal sekarang > tanggal selesai)
        // Admin melihat semua data, user hanya melihat yang belum selesai atau masih aktif
        $isUser = Auth::check() && Auth::user()->role === 'user';
        if ($isUser) {
            // Hanya tampilkan program yang tanggal selesainya >= hari ini (belum selesai)
            // Menggunakan Carbon untuk memastikan perbandingan tanggal yang benar
            $today = Carbon::today()->toDateString();
            $query->whereDate('tanggal_selesai', '>=', $today);
        }

        // Filter jumlah item per halaman
        $perPage = $request->filled('per_page') ? (int) $request->per_page : 10;
        $perPage = in_array($perPage, [10, 25, 50, 100, 200, 500]) ? $perPage : 10;

        // Ambil data dan kirim ke view
        $programKerjasama = $query->orderByDesc('tahun')->paginate($perPage)->withQueryString();

        // Ambil data tahun untuk filter (dari semua data, tidak difilter tanggal untuk dropdown)
        $tahuns = ProgramKerjasama::select('tahun')->distinct()->orderByDesc('tahun')->pluck('tahun');

        // ========================================
        // DATA UNTUK CHART
        // ========================================
        $chartYearFilter = $request->filled('chart_tahun') ? $request->chart_tahun : null;
        
        $chartQuery = ProgramKerjasama::query();
        
        // Filter berdasarkan role user (untuk chart juga)
        if ($isUser) {
            $today = Carbon::today()->toDateString();
            $chartQuery->whereDate('tanggal_selesai', '>=', $today);
        }
        
        // Filter tahun untuk chart (kumulatif sampai tahun tersebut)
        if ($chartYearFilter) {
            $chartQuery->where('tahun', '<=', $chartYearFilter);
        }
        
        // Grouping berdasarkan tingkat dan hitung jumlah program
        $chartData = $chartQuery->selectRaw('tingkat, COUNT(*) as jumlah_program')
            ->groupBy('tingkat')
            ->orderBy('jumlah_program', 'desc')
            ->get();

        // Tentukan view berdasarkan role
        $view = $isUser ? 'user.program-kerjasama' : 'admin.program-nasional';

        // Kirim data ke view
        return view($view, compact('programKerjasama', 'tahuns', 'chartData', 'chartYearFilter'));
    }

    /** ====================================================
     * UPLOAD EXCEL
     * ==================================================== */
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv',
        ]);

        try {
            $import = new ProgramImport;
            Excel::import($import, $request->file('file'));
            
            $skippedCount = count($import->failures());
            
            if ($skippedCount > 0) {
                return redirect()->route('daftar.program')
                    ->with('success', 'Data program berhasil diupload.')
                    ->with('warning', "Catatan: {$skippedCount} baris dilewati karena judul sudah ada di database.");
            }
            
            return redirect()->route('daftar.program')
                ->with('success', 'Data program berhasil diupload.');
        } catch (\Throwable $e) {
            report($e);
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat import: ' . $e->getMessage());
        }
    }

    /** ====================================================
     * FORM UPLOAD EXCEL
     * ==================================================== */
    public function uploadForm()
    {
        return view('admin.program-upload'); // Pastikan ada view di resources/views/admin/program-upload.blade.php
    }

    /** ====================================================
     * TEMPLATE DOWNLOAD
     * ==================================================== */
    public function template()
    {
        $templateDir = public_path('templates');
        $filePath = $templateDir . '/template_program.xlsx';

        if (file_exists($filePath)) {
            return response()->download($filePath, 'Template_Program.xlsx');
        }

        // Jika template tidak ada, buat template sederhana
        return $this->generateTemplateProgram();
    }

    private function generateTemplateProgram()
    {
        try {
            $data = [
                [
                    'Tahun',
                    'Kategori',
                    'Skema',
                    'Judul',
                    'Ketua',
                    'Anggota',
                    'Dana'
                ],
                [
                    '2024',
                    'penelitian',
                    'Penelitian Dasar',
                    'Contoh Judul Penelitian 1',
                    'Dr. Ahmad Suhardi',
                    'Dr. Budi Santoso, M.Kom; Dr. Citra Dewi, M.T',
                    '50000000'
                ],
                [
                    '2024',
                    'pengabdian',
                    'Pengabdian Masyarakat',
                    'Contoh Judul Pengabdian Masyarakat',
                    'Prof. Dedi Rahmat',
                    'Dr. Eko Prasetyo, M.Si; Dr. Fitri Handayani, M.Pd',
                    '30000000'
                ],
            ];

            $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->fromArray($data, null, 'A1');

            // Style header
            $sheet->getStyle('A1:G1')->getFont()->setBold(true);
            $sheet->getStyle('A1:G1')->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setARGB('FF0891B2');
            $sheet->getStyle('A1:G1')->getFont()->getColor()->setARGB('FFFFFFFF');

            // Auto width
            foreach (range('A', 'G') as $col) {
                $sheet->getColumnDimension($col)->setAutoSize(true);
            }

            $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
            $tempFile = tempnam(sys_get_temp_dir(), 'template_program_');
            $writer->save($tempFile);

            return response()->download($tempFile, 'Template_Program.xlsx')->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal membuat template: ' . $e->getMessage());
        }
    }

    /** ====================================================
     * SHOW PROGRAM DETAILS (AJAX)
     * ==================================================== */
    public function getProgramDetails($id)
    {
        $program = Program::find($id);

        if ($program) {
            return response()->json([
                'judul' => $program->judul,
                'ketua' => $program->ketua,
                'tahun' => $program->tahun,
                'jangka_waktu' => $program->jangka_waktu,
                'tanggal_mulai' => $program->tanggal_mulai->format('d-m-Y'),
                'tanggal_selesai' => $program->tanggal_selesai->format('d-m-Y'),
                'tingkat' => $program->tingkat,
            ]);
        }

        return response()->json(['error' => 'Program tidak ditemukan'], 404);
    }

    /** ====================================================
     * DESTROY: Hapus Program Kerjasama
     * ==================================================== */
    public function destroyKerjasama($id)
    {
        $programKerjasama = ProgramKerjasama::findOrFail($id);
        $programKerjasama->delete();

        return redirect()
            ->route('daftar.kerjasama.nasional')
            ->with('success', 'Program Kerjasama berhasil dihapus.');
    }

    /** ====================================================
     * FORM UPLOAD EXCEL KERJASAMA
     * ==================================================== */
    public function uploadKerjasamaForm()
    {
        return view('admin.program-upload-kerjasama');
    }

    /** ====================================================
     * UPLOAD EXCEL KERJASAMA
     * ==================================================== */
    public function uploadKerjasama(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv',
        ]);

        try {
            $import = new ProgramKerjasamaImport;
            Excel::import($import, $request->file('file'));
            
            $skippedCount = count($import->failures());
            
            if ($skippedCount > 0) {
                return redirect()->route('daftar.kerjasama.nasional')
                    ->with('success', 'Data program kerjasama berhasil diupload.')
                    ->with('warning', "Catatan: {$skippedCount} baris dilewati karena nama mitra sudah ada di database.");
            }
            
            return redirect()->route('daftar.kerjasama.nasional')
                ->with('success', 'Data program kerjasama berhasil diupload.');
        } catch (\Throwable $e) {
            report($e);
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat import: ' . $e->getMessage());
        }
    }

    /** ====================================================
     * TEMPLATE DOWNLOAD KERJASAMA
     * ==================================================== */
    public function templateKerjasama()
    {
        $templateDir = public_path('templates');
        $filePath = $templateDir . '/template_kerjasama.xlsx';

        if (file_exists($filePath)) {
            return response()->download($filePath, 'Template_Kerjasama.xlsx');
        }

        // Jika template tidak ada, buat template sederhana
        return $this->generateTemplateKerjasama();
    }

    /** ====================================================
     * GENERATE TEMPLATE KERJASAMA
     * ==================================================== */
    private function generateTemplateKerjasama()
    {
        try {
            $data = [
                [
                    'Mitra Kerjasama',
                    'Tahun',
                    'Jangka Waktu',
                    'Tanggal Mulai',
                    'Tanggal Selesai',
                    'Tingkat'
                ],
                [
                    'Contoh Mitra 1',
                    '2024',
                    '2 Tahun',
                    '2024-01-01',
                    '2025-12-31',
                    'nasional'
                ],
                [
                    'Contoh Mitra 2',
                    '2024',
                    '3 Tahun',
                    '2024-06-01',
                    '2027-05-31',
                    'internasional'
                ],
            ];

            $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->fromArray($data, null, 'A1');

            // Style header
            $sheet->getStyle('A1:F1')->getFont()->setBold(true);
            $sheet->getStyle('A1:F1')->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setARGB('FF0891B2');
            $sheet->getStyle('A1:F1')->getFont()->getColor()->setARGB('FFFFFFFF');

            // Auto width
            foreach (range('A', 'F') as $col) {
                $sheet->getColumnDimension($col)->setAutoSize(true);
            }

            $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
            $tempFile = tempnam(sys_get_temp_dir(), 'template_kerjasama_');
            $writer->save($tempFile);

            return response()->download($tempFile, 'Template_Kerjasama.xlsx')->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal membuat template: ' . $e->getMessage());
        }
    }
}