<div class="notification-btn-container" x-data="{ open: false }">
    <button class="notification-btn" @click="open = !open" id="notificationToggle">
        <i class="bi bi-bell"></i>
        @if($unreadNotifications > 0)
            <span class="notification-badge"></span>
        @endif
    </button>

    <div class="notification-dropdown" :class="{ 'open': open }" @click.outside="open = false">
        <div class="notification-header">
            <strong>Notifikasi ({{ $unreadNotifications }})</strong>
            <a href="{{ route('notifications.markAllRead') }}" class="see-all-link" wire:navigate>Tandai terbaca</a>
        </div>
        <ul class="notification-list">
            @forelse($notifications as $notif)
                @php
                    // Menentukan route berdasarkan tipe arsip yang dikirim dari Notification Class
                    $type = $notif->data['type'] ?? 'Aktif';
                    $arsipId = $notif->data['arsip_id'];
                    
                    $detailRoute = match($type) {
                        'Inaktif' => route('arsip.inaktif.show', $arsipId),
                        'Vital'   => route('arsip.vital.show', $arsipId),
                        default   => route('arsip.aktif.show', $arsipId),
                    };
                @endphp
                <li>
                    <a href="{{ $detailRoute }}" class="notification-item {{ $notif->read_at ? '' : 'unread' }}" wire:navigate>
                        <div class="icon-box" style="background-color: var(--primary-blue-light); color: var(--primary-blue);">
                            <i class="bi bi-file-earmark-plus"></i>
                        </div>
                        <div class="text-content">
                            <strong>{{ $notif->data['title'] }}</strong>
                            <span>{{ $notif->data['message'] }}</span>
                            <small style="display: block; font-size: 0.75rem; color: var(--text-muted);">
                                {{ $notif->created_at->diffForHumans() }}
                            </small>
                        </div>
                    </a>
                </li>
            @empty
                <li style="padding: 20px; text-align: center; color: var(--text-muted);">Tidak ada notifikasi baru</li>
            @endforelse
        </ul>
    </div>
</div>