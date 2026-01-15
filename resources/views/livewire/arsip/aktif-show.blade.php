<div>
    {{-- 1. HEADER --}}
    <x-slot name="header">
        @php
            $urlBidang = $slugBidangYangDibuka ? route('dashboard.' . str_replace('_', '-', $slugBidangYangDibuka)) : '#';
            $urlArsipAktif = route('arsip.aktif.index');
        @endphp

        <div class="welcome-title-group">
            <h1>Detail Arsip</h1>
            <a href="{{ $urlBidang }}" class="breadcrumb-item active">{{ $namaBidangYangDibuka }}</a>
            <i class="bi bi-chevron-right breadcrumb-separator"></i>
            <a href="{{ $urlArsipAktif }}" class="breadcrumb-item active">Arsip Aktif</a>
            <i class="bi bi-chevron-right breadcrumb-separator"></i>
            <span class="breadcrumb-item active">Detail Arsip</span>
        </div>
    </x-slot>

    {{-- 2. CSS STYLE --}}
    @push('styles')
    <style>
        /* ==================== CSS UTAMA GRID DETAIL ==================== */
        .detail-grid {
            grid-template-columns: max-content 10px 1fr max-content 10px 1fr;
            display: grid;
            gap: 8px 30px; 
            padding: 20px 0;
            line-height: 1.4;
        }
        .detail-item {
            grid-column: span 3;
            display: contents; 
        }
        .detail-item:nth-child(2n) { 
            grid-column: 4 / span 3;
        }
        
        .detail-label {
            font-weight: 500;
            color: var(--text-secondary);
            text-align: left; 
            white-space: nowrap; 
            min-width: 170px;
        }
        .detail-separator {
            margin: 0; font-weight: 600; color: var(--text-secondary);
        }
        .detail-value {
            font-weight: 600; color: var(--text-primary); word-break: break-word; padding-left: 10px; flex-grow: 1;
        }
        .detail-header {
            font-size: 1.2rem; font-weight: 700; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid var(--border-color);
        }
        .detail-card {
            padding: 24px; border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); background-color: var(--bg-white);
        }

        /* Responsive Grid */
        @media (max-width: 992px) {
            .detail-grid { grid-template-columns: max-content 10px 1fr; gap: 5px 15px; }
            .detail-item { grid-column: 1 / -1; display: flex; }
            .detail-item:nth-child(2n) { grid-column: 1 / -1; margin-top: 10px; }
            .detail-item:nth-child(1) { margin-top: 0; }
            .detail-label { min-width: 150px; }
        }

        /* ==================== CSS TABEL MODERN (DARK HEADER) ==================== */
        
        .card-header-action {
             display: flex; justify-content: space-between; align-items: center; 
             margin-bottom: 16px; margin-top: 16px; border-top: 1px solid var(--border-color); padding-top: 24px; 
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            border-radius: 8px;
            box-shadow: 0 0 0 1px var(--border-color);
            overflow: hidden;
            margin-bottom: 1rem;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            white-space: nowrap;
        }

        /* HEADER GELAP */
        .data-table th {
            background-color: #1f2937;
            color: #ffffff;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            padding: 16px;
            border-bottom: 1px solid #374151;
            text-align: left;
            vertical-align: middle;
        }
        .data-table th.text-center { text-align: center; }

        /* BODY TABEL - UPDATE: FONT NORMAL */
        .data-table td {
            padding: 14px 16px;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-primary);
            font-size: 0.9rem;
            vertical-align: top;
            font-weight: 400; /* Memastikan semua teks tabel normal (tidak tebal) */
        }
        .data-table tbody tr:hover { background-color: var(--bg-active); }
        .data-table .text-center { text-align: center; }

        .col-uraian {
            white-space: normal;
            min-width: 250px;
            line-height: 1.5;
        }
        
        /* Tombol & Aksi */
        .action-buttons { display: flex; gap: 8px; justify-content: center; }
        .btn-icon { display: inline-flex; align-items: center; justify-content: center; padding: 8px; border-radius: var(--radius-md); background: transparent; color: var(--primary-blue); border: none; cursor: pointer; transition: 0.2s; text-decoration: none; }
        .btn-icon:hover { background-color: var(--primary-blue-light); }
        .btn-icon-danger { color: #ff5c5c; }
        .btn-icon-danger:hover { background-color: #ffe6e6; }
        
        .btn { display: inline-flex; align-items: center; gap: 8px; padding: 10px 16px; font-weight: 600; border-radius: 6px; text-decoration: none; border: 1px solid transparent; cursor: pointer; }
        .btn-primary { background-color: var(--primary-blue); color: #fff; }
        .btn-primary:hover { background-color: #0056b3; }
        .btn-secondary { background-color: #fff; border: 1px solid #d1d5db; color: #374151; }
        .btn-danger { background-color: #dc2626; color: #fff; }

        /* DARK MODE SUPPORT */
        body.dark-mode .detail-card { background-color: var(--bg-sidebar); }
        body.dark-mode .data-table th { background-color: #111827; border-color: #374151; }
        body.dark-mode .data-table td { border-color: #374151; }
        .row { margin: 0; }
    </style>
    @endpush

    {{-- 3. NOTIFIKASI --}}
    @if (session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
        class="alert alert-success notification-popup" role="alert">
        <i class="bi bi-check-circle"></i> {{ session('success') }}
    </div>
    @endif
    @if (session()->has('error'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
        class="alert alert-danger notification-popup" role="alert">
        <i class="bi bi-x-circle"></i> {{ session('error') }}
    </div>
    @endif
    
    {{-- 4. KONTEN HALAMAN --}}
    <div class="row">
        <div class="col-lg-12">
            @if(isset($arsip))
                <section class="card detail-card animated-card">
                    <div class="detail-body">
                        
                        <h3 class="detail-header">
                            Informasi Berkas "{{ $arsip->nomor_berkas }} - {{ $arsip->uraian }}"
                        </h3>
                        
                        <div class="detail-grid">
                            {{-- BARIS 1 --}}
                            <div class="detail-item"><span class="detail-label">Kode Klasifikasi</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->kode_klasifikasi }}</span></div>
                            <div class="detail-item"><span class="detail-label">Index</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->index ?? '-' }}</span></div>

                            {{-- BARIS 2 --}}
                            <div class="detail-item"><span class="detail-label">Nomor Berkas</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->nomor_berkas }}</span></div>
                            <div class="detail-item"><span class="detail-label">Jumlah Item</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->jumlah ?? 0 }}</span></div>

                            {{-- BARIS 3 --}}
                            <div class="detail-item"><span class="detail-label">Kurun Waktu</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->kurun_waktu ?? '-' }}</span></div>
                            <div class="detail-item"><span class="detail-label">Retensi Aktif</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->masa_retensi_aktif ? $arsip->masa_retensi_aktif . ' Tahun' : '-' }}</span></div>
                            
                            {{-- BARIS 4 --}}
                            <div class="detail-item"><span class="detail-label">Retensi Inaktif</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->masa_retensi_inaktif ? $arsip->masa_retensi_inaktif . ' Tahun' : '-' }}</span></div>
                            <div class="detail-item"><span class="detail-label">Status Akhir</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->status_akhir ?? '-' }}</span></div>

                            {{-- BARIS 5 --}}
                            <div class="detail-item"><span class="detail-label">Tingkat Perkembangan</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->tingkat_perkembangan ?? '-' }}</span></div>
                            <div class="detail-item"><span class="detail-label">Klasifikasi Keamanan</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->klasifikasi_keamanan ?? '-' }}</span></div>

                            {{-- BARIS 6 --}}
                            <div class="detail-item"><span class="detail-label">Klasifikasi Akses</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->klasifikasi_akses ?? '-' }}</span></div>
                            <div class="detail-item"><span class="detail-label">Tanggal Berkas</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->tanggal_dibuat?->isoFormat('D MMM YYYY') ?? '-' }}</span></div>
                        </div>
                        
                        @if($arsip->keterangan)
                            <div class="mt-4 pt-4 border-top">
                                <p class="detail-label mb-2" style="text-align: left; color: var(--text-primary);">Keterangan:</p>
                                <p class="detail-value">{{ $arsip->keterangan }}</p>
                            </div>
                        @endif

                        {{-- ================== TABEL FILE ARSIP ================== --}}
                        
                        <div class="card-header-action">
                            <h3 style="font-size: 1.1rem; font-weight: 700;">Isi Berkas (Total: {{ $arsip->files->count() }})</h3>
                            
                            <a href="{{ route('arsip.aktif.file.create', $arsip->id) }}" class="btn btn-primary">
                                <i class="bi bi-plus-circle"></i> Tambah File
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th style="width: 15%;">Nomor Berkas</th>
                                        <th class="text-center" style="width: 8%;">No Item</th>
                                        <th style="width: 12%;">Kode Klas.</th>
                                        <th>Uraian Informasi Arsip</th>
                                        <th class="text-center" style="width: 12%;">Tanggal</th>
                                        <th class="text-center" style="width: 8%;">Jumlah</th>
                                        <th style="width: 15%;">Perkembangan</th>
                                        <th class="text-center" style="width: 100px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($arsip->files as $file)
                                        <tr>
                                            {{-- NOMOR BERKAS: Hapus style bold --}}
                                            <td>{{ $arsip->nomor_berkas }}</td>
                                            
                                            <td class="text-center">{{ $loop->iteration }}</td> 
                                            
                                            {{-- KODE KLASIFIKASI: Hapus span badge, jadi teks biasa --}}
                                            <td>{{ $arsip->kode_klasifikasi }}</td>
                                            
                                            <td class="col-uraian">{{ $file->uraian ?? $arsip->uraian }}</td> 
                                            <td class="text-center">{{ $file->tanggal_file?->format('d/m/Y') ?? '-' }}</td>
                                            <td class="text-center">{{ $file->jumlah ?? '-' }}</td>
                                            <td>{{ $file->tingkat_perkembangan ?? '-' }}</td>
                                            <td class="text-center">
                                                <div class="action-buttons">
                                                    <a href="{{ Storage::url($file->path_file) }}" target="_blank" class="btn-icon" title="Lihat File">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <button wire:click.prevent="confirmFileDelete({{ $file->id }})" 
                                                            onclick="event.stopPropagation()" 
                                                            class="btn-icon btn-icon-danger" 
                                                            title="Hapus File">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" style="padding: 40px; text-align: center;">
                                                <div style="display: flex; flex-direction: column; align-items: center; gap: 10px; color: var(--text-muted);">
                                                    <i class="bi bi-folder-x" style="font-size: 2rem; opacity: 0.5;"></i>
                                                    <span>Belum ada file arsip yang di-upload.</span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </section>
            @else
                <div class="alert alert-danger" role="alert">
                    Data arsip tidak ditemukan.
                </div>
            @endif
        </div>
    </div> 
    
    {{-- 5. MODAL KONFIRMASI HAPUS --}}
    @if ($confirmingFileDeletion)
    <div style="position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); display: flex; align-items: center; justify-content: center; z-index: 1060;"
         wire-click="cancelDelete">
        <div style="background-color: var(--bg-white); border-radius: 12px; padding: 24px; max-width: 400px; width: 90%; box-shadow: 0 10px 25px rgba(0,0,0,0.1);"
             @click.stop>
            <h3 style="font-size: 1.25rem; font-weight: 600; color: var(--text-primary); margin-bottom: 12px; display: flex; align-items: center; gap: 10px;">
                <i class="bi bi-exclamation-triangle-fill" style="color: #ef4444;"></i> Hapus File
            </h3>
            <p style="color: var(--text-secondary); margin-bottom: 24px; line-height: 1.5;">
                Apakah Anda yakin ingin menghapus file ini secara permanen? Tindakan ini tidak dapat dibatalkan.
            </p>
            <div style="display: flex; gap: 12px; justify-content: flex-end;">
                <button wire:click="cancelDelete" class="btn btn-secondary">Batal</button>
                <button wire:click="deleteFile" class="btn btn-danger">Hapus File</button>
            </div>
        </div>
    </div>
    @endif

</div>