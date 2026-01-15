{{-- File: resources/views/livewire/dashboard/partials/all-archives.blade.php --}}
<div class="animated-card" style="animation-delay: 0.1s;">
    
    {{-- Kita gunakan CSS dari layout utama Anda --}}
    
    <section class="card">
        
        {{-- HEADER DENGAN TOMBOL KEMBALI --}}
        <div class="section-header">
            <h2 class="section-title" style="margin-bottom: 0;">Semua Arsip</h2>
            {{-- Tombol ini memanggil setView('dashboard') untuk kembali --}}
            <button wire:click="setView('dashboard')" class="btn" style="background-color: var(--bg-active); color: var(--text-primary);">
                <i class="bi bi-arrow-left"></i>
                <span>Kembali ke Dashboard</span>
            </button>
        </div>

        {{-- TABS (AKTIF, INAKTIF, VITAL) --}}
        <div class="arsip-tabs" style="margin-bottom: 20px;">
            <a href="#" wire:click.prevent="setTab('aktif')" class="tab-item {{ $activeTab === 'aktif' ? 'active' : '' }}">Arsip Aktif</a>
            <a href="#" wire:click.prevent="setTab('inaktif')" class="tab-item {{ $activeTab === 'inaktif' ? 'active' : '' }}">Arsip Inaktif</a>
            <a href="#" wire:click.prevent="setTab('vital')" class="tab-item {{ $activeTab === 'vital' ? 'active' : '' }}">Arsip Vital</a>
        </div>

        {{-- KONTEN TAB --}}
        <div>
            {{-- ================= TAB ARSIP AKTIF ================= --}}
            @if ($activeTab === 'aktif')
                <div wire:key="tab-aktif">
                    <div class="card-controls" style="padding-top: 0;">
                        <div class="card-search-bar">
                            <i class="bi bi-search"></i>
                            <input wire:model.live.debounce.500ms="searchAktif" type="text" placeholder="Cari nama berkas atau nomor berkas...">
                        </div>
                    </div>
                    <div class="content-table-container">
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Klasifikasi / Nomor Berkas</th>
                                    <th>Nama Berkas</th>
                                    <th>Tanggal Buat</th>
                                    <th>Kurun Waktu</th>
                                    <th>Jumlah Item</th>
                                    <th>Retensi Aktif</th>
                                    <th>Retensi Inaktif</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($arsipAktif as $index => $arsip)
                                    <tr>
                                        <td>{{ $arsipAktif->firstItem() + $index }}</td>
                                        <td><a href="{{ route('arsip.aktif.edit', $arsip->id) }}" class="arsip-title" style="color: var(--primary-blue);">{{ $arsip->kode_klasifikasi_nomor_berkas }}</a></td>
                                        <td>{{ $arsip->nama_berkas }}</td>
                                        <td>{{ $arsip->tanggal_buat_berkas->format('d/m/Y') }}</td>
                                        <td>{{ $arsip->kurun_waktu }}</td>
                                        <td>{{ $arsip->jumlah_item }}</td>
                                        <td>{{ $arsip->retensi_aktif }}</td>
                                        <td>{{ $arsip->retensi_inaktif }}</td>
                                        <td>{{ $arsip->keterangan ?? '-' }}</td>
                                        <td class="action-buttons">
                                            <a href="{{ route('arsip.aktif.edit', $arsip->id) }}" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                            {{-- Tambahkan tombol hapus jika ada --}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" style="text-align: center; padding: 40px; color: var(--text-muted);">
                                            <i class="bi bi-inbox" style="font-size: 2rem; display: block; margin-bottom: 10px;"></i>
                                            Belum ada data arsip aktif
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div style="margin-top: 20px;">
                        {{ $arsipAktif->links() }}
                    </div>
                </div>
            @endif
            
            {{-- ================= TAB ARSIP INAKTIF ================= --}}
            @if ($activeTab === 'inaktif')
                <div wire:key="tab-inaktif">
                    <div class="card-controls" style="padding-top: 0;">
                        <div class="card-search-bar">
                            <i class="bi bi-search"></i>
                            <input wire:model.live.debounce.500ms="searchInaktif" type="text" placeholder="Cari nomor box, nomor berkas, kode...">
                        </div>
                    </div>
                    <div class="content-table-container">
                        <table class="content-table" style="white-space: nowrap;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Box</th>
                                    <th>Nomor Berkas</th>
                                    <th>Kode Klasifikasi</th>
                                    <th>Index</th>
                                    <th>Uraian</th>
                                    <th>Bulan/Tahun</th>
                                    <th>Jumlah Satuan</th>
                                    <th>Klas. Keamanan</th>
                                    <th>Klas. Akses</th>
                                    <th>Tingkat Perkemb.</th>
                                    <th>Nasib Akhir</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($arsipInaktif as $index => $arsip)
                                    <tr>
                                        <td>{{ $arsipInaktif->firstItem() + $index }}</td>
                                        <td><a href="{{ route('arsip.inaktif.edit', $arsip->id) }}" class="arsip-title" style="color: var(--primary-blue);">{{ $arsip->nomor_box }}</a></td>
                                        <td>{{ $arsip->nomor_berkas }}</td>
                                        <td>{{ $arsip->kode_klasifikasi }}</td>
                                        <td>{{ $arsip->index }}</td>
                                        <td>{{ Str::limit($arsip->uraian, 50) }}</td>
                                        <td>{{ $arsip->bulan_tahun }}</td>
                                        <td>{{ $arsip->jumlah_satuan }}</td>
                                        <td>{{ $arsip->klasifikasi_keamanan }}</td>
                                        <td>{{ $arsip->klasifikasi_akses }}</td>
                                        <td>{{ $arsip->tingkat_perkembangan }}</td>
                                        <td>{{ $arsip->nasib_akhir }}</td>
                                        <td class="action-buttons">
                                             <a href="{{ route('arsip.inaktif.edit', $arsip->id) }}" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                            {{-- Tambahkan tombol hapus jika ada --}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="13" style="text-align: center; padding: 40px; color: var(--text-muted);">
                                            <i class="bi bi-inbox" style="font-size: 2rem; display: block; margin-bottom: 10px;"></i>
                                            Belum ada data arsip inaktif
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                     <div style="margin-top: 20px;">
                        {{ $arsipInaktif->links() }}
                    </div>
                </div>
            @endif

            {{-- ================= TAB ARSIP VITAL ================= --}}
            @if ($activeTab === 'vital')
                 <div wire:key="tab-vital">
                    <div class="card-controls" style="padding-top: 0;">
                        <div class="card-search-bar">
                            <i class="bi bi-search"></i>
                            <input wire:model.live.debounce.500ms="searchVital" type="text" placeholder="Cari asal arsip, nomor berkas, kode...">
                        </div>
                    </div>
                    <div class="content-table-container">
                        <table class="content-table" style="white-space: nowrap;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Asal Arsip / Unit Kerja</th>
                                    <th>Nomor Berkas</th>
                                    <th>Kode Klasifikasi</th>
                                    <th>Jenis / Series Arsip</th>
                                    <th>Isi Berkas</th>
                                    <th>Bulan / Tahun</th>
                                    <th>Jumlah Satuan</th>
                                    <th>Klas. Keamanan</th>
                                    <th>Keterangan</th>
                                    <th>Retensi</th>
                                    <th>Lokasi Simpan</th>
                                    <th>Metode Perlindungan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($arsipVital as $index => $arsip)
                                    <tr>
                                        <td>{{ $arsipVital->firstItem() + $index }}</td>
                                        <td><a href="{{ route('arsip.vital.edit', $arsip->id) }}" class="arsip-title" style="color: var(--primary-blue);">{{ $arsip->asal_arsip }}</a></td>
                                        <td>{{ $arsip->nomor_berkas }}</td>
                                        <td>{{ $arsip->kode_klasifikasi }}</td>
                                        <td>{{ $arsip->jenis_series_arsip }}</td>
                                        <td>{{ Str::limit($arsip->isi_berkas, 50) }}</td>
                                        <td>{{ $arsip->bulan_tahun }}</td>
                                        <td>{{ $arsip->jumlah_satuan }}</td>
                                        <td>{{ $arsip->klasifikasi_keamanan }}</td>
                                        <td>{{ $arsip->keterangan ?? '-' }}</td>
                                        <td>{{ $arsip->retensi_arsip_vital }}</td>
                                        <td>{{ $arsip->lokasi_simpan }}</td>
                                        <td>{{ $arsip->metode_perlindungan }}</td>
                                        <td class="action-buttons">
                                            <a href="{{ route('arsip.vital.edit', $arsip->id) }}" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                            {{-- Tambahkan tombol hapus jika ada --}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="14" style="text-align: center; padding: 40px; color: var(--text-muted);">
                                            <i class="bi bi-inbox" style="font-size: 2rem; display: block; margin-bottom: 10px;"></i>
                                            Belum ada data arsip vital
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                     <div style="margin-top: 20px;">
                        {{ $arsipVital->links() }}
                    </div>
                </div>
            @endif
        </div>
    </section>
</div>