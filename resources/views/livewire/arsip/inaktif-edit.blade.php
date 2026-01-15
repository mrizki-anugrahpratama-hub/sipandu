@push('styles')
<style>
    /* CSS untuk form */
    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 24px;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        margin-bottom: 6px;
        font-weight: 500;
        color: var(--text-primary);
        font-size: 0.9rem;
    }
    .form-group input.form-input-sm,
    .form-group select.form-select-sm,
    .form-group textarea.form-input-sm {
        width: 100%;
    }
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
    /* Style untuk input error */
    input.error, select.error, textarea.error {
        border-color: #ff5c5c !important;
    }
    input.error:focus, select.error:focus, textarea.error:focus {
            box-shadow: 0 0 0 3px rgba(255, 92, 92, 0.3) !important;
    }
    .grid-col-span-2 {
        grid-column: 1 / -1;
    }
</style>
@endpush

<div>
    {{-- [DIUBAH] BREADCRUMB HEADER --}}
    <x-slot name="header">
        @php
            $urlBidang = $slugBidangYangDibuka ? route('dashboard.' . $slugBidangYangDibuka) : '#';
        @endphp
        <div class="welcome-title-group">
            <h1>Edit Arsip Inaktif</h1>
            
            {{-- Breadcrumb Dinamis --}}
            <a href="{{ $urlBidang }}" class="breadcrumb-item active">{{ $namaBidangYangDibuka }}</a>
            <i class="bi bi-chevron-right breadcrumb-separator"></i>
            <a href="{{ route('arsip.inaktif.index') }}" class="breadcrumb-item active">Arsip Inaktif</a>
            <i class="bi bi-chevron-right breadcrumb-separator"></i>
            <span class="breadcrumb-item active">Edit</span>
        </div>
    </x-slot>
    {{-- [AKHIR PERUBAHAN] --}}

    <section class="card animated-card">
        <h2 class="section-title" style="margin-bottom: 24px;">Edit Arsip Inaktif</h2>

        <form wire:submit.prevent="update">
            {{-- [DIUBAH] Menggunakan class CSS, bukan inline style --}}
            <div class="form-grid">
                
                <div class="form-group">
                    <label for="nomor_box">Nomor Box <span style="color: #ff5c5c;">*</span></label>
                    <input type="text" id="nomor_box" wire:model="nomor_box" 
                           class="form-input-sm @error('nomor_box') error @enderror">
                    @error('nomor_box') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="nomor_berkas">Nomor Berkas <span style="color: #ff5c5c;">*</span></label>
                    <input type="text" id="nomor_berkas" wire:model="nomor_berkas" 
                           class="form-input-sm @error('nomor_berkas') error @enderror">
                    @error('nomor_berkas') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="kode_klasifikasi">Kode Klasifikasi <span style="color: #ff5c5c;">*</span></label>
                    <input type="text" id="kode_klasifikasi" wire:model="kode_klasifikasi" 
                           class="form-input-sm @error('kode_klasifikasi') error @enderror">
                    @error('kode_klasifikasi') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="index">Index <span style="color: #ff5c5c;">*</span></label>
                    <input type="text" id="index" wire:model="index" 
                           class="form-input-sm @error('index') error @enderror">
                    @error('index') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group grid-col-span-2">
                    <label for="uraian">Uraian <span style="color: #ff5c5c;">*</span></label>
                    <textarea id="uraian" wire:model="uraian" rows="3" 
                              class="form-input-sm @error('uraian') error @enderror"></textarea>
                    @error('uraian') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- [PERBAIKAN 1] 'bulan_tahun' -> 'kurun_waktu' --}}
                <div class="form-group">
                    <label for="kurun_waktu">Kurun Waktu (Bulan/Tahun) <span style="color: #ff5c5c;">*</span></label>
                    <input type="text" id="kurun_waktu" wire:model="kurun_waktu" 
                           class="form-input-sm @error('kurun_waktu') error @enderror">
                    @error('kurun_waktu') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- [PERBAIKAN 2] 'jumlah_satuan' -> 'jumlah' --}}
                <div class="form-group">
                    <label for="jumlah">Jumlah Satuan <span style="color: #ff5c5c;">*</span></label>
                    <input type="number" id="jumlah" wire:model="jumlah" min="1" 
                           class="form-input-sm @error('jumlah') error @enderror">
                    @error('jumlah') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="klasifikasi_keamanan">Klasifikasi Keamanan <span style="color: #ff5c5c;">*</span></label>
                    <select id="klasifikasi_keamanan" wire:model="klasifikasi_keamanan" 
                            class="form-select-sm @error('klasifikasi_keamanan') error @enderror">
                        <option value="Biasa">Biasa</option>
                        <option value="Terbatas">Terbatas</option>
                        <option value="Rahasia">Rahasia</option>
                        <option value="Sangat Rahasia">Sangat Rahasia</option>
                    </select>
                    @error('klasifikasi_keamanan') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="klasifikasi_akses">Klasifikasi Akses <span style="color: #ff5c5c;">*</span></label>
                    <select id="klasifikasi_akses" wire:model="klasifikasi_akses" 
                            class="form-select-sm @error('klasifikasi_akses') error @enderror">
                        <option value="Terbuka">Terbuka</option>
                        <option value="Terbatas">Terbatas</option>
                        <option value="Rahasia">Rahasia</option>
                    </select>
                    @error('klasifikasi_akses') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="tingkat_perkembangan">Tingkat Perkembangan <span style="color: #ff5c5c;">*</span></label>
                    <input type="text" id="tingkat_perkembangan" wire:model="tingkat_perkembangan" 
                           class="form-input-sm @error('tingkat_perkembangan') error @enderror">
                    @error('tingkat_perkembangan') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- [PERBAIKAN 3] 'nasib_akhir' -> 'status_akhir' --}}
                <div class="form-group">
                    <label for="status_akhir">Status Akhir <span style="color: #ff5c5c;">*</span></label>
                    <select id="status_akhir" wire:model="status_akhir" 
                            class="form-select-sm @error('status_akhir') error @enderror">
                        <option value="Musnah">Musnah</option>
                        <option value="Permanen">Permanen</option>
                    </select>
                    @error('status_akhir') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-footer">
                <a href="{{ route('arsip.inaktif.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-lg"></i> Batal
                </a>
                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                    <i class="bi bi-save"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </section>
</div>