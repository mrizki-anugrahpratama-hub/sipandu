<?php

namespace App\Livewire\Layouts;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NotificationBell extends Component
{
    /**
     * Menggunakan getListeners untuk menghindari error 
     * 'Unable to evaluate dynamic event name placeholder'.
     */
    public function getListeners()
    {
        $userId = Auth::id();
        return [
            // Mendengarkan broadcast notifikasi dari Laravel Echo
            "echo-private:App.Models.User.{$userId},.Illuminate\\Notifications\\Events\\BroadcastNotificationCreated" => 'handleBroadcastNotification',
        ];
    }

    // Fungsi untuk menandai satu notifikasi sebagai terbaca
    public function markAsRead($notificationId)
    {
        $notification = Auth::user()->unreadNotifications()->where('id', $notificationId)->first();
        if ($notification) {
            $notification->markAsRead();
        }
    }

    // Fungsi untuk menandai semua sebagai terbaca
    public function markAllRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
    }

    public function handleBroadcastNotification($event)
    {
        // 1. Kirim event ke browser untuk memicu Toast Alpine.js
        $this->dispatch('notification-received', [
            'title' => $event['title'] ?? 'Notifikasi Baru',
            'message' => $event['message'] ?? 'Ada data arsip baru ditambahkan.',
        ]);

        // 2. Refresh komponen untuk memperbarui angka lonceng dan daftar
    }

    public function render()
    {
        // Hanya ambil yang belum dibaca agar "menghilang" setelah diklik/ditandai
        $unreadQuery = Auth::user()->unreadNotifications();

        return view('livewire.layouts.notification-bell', [
            'notifications' => $unreadQuery->take(10)->get(),
            'unreadNotifications' => $unreadQuery->count(),
        ]);
    }
}