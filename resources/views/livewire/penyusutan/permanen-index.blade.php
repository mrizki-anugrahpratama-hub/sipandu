<div class="dashboard-container livewire-scope">

    {{-- 1. HEADER HALAMAN --}}
    <x-slot name="header">
        <div class="welcome-title-group" style="display: flex; flex-direction: column; align-items: flex-start; width: 100%;">
            
            <h1 class="dashboard-header__title">Olah Arsip Permanen</h1>
            
            {{-- BREADCRUMB --}}
            <div style="font-size: 0.9rem; color: var(--text-sub);">
                <a href="{{ route('penyusutan.index') }}" 
                    style="text-decoration: none; color: var(--text-sub); font-weight: 600;">
                    Penyusutan
                </a>
                <i class="bi bi-chevron-right" style="font-size: 0.7rem; margin: 0 5px;"></i>
                <span style="font-weight: 600; color: var(--text-main);">
                    Arsip Permanen
                </span>
            </div>
        </div>
    </x-slot>

    @push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css">
    
    <style>
        /* 🎨 1. VARIABEL & WARNA UTAMA */
        .livewire-scope {
            /* Light Mode Defaults */
            --bg-page: #f8fafc; --bg-card: #ffffff; --text-main: #1e293b; --text-sub: #64748b;
            --border-color: #e2e8f0; 
            --primary-blue: #3b82f6; 
            --primary-blue-light: rgba(59, 130, 246, 0.2);
            --primary: var(--primary-blue);
            --bg-white: #ffffff;
            --text-primary: var(--text-main);
            --text-secondary: var(--text-sub);
            --text-light: #ffffff;
            --color-red: #ef4444; --color-green: #22c55e; --color-yellow: #eab308;
            --bg-active: #f1f5f9; --radius-md: 0.5rem; --radius-lg: 0.75rem;
            --transition-timing: cubic-bezier(0.4, 0, 0.2, 1);
            
            /* Dark Mode Defaults */
            --dark-bg: #1f2937; --dark-text: #f1f5f9; --dark-border: #374151;
        }
        body.dark-mode .livewire-scope, :is([class*="dark"] .livewire-scope) {
            --bg-card: #1f2937; --text-main: #f1f5f9; --text-sub: #94a3b8; --border-color: #374151;
            --primary-blue: #60a5fa; 
            --primary-blue-light: rgba(96, 165, 250, 0.2);
            --primary: var(--primary-blue);
            --color-red: #f87171; --color-green: #4ade80; --color-yellow: #facc15;
            --bg-active: #2c3e50; --bg-sidebar: #1f2937;
            --bg-white: var(--bg-card); 
        }

        /* 🎨 2. UTILITIES & CARD */
        .livewire-scope .card { background-color: var(--bg-card); border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: 1.5rem; }
        .dashboard-header__title { font-size: 1.5rem; font-weight: 700; color: var(--text-main); margin: 0; }
        
        /* TOOLBAR */
        .main-toolbar { margin-bottom: 1.5rem; display: flex; justify-content: space-between; align-items: center; gap: 1rem; flex-wrap: wrap; }
        
        /* SEARCH BAR */
        .search-bar-table { position: relative; flex-grow: 1; max-width: none; }
        .search-bar-table i { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: var(--text-sub); font-size: 1rem; z-index: 5; }
        .search-bar-table input {
            width: 100%; padding: 10px 14px 10px 40px; border-radius: var(--radius-md);
            border: 1px solid var(--border-color); background-color: var(--bg-white);
            color: var(--text-primary); font-size: 0.95rem; height: 42px; outline: none;
            transition: all 0.2s;
        }
        .search-bar-table input:focus { border-color: var(--primary-blue); box-shadow: 0 0 0 3px var(--primary-blue-light); }
        body.dark-mode .search-bar-table input { background-color: var(--dark-bg); color: var(--dark-text); border-color: var(--dark-border); }

        /* BUTTONS */
        .table-actions-bar { display: flex; gap: 12px; padding-bottom: 20px; flex-wrap: wrap; }
        .action-button { 
            display: inline-flex; align-items: center; gap: 8px; padding: 8px 12px;
            font-size: 0.9rem; font-weight: 600; border: 1px solid var(--border-color);
            background-color: var(--bg-white); color: var(--text-primary); 
            border-radius: var(--radius-md); height: 38px; cursor: pointer; transition: all 0.2s;
        }
        .action-button:hover { background-color: var(--bg-active); }
        .action-button.btn-primary-live { 
            background-color: var(--primary-blue) !important; color: var(--text-light) !important; 
            border-color: var(--primary-blue) !important; 
        }
        .action-button.btn-primary-live:hover { background-color: #3a5de0 !important; box-shadow: 0 4px 8px rgba(59, 130, 246, 0.6); }

        /* FILTER SECTION */
        .filter-container { border: 1px solid var(--border-color); border-radius: var(--radius-lg); margin-bottom: 20px; overflow: hidden; }
        .filter-container-header { padding: 16px 24px; background-color: var(--bg-active); border-bottom: 1px solid var(--border-color); }
        .filter-container-header h3 { font-size: 1.125rem; font-weight: 600; color: var(--text-primary); margin: 0; }
        .filter-container-body { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; padding: 24px; background-color: var(--bg-active); }
        .filter-container-footer { padding: 16px 24px; border-top: 1px solid var(--border-color); background-color: var(--bg-active); display: flex; justify-content: flex-end; }
        .form-select-sm, .form-input-sm { padding: 10px 14px; border-radius: var(--radius-md); border: 1px solid var(--border-color); background-color: var(--bg-white); color: var(--text-main); font-size: 0.95rem; height: 42px; width: 100%; }
        body.dark-mode .filter-container-body, body.dark-mode .filter-container-footer, body.dark-mode .form-input-sm, body.dark-mode .form-select-sm { background-color: var(--bg-sidebar); }

        /* TABLE STYLES */
        .data-table { width: 100%; border-collapse: collapse; font-size: 0.9rem; border: 1px solid var(--border-color); }
        .data-table th, .data-table td { padding: 12px 14px; vertical-align: middle; border: 1px solid var(--border-color); color: var(--text-primary); }
        .data-table th { font-weight: 700; color: var(--text-secondary); text-transform: uppercase; background-color: var(--bg-active); text-align: center; }
        
        /* Dark Mode Table Borders */
        body.dark-mode .data-table th { background-color: var(--bg-sidebar); }
        body.dark-mode .data-table th, body.dark-mode .data-table td { border-color: #71717a; }
        body.dark-mode .data-table th:not(:first-child), body.dark-mode .data-table td:not(:first-child) { border-left: 1px solid #71717a; }
        
        /* Pagination & Empty State */
        .pagination-container { display: flex; justify-content: space-between; align-items: center; padding-top: 16px; border-top: 1px solid var(--border-color); margin-top: 16px; }
        .empty-state-cell { padding: 60px 20px; text-align: center; border: none !important; background-color: var(--bg-card); }
        .empty-state-icon-large { font-size: 3rem; color: var(--primary); opacity: 0.7; margin-bottom: 0.5rem; display: block; width: 100%; }
        
        /* Responsive */
        .col-hide-mobile { display: none !important; }
        @media (max-width: 768px) {
            .main-toolbar, .pagination-container { flex-direction: column; align-items: stretch; gap: 12px; }
            .col-hide-mobile { display: none !important; }
        }

        /* 🎨 4. LITEPICKER DARK MODE FIX (FIXED!) */
        /* Menggunakan warna hardcoded karena Litepicker berada di luar scope variabel */
        body.dark-mode .litepicker { 
            background-color: #1f2937 !important; 
            border: 1px solid #374151 !important; 
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.5) !important;
        }
        body.dark-mode .litepicker .container__months,
        body.dark-mode .litepicker .container__days {
            background-color: transparent !important;
        }
        body.dark-mode .litepicker .container__months .month-item .month-header { 
            background-color: #1f2937 !important;
            color: #f1f5f9 !important;
        }
        body.dark-mode .litepicker .container__months .month-item .month-header select { 
            color: #f1f5f9 !important;
            background-color: #1f2937 !important;
            border: 1px solid #374151 !important;
        }
        body.dark-mode .litepicker .day-item { 
            color: #f1f5f9 !important; 
            background-color: transparent !important;
        }
        body.dark-mode .litepicker .day-item:hover { 
            color: #ffffff !important; 
            background-color: #374151 !important;
        }
        body.dark-mode .litepicker .day-item.is-in-range,
        body.dark-mode .litepicker .day-item.is-start-date,
        body.dark-mode .litepicker .day-item.is-end-date { 
            background-color: #3b82f6 !important; 
            color: #ffffff !important; 
        }
        body.dark-mode .litepicker .button-next-month, 
        body.dark-mode .litepicker .button-prev-month { 
            filter: invert(1) brightness(2); /* Membuat panah SVG menjadi putih */
            cursor: pointer;
        }
    </style>
    @endpush
    
    {{-- 2. ALPINE JS WRAPPER --}}
    <div x-data="{ 
        isFilterSectionOpen: false, 
        litePicker: null,
        initLitePicker() {
            if (this.$refs.tanggalRange && typeof Litepicker !== 'undefined' && !this.litePicker) {
                this.litePicker = new Litepicker({
                    element: this.$refs.tanggalRange,
                    singleMode: false, numberOfMonths: 2, numberOfColumns: 2,
                    format: 'YYYY-MM-DD', separator: ' - ',
                    dropdowns: { minYear: 2000, maxYear: new Date().getFullYear(), months: true, years: true },
                    setup: (picker) => {
                        picker.on('selected', (date1, date2) => {
                            if (date1 && date2) { $wire.set('tanggal_mulai', date1.format('YYYY-MM-DD')); $wire.set('tanggal_selesai', date2.format('YYYY-MM-DD')); }
                        });
                        picker.on('clear', () => { $wire.set('tanggal_mulai', ''); $wire.set('tanggal_selesai', ''); });
                        if ($wire.tanggal_mulai && $wire.tanggal_selesai) { picker.setRange($wire.tanggal_mulai, $wire.tanggal_selesai); }
                    }
                });
            }
        },
        toggleFilter() {
            this.isFilterSectionOpen = !this.isFilterSectionOpen;
            if (this.isFilterSectionOpen) { this.$nextTick(() => { this.initLitePicker(); }); }
        }
    }" 
    x-init="initLitePicker()"
    @clear-datepicker.window="if(litePicker) { litePicker.clear(); }"
    class="livewire-scope"> 
    
        {{-- NOTIFIKASI --}}
        @if (session()->has('success'))
        <div class="alert alert-success notification-popup" role="alert">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
        </div>
        @endif
        @if (session()->has('info'))
        <div class="alert alert-info notification-popup" role="alert">
            <i class="bi bi-info-circle"></i> {{ session('info') }}
        </div>
        @endif

        {{-- 4. TOOLBAR UTAMA --}}
        <div class="main-toolbar">
            <div class="search-bar-table">
                <i class="bi bi-search"></i>
                <input wire:model.live.debounce.300ms="searchQuery" type="text" placeholder="Cari nomor box, nomor berkas, kode, atau uraian..." autocomplete="off">
            </div>
        </div>

        {{-- 5. KONTEN HALAMAN (CARD UTAMA) --}}
        <section class="card animated-card">
            
            {{-- ACTIONS BAR --}}
            <div class="table-actions-bar">
                <button @click="toggleFilter()" class="action-button btn-primary-live">
                    <i class="bi bi-filter"></i> <span>Filter</span>
                </button>
                <button wire:click="exportExcel" class="action-button btn-primary-live">
                    <i class="bi bi-file-earmark-excel"></i> 
                    <span>
                        {{ count($selectedArsip) > 0 ? 'Ekspor (' . count($selectedArsip) . ') Item' : 'Ekspor' }}
                    </span>
                </button>
            </div>
            
            {{-- FILTER SECTION --}}
            <div class="filter-container" x-show="isFilterSectionOpen" x-transition.duration.300ms style="display: none;">
                <div class="filter-container-header">
                    <h3><i class="bi bi-filter"></i> Filter Arsip Permanen</h3>
                </div>
                <div class="filter-container-body">
                    
                    {{-- 1. Filter Bidang (LOGIKA: Hanya muncul untuk Super Admin) --}}
                    @if(auth()->user()->role === 'super_admin') 
                        <div>
                            <label for="filterBidang">Filter Berdasarkan Bidang</label>
                            
                            {{-- LIST BIDANG HARDCODED SESUAI PERMINTAAN --}}
                            <select id="filterBidang" wire:model.live="filterBidang" class="form-select-sm">
                                <option value="">Semua Bidang</option>
                                <option value="Sub.Bagian Umum dan Kepegawaian">Sub.Bagian Umum dan Kepegawaian</option>
                                <option value="Sub.Bagian Keuangan">Sub.Bagian Keuangan</option>
                                <option value="Sub.Bagian Penyusunan Program dan Anggaran">Sub.Bagian Penyusunan Program dan Anggaran</option>
                                <option value="Bidang Pemerintahan">Bidang Pemerintahan</option>
                                <option value="Bidang Pembangunan Ekonomi">Bidang Pembangunan Ekonomi</option>
                                <option value="Bidang Kemasyarakatan">Bidang Kemasyarakatan</option>
                                <option value="Bidang Sarana dan Prasarana">Bidang Sarana dan Prasarana</option>
                            </select>
                        </div>
                    @endif
                    
                    {{-- 2. Filter Tanggal --}}
                    <div style="grid-column: span 2;">
                        <label for="tanggalRange">Rentang Tanggal Permanen</label>
                        <input id="tanggalRange" x-ref="tanggalRange" type="text" class="form-input-sm" placeholder="Pilih rentang tanggal (Mulai - Selesai)" autocomplete="off"> 
                    </div>
                </div>
                <div class="filter-container-footer">
                    <button wire:click="resetFilters" class="action-button">
                        <i class="bi bi-arrow-counterclockwise"></i> Reset Filter
                    </button>
                </div>
            </div>

            {{-- 7. TABEL DATA --}}
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        {{-- BARIS 1 HEADER (ROWSPAN/COLSPAN) --}}
                        <tr>
                            {{-- KOLOM CHECKBOX --}}
                            <th style="width: 40px; vertical-align: middle;" rowspan="2">
                                <input type="checkbox" wire:model.live="selectAll" title="Pilih Semua Halaman Ini">
                            </th>

                            <th style="width: 40px; vertical-align: middle;" rowspan="2">No</th>
                            
                            {{-- NOMOR --}}
                            <th style="white-space: nowrap;" colspan="2">Nomor</th>
                            
                            <th style="white-space: nowrap; min-width: 120px; vertical-align: middle;" rowspan="2">
                                BIDANG PENGOLAH
                            </th>
                            
                            <th style="white-space: nowrap; min-width: 150px; vertical-align: middle;" rowspan="2">
                                KODE KLASIFIKASI<br>& INDEX
                            </th>
                            
                            <th style="min-width: 250px; vertical-align: middle;" rowspan="2">Uraian</th>
                            
                            <th style="white-space: nowrap; vertical-align: middle;" rowspan="2">Kurun Waktu</th>
                            
                            <th style="width: 80px; vertical-align: middle;" rowspan="2">Jumlah</th>
                            
                            <th style="white-space: nowrap; min-width: 120px; vertical-align: middle;" rowspan="2">
                                TANGGAL PERMANEN
                            </th>
                            
                            {{-- Hidden Columns --}}
                            <th class="col-hide-mobile" style="white-space: nowrap; vertical-align: middle;" rowspan="2">Klasifikasi Keamanan</th>
                            <th class="col-hide-mobile" style="white-space: nowrap; vertical-align: middle;" rowspan="2">Klasifikasi Akses</th>
                            <th class="col-hide-mobile" style="white-space: nowrap;" rowspan="2">Tingkat Perkembangan</th>
                            
                            <th style="width: 100px; vertical-align: middle;" rowspan="2">Aksi</th>
                        </tr>
                        
                        {{-- BARIS 2 HEADER --}}
                        <tr>
                            <th>BOX</th>
                            <th>BERKAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($arsips as $index => $arsip)
                        <tr class="clickable-row">

                            {{-- CHECKBOX PER BARIS --}}
                            <td class="text-center" style="vertical-align: middle;" onclick="event.stopPropagation();">
                                <input type="checkbox" wire:model.live="selectedArsip" value="{{ $arsip->id }}" onclick="event.stopPropagation();">
                            </td>

                            <td class="text-center">{{ $arsips->firstItem() + $index }}</td>
                            
                            <td class="text-center"><strong style="color: var(--primary-blue);">{{ $arsip->nomor_box ?? '-' }}</strong></td>
                            <td class="text-center">{{ $arsip->nomor_berkas ?? '-' }}</td>
                            
                            <td class="text-center text-wrap" style="text-transform: capitalize;">
                                {{ str_replace('_', ' ', $arsip->bidang ?? '-') }}
                            </td>
                            
                            <td class="text-center">
                                <strong>{{ $arsip->kode_klasifikasi ?? '-' }}</strong>
                                @if(isset($arsip->index) && $arsip->index != '-') . {{ $arsip->index ?? '-' }}@endif
                            </td>

                            <td class="text-wrap" style="text-align: left;">{{ $arsip->uraian ?? '-' }}</td>
                            
                            <td class="text-center">{{ $arsip->kurun_waktu ?? '-' }}</td>
                            <td class="text-center">{{ $arsip->jumlah ?? 0 }}</td>
                            
                            {{-- TANGGAL TANPA JAM & LOGIC FALLBACK --}}
                            <td class="text-center">
                                <span class="font-semibold" style="color: var(--color-green);">
                                     @if(!empty($arsip->tanggal_permanen))
                                         {{ \Carbon\Carbon::parse($arsip->tanggal_permanen)->format('d M Y') }}
                                     @elseif(!empty($arsip->tgl_retensi_berakhir))
                                         {{ \Carbon\Carbon::parse($arsip->tgl_retensi_berakhir)->format('d M Y') }}
                                     @else
                                         -
                                     @endif
                                </span>
                            </td>

                            <td class="col-hide-mobile text-center">{{ $arsip->klasifikasi_keamanan ?? '-' }}</td>
                            <td class="col-hide-mobile text-center">{{ $arsip->klasifikasi_akses ?? '-' }}</td>
                            <td class="col-hide-mobile text-center">{{ $arsip->tingkat_perkembangan ?? '-' }}</td>
                            
                            {{-- AKSI --}}
                            <td class="action-buttons text-center" onclick="event.stopPropagation();">
                                <a href="{{ route('arsip.inaktif.show', $arsip->id) }}" class="btn-icon" title="Lihat Detail">
                                    <i class="bi bi-eye" style="color: var(--primary-blue);"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="14" class="empty-state-cell"> 
                                <div class="empty-state-content">
                                    <i class="bi bi-lock-fill empty-state-icon-large"></i>
                                    <span class="empty-state-title">Data Arsip Permanen Tidak Ditemukan</span>
                                    <span class="empty-state-message">
                                        Belum ada arsip yang ditetapkan sebagai permanen.
                                    </span>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- 8. PAGINATION --}}
            <div class="pagination-container">
                <span class="pagination-info" style="color: var(--text-sub); font-size: 0.9rem;">
                    Menampilkan {{ $arsips->firstItem() ?? 0 }}-{{ $arsips->lastItem() ?? 0 }} dari {{ $arsips->total() ?? 0 }} arsip
                </span>
                <div class="pagination-buttons">
                    {{ $arsips->links() }}
                </div>
            </div>

        </section>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/litepicker.js"></script>
    @endpush
</div>