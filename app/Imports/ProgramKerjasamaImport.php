<?php

namespace App\Imports;

use App\Models\ProgramKerjasama;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\Importable;
use Carbon\Carbon;

class ProgramKerjasamaImport implements ToModel, WithHeadingRow, SkipsOnError, SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

    public function model(array $row)
    {

        $mitra = $this->getValue($row, ['mitra_kerjasama', 'Mitra Kerjasama', 'MITRA_KERJASAMA', 'mitra', 'Mitra', 'MITRA']);
        
        // Cek apakah nama mitra sudah ada di database
        if ($mitra && ProgramKerjasama::where('mitra_kerjasama', $mitra)->exists()) {
            // Skip row ini jika mitra sudah ada
            return null;
        }

        $tahun = $this->getValue($row, ['tahun', 'Tahun', 'TAHUN']);
        $jangkaWaktu = $this->getValue($row, ['jangka_waktu', 'Jangka Waktu', 'JANGKA_WAKTU', 'jangka', 'Jangka', 'JANGKA']);
        $tanggalMulai = $this->getValue($row, ['tanggal_mulai', 'Tanggal Mulai', 'TANGGAL_MULAI', 'mulai', 'Mulai', 'MULAI']);
        $tanggalSelesai = $this->getValue($row, ['tanggal_selesai', 'Tanggal Selesai', 'TANGGAL_SELESAI', 'selesai', 'Selesai', 'SELESAI']);
        $tingkat = $this->getValue($row, ['tingkat', 'Tingkat', 'TINGKAT']);

        // Validasi data wajib
        if (empty($mitra) || empty($tahun) || empty($jangkaWaktu) || empty($tanggalMulai) || empty($tanggalSelesai) || empty($tingkat)) {
            return null; // Skip row jika data tidak lengkap
        }

        // Normalisasi tingkat (nasional/internasional)
        $tingkat = strtolower(trim($tingkat));
        if (!in_array($tingkat, ['nasional', 'internasional'])) {
            $tingkat = 'nasional'; // Default
        }

        // Parse tanggal jika dalam format string
        try {
            $tanggalMulai = $this->parseDate($tanggalMulai);
            $tanggalSelesai = $this->parseDate($tanggalSelesai);
        } catch (\Exception $e) {
            return null; // Skip row jika tanggal tidak valid
        }

        return new ProgramKerjasama([
            'mitra_kerjasama' => $mitra,
            'tahun' => (int) $tahun,
            'jangka_waktu' => $jangkaWaktu,
            'tanggal_mulai' => $tanggalMulai,
            'tanggal_selesai' => $tanggalSelesai,
            'tingkat' => $tingkat,
        ]);
    }

    /**
     * Helper untuk mendapatkan value dari berbagai format key
     */
    private function getValue(array $row, array $keys)
    {
        foreach ($keys as $key) {
            if (isset($row[$key]) && !empty($row[$key])) {
                return $row[$key];
            }
        }
        return null;
    }

    /**
     * Parse tanggal dari berbagai format
     */
    private function parseDate($date)
    {
        if (empty($date)) {
            throw new \Exception("Date is empty");
        }

        // Jika sudah format Y-m-d, langsung return
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
            return $date;
        }

        // Jika numeric, mungkin Excel date serial number
        if (is_numeric($date)) {
            try {
                return \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date)->format('Y-m-d');
            } catch (\Exception $e) {
                // Jika gagal, coba parse sebagai timestamp
                return date('Y-m-d', (int) $date);
            }
        }

        // Coba parse dengan Carbon
        try {
            return Carbon::parse($date)->format('Y-m-d');
        } catch (\Exception $e) {
            throw new \Exception("Invalid date format: {$date}");
        }
    }
}

