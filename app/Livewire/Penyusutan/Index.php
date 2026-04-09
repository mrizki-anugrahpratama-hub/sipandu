<?php

namespace App\Livewire\Penyusutan;

use Livewire\Component;
use App\Models\ArsipInaktif;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Index extends Component
{
    public function render()
    {
        $user = Auth::user();
        
        // Logika RBAC: Admin Pusat melihat semua, Bidang melihat miliknya saja
        $isCentralAdmin = in_array($user->role, ['super_admin', 'sekretariat']);

        // --- 1. COUNT ARSIP MUSNAH ---
        $queryMusnah = ArsipInaktif::where(function($q) {
            $q->where(function($sq) {
                $sq->where('status_pengolahan', 'penyusutan')->where('status_akhir', 'Musnah');
            })->orWhere('status_pengolahan', 'musnah');
        });

        // --- 2. COUNT ARSIP PERMANEN ---
        $queryPermanen = ArsipInaktif::where(function($q) {
            $q->where(function($sq) {
                $sq->where('status_pengolahan', 'penyusutan')->where('status_akhir', 'Permanen');
            })->orWhere('status_pengolahan', 'permanen');
        });

        // Terapkan filter bidang jika bukan admin pusat
        if (!$isCentralAdmin) {
            $queryMusnah->where('bidang', $user->role);
            $queryPermanen->where('bidang', $user->role);
        }

        return view('livewire.penyusutan.index', [
            'totalMusnah' => $queryMusnah->count(),
            'pendingMusnah' => (clone $queryMusnah)->where('status_pengolahan', 'penyusutan')->count(),
            'totalPermanen' => $queryPermanen->count(),
            'pendingPermanen' => (clone $queryPermanen)->where('status_pengolahan', 'penyusutan')->count(),
        ]);
    }
}