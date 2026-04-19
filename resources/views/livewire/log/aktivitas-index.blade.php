<div class="dashboard-container livewire-scope">

    {{-- [HEADER] --}}
    <x-slot name="header">
        <div class="welcome-title-group">
            <h1>{{ $pageTitle ?? 'Log Aktivitas' }}</h1>
            
            {{-- BREADCRUMB --}}
            @php
                $user = Auth::user();
                $backRoute = '#';
                $backLabel = 'Home';

                if ($user->role === 'super_admin') {
                    if (!empty($filterBidang) && !in_array($filterBidang, ['sistem', 'super_admin'])) {
                        $slug = str_replace('_', '-', $filterBidang);
                        $backRoute = Route::has("dashboard.$slug") ? route("dashboard.$slug") : route('dashboard.super-admin');
                        $backLabel = 'Bidang ' . \Illuminate\Support\Str::title(str_replace('_', ' ', $filterBidang));
                    } else {
                        $backRoute = route('dashboard.super-admin');
                        $backLabel = 'Home';
                    }
                } elseif ($user->role === 'sekretariat') {
                    // Logic breadcrumb khusus Sekretariat
                    if (!empty($filterBidang)) {
                        $slug = str_replace('_', '-', $filterBidang);
                        $backRoute = Route::has("dashboard.$slug") ? route("dashboard.$slug") : route('dashboard');
                        $backLabel = 'Sub Bagian';
                    } else {
                        $backRoute = route('dashboard');
                        $backLabel = 'Dashboard';
                    }
                } else {
                    $backRoute = route('dashboard');
                    $backLabel = 'Dashboard';
                }
            @endphp

            <a href="{{ $backRoute }}" class="breadcrumb-item active">
                {{ $backLabel }}
            </a>
            
            <i class="bi bi-chevron-right breadcrumb-separator"></i>
            <span class="breadcrumb-item active">Riwayat Unggahan Lengkap</span>
        </div>
    </x-slot>

    @push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        /* CSS FIX KALENDER */
        .flatpickr-calendar {
            z-index: 9999 !important; /* Pastikan kalender selalu di atas */
        }

        /* BADGE */
        /* .badge-tambah { background: #dcfce7; color: #166534; border: 1px solid #166534; }
        .badge-ubah { background: #fef9c3; color: #854d0e; border: 1px solid #854d0e; }
        .badge-hapus { background: #fee2e2; color: #991b1b; border: 1px solid #991b1b; }
        .aksi-badge { padding: 4px 10px; border-radius: 6px; font-size: 0.7rem; font-weight: 800; } */

        .badge-tambah { background-color: rgba(34, 197, 94, 0.2); color: #22c55e; border: 1px solid #22c55e; }
        .badge-ubah { background-color: rgba(234, 179, 8, 0.2); color: #eab308; border: 1px solid #eab308; }
        .badge-hapus { background-color: rgba(239, 68, 68, 0.2); color: #ef4444; border: 1px solid #ef4444; }
        .aksi-badge { padding: 4px 10px; border-radius: 6px; font-size: 0.7rem; font-weight: 800; text-transform: uppercase; }

        /* DARK MODE FIXES */
        body.dark-mode .flatpickr-calendar { background: #1f2937 !important; border: 1px solid #374151 !important; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.5) !important; }
        body.dark-mode .flatpickr-months .flatpickr-month { background: #1f2937 !important; color: #f3f4f6 !important; fill: #f3f4f6 !important; }
        body.dark-mode .flatpickr-day { color: #e5e7eb !important; }
        body.dark-mode .flatpickr-day:hover { background: #374151 !important; border-color: #374151 !important; }
        body.dark-mode .flatpickr-day.selected { background: #3b82f6 !important; color: #fff !important; border-color: #3b82f6 !important; }
        body.dark-mode .flatpickr-current-month .flatpickr-monthDropdown-months, 
        body.dark-mode .flatpickr-current-month .numInputWrapper input.cur-year { color: #f3f4f6 !important; background: transparent !important; }
        
        /* STYLE UMUM */
        .main-toolbar { display: flex; justify-content: space-between; align-items: center; gap: 16px; margin-bottom: 20px; }
        .search-bar-table { flex-grow: 1; position: relative; }
        .search-bar-table i { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: var(--text-muted); }
        .search-bar-table input { width: 100%; padding: 10px 14px 10px 40px; border-radius: var(--radius-md); border: 1px solid var(--border-color); background-color: var(--bg-white); color: var(--text-primary); height: 42px; transition: all 0.2s; }
        .search-bar-table input:focus { outline: none; border-color: var(--primary-blue); box-shadow: 0 0 0 3px var(--primary-blue-light); }
        
        .filter-container { border: 1px solid var(--border-color); border-radius: var(--radius-lg); margin-bottom: 24px; overflow: hidden; background-color: var(--bg-white); box-shadow: var(--shadow-sm); }
        .filter-container-header { padding: 12px 20px; background-color: var(--bg-active); border-bottom: 1px solid var(--border-color); display: flex; align-items: center; justify-content: space-between; }
        .filter-container-header h3 { font-size: 0.95rem; font-weight: 600; color: var(--text-primary); margin: 0; display: flex; align-items: center; gap: 8px; }
        .filter-container-body { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; padding: 20px; }
        
        .form-select-sm, .form-input-sm { width: 100%; padding: 8px 12px; border-radius: var(--radius-md); border: 1px solid var(--border-color); background-color: var(--bg-white); color: var(--text-primary); height: 38px; font-size: 0.9rem; }
        
        .reset-filter-btn { text-decoration: none; font-size: 0.85rem; color: var(--primary-blue); cursor: pointer; background: none; border: none; padding: 0; display: inline-flex; align-items: center; gap: 4px; transition: color 0.2s; }
        .reset-filter-btn:hover { color: var(--primary-blue-dark); }
        
        .date-header-row td { background-color: var(--bg-active-light); color: var(--text-primary); font-weight: 700; font-size: 0.9rem; padding: 15px 20px; border-bottom: 1px solid var(--border-color); position: sticky; top: 0; z-index: 10; box-shadow: 0 1px 2px rgba(0,0,0,0.05); }
        .data-table tbody tr td { padding: 12px 8px; vertical-align: middle; }
        .data-table th, .data-table td { border-right: 1px solid var(--border-color); }
        .data-table th:last-child, .data-table td:last-child { border-right: none; }
        .data-table tbody tr:not(.date-header-row) td { border-bottom: 1px solid var(--border-color); }
        .arsip-type-badge { display: inline-block; padding: 4px 8px; border-radius: var(--radius-sm); font-size: 0.75rem; font-weight: 600; }
        .badge-active { background-color: var(--green-light); color: var(--green-dark); }
        .badge-inactive { background-color: var(--yellow-light); color: var(--yellow-dark); }
        .badge-vital { background-color: var(--red-light); color: var(--red-dark); }
        .card.animated-card { border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-sm); }
        .empty-data-state { display: flex; flex-direction: column; align-items: center; justify-content: center; height: 180px; color: var(--text-muted); font-size: 1rem; text-align: center; padding: 20px; }
        
        /* Dark Mode Input Fix */
        body.dark-mode .search-bar-table input, body.dark-mode .form-select-sm, body.dark-mode .form-input-sm { background-color: var(--bg-sidebar); border-color: #4b5563; color: #e5e7eb; }
        body.dark-mode .filter-container, body.dark-mode .filter-container-body { background-color: var(--bg-sidebar); border-color: #4b5563; }
        body.dark-mode .filter-container-header { background-color: var(--bg-active); border-bottom-color: #4b5563; }
        body.dark-mode .date-header-row td { background-color: #2c333f; color: #f3f4f6; border-bottom-color: #4b5563; }
        body.dark-mode .data-table th, body.dark-mode .data-table td { border-right-color: #4b5563; }
        body.dark-mode .data-table tbody tr:not(.date-header-row) td { border-bottom-color: #4b5563; }
    </style>
    @endpush

    <div x-data="{ 
        fpMulai: null, fpSelesai: null,
        tanggalMulaiVal: @entangle('tanggal_mulai').live, 
        tanggalSelesaiVal: @entangle('tanggal_selesai').live,
        initFlatpickr() {
            // Hancurkan instance lama jika ada untuk mencegah duplikasi
            if(this.fpMulai) this.fpMulai.destroy();
            if(this.fpSelesai) this.fpSelesai.destroy();

            this.fpMulai = flatpickr(this.$refs.tanggalMulai, { 
                dateFormat: 'Y-m-d', 
                allowInput: true, 
                defaultDate: this.tanggalMulaiVal, 
                onChange: (selectedDates, dateStr) => { 
                    this.tanggalMulaiVal = dateStr; 
                    if(this.fpSelesai) this.fpSelesai.set('minDate', dateStr); 
                } 
            });

            this.fpSelesai = flatpickr(this.$refs.tanggalSelesai, { 
                dateFormat: 'Y-m-d', 
                allowInput: true, 
                defaultDate: this.tanggalSelesaiVal, 
                minDate: this.tanggalMulaiVal, 
                onChange: (selectedDates, dateStr) => { 
                    this.tanggalSelesaiVal = dateStr; 
                    if(this.fpMulai) this.fpMulai.set('maxDate', dateStr); 
                } 
            });
        },
        resetFlatpickr() { 
            if (this.fpMulai) this.fpMulai.clear(); 
            if (this.fpSelesai) this.fpSelesai.clear(); 
        }
    }" x-init="initFlatpickr()" @clear-flatpickr-log.window="resetFlatpickr()">

        <div class="main-toolbar">
            <div class="search-bar-table">
                <i class="bi bi-search"></i>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Cari berdasarkan nama/uraian berkas...">
            </div>
        </div>

        <div class="filter-container">
            <div class="filter-container-header">
                <h3><i class="bi bi-funnel"></i> Filter</h3>
                <button wire:click="resetFilters" @click="resetFlatpickr" class="reset-filter-btn">
                    <i class="bi bi-arrow-counterclockwise"></i> Reset Filter
                </button>
            </div>
            <div class="filter-container-body">
                <!-- Tambahkan wire:ignore agar element tidak dirender ulang oleh Livewire saat mengetik -->
                <div wire:ignore>
                    <label style="font-size: 0.8rem; color: var(--text-muted);">Tanggal Mulai</label>
                    <input x-ref="tanggalMulai" type="text" class="form-input-sm" placeholder="Pilih tanggal..." autocomplete="off">
                </div>
                <div wire:ignore>
                    <label style="font-size: 0.8rem; color: var(--text-muted);">Tanggal Selesai</label>
                    <input x-ref="tanggalSelesai" type="text" class="form-input-sm" placeholder="Pilih tanggal..." autocomplete="off">
                </div>
                <div>
                    <label style="font-size: 0.8rem; color: var(--text-muted);">Jenis Arsip</label>
                    <select wire:model.live="filterJenis" class="form-select-sm">
                        <option value="">Semua Jenis</option>
                        <option value="Aktif">Arsip Aktif</option>
                        <option value="Inaktif">Arsip Inaktif</option>
                        <option value="Vital">Arsip Vital</option>
                    </select>
                </div>

                @if(Auth::check() && (Auth::user()->role === 'super_admin' || (Auth::user()->role === 'sekretariat' && !$isLockedMode)))
                <div>
                    <label style="font-size: 0.8rem; color: var(--text-muted);">Unit Pengolah</label>
                    <select wire:model.live="filterBidang" class="form-select-sm">
                        <option value="">Semua Unit</option>
                        
                        @if(Auth::user()->role === 'super_admin')
                            <option value="umum_kepegawaian">Sub.Bagian Umum dan Kepegawaian</option>
                            <option value="keuangan">Sub.Bagian Keuangan</option>
                            <option value="penyusunan_program">Sub.Bagian Penyusunan Program dan Anggaran</option>
                            <option value="pemerintahan">Bidang Pemerintahan</option>
                            <option value="pembangunan_ekonomi">Bidang Pembangunan Ekonomi</option>
                            <option value="kemasyarakatan">Bidang Kemasyarakatan</option>
                            <option value="sarana_prasarana">Bidang Sarana dan Prasarana</option>
                        @elseif(Auth::user()->role === 'sekretariat')
                            <option value="umum_kepegawaian">Sub.Bagian Umum dan Kepegawaian</option>
                            <option value="keuangan">Sub.Bagian Keuangan</option>
                            <option value="penyusunan_program">Sub.Bagian Penyusunan Program dan Anggaran</option>
                        @endif
                    </select>
                </div>
                @endif

            </div>
        </div>

        <section class="card animated-card">
            <div class="table-responsive">
                <table class="data-table" style="margin: 0;">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">No</th>
                            <th>Uraian</th>
                            <th class="text-center">Aksi</th>
                            <th class="text-center">Jenis Arsip</th>
                            <th class="text-center">Unit Pengolah</th>
                            {{-- <th class="text-center">Dilakukan Oleh</th> --}}
                            <th class="text-center">Waktu Upload</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                            $currentDate = null; 
                            $columnCount = 6; 
                        @endphp
                        @forelse ($aktivitas as $index => $item)
                            @php $itemDate = $item->created_at->format('Y-m-d'); @endphp

                            {{-- Header Grup Tanggal --}}
                            @if ($currentDate != $itemDate)
                                <tr class="date-header-row">
                                    <td colspan="6" style="background: var(--bg-active); font-weight: 700;">
                                        <i class="bi bi-calendar3"></i> {{ $item->created_at->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                    </td>
                                </tr>
                                @php $currentDate = $itemDate; @endphp
                            @endif
                            
                            <tr wire:key="log-{{ $item->id }}">
                                {{-- 1. No --}}
                                <td class="text-center">{{ $aktivitas->firstItem() + $index }}</td>
                            
                                {{-- 2. Deskripsi (Berisi Uraian Arsip) --}}
                                <td class="text-wrap" style="color: var(--text-primary);">
                                    {{ $item->deskripsi }}
                                </td>
                            
                                {{-- 3. Badge Aksi --}}
                                <td class="text-center">
                                    @php 
                                        $badgeClass = match($item->aksi) {
                                            'Tambah' => 'badge-tambah',
                                            'Ubah'   => 'badge-ubah',
                                            'Hapus'  => 'badge-hapus',
                                            default  => ''
                                        };
                                    @endphp
                                    <span class="aksi-badge {{ $badgeClass }}">{{ strtoupper($item->aksi) }}</span>
                                </td>
                            
                                {{-- 4. Modul --}}
                                <td class="text-center">
                                    <span class="arsip-type-badge" style="background: rgba(59, 130, 246, 0.1); border: 1px solid #3b82f6; color: #3b82f6;">
                                        {{ $item->modul }}
                                    </span>
                                </td>
                            
                                {{-- 5. Pelaku --}}
                                <td class="text-center">
                                    <strong>{{ $item->user->name ?? 'N/A' }}</strong>
                                    <div style="font-size: 0.7rem; color: var(--text-secondary);">
                                        {{ \Illuminate\Support\Str::title(str_replace('_', ' ', $item->bidang)) }}
                                    </div>
                                </td>
                            
                                {{-- 6. Waktu Upload (Format Tanggal/Waktu Tumpuk) --}}
                                <td class="text-center" style="font-family: monospace; white-space: nowrap;">
                                    <div style="font-weight: 700; color: var(--text-primary);">
                                        {{ $item->created_at->format('d/m/Y') }}
                                    </div>
                                    <div style="font-size: 0.8rem; color: var(--text-secondary);">
                                        {{ $item->created_at->format('H:i') }} WIB
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center" style="padding: 3rem; color: var(--text-sub);">
                                    Data aktivitas tidak ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="pagination-container">
                {{-- <span class="pagination-info">Menampilkan {{ $aktivitas->firstItem() ?? 0 }}-{{ $aktivitas->lastItem() ?? 0 }} dari {{ $aktivitas->total() }} aktivitas</span> --}}
                <div class="pagination-buttons">{{ $aktivitas->links() }}</div>
            </div>
        </section>
    </div>
    @push('scripts') <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> @endpush
</div>