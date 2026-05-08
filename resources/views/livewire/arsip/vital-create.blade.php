@push('styles')
<style>
    /* === LAYOUT GRID UTAMA (KONSISTEN 3 KOLOM) === */
    .form-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }

    /* Tablet: 2 Kolom */
    @media (max-width: 1024px) {
        .form-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /* Ponsel: 1 Kolom */
    @media (max-width: 640px) {
        .form-grid {
            grid-template-columns: 1fr;
        }
    }

    /* === FORM COMPONENTS === */
    .form-group {
        margin-bottom: 0;
        position: relative;
    }

    .form-group label {
        display: block;
        margin-bottom: 6px;
        font-weight: 500;
        color: var(--text-primary);
        font-size: 0.9rem;
        display: flex;
        align-items: center; /* Agar loading sejajar dengan label */
    }

    .form-group input.form-input-sm,
    .form-group select.form-select-sm,
    .form-group textarea.form-input-sm {
        width: 100%;
        padding: 8px 12px;
        border-radius: var(--radius-md);
        border: 1px solid var(--border-color);
        background-color: var(--bg-input);
        color: var(--text-primary);
        font-size: 0.9rem;
    }
    
    .form-group input[readonly] {
        background-color: var(--bg-surface); /* Warna sedikit berbeda untuk readonly */
        cursor: not-allowed;
        opacity: 0.7;
    }

    /* === FIX DROPDOWN (SELECT) DARK MODE === */
    /* Memaksa browser merender popup native dalam mode gelap */
    body.dark-mode .form-group select.form-select-sm {
        color-scheme: dark; 
    }
    
    /* Fallback untuk browser yang mendukung styling option */
    body.dark-mode .form-group select.form-select-sm option {
        background-color: #1e1e2d; /* Warna gelap eksplisit */
        color: #ffffff;
    }

    /* Helpers Grid Span */
    .grid-col-span-full { grid-column: 1 / -1; }
    .grid-col-span-2 { grid-column: span 2 / span 2; }
    
    @media (max-width: 1024px) {
        .grid-col-span-2 { grid-column: 1 / -1; }
    }

    /* Footer & Error */
    .form-footer {
        margin-top: 24px;
        border-top: 1px solid var(--border-color);
        padding-top: 20px;
        display: flex;
        justify-content: flex-end;
        gap: 12px;
    }

    .text-danger {
        color: #ff5c5c;
        font-size: 0.875rem;
        margin-top: 4px;
        display: block;
    }
    
    .loading-indicator {
        font-size: 0.75rem;
        color: var(--primary-blue);
        margin-left: 8px;
        font-style: italic;
        font-weight: normal;
        display: inline-flex;
        align-items: center;
    }
    
    /* === ANIMASI SPINNER (FIXED) === */
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    .spin {
        animation: spin 1s linear infinite;
        display: inline-block;
    }
</style>
@endpush

<div>
    {{-- HEADER BREADCRUMB --}}
    <x-slot name="header">
        @php
            $urlBidang = $slugBidangYangDibuka ? route('dashboard.' . str_replace('_', '-', $slugBidangYangDibuka)) : '#';
            
            // PERBAIKAN: Tambahkan parameter filterBidang agar tetap terkunci di sub-bidang (misal: umpeg)
            $urlArsipVital = route('arsip.vital.index', ['filterBidang' => $slugBidangYangDibuka]);
        @endphp
        <div class="welcome-title-group">
            <h1>Tambah Berkas Vital</h1>
            <div class="breadcrumbs">
                {{-- Nama bidang diambil dari $namaBidangYangDibuka yang sudah dipetakan di mount() --}}
                <a href="{{ $urlBidang }}" class="breadcrumb-item active">{{ $namaBidangYangDibuka }}</a>
                <i class="bi bi-chevron-right breadcrumb-separator"></i>
                <a href="{{ $urlArsipVital }}" class="breadcrumb-item active">Arsip Vital</a>
                <i class="bi bi-chevron-right breadcrumb-separator"></i>
                <span class="breadcrumb-item active">Tambah</span>
            </div>
        </div>
    </x-slot>

    <section class="card animated-card">
        <h2 class="section-title" style="margin-bottom: 24px;">Form Input Arsip Vital</h2>

        <form wire:submit.prevent="save" autocomplete="off">
            <div class="form-grid">

                {{-- == BARIS 1: AUTO FILL TRIGGER == --}}

                {{-- Pilihan Pergub --}}
                <div class="form-group">
                    <label for="selectedPergub">Pilih Pergub (Opsional)</label>
                    <select id="selectedPergub" wire:model.live="selectedPergub" class="form-select-sm">
                        <option value="">-- Pilih (Untuk Autofill) --</option>
                        <option value="pergub26">Pergub 26</option>
                        <option value="pergub30">Pergub 30</option>
                    </select>
                    @error('selectedPergub') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Kode Klasifikasi --}}
                <div class="form-group">
                    <label for="kode_klasifikasi">Kode Klasifikasi <span style="color: #ff5c5c;">*</span>
                        <span wire:loading wire:target="selectedPergub" class="loading-indicator">Memuat list...</span>
                        <span wire:loading wire:target="kode_klasifikasi" class="loading-indicator">Mencari...</span>
                    </label>
                    <input type="text" id="kode_klasifikasi" 
                           list="klasifikasiListOptions"
                           wire:model.live.debounce.300ms="kode_klasifikasi"
                           class="form-input-sm @error('kode_klasifikasi') error @enderror"
                           placeholder="Ketik kode atau pilih..."
                           autocomplete="off">
                    
                    <datalist id="klasifikasiListOptions">
                        @foreach($klasifikasiList as $item)
                            <option value="{{ $item->kode_klasifikasi }}">
                                {{ $item->kode_klasifikasi }} - {{ $item->index ?? $item->nama_klasifikasi }}
                            </option>
                        @endforeach
                    </datalist>

                    @error('kode_klasifikasi') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Asal Arsip --}}
                <div class="form-group">
                    <label for="asal_arsip">Asal Arsip / Unit Kerja <span style="color: #ff5c5c;">*</span></label>
                    <input type="text" id="asal_arsip" wire:model="asal_arsip"
                           class="form-input-sm @error('asal_arsip') error @enderror"
                           placeholder="Contoh: Bidang Pemerintahan">
                    @error('asal_arsip') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- == BARIS 2: JENIS & ISI == --}}

                {{-- Jenis/Series (Auto Fill) --}}
                <div class="form-group">
                    <label for="jenis_series_arsip">Jenis / Series Arsip <span style="color: #ff5c5c;">*</span></label>
                    <input type="text" id="jenis_series_arsip" wire:model="jenis_series_arsip"
                           class="form-input-sm @error('jenis_series_arsip') error @enderror"
                           placeholder="Terisi otomatis..." readonly>
                    @error('jenis_series_arsip') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Isi Berkas (Lebar 2 Kolom, Rows Ditambah) --}}
                <div class="form-group grid-col-span-2">
                    <label for="isi_berkas">Isi Berkas <span style="color: #ff5c5c;">*</span></label>
                    <textarea id="isi_berkas" wire:model="isi_berkas" rows="3"
                              class="form-input-sm @error('isi_berkas') error @enderror"
                              placeholder="Uraian lengkap isi berkas"></textarea>
                    @error('isi_berkas') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- == BARIS 3: NOMOR & WAKTU == --}}

                {{-- Nomor Berkas (Auto Fill) --}}
                <div class="form-group">
                    <label for="nomor_berkas">Nomor Berkas <span style="color: #ff5c5c;">*</span>
                        <span wire:loading wire:target="bulan_tahun" class="loading-indicator">Hitung ulang...</span>
                    </label>
                    <input type="text" id="nomor_berkas" wire:model="nomor_berkas"
                           class="form-input-sm @error('nomor_berkas') error @enderror"
                           placeholder="(Otomatis)" readonly>
                    @error('nomor_berkas') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Bulan/Tahun (Pemicu Hitung Nomor) --}}
                <div class="form-group">
                    <label for="bulan_tahun">Bulan / Tahun <span style="color: #ff5c5c;">*</span></label>
                    <input type="text" id="bulan_tahun" wire:model.live.debounce.500ms="bulan_tahun"
                           class="form-input-sm @error('bulan_tahun') error @enderror"
                           placeholder="Contoh: 03/2025 atau 2025">
                    @error('bulan_tahun') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Jumlah Satuan --}}
                <div class="form-group">
                    <label for="jumlah_satuan">Jumlah Satuan <span style="color: #ff5c5c;">*</span></label>
                    <input type="number" id="jumlah_satuan" wire:model="jumlah_satuan" min="1"
                           class="form-input-sm @error('jumlah_satuan') error @enderror"
                           placeholder="Contoh: 1">
                    @error('jumlah_satuan') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- == BARIS 4: LOKASI & RETENSI == --}}

                {{-- Retensi Vital (Auto Fill) --}}
                <div class="form-group">
                    <label for="retensi_arsip_vital">Retensi Arsip Vital <span style="color: #ff5c5c;">*</span></label>
                    <input type="text" id="retensi_arsip_vital" wire:model="retensi_arsip_vital"
                           class="form-input-sm @error('retensi_arsip_vital') error @enderror"
                           placeholder="Contoh: Permanen">
                    @error('retensi_arsip_vital') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Lokasi Simpan --}}
                <div class="form-group">
                    <label for="lokasi_simpan">Lokasi Simpan <span style="color: #ff5c5c;">*</span></label>
                    <input type="text" id="lokasi_simpan" wire:model="lokasi_simpan"
                           class="form-input-sm @error('lokasi_simpan') error @enderror"
                           placeholder="Contoh: Lemari A, Rak 1">
                    @error('lokasi_simpan') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Metode Perlindungan --}}
                <div class="form-group">
                    <label for="metode_perlindungan">Metode Perlindungan <span style="color: #ff5c5c;">*</span></label>
                    <input type="text" id="metode_perlindungan" wire:model="metode_perlindungan"
                           class="form-input-sm @error('metode_perlindungan') error @enderror"
                           placeholder="Contoh: Laminasi, Digitalisasi">
                    @error('metode_perlindungan') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- == BARIS 5: KONDISI & KEAMANAN == --}}

                <div class="form-group">
                    <label for="kondisi_arsip">Kondisi Arsip <span style="color: #ff5c5c;">*</span></label>
                    <input type="text" id="kondisi_arsip" wire:model="kondisi_arsip"
                           class="form-input-sm @error('kondisi_arsip') error @enderror"
                           placeholder="Contoh: Baik, Rusak Ringan">
                    @error('kondisi_arsip') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="klasifikasi_keamanan">Klasifikasi Keamanan <span style="color: #ff5c5c;">*</span></label>
                    <select id="klasifikasi_keamanan" wire:model="klasifikasi_keamanan"
                            class="form-select-sm @error('klasifikasi_keamanan') error @enderror">
                        <option value="">-- Pilih --</option>
                        <option value="Biasa">Biasa</option>
                        <option value="Terbatas">Terbatas</option>
                        <option value="Rahasia">Rahasia</option>
                        <option value="Sangat Rahasia">Sangat Rahasia</option>
                    </select>
                    @error('klasifikasi_keamanan') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- Keterangan --}}
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea id="keterangan" wire:model="keterangan" rows="1"
                           class="form-input-sm @error('keterangan') error @enderror"
                           placeholder="Kondisi fisik, dll..."></textarea>
                    @error('keterangan') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- == BARIS 6: KETERANGAN TAMBAHAN (FULL WIDTH) == --}}
                <div class="form-group grid-col-span-full">
                    <label for="keterangan_tambahan">Keterangan Tambahan</label>
                    <textarea id="keterangan_tambahan" wire:model="keterangan_tambahan" rows="2"
                              class="form-input-sm @error('keterangan_tambahan') error @enderror"
                              placeholder="Keterangan lain jika ada..."></textarea>
                    @error('keterangan_tambahan') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

            </div>

            <div class="form-footer">
                <a href="{{ route('arsip.vital.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-lg"></i> Batal
                </a>
                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="save">
                    <span wire:loading.remove wire:target="save"><i class="bi bi-save"></i> Simpan Berkas</span>
                    <span wire:loading wire:target="save"><i class="bi bi-arrow-repeat spin"></i> Menyimpan...</span>
                </button>
            </div>
        </form>
    </section>
</div>