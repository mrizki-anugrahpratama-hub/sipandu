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
use Illuminate\Support\Facades\DB; // Sudah OK, dipakai di getLineChartData

#[Layout('layouts.app')]
class Kemasyarakatan extends Component
{
    public $confirmingDeletion = false;
    public $deletingArsipId = null;

    public function mount()
    {
        // ✅ PERBAIKAN 1: Set locale untuk Carbon agar label hari berbahasa Indonesia
        \Carbon\Carbon::setLocale('id'); 
        
        // Set session untuk konteks bidang saat ini
        Session::put('current_bidang', 'kemasyarakatan');
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
            
            if ($arsip->bidang !== 'kemasyarakatan') {
                session()->flash('error', 'Arsip ini tidak termasuk dalam Bidang Kemasyarakatan.');
                $this->confirmingDeletion = false;
                return;
            }
            
            $user = Auth::user();
            if ($user->role !== 'super_admin' && $user->role !== 'kemasyarakatan') {
                session()->flash('error', 'Anda tidak memiliki akses untuk menghapus arsip ini.');
                $this->confirmingDeletion = false;
                return;
            }
            
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


    // --- HELPER CHART: LOGIC UNTUK SVG LINE CHART ---
    private function getLineChartData($bidangSlug)
    {
        $svgWidth = 1000;
        $svgHeight = 280;
        
        $days = collect(range(6, 0))->map(fn($i) => Carbon::now()->subDays($i));

        $counts = [];
        $maxVal = 0;

        foreach ($days as $date) {
            $dateString = $date->toDateString();

            // 🔥 PERBAIKAN: Menggabungkan COUNT dari 3 tabel
            $countAktif = ArsipAktif::where('bidang', $bidangSlug)->whereDate('created_at', $dateString)->count();
            $countInaktif = ArsipInaktif::where('bidang', $bidangSlug)->whereDate('created_at', $dateString)->count();
            $countVital = ArsipVital::where('bidang', $bidangSlug)->whereDate('created_at', $dateString)->count();
            
            $totalCount = $countAktif + $countInaktif + $countVital;

            $counts[] = [
                'date' => $date,
                'count' => $totalCount, // Menggunakan totalCount
                'label' => $date->isoFormat('ddd')
            ];

            if ($totalCount > $maxVal) $maxVal = $totalCount;
        }

        if ($maxVal == 0) $maxVal = 5;

        // Memastikan tidak ada pembagian dengan nol jika data hanya 1 hari atau kurang
        $divisor = count($counts) > 1 ? count($counts) - 1 : 1; 
        $stepX = $svgWidth / $divisor;
        
        $pointsArr = [];
        $dataPoints = [];

        foreach ($counts as $index => $item) {
            $val = $item['count'];
            $x = $index * $stepX; 
            
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
    // ----------------------------------------------

    // ✅ HELPER: Fungsi untuk memformat arsip 
    private function formatArsip($item, $label, $route) {
        $item->jenis_arsip_label = $label;
        // Gunakan ?? untuk fallback ke field lain jika field utama kosong, dan Str::limit
        $item->nama_tampilan = Str::limit($item->uraian ?? $item->nama_berkas ?? $item->isi_berkas ?? '', 40); 
        $item->edit_route = route($route, $item->id);
        return $item;
    }


    private function getArsipData()
    {
        $bidangSlug = 'kemasyarakatan';
        $data = [];

        // 1. STATISTIK
        $arsipAktifCount = ArsipAktif::where('bidang', $bidangSlug)->count();
        $arsipInaktifCount = ArsipInaktif::where('bidang', $bidangSlug)->where('status_pengolahan', 'inaktif')->count();
        $arsipVitalCount = ArsipVital::where('bidang', $bidangSlug)->count();
        $arsipDihapusCount = RecycleBin::whereJsonContains('data_arsip->bidang', $bidangSlug)->count();
        
        $data['arsipAktifCount'] = $arsipAktifCount;
        $data['arsipInaktifCount'] = $arsipInaktifCount;
        $data['arsipVitalCount'] = $arsipVitalCount;
        $data['arsipDihapusCount'] = $arsipDihapusCount;
        $data['totalArsipCount'] = $arsipAktifCount + $arsipInaktifCount + $arsipVitalCount;

        // 2. ARSIP TERBARU (TOP 3)
        $aktif = ArsipAktif::where('bidang', $bidangSlug)->with('user')->latest()->take(3)->get()->map(fn($a) => $this->formatArsip($a, 'Arsip Aktif', 'arsip.aktif.edit'));
        $inaktif = ArsipInaktif::where('bidang', $bidangSlug)->where('status_pengolahan', 'inaktif')->with('user')->latest()->take(3)->get()->map(fn($a) => $this->formatArsip($a, 'Arsip Inaktif', 'arsip.inaktif.edit'));
        $vital = ArsipVital::where('bidang', $bidangSlug)->with('user')->latest()->take(3)->get()->map(fn($a) => $this->formatArsip($a, 'Arsip Vital', 'arsip.vital.edit'));

        $arsipGabungan = $aktif->concat($inaktif)->concat($vital);
        $data['recentArsip'] = $arsipGabungan->sortByDesc('created_at')->take(3);

        // 3. DATA CHART GARIS (Menggunakan data gabungan)
        $data['chartData'] = $this->getLineChartData($bidangSlug);

        return $data;
    }

    public function render()
    {
        $pageTitle = 'Bidang Kemasyarakatan';
        if (Auth::user() && Auth::user()->role !== 'super_admin') {
            $pageTitle = 'Selamat datang, Admin Kemasyarakatan';
        }

        $arsipData = $this->getArsipData();

        return view('livewire.dashboard.kemasyarakatan', $arsipData)
            ->title($pageTitle);
    }
}