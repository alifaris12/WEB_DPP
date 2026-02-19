<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Program extends Model
{
    use HasFactory;

    protected $table = 'programs';
    public $timestamps = true;

    protected $fillable = [
        'tahun',
        'kategori',
        'skema',
        'judul',
        'ketua',
        'anggota',
        'dana',
        'file_path',
    ];

    // Accessor untuk mendapatkan URL file
    public function getFileUrlAttribute()
    {
        if ($this->file_path) {
            return Storage::url($this->file_path);
        }
        return null;
    }

    // Method untuk hapus file
    public function deleteFile()
    {
        if ($this->file_path && Storage::disk('public')->exists($this->file_path)) {
            return Storage::disk('public')->delete($this->file_path);
        }
        return false;
    }

    // Event listener untuk auto-delete file saat model dihapus
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($program) {
            $program->deleteFile();
        });
    }
}