<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Perbaikan skema: Memastikan kolom 'status' bisa menerima semua nilai yang dibutuhkan, termasuk 'inaktif' dan 'vital'.
        Schema::table('arsip_aktif', function (Blueprint $table) {
            // Daftar lengkap status yang digunakan dalam sistem (aktif, inaktif, musnah, permanen, vital)
            $table->enum('status', ['aktif', 'inaktif', 'musnah', 'permanen', 'vital'])->default('aktif')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Rollback: Kembalikan definisi kolom status ke yang lebih terbatas (misal, tanpa 'inaktif' dan 'vital')
        Schema::table('arsip_aktif', function (Blueprint $table) {
            // Ini adalah contoh rollback, kembalikan ke ENUM yang paling mendekati definisi awal Anda
            $table->enum('status', ['aktif', 'lainnya'])->change(); 
        });
    }
};