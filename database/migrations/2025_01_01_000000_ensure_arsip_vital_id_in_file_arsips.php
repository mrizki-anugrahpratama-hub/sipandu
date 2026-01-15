<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Migrasi ini berjalan TERAKHIR untuk menjamin tabel file_arsips sudah ada
        if (Schema::hasTable('file_arsips')) {
            Schema::table('file_arsips', function (Blueprint $table) {
                // Hanya buat jika kolom benar-benar belum ada
                if (!Schema::hasColumn('file_arsips', 'arsip_vital_id')) {
                    $table->foreignId('arsip_vital_id')
                          ->nullable()
                          ->after('id')
                          ->constrained('arsip_vitals') // Pastikan tabel arsip_vitals juga sudah ada
                          ->cascadeOnDelete();
                }
            });
        }
    }

    public function down()
    {
        if (Schema::hasTable('file_arsips')) {
             Schema::table('file_arsips', function (Blueprint $table) {
                if (Schema::hasColumn('file_arsips', 'arsip_vital_id')) {
                    $table->dropForeign(['arsip_vital_id']);
                    $table->dropColumn('arsip_vital_id');
                }
            });
        }
    }
};