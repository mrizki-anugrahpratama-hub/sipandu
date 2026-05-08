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
        // Membuat tabel baru bernama 'file_arsips'
        Schema::create('file_arsips', function (Blueprint $table) {
            $table->id();

            // ✅ Foreign Key untuk Arsip Vital (DITAMBAHKAN DI SINI UNTUK FIX)
            // Relasi ini hanya bisa dibuat jika tabel 'arsip_vitals' sudah ada (Migrasi B harus lebih dulu)
            $table->foreignId('arsip_vital_id')
                ->nullable()
                ->constrained('arsip_vitals') 
                ->onDelete('cascade');

            $table->foreignId('arsip_aktif_id')
                ->nullable()
                ->constrained('arsip_aktif') // Asumsi tabel 'arsip_aktif' ada
                ->onDelete('cascade');

            $table->foreignId('arsip_inaktif_id')
                ->nullable()
                ->constrained('arsip_inaktif') // Asumsi tabel 'arsip_inaktif' ada
                ->onDelete('cascade');

            // Data File
            $table->string('uraian');
            $table->date('tanggal_file');
            $table->integer('jumlah')->default(1);
            $table->string('tingkat_perkembangan')->nullable();
            $table->string('nama_file_asli')->nullable();
            $table->string('path_file')->nullable();
            $table->string('tipe_file')->nullable();
            $table->unsignedBigInteger('ukuran_file')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_arsips');
    }
};