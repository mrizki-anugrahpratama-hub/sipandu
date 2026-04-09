<div>
    {{-- 1. HEADER --}}
    <x-slot name="header">
        @php
        $arsip = $arsip ?? $arsipInaktif ?? null;
        $isPermanen = ($arsip && $arsip->status_akhir == 'Permanen');
        $isMusnah = ($arsip && $arsip->status_akhir == 'Musnah');

        // LOGIKA PERBAIKAN: Cek asal akses terlebih dahulu
        $from = $from ?? request()->query('from');

        if ($from === 'inaktif') {
            // Jalur: Nama Bidang > Arsip Inaktif > Detail
            $labelLevel1 = $namaBidangYangDibuka ?? 'Dashboard';
            $slugRaw = $slugBidangYangDibuka ?? 'dashboard';
            $slugBidangSafe = str_replace('_', '-', $slugRaw);
            $urlLevel1 = route('dashboard.' . $slugBidangSafe);
        
            $labelLevel2 = 'Arsip Inaktif';
            $urlLevel2 = route('arsip.inaktif.index');
        } 
        elseif ($isPermanen) {
            $labelLevel1 = 'Penyusutan';
            $urlLevel1 = route('penyusutan.index');
            $labelLevel2 = 'Arsip Permanen';
            $urlLevel2 = url('/penyusutan/permanen');
        } 
        elseif ($isMusnah) {
            $labelLevel1 = 'Penyusutan';
            $urlLevel1 = route('penyusutan.index');
            $labelLevel2 = 'Arsip Musnah';
            $urlLevel2 = url('/penyusutan/musnah');
        } else {
            // Default Fallback
            $labelLevel1 = $namaBidangYangDibuka ?? 'Dashboard';
            $urlLevel1 = '#';
            $labelLevel2 = 'Arsip Inaktif';
            $urlLevel2 = route('arsip.inaktif.index');
        }
        @endphp

        <div class="welcome-title-group">
            <h1>Detail Arsip</h1>

            {{-- Breadcrumb Level 1 (Penyusutan / Nama Bidang) --}}
            <a href="{{ $urlLevel1 }}" class="breadcrumb-item">{{ $labelLevel1 }}</a>
            <i class="bi bi-chevron-right breadcrumb-separator"></i>

            {{-- Breadcrumb Level 2 (Status Arsip) --}}
            <a href="{{ $urlLevel2 }}" class="breadcrumb-item">{{ $labelLevel2 }}</a>
            <i class="bi bi-chevron-right breadcrumb-separator"></i>

            {{-- Breadcrumb Level 3 (Halaman Aktif) --}}
            <span class="breadcrumb-item active">Detail Arsip</span>
        </div>

    </x-slot>

    {{-- 2. CSS KHUSUS HALAMAN DETAIL (Dirapikan) --}}
    @push('styles')
    <style>
        /* [CSS UTAMA GRID KEY-VALUE] */
        .detail-grid {
            /* 4 Kolom Visual: Label, Separator, Value | Label, Separator, Value */
            grid-template-columns: max-content 10px 1fr max-content 10px 1fr;
            display: grid;
            gap: 8px 30px;
            padding: 20px 0;
            line-height: 1.4;
        }

        /* Membuat setiap detail item menempati 3 kolom grid (Label+Sep+Value) */
        .detail-item {
            grid-column: span 3;
            display: contents;
        }

        .detail-item:nth-child(2n) {
            /* Item genap, pindah ke sisi kanan grid */
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
            margin: 0;
            font-weight: 600;
            color: var(--text-secondary);
        }

        .detail-value {
            font-weight: 600;
            color: var(--text-primary);
            word-break: break-word;
            padding-left: 10px;
            flex-grow: 1;
        }

        .detail-header {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--border-color);
        }

        .detail-card {
            padding: 24px;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            background-color: var(--bg-white);
        }

        /* Media Queries untuk Responsif */
        @media (max-width: 992px) {
            .detail-grid {
                grid-template-columns: max-content 10px 1fr;
                /* Hanya 3 kolom di tablet/mobile (1 baris per item) */
                gap: 5px 15px;
            }

            .detail-item {
                grid-column: 1 / -1;
                /* Setiap item mengambil lebar penuh */
                display: flex;
            }

            .detail-item:nth-child(2n) {
                /* Kolom genap kini berada di bawah kolom ganjil */
                grid-column: 1 / -1;
                margin-top: 10px;
            }

            .detail-item:nth-child(1) {
                margin-top: 0;
            }

            .detail-label {
                min-width: 150px;
            }
        }

        /* [CSS HEADER TABEL & TOMBOL KANAN] */
        .card-header-action {
            display: flex;
            justify-content: space-between;
            /* Judul di kiri, Tombol di kanan */
            align-items: center;
            margin-bottom: 20px;
            margin-top: 16px;
            border-top: 1px solid var(--border-color);
            padding-top: 24px;
        }

        /* [CSS TABEL FILE] */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .data-table th,
        .data-table td {
            padding: 14px 16px;
            border: 1px solid var(--border-color);
            text-align: left;
            vertical-align: top;
            font-size: 0.9rem;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        .data-table th {
            font-weight: 700;
            background-color: var(--bg-active);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            height: 50px;
            border-top: 1px solid var(--border-color);
            border-bottom: 1px solid var(--border-color);
        }

        .data-table tbody tr:hover {
            background-color: var(--bg-main);
        }

        .data-table .text-center {
            text-align: center;
        }

        .data-table th.text-center {
            text-align: center;
            vertical-align: middle;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: center;
            flex-wrap: nowrap;
        }

        .btn-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px;
            border-radius: var(--radius-md);
            background-color: transparent;
            color: var(--primary-blue);
            border: 1px solid transparent;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 1.1rem;
            text-decoration: none;
        }

        .btn-icon:hover {
            background-color: var(--primary-blue-light);
            border-color: var(--primary-blue-light);
        }

        .btn-icon.btn-icon-danger {
            color: #ff5c5c;
        }

        .btn-icon.btn-icon-danger:hover {
            background-color: #ffe6e6;
            border-color: #ffe6e6;
        }

        /* Tombol Utama */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 16px;
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: all 0.2s;
            border: 1px solid transparent;
            text-decoration: none;
        }

        .btn-primary {
            background-color: var(--primary-blue);
            color: var(--bg-white);
            border-color: var(--primary-blue);
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-secondary {
            background-color: var(--bg-active);
            color: var(--text-primary);
            border: 1px solid var(--border-color);
        }

        .btn-secondary:hover {
            background-color: var(--border-color);
        }

        .btn-danger {
            background-color: #ff5c5c;
            color: white;
            border-color: #ff5c5c;
        }

        .btn-danger:hover {
            background-color: #e04444;
            border-color: #e04444;
        }

        /* DARK MODE BORDERS */
        body.dark-mode .detail-card {
            background-color: var(--bg-sidebar);
        }

        body.dark-mode .table-responsive,
        body.dark-mode .data-table th,
        body.dark-mode .data-table td {
            border-color: #71717a !important;
        }

        .row {
            margin: 0;
        }
    </style>
    @endpush

    {{-- 3. BLOK NOTIFIKASI --}}
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
            {{-- Pastikan $arsip tersedia sebelum rendering --}}
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
                        {{-- Nomor Box Dihapus --}}
                        <div class="detail-item"><span class="detail-label">Nomor Berkas</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->nomor_berkas }}</span></div>
                        <div class="detail-item"><span class="detail-label">Jumlah Item</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->jumlah ?? 0 }}</span></div>

                        {{-- BARIS 3 --}}
                        <div class="detail-item"><span class="detail-label">Kurun Waktu</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->kurun_waktu ?? '-' }}</span></div>
                        <div class="detail-item"><span class="detail-label">Retensi Inaktif</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->masa_retensi_inaktif ? $arsip->masa_retensi_inaktif . ' Tahun' : '-' }}</span></div>

                        {{-- BARIS 4 --}}
                        {{-- Retensi Aktif DIHAPUS (DIHILANGKAN DARI TAMPILAN) --}}
                        <div class="detail-item"><span class="detail-label">Status Akhir</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->status_akhir ?? '-' }}</span></div>
                        <div class="detail-item"><span class="detail-label">Tanggal Masuk</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->tanggal_dipindah?->isoFormat('D MMM YYYY, HH:mm') ?? '-' }}</span></div>

                        {{-- BARIS 5 --}}
                        <div class="detail-item"><span class="detail-label">Tingkat Perkembangan</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->tingkat_perkembangan ?? '-' }}</span></div>
                        <div class="detail-item"><span class="detail-label">Klasifikasi Keamanan</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->klasifikasi_keamanan ?? '-' }}</span></div>

                        {{-- BARIS 6 --}}
                        <div class="detail-item"><span class="detail-label">Klasifikasi Akses</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->klasifikasi_akses ?? '-' }}</span></div>
                        <div class="detail-item"><span class="detail-label">Tanggal Berkas</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->tanggal_dibuat?->isoFormat('D MMM YYYY') ?? '-' }}</span></div>

                    </div>

                    {{-- Bagian Keterangan (Lebar Penuh) --}}
                    @if($arsip->keterangan)
                    <div class="mt-4 pt-4 border-top">
                        <p class="detail-label mb-2" style="text-align: left; color: var(--text-primary);">Keterangan:</p>
                        <p class="detail-value">{{ $arsip->keterangan }}</p>
                    </div>
                    @endif

                    {{-- ================== TABEL FILE ARSIP (Isi Berkas) ================== --}}

                    <div class="card-header-action">
                        <h3>Isi Berkas (Total: {{ $arsip->files->count() }})</h3>

                        {{-- TOMBOL TAMBAH FILE DI KANAN ATAS TABEL --}}
                        <a href="{{ route('arsip.inaktif.file.create', $arsip->id) }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Tambah File
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th style="width: 13%;">Nomor Berkas</th>
                                    <th class="text-center" style="width: 9%;">No Item Arsip</th>
                                    <th style="width: 12%;">Kode Klasifikasi</th>
                                    <th>Uraian Informasi Arsip</th>
                                    <th class="text-center" style="width: 13%;">Tanggal Berkas</th>
                                    <th class="text-center" style="width: 8%;">Jumlah Item</th>
                                    <th style="width: 16%;">Tingkat Perkembangan</th>
                                    <th class="text-center" style="width: 100px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($arsip->files as $file)
                                <tr>
                                    <td>{{ $arsip->nomor_berkas }}</td>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $arsip->kode_klasifikasi }}</td>

                                    {{-- Menggunakan fallback uraian --}}
                                    <td>{{ $file->uraian_informasi ?? $arsip->uraian }}</td>

                                    {{-- Tanggal File (Null Safe) --}}
                                    <td class="text-center">
                                        {{ $file->created_at?->format('d M Y') ?? '-' }}
                                    </td>

                                    <td class="text-center">{{ $file->jumlah ?? ($arsip->jumlah ?? '-') }}</td>
                                    <td>{{ $file->tingkat_perkembangan ?? ($arsip->tingkat_perkembangan ?? '-') }}</td>

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
                                    <td colspan="9" style="padding: 20px; text-align: center; color: var(--text-muted);">
                                        Belum ada file arsip yang di-upload.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- TIDAK ADA TOMBOL AKSI DI BAWAH --}}

                </div>
            </section>
            @else
            <div class="alert alert-danger" role="alert">
                Data arsip tidak ditemukan.
            </div>
            @endif
        </div>

    </div>

    {{-- MODAL KONFIRMASI HAPUS --}}
    @if ($confirmingFileDeletion)
    <div style="position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); display: flex; align-items: center; justify-content: center; z-index: 1060;"
        wire-click="cancelDelete">
        <div style="background-color: var(--bg-white); border-radius: var(--radius-lg); padding: 24px; max-width: 400px; width: 90%; box-shadow: var(--shadow-lift);"
            @click.stop>
            <h3 style="font-size: 1.25rem; font-weight: 600; color: var(--text-primary); margin-bottom: 12px;">
                <i class="bi bi-exclamation-triangle" style="color: #ff5c5c;"></i> Konfirmasi Hapus File
            </h3>
            <p style="color: var(--text-secondary); margin-bottom: 20px;">
                Apakah Anda yakin ingin menghapus file ini secara permanen? Tindakan ini tidak dapat dibatalkan.
            </p>
            <div style="display: flex; gap: 12px; justify-content: flex-end;">
                <button wire:click="cancelDelete" class="btn btn-secondary">Batal</button>
                <button wire:click="deleteFile" class="btn btn-danger"><i class="bi bi-trash"></i> Ya, Hapus</button>
            </div>
        </div>
    </div>
    @endif

</div>