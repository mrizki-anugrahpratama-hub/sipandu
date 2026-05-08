<div>
    {{-- [HEADER/BREADCRUMB] --}}
    <x-slot name="header">
        @php
            $urlBidang = $slugBidangYangDibuka ? route('dashboard.' . str_replace('_', '-', $slugBidangYangDibuka)) : '#';
            
            // PERBAIKAN: Tambahkan parameter filterBidang agar tetap terkunci di sub-bidang (misal: umpeg)
            $urlArsipInaktif = route('arsip.inaktif.index', ['filterBidang' => $slugBidangYangDibuka]);
        @endphp
    
        <div class="welcome-title-group">
            <h1>Daftar Berkas Inaktif</h1>
            <div class="breadcrumbs">
                {{-- Nama bidang diambil langsung dari $namaBidangYangDibuka yang sudah diproses Controller --}}
                <a href="{{ $urlBidang }}" class="breadcrumb-item active">{{ $namaBidangYangDibuka }}</a>
                <i class="bi bi-chevron-right breadcrumb-separator"></i>
                <span class="breadcrumb-item active">Arsip Inaktif</span>
            </div>
        </div>
    </x-slot>

    {{-- 1. CSS (LITEPICKER & TABLE ENHANCEMENT) --}}
    @push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css">
    
    <style>
        /* Litepicker Dark Mode Fixes */
        body.dark-mode .litepicker { 
            background: var(--bg-sidebar); 
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }
        body.dark-mode .litepicker .button-next-month,
        body.dark-mode .litepicker .button-prev-month {
            filter: invert(1); 
        }
        body.dark-mode .litepicker .container__months > .month-item .month-header {
            color: var(--text-primary);
        }
        body.dark-mode .litepicker .container__months > .month-item .day-item {
            color: var(--text-primary);
        }
        body.dark-mode .litepicker .container__months > .month-item .day-item:hover {
            background-color: var(--bg-active);
        }
        body.dark-mode .litepicker .container__months > .month-item .day-item.is-selected {
            background-color: var(--primary-blue) !important;
            border-color: var(--primary-blue) !important;
            color: var(--text-light);
        }
        
        /* === TAMBAHAN UNTUK VISIBILITAS DARK MODE === */
        
        body.dark-mode .litepicker .container__months {
            background-color: var(--bg-main); 
            color: var(--text-primary);
        }
        
        body.dark-mode .litepicker .container__months .day-item {
            color: var(--text-primary); 
        }
        
        body.dark-mode .litepicker .container__months .day-item.is-in-range,
        body.dark-mode .litepicker .container__months .day-item.is-start-date,
        body.dark-mode .litepicker .container__months .day-item.is-end-date {
            color: var(--text-light) !important;
        }

        body.dark-mode .litepicker .container__months .month-item .month-weekday {
            color: var(--text-secondary); 
        }
        
        body.dark-mode .litepicker .container__months .month-item .month-header select {
            color: var(--text-primary) !important;
            background-color: var(--bg-sidebar) !important;
            border: 1px solid var(--border-color) !important;
        }
        
        body.dark-mode .litepicker .container__months .day-item.is-in-range {
            background-color: var(--primary-blue-light) !important; 
        }
        
        body.dark-mode .litepicker .container__months .day-item.is-outside-month {
            color: var(--text-muted) !important; 
        }
        
        /* ============================================== */

        .notification-popup {
            position: fixed; top: 20px; left: 50%; transform: translateX(-50%);
            z-index: 1050; width: auto; max-width: 90%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .notification-enter { transition: all 0.5s ease-out; }
        .notification-enter-start { opacity: 0; transform: translateX(-50%) translateY(-50px); }
        .notification-enter-end { opacity: 1; transform: translateX(-50%) translateY(0); }
        .notification-leave { transition: opacity 0.5s ease-in; }
        .notification-leave-start { opacity: 1; }
        .notification-leave-end { opacity: 0; }

        /* --- FORM INPUTS --- */
        .form-select-sm, .form-input-sm {
            padding: 10px 14px; border-radius: var(--radius-md);
            border: 1px solid var(--border-color); background-color: var(--bg-white);
            color: var(--text-primary); font-size: 0.95rem;
            transition: all 0.2s var(--transition-timing); height: 42px; width: 100%;
        }
        .form-select-sm:focus, .form-input-sm:focus {
            outline: none; border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px var(--primary-blue-light);
        }
        .form-input-sm { cursor: pointer; }

        /* DARK MODE SUPPORT */
        body.dark-mode .form-input-sm, body.dark-mode .form-select-sm { background-color: var(--bg-sidebar); }
        
        .card:not(.stat-card):hover { transform: none; box-shadow: none; }

        /* --- BAGIAN TABEL FULL GRID (KOTAK-KOTAK) --- */
        .table-responsive {
            width: 100%; overflow-x: auto; -webkit-overflow-scrolling: touch;
        }

        .data-table {
            border-collapse: collapse; 
            width: 100%;
            border: 1px solid var(--border-color); 
        }

        /* Menggunakan padding dari kode aktif untuk konsistensi */
        .data-table th,
        .data-table td {
            padding: 14px 16px; /* Diambil dari kode aktif */
            vertical-align: middle;
            font-size: 0.95rem;
            border: 1px solid var(--border-color); 
        }
        
        /* Perbaikan untuk tampilan grid (opsional, tergantung tema global Anda) */
        .data-table th:not([rowspan]),
        .data-table thead tr:first-child th {
            border-top: 1px solid var(--border-color);
        }
        .data-table th:not(:first-child),
        .data-table td:not(:first-child) {
            border-left: 1px solid var(--border-color);
        }


        .data-table th {
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            background-color: var(--bg-active);
            text-align: center;
            line-height: 1.3;
        }

        .data-table tbody tr:hover { background-color: var(--bg-main); }
        .data-table tbody tr.clickable-row:hover { background-color: var(--bg-main); cursor: pointer; }
        
        /* START REVISI CSS UNTUK MENYESUAIKAN DENGAN KODE AKTIF */
        .data-table .text-wrap { 
            white-space: normal; 
            min-width: 300px; /* Sesuai dengan kode aktif */
            word-break: break-word; 
        }
        /* END REVISI CSS */
        
        .data-table .text-center { text-align: center; }

        .data-table tbody tr.row-selected { background-color: var(--primary-blue-light) !important; }
        body.dark-mode .data-table tbody tr.row-selected { background-color: #374151 !important; }

        /* --- PAGINATION & TOOLBARS --- */
        .pagination-container {
            display: flex; justify-content: space-between; align-items: center;
            padding: 16px 24px; border-top: 1px solid var(--border-color);
            font-size: 0.9rem; color: var(--text-secondary);
        }
        .pagination-buttons nav { display: flex; gap: 8px; }
        .pagination-buttons .pagination, .pagination-buttons .page-item { margin: 0; }
        .pagination-buttons .page-item .page-link {
            display: inline-flex; align-items: center; justify-content: center;
            padding: 8px 14px; font-size: 0.9rem; font-weight: 500;
            color: var(--text-secondary); text-decoration: none;
            background-color: var(--bg-white); border: 1px solid var(--border-color);
            border-radius: var(--radius-md) !important; transition: all 0.2s; box-shadow: none;
        }
        .pagination-buttons .page-item .page-link:hover { background-color: var(--bg-active); color: var(--text-primary); border-color: var(--border-color); }
        .pagination-buttons .page-item.active .page-link { background-color: var(--primary-blue); color: var(--text-light); border-color: var(--primary-blue); font-weight: 600; z-index: 1; }
        .pagination-buttons .page-item.disabled .page-link { color: var(--text-muted); background-color: var(--bg-active); opacity: 0.7; cursor: not-allowed; border-color: var(--border-color); }

        .main-toolbar { display: flex; justify-content: space-between; align-items: center; gap: 16px; margin-bottom: 20px; }
        
        .main-toolbar .search-bar-table { 
            flex-grow: 1; 
            max-width: none; 
            position: relative; 
        }
        
        .search-bar-table i { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: var(--text-muted); font-size: 1rem; }
        .search-bar-table input {
            width: 100%; padding: 10px 14px 10px 40px; border-radius: var(--radius-md);
            border: 1px solid var(--border-color); background-color: var(--bg-white);
            color: var(--text-primary); font-size: 0.95rem; transition: all 0.2s var(--transition-timing); height: 42px;
        }
        .search-bar-table input:focus { outline: none; border-color: var(--primary-blue); box-shadow: 0 0 0 3px var(--primary-blue-light); }
        body.dark-mode .search-bar-table input { background-color: var(--bg-sidebar); }

        .table-actions-bar { display: flex; gap: 12px; padding-bottom: 20px; flex-wrap: wrap; }
        .table-actions-bar .action-button {
            display: inline-flex; align-items: center; gap: 8px; padding: 8px 12px;
            font-size: 0.9rem; font-weight: 600; border: 1px solid var(--primary-blue);
            background-color: var(--bg-white); color: var(--primary-blue); border-radius: var(--radius-md);
            height: 38px; cursor: pointer; transition: all 0.2s;
        }
        .table-actions-bar .action-button:hover { background-color: var(--primary-blue-light); border-color: var(--primary-blue); }
        .table-actions-bar .action-button i { font-size: 1.1rem; color: var(--primary-blue); }
        .table-actions-bar .action-button.btn-primary-live { background-color: var(--primary-blue); color: var(--text-light); border-color: var(--primary-blue); }
        .table-actions-bar .action-button.btn-primary-live i { color: var(--text-light); }
        .table-actions-bar .action-button.btn-primary-live:hover { background-color: #3a5de0; border-color: #3a5de0; }
        body.dark-mode .table-actions-bar .action-button { background-color: var(--bg-sidebar); color: var(--primary-blue); border-color: var(--primary-blue); }
        body.dark-mode .table-actions-bar .action-button:hover { background-color: var(--bg-active); }
        body.dark-mode .table-actions-bar .action-button.btn-primary-live { background-color: var(--primary-blue); color: var(--text-light); border-color: var(--primary-blue); }
        body.dark-mode .table-actions-bar .action-button.btn-primary-live:hover { background-color: #3a5de0; }

        .filter-container { border: 1px solid var(--border-color); border-radius: var(--radius-lg); margin-top: 0px; margin-bottom: 20px; overflow: hidden; }
        .filter-container-header { padding: 16px 24px; background-color: var(--bg-active); border-bottom: 1px solid var(--border-color); }
        .filter-container-header h3 { font-size: 1.125rem; font-weight: 600; color: var(--text-primary); margin: 0; }
        
        /* Menggunakan tata letak grid 2 kolom auto-fit */
        .filter-container-body { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; padding: 24px; background-color: var(--bg-active); }
        body.dark-mode .filter-container-body { background-color: var(--bg-active); }
        
        .filter-container-footer { padding: 16px 24px; border-top: 1px solid var(--border-color); background-color: var(--bg-active); display: flex; justify-content: flex-end; }
        body.dark-mode .filter-container-footer { background-color: var(--bg-active); }

        .action-buttons { display: flex; justify-content: center; align-items: center; gap: 10px; padding: 0; white-space: nowrap; }
        .btn-icon {
            display: inline-flex; align-items: center; justify-content: center;
            padding: 8px; border-radius: var(--radius-md); background-color: transparent;
            color: var(--primary-blue); border: 1px solid transparent; cursor: pointer;
            transition: all 0.2s; font-size: 1.1rem;
        }
        .btn-icon:hover { background-color: var(--primary-blue-light); border-color: var(--primary-blue-light); }
        .btn-icon.btn-icon-danger { color: #ff5c5c; }
        .btn-icon.btn-icon-danger:hover { background-color: #ffe6e6; border-color: #ffe6e6; }
        .btn-icon i { vertical-align: middle; }

        /* Gaya Khusus untuk Opsi Laporan */
        .filter-checkbox-group {
            padding-top: 5px; 
            margin-top: 15px;
        }
        .filter-checkbox-group.report-options {
            padding: 15px 0 5px; 
            border-top: 1px solid var(--border-color);
            margin-top: 20px;
        }

        .filter-checkbox-group label {
            display: flex; 
            flex-direction: column; 
            align-items: flex-start;
            gap: 2px;
            color: var(--text-primary); 
            font-weight: 500; 
            font-size: 0.95rem;
            cursor: pointer;
            margin-bottom: 12px;
        }
        
        .report-label-content {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filter-checkbox-group .small-info {
            display: block;
            font-size: 0.8rem;
            color: var(--text-muted);
            line-height: 1.2;
            padding-left: 28px;
        }
        .filter-checkbox-group input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: var(--primary-blue);
            margin: 0;
            flex-shrink: 0;
        }
        .col-span-full { grid-column: 1 / -1; }

        /* Icon File Styling */
        .file-icon {
            color: var(--primary-blue);
            transition: color 0.2s;
        }
        .file-icon:hover {
            color: var(--primary-blue-dark);
        }


        @media (max-width: 768px) {
            .main-toolbar { flex-wrap: wrap; justify-content: center; }
            .main-toolbar .search-bar-table { max-width: 100%; order: 2; min-width: 100%; }
            .main-toolbar a.btn-primary { width: 100%; text-align: center; order: 1; margin-bottom: 12px; }
            .data-table .col-hide-mobile { display: none; }
            .pagination-container { flex-direction: column; gap: 12px; align-items: center; padding: 16px; }
            .pagination-buttons nav { justify-content: center; }
            
            /* Pada mobile, filter-container-body menjadi 1 kolom */
            .filter-container-body { grid-template-columns: 1fr; }
        }
        
        /* Perbaikan Mode Malam untuk Border */
        body.dark-mode .data-table th, 
        body.dark-mode .data-table td {
            border: 1px solid #71717a; 
        }
    </style>
    @endpush
    
    {{-- 2. ALPINE JS WRAPPER (Menggunakan Litepicker) --}}
    <div x-data="{ 
        isFilterSectionOpen: false, 
        litePicker: null, 
    
        initLitePicker() {
            this.$nextTick(() => {
                if (this.$refs.tanggalRange && typeof Litepicker !== 'undefined' && !this.litePicker) {
                    this.litePicker = new Litepicker({
                        element: this.$refs.tanggalRange,
                        singleMode: false,
                        numberOfMonths: 2,
                        numberOfColumns: 2,
                        format: 'YYYY-MM-DD',
                        separator: ' - ', 
                        lang: 'id',
                        tooltipText: { one: 'hari', other: 'hari' },
                        dropdowns: {
                            minYear: 2000,
                            maxYear: (new Date()).getFullYear(),
                            months: true,
                            years: true
                        },
                        setup: (picker) => {
                            picker.on('selected', (date1, date2) => {
                                if (date1 && date2) {
                                    $wire.set('tanggal_mulai', date1.format('YYYY-MM-DD'));
                                    $wire.set('tanggal_selesai', date2.format('YYYY-MM-DD'));
                                }
                            });
                            picker.on('clear', () => { 
                                $wire.set('tanggal_mulai', '');
                                $wire.set('tanggal_selesai', '');
                            });
                            if ($wire.tanggal_mulai && $wire.tanggal_selesai) {
                                picker.setRange($wire.tanggal_mulai, $wire.tanggal_selesai);
                            }
                        }
                    });
                }
            });
        },
        toggleFilter() {
            this.isFilterSectionOpen = !this.isFilterSectionOpen;
            if (this.isFilterSectionOpen) {
                this.$nextTick(() => {
                    this.initLitePicker();
                });
            }
        }
    }" 
    x-init="initLitePicker()"
    @clear-datepicker.window="
        if (litePicker) { 
            litePicker.clear(); 
            $wire.set('tanggal_mulai', '');
            $wire.set('tanggal_selesai', '');
        }
    ">
    
        {{-- 3. BLOK NOTIFIKASI --}}
        @if (session()->has('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
             x-transition:enter="notification-enter" x-transition:enter-start="notification-enter-start"
             x-transition:enter-end="notification-enter-end" x-transition:leave="notification-leave"
             x-transition:leave-start="notification-leave-start" x-transition:leave-end="notification-leave-end"
             class="alert alert-success notification-popup" role="alert">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
        </div>
        @endif
        @if (session()->has('error'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
             x-transition:enter="notification-enter" x-transition:enter-start="notification-enter-start"
             x-transition:enter-end="notification-enter-end" x-transition:leave="notification-leave"
             x-transition:leave-start="notification-leave-start" x-transition:leave-end="notification-leave-end"
             class="alert alert-danger notification-popup" role="alert">
            <i class="bi bi-x-circle"></i> {{ session('error') }}
        </div>
        @endif

        {{-- 4. TOOLBAR UTAMA --}}
        <div class="main-toolbar">
            <div class="search-bar-table">
                <i class="bi bi-search"></i>
                <input wire:model.live.debounce.300ms="search" type="text" 
                        placeholder="Cari kode, nomor, uraian, kurun waktu, atau index..." autocomplete="off">
            </div>
            <a href="{{ route('arsip.inaktif.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Arsip
            </a>
        </div>

        {{-- 5. KONTEN HALAMAN (CARD UTAMA) --}}
        <section class="card animated-card">
            
            {{-- Tombol Aksi Tabel --}}
            <div class="table-actions-bar">
                <button @click="toggleFilter()" class="action-button btn-primary-live">
                    <i class="bi bi-filter"></i> <span>Filter</span>
                </button>
                <button wire:click="exportExcel" class="action-button btn-primary-live">
                    <i class="bi bi-file-earmark-excel"></i> <span>Ekspor Excel</span>
                </button>
                <button wire:click="exportPdf" class="action-button btn-primary-live">
                    <i class="bi bi-file-earmark-pdf"></i> <span>Ekspor PDF</span>
                </button>
            </div>
    
            {{-- Kontainer Filter --}}
            <div class="filter-container" x-show="isFilterSectionOpen" style="display: none;">
                <div class="filter-container-header">
                    <h3><i class="bi bi-filter"></i> Filter Arsip Inaktif</h3>
                </div>
                <div class="filter-container-body">
                    
                    {{-- FILTER 1: Filter Status (Nasib Akhir) - Mengambil 1 unit lebar --}}
                    <div style="grid-column: span 1;">
                        <label for="filterStatusAkhir">Filter Status (Nasib Akhir)</label>
                        <select id="filterStatusAkhir" wire:model.live="filterStatusAkhir" class="form-select-sm">
                            <option value="">Semua Nasib Akhir</option>
                            <option value="Permanen">Permanen</option>
                            <option value="Musnah">Musnah</option>
                        </select>
                    </div>
                    
                    {{-- FILTER 2: Rentang Tanggal - Mengambil 2 unit lebar --}}
                    <div style="grid-column: span 2 / span 2;">
                        <label for="tanggalRange">Rentang Tanggal Dibuat</label>
                        {{-- Input tunggal untuk Litepicker --}}
                        <input id="tanggalRange" x-ref="tanggalRange"
                                type="text" class="form-input-sm"
                                placeholder="Pilih rentang tanggal (Mulai - Selesai)" autocomplete="off"
                                wire:model="tanggal_mulai"> 
                    </div>

                    {{-- Opsi Laporan Excel (Grid Penuh) --}}
                    <div class="col-span-full filter-checkbox-group report-options">
                        <label style="font-weight: 600; color: var(--primary-blue); font-size: 1rem; margin-bottom: 10px;">
                            Pilihan Laporan Excel:
                        </label>
                        
                        {{-- Opsi 1: Daftar Berkas (Sheet 1) --}}
                        <label for="laporanBerkas">
                            <div class="report-label-content">
                                <input type="checkbox" id="laporanBerkas" wire:model.live="laporanBerkas">
                                Daftar Berkas (Sheet 1)
                            </div>
                            <span class="small-info">Mencetak daftar arsip induk sesuai filter yang dipilih.</span>
                        </label>
                        
                        {{-- Opsi 2: Daftar Isi Berkas (Sheet 2) --}}
                            <label for="laporanIsiBerkas">
                            <div class="report-label-content">
                                <input type="checkbox" id="laporanIsiBerkas" wire:model.live="laporanIsiBerkas">
                                Daftar Isi Berkas (Sheet 2)
                            </div>
                            <span class="small-info">Mencetak semua detail item dari berkas induk yang terpilih.</span>
                        </label>
                    </div>

                </div>
                <div class="filter-container-footer">
                    <button wire:click="resetFilters" class="btn btn-secondary">
                        <i class="bi bi-arrow-counterclockwise"></i> Reset Filter
                    </button>
                </div>
            </div>

            {{-- 6. TABEL DATA --}}
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th style="width: 50px;" rowspan="2">
                                <input type="checkbox" wire:model.live="selectAll" title="Pilih Semua Halaman Ini">
                            </th>
                            <th style="width: 50px;" rowspan="2">No</th>
                            
                            {{-- Header Bertingkat --}}
                            <th style="white-space: nowrap;" colspan="2">Nomor</th>
                            
                            <th class="text-center" style="min-width: 250px; width: 20%;" rowspan="2">
                                KODE KLASIFIKASI<br>& INDEX
                            </th>
                            
                            <th class="text-center" rowspan="2">Uraian</th>
                            
                            <th style="white-space: nowrap; width: 100px;" rowspan="2">Kurun Waktu</th>
                            <th style="width: 80px;" rowspan="2">Jumlah</th>
                            
                            {{-- Kolom Baru: FILE (Berada di sebelah kiri Aksi) --}}
                            <th style="width: 80px;" rowspan="2">FILE</th> 

                            {{-- Judul Header Lengkap --}}
                            <th class="col-hide-mobile" style="white-space: nowrap; width: 120px;" rowspan="2">Klasifikasi Keamanan</th>
                            <th class="col-hide-mobile" style="white-space: nowrap; width: 120px;" rowspan="2">Klasifikasi Akses</th>
                            <th class="col-hide-mobile" style="white-space: nowrap; width: 140px;" rowspan="2">Tingkat Perkembangan</th>
                            <th style="white-space: nowrap; width: 120px;" rowspan="2">Status Akhir</th>
                            <th style="width: 100px;" rowspan="2">Aksi</th>
                        </tr>
                        <tr>
                            <th style="white-space: nowrap;">Box</th>
                            <th style="white-space: nowrap;">Berkas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($arsipInaktif as $index => $arsip)
                            <tr class="clickable-row {{ collect($selectedArsip)->contains($arsip->id) ? 'row-selected' : '' }}"
                                wire:key="row-{{ $arsip->id }}"
                                {{-- onclick="window.location.href = @js(route('arsip.inaktif.show', $arsip->id));"> --}}
                                onclick="window.location.href = @js(route('arsip.inaktif.show', ['id' => $arsip->id, 'from' => 'inaktif']));">
                                {{-- @click="window.location.href = '{{ route('arsip.inaktif.show', ['id' => $arsip->id, 'from' => 'inaktif']) }}'"> --}}

                                <td class="text-center" style="vertical-align: middle;" onclick="event.stopPropagation();">
                                    <input type="checkbox" wire:model.live="selectedArsip" value="{{ $arsip->id }}" onclick="event.stopPropagation();">
                                </td>

                                <td class="text-center">{{ $arsipInaktif->firstItem() + $index }}</td>
                                
                                {{-- Nomor Box & Berkas --}}
                                <td class="text-center"><strong style="color: var(--primary-blue);">{{ $arsip->nomor_box }}</strong></td>
                                <td class="text-center">{{ $arsip->nomor_berkas }}</td>
                                
                                {{-- Kode Klasifikasi & Index (Lebar Sesuai Aktif) --}}
                                <td class="text-center">
                                    <strong>
                                        {{ $arsip->kode_klasifikasi }}
                                        @if(isset($arsip->index) && $arsip->index != '-' && !empty($arsip->index))
                                        . {{ $arsip->index }}
                                        @endif
                                    </strong>
                                </td>

                                {{-- Uraian (Lebar Sesuai Aktif, menggunakan text-wrap) --}}
                                <td class="text-wrap" style="text-align: left;">{{ $arsip->uraian }}</td>
                                
                                <td class="text-center">{{ $arsip->kurun_waktu }}</td>
                                <td class="text-center">{{ $arsip->jumlah }}</td>
                                
                                {{-- KOLOM BARU: FILE --}}
                                <td class="text-center" onclick="event.stopPropagation();">
                                    @php
                                        $fileCount = $arsip->files_count ?? 0;
                                        // // Tentukan URL tujuan: Storage langsung jika 1 file, atau halaman manage jika > 1 atau 0.
                                        // $singleFilePath = ($fileCount == 1 && $arsip->files->isNotEmpty()) 
                                        //     // [PERBAIKAN] Gunakan path_file, BUKAN path
                                        //     ? asset('storage/' . $arsip->files->first()->path_file) 
                                        //     : route('arsip.inaktif.files.manage', $arsip->id);
                                        $manageFilesUrl = route('arsip.inaktif.files.manage', ['id' => $arsip->id, 'from' => 'inaktif']);
                                    @endphp
                                    {{-- <a href="{{ $singleFilePath }}" 
                                       class="file-icon" 
                                       title="{{ $fileCount == 1 ? 'Lihat File Langsung' : 'Kelola File' }}"
                                       target="{{ $fileCount == 1 ? '_blank' : '_self' }}">
                                        <i class="bi bi-file-earmark-arrow-up"></i>
                                        @if ($fileCount > 0)
                                            <span style="font-size: 0.8rem; font-weight: 600;"> ({{ $fileCount }})</span>
                                        @endif
                                    </a> --}}
                                    <a href="{{ ($fileCount == 1) ? asset('storage/' . $arsip->files->first()->path_file) : $manageFilesUrl }}">
                                        <i class="bi bi-file-earmark-arrow-up"></i>
                                        @if ($fileCount > 0)
                                            <span style="font-size: 0.8rem; font-weight: 600;"> ({{ $fileCount }})</span>
                                        @endif
                                    </a>
                                </td>

                                <td class="col-hide-mobile text-center">{{ $arsip->klasifikasi_keamanan ?? '-' }}</td>
                                <td class="col-hide-mobile text-center">{{ $arsip->klasifikasi_akses ?? '-' }}</td>
                                <td class="col-hide-mobile text-center">{{ $arsip->tingkat_perkembangan ?? '-' }}</td>
                                <td class="text-center">{{ $arsip->status_akhir ?? '-' }}</td>

                                <td class="action-buttons text-center" onclick="event.stopPropagation();">
                                    <a href="{{ route('arsip.inaktif.edit', $arsip->id) }}" class="btn-icon" title="Ubah">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <button wire:click="confirmDelete({{ $arsip->id }})" class="btn-icon btn-icon-danger" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="14"> {{-- Kolom colspan disesuaikan (13 + 1 kolom File = 14) --}}
                                    <div style="text-align: center; padding: 40px; color: var(--text-muted);">
                                        <i class="bi bi-inbox" style="font-size: 3rem; display: block; margin-bottom: 10px;"></i>
                                        Data tidak ditemukan
                                        @if(!empty($search) || !empty($filterStatusAkhir) || !empty($tanggal_mulai) || !empty($tanggal_selesai))
                                        <br><span style="font-size: 0.9rem;">Coba ubah kata kunci pencarian atau filter Anda.</span>
                                        @else
                                        <br><span style="font-size: 0.9rem;">Belum ada data arsip inaktif yang ditambahkan.</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- 7. PAGINATION --}}
            <div class="pagination-container">
                <span class="pagination-info">
                    Menampilkan {{ $arsipInaktif->firstItem() ?? 0 }}-{{ $arsipInaktif->lastItem() ?? 0 }}
                    dari {{ $arsipInaktif->total() }} arsip
                </span>
                <div class="pagination-buttons">
                    {{ $arsipInaktif->links() }}
                </div>
            </div>

        </section>
        {{-- AKHIR KONTEN HALAMAN --}}
    </div>

    {{-- 8. MODAL KONFIRMASI HAPUS --}}
    @if ($confirmingDeletion)
    <div style="position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); display: flex; align-items: center; justify-content: center; z-index: 1060;">
        <div style="background-color: var(--bg-white); border-radius: var(--radius-lg); padding: 24px; max-width: 400px; width: 90%; box-shadow: var(--shadow-lift);">
            <h3 style="font-size: 1.25rem; font-weight: 600; color: var(--text-primary); margin-bottom: 12px;">
                <i class="bi bi-exclamation-triangle" style="color: #ff5c5c;"></i> Konfirmasi Hapus
            </h3>
            <p style="color: var(--text-secondary); margin-bottom: 20px;">
                Apakah Anda yakin ingin menghapus arsip inaktif ini? Tindakan ini tidak dapat dibatalkan.
            </p>
            <div style="display: flex; gap: 12px; justify-content: flex-end;">
                <button wire:click="$set('confirmingDeletion', false)" class="btn btn-secondary">Batal</button>
                <button wire:click="delete" class="btn btn-danger" style="background-color: #ff5c5c; color: white;">
                    <i class="bi bi-trash"></i> Ya, Hapus
                </button>
            </div>
        </div>
    </div>
    @endif

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/litepicker.js"></script>
    {{-- Tambahkan logika Litepicker bahasa Indonesia di sini jika diperlukan --}}
    @endpush
</div>