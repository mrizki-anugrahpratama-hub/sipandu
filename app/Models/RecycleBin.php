<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecycleBin extends Model
{
    use HasFactory;

    protected $table = 'recycle_bin';

    protected $fillable = [
        'jenis_arsip',
        'data_arsip',
        'deleted_at_date', // <--- POTENSI MASALAH DI SINI
        'user_id'
    ];

    protected $casts = [
        'data_arsip' => 'array',
        'deleted_at_date' => 'date' // <--- DIGUNAKAN DI SINI
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}