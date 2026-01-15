<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('recycle_bin', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_arsip'); // aktif, inaktif, vital
            $table->json('data_arsip'); // Menyimpan data arsip dalam format JSON
            $table->date('deleted_at_date');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recycle_bin');
    }
};