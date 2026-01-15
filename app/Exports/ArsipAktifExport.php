<?php

namespace App\Exports;

use App\Exports\Sheets\ArsipAktifSheet;
use App\Exports\Sheets\IsiBerkasSheet;
use App\Models\ArsipAktif;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ArsipAktifExport implements WithMultipleSheets
{
    use Exportable;
    
    protected $query;
    protected $filterIsiBerkas;
    protected $laporanBerkas;
    protected $laporanIsiBerkas;
    protected $search; 
    protected $filterStatus;
    protected $tanggal_mulai; 
    protected $tanggal_selesai; 
    protected $user;
    protected $selectedArsip;
    protected $filterBidang; 
    protected $unitPengolah; 
    protected $periode; 

    public function __construct(
        Builder $query, // Menerima Query Builder
        bool $filterIsiBerkas,
        bool $laporanBerkas, 
        bool $laporanIsiBerkas, 
        ?string $search,
        ?string $filterStatus,
        ?string $tanggal_mulai, 
        ?string $tanggal_selesai, 
        User $user,
        $selectedArsip, 
        ?string $filterBidang,
        string $unitPengolah, 
        string $periode 
    ) {
        $this->query = $query;
        $this->filterIsiBerkas = $filterIsiBerkas;
        $this->laporanBerkas = $laporanBerkas;
        $this->laporanIsiBerkas = $laporanIsiBerkas;
        $this->search = $search;
        $this->filterStatus = $filterStatus;
        $this->tanggal_mulai = $tanggal_mulai;
        $this->tanggal_selesai = $tanggal_selesai;
        $this->user = $user;
        $this->selectedArsip = collect($selectedArsip); 
        $this->filterBidang = $filterBidang;
        $this->unitPengolah = $unitPengolah; 
        $this->periode = $periode; 
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];
        
        // Data Header yang sama untuk kedua sheet
        $headerData = [
            'unitPengolah' => $this->unitPengolah,
            'periode' => $this->periode,
            'status' => strtoupper($this->filterStatus) ?: 'SEMUA STATUS',
            'filterIsiBerkas' => $this->filterIsiBerkas, 
        ];

        // 1. Sheet Daftar Berkas (Arsip Induk)
        if ($this->laporanBerkas) {
            // Mengirim Query Builder yang asli (atau kloning)
            $sheets[] = new ArsipAktifSheet(clone $this->query, $headerData);
        }

        // 2. Sheet Daftar Isi Berkas (Detail Item)
        if ($this->laporanIsiBerkas) {
            // PENTING: Mengkloning query untuk memastikan sheet pertama (ArsipAktifSheet)
            // tidak mengonsumsi data dari query ini.
            $sheets[] = new IsiBerkasSheet(
                clone $this->query, 
                $headerData, 
                $this->search, 
                $this->filterIsiBerkas
            );
        }

        return $sheets;
    }
}