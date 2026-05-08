<div>
    {{-- 1. HEADER --}}
    <x-slot name="header">
        @php
            $urlBidang = $slugBidangYangDibuka ? route('dashboard.' . str_replace('_', '-', $slugBidangYangDibuka)) : '#';
            
            // PERBAIKAN: Tambahkan parameter filterBidang agar tetap terkunci di sub-bidang (misal: umpeg)
            $urlArsipVital = route('arsip.vital.index', ['filterBidang' => $slugBidangYangDibuka]);
        @endphp
    
        <div class="welcome-title-group">
            <h1>Detail Arsip</h1>
            <div class="breadcrumbs">
                <a href="{{ $urlBidang }}" class="breadcrumb-item active">{{ $namaBidangYangDibuka }}</a>
                <i class="bi bi-chevron-right breadcrumb-separator"></i>
                
                {{-- Sekarang link ini membawa filter --}}
                <a href="{{ $urlArsipVital }}" class="breadcrumb-item active">Arsip Vital</a>
                
                <i class="bi bi-chevron-right breadcrumb-separator"></i>
                <span class="breadcrumb-item active">Detail Arsip</span>
            </div>
        </div>
    </x-slot>

    {{-- 2. CSS KHUSUS HALAMAN DETAIL (Diadaptasi dari Desain Arsip Inaktif) --}}
    @push('styles')
    <style>
        /* ==================== CSS IDENTIK DENGAN ARSIP AKTIF ==================== */
        .detail-card { background-color: var(--bg-white); border-radius: var(--radius-lg); border: 1px solid var(--border-color); box-shadow: var(--shadow-sm); }
        body.dark-mode .detail-card { background-color: var(--bg-sidebar); }
        
        /* Tabel Style: Dark Header */
        .data-table th { 
            background-color: #1f2937; color: #ffffff; font-weight: 600; 
            text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.05em; 
            padding: 16px; border-bottom: 1px solid #374151; text-align: left; 
        }
        body.dark-mode .data-table th { background-color: #111827; }
        .data-table td { padding: 14px 16px; border-bottom: 1px solid var(--border-color); font-size: 0.9rem; }

        /* ==================== MODAL CUSTOM (DNA ARSIP AKTIF) ==================== */
        .modal-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6); z-index: 1050; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(4px); }
        .modal-content-custom { background: var(--bg-white); border-radius: 16px; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1); overflow: hidden; animation: slideUp 0.3s ease-out; border: 1px solid var(--border-color); }
        body.dark-mode .modal-content-custom { background-color: var(--bg-sidebar); }

        .modal-header-custom { padding: 20px 24px; border-bottom: 1px solid var(--border-color); display: flex; justify-content: space-between; align-items: center; background: var(--bg-active); }
        .modal-header-custom h3 { margin: 0; font-size: 1.1rem; font-weight: 700; color: var(--text-primary); }
        .modal-body-custom { padding: 24px; max-height: 80vh; overflow-y: auto; }
        .modal-footer-custom { padding: 16px 24px; border-top: 1px solid var(--border-color); display: flex; justify-content: flex-end; gap: 12px; background: var(--bg-main); }

        /* Grid Internal Modal */
        .modal-form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 32px; }
        @media (max-width: 850px) { .modal-form-grid { grid-template-columns: 1fr; } }

        /* Preview & Upload Wrapper */
        .file-upload-wrapper { border: 2px dashed var(--border-color); border-radius: var(--radius-lg); padding: 20px; text-align: center; background-color: var(--bg-main); position: relative; min-height: 350px; display: flex; align-items: center; justify-content: center; flex-direction: column; }
        .preview-frame { width: 100%; height: 350px; border-radius: 8px; border: 1px solid var(--border-color); overflow-y: auto; background: #fff; box-shadow: inset 0 0 10px rgba(0,0,0,0.05); }
        .preview-frame embed, .preview-frame img { width: 100%; min-height: 100%; display: block; object-fit: contain; }
        .file-input-hidden { display: none; }

        /* Fullscreen Overlay */
        .fullscreen-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.95); z-index: 2000; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 20px; }
        .fullscreen-content { width: 90%; height: 85%; background: #fff; border-radius: 8px; overflow: hidden; }
        .fullscreen-content embed, .fullscreen-content img { width: 100%; height: 100%; object-fit: contain; }
        .close-fullscreen { position: absolute; top: 20px; right: 30px; color: #fff; font-size: 2.5rem; cursor: pointer; }

        @keyframes slideUp { from { transform: translateY(20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        .spin { animation: rotate 1s linear infinite; }
        @keyframes rotate { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }

    
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
        .detail-item:nth-child(2n) { /* Item genap, pindah ke sisi kanan grid */
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
                grid-template-columns: max-content 10px 1fr; /* Hanya 3 kolom di tablet/mobile */
                gap: 5px 15px;
            }
            .detail-item {
                grid-column: 1 / -1; 
                display: flex;
            }
            .detail-item:nth-child(2n) { 
                grid-column: 1 / -1;
                margin-top: 10px; 
            }
            .detail-item:nth-child(1) { margin-top: 0; }
            .detail-label { min-width: 150px; }
        }
        
        /* [CSS HEADER TABEL & TOMBOL KANAN] */
        .card-header-action {
             display: flex; 
             justify-content: space-between; 
             align-items: center; 
             margin-bottom: 20px; 
             margin-top: 16px; 
             border-top: 1px solid var(--border-color); 
             padding-top: 24px; 
        }

        /* [CSS TABEL FILE] */
        .table-responsive {
            width: 100%; overflow-x: auto; -webkit-overflow-scrolling: touch; border-radius: var(--radius-md); border: 1px solid var(--border-color);
        }
        .data-table { width: 100%; border-collapse: collapse; table-layout: fixed; }
        .data-table th, .data-table td { padding: 14px 16px; border: 1px solid var(--border-color); text-align: left; vertical-align: middle; font-size: 0.9rem; word-wrap: break-word; overflow-wrap: break-word; }
        /* Perbaikan Header Tabel: white-space nowrap agar judul tidak turun ke bawah */
        .data-table th { 
            font-weight: 700; 
            background-color: var(--bg-active); 
            text-transform: uppercase; 
            letter-spacing: 0.5px; 
            height: 50px; 
            border-top: 1px solid var(--border-color); 
            border-bottom: 1px solid var(--border-color);
            white-space: nowrap; 
        }
        .data-table tbody tr:hover { background-color: var(--bg-main); }
        .data-table .text-center { text-align: center; }
        .data-table th.text-center { text-align: center; vertical-align: middle; }
        
        /* Tombol & Icon */
        .action-buttons { display: flex; gap: 8px; justify-content: center; flex-wrap: nowrap; }
        .btn-icon { display: inline-flex; align-items: center; justify-content: center; padding: 8px; border-radius: var(--radius-md); background-color: transparent; color: var(--primary-blue); border: 1px solid transparent; cursor: pointer; transition: all 0.2s; font-size: 1.1rem; text-decoration: none; }
        .btn-icon:hover { background-color: var(--primary-blue-light); border-color: var(--primary-blue-light); }
        .btn-icon.btn-icon-danger { color: #ff5c5c; }
        .btn-icon.btn-icon-danger:hover { background-color: #ffe6e6; border-color: #ffe6e6; }
        
        .btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 10px 16px; font-size: 0.95rem; font-weight: 600; border-radius: var(--radius-md); cursor: pointer; transition: all 0.2s; border: 1px solid transparent; text-decoration: none; }
        .btn-primary { background-color: var(--primary-blue); color: var(--bg-white); border-color: var(--primary-blue); }
        .btn-primary:hover { background-color: #0056b3; border-color: #0056b3; }
        
        /* CSS Tombol Secondary (Batal) support Dark Mode */
        .btn-secondary { 
            background-color: transparent; 
            color: var(--text-primary); 
            border: 1px solid var(--border-color); 
        }
        .btn-secondary:hover { 
            background-color: var(--bg-active); 
            border-color: var(--text-secondary);
        }
        
        .btn-danger { background-color: #ff5c5c; color: white; border-color: #ff5c5c; }
        .btn-danger:hover { background-color: #e04444; border-color: #e04444; }

        /* DARK MODE BORDERS */
        body.dark-mode .detail-card { background-color: var(--bg-sidebar); }
        body.dark-mode .table-responsive, body.dark-mode .data-table th, body.dark-mode .data-table td { border-color: #71717a !important; }
        .row { margin: 0; } 

        /* === CSS MODAL CUSTOM === */
        .modal-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1050; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(2px); }
        .modal-content-custom { 
            background: var(--bg-white); 
            width: 100%; max-width: 500px; 
            border-radius: 12px; 
            box-shadow: 0 10px 25px rgba(0,0,0,0.2); 
            overflow: hidden; 
            animation: slideDown 0.3s ease-out; 
            color: var(--text-primary);
        }
        body.dark-mode .modal-content-custom {
            background-color: var(--bg-sidebar);
            border: 1px solid var(--border-color);
        }
        .modal-header-custom { padding: 16px 24px; border-bottom: 1px solid var(--border-color); display: flex; justify-content: space-between; align-items: center; background: var(--bg-active); }
        .modal-header-custom h3 { margin: 0; font-size: 1.1rem; font-weight: 600; color: var(--text-primary); }
        .modal-body-custom { padding: 24px; }
        .modal-footer-custom { padding: 16px 24px; border-top: 1px solid var(--border-color); display: flex; justify-content: flex-end; gap: 10px; background: var(--bg-main); }
        
        .form-group { margin-bottom: 16px; }
        .form-label { display: block; margin-bottom: 6px; font-weight: 500; font-size: 0.9rem; color: var(--text-secondary); }
        .form-control { 
            width: 100%; padding: 10px 12px; 
            border: 1px solid var(--border-color); 
            border-radius: 6px; font-size: 0.95rem; 
            background: var(--bg-white); 
            color: var(--text-primary); 
        }
        body.dark-mode .form-control { background-color: var(--bg-main); }
        .form-control:focus { border-color: var(--primary-blue); outline: none; box-shadow: 0 0 0 3px var(--primary-blue-light); }
        .text-error { color: #ff5c5c; font-size: 0.85rem; margin-top: 4px; display: block; }
        
        @keyframes slideDown { from { transform: translateY(-20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
    </style>
    @endpush

    {{-- 3. NOTIFIKASI --}}
    @if (session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" class="alert alert-success notification-popup" style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 2000; background: #d1e7dd; color: #0f5132; padding: 12px 24px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
        <i class="bi bi-check-circle"></i> {{ session('success') }}
    </div>
    @endif
    @if (session()->has('error'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" class="alert alert-danger notification-popup" style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 2000; background: #f8d7da; color: #842029; padding: 12px 24px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
        <i class="bi bi-x-circle"></i> {{ session('error') }}
    </div>
    @endif
    
    {{-- 4. KONTEN HALAMAN --}}
    <div class="row">
        <div class="col-lg-12">
            <section class="card detail-card animated-card">
                <div class="detail-body">
                    
                    {{-- HEADER DETAIL --}}
                    <h3 class="detail-header">
                        {{-- Informasi Berkas: {{ $arsip->nomor_berkas }} --}}
                        Informasi Berkas
                    </h3>
                    
                    <div class="detail-grid">
                        {{-- MAPPING DATA ARSIP VITAL KE GRID LAYOUT BARU --}}
                        {{-- Uraian arsip vital ngambil dari isi berkas --}}
                        <div class="detail-item"><span class="detail-label">Uraian</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->isi_berkas }}</span></div>
                        <div class="detail-item"><span class="detail-label"></span><span class="detail-separator"></span><span class="detail-value"></span></div>
                        
                        {{-- BARIS 1 --}}
                        {{-- [PERBAIKAN] Menghapus warna khusus pada Asal Arsip agar seragam --}}
                        <div class="detail-item"><span class="detail-label">Asal Arsip</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->asal_arsip }}</span></div>
                        <div class="detail-item"><span class="detail-label">Nomor Berkas</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->nomor_berkas }}</span></div>

                        {{-- BARIS 2 --}}
                        <div class="detail-item"><span class="detail-label">Kode Klasifikasi</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->kode_klasifikasi }}</span></div>
                        <div class="detail-item"><span class="detail-label">Jenis / Series Arsip</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->jenis_series_arsip }}</span></div>

                        {{-- BARIS 3 --}}
                        {{-- <div class="detail-item"><span class="detail-label">Isi Berkas</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->isi_berkas }}</span></div> --}}
                        <div class="detail-item"><span class="detail-label">Bulan / Tahun</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->bulan_tahun }}</span></div>

                        {{-- BARIS 4 --}}
                        <div class="detail-item"><span class="detail-label">Jumlah Satuan</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->jumlah_satuan }}</span></div>
                        {{-- [PERBAIKAN] Menghapus Badge Warna pada Klasifikasi Keamanan agar seragam --}}
                        <div class="detail-item"><span class="detail-label">Klasifikasi Keamanan</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->klasifikasi_keamanan }}</span></div>

                        {{-- BARIS 5 --}}
                        <div class="detail-item"><span class="detail-label">Retensi Arsip</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->retensi_arsip_vital }}</span></div>
                        <div class="detail-item"><span class="detail-label">Lokasi Simpan</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->lokasi_simpan }}</span></div>

                        {{-- BARIS 6 --}}
                        <div class="detail-item"><span class="detail-label">Metode Perlindungan</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->metode_perlindungan }}</span></div>
                        <div class="detail-item"><span class="detail-label">Kondisi Arsip</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->kondisi_arsip ?? '-' }}</span></div>
                    </div>
                    
                    {{-- BAGIAN KETERANGAN (FULL WIDTH DI BAWAH GRID) --}}
                    @if($arsip->keterangan || $arsip->keterangan_tambahan)
                    <div class="mt-4 pt-4 border-top" style="border-top: 1px solid var(--border-color); margin-top: 20px; padding-top: 20px;">
                        @if($arsip->keterangan)
                            <p class="detail-label mb-2" style="text-align: left; color: var(--text-primary); margin-bottom: 5px;">Keterangan:</p>
                            <p class="detail-value" style="padding-left: 0; margin-bottom: 15px;">{{ $arsip->keterangan }}</p>
                        @endif
                        @if($arsip->keterangan_tambahan)
                             <p class="detail-label mb-2" style="text-align: left; color: var(--text-primary); margin-bottom: 5px;">Keterangan Tambahan:</p>
                             <p class="detail-value" style="padding-left: 0;">{{ $arsip->keterangan_tambahan }}</p>
                        @endif
                    </div>
                    @endif

                    {{-- BAGIAN DAFTAR FILE --}}
                    <div class="card-header-action">
                        <h3 style="font-size: 1.1rem; font-weight: 600; margin: 0;">Isi Berkas (Total: {{ $arsip->files->count() }})</h3>
                        {{-- Tombol Buka Modal --}}
                        <button wire:click="openModal" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Tambah File
                        </button>
                    </div>

                    <div class="table-responsive">
                        {{-- [PERBAIKAN] TABEL YANG LEBIH RAPI (Lebar kolom disesuaikan) --}}
                        <table class="data-table">
                            <thead>
                                <tr>
                                    {{-- Tambahkan width yang cukup --}}
                                    <th class="text-center" style="width: 8%;">No Item</th>
                                    <th class="text-center" style="width: 10%;">Kode Klas.</th>
                                    <th class="text-center"> Uraian Informasi Arsip</th>
                                    <th class="text-center" style="width: 10%;">Status</th>
                                    <th class="text-center" style="width: 12%;">Tgl. Berkas</th>
                                    <th class="text-center" style="width: 10%;">Kuantitas</th>
                                    <th class="text-center" style="width: 12%;">Perkembangan</th>
                                    <th class="text-center" style="width: 11%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($arsip->files as $file)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td> 
                                        
                                        <td>{{ $arsip->kode_klasifikasi }}</td>
                                        
                                        {{-- Menggunakan fallback uraian dan menghapus Kode Klasifikasi/No Berkas yang redundan --}}
                                        <td>
                                            <div style="font-weight: 500;">{{ $file->uraian_informasi ?? ($file->uraian ?? $arsip->uraian) }}</div>
                                            {{-- Opsional: Tampilkan kapan diupload --}}
                                            <small style="color: var(--text-secondary); display: block; margin-top: 4px;">Upload: {{ $file->created_at->format('d/m/Y H:i') }}</small>
                                        </td>

                                        <td class="text-center">
                                            @if($file->path_file)
                                                <span class="badge bg-success" style="font-size: 0.75rem;"><i class="bi bi-file-earmark-check"></i> Ada File</span>
                                            @else
                                                <span class="badge bg-warning text-dark" style="font-size: 0.75rem;"><i class="bi bi-card-text"></i> Metadata</span>
                                            @endif
                                        </td>
                                        
                                        {{-- Tanggal File --}}
                                        <td class="text-center">
                                            {{ $file->tanggal_file?->format('d M Y') ?? '-' }}
                                        </td>
                                        
                                        <td class="text-center">{{ $file->jumlah }} {{ $file->satuan ?? 'Lembar' }}</td>
                                        <td class="text-center">{{ $file->tingkat_perkembangan ?? ($arsip->tingkat_perkembangan ?? '-') }}</td>
                                        
                                        <td class="text-center">
                                            <div class="action-buttons">
                                                @if($file->path_file)
                                                    <a href="{{ Storage::url($file->path_file) }}" target="_blank" class="btn-icon"><i class="bi bi-eye"></i></a>
                                                @endif
                                                <button wire:click="openModal({{ $file->id }})" class="btn-icon"><i class="bi bi-pencil-square"></i></button>
                                                <button wire:click="confirmFileDelete({{ $file->id }})" class="btn-icon btn-icon-danger"><i class="bi bi-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" style="padding: 30px; text-align: center; color: var(--text-muted);">
                                            <i class="bi bi-folder-x" style="font-size: 2rem; display: block; margin-bottom: 10px; opacity: 0.5;"></i>
                                            Belum ada file arsip yang di-upload.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </section>
        </div>
    </div>

    {{-- 5. MODAL TAMBAH/EDIT FILE (VITAL STYLE WITH AKTIF DNA) --}}
    @if($isModalOpen)
    <div class="modal-overlay" 
        x-data="{ 
            isNew: false, 
            pUrl: @entangle('previewUrl'), 
            fType: @entangle('fileType'), 
            showFull: @entangle('showFull'),
            fileName: '' 
        }">
        <div class="modal-content-custom" style="max-width: 1000px; width: 95%;">
            <div class="modal-header-custom">
                <h3><i class="bi bi-file-earmark-medical"></i> {{ $isEditMode ? 'Ubah Item Berkas Vital' : 'Unggah Item Berkas Vital' }}</h3>
                <button wire:click="closeModal" class="btn-icon" style="color: var(--text-secondary);"><i class="bi bi-x-lg"></i></button>
            </div>
            
            <form wire:submit.prevent="saveFile">
                <div class="modal-body-custom">
                    <div class="modal-form-grid">
                        {{-- KOLOM KIRI: METADATA --}}
                        <div>
                            <h4 style="font-size: 0.95rem; font-weight: 700; margin-bottom: 20px; color: var(--primary-blue);">1. Detail Informasi File</h4>
                            
                            <div class="form-group">
                                <label class="form-label">Uraian Informasi Arsip <span class="text-danger">*</span></label>
                                <textarea wire:model="uraian" class="form-control @error('uraian') is-invalid @enderror" 
                                        rows="3" placeholder="Contoh: Akta Pendirian, Sertifikat Tanah..."></textarea>
                                <small class="form-helper" style="color: var(--text-secondary); font-size: 0.75rem;">Beri nama/deskripsi singkat untuk file digital ini.</small>
                                @error('uraian') <span class="text-error">{{ $message }}</span> @enderror
                            </div>

                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 16px;">
                                <div class="form-group">
                                    <label class="form-label">Tanggal Berkas</label>
                                    <input type="date" wire:model="tanggal_file" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Kuantitas</label>
                                    <div style="display: flex; gap: 8px;">
                                        <input type="number" wire:model="jumlah" class="form-control" style="width: 80px;" min="1">
                                        <select wire:model="satuan" class="form-control">
                                            <option value="Lembar">Lembar</option>
                                            <option value="Sampul">Sampul</option>
                                            <option value="Berkas">Berkas</option>
                                            <option value="Buku">Buku</option>
                                            <option value="Eksemplar">Eksemplar</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" style="margin-top: 16px;">
                                <label class="form-label">Tingkat Perkembangan</label>
                                <select wire:model="tingkat_perkembangan" class="form-control">
                                    <option value="Asli">Asli</option>
                                    <option value="Fotokopi">Fotokopi</option>
                                    <option value="Salinan">Salinan</option>
                                </select>
                            </div>
                        </div>

                        {{-- KOLOM KANAN: PREVIEW AREA --}}
                        <div style="display: flex; flex-direction: column;">
                            <h4 style="font-size: 0.95rem; font-weight: 700; margin-bottom: 20px; color: var(--primary-blue);">2. Pratinjau File Digital</h4>
                            
                            <div class="file-upload-wrapper">
                                <input type="file" id="file_baru" x-ref="fileInput" wire:model="file_baru" class="file-input-hidden" 
                                    @change="
                                        isNew = true; 
                                        const f = $event.target.files[0]; 
                                        fType = f.type; 
                                        pUrl = URL.createObjectURL(f);
                                        fileName = f.name;
                                    ">
                                
                                <div style="width: 100%;">
                                    {{-- State: ADA PREVIEW (Lama atau Baru) --}}
                                    <template x-if="pUrl">
                                        <div class="preview-area">
                                            <div class="preview-frame">
                                                <template x-if="fType && fType.startsWith('image/')"><img :src="pUrl"></template>
                                                <template x-if="fType === 'application/pdf'"><embed :src="pUrl" type="application/pdf"></template>
                                            </div>
                                            <div class="preview-actions" style="margin-top: 12px; display: flex; justify-content: center; gap: 10px;">
                                                <button type="button" class="btn btn-secondary btn-sm" @click="$refs.fileInput.click()">
                                                    <i class="bi bi-arrow-repeat"></i> Ganti File
                                                </button>
                                                <button type="button" class="btn btn-primary btn-sm" @click="showFull = true">
                                                    <i class="bi bi-arrows-fullscreen"></i> Full Screen
                                                </button>
                                            </div>
                                            <div style="text-align: center; margin-top: 10px;">
                                                <span class="badge bg-primary" x-show="isNew">File Baru Dipilih</span>
                                                <span class="badge bg-success" x-show="!isNew">File Saat Ini</span>
                                                <p x-show="isNew" x-text="fileName" style="font-size: 0.7rem; color: var(--text-secondary); margin-top: 5px;"></p>
                                            </div>
                                        </div>
                                    </template>

                                    {{-- State: KOSONG --}}
                                    <template x-if="!pUrl">
                                        <div @click="$refs.fileInput.click()" style="cursor:pointer; padding: 40px 0;">
                                            <i class="bi bi-cloud-arrow-up-fill" style="font-size: 3.5rem; color: var(--primary-blue); opacity: 0.6;"></i>
                                            <p style="font-weight: 600; margin-top: 10px;">Klik untuk upload file digital</p>
                                            <small class="text-muted">Format: PDF, JPG, PNG (Maks 10MB)</small>
                                        </div>
                                    </template>
                                </div>
                            </div>
                            @error('file_baru') <span class="text-error" style="margin-top: 8px;">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="modal-footer-custom">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary">Batal</button>
                    <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="file_baru, saveFile">
                        <span wire:loading.remove wire:target="saveFile"><i class="bi bi-save"></i> Simpan Data</span>
                        <span wire:loading wire:target="saveFile"><i class="bi bi-arrow-repeat spin"></i> Memproses...</span>
                    </button>
                </div>
            </form>
        </div>

        {{-- 6. FULLSCREEN OVERLAY (TETAP BISA DIAKSES DARI MODAL) --}}
        <div x-show="showFull" 
            x-transition 
            class="fullscreen-overlay" 
            @keydown.escape.window="showFull = false" 
            style="display: none;">
            <span class="close-fullscreen" @click="showFull = false">&times;</span>
            <div class="fullscreen-content" @click.away="showFull = false">
                <template x-if="fType && fType.startsWith('image/')"><img :src="pUrl"></template>
                <template x-if="fType === 'application/pdf'"><embed :src="pUrl" type="application/pdf"></template>
            </div>
            <p style="color: #ccc; margin-top: 15px;">Tekan <b>ESC</b> untuk menutup</p>
        </div>
    </div>
    @endif

</div>