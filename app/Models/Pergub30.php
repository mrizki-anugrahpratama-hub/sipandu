<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pergub30 extends Model
{
    use HasFactory;

    protected $table = 'data_pergub_30';

    /**
     * OPSI 1 (Saat ini): Mengizinkan semua kolom secara otomatis
     */
    // protected $guarded = [];

    /**
     * OPSI 2 (Alternatif): Mendaftar kolom satu per satu (Lebih jelas terbaca)
     * Jika Anda pakai ini, hapus baris $guarded di atas.
     */
    protected $fillable = [
        'kode_klasifikasi',
        'index', // Pengganti nama_klasifikasi
        'retensi_aktif',
        'retensi_inaktif',
        'status_akhir',
        'keterangan',
        'kategori',
        'parent',
        'level',
    ];
}