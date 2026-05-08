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
            $table->string('bidang');      // Pelaku (Siapa yang mengubah)
            $table->string('data_bidang'); // [BARU] Target (Data milik bidang mana)
            $table->string('aksi');
            $table->string('modul');
            $table->text('deskripsi'); 
            $table->json('perubahan')->nullable();
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
