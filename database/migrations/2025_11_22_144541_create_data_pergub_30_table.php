<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data_pergub_30', function (Blueprint $table) {
            $table->id();
            
            // 1. Kunci Pencarian
            $table->string('kode_klasifikasi')->unique(); // Contoh: 001.1
            
            // 2. Data Autofill & Deskripsi
            // [PERBAIKAN UTAMA] Mengubah 'string' menjadi 'text'
            // Alasannya: Data 'index' di seeder Anda ada yang sangat panjang (>255 karakter).
            // Jika tetap pakai string, akan error "Data too long".
            $table->text('index')->nullable(); 
            
            $table->string('retensi_aktif')->nullable();  // Contoh: 2 Tahun
            $table->string('retensi_inaktif')->nullable();// Contoh: 5 Tahun
            $table->string('status_akhir')->nullable();   // Contoh: Permanen

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_pergub_30');
    }
};