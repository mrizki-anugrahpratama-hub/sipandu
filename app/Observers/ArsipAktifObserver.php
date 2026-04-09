<?php

namespace App\Observers;

use App\Models\ArsipAktif;
use App\Models\User;
use App\Notifications\ArsipBaruNotification; // <--- PERIKSA BARIS INI
use Illuminate\Support\Facades\Notification;

class ArsipAktifObserver
{
    public function created(ArsipAktif $arsip): void
    {
        // Mencari admin untuk dikirimi notifikasi
        $admins = User::where('role', 'super_admin')->get();

        if ($admins->isNotEmpty()) {
            // Baris 18 yang sebelumnya menyebabkan error
            Notification::send($admins, new ArsipBaruNotification($arsip, 'Aktif'));
        }
    }
}