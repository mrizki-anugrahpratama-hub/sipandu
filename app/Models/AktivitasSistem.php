<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AktivitasSistem extends Model
{
    protected $fillable = [
        'user_id', 'bidang', 'aksi', 'modul', 'deskripsi', 'perubahan', 'ip_address'
    ];

    protected $casts = [
        'perubahan' => 'array',
        'created_at' => 'datetime',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}