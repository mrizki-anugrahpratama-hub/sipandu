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
        Schema::table('file_arsips', function (Blueprint $table) {
            // Tambahkan kode_klasifikasi yang tadi protes
            if (!Schema::hasColumn('file_arsips', 'kode_klasifikasi')) {
                $table->string('kode_klasifikasi')->nullable()->after('arsip_aktif_id');
            }
            
            if (!Schema::hasColumn('file_arsips', 'nomor_item')) {
                $table->string('nomor_item')->nullable()->after('arsip_aktif_id');
            }

            if (!Schema::hasColumn('file_arsips', 'satuan')) {
                $table->string('satuan')->default('Lembar')->after('jumlah');
            }

            if (!Schema::hasColumn('file_arsips', 'status_keaslian')) {
                $table->string('status_keaslian')->nullable()->after('tingkat_perkembangan');
            }
        });
    }
        

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
