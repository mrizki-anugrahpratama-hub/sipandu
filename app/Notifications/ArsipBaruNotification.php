<?php

namespace App\Notifications; // Pastikan ini JAMAK (ada 's')

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast; // Tambah ini
use Illuminate\Notifications\Messages\BroadcastMessage; // Tambah ini

class ArsipBaruNotification extends Notification implements ShouldBroadcast
{
    use Queueable;

    protected $arsip;
    protected $tipe;

    public function __construct($arsip, $tipe)
    {
        $this->arsip = $arsip;
        $this->tipe = $tipe;
    }

    public function via($notifiable): array
    {
        return ['database', 'broadcast'];
    }

    public function toArray($notifiable): array
    {
        // Pastikan relasi user sudah dimuat atau ambil langsung dari field jika tersedia
        $pengirim = $this->arsip->user ? $this->arsip->user->name : 'Sistem';
        // Gunakan str_replace atau helper untuk mempercantik nama bidang (misal: umum_kepegawaian -> Umum & Kepegawaian)
        $bidang = ucwords(str_replace('_', ' ', $this->arsip->bidang));
        
        return [
            'title' => "Arsip {$this->tipe} Baru",
            'message' => "Berkas no. {$this->arsip->nomor_berkas} ditambahkan oleh {$pengirim} ({$bidang})",
            'arsip_id' => $this->arsip->id,
            'type' => $this->tipe,
            'sender_name' => $pengirim,
            'section' => $bidang,
        ];
    }

    // Method untuk mengirim data ke WebSocket
    public function toBroadcast($notifiable): BroadcastMessage
    {
        return new BroadcastMessage($this->toArray($notifiable));
    }
}