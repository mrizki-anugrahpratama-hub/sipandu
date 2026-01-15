<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use App\Models\ArsipAktif;
use App\Models\ArsipInaktif;
use App\Models\ArsipVital;
use App\Models\RecycleBin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str; 
use Illuminate\Support\Collection; // Ditambahkan untuk konsistensi

#[Layout('layouts.app')]
class UmumKepegawaian extends Component
{
    public $confirmingDeletion = false;
    public $deletingArsipId = null;

    public function mount()
    {
        // Set locale untuk Carbon agar label hari berbahasa Indonesia
        \Carbon\Carbon::setLocale('id'); 
        // Set session untuk konteks bidang saat ini
        Session::put('current_bidang', 'umum_kepegawaian');
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('login');
    }

    public function confirmDelete($id)
    {
        $this->deletingArsipId = $id;
        $this->confirmingDeletion = true;
    }

    public function deleteArsip()
    {
        try {
            $arsip = ArsipAktif::findOrFail($this->deletingArsipId);
            $bidangSlug = 'umum_kepegawaian';
            
            // Validasi Bidang
            if ($arsip->bidang !== $bidangSlug) {
                session()->flash('error', 'Arsip ini tidak termasuk dalam Sub.Bagian Umum dan Kepegawaian.');
                $this->confirmingDeletion = false;
                return;
            }
            
            // Validasi Role User
            $user = Auth::user();
            if ($user->role !== 'super_admin' && $user->role !== $bidangSlug) {
                session()->flash('error', 'Anda tidak memiliki akses untuk menghapus arsip ini.');
                $this->confirmingDeletion = false;
                return;
            }
            
            // Pindahkan ke Recycle Bin
            RecycleBin::create([
                'jenis_arsip' => 'aktif',
                'data_arsip' => $arsip->toArray(),
                'deleted_at_date' => now(),
                'user_id' => Auth::id()
            ]);
            
            $arsip->delete();
            session()->flash('success', 'Arsip berhasil dipindahkan ke Recycle Bin!');
            $this->confirmingDeletion = false;
            $this->deletingArsipId = null;
            
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menghapus arsip: ' . $e->getMessage());
            \Log::error('Delete arsip error: ' . $e->getMessage());
            $this->confirmingDeletion = false;
        }
    }
    
    // --- HELPER: Memformat data arsip untuk tampilan di list terbaru ---
    private function formatArsip($item, $label, $route) {
        $item->jenis_arsip_label = $label;
        
        // Ambil field yang paling mungkin berisi judul/deskripsi
        $source = $item->uraian ?? $item->nama_berkas ?? $item->isi_berkas ?? 'No title available';
        $item->nama_tampilan = Str::limit($source, 45); 
        
        $item->edit_route = route($route, $item->id);
        return $item;
    }
    
    // --- HELPER CHART: LOGIC UNTUK SVG LINE CHART (Diambil dari Keuangan.php) ---
    private function getLineChartData($bidangSlug)
    {
        $svgWidth = 1000;
        $svgHeight = 280;
        
        $days = collect(range(6, 0))->map(fn($i) => Carbon::now()->subDays($i));

        $counts = [];
        $maxVal = 0;

        foreach ($days as $date) {
            $dateString = $date->toDateString();

            // Menggabungkan COUNT dari 3 tabel (Aktif, Inaktif, Vital)
            $countAktif = ArsipAktif::where('bidang', $bidangSlug)->whereDate('created_at', $dateString)->count();
            $countInaktif = ArsipInaktif::where('bidang', $bidangSlug)->whereDate('created_at', $dateString)->count();
            $countVital = ArsipVital::where('bidang', $bidangSlug)->whereDate('created_at', $dateString)->count();
            
            $totalCount = $countAktif + $countInaktif + $countVital;

            $counts[] = [
                'date' => $date,
                'count' => $totalCount,
                'label' => $date->isoFormat('ddd') // Menggunakan isoFormat untuk hari Indonesia (Sen, Sel, Rab, dst)
            ];

            if ($totalCount > $maxVal) $maxVal = $totalCount;
        }

        if ($maxVal == 0) $maxVal = 5;

        $divisor = count($counts) > 1 ? count($counts) - 1 : 1; 
        $stepX = $svgWidth / $divisor;
        
        $pointsArr = [];
        $dataPoints = [];

        foreach ($counts as $index => $item) {
            $val = $item['count'];
            $x = $index * $stepX; 
            
            // Logika pemetaan Y ke SVG height
            $y = ($svgHeight - 30) - (($val / $maxVal) * ($svgHeight - 60)); 

            $dataPoints[] = [
                'x' => $x,
                'y' => $y,
                'count' => $val,
                'label' => $item['label']
            ];

            $pointsArr[] = "$x,$y";
        }

        return [
            'dataPoints' => $dataPoints,
            'svgPoints' => implode(' ', $pointsArr)
        ];
    }

