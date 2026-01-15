<div>
    {{-- 1. HEADER --}}
    <x-slot name="header">
        @php
            $urlBidang = $slugBidangFinal ? route('dashboard.' . str_replace('_', '-', $slugBidangFinal)) : '#';
            $urlArsipVital = route('arsip.vital.index');
        @endphp

        <div class="welcome-title-group">
            <h1>Detail Arsip Vital</h1>
            <a href="{{ $urlBidang }}" class="breadcrumb-item">{{ $namaBidangFinal }}</a>
            <i class="bi bi-chevron-right breadcrumb-separator"></i>
            <a href="{{ $urlArsipVital }}" class="breadcrumb-item">Arsip Vital</a>
            <i class="bi bi-chevron-right breadcrumb-separator"></i>
            <span class="breadcrumb-item active">Detail Arsip</span>
        </div>
    </x-slot>

    {{-- 2. CSS KHUSUS HALAMAN DETAIL (Diadaptasi dari Desain Arsip Inaktif) --}}
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
                        Informasi Berkas: {{ $arsip->nomor_berkas }}
                    </h3>
                    
                    <div class="detail-grid">
                        {{-- MAPPING DATA ARSIP VITAL KE GRID LAYOUT BARU --}}
                        
                        {{-- BARIS 1 --}}
                        {{-- [PERBAIKAN] Menghapus warna khusus pada Asal Arsip agar seragam --}}
                        <div class="detail-item"><span class="detail-label">Asal Arsip</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->asal_arsip }}</span></div>
                        <div class="detail-item"><span class="detail-label">Nomor Berkas</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->nomor_berkas }}</span></div>

                        {{-- BARIS 2 --}}
                        <div class="detail-item"><span class="detail-label">Kode Klasifikasi</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->kode_klasifikasi }}</span></div>
                        <div class="detail-item"><span class="detail-label">Jenis / Series Arsip</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->jenis_series_arsip }}</span></div>

                        {{-- BARIS 3 --}}
                        <div class="detail-item"><span class="detail-label">Isi Berkas</span><span class="detail-separator">:</span><span class="detail-value">{{ $arsip->isi_berkas }}</span></div>
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
                                    <th class="text-center" style="width: 60px;">No</th>
                                    <th>Uraian Informasi Arsip</th>
                                    <th class="text-center" style="width: 160px;">Tanggal Berkas</th>
                                    <th class="text-center" style="width: 120px;">Jumlah Item</th>
                                    <th style="width: 180px;">Tingkat Perkembangan</th>
                                    <th class="text-center" style="width: 120px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($arsip->files as $file)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td> 
                                        
                                        {{-- Menggunakan fallback uraian dan menghapus Kode Klasifikasi/No Berkas yang redundan --}}
                                        <td>
                                            <div style="font-weight: 500;">{{ $file->uraian_informasi ?? ($file->uraian ?? $arsip->uraian) }}</div>
                                            {{-- Opsional: Tampilkan kapan diupload --}}
                                            <small style="color: var(--text-secondary); display: block; margin-top: 4px;">Upload: {{ $file->created_at->format('d/m/Y H:i') }}</small>
                                        </td>
                                        
                                        {{-- Tanggal File --}}
                                        <td class="text-center">
                                            {{ $file->tanggal_file?->format('d M Y') ?? '-' }}
                                        </td>
                                        
                                        <td class="text-center">{{ $file->jumlah ?? ($arsip->jumlah ?? '-') }}</td>
                                        <td>{{ $file->tingkat_perkembangan ?? ($arsip->tingkat_perkembangan ?? '-') }}</td>
                                        
                                        <td class="text-center">
                                            <div class="action-buttons">
                                                <a href="{{ Storage::url($file->path_file) }}" target="_blank" class="btn-icon" title="Lihat File">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                
                                                <button wire:click.prevent="deleteFile({{ $file->id }})" 
                                                        wire:confirm="Yakin ingin menghapus file ini?"
                                                        class="btn-icon btn-icon-danger" 
                                                        title="Hapus File">
                                                    <i class="bi bi-trash"></i>
                                                </button>
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

    {{-- 5. MODAL TAMBAH FILE --}}
    @if($isModalOpen)
    <div class="modal-overlay">
        <div class="modal-content-custom">
            <div class="modal-header-custom">
                <h3>Tambah File Arsip</h3>
                <button wire:click="closeModal" style="background:none; border:none; cursor:pointer; font-size:1.2rem; color: var(--text-primary);"><i class="bi bi-x-lg"></i></button>
            </div>
            
            <form wire:submit.prevent="saveFile">
                <div class="modal-body-custom">
                    
                    {{-- Uraian --}}
                    <div class="form-group">
                        <label class="form-label">Uraian Informasi <span style="color:red">*</span></label>
                        <textarea wire:model="uraian" class="form-control" rows="2" placeholder="Contoh: SK Pengangkatan..."></textarea>
                        @error('uraian') <span class="text-error">{{ $message }}</span> @enderror
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        {{-- Tanggal --}}
                        <div class="form-group">
                            <label class="form-label">Tanggal File <span style="color:red">*</span></label>
                            <input type="date" wire:model="tanggal_file" class="form-control">
                            @error('tanggal_file') <span class="text-error">{{ $message }}</span> @enderror
                        </div>

                        {{-- Jumlah --}}
                        <div class="form-group">
                            <label class="form-label">Jumlah (Lembar) <span style="color:red">*</span></label>
                            <input type="number" wire:model="jumlah" class="form-control" min="1">
                            @error('jumlah') <span class="text-error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    {{-- Tingkat Perkembangan --}}
                    <div class="form-group">
                        <label class="form-label">Tingkat Perkembangan <span style="color:red">*</span></label>
                        <select wire:model="tingkat_perkembangan" class="form-control">
                            <option value="Asli">Asli</option>
                            <option value="Fotokopi">Fotokopi</option>
                            <option value="Salinan">Salinan</option>
                            <option value="Pertinggal">Pertinggal</option>
                        </select>
                        @error('tingkat_perkembangan') <span class="text-error">{{ $message }}</span> @enderror
                    </div>

                    {{-- Upload File --}}
                    <div class="form-group">
                        <label class="form-label">Upload Dokumen (PDF/Gambar) <span style="color:red">*</span></label>
                        <input type="file" wire:model="file_upload" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                        <div wire:loading wire:target="file_upload" style="font-size: 0.85rem; color: var(--primary-blue); margin-top: 5px;">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sedang mengupload...
                        </div>
                        @error('file_upload') <span class="text-error">{{ $message }}</span> @enderror
                    </div>

                </div>

                <div class="modal-footer-custom">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary">Batal</button>
                    <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="file_upload">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif

</div>