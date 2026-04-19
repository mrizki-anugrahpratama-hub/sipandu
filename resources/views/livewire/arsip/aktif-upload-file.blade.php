<div>
    {{-- 1. HEADER --}}
    <x-slot name="header">
        @php
            // [PERBAIKAN] Gunakan str_replace agar sesuai dengan route di web.php
            $urlBidang = $slugBidangYangDibuka ? route('dashboard.' . str_replace('_', '-', $slugBidangYangDibuka)) : '#';
            $urlDetailArsip = route('arsip.aktif.show', $arsip->id); 
        @endphp
        <div class="welcome-title-group">
            <h1>Upload Isi Berkas</h1>
            <a href="{{ $urlBidang }}" class="breadcrumb-item active">{{ $namaBidangYangDibuka }}</a>
            <i class="bi bi-chevron-right breadcrumb-separator"></i>
            <a href="{{ $urlDetailArsip }}" class="breadcrumb-item active">Detail Arsip</a>
            <i class="bi bi-chevron-right breadcrumb-separator"></i>
            <span class="breadcrumb-item active">Upload Baru</span>
        </div>
    </x-slot>

    {{-- 2. CSS BARU UNTUK TAMPILAN ELEGAN --}}
    @push('styles')
    <style>
        .row { display: flex; flex-wrap: wrap; margin-left: -12px; margin-right: -12px; }
        .col-lg-12 { width: 100%; padding-left: 12px; padding-right: 12px; flex-shrink: 0; margin-bottom: 24px; }
        .detail-card { background-color: var(--bg-white); border-radius: var(--radius-lg); border: 1px solid var(--border-color); box-shadow: var(--shadow-sm); height: 100%; }
        body.dark-mode .detail-card { background-color: var(--bg-sidebar); }
        .detail-body { padding: 24px; font-size: 0.95rem; color: var(--text-primary); }
        .detail-body h3 { font-size: 1.1rem; font-weight: 600; margin-bottom: 20px; }
        .text-danger { color: #ff5c5c; font-size: 0.875rem; margin-top: 4px; display: block; }
        .form-row { display: flex; flex-wrap: wrap; gap: 20px; margin-bottom: 16px; }
        .form-row:last-child { margin-bottom: 0; }
        .form-group { flex: 1 1 100%; display: flex; flex-direction: column; }
        .form-label { font-size: 0.9rem; font-weight: 600; color: var(--text-primary); margin-bottom: 8px; }
        .form-control, .form-control-file { width: 100%; padding: 10px 14px; font-size: 0.95rem; color: var(--text-primary); background-color: var(--bg-white); border: 1px solid var(--border-color); border-radius: var(--radius-md); transition: border-color 0.2s, box-shadow 0.2s; box-sizing: border-box; }
        body.dark-mode .form-control { background-color: var(--bg-sidebar); }
        .form-control:focus { outline: none; border-color: var(--primary-blue); box-shadow: 0 0 0 2px var(--primary-blue-light); }
        .form-control-file { padding: 8px; }
        .form-control.is-invalid, .form-control-file.is-invalid { border-color: #ff5c5c; }
        .btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 10px 16px; font-size: 0.95rem; font-weight: 600; border-radius: var(--radius-md); cursor: pointer; transition: all 0.2s; border: 1px solid transparent; text-decoration: none; }
        .btn-primary { background-color: var(--primary-blue); color: var(--bg-white); border-color: var(--primary-blue); }
        .btn-primary:hover { background-color: #0056b3; border-color: #0056b3; }
        .btn-secondary { background-color: var(--bg-active); color: var(--text-primary); border: 1px solid var(--border-color); }
        .btn-secondary:hover { background-color: var(--border-color); }
        .form-actions { display: flex; gap: 12px; justify-content: flex-end; margin-top: 24px; border-top: 1px solid var(--border-color); padding-top: 24px;}

        /* [CSS BARU UNTUK LAYOUT & UPLOAD] */
        .form-upload-grid {
            display: grid;
            grid-template-columns: 1fr; /* 1 kolom di mobile */
            gap: 32px;
            margin-top: 20px;
        }

        /* 2 kolom di layar desktop */
        @media (min-width: 992px) {
            .form-upload-grid {
                /* Kolom metadata 2x lebih lebar dari kolom upload */
                grid-template-columns: 2fr 1fr; 
            }
        }

        /* Judul sub-bagian form */
        .form-column-header {
            font-size: 1.05rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--border-color);
        }

        /* Teks helper di bawah input */
        .form-group .form-helper {
            font-size: 0.85rem;
            color: var(--text-secondary);
            margin-top: 6px;
        }

        /* Area Drag & Drop File */
        .file-upload-wrapper {
            border: 2px dashed var(--border-color);
            border-radius: var(--radius-lg);
            padding: 24px;
            text-align: center;
            background-color: var(--bg-main);
            transition: all 0.2s ease;
            position: relative; /* Penting untuk input native */
        }
        
        /* Sembunyikan input file bawaan */
        .file-input-native {
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
            z-index: 10;
        }

        .file-upload-ui {
            z-index: 5;
            position: relative;
            pointer-events: none; /* Biarkan klik tembus ke input native */
        }
        
        .file-upload-ui i {
            font-size: 3rem;
            color: var(--primary-blue);
            margin-bottom: 12px;
        }

        .file-upload-text {
            font-size: 1rem;
            color: var(--text-primary);
            line-height: 1.5;
            margin-bottom: 8px;
        }

        .file-upload-text b {
            font-weight: 600;
        }

        .file-upload-link {
            color: var(--primary-blue);
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            pointer-events: all; /* Biarkan link ini bisa diklik */
        }
        .file-upload-link:hover {
            text-decoration: underline;
        }

        .file-upload-wrapper small {
            font-size: 0.85rem;
            color: var(--text-secondary);
        }

        /* State: Saat file diseret ke area */
        .file-upload-wrapper.is-dragging {
            background-color: var(--primary-blue-light);
            border-color: var(--primary-blue);
        }

        /* State: Saat loading atau file terpilih */
        .file-upload-state {
            padding: 10px 0;
        }
        .file-upload-state i {
            font-size: 2.5rem;
            margin-bottom: 12px;
        }
        .file-upload-state p {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 8px;
            word-break: break-all; /* Cegah nama file panjang merusak layout */
        }
        
        /* State: Sukses (setelah file dipilih) */
        .file-upload-state.success i {
            color: #10B981; /* Hijau sukses */
        }
        .file-upload-state.success small {
            font-size: 0.9rem;
        }
    </style>
    @endpush
    
    {{-- Notifikasi Livewire (Tidak berubah) --}}
    @if (session()->has('error'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger" role="alert">
                <i class="bi bi-x-circle"></i> {{ session('error') }}
            </div>
        </div>
    </div>
    @endif

    {{-- 3. KONTEN HALAMAN (Layout 1 Kolom) --}}
    <div class="row">
        <div class="col-lg-12">
            <section class="card detail-card animated-card">
                <div class="detail-body">
                    
                    <h3>Formulir Upload File untuk Berkas: "{{ $arsip->uraian }}"</h3>
                    
                    <form wire:submit="save">
                        
                        {{-- [LAYOUT BARU] Menggunakan Grid 2 Kolom --}}
                        <div class="form-upload-grid">
                            
                            <div class="form-metadata-column">
                                <h4 class="form-column-header">1. Detail Informasi File</h4>
                            
                                {{-- Uraian Informasi Arsip --}}
                                <div class="form-group" style="margin-bottom: 16px;">
                                    <label for="uraian" class="form-label">Uraian Informasi Arsip</label>
                                    <input type="text" id="uraian" class="form-control @error('uraian') is-invalid @enderror" 
                                           wire:model="uraian" placeholder="Contoh: Surat Undangan Rapat...">
                                    <small class="form-helper">Beri nama/deskripsi singkat untuk file ini.</small>
                                    @error('uraian') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group" style="flex: 1;">
                                        <label for="tanggal_file" class="form-label">Tanggal File</label>
                                        <input type="date" id="tanggal_file" class="form-control @error('tanggal_file') is-invalid @enderror" 
                                               wire:model="tanggal_file">
                                    </div>
                                    
                                    {{-- [PEMBARUAN] Jumlah & Satuan Fleksibel --}}
                                    <div class="form-group" style="flex: 1.5;">
                                        <label class="form-label">Kuantitas Item</label>
                                        <div style="display: flex; gap: 8px;">
                                            <input type="number" id="jumlah" class="form-control @error('jumlah') is-invalid @enderror" 
                                                   wire:model="jumlah" min="1" style="flex: 1;" placeholder="Jml">
                                            <select wire:model="satuan" class="form-control" style="flex: 2;">
                                                <option value="Lembar">Lembar</option>
                                                <option value="Berkas">Berkas</option>
                                                <option value="Buku">Buku</option>
                                                <option value="Eksemplar">Eksemplar</option>
                                                <option value="Sampul">Sampul</option>
                                            </select>
                                        </div>
                                        @error('jumlah') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            
                                {{-- Tingkat Perkembangan --}}
                                <div class="form-group">
                                    <label for="tingkat_perkembangan" class="form-label">Tingkat Perkembangan</label>
                                    <select id="tingkat_perkembangan" class="form-control" wire:model="tingkat_perkembangan">
                                        <option value="Asli">Asli</option>
                                        <option value="Fotokopi">Fotokopi</option>
                                        <option value="Salinan">Salinan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-upload-column">
                                <h4 class="form-column-header">2. Upload File (Opsional)</h4> {{-- [PEMBARUAN] Menjadi Opsional --}}
                                
                                <div x-data="{ isUploading: false, isFileSelected: false, isDragging: false }"
                                     {{-- Alpine JS logic tetap sama --}}
                                     class="file-upload-wrapper"
                                     :class="{ 'is-dragging': isDragging }">
                                    
                                    <input type="file" id="file_arsip" wire:model="file_arsip" class="file-input-native" x-ref="fileInput">
                                    
                                    <div class="file-upload-ui">
                                        {{-- Default State --}}
                                        <div wire:loading.remove wire:target="file_arsip" x-show="!isFileSelected && !isUploading">
                                            <i class="bi bi-cloud-arrow-up-fill"></i>
                                            <p class="file-upload-text">
                                                <b>Bisa dikosongkan</b> jika tidak ada file.<br>
                                                atau <label for="file_arsip" class="file-upload-link">klik untuk memilih</label>
                                            </p>
                                            <small>Hanya jika tersedia versi digitalnya.</small>
                                        </div>
                                        {{-- State sukses/loading tetap mengikuti logic sebelumnya --}}
                                    </div>
                                </div>
                                <small class="form-helper" style="display: block; margin-top: 8px; font-style: italic;">
                                    *Item tetap dapat disimpan sebagai catatan metadata meskipun tanpa file digital.
                                </small>
                            </div>

                        {{-- Tombol Aksi (Tidak berubah) --}}
                        <div class="form-actions">
                            <a href="{{ route('arsip.aktif.show', $arsip->id) }}" class="btn btn-secondary">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="save, file_arsip">
                                <span wire:loading wire:target="save, file_arsip">
                                    <i class="bi bi-arrow-repeat"></i> Menyimpan...
                                </span>
                                <span wire:loading.remove wire:target="save, file_arsip">
                                    <i class="bi bi-upload"></i> Upload File
                                </span>
                            </button>
                        </div>
                    </form>
                    
                </div>
            </section>
        </div>
    </div>
</div>