<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarProgram extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda
    protected $table = 'daftar_program'; // Sesuaikan dengan nama tabel yang benar

    protected $fillable = ['judul_penelitian', 'skema', 'dana', 'tahun'];
}

