<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('arsip_inaktif', function (Blueprint $table) {
            $table->id();
            
            // === DATA UTAMA ===
            $table->string('nomor_box')->nullable()->comment('Diisi setelah arsip dipindahkan');
            $table->string('kode_klasifikasi');
            $table->string('nomor_berkas');
            $table->text('uraian');
            $table->string('index')->nullable();
            $table->string('kurun_waktu');
            $table->integer('jumlah'); 

            // === STATUS & RETENSI ===
            $table->integer('masa_retensi_inaktif')->nullable(); 
            
            // Scheduler akan mengecek kolom ini
            $table->date('tgl_retensi_berakhir')->nullable()->index(); 

            // Rekomendasi JRA (Musnah / Permanen)
            $table->enum('status_akhir', ['Musnah', 'Permanen']);
            
            /** * STATUS PENGOLAHAN (Real-time State)
             * 'inaktif'    = Masa retensi belum habis.
             * 'penyusutan' = Masa retensi habis, menunggu tombol diklik.
             * 'musnah'     = Fisik sudah dimusnahkan (Tombol diklik).
             * 'permanen'   = Disimpan selamanya.
             */
            $table->enum('status_pengolahan', ['inaktif', 'penyusutan', 'musnah', 'permanen'])
                  ->default('inaktif')
                  ->index();

            // === LOG PENCATATAN ===
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Siapa yang memindahkan
            $table->dateTime('tanggal_dipindah')->useCurrent(); // Kapan masuk inaktif
            
            // Nanti otomatis terisi jam & tanggal saat tombol "Musnah" diklik.
            $table->dateTime('tanggal_eksekusi')->nullable();

            // === LAIN-LAIN ===
            $table->string('bidang')->nullable();
            $table->date('tanggal_dibuat')->nullable();
            
            // === KLASIFIKASI (LENGKAP) ===
            $table->enum('klasifikasi_keamanan', ['Terbuka', 'Terbatas', 'Rahasia', 'Sangat rahasia'])->nullable();
            
            // [DITAMBAHKAN] Kolom yang sebelumnya menyebabkan error
            $table->enum('klasifikasi_akses', ['internal dan eksternal', 'Eselon II', 'Eselon III', 'Eselon IV'])->nullable();
            
            // [DITAMBAHKAN] Kolom tingkat perkembangan
            $table->enum('tingkat_perkembangan', ['Asli', 'Fotokopi'])->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('arsip_inaktif');
    }
};