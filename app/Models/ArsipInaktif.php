<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder; 
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User; 
use App\Models\FileArsip; // [UBAH DISINI]: Gunakan FileArsip, bukan File

class ArsipInaktif extends Model
{
    use HasFactory;

    protected $table = 'arsip_inaktif';

    protected $fillable = [
        'nomor_box', 
        'kode_klasifikasi', 
        'nomor_berkas', 
        'uraian', 
        'index',
        'kurun_waktu', 
        'jumlah', 
        'masa_retensi_inaktif', 
        'status_akhir',
        'user_id', 
        'bidang', 
        'klasifikasi_keamanan', 
        'klasifikasi_akses', 
        'tingkat_perkembangan',
        
        // === DATA VITAL ===
        'tgl_retensi_berakhir', 
        'status_pengolahan',     
        'tanggal_dipindah',
        'tanggal_eksekusi',
        'tanggal_dibuat',
    ];

    protected $casts = [
        'tgl_retensi_berakhir' => 'date',
        'tanggal_dipindah' => 'datetime',
        'tanggal_eksekusi' => 'datetime',
        'tanggal_dibuat' => 'date',
        'masa_retensi_inaktif' => 'integer',
    ];

    /**
     * Fitur otomatis: Hitung tanggal expired jika user lupa mengisinya.
     */
    protected static function booted()
    {
        static::creating(function ($arsip) {
            if (empty($arsip->tgl_retensi_berakhir) && !empty($arsip->tanggal_dipindah) && !empty($arsip->masa_retensi_inaktif)) {
                $arsip->tgl_retensi_berakhir = Carbon::parse($arsip->tanggal_dipindah)
                    ->addYears((int) $arsip->masa_retensi_inaktif);
            }
        });
    }

    // === RELATIONS ===

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi untuk file digital.
     * [PERBAIKAN]: Sekarang diarahkan ke FileArsip
     */
    public function files(): HasMany
    {
        // Pastikan parameter kedua ('arsip_inaktif_id') sesuai dengan nama kolom foreign key di tabel file_arsips
        return $this->hasMany(FileArsip::class, 'arsip_inaktif_id');
    }

    // === SCOPES (QUERY HELPER) ===

    public function scopeSiapPenyusutan(Builder $query): Builder
    {
        return $query->where('status_pengolahan', 'inaktif')
                     ->whereDate('tgl_retensi_berakhir', '<=', now());
    }

    public function scopeDalamPenyusutan(Builder $query): Builder
    {
        return $query->where('status_pengolahan', 'penyusutan');
    }

    public function scopeSudahMusnah(Builder $query): Builder
    {
        return $query->where('status_pengolahan', 'musnah');
    }
    
    public function getWarnaStatusAttribute()
    {
        return match($this->status_pengolahan) {
            'inaktif' => 'secondary',    
            'penyusutan' => 'warning',  
            'musnah' => 'danger',        
            'permanen' => 'success',    
            default => 'secondary',
        };
    }
}