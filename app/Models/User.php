<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',           // Tambahkan ini
        'bidang_id',      // Tambahkan ini
        'sub_bidang_id',  // Tambahkan ini
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }

    public function subBidang()
    {
        return $this->belongsTo(SubBidang::class);
    }

    // Helper untuk mengecek apakah user memiliki akses level manajemen
    public function hasFullAccess()
    {
        return in_array($this->role, ['super_admin', 'sekretariat']);
    }

}
