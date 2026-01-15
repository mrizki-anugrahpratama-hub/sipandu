<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // [DIHAPUS] Bagian ini bentrok karena 'arsip_aktif' sudah punya kolom 'bidang'
        // Schema::table('arsip_aktif', function (Blueprint $table) {
        //     $table->string('bidang')->nullable()->after('user_id');
        // });

        // Tambahkan kolom bidang ke tabel arsip_inaktif (INI TETAP DIJALANKAN)
        Schema::table('arsip_inaktif', function (Blueprint $table) {
            // [PERBAIKAN] Cek dulu jika kolom belum ada
            if (!Schema::hasColumn('arsip_inaktif', 'bidang')) {
                $table->string('bidang')->nullable()->after('user_id');
            }
        });

        // Tambahkan kolom bidang ke tabel arsip_vital (INI TETAP DIJALANKAN)
        Schema::table('arsip_vital', function (Blueprint $table) {
            // [PERBAIKAN] Cek dulu jika kolom belum ada
            if (!Schema::hasColumn('arsip_vital', 'bidang')) {
                $table->string('bidang')->nullable()->after('user_id');
            }
        });

        // [DIHAPUS] Bagian ini bentrok karena 'arsip_aktif' sudah di-handle
        // DB::statement('
        //     UPDATE arsip_aktif 
        //     JOIN users ON arsip_aktif.user_id = users.id 
        //     SET arsip_aktif.bidang = users.role
        // ');

        // Update data yang sudah ada - (INI TETAP DIJALANKAN)
        DB::statement('
            UPDATE arsip_inaktif 
            JOIN users ON arsip_inaktif.user_id = users.id 
            SET arsip_inaktif.bidang = users.role
            WHERE arsip_inaktif.bidang IS NULL
        ');

        DB::statement('
            UPDATE arsip_vital 
            JOIN users ON arsip_vital.user_id = users.id 
            SET arsip_vital.bidang = users.role
            WHERE arsip_vital.bidang IS NULL
        ');
    }

    public function down()
    {
        // [DIHAPUS] Bagian ini bentrok
        // Schema::table('arsip_aktif', function (Blueprint $table) {
        //     $table->dropColumn('bidang');
        // });

        Schema::table('arsip_inaktif', function (Blueprint $table) {
            if (Schema::hasColumn('arsip_inaktif', 'bidang')) {
                $table->dropColumn('bidang');
            }
        });

        Schema::table('arsip_vital', function (Blueprint $table) {
            if (Schema::hasColumn('arsip_vital', 'bidang')) {
                $table->dropColumn('bidang');
            }
        });
    }
};