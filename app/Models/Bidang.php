<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    /**
     * [PERBAIKAN] Menentukan nama tabel yang benar.
     * * Baris ini memberitahu Laravel bahwa Model 'Bidang'
     * terhubung ke tabel 'bidang' (singular).
     * Jika nama tabel Anda berbeda (misal: 'm_bidang'), ganti di bawah ini.
     */
    protected $table = 'bidang';

    /**
     * Definisikan relasi ke User (kebalikannya).
     * Ini opsional tapi bagus untuk struktur.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}