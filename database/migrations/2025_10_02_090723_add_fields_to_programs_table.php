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
    Schema::table('programs', function (Blueprint $table) {
        if (!Schema::hasColumn('programs', 'jenis')) {
            $table->string('jenis')->nullable();
        }
        if (!Schema::hasColumn('programs', 'mitra')) {
            $table->string('mitra')->nullable();
        }
        if (!Schema::hasColumn('programs', 'jangka_waktu')) {
            $table->string('jangka_waktu')->nullable();
        }
        if (!Schema::hasColumn('programs', 'tanggal_mulai')) {
            $table->date('tanggal_mulai')->nullable();
        }
        if (!Schema::hasColumn('programs', 'tanggal_selesai')) {
            $table->date('tanggal_selesai')->nullable();
        }
        if (!Schema::hasColumn('programs', 'tingkat')) {
            $table->string('tingkat')->nullable();
        }
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            //
        });
    }
};
