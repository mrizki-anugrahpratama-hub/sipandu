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
        Schema::create('data_pergub_26', function (Blueprint $table) {
            $table->id();
            // Lebih spesifik, misal 20 karakter
            $table->string('kode_klasifikasi', 20)->unique(); 
            // Jika deskripsi wajib, hapus nullable()
            $table->string('index', 255); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pergub_26');
    }
};