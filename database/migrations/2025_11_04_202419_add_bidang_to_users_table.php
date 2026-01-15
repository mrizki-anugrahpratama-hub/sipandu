<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('bidang')->nullable()->after('role');
            // Contoh nilai: 'pemerintahan', 'pembangunan_ekonomi', 'kesejahteraan_sosial', dll
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('bidang');
        });
    }
};