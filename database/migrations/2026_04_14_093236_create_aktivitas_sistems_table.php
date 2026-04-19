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
        Schema::create('aktivitas_sistems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('bidang'); // Role/bidang admin saat melakukan aksi
            $table->string('aksi');   // Tambah, Ubah, Hapus
            $table->string('modul');  // Nama tabel (Arsip Aktif, User, dll)
            $table->text('deskripsi'); 
            $table->json('perubahan')->nullable(); // Data lama vs data baru
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aktivitas_sistems');
    }
};
