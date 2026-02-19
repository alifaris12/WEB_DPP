<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('program_kerjasama', function (Blueprint $table) {
            $table->id();
            $table->string('mitra_kerjasama'); // Menambahkan kolom mitra_kerjasama
            $table->year('tahun');
            $table->string('jangka_waktu');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->enum('tingkat', ['nasional', 'internasional']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('program_kerjasama', function (Blueprint $table) {
            $table->dropColumn('mitra_kerjasama'); // Hapus hanya kolom mitra_kerjasama jika rollback
        });
    }
};
