<?php
// app/Models/ProgramKerjasama.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKerjasama extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti konvensi penamaan
    protected $table = 'program_kerjasama';

    // Tentukan kolom yang bisa diisi (fillable)
    protected $fillable = [
        'tingkat',
        'mitra_kerjasama',
        'tahun',
        'jangka_waktu',
        'tanggal_mulai',
        'tanggal_selesai',
        'file_path',
    ];

    // Tentukan kolom yang tidak bisa diisi (guarded), jika perlu
    // protected $guarded = ['id'];
}
