<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use App\Models\ArsipAktif;
use App\Models\ArsipInaktif;
use App\Models\ArsipVital;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class SuperAdmin extends Component
{
    use WithPagination;

    public $viewMode = 'dashboard'; 
    public $activeTab = 'aktif'; 

    public $searchAktif = '';
    public $searchInaktif = '';
    public $searchVital = '';

    public function mount()
    {
        Session::forget('current_bidang'); 
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('login');
    }

    public function setView($mode)
    {
        $this->viewMode = $mode;
        $this->resetPage(); 
    }

    public function setTab($tabName)
    {
        $this->activeTab = $tabName;
        $this->resetPage(); 
    }
    
    public function updatingSearchAktif() { $this->resetPage('aktifPage'); }
    public function updatingSearchInaktif() { $this->resetPage('inaktifPage'); }
    public function updatingSearchVital() { $this->resetPage('vitalPage'); }

    public function render()
    {
        // --- MODE 1: TABEL LENGKAP ---
        if ($this->viewMode === 'all_archives') {
            $arsipAktif = ArsipAktif::with('user')
                ->where(function($query) {
                    $query->where('nama_berkas', 'like', '%'.$this->searchAktif.'%')
                          ->orWhere('kode_klasifikasi', 'like', '%'.$this->searchAktif.'%')
                          ->orWhere('nomor_berkas', 'like', '%'.$this->searchAktif.'%');
                })->latest()->paginate(10, ['*'], 'aktifPage');
            
            $arsipInaktif = ArsipInaktif::with('user')
                ->where('status_pengolahan', 'inaktif') 
                ->where(function($query) {
                    $query->where('nomor_box', 'like', '%'.$this->searchInaktif.'%')
                          ->orWhere('nomor_berkas', 'like', '%'.$this->searchInaktif.'%')
                          ->orWhere('kode_klasifikasi', 'like', '%'.$this->searchInaktif.'%');
                })->latest()->paginate(10, ['*'], 'inaktifPage');

            $arsipVital = ArsipVital::with('user')
                ->where(function($query) {
                    $query->where('asal_arsip', 'like', '%'.$this->searchVital.'%')
                          ->orWhere('nomor_berkas', 'like', '%'.$this->searchVital.'%')
                          ->orWhere('kode_klasifikasi', 'like', '%'.$this->searchVital.'%');
                })->latest()->paginate(10, ['*'], 'vitalPage');

            return view('livewire.dashboard.partials.all-archives', [
                'arsipAktif' => $arsipAktif,
                'arsipInaktif' => $arsipInaktif,
                'arsipVital' => $arsipVital,
            ]);
        }

        // --- MODE 2: DASHBOARD UTAMA ---

        // Hitung Statistik
        $arsipAktifCount = ArsipAktif::count();
        $arsipInaktifCount = ArsipInaktif::where('status_pengolahan', 'inaktif')->count();
        $arsipVitalCount = ArsipVital::count();
        $totalArsip = $arsipAktifCount + $arsipInaktifCount + $arsipVitalCount;

        // AMBIL ARSIP TERBARU (LIMIT 3)
        // [PERUBAHAN 1] Menggunakan take(3) di masing-masing query dan hasil akhir
        
        $aktif = ArsipAktif::with('user')->latest()->take(3)->get()->map(function($item) {
            $item->jenis_arsip_label = 'Arsip Aktif';
            $judul = $item->nama_berkas ?? $item->uraian ?? '(Tanpa Judul)';
            $item->nama_tampilan = Str::limit($judul, 45);
            $item->edit_route = route('arsip.aktif.edit', $item->id);
            return $item;
        });

        $inaktif = ArsipInaktif::where('status_pengolahan', 'inaktif')->with('user')->latest()->take(3)->get()->map(function($item) {
            $item->jenis_arsip_label = 'Arsip Inaktif';
            $judul = $item->uraian ?? $item->nama_berkas ?? '(Tanpa Judul)';
            $item->nama_tampilan = Str::limit($judul, 45);
            $item->edit_route = route('arsip.inaktif.edit', $item->id);
            return $item;
        });

        $vital = ArsipVital::with('user')->latest()->take(3)->get()->map(function($item) {
            $item->jenis_arsip_label = 'Arsip Vital';
            $judul = $item->isi_berkas ?? $item->uraian ?? $item->nama_berkas ?? '(Tanpa Judul)';
            $item->nama_tampilan = Str::limit($judul, 45);
            $item->edit_route = route('arsip.vital.edit', $item->id);
            return $item;
        });

        // Gabung dan ambil 3 teratas global
        $recentArsip = $aktif->concat($inaktif)->concat($vital)->sortByDesc('created_at')->take(3);

        // Data Chart (Format Baru untuk SVG Line Chart)
        $chartData = $this->getChartData();

        $activityLogs = $this->getActivityLogs(); 
        $notifications = $this->getNotifications();

        return view('livewire.dashboard.super-admin', [
            'totalArsipCount' => $totalArsip,
            'arsipAktifCount' => $arsipAktifCount,
            'arsipInaktifCount' => $arsipInaktifCount,
            'arsipVitalCount' => $arsipVitalCount,
            'chartData' => $chartData, // Mengirim data chart lengkap (points, labels, dll)
            'recentArsip' => $recentArsip,
            'activityLogs' => $activityLogs,
            'notifications' => $notifications,
            'unreadNotifications' => count($notifications)
        ]);
    }

    // [PERUBAHAN 2] Logika Chart SVG
    private function getChartData()
    {
        $days = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];
        $rawCounts = [];
        $maxCount = 1;

        // 1. Ambil data mentah dulu
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $dateString = $date->toDateString();

            $count = ArsipAktif::whereDate('created_at', $dateString)->count() +
                     ArsipInaktif::where('status_pengolahan', 'inaktif')->whereDate('created_at', $dateString)->count() +
                     ArsipVital::whereDate('created_at', $dateString)->count();
            
            if ($count > $maxCount) $maxCount = $count;

            $rawCounts[] = [
                'count' => $count,
                'label' => $days[$date->dayOfWeek],
                'isToday' => $date->isToday()
            ];
        }

        // 2. Hitung Koordinat SVG (ViewBox 0 0 1000 300)
        // Lebar total 1000 unit, Tinggi 300 unit
        // Jarak antar titik X = 1000 / 6 (karena ada 7 titik, 6 spasi)
        $width = 1000;
        $height = 250; // Sedikit padding dari bawah (300 total)
        $xStep = $width / 6;
        
        $points = []; // Untuk Polyline "0,100 166,50 ..."
        $dataPoints = []; // Untuk lingkaran titik data

        foreach ($rawCounts as $index => $item) {
            $x = $index * $xStep;
            
            // Balik nilai Y (karena SVG 0 di atas, 300 di bawah)
            // Rumus: Height - ((Count / Max) * Height)
            // Jika count 0, y = Height (di bawah)
            $normalizedHeight = ($item['count'] / $maxCount) * $height;
            // Kita kurangi sedikit padding atas (misal 20px) agar titik tertinggi tidak kepotong
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

    private function getActivityLogs()
    {
        $logs = [];
        $recent = ArsipAktif::with('user')->latest()->limit(5)->get(); // Limit log sedikit saja

        foreach ($recent as $arsip) {
            $judul = $arsip->nama_berkas ?? $arsip->uraian ?? 'Dokumen';
            $logs[] = [
                'avatar' => $arsip->user ? strtoupper(substr($arsip->user->name, 0, 2)) : '??',
                'user_name' => $arsip->user ? $arsip->user->name : 'User',
                'action' => 'mengunggah',
                'target' => Str::limit($judul, 20),
                'time' => $arsip->created_at->diffForHumans(),
                'color' => '#e6e9ff'
            ];
        }
        return $logs;
    }

    private function getNotifications()
    {
        $notifications = [];
        // (Kode notifikasi sama seperti sebelumnya)
        return $notifications;
    }
}