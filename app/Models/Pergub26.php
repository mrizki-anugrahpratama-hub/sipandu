<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pergub26 extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database
     * Harus sesuai dengan yang didefinisikan di migration dan seeder.
     * @var string
     */
    protected $table = 'data_pergub_26';

    /**
     * Kolom-kolom yang dapat diisi secara massal (mass assignable).
     * @var array<int, string>
     */
    protected $fillable = [
        'kode_klasifikasi',
        'index',
    ];

    /**
     * Opsional: Jika Anda tidak ingin menggunakan created_at dan updated_at
     * set $timestamps = false;
     * Karena Anda menggunakan $table->timestamps() di migrasi, ini dibiarkan default.
     */
}