<div>
    {{-- 1. HEADER (Disamakan dengan Upload) --}}
    <x-slot name="header">
        @php
            $urlBidang = $arsip->bidang ? route('dashboard.' . str_replace('_', '-', $arsip->bidang)) : '#';
            $urlDetailArsip = route('arsip.aktif.show', $arsip->id); 
        @endphp
        <div class="welcome-title-group">
            <h1>Edit Item Berkas</h1>
            <a href="{{ $urlBidang }}" class="breadcrumb-item active">{{ $namaBidangYangDibuka ?? 'Bidang' }}</a>
            <i class="bi bi-chevron-right breadcrumb-separator"></i>
            <a href="{{ $urlDetailArsip }}" class="breadcrumb-item active">Detail Arsip</a>
            <i class="bi bi-chevron-right breadcrumb-separator"></i>
            <span class="breadcrumb-item active">Edit Data</span>
        </div>
    </x-slot>

    {{-- 2. CSS (Copy-Paste dari aktif-upload agar seragam) --}}
    @push('styles')
    <style>
        .detail-card { background-color: var(--bg-white); border-radius: var(--radius-lg); border: 1px solid var(--border-color); box-shadow: var(--shadow-sm); }
        body.dark-mode .detail-card { background-color: var(--bg-sidebar); }
        .detail-body { padding: 24px; }
        .detail-body h3 { font-size: 1.1rem; font-weight: 600; margin-bottom: 20px; }
        
        .form-upload-grid { display: grid; grid-template-columns: 1fr; gap: 32px; margin-top: 20px; }
        @media (min-width: 992px) { .form-upload-grid { grid-template-columns: 2fr 1fr; } }

        .form-column-header { font-size: 1.05rem; font-weight: 600; color: var(--text-primary); margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid var(--border-color); }
        
        .file-upload-wrapper { border: 2px dashed var(--border-color); border-radius: var(--radius-lg); padding: 20px; text-align: center; background-color: var(--bg-main); position: relative; min-height: 250px; display: flex; align-items: center; justify-content: center; }
        .file-input-native { opacity: 0; position: absolute; inset: 0; width: 100%; height: 100%; cursor: pointer; z-index: 10; }
        
        /* Frame Preview PDF/Image */
        .preview-frame { width: 100%; height: 200px; border-radius: 8px; border: 1px solid var(--border-color); overflow: hidden; background: #fff; position: relative; }
        .preview-frame embed, .preview-frame img { width: 100%; height: 100%; object-fit: cover; }
        
        .form-actions { display: flex; gap: 12px; justify-content: flex-end; margin-top: 24px; border-top: 1px solid var(--border-color); padding-top: 24px;}

        .form-upload-column {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .file-upload-wrapper {
        border: 2px dashed var(--border-color);
        border-radius: var(--radius-lg);
        padding: 15px;
        background-color: var(--bg-main);
        position: relative;
        min-height: 300px;
    }

    /* Area Preview yang Bisa di-Scroll */
    .preview-frame {
        width: 100%;
        height: 500px; /* Kita perbesar ukurannya */
        border-radius: 8px;
        border: 1px solid var(--border-color);
        background: #fff;
        overflow-y: auto; /* Memungkinkan scroll internal */
        box-shadow: inset 0 0 10px rgba(0,0,0,0.1);
    }

    .preview-frame embed, .preview-frame img {
        width: 100%;
        min-height: 100%;
        display: block;
    }

    /* Input File disembunyikan total, dipicu lewat tombol */
    .file-input-hidden {
        display: none;
    }

    .preview-actions {
        display: flex;
        justify-content: center;
        margin-top: 15px;
    }

    /* Overlay Full Screen */
    .fullscreen-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.9);
        z-index: 9999;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .fullscreen-content {
        width: 90%;
        height: 85%;
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
    }

    .fullscreen-content embed, .fullscreen-content img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .close-fullscreen {
        position: absolute;
        top: 20px;
        right: 30px;
        color: #fff;
        font-size: 2rem;
        cursor: pointer;
        z-index: 10000;
    }
    </style>
    @endpush

    <div class="row">
        <div class="col-lg-12">
            <section class="card detail-card animated-card">
                <div class="detail-body">
                    <h3>Ubah Data Item: "{{ $fileArsip->uraian }}"</h3>

                    <form wire:submit="save">
                        <div class="form-upload-grid">
                            
                            {{-- KOLOM KIRI: METADATA --}}
                            <div class="form-metadata-column">
                                <h4 class="form-column-header">1. Detail Informasi File</h4>
                                
                                <div class="form-group" style="margin-bottom: 16px;">
                                    <label class="form-label">Uraian Informasi Arsip</label>
                                    <input type="text" id="uraian" class="form-control @error('uraian') is-invalid @enderror" 
                                           wire:model="uraian" placeholder="Contoh: Surat Undangan Rapat...">
                                    <small class="form-helper">Beri nama/deskripsi singkat untuk file ini.</small>
                                    @error('uraian') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div style="display: flex; gap: 20px; margin-bottom: 16px;">
                                    <div style="flex: 1;">
                                        <label class="form-label">Tanggal File</label>
                                        <input type="date" class="form-control" wire:model="tanggal_file">
                                    </div>
                                    <div style="flex: 1.5;">
                                        <label class="form-label">Kuantitas Item</label>
                                        <div style="display: flex; gap: 8px;">
                                            <input type="number" class="form-control" wire:model="jumlah" min="1" style="flex: 1;">
                                            <select wire:model="satuan" class="form-control" style="flex: 2;">
                                                <option value="Lembar">Lembar</option>
                                                <option value="Berkas">Berkas</option>
                                                <option value="Buku">Buku</option>
                                                <option value="Eksemplar">Eksemplar</option>
                                                <option value="Sampul">Sampul</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Tingkat Perkembangan</label>
                                    <select class="form-control" wire:model="tingkat_perkembangan">
                                        <option value="Asli">Asli</option>
                                        <option value="Fotokopi">Fotokopi</option>
                                        <option value="Salinan">Salinan</option>
                                    </select>
                                </div>
                            </div>

                            {{-- KOLOM KANAN: PREVIEW & UPLOAD --}}
                            <div class="form-upload-column" x-data="{ 
                                isNewFile: false, 
                                showFull: false,
                                previewUrl: '{{ $fileArsip->path_file ? Storage::url($fileArsip->path_file) : '' }}',
                                fileType: '{{ $fileArsip->tipe_file }}',
                                
                                handleFileChange(event) {
                                    const file = event.target.files[0];
                                    if (file) {
                                        this.isNewFile = true;
                                        this.fileType = file.type;
                                        this.previewUrl = URL.createObjectURL(file);
                                    }
                                }
                            }">
                                <h4 class="form-column-header">2. File Digital</h4>

                                <div class="file-upload-wrapper">
                                    {{-- Input File Tersembunyi --}}
                                    <input type="file" 
                                        id="file_baru" 
                                        x-ref="fileInput" 
                                        wire:model="file_baru" 
                                        class="file-input-hidden" 
                                        @change="handleFileChange">
                                    
                                    <div class="file-upload-ui" style="width: 100%;">
                                        {{-- State: ADA PREVIEW --}}
                                        <template x-if="previewUrl">
                                            <div class="preview-area">
                                                <div class="preview-frame">
                                                    {{-- Jika Image --}}
                                                    <template x-if="fileType.startsWith('image/')">
                                                        <img :src="previewUrl">
                                                    </template>
                                                    {{-- Jika PDF (Gunakan kontrol toolbar agar bisa scroll/zoom bawaan browser) --}}
                                                    <template x-if="fileType === 'application/pdf'">
                                                        <embed :src="previewUrl" type="application/pdf" style="height: 100%;">
                                                    </template>
                                                </div>
                                                
                                                <div class="preview-actions">
                                                    {{-- Tombol Ganti File --}}
                                                    <button type="button" 
                                                            class="btn btn-secondary" 
                                                            @click="$refs.fileInput.click()">
                                                        <i class="bi bi-arrow-repeat"></i> Ganti File
                                                    </button>

                                                    {{-- TOMBOL FULL SCREEN BARU --}}
                                                    <button type="button" class="btn btn-primary" @click="showFull = true">
                                                        <i class="bi bi-arrows-fullscreen"></i> Full Screen
                                                    </button>
                                                </div>
                                                <div style="text-align: center; margin-top: 8px;">
                                                    <span class="badge bg-primary" x-show="isNewFile">File Baru Dipilih</span>
                                                    <span class="badge bg-success" x-show="!isNewFile">File Saat Ini</span>
                                                </div>
                                            </div>
                                        </template>

                                        {{-- State: KOSONG --}}
                                        <template x-if="!previewUrl">
                                            <div style="cursor: pointer; padding: 40px 0;" @click="$refs.fileInput.click()">
                                                <i class="bi bi-cloud-arrow-up-fill" style="font-size: 3.5rem; color: var(--primary-blue);"></i>
                                                <p class="file-upload-text">Klik di sini untuk upload file digital</p>
                                                <small class="text-muted">Format: PDF, JPG, PNG (Maks 10MB)</small>
                                            </div>
                                        </template>
                                    </div>
                                </div>

                                {{-- MODAL FULL SCREEN (Hanya muncul jika showFull = true) --}}
                                <div x-show="showFull" x-transition class="fullscreen-overlay" @keydown.escape.window="showFull = false" style="display: none;">
                                    <span class="close-fullscreen" @click="showFull = false">&times;</span>
                            
                                    <div class="fullscreen-content" @click.away="showFull = false">
                                        <template x-if="fileType.startsWith('image/')">
                                            <img :src="previewUrl">
                                        </template>
                                        <template x-if="fileType === 'application/pdf'">
                                            <embed :src="previewUrl" type="application/pdf">
                                        </template>
                                    </div>
                            
                                <p style="color: #ccc; margin-top: 15px;">Tekan <b>ESC</b> untuk menutup</p>
                                </div>

                                @error('file_baru') <span class="text-danger">{{ $message }}</span> @enderror
                                <small class="form-helper" style="display: block; margin-top: 12px; font-style: italic;">
                                    *Item tetap dapat disimpan sebagai catatan metadata meskipun tanpa file digital.
                                </small>
                            </div>
                        </div>

                        <div class="form-actions">
                            <a href="{{ route('arsip.aktif.show', $arsip->id) }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                                <span wire:loading.remove><i class="bi bi-save"></i> Simpan Perubahan</span>
                                <span wire:loading><i class="bi bi-arrow-repeat spin"></i> Memproses...</span>
                            </button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>