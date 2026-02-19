<?php

namespace App\Imports;

use App\Models\Program;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\Importable;

class ProgramImport implements ToModel, WithHeadingRow, SkipsOnError, SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

    public function model(array $row)
    {
        $judul = $row['judul'] ?? $row['Judul'] ?? $row['JUDUL'] ?? null;
        
        // Cek apakah judul sudah ada di database
        if ($judul && Program::where('judul', $judul)->exists()) {
            // Skip row ini jika judul sudah ada
            return null;
        }

        return new Program([
            'tahun'    => $row['tahun'] ?? $row['Tahun'] ?? $row['TAHUN'] ?? null,
            'kategori' => $row['kategori'] ?? $row['Kategori'] ?? $row['KATEGORI'] ?? null,
            'skema'    => $row['skema'] ?? $row['Skema'] ?? $row['SKEMA'] ?? null,
            'judul'    => $judul,
            'ketua'    => $row['ketua'] ?? $row['Ketua'] ?? $row['KETUA'] ?? null,
            'anggota'  => $row['anggota'] ?? $row['Anggota'] ?? $row['ANGGOTA'] ?? null,
            'dana'     => isset($row['dana']) 
                            ? (int) preg_replace('/\D/', '', $row['dana']) 
                            : (isset($row['Dana']) ? (int) preg_replace('/\D/', '', $row['Dana']) : 0),
                            
        ]);
    }
}



