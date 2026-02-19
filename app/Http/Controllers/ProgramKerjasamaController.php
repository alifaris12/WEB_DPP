<?php

namespace App\Http\Controllers;

use App\Models\ProgramKerjasama;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProgramKerjasamaController extends Controller
{
    public function show($id)
    {
        try {
            $program = ProgramKerjasama::findOrFail($id);

            // Log untuk memastikan data yang diterima
            Log::info('Program Kerjasama:', ['data' => $program]);

            return response()->json([
                'mitra_kerjasama' => $program->mitra_kerjasama,
                'tahun' => $program->tahun,
                'jangka_waktu' => $program->jangka_waktu,
                'tanggal_mulai' => Carbon::parse($program->tanggal_mulai)->format('d-m-Y'),
                'tanggal_selesai' => Carbon::parse($program->tanggal_selesai)->format('d-m-Y'),
                'tingkat' => $program->tingkat,
                'file_path' => $program->file_path
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching program data: ' . $e->getMessage());
            return response()->json(['message' => 'Internal Server Error'], 500);
        }
    }

    public function edit($id)
    {
        $program = ProgramKerjasama::findOrFail($id);

        // Kembalikan data untuk diisi dalam form edit
        return response()->json($program);
    }

    public function update(Request $request, $id)
    {
        $program = ProgramKerjasama::findOrFail($id);

        $validated = $request->validate([
            'mitra_kerjasama' => 'required|string|max:200|unique:program_kerjasama,mitra_kerjasama,' . $id,
            'tahun' => 'required|digits:4',
            'jangka_waktu' => 'required|string|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'tingkat' => 'required|in:nasional,internasional',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:5120',
        ], [
            'mitra_kerjasama.unique' => 'Nama mitra kerjasama sudah pernah diinput sebelumnya.',
            'file.max' => 'Ukuran file maksimal 5MB.',
        ]);

        // Handle file upload
        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($program->file_path && Storage::disk('public')->exists($program->file_path)) {
                Storage::disk('public')->delete($program->file_path);
            }

            // Upload new file
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('kerjasama_files', $fileName, 'public');
            $validated['file_path'] = $filePath;
        }

        $program->update($validated);

        return redirect()->route('daftar.kerjasama.nasional')->with('success', 'Program Kerjasama berhasil diperbarui');
    }

    public function destroy($id)
    {
        $program = ProgramKerjasama::findOrFail($id);
        
        // Delete file if exists
        if ($program->file_path && Storage::disk('public')->exists($program->file_path)) {
            Storage::disk('public')->delete($program->file_path);
        }
        
        $program->delete();

        return redirect()->route('daftar.kerjasama.nasional')
            ->with('success', 'Program Kerjasama berhasil dihapus.');
    }
}