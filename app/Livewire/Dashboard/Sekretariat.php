<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use App\Models\ArsipAktif;
use App\Models\ArsipInaktif;
use App\Models\ArsipVital;
use Carbon\Carbon;
use Illuminate\Support\Str;

#[Layout('layouts.app')]
class Sekretariat extends Component
{
    // Daftar Sub-Bagian di bawah naungan Sekretariat
    protected $lingkupSekretariat = [
        'sekretariat',
        'umum_kepegawaian', 
        'keuangan', 
        'penyusunan_program'
    ];

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('login');
    }

    public function render()
    {
        // 1. Hitung Statistik (Berdasarkan Lingkup Bidang, bukan User ID)
        $arsipAktifCount = ArsipAktif::whereIn('bidang', $this->lingkupSekretariat)->count();
        $arsipInaktifCount = ArsipInaktif::whereIn('bidang', $this->lingkupSekretariat)->where('status_pengolahan', 'inaktif')->count();
        $arsipVitalCount = ArsipVital::whereIn('bidang', $this->lingkupSekretariat)->count();
        // $recycleBinCount = RecycleBin::whereIn('data_arsip->bidang', $this->lingkupSekretariat)->count();
        
        $totalArsip = $arsipAktifCount + $arsipInaktifCount + $arsipVitalCount;

        // 2. Ambil Arsip Terbaru (Gabungan 3 Jenis Arsip)
        $recentArsip = $this->getRecentArchives();

        // 3. Data Chart (Statistik 7 Hari Terakhir)
        $chartData = $this->getChartData();

        // 4. Log Aktivitas (Diambil dari arsip terbaru)
        $activityLogs = $this->getActivityLogsFromRecent($recentArsip);

        // 5. Notifikasi (Opsional/Kosongkan dulu)
        $notifications = []; 

        $pageTitle = 'Sekretariat';
        if (Auth::user() && Auth::user()->role !== 'super_admin') {
            $pageTitle = 'Selamat datang, Admin Sekretariat';
        };

        return view('livewire.dashboard.sekretariat', [
            'totalArsip' => $totalArsip,
            'arsipAktifCount' => $arsipAktifCount,
            'arsipInaktifCount' => $arsipInaktifCount,
            'arsipVitalCount' => $arsipVitalCount,
            // 'recycleBinCount' => $recycleBinCount,
            'chartData' => $chartData,
            'recentArsip' => $recentArsip,
            'activityLogs' => $activityLogs,
            'notifications' => $notifications,
            'unreadNotifications' => 0
        ])
        ->title($pageTitle);
    }

    private function getRecentArchives()
    {
        // Ambil 3 data terbaru dari masing-masing tabel, difilter berdasarkan bidang sekretariat
        $aktif = ArsipAktif::with('user')
            ->whereIn('bidang', $this->lingkupSekretariat)
            ->latest()
            ->take(3)
            ->get()
            ->map(function($item) {
                $item->jenis_arsip_label = 'Arsip Aktif';
                $item->jenis_arsip = 'aktif'; // Untuk warna badge
                // Normalisasi nama kolom judul
                $judul = $item->nama_berkas ?? $item->uraian ?? '(Tanpa Judul)';
                $item->nama_tampilan = Str::limit($judul, 45);
                $item->edit_route = route('arsip.aktif.edit', $item->id);
                return $item;
            });

        $inaktif = ArsipInaktif::with('user')
            ->whereIn('bidang', $this->lingkupSekretariat)
            ->where('status_pengolahan', 'inaktif')
            ->latest()
            ->take(3)
            ->get()
            ->map(function($item) {
                $item->jenis_arsip_label = 'Arsip Inaktif';
                $item->jenis_arsip = 'inaktif';
                $judul = $item->uraian ?? $item->nama_berkas ?? '(Tanpa Judul)';
                $item->nama_tampilan = Str::limit($judul, 45);
                $item->edit_route = route('arsip.inaktif.edit', $item->id);
                return $item;
            });

        $vital = ArsipVital::with('user')
            ->whereIn('bidang', $this->lingkupSekretariat)
            ->latest()
            ->take(3)
            ->get()
            ->map(function($item) {
                $item->jenis_arsip_label = 'Arsip Vital';
                $item->jenis_arsip = 'vital';
                // Arsip Vital biasanya pakai kolom 'isi_berkas' atau 'uraian'
                $judul = $item->isi_berkas ?? $item->uraian ?? $item->nama_berkas ?? '(Tanpa Judul)';
                $item->nama_tampilan = Str::limit($judul, 45);
                $item->edit_route = route('arsip.vital.edit', $item->id);
                return $item;
            });

        // Gabung semua dan urutkan lagi berdasarkan waktu created_at, ambil 5 teratas
        return $aktif->concat($inaktif)->concat($vital)->sortByDesc('created_at')->take(5);
    }

    private function getChartData()
    {
        $days = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];
        $rawCounts = [];
        $maxCount = 1;

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $dateString = $date->toDateString();

            // Hitung jumlah arsip yang masuk pada tanggal tersebut DARI LINGKUP SEKRETARIAT SAJA
            $count = ArsipAktif::whereIn('bidang', $this->lingkupSekretariat)->whereDate('created_at', $dateString)->count() +
                     ArsipInaktif::whereIn('bidang', $this->lingkupSekretariat)->where('status_pengolahan', 'inaktif')->whereDate('created_at', $dateString)->count() +
                     ArsipVital::whereIn('bidang', $this->lingkupSekretariat)->whereDate('created_at', $dateString)->count();
            
            if ($count > $maxCount) $maxCount = $count;

            $rawCounts[] = [
                'count' => $count,
                'label' => $days[$date->dayOfWeek],
                'isToday' => $date->isToday()
            ];
        }

        // Hitung Koordinat SVG (Sama persis dengan SuperAdmin agar grafik mulus)
        $width = 1000;
        $height = 250;
        $xStep = $width / 6;
        
        $points = [];
        $dataPoints = [];

        foreach ($rawCounts as $index => $item) {
            $x = $index * $xStep;
            $normalizedHeight = ($item['count'] / $maxCount) * $height;
            $y = ($height + 20) - $normalizedHeight; 

            $points[] = round($x) . ',' . round($y);
            
            $dataPoints[] = [
                'x' => round($x),
                'y' => round($y),
                'count' => $item['count'],
                'label' => $item['label'],
                'isToday' => $item['isToday']
            ];
        }

        return [
            'svgPoints' => implode(' ', $points),
            'dataPoints' => $dataPoints,
            'maxCount' => $maxCount
        ];
    }

    private function getActivityLogsFromRecent($recentArsip)
    {
        $logs = [];
        
        foreach ($recentArsip as $arsip) {
            // Inisial Nama
            $userName = $arsip->user ? $arsip->user->name : 'User';
            $userInitial = strtoupper(substr($userName, 0, 2));

            // Warna avatar acak
            $colors = ['#e6e9ff', '#fff4e6', '#e6fffa', '#ffe6e6'];
            $randomColor = $colors[$arsip->id % 4] ?? '#e6e9ff';

            $logs[] = [
                'avatar' => $userInitial,
                'user_name' => $userName,
                'action' => 'mengunggah ' . strtolower($arsip->jenis_arsip_label),
                'target' => $arsip->nama_tampilan,
                'time' => $arsip->created_at->diffForHumans(),
                'color' => $randomColor
            ];
        }
        
        return $logs;
    }
}