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
        // Menggunakan Schema::create karena ini adalah file migrasi pembuatan tabel
        Schema::create('arsip_aktif', function (Blueprint $table) {
            $table->id();
            $table->string('kode_klasifikasi', 100);
            $table->string('nomor_berkas');
            $table->text('uraian');
            $table->string('index')->nullable();
            $table->string('kurun_waktu', 50);
            $table->integer('jumlah');

            // --- KOLOM RETENSI (Integer) ---
            $table->integer('masa_retensi_aktif')->comment('Retensi aktif dalam hitungan TAHUN');
            $table->integer('masa_retensi_inaktif')->comment('Retensi inaktif dalam hitungan TAHUN');

            // --- KOLOM KLASIFIKASI & OTOMASI ---
            $table->enum('status_akhir', ['Musnah', 'Permanen'])->nullable();
            $table->enum('klasifikasi_keamanan', ['Terbuka', 'Terbatas', 'Rahasia', 'Sangat rahasia'])->nullable();
            $table->enum('klasifikasi_akses', ['internal dan eksternal', 'Eselon II', 'Eselon III', 'Eselon IV'])->nullable();
            $table->enum('tingkat_perkembangan', ['Asli', 'Fotokopi'])->nullable();
            
            // Kolom Keterangan (untuk input manual)
            $table->text('keterangan')->nullable(); 

            // Kolom Status (untuk otomasi perpindahan/penyusutan)
            $table->enum('status', ['Aktif', 'Siap Inaktif', 'Siap Musnah', 'Siap Permanen'])->default('Aktif')->index();
            
            // Kolom Tanggal Pindah/Susut (untuk otomasi)
            $table->date('moved_date')->nullable()->comment('Tanggal arsip diflag siap pindah/susut otomatis');

            // --- KOLOM HUBUNGAN & TANGGAL ---
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('bidang', 100)->nullable()->index();
            
            /**
             * Tanggal Berkas (Patokan hitungan, harus ada)
             */
            $table->date('tanggal_dibuat')->default(now());
            
            $table->timestamps();

            // Constraint unik untuk mencegah duplikasi arsip
            $table->unique(
                ['kode_klasifikasi', 'kurun_waktu', 'bidang', 'nomor_berkas'], 
                'arsip_unik_constraint'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsip_aktif');
    }
};