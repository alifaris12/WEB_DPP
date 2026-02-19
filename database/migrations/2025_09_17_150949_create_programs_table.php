<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('tahun', 4);
            $table->string('kategori');
            $table->string('skema');
            $table->string('judul');
            $table->string('ketua');
            $table->string('anggota')->nullable();
            $table->unsignedBigInteger('dana');
            $table->timestamps(); // karena kamu pakai orderByDesc('created_at')
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
