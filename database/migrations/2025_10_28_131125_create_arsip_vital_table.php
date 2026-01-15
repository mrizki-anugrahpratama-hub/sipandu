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
        // 1. BAGIAN UTAMA: Membuat Tabel Arsip Vital
        Schema::create('arsip_vitals', function (Blueprint $table) {
            $table->id();
            $table->string('asal_arsip');
            $table->string('nomor_berkas');
            $table->string('kode_klasifikasi');
            $table->string('jenis_series_arsip');
            $table->text('isi_berkas');
            $table->string('bulan_tahun');
            $table->integer('jumlah_satuan');
            $table->enum('klasifikasi_keamanan', ['Sangat Rahasia', 'Rahasia', 'Terbatas', 'Biasa']);
            $table->text('keterangan')->nullable();
            $table->string('retensi_arsip_vital');
            $table->string('lokasi_simpan');
            $table->string('metode_perlindungan');
            $table->text('keterangan_tambahan')->nullable();
            
            // Kolom Baru
            $table->string('bidang')->nullable();
            $table->string('kondisi_arsip')->nullable();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('arsip_vitals');
    }
};