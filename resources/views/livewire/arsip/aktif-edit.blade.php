{{-- [DIGABUNG] CSS dari Form Edit ANDA + CSS dari Manajemen File --}}
@push('styles')
{{-- Flatpickr CSS tidak diperlukan karena kita pakai input type="date" --}}
<style>
    /* [DIUBAH] Menggunakan CSS Grid 3-kolom dari form 'Create' */
    .form-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }

    /* [BARU] Media query untuk layar kecil (tablet ke bawah) */
    @media (max-width: 1024px) {
        .form-grid {
            /* 2 kolom di tablet */
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    /* [BARU] Media query untuk layar sangat kecil (ponsel) */
    @media (max-width: 640px) {
        .form-grid {
            /* 1 kolom di ponsel */
            grid-template-columns: 1fr;
        }
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
    input.error, select.error, textarea.error {
        border-color: #ff5c5c !important;
    }
    input.error:focus, select.error:focus, textarea.error:focus {
        box-shadow: 0 0 0 3px rgba(255, 92, 92, 0.3) !important;
    }

    /* [DIUBAH] Menggunakan class 'full' agar konsisten */
    .grid-col-span-full {
        grid-column: 1 / -1;
    }

    /* CSS Style untuk notifikasi */
    .notification-popup {
        position: fixed; top: 20px; left: 50%;
        transform: translateX(-50%); z-index: 1050;
        width: auto; max-width: 90%;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    
</style>
@endpush

{{-- [BAGIAN UPDATE HEADER] --}}
<x-slot name="header">
    @php
    // Ambil user saat ini
    $user = Auth::user();
    $namaBidangFinal = 'Nama Bidang'; // Default
    $slugBidangFinal = null; // Default

    if (isset($namaBidangYangDibuka) && isset($slugBidangYangDibuka)) {
        $namaBidangFinal = $namaBidangYangDibuka;
        $slugBidangFinal = $slugBidangYangDibuka;
    }
    elseif (isset($user->bidang)) {
        $namaBidangFinal = $user->bidang->nama;
        $slugBidangFinal = $user->bidang->slug;
    } elseif (isset($user->unit_kerja)) {
        $namaBidangFinal = $user->unit_kerja->nama;
        $slugBidangFinal = $user->unit_kerja->slug;
    }

    // [PERBAIKAN] 
    // 1. Gunakan variabel $slugBidangFinal (yang sudah diisi logika di atas)
    // 2. Gunakan str_replace untuk mengubah '_' jadi '-' agar cocok dengan route web.php
    $urlBidang = $slugBidangFinal ? route('dashboard.' . str_replace('_', '-', $slugBidangFinal)) : '#';
    @endphp

    <div class="welcome-title-group">
        <h1>Ubah Berkas Aktif</h1>
        <a href="{{ $urlBidang }}" class="breadcrumb-item active">{{ $namaBidangFinal }}</a>
        <i class="bi bi-chevron-right breadcrumb-separator"></i>
        <a href="{{ route('arsip.aktif.index') }}" class="breadcrumb-item active">Berkas Aktif</a>
        <i class="bi bi-chevron-right breadcrumb-separator"></i>
        <span class="breadcrumb-item active">Ubah Data</span>
    </div>
</x-slot>
{{-- [AKHIR BAGIAN UPDATE HEADER] --}}

{{-- 2. BLOK NOTIFIKASI (Flash Message) --}}
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

{{-- 3. KONTEN HALAMAN (Layout 1 Kolom) --}}
<section class="card animated-card">
    
    {{-- [DIHAPUS] Header Card ("Ubah Data Arsip") beserta icon pensil --}}
    
    <form wire:submit.prevent="update" autocomplete="off">
        <div class="card-body">
            <div class="form-grid">
                
                {{-- [DIHAPUS] Input Kode Klasifikasi --}}
                {{-- [DIHAPUS] Input Index --}}
                {{-- [DIHAPUS] Input Nomor Berkas --}}

                <div class="form-group grid-col-span-full">
                    <label for="uraian">Uraian <span style="color: #ff5c5c;">*</span></label>
                    <input type="text" id="uraian" wire:model="uraian" 
                           class="form-input-sm @error('uraian') error @enderror" 
                           placeholder="-">
                    @error('uraian') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="kurun_waktu">Kurun Waktu (Tahun) <span style="color: #ff5c5c;">*</span></label>
                    <input type="text" id="kurun_waktu" wire:model="kurun_waktu" 
                           class="form-input-sm @error('kurun_waktu') error @enderror" 
                           placeholder="-">
                    @error('kurun_waktu') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                
                <div class="form-group">
                    <label for="tanggal_dibuat">Tanggal Dibuat (Tanggal Berkas) <span style="color: #ff5c5c;">*</span></label>
                    <input type="date" id="tanggal_dibuat" wire:model="tanggal_dibuat" 
                           class="form-input-sm @error('tanggal_dibuat') error @enderror">
                    @error('tanggal_dibuat') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="jumlah">Jumlah Item <span style="color: #ff5c5c;">*</span></label>
                    <input type="number" id="jumlah" wire:model="jumlah" min="1" 
                           class="form-input-sm @error('jumlah') error @enderror" 
                           placeholder="-">
                    @error('jumlah') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                {{-- [DIHAPUS] Input Retensi Aktif --}}
                {{-- [DIHAPUS] Input Retensi Inaktif --}}
                {{-- [DIHAPUS] Input Status Akhir --}}

                <div class="form-group">
                    <label for="klasifikasi_keamanan">Klasifikasi Keamanan</label>
                    <select id="klasifikasi_keamanan" wire:model="klasifikasi_keamanan" 
                            class="form-select-sm @error('klasifikasi_keamanan') error @enderror">
                        <option value="">-</option>
                        <option value="Terbuka">Terbuka</option>
                        <option value="Terbatas">Terbatas</option>
                        <option value="Rahasia">Rahasia</option>
                        <option value="Sangat rahasia">Sangat rahasia</option>
                    </select>
                    @error('klasifikasi_keamanan') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="klasifikasi_akses">Klasifikasi Akses</label>
                    <select id="klasifikasi_akses" wire:model="klasifikasi_akses" 
                            class="form-select-sm @error('klasifikasi_akses') error @enderror">
                        <option value="">-</option>
                        <option value="internal dan eksternal">Internal dan Eksternal</option>
                        <option value="Eselon II">Eselon II</option>
                        <option value="Eselon III">Eselon III</option>
                        <option value="Eselon IV">Eselon IV</option>
                    </select>
                    @error('klasifikasi_akses') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="tingkat_perkembangan">Tingkat Perkembangan</label>
                    <select id="tingkat_perkembangan" wire:model="tingkat_perkembangan" 
                            class="form-select-sm @error('tingkat_perkembangan') error @enderror">
                        <option value="">-</option>
                        <option value="Asli">Asli</option>
                        <option value="Fotokopi">Fotokopi</option>
                    </select>
                    @error('tingkat_perkembangan') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

            </div>
        </div>
        
        <div class="card-footer form-footer">
            <a href="{{ route('arsip.aktif.index') }}" class="btn btn-secondary">
                <i class="bi bi-x-lg"></i> Batal
            </a>
            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="update">
                <i class="bi bi-save"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</section>
    
</div>

@push('scripts')
{{-- Tidak ada script tambahan --}}
@endpush