    private function getArsipData()
    {
        $bidangSlug = 'umum_kepegawaian'; 
        $data = [];

        // 1. STATISTIK
        $arsipAktifCount = ArsipAktif::where('bidang', $bidangSlug)->count();
        
        // Hanya hitung arsip yang benar-benar 'inaktif' (di gudang).
        $arsipInaktifCount = ArsipInaktif::where('bidang', $bidangSlug)
                                         ->where('status_pengolahan', 'inaktif')
                                         ->count();

        $arsipVitalCount = ArsipVital::where('bidang', $bidangSlug)->count();
        
        // Menggunakan LIKE untuk RecycleBin agar konsisten
        $arsipDihapusCount = RecycleBin::where('data_arsip', 'LIKE', '%"bidang":"' . $bidangSlug . '"%')->count();

        $data['arsipAktifCount'] = $arsipAktifCount;
        $data['arsipInaktifCount'] = $arsipInaktifCount;
        $data['arsipVitalCount'] = $arsipVitalCount;
        $data['arsipDihapusCount'] = $arsipDihapusCount;

        // Total Arsip
        $data['totalArsipCount'] = $arsipAktifCount + $arsipInaktifCount + $arsipVitalCount;

        // 2. ARSIP TERBARU (Limit 3)
        $aktif = ArsipAktif::where('bidang', $bidangSlug)->with('user')
            ->latest()->take(3)->get()->map(fn($a) => $this->formatArsip($a, 'Arsip Aktif', 'arsip.aktif.edit')); // Menggunakan Helper formatArsip

        // Filter list terbaru agar arsip yang sudah dimusnahkan tidak muncul
        $inaktif = ArsipInaktif::where('bidang', $bidangSlug)
            ->where('status_pengolahan', 'inaktif') 
            ->with('user')
            ->latest()->take(3)->get()->map(fn($a) => $this->formatArsip($a, 'Arsip Inaktif', 'arsip.inaktif.edit')); // Menggunakan Helper formatArsip

        $vital = ArsipVital::where('bidang', $bidangSlug)->with('user')
            ->latest()->take(3)->get()->map(fn($a) => $this->formatArsip($a, 'Arsip Vital', 'arsip.vital.edit')); // Menggunakan Helper formatArsip

        // Gabung & Urutkan (AMBIL 3 TERATAS DARI GABUNGAN)
        $arsipGabungan = $aktif->concat($inaktif)->concat($vital);
        $data['recentArsip'] = $arsipGabungan->sortByDesc('created_at')->take(3); 

        // 3. CHART
        $data['chartData'] = $this->getLineChartData($bidangSlug); // Mengganti nama variabel data dan fungsi

        return $data;
    }

    public function render()
    {
        $pageTitle = 'Sub.Bagian Umum dan Kepegawaian';
        if (Auth::user() && Auth::user()->role !== 'super_admin') {
            $pageTitle = 'Selamat datang, Admin Umum';
        }

        // Mengganti passing data activityData menjadi chartData
        return view('livewire.dashboard.umum-kepegawaian', $this->getArsipData())
            ->title($pageTitle);
    }
}