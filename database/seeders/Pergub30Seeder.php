<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pergub30;
use Illuminate\Support\Facades\DB;

class Pergub30Seeder extends Seeder
{
    public function run(): void
    {
        // Kosongkan tabel
        DB::table('data_pergub_30')->truncate();

        // Data dari file 000.txt
        $data = [
            [
                'kode_klasifikasi' => '000.1',
                'index'            => 'KETATAUSAHAAN DAN KERUMAHTANGGAAN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.1.1',
                'index'            => 'Telekomunikasi (Fasilitasi Telekomunikasi)',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.1.2',
                'index'            => 'Perjalanan Dinas Dalam Negeri',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.1.2.1',
                'index'            => 'Perjalanan Dinas Kepala Daerah',
                'retensi_aktif'    => '5 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.1.2.2',
                'index'            => 'Perjalanan Dinas DPRD',
                'retensi_aktif'    => '5 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.1.2.3',
                'index'            => 'Perjalanan Dinas Pegawai',
                'retensi_aktif'    => '5 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.1.3',
                'index'            => 'Perjalanan Dinas Luar Negeri',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.1.3.1',
                'index'            => 'Perjalanan Dinas Kepala Daerah',
                'retensi_aktif'    => '5 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.1.3.2',
                'index'            => 'Perjalanan Dinas DPRD',
                'retensi_aktif'    => '5 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.1.3.3',
                'index'            => 'Perjalanan Dinas Pegawai',
                'retensi_aktif'    => '5 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.1.4',
                'index'            => 'Penggunaan Fasilitas Kantor, antara lain: Permintaan dan Penggunaan Ruang Rapat, Gedung, Kendaraan, Wisma, Rumah Dinas, dan Fasilitas Kantor Lainnya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.1.5',
                'index'            => 'Rapat Pimpinan antara lain: Notula/Risalah Rapat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '4 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.1.6',
                'index'            => 'Penyediaan Konsumsi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.1.7',
                'index'            => 'Pengurusan Kendaraan Dinas',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.1.7.1',
                'index'            => 'Pengurusan Surat-surat Kendaraan Dinas',
                'retensi_aktif'    => '2 Tahun Setelah Pemeriksaan',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.1.7.2',
                'index'            => 'Pemeliharaan dan Perbaikan',
                'retensi_aktif'    => '2 Tahun Setelah Pemeriksaan',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.1.7.3',
                'index'            => 'Pengurusan Kehilangan dan Masalah Kendaraan',
                'retensi_aktif'    => '1 Tahun Sampai Dengan Masalah Selesai',
                'retensi_inaktif'  => '2 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.1.8',
                'index'            => 'Pemeliharaan Gedung, Taman, dan Peralatan Kantor',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.1.8.1',
                'index'            => 'Pertamanan/Landscape',
                'retensi_aktif'    => '2 Tahun Setelah Pemeriksaan',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.1.8.2',
                'index'            => 'Penghijauan',
                'retensi_aktif'    => '2 Tahun Setelah Pemeriksaan',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.1.8.3',
                'index'            => 'Perbaikan Gedung',
                'retensi_aktif'    => '2 Tahun Setelah Pemeriksaan',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.1.8.4',
                'index'            => 'Perbaikan Peralatan Kantor',
                'retensi_aktif'    => '2 Tahun Setelah Pemeriksaan',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.1.8.5',
                'index'            => 'Perbaikan Rumah Dinas/Wisma',
                'retensi_aktif'    => '2 Tahun Setelah Pemeriksaan',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.1.8.6',
                'index'            => 'Kebersihan Gedung dan Taman',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.1.9',
                'index'            => 'Pengelolaan Jaringan Listrik, Air, Telepon, dan Komputer',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.1.9.1',
                'index'            => 'Perbaikan/Pemeliharaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.1.9.2',
                'index'            => 'Pemasangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.1.10',
                'index'            => 'Ketertiban dan Keamanan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.1.10.1',
                'index'            => 'Pengamanan, Penjagaan, dan Pengawalan terhadap Pejabat, Kantor, dan Rumah Dinas',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.1.10.2',
                'index'            => 'Laporan Ketertiban dan Keamanan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.1.11',
                'index'            => 'Administrasi Pengelolaan Parkir',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.1.12',
                'index'            => 'Administrasi Pakaian Dinas Pegawai, Satpam, Petugas Kebersihan, dan Pegawai Lainnya',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.2',
                'index'            => 'PERLENGKAPAN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.2.1',
                'index'            => 'Inventarisasi dan Penyimpanan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.2.1.1',
                'index'            => 'Data Hasil Inventarisasi dan Penyimpanan (Barang Bergerak dan Barang Tidak Bergerak)',
                'retensi_aktif'    => '2 Tahun Setelah Pemutakhiran Data (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah, Kecuali barang Tidak Bergerak'
            ],
            [
                'kode_klasifikasi' => '000.2.1.2',
                'index'            => 'Laporan dan Evaluasi Inventarisasi dan Penyimpanan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.2.2',
                'index'            => 'Pemeliharaan Peralatan Kantor',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.2.2.1',
                'index'            => 'Data Hasil Pemeliharaan Kantor',
                'retensi_aktif'    => '2 Tahun Setelah Pemutakhiran Data (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.2.2.2',
                'index'            => 'Laporan dan Evaluasi Pemeliharaan Kantor',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.2.3',
                'index'            => 'Distribusi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.2.3.1',
                'index'            => 'Barang Habis Pakai',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.2.3.2',
                'index'            => 'Barang Milik Daerah',
                'retensi_aktif'    => '2 Tahun Setelah Proses Kegiatan Dipertanggungjawabkan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.2.4',
                'index'            => 'Penghapusan Barang Milik Daerah, antara lain: Keputusan Pembentukan Tim, Berita Acara Penghapusan Barang Milik Daerah, Daftar Barang yang Dihapuskan, Laporan Hasil Pelaksanaan Penghapusan BMD Termasuk di dalamnya Proses Lelang Penghapusan',
                'retensi_aktif'    => '3 Tahun Setelah Proses Kegiatan Dipertanggungjawabkan',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.2.5',
                'index'            => 'Pengelolaan Database Barang Milik Daerah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.3',
                'index'            => 'PENGADAAN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.3.1',
                'index'            => 'Rencana Pengadaan Barang dan Jasa, antara lain: Identifikasi dan Analisis Kebutuhan Barang/Jasa, Penyusunan dan Penetapan Rencana Penganggaran Pengadaan, Penetapan Kebijakan Umum, Penyusunan Kerangka Acuan Kerja (KAK), Pengumuman Rencana Umum Pengadaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.3.2',
                'index'            => 'Pengadaan Langsung, antara lain: Persiapan Pemilihan Penyedia, Pelaksanaan Pemilihan Penyedia, Penandatanganan Kontrak, Pelaksanaan Kontrak',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.3.3',
                'index'            => 'Pengadaan Tidak Langsung/Lelang, antara lain: Persiapan Pemilihan Penyedia, Pelaksanaan Pemilihan Penyedia, Penandatanganan Kontrak, Pelaksanaan Kontrak',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.3.4',
                'index'            => 'Swakelola, antara lain: Perencanaan, Pelaksanaan, dan Evaluasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.3.5',
                'index'            => 'Pengolahan Sistem Informasi Pengadaan, antara lain: Database Pengguna Sistem Informasi Pengadaan Barang/Jasa, Database Kontrak, Database Pengadaan Barang/Jasa',
                'retensi_aktif'    => '2 Tahun Setelah Pemutakhiran Data (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.3.6',
                'index'            => 'Monitoring dan Evaluasi, antara lain: Laporan Hasil Monitoring, Laporan Hasil Evaluasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.4',
                'index'            => 'PERPUSTAKAAN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.4.1',
                'index'            => 'Kebijakan di Bidang Perpustakaan yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.4.2',
                'index'            => 'Deposit Bahan Pustaka',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.4.2.1',
                'index'            => 'Serah Simpan Karya Cetak dan Karya Rekam',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.4.2.2',
                'index'            => 'Pangkalan Data Penerbit dan Pengusaha Rekaman',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.4.2.3',
                'index'            => 'Terbitan Internasional dan Regional',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.4.2.4',
                'index'            => 'Pemantauan Wajib Serah Simpan Karya Cetak dan Karya Rekam',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.4.2.5',
                'index'            => 'Bibliografi dan Katalog',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.4.3',
                'index'            => 'Koleksi Pustaka',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.4.3.1',
                'index'            => 'Pembelian',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.4.3.2',
                'index'            => 'Hibah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.4.3.3',
                'index'            => 'Hadiah',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.4.3.4',
                'index'            => 'Tukar-menukar',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.4.3.5',
                'index'            => 'Implementasi Undang-Undang KCKR',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.4.3.6',
                'index'            => 'Terbitan Internal',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.4.3.7',
                'index'            => 'Pendistribusian Bahan Pustaka Surplus',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.4.3.8',
                'index'            => 'Inventarisasi Koleksi (Buku Induk)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.4.4',
                'index'            => 'Pengolahan Bahan Pustaka',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.4.5',
                'index'            => 'Pangkalan Data Katalog Koleksi',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.4.6',
                'index'            => 'Layanan Perpustakaan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.4.6.1',
                'index'            => 'Keanggotaan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.4.6.2',
                'index'            => 'Peminjaman',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.4.6.3',
                'index'            => 'Pengembangan Gemar Baca',
                'retensi_aktif'    => '1 Tahun Setelah Sistem Aplikasi Ditingkatkan dan Dikembangkan (Upgrade)',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.4.7',
                'index'            => 'Kerja Sama Perpustakaan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.4.7.1',
                'index'            => 'Memorandum of Understanding (MoU)',
                'retensi_aktif'    => '2 Tahun Setelah Perjanjian, Kontrak, Kerja Sama Berakhir, dan Kewajiban Para Pihak telah Ditunaikan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.4.7.2',
                'index'            => 'Perjanjian Kerja Sama',
                'retensi_aktif'    => '2 Tahun Setelah Perjanjian, Kontrak, Kerja Sama Berakhir, dan Kewajiban Para Pihak telah Ditunaikan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.4.7.3',
                'index'            => 'Partisipasi Organisasi Profesi dan Kerja Sama Internasional',
                'retensi_aktif'    => '2 Tahun Setelah Perjanjian, Kontrak, Kerja Sama Berakhir, dan Kewajiban Para Pihak telah Ditunaikan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.4.8',
                'index'            => 'Pengembangan Implementasi Teknologi Informasi Perpustakaan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.4.8.1',
                'index'            => 'Pengembangan Situs Web',
                'retensi_aktif'    => '1 Tahun Setelah Sistem Aplikasi Ditingkatkan dan Dikembangkan (Upgrade)',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.4.8.2',
                'index'            => 'Pengembangan Kemas Ulang Informasi Multimedia',
                'retensi_aktif'    => '1 Tahun Setelah Sistem Aplikasi Ditingkatkan dan Dikembangkan (Upgrade)',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.4.8.3',
                'index'            => 'Pengembangan Program Aplikasi Perpustakaan',
                'retensi_aktif'    => '2 Tahun Setelah Sistem Aplikasi Ditingkatkan dan Dikembangkan (Upgrade)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.4.8.4',
                'index'            => 'Pengembangan Pangkalan Data Kepustakaan Digital',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.4.9',
                'index'            => 'Pangkalan Data Layanan Perpustakaan',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.4.10',
                'index'            => 'Konservasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.4.10.1',
                'index'            => 'Perawatan Bahan Perpustakaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.4.10.2',
                'index'            => 'Perbaikan Bahan Perpustakaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.4.10.3',
                'index'            => 'Penjilidan Bahan Perpustakaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.4.11',
                'index'            => 'Reprografi (Mikrofilm, Reproduksi Foto)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.4.12',
                'index'            => 'Transformasi Digital',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.4.13',
                'index'            => 'Kurasi Digital',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.4.14',
                'index'            => 'Pengembangan Perpustakaan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.4.14.1',
                'index'            => 'Perpustakaan Umum',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.4.14.2',
                'index'            => 'Perpustakaan Khusus',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.4.14.3',
                'index'            => 'Perpustakaan Sekolah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.4.14.4',
                'index'            => 'Perpustakaan Perguruan Tinggi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.5',
                'index'            => 'KEARSIPAN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.5.1',
                'index'            => 'Kebijakan di Bidang Kearsipan yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.5.2',
                'index'            => 'Pembinaan Kearsipan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.5.2.1',
                'index'            => 'Pengembangan Profesi Arsiparis, antara lain: Formasi Jabatan Arsiparis, Analisis Kebutuhan Arsiparis',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.5.2.2',
                'index'            => 'Bimbingan Konsultasi Arsiparis',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.5.2.3',
                'index'            => 'Penilaian Arsiparis',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.5.2.4',
                'index'            => 'Pemilihan Arsiparis Teladan, antara lain: Berkas Penyelenggaraan Pemilihan Arsiparis Teladan, Berkas Penetapan Arsiparis Teladan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.5.2.5',
                'index'            => 'Database Arsiparis',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.5.2.6',
                'index'            => 'Bimbingan Konsultasi Kearsipan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.5.2.7',
                'index'            => 'Supervisi dan Evaluasi, antara lain: Perencanaan Supervisi dan Evaluasi, Pelaksanaan Supervisi dan Evaluasi, Laporan Hasil Supervisi dan Evaluasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.5.2.8',
                'index'            => 'Database Bimbingan dan Konsultasi dan Supervisi',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.5.2.9',
                'index'            => 'Fasilitasi Kearsipan, antara lain: Fasilitasi SDM Kearsipan, Fasilitasi Prasarana dan Sarana Kearsipan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.5.2.10',
                'index'            => 'Lembaga/Unit Kearsipan Teladan, antara lain: Berkas Penyelenggaraan Pemilihan Lembaga/Unit Kearsipan Teladan, Berkas Penetapan Lembaga/Unit Kearsipan Teladan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.5.2.11',
                'index'            => 'Jadwal Retensi Arsip, antara lain: Berkas Usulan Persetujuan JRA, Surat Persetujuan JRA dari Kepala ANRI',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Keputusan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.5.3',
                'index'            => 'Pengelolaan Arsip Dinamis',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.5.3.1',
                'index'            => 'Penciptaan, antara lain: Buku Registrasi Naskah Masuk dan Keluar, Buku Agenda, Kartu Kendali, Lembar Pengantar/Buku Ekspedisi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.5.3.2',
                'index'            => 'Pemberkasan Arsip Aktif, antara lain: Daftar Berkas dan Daftar Isi Berkas',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.5.3.3',
                'index'            => 'Penataan Arsip Inaktif, antara lain: Daftar Arsip Inaktif, Daftar Arsip Inaktif Tematik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.5.3.4',
                'index'            => 'Penggunaan, antara lain: Daftar Arsip Dinamis Berdasarkan Sistem Klasifikasi Keamanan dan Akses Arsip Dinamis, Bukti Peminjaman Arsip',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.5.3.5',
                'index'            => 'Autentikasi Arsip Dinamis, antara lain: Pembuktian Autentisitas, Pendapat Tenaga Ahli, Pengujian, Penetapan Autentisitas Arsip Dinamis',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.5.4',
                'index'            => 'Program Arsip Vital, antara lain: Identifikasi Arsip Vital, Pelindungan dan Pengamanan Arsip Vital, Penyelamatan Arsip Vital, dan Pemulihan Arsip Vital',
                'retensi_aktif'    => '2 Tahun Setelah Hak dan Kewajiban Selesai',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.5.5',
                'index'            => 'Pengelolaan Arsip Terjaga, antara lain: Daftar Identifikasi Arsip Terjaga, Daftar Berkas Arsip Terjaga, Daftar Isi Berkas Arsip Terjaga, Surat Penetapan Autentikasi Arsip Terjaga, Surat Penyerahan Arsip Terjaga, Daftar Salinan Autentik Arsip Terjaga, Berita Acara Penyerahan Salinan Autentik Arsip Terjaga',
                'retensi_aktif'    => '2 Tahun Setelah Hak dan Kewajiban Selesai',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.5.6',
                'index'            => 'Penyusutan Arsip',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.5.6.1',
                'index'            => 'Pemindahan Arsip, antara lain: Berita Acara Pemindahan, Daftar Arsip yang Dipindahkan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.5.6.2',
                'index'            => 'Pemusnahan Arsip, Meliputi: SK Penetapan Panitia Penilai Arsip, Pertimbangan Panitia Penilai, Permintaan Persetujuan Kepala ANRI untuk Pemusnahan Arsip dengan Retensi Sekurang-kurangnya 10 Tahun atau Persetujuan Kepala Daerah selaku Pimpinan Pencipta Arsip untuk Pemusnahan Arsip dengan Retensi di bawah 10 Tahun, Penetapan Arsip yang Dimusnahkan, Berita Acara Pemusnahan Arsip, Daftar Arsip yang Dimusnahkan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.5.6.3',
                'index'            => 'Penyerahan Arsip Statis, Meliputi: Pembentukan panitia penilai, Notulen Rapat Panitia, Surat Pertimbangan Panitia Penilai, Surat Persetujuan dari Kepala Lembaga Kearsipan, Surat Pernyataan Autentik, Terpercaya, Utuh, dan Digunakan dari Pencipta Arsip, Keputusan Penetapan Penyerahan, Berita Acara Penyerahan Arsip, Daftar Arsip yang Diserahkan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.5.7',
                'index'            => 'Alih Media Arsip, antara lain: Kebijakan Alih Media, Autentikasi, Berita Acara, Daftar Arsip yang Dialihmediakan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.5.8',
                'index'            => 'Database Pengelolaan Arsip Dinamis',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.5.8.1',
                'index'            => 'Database Pengelolaan Arsip Aktif',
                'retensi_aktif'    => '1 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.5.8.2',
                'index'            => 'Database Pengelolaan Arsip Inaktif',
                'retensi_aktif'    => '1 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.5.9',
                'index'            => 'Pengelolaan Arsip Statis',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.5.9.1',
                'index'            => 'Akuisisi, Meliputi: Monitoring Fisik dan Verifikasi Daftar Arsip, Penetapan Status Arsip, Persetujuan untuk Penyerahan, Penetapan Arsip yang Diserahkan Berita Acara Penyerahan Arsip, Daftar Arsip yang Diserahkan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.5.9.2',
                'index'            => 'Penghargaan dan Imbalan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.5.9.3',
                'index'            => 'Sejarah Lisan, antara lain: Administrasi Kegiatan, Berita Acara Wawancara Sejarah Lisan, Laporan Kegiatan, Hasil Wawancara (Kaset/CD/Media Lain Sesuai Perkembangan Teknologi dan Informasi) dan Transkrip',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.5.9.4',
                'index'            => 'Daftar Pencarian Arsip Statis, antara lain: Pengumuman, Akuisisi Daftar Pencarian Arsip Statis',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.5.9.5',
                'index'            => 'Menyusun Sarana Bantu Temu Balik, antara lain: Daftar Arsip Statis, Inventaris Arsip Statis, Guide',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.5.9.6',
                'index'            => 'Preservasi Preventif, antara lain: Penyimpanan, Pengendalian Hama Terpadu, Perencanaan dan Penanggulangan Bencana',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.5.9.7',
                'index'            => 'Preservasi Kuratif',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.5.9.8',
                'index'            => 'Autentikasi Arsip Statis, antara lain: Pembuktian Autentisitas, Pendapat Tenaga Ahli, Pengujian, Penetapan Autentisitas Arsip Statis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.5.9.9',
                'index'            => 'Akses Arsip Statis, antara lain: Layanan Arsip, Penerbitan Naskah Sumber',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.5.10',
                'index'            => 'Jasa Kearsipan, antara lain Konsultasi Kearsipan, Manual Kearsipan, Penataan Arsip, Otomasi Kearsipan, Penyimpanan Arsip, Perawatan dan Pemeliharaan Arsip',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.5.11',
                'index'            => 'Pengelolaan SIKN dan JIKN',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.5.12',
                'index'            => 'Pelindungan dan Penyelamatan Arsip Akibat Bencana',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.5.13',
                'index'            => 'Penyelamatan Arsip Perangkat Daerah Digabung dan/atau Dibubarkan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.5.14',
                'index'            => 'Penerbitan Izin Penggunaan Arsip yang Bersifat Tertutup',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.5.15',
                'index'            => 'Pengawasan Kearsipan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.5.15.1',
                'index'            => 'Pengawasan Kearsipan Internal',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.5.15.2',
                'index'            => 'Pengawasan Kearsipan Eksternal',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.5.15.3',
                'index'            => 'Sanksi',
                'retensi_aktif'    => '2 Tahun Setelah Keputusan Berkekuatan Hukum Tetap',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.6',
                'index'            => 'PERSANDIAN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.6.1',
                'index'            => 'Kebijakan di Bidang Persandian yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.6.2',
                'index'            => 'Pengamanan Persandian',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.6.2.1',
                'index'            => 'Pengamanan Sinyal: Teknik Sandi dan Kripto',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.6.2.2',
                'index'            => 'Analisis Sinyal: Teknik Sandi dan Kripto',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.6.2.3',
                'index'            => 'Materiil Sandi: Sistem dan Peralatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.6.3',
                'index'            => 'Pengkajian Persandian',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.6.3.1',
                'index'            => 'Perencanaan Pengkajian',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.6.3.2',
                'index'            => 'Administrasi Pengkajian',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.6.3.3',
                'index'            => 'Pelaksanaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.6.3.4',
                'index'            => 'Pelaporan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.6.4',
                'index'            => 'Pembinaan dan Pengendalian Persandian',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.6.4.1',
                'index'            => 'Sumber Daya Manusia (SDM)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.6.4.2',
                'index'            => 'Jaring Komunikasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.6.5',
                'index'            => 'Layanan Sertifikasi Elektronik',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.6.5.1',
                'index'            => 'Perencanaan dan Administrasi',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.6.5.2',
                'index'            => 'Pelaksanaan Verifikasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.6.5.3',
                'index'            => 'Pelaksanaan Perjanjian Kerja Sama',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.6.5.4',
                'index'            => 'Penyesuaian Sistem dan Testing',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.6.5.5',
                'index'            => 'Pelaksanaan Bimbingan Teknis Pengguna',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.6.5.6',
                'index'            => 'Pelaksanaan Penerbitan Sertifikat Elektronik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.6.5.7',
                'index'            => 'Pelaporan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.7',
                'index'            => 'PERENCANAAN PEMBANGUNAN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.7.1',
                'index'            => 'Musyawarah Perencanaan Pembangunan (Musrenbang)',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.7.1.1',
                'index'            => 'Musrenbang Provinsi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.7.1.2',
                'index'            => 'Musrenbang Nasional',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.7.1.3',
                'index'            => 'Musrenbang Kab/Kota',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.7.1.4',
                'index'            => 'Musrenbang Kecamatan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.7.1.5',
                'index'            => 'Musrenbang Kelurahan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.7.1.6',
                'index'            => 'Musrenbang Desa',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.7.2',
                'index'            => 'Perencanaan Pembangunan Daerah',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.7.2.1',
                'index'            => 'Rencana Pembangunan Jangka Panjang',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.7.2.2',
                'index'            => 'Rencana Pembangunan Jangka Menengah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.7.2.3',
                'index'            => 'Rencana Anggaran Daerah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.7.2.4',
                'index'            => 'Rencana Pembangunan Tahunan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.7.2.5',
                'index'            => 'Rencana Pembentukan Satuan Kerja Perangkat Daerah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.7.2.6',
                'index'            => 'Program Kerja Tahunan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.7.2.7',
                'index'            => 'Penetapan/Kontrak Kinerja',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '4 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.7.2.8',
                'index'            => 'Laporan Berkala',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.7.2.9',
                'index'            => 'Laporan Insidental',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '4 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.7.2.10',
                'index'            => 'Evaluasi Program',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '4 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.7.3',
                'index'            => 'Koordinasi dan Sinkronisasi Perencanaan Pembangunan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.7.4',
                'index'            => 'Konsultasi Perencanaan Pembangunan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.7.5',
                'index'            => 'Pemantauan, Evaluasi, Penilaian, dan Pelaporan Perencanaan Pembangunan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.7.6',
                'index'            => 'Aksi Strategis Daerah',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.7.6.1',
                'index'            => 'Rancangan Awal Perencanaan Aksi Strategi Daerah',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.7.6.2',
                'index'            => 'Rapat Pembahasan Rancangan Awal dengan Perangkat Daerah',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.7.6.3',
                'index'            => 'Sosialisasi dengan Perangkat Daerah',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.7.6.4',
                'index'            => 'Rancangan Akhir Perencanaan Aksi Strategi Daerah',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.7.6.5',
                'index'            => 'Penerapan Perencanaan Aksi Strategi Daerah',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.7.7',
                'index'            => 'Perencanaan Pendanaan Pembangunan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.7.7.1',
                'index'            => 'Pendanaan Nasional dan Hibah',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.7.7.2',
                'index'            => 'Pendanaan Daerah',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.7.7.3',
                'index'            => 'Kerja Sama Pembangunan Nasional',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.7.7.4',
                'index'            => 'Surat Berharga Syariah Negara',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.7.7.5',
                'index'            => 'Pendanaan On Top atau Inisiatif Baru',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.8',
                'index'            => 'ORGANISASI DAN TATA LAKSANA',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.8.1',
                'index'            => 'Struktur Organisasi di Lingkungan Pemerintahan Daerah Kabupaten',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.8.1.1',
                'index'            => 'Pembentukan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.8.1.2',
                'index'            => 'Pengubahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.8.1.3',
                'index'            => 'Pembubaran',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.8.2',
                'index'            => 'Uraian Jabatan dan Tata Kerja',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.8.2.1',
                'index'            => 'Analisis Jabatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.8.2.2',
                'index'            => 'Analisis Beban Kerja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.8.3',
                'index'            => 'Ketatalaksanaan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.8.3.1',
                'index'            => 'Proses Bisnis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.8.3.2',
                'index'            => 'Standar Pelayanan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.8.3.3',
                'index'            => 'Standar Operasional Prosedur',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.8.3.4',
                'index'            => 'Pelayanan Publik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.8.4',
                'index'            => 'Standar Kompetensi Jabatan Struktural dan Fungsional',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.8.5',
                'index'            => 'Evaluasi Kelembagaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.8.6',
                'index'            => 'Koordinasi Penguatan Reformasi dan Birokrasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.8.6.1',
                'index'            => 'Budaya Kerja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.8.6.2',
                'index'            => 'Penilaian Mandiri Reformasi Birokrasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.8.6.3',
                'index'            => 'Akuntabilitas Kinerja Instansi Pemerintah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.9',
                'index'            => 'PENELITIAN, PENGKAJIAN, DAN PENGEMBANGAN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.9.1',
                'index'            => 'Kebijakan di Bidang Penelitian, Pengkajian dan Pengembangan yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.9.2',
                'index'            => 'Penelitian, Pengkajian dan Pengembangan, antara lain: Rencana Kerja, Administrasi Penelitian, Pelaksanaan, Hasil Penelitian, Hasil Pengkajian dan Pengembangan, Rekomendasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.9.3',
                'index'            => 'Sosialisasi dan Diseminasi Hasil Penelitian, Hasil Pengkajian dan Pengembangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.9.4',
                'index'            => 'Bimbingan Teknis Penelitian, Pengkajian, dan Pengembangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.9.5',
                'index'            => 'Forum Komunikasi Penelitian, Pengembangan serta Penerapan Ilmu Pengetahuan dan Teknologi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '000.9.6',
                'index'            => 'Data dan Informasi Hasil Penelitian, Pengembangan dan Penerapan Ilmu Pengetahuan dan Teknologi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '000.9.6.1',
                'index'            => 'Data',
                'retensi_aktif'    => '5 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.9.6.2',
                'index'            => 'Statistik',
                'retensi_aktif'    => '5 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.9.6.3',
                'index'            => 'Jurnal Hasil Penelitian/Pengkajian',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.9.7',
                'index'            => 'Master Prosiding/Jurnal Penelitian, Pengembangan dan Penerapan Ilmu Pengetahuan dan Teknologi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.9.8',
                'index'            => 'Hak Kekayaan Intelektual (HKI)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.9.9',
                'index'            => 'Evaluasi Pelaksanaan Kebijakan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '000.9.10',
                'index'            => 'Seminar, Lokakarya, Temu Karya, Workshop',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '100.1',
                'index'            => 'OTONOMI DAERAH',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '100.1.1',
                'index'            => 'Kebijakan di Bidang Otonomi Daerah yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.1.2',
                'index'            => 'Penyelenggaraan Pemerintah Daerah (Fasilitasi, Bimbingan, Pengawasan, Monitoring, dan Evaluasi)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '100.1.3',
                'index'            => 'Penataan Daerah, Pembinaan Daerah Pemekaran, Otonomi Khusus dan Dewan Pertimbangan Otonomi Daerah (Fasilitasi, Monitoring, dan Evaluasi)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.1.4',
                'index'            => 'Pemilihan Kepala Daerah, DPRD, dan Hubungan Antarlembaga (Fasilitasi, Monitoring, dan Evaluasi)',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '100.1.4.1',
                'index'            => 'Penyelenggaraan Pemilihan Umum Kepala Daerah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.1.4.2',
                'index'            => 'Administrasi Kepala Daerah dan DPRD',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.1.4.3',
                'index'            => 'Penyiapan Perumusan Kebijakan Pemberdayaan Kapasitas Kepala Daerah dan DPRD di Bidang Pemerintahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.1.4.4',
                'index'            => 'Hubungan Antarlembaga Daerah (Pemerintah Daerah dan DPRD)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '100.1.4.5',
                'index'            => 'Asosiasi Daerah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '100.1.5',
                'index'            => 'Otonomi Khusus dan Daerah Istimewa',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.1.6',
                'index'            => 'Peningkatan Kapasitas dan Evaluasi Kinerja Daerah (Fasilitasi, Monitoring, dan Evaluasi)',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '100.1.6.1',
                'index'            => 'Kinerja Penyelenggaraan Pemerintahan Daerah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.1.6.2',
                'index'            => 'Kemampuan Penyelenggaraan Otonomi Daerah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '100.1.6.3',
                'index'            => 'Pengembangan Kapasitas Daerah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '100.1.7',
                'index'            => 'Laporan Keterangan Pertanggungjawaban (LKPJ)/Laporan Keterangan Pertanggungjawaban Akhir Masa Jabatan (LKPJAMJ) dan Laporan Penyelenggaraan Pemerintahan Daerah (LPPD): (Fasilitasi, Monitoring dan Evaluasi)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.2',
                'index'            => 'PEMERINTAHAN UMUM',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '100.2.1',
                'index'            => 'Kebijakan di Bidang Pemerintahan Umum yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Keputusan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.2.2',
                'index'            => 'Dekonsentrasi dan Kerja Sama',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '100.2.2.1',
                'index'            => 'Fasilitasi, Koordinasi, Pembinaan dan Pengawasan, serta Monitoring dan Evaluasi Dekonsentrasi dan Tugas Pembantuan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '100.2.2.2',
                'index'            => 'Fasilitasi, Koordinasi, Pembinaan dan Pengawasan, serta Monitoring dan Evaluasi Tugas Gubernur Sebagai Wakil Pemerintah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '100.2.2.3',
                'index'            => 'Fasilitasi, Koordinasi, Pembinaan dan Pengawasan, serta Monitoring dan Evaluasi Kerja Sama Daerah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '100.2.2.4',
                'index'            => 'Fasilitasi Kecamatan (Database Pembentukan Kecamatan, Koordinasi, Pembinaan dan Pengawasan, Monitoring dan Evaluasi Kinerja)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.2.2.5',
                'index'            => 'Fasilitasi Pelayanan Umum (Fasilitas Pelayanan Administrasi Kecamatan, Koordinasi Pelayanan Administrasi Kecamatan, Pembinaan dan Pengawasan Pelayanan Administrasi Kecamatan serta Monitoring dan Evaluasi)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.2.3',
                'index'            => 'Wilayah Administrasi dan Perbatasan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '100.2.3.1',
                'index'            => 'Toponimi dan Data Wilayah',
                'retensi_aktif'    => '5 Tahun',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.2.3.2',
                'index'            => 'Pengembangan dan Penataan Batas Antarnegara',
                'retensi_aktif'    => '5 Tahun',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.2.3.3',
                'index'            => 'Batas Antardaerah Wilayah',
                'retensi_aktif'    => '5 Tahun',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.2.3.4',
                'index'            => 'Penataan Batas Wilayah Antarkecamatan, Batas Wilayah Antarkelurahan Satu Kecamatan dan Batas Wilayah Kelurahan Antarkecamatan',
                'retensi_aktif'    => '5 Tahun',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.2.3.5',
                'index'            => 'Pemeliharaan Batas Wilayah',
                'retensi_aktif'    => '5 Tahun',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.3',
                'index'            => 'HUKUM',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '100.3.1',
                'index'            => 'Program Legislasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '100.3.1.1',
                'index'            => 'Bahan/Materi Program Legislasi Daerah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.3.1.2',
                'index'            => 'Program Legislasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.3.2',
                'index'            => 'Rancangan Peraturan Perundang-undangan, antara lain Rancangan Peraturan Daerah, Termasuk Naskah Akademik, Rancangan Awal sampai dengan Rancangan Akhir dan Telaah Hukum sampai Diundangkan',
                'retensi_aktif'    => '2 Tahun Setelah Diundangkan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.3.3',
                'index'            => 'Keputusan/Ketetapan Pimpinan Pemerintah',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '100.3.3.1',
                'index'            => 'Keputusan/Ketetapan Gubernur',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.3.3.2',
                'index'            => 'Keputusan/Ketetapan Bupati',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.3.3.3',
                'index'            => 'Keputusan/Ketetapan Walikota',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.3.3.4',
                'index'            => 'Keputusan Sekretaris Daerah Provinsi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '100.3.3.5',
                'index'            => 'Keputusan Sekretaris Daerah Kabupaten',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '100.3.3.6',
                'index'            => 'Keputusan Sekretaris Daerah Kota',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '100.3.4',
                'index'            => 'Instruksi/Surat Edaran',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '100.3.4.1',
                'index'            => 'Instruksi/Surat Edaran Provinsi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.3.4.2',
                'index'            => 'Instruksi/Surat Edaran Kabupaten',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.3.4.3',
                'index'            => 'Instruksi/Surat Edaran Kota',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.3.4.4',
                'index'            => 'Instruksi/Surat Edaran Setingkat Eselon II',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.3.5',
                'index'            => 'Surat Perintah',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '100.3.5.1',
                'index'            => 'Surat Perintah Gubernur',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '100.3.5.2',
                'index'            => 'Surat Perintah Bupati',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '100.3.5.3',
                'index'            => 'Surat Perintah Wali Kota',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '100.3.5.4',
                'index'            => 'Surat Perintah Setingkat Eselon II',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '100.3.6',
                'index'            => 'Standar/Pedoman/Prosedur Kerja/Petunjuk Pelaksanaan/Petunjuk Teknis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.3.7',
                'index'            => 'Nota Kesepakatan/Memorandum of Understanding (MoU)/Kontrak/Perjanjian Kerja Sama',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '100.3.7.1',
                'index'            => 'Dalam Negeri',
                'retensi_aktif'    => '2 Tahun Setelah Kerja Sama Berakhir dan Kewajiban Para Pihak telah Dilaksanakan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.3.7.2',
                'index'            => 'Luar Negeri',
                'retensi_aktif'    => '2 Tahun Setelah Kerja Sama Berakhir dan Kewajiban Para Pihak telah Dilaksanakan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.3.8',
                'index'            => 'Dokumentasi Hukum, antara lain: Undang-Undang, Peraturan Pemerintah, Keputusan Presiden dan Peraturan-peraturan yang Dijadikan Referensi',
                'retensi_aktif'    => '1 Tahun Setelah Dinyatakan Tidak Berlaku',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.3.9',
                'index'            => 'Sosialisasi/Penyuluhan/Pembinaan Hukum',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '100.3.10',
                'index'            => 'Bantuan/Konsultasi Hukum/Advokasi Pemberian Bantuan Hukum/Konsultasi Hukum (Pidana, Perdata, Tata Usaha Negara dan Agama)',
                'retensi_aktif'    => '2 Tahun Setelah Diperoleh Keputusan Berkekuatan Hukum Tetap',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '100.3.11',
                'index'            => 'Kasus/Sengketa Hukum',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '100.3.11.1',
                'index'            => 'Pidana Kasus/Sengketa Pidana, baik Kejahatan maupun Pelanggaran',
                'retensi_aktif'    => '2 Tahun Setelah Keputusan Berkekuatan Hukum Tetap dan Dipenuhi Hak dan Kewajiban',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '100.3.11.2',
                'index'            => 'Perdata Kasus/Sengketa Perdata',
                'retensi_aktif'    => '2 Tahun Setelah Keputusan Berkekuatan Hukum Tetap dan Dipenuhi Hak dan Kewajiban',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '100.3.11.3',
                'index'            => 'Tata Usaha Negara',
                'retensi_aktif'    => '2 Tahun Setelah Keputusan Berkekuatan Hukum Tetap dan Dipenuhi Hak dan Kewajiban',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '100.3.11.4',
                'index'            => 'Perburuhan',
                'retensi_aktif'    => '2 Tahun Setelah Keputusan Berkekuatan Hukum Tetap dan Dipenuhi Hak dan Kewajiban',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '100.3.11.5',
                'index'            => 'Arbitrase',
                'retensi_aktif'    => '2 Tahun Setelah Keputusan Berkekuatan Hukum Tetap dan Dipenuhi Hak dan Kewajiban',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '100.3.11.6',
                'index'            => 'Sengketa Adat',
                'retensi_aktif'    => '2 Tahun Setelah Keputusan Berkekuatan Hukum Tetap dan Dipenuhi Hak dan Kewajiban',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.3.12',
                'index'            => 'Perizinan',
                'retensi_aktif'    => '2 Tahun Setelah Izin Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.3.13',
                'index'            => 'Hak atas Kekayaan Intelektual (HKI)',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '100.3.13.1',
                'index'            => 'Hak Cipta',
                'retensi_aktif'    => '2 Tahun Setelah HKI Habis',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.3.13.2',
                'index'            => 'Hak Paten',
                'retensi_aktif'    => '2 Tahun Setelah HKI Habis',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.3.13.3',
                'index'            => 'Hak Desain Industri',
                'retensi_aktif'    => '2 Tahun Setelah HKI Habis',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.3.13.4',
                'index'            => 'Hak Rahasia Dagang',
                'retensi_aktif'    => '2 Tahun Setelah HKI Habis',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.3.13.5',
                'index'            => 'Hak Merek',
                'retensi_aktif'    => '2 Tahun Setelah HKI Habis',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '100.3.14',
                'index'            => 'Permohonan HKI yang Ditolak',
                'retensi_aktif'    => '1 Tahun Setelah Permohonan Ditolak',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.1',
                'index'            => 'KESATUAN BANGSA DAN POLITIK',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '200.1.1',
                'index'            => 'Kebijakan di Bidang Kesatuan Bangsa dan Politik yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.1.2',
                'index'            => 'Bina Ideologi dan Wawasan Kebangsaan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '200.1.2.1',
                'index'            => 'Ketahanan Ideologi Negara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.1.2.2',
                'index'            => 'Wawasan Kebangsaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.1.2.3',
                'index'            => 'Bela Negara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.1.2.4',
                'index'            => 'Nilai-nilai Sejarah Kebangsaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.1.2.5',
                'index'            => 'Pembauran dan Kewarganegaraan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.1.3',
                'index'            => 'Kewaspadaan Nasional',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '200.1.3.1',
                'index'            => 'Fasilitasi dan Evaluasi Kewaspadaan Dini dan Kerja Sama Intelijen Keamanan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.1.3.2',
                'index'            => 'Fasilitasi Bina Masyarakat Perbatasan Antarnegara dan Kehidupan Masyarakat Perbatasan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.1.3.3',
                'index'            => 'Fasilitasi dan Evaluasi Penanganan Konflik Pemerintahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.1.3.4',
                'index'            => 'Fasilitasi dan Laporan Penanganan Konflik Sosial',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.1.3.5',
                'index'            => 'Fasilitasi Pengawasan Orang Asing dan Lembaga Asing',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.1.4',
                'index'            => 'Ketahanan Seni, Budaya, Adat, Agama, dan Kemasyarakatan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '200.1.4.1',
                'index'            => 'Ketahanan Seni',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.1.4.2',
                'index'            => 'Ketahanan Budaya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.1.4.3',
                'index'            => 'Agama dan Kepercayaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.1.4.4',
                'index'            => 'Organisasi Kemasyarakatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.1.4.5',
                'index'            => 'Masalah Sosial Kemasyarakatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.1.4.6',
                'index'            => 'Fasilitasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.1.4.7',
                'index'            => 'Pelaksanaan Identifikasi dan Kompilasi Organisasi Masyarakat (Ormas)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.1.4.8',
                'index'            => 'Laporan Hasil Kerja Sama Kegiatan dengan Ormas/Lembaga Nirlaba (LNL)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.1.4.9',
                'index'            => 'Evaluasi Aktivitas Ormas: Sanksi Administrasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.1.4.10',
                'index'            => 'Fasilitasi Sengketa Ormas',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.1.4.11',
                'index'            => 'Fasilitasi Ormas',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.1.5',
                'index'            => 'Politik Dalam Negeri',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '200.1.5.1',
                'index'            => 'Implementasi Kebijakan Politik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.1.5.2',
                'index'            => 'Fasilitasi Kelembagaan Politik Pemerintahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.1.5.3',
                'index'            => 'Fasilitasi Kelembagaan Partai Politik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.1.5.4',
                'index'            => 'Verifikasi dan Evaluasi Partai Politik yang Memperoleh Kursi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.1.5.5',
                'index'            => 'Partai Politik yang Tidak Memperoleh Kursi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.1.5.6',
                'index'            => 'Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.1.5.7',
                'index'            => 'Database Partai Politik (Parpol)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.1.5.8',
                'index'            => 'Pendidikan Budaya Politik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.1.5.9',
                'index'            => 'Pemilihan Umum',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.1.6',
                'index'            => 'Ketahanan Ekonomi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '200.1.6.1',
                'index'            => 'Ketahanan Sumber Daya Alam dan Kesenjangan Perekonomian',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.1.6.2',
                'index'            => 'Ketahanan Perdagangan Investasi, Fiskal, dan Moneter',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.1.6.3',
                'index'            => 'Perilaku Perekonomian Masyarakat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.1.6.4',
                'index'            => 'Ketahanan Lembaga Sosial Ekonomi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.2',
                'index'            => 'PEMILIHAN UMUM (PEMILU)',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '200.2.1',
                'index'            => 'Kebijakan di Bidang Pemilu yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Setelah Tidak Berlaku',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.2.2',
                'index'            => 'Pemutakhiran dan Penyusunan Daftar Pemilih',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '200.2.2.1',
                'index'            => 'Daftar Penduduk Potensial Pemilih (DP4) Pemilu',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.2.2.2',
                'index'            => 'Daftar Pemilih Sementara (DPS)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.2.2.3',
                'index'            => 'Daftar Pemilih Tambahan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.2.2.4',
                'index'            => 'Keputusan KPU tentang Daftar Pemilih Tetap (DPT)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.2.2.5',
                'index'            => 'Rekapitulasi Daftar Pemilih Tetap (DPT)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.2.3',
                'index'            => 'Pendaftaran dan Verifikasi Peserta Pemilu',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '200.2.3.1',
                'index'            => 'Dokumen Pendaftaran Peserta Pemilu dari Partai Politik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.2.3.2',
                'index'            => 'Dokumen Hasil Verifikasi Administrasi dan Faktual Partai Politik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.2.3.3',
                'index'            => 'Dokumen Pendaftaran Peserta Pemilu dari Calon Perseorangan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.2.3.4',
                'index'            => 'Dokumen Hasil Verifikasi Administrasi dan Faktual',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.2.4',
                'index'            => 'Penetapan Peserta Pemilu',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '200.2.4.1',
                'index'            => 'Penetapan Daerah Pemilihan dan Jumlah Kursi Anggota',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.2.4.2',
                'index'            => 'Keputusan KPU tentang Penetapan Daerah Pemilihan dan Jumlah Kursi Anggota DPR',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.2.4.3',
                'index'            => 'Keputusan KPU tentang Penetapan Daerah Pemilihan dan Jumlah Kursi Anggota DPR',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.2.4.4',
                'index'            => 'Keputusan KPU tentang Penetapan Daerah Pemilihan dan Jumlah Kursi Anggota DPRD Kabupaten/Kota',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.2.4.5',
                'index'            => 'Peta Daerah Pemilihan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.2.5',
                'index'            => 'Pencalonan Pemilu',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '200.2.5.1',
                'index'            => 'Petunjuk Teknis Pencalonan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.2.5.2',
                'index'            => 'Surat Pencalonan Pendaftaran',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.2.5.3',
                'index'            => 'Daftar Bakal Calon',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.2.5.4',
                'index'            => 'Dokumen Persyaratan Masing-Masing Bakal Calon',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.2.5.5',
                'index'            => 'Dokumen Verifikasi Administrasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.2.5.6',
                'index'            => 'Daftar Calon Sementara dan Calon Tetap',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.2.6',
                'index'            => 'Kampanye Pemilu',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '200.2.6.1',
                'index'            => 'Keputusan KPU tentang Penetapan Jadwal Kampanye',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.2.6.2',
                'index'            => 'Nama Juru Kampanye/Pelaksana Kampanye',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.2.6.3',
                'index'            => 'Peringatan Tertulis/Penghentian Kegiatan Kampanye',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.2.7',
                'index'            => 'Dana Kampanye',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '200.2.7.1',
                'index'            => 'Pedoman Audit Dana Kampanye',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.2.7.2',
                'index'            => 'Laporan Dana Kampanye Peserta Pemilu',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.2.7.3',
                'index'            => 'Laporan Hasil Audit Dana Kampanye',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.2.8',
                'index'            => 'Pemungutan dan Penghitungan Suara',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '200.2.8.1',
                'index'            => 'Keputusan KPU tentang Desain dan Spesifikasi Surat Suara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.2.8.2',
                'index'            => 'Master Surat Suara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.2.8.3',
                'index'            => 'Surat Suara yang Terpakai',
                'retensi_aktif'    => '1 Tahun Setelah Dinyatakan Tidak Ada Gugatan Hukum',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.2.8.4',
                'index'            => 'Surat Suara Tidak Terpakai (Rusak, Salah, dan Tidak Digunakan)',
                'retensi_aktif'    => '1 Tahun Setelah Dinyatakan Tidak Ada Gugatan Hukum',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.2.8.5',
                'index'            => 'Formulir Pemilu di Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.2.9',
                'index'            => 'Penetapan Hasil Pemilu',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.2.10',
                'index'            => 'Perselisihan Hasil Pemilu',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '200.2.10.1',
                'index'            => 'Surat-surat Mengenai Perselisihan Hasil Pemilu',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.2.10.2',
                'index'            => 'Jawaban dan Kesimpulan Termohon',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '200.2.10.3',
                'index'            => 'Salinan Putusan Lembaga Peradilan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '200.2.11',
                'index'            => 'Laporan Hasil Penyelenggaraan Pemilu',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '300.1',
                'index'            => 'SATUAN POLISI PAMONG PRAJA',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '300.1.1',
                'index'            => 'Kebijakan di Bidang Polisi Pamong Praja yang Dilakukan di Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '300.1.2',
                'index'            => 'Tata Operasional serta Prasarana dan Sarana Polisi Pamong Praja',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '300.1.2.1',
                'index'            => 'Tata Operasional Polisi Pamong Praja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '300.1.2.2',
                'index'            => 'Prasarana dan Sarana Polisi Pamong Praja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '300.1.3',
                'index'            => 'Peningkatan Kapasitas SDM Polisi Pamong Praja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '300.1.4',
                'index'            => 'Pelindungan Masyarakat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '300.1.5',
                'index'            => 'Penyidik Pegawai Negeri Sipil',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '300.1.6',
                'index'            => 'Pelindungan Hak-hak Sipil dan Hak Asasi Manusia',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '300.2',
                'index'            => 'PENANGGULANGAN BENCANA, PENCARIAN, DAN PERTOLONGAN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '300.2.1',
                'index'            => 'Kebijakan di Bidang Penanggulangan Bencana yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '300.2.2',
                'index'            => 'Perencanaan Penanggulangan Bencana, Pencarian, dan Pertolongan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '300.2.2.1',
                'index'            => 'Rencana dan Standardisasi serta Pengawakan dan Perbekalan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '300.2.2.2',
                'index'            => 'Kurikulum dan Silabus, Monitoring dan Evaluasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '300.2.2.3',
                'index'            => 'Tenaga Pencarian Pertolongan, Penyiapan Potensi Pencarian dan Pertolongan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '300.2.2.4',
                'index'            => 'Permasyarakatan Pencarian dan Pertolongan, Sertifikasi Pencarian dan Pertolongan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '300.2.2.5',
                'index'            => 'Perencanaan dan Standardisasi, Penyelenggaraan Operasi SAR, Siaga dan Latihan, Tempat Latihan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah (Kecuali Laporan)'
            ],
            [
                'kode_klasifikasi' => '300.2.2.6',
                'index'            => 'Registrasi Beacon (Alat Komunikasi Deteksi Dini)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '300.2.3',
                'index'            => 'Pencegahan dan Kesiapsiagaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '300.2.4',
                'index'            => 'Potensi Pencarian dan Pertolongan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '300.2.5',
                'index'            => 'Bina Ketenagaan dan Pemasyarakatan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '300.2.5.1',
                'index'            => 'Rencana Pendidikan dan Pelatihan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '300.2.5.2',
                'index'            => 'Penyiapan Tenaga dan Potensi Pencarian dan Pertolongan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '300.2.5.3',
                'index'            => 'Pemasyarakatan dan Sertifikasi Pencarian dan Pertolongan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '300.2.5.4',
                'index'            => 'Pemasyarakatan Pencarian dan Pertolongan (Sosialisasi dan Penyuluhan)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '300.2.5.5',
                'index'            => 'Sertifikasi Pencarian dan Pertolongan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '300.2.6',
                'index'            => 'Operasi Pencarian dan Pertolongan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '300.2.7',
                'index'            => 'Rencana Pengembangan dan Standardisasi Komunikasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '300.2.8',
                'index'            => 'Operasi Komunikasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '300.2.8.1',
                'index'            => 'Operasi Peralatan Komunikasi (Berita SAR)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '300.2.8.2',
                'index'            => 'Operasi Peralatan Deteksi Dini (Berita SAR)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '300.2.8.3',
                'index'            => 'Registrasi Beacon (Alat Komunikasi Deteksi Dini)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '300.2.9',
                'index'            => 'Inventarisasi dan Pemeliharaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '300.2.10',
                'index'            => 'Pengembangan Sistem Informasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '300.2.11',
                'index'            => 'Penyajian dan Layanan Informasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '300.2.12',
                'index'            => 'Pelaporan dan Evaluasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '300.2.12.1',
                'index'            => 'Laporan Harian',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '300.2.12.2',
                'index'            => 'Laporan Bulanan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '300.2.12.3',
                'index'            => 'Laporan Tahunan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '300.2.12.4',
                'index'            => 'Evaluasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1',
                'index'            => 'PEMBANGUNAN DAERAH TERTINGGAL',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.1.1',
                'index'            => 'Kebijakan di Bidang Pembangunan Daerah Tertinggal yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.1.2',
                'index'            => 'Pembangunan Sumber Daya',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.1.2.1',
                'index'            => 'Fasilitasi Pendidikan Keterampilan Pengembangan Sumber Daya',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.2.2',
                'index'            => 'Fasilitasi Kesehatan Pengembangan Sumber Daya',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.2.3',
                'index'            => 'Fasilitasi Sumber Daya Hayati dan Pengembangan Sumber Daya',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.2.4',
                'index'            => 'Fasilitasi Mineral, Energi, dan Lingkungan Hidup',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.2.5',
                'index'            => 'Fasilitasi Teknologi dan Inovasi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.2.6',
                'index'            => 'Koordinasi Pelaksanaan Kebijakan Pengembangan Sumber Daya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.2.7',
                'index'            => 'Pemantauan dan Evaluasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.1.3',
                'index'            => 'Peningkatan Infrastruktur',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.1.3.1',
                'index'            => 'Fasilitasi Transportasi Peningkatan Infrastruktur',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.3.2',
                'index'            => 'Fasilitasi Informasi dan Telekomunikasi dalam Peningkatan Infrastruktur',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.3.3',
                'index'            => 'Fasilitasi Sosial dalam Peningkatan Infrastruktur',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.3.4',
                'index'            => 'Fasilitasi Ekonomi dalam Peningkatan Infrastruktur',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.3.5',
                'index'            => 'Fasilitasi Energi dalam Peningkatan Infrastruktur',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.3.6',
                'index'            => 'Koordinasi Pelaksanaan Kebijakan Peningkatan Infrastruktur',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.3.7',
                'index'            => 'Pemantauan dan Evaluasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.1.4',
                'index'            => 'Pembinaan Ekonomi dan Dunia Usaha',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.1.4.1',
                'index'            => 'Fasilitasi Investasi Pembinaan Ekonomi dan Dunia Usaha',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.4.2',
                'index'            => 'Fasilitasi Kelembagaan Ekonomi dan Dunia Usaha',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.4.3',
                'index'            => 'Fasilitasi Usaha Mikro, Kecil, dan Menengah',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.4.4',
                'index'            => 'Fasilitasi Kemitraan Usaha',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.4.5',
                'index'            => 'Fasilitasi Pengembangan Komoditas Unggulan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.4.6',
                'index'            => 'Koordinasi Pelaksanaan Kebijakan Pembinaan Ekonomi dan Dunia Usaha',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.4.7',
                'index'            => 'Pemantauan dan Evaluasi (Pembinaan Ekonomi dan Dunia Usaha)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.1.4.8',
                'index'            => 'Identifikasi dan Inventarisasi Pengembangan Usaha Ekonomi Perdesaan Tertinggal',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '2 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.4.9',
                'index'            => 'Fasilitasi Pengembangan Usaha Ekonomi Perdesaan Tertinggal',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '2 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.4.10',
                'index'            => 'Monitoring dan Evaluasi Ekonomi Desa Tertinggal',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.4.11',
                'index'            => 'Identifikasi dan Inventarisasi Pengembangan Masyarakat dan Desa Tertinggal',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.4.12',
                'index'            => 'Fasilitasi Pengembangan Masyarakat dan Desa Tertinggal',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.4.13',
                'index'            => 'Monitoring dan Evaluasi Masyarakat Tertinggal',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '2 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.4.14',
                'index'            => 'Fasilitasi Kerja Sama Antardesa',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.5',
                'index'            => 'Pembinaan Lembaga Sosial dan Budaya',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.1.5.1',
                'index'            => 'Penguatan Kapasitas Lembaga Lokal',
                'retensi_aktif'    => '7 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.5.2',
                'index'            => 'Penguatan Organisasi Masyarakat',
                'retensi_aktif'    => '7 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.5.3',
                'index'            => 'Pemberdayaan Masyarakat',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.5.4',
                'index'            => 'Kerja Sama Antarlembaga Sosial dan Budaya',
                'retensi_aktif'    => '7 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.5.5',
                'index'            => 'Ketenagakerjaan',
                'retensi_aktif'    => '7 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.5.6',
                'index'            => 'Koordinasi Pelaksanaan Kebijakan Pembinaan Lembaga Sosial dan Budaya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.5.7',
                'index'            => 'Pemantauan dan Evaluasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.1.6',
                'index'            => 'Pengembangan Daerah Khusus',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.1.6.1',
                'index'            => 'Fasilitasi Pengembangan Daerah Perbatasan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.1.6.2',
                'index'            => 'Fasilitasi Pengembangan Daerah Rawan Konflik dan Bencana',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.1.6.3',
                'index'            => 'Fasilitasi Pengembangan Daerah Perdesaan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '2 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.1.6.4',
                'index'            => 'Fasilitasi Pengembangan Daerah Pulau Terpencil dan Terluar',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.1.6.5',
                'index'            => 'Fasilitasi Pengembangan Wilayah Strategis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.1.6.6',
                'index'            => 'Koordinasi Pelaksanaan Kebijakan Pengembangan Daerah Khusus',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.1.6.7',
                'index'            => 'Pemantauan dan Evaluasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],

            // Data 400.2 - PEMBERDAYAAN PEREMPUAN DAN PELINDUNGAN ANAK
            [
                'kode_klasifikasi' => '400.2',
                'index'            => 'PEMBERDAYAAN PEREMPUAN DAN PELINDUNGAN ANAK',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.2.1',
                'index'            => 'Kebijakan di Bidang Pemberdayaan Perempuan dan Pelindungan Anak yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.2.2',
                'index'            => 'Pengarusutamaan Gender Ekonomi, Politik, Sosial, dan Hukum',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.2.2.1',
                'index'            => 'Data Gender',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.2.2.2',
                'index'            => 'Advokasi dan Fasilitasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.2.3',
                'index'            => 'Pelindungan Perempuan (Kekerasan, Masalah Sosial, Tenaga Kerja, Korban Perdagangan)',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.2.3.1',
                'index'            => 'Pencegahan Kekerasan terhadap Perempuan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.2.3.2',
                'index'            => 'Data Pelindungan Perempuan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.2.3.3',
                'index'            => 'Advokasi dan Fasilitasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.2.3.4',
                'index'            => 'Monitoring, Evaluasi, dan Analisis Kebijakan Pelindungan Perempuan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.2.3.5',
                'index'            => 'Sistem Aplikasi dan Jaringan Informasi Gender',
                'retensi_aktif'    => '1 Tahun Setelah Sistem Aplikasi Ditingkatkan/Dikembangkan (Upgrade)',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.2.3.6',
                'index'            => 'Analisis dan Penyajian Informasi Gender',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.2.3.7',
                'index'            => 'Partisipasi Publik untuk Kesejahteraan Ibu',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.2.4',
                'index'            => 'Pelindungan Anak (Hak Sipil, Masalah Sosial, Kekerasan Terhadap Anak, Anak Berkebutuhan Khusus, Anak Berhadapan dengan Hukum)',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.2.4.1',
                'index'            => 'Pencegahan Kekerasan terhadap Anak',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.2.4.2',
                'index'            => 'Data Pelindungan Anak',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.2.4.3',
                'index'            => 'Advokasi dan Fasilitasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.2.4.4',
                'index'            => 'Monitoring, Evaluasi, dan Analisis Kebijakan Pelindungan Anak',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.2.4.5',
                'index'            => 'Partisipasi Publik untuk Kesejahteraan Anak',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.2.5',
                'index'            => 'Tumbuh Kembang Anak (Pendidikan, Kesehatan, Partisipasi, Lingkungan dan Penanaman Nilai-nilai Luhur, Pengembangan Kota Layak Anak)',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.2.5.1',
                'index'            => 'Pemenuhan Hak Anak',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.2.5.2',
                'index'            => 'Data Klaster Hak Anak',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.2.5.3',
                'index'            => 'Data Tumbuh Kembang Anak',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.2.5.4',
                'index'            => 'Advokasi dan Fasilitasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.2.5.5',
                'index'            => 'Monitoring, Evaluasi, dan Analisis Kebijakan Tumbuh Kembang Anak',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.2.5.6',
                'index'            => 'Penyelenggaraan Parenting Pola Pengasuhan Anak',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.2.6',
                'index'            => 'Penghargaan terkait Gender (Anugerah Parahita Ekapraya/APE)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.2.7',
                'index'            => 'Penghargaan Kabupaten Layak Anak',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.2.8',
                'index'            => 'Penghargaan Desa Ramah Perempuan Peduli Anak',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],

            // Data 400.3 - PENDIDIKAN
            [
                'kode_klasifikasi' => '400.3',
                'index'            => 'PENDIDIKAN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.3.1',
                'index'            => 'Kebijakan di Bidang Pendidikan yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.3.2',
                'index'            => 'Pendidikan Anak Usia Dini (PAUD) Nonformal, Informal',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.3.2.1',
                'index'            => 'Bahan Ajar (Alat Permainan Edukatif)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.2.2',
                'index'            => 'Pelatihan Sosial',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.2.3',
                'index'            => 'Peringatan Hari Anak',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.2.4',
                'index'            => 'Block Grant',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.3.3',
                'index'            => 'Pendidikan Masyarakat',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.3.3.1',
                'index'            => 'Penyelenggaraan Program',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.3.2',
                'index'            => 'Penilaian dan Pemberian Bantuan Sosial',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.3.3',
                'index'            => 'Pembinaan Program',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.3.4',
                'index'            => 'Lomba/Pemberian Penghargaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.3.5',
                'index'            => 'Pameran',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.3.6',
                'index'            => 'Rapat Koordinasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.3.7',
                'index'            => 'Sosialisasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.3.8',
                'index'            => 'Sertifikasi dan Akreditasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.4',
                'index'            => 'Kursus/Pelatihan Pendidik dan Tenaga Pendidik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.5',
                'index'            => 'Pendidikan Dasar dan Menengah Pertama',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.3.5.1',
                'index'            => 'Kurikulum, Bahan Ajar',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.5.2',
                'index'            => 'Block Grant',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.3.5.3',
                'index'            => 'Pelatihan, Bimbingan Teknis, Sosialisasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.5.4',
                'index'            => 'Lomba, Penghargaan, Penganugerahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.5.5',
                'index'            => 'Bantuan Operasional Sekolah (BOS)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.3.5.6',
                'index'            => 'Bantuan Siswa Miskin',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.3.6',
                'index'            => 'Pendidikan Khusus/Layanan Khusus',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.3.6.1',
                'index'            => 'Kurikulum, Bahan Ajar, Alat Bantu Pembelajaran',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.6.2',
                'index'            => 'Block Grant',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.3.6.3',
                'index'            => 'Lomba, Festival',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.6.4',
                'index'            => 'Sosialisasi, Bimbingan Teknis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.6.5',
                'index'            => 'Pendataan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.6.6',
                'index'            => 'Kelembagaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.7',
                'index'            => 'Pembinaan Pendidik dan Tenaga Pendidik',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.3.7.1',
                'index'            => 'Pendataan dan Pemetaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.7.2',
                'index'            => 'Uji Kompetensi Guru',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.7.3',
                'index'            => 'Sertifikasi Guru',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.3.7.4',
                'index'            => 'Penghargaan Guru dan Tenaga Kependidikan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.3.7.5',
                'index'            => 'Peningkatan Kesejahteraan Guru',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.7.6',
                'index'            => 'Sosialisasi, Bimbingan Teknis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.7.7',
                'index'            => 'Block Grant',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.3.8',
                'index'            => 'Sekolah Menengah Atas',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.3.8.1',
                'index'            => 'Kurikulum',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.8.2',
                'index'            => 'Bahan Ajar',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.8.3',
                'index'            => 'Pelatihan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.8.4',
                'index'            => 'Block Grant',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.3.8.5',
                'index'            => 'Bimbingan Teknis/Sosialisasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.8.6',
                'index'            => 'Lomba, Sayembara, Festival',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.8.7',
                'index'            => 'Bantuan Operasional Sekolah (BOS)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.3.8.8',
                'index'            => 'Bantuan Siswa Miskin',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.3.9',
                'index'            => 'Pendidikan Khusus-Layanan Khusus',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.3.9.1',
                'index'            => 'Bahan Ajar',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.9.2',
                'index'            => 'Petunjuk Teknis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.9.3',
                'index'            => 'Block Grant',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.3.9.4',
                'index'            => 'Sosialisasi, Bimbingan Teknis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.9.5',
                'index'            => 'Lomba, Sayembara, Jambore, Festival',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.9.6',
                'index'            => 'Kurikulum/Bahan Pembelajaran',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.9.7',
                'index'            => 'Alat Bantu Pembelajaran',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.9.8',
                'index'            => 'Pendataan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.9.9',
                'index'            => 'Kelembagaan (Unit Kesehatan Sekolah, Pendidikan Jasmani Adaptif, Pendidikan Inklusi)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.10',
                'index'            => 'Pendidik dan Tenaga Pendidik',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.3.10.1',
                'index'            => 'Pendataan dan Pemetaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.10.2',
                'index'            => 'Uji Kompetensi Guru',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.10.3',
                'index'            => 'Sertifikasi Guru',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.10.4',
                'index'            => 'Penilaian Prestasi Kerja Guru dan Pengawas Sekolah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.10.5',
                'index'            => 'Penghargaan Guru dan Tenaga Kependidikan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.3.10.6',
                'index'            => 'Peningkatan Kesejahteraan Guru dan Tenaga Pendidik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.10.7',
                'index'            => 'Block Grant',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.3.10.8',
                'index'            => 'Bimbingan Teknis/Sosialisasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.3.11',
                'index'            => 'Penilaian Pendidikan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.3.11.1',
                'index'            => 'Penilaian Akademik',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.3.11.2',
                'index'            => 'Penilaian Nonakademik',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.3.11.3',
                'index'            => 'Analisis dan Sistem Informasi Penilaian',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.3.12',
                'index'            => 'Data dan Statistik Pendidikan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.3.12.1',
                'index'            => 'Data Peserta Didik, Pendidik, dan Tenaga Kependidikan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.3.12.2',
                'index'            => 'Data Satuan Pendidikan dan Proses Pembelajaran',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.3.13',
                'index'            => 'Prasarana dan Sarana Pendidikan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.3.13.1',
                'index'            => 'Prasarana Pendidikan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.3.13.2',
                'index'            => 'Sarana Pendidikan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.3.13.3',
                'index'            => 'Monitoring dan Evaluasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            
            // Data 400.4 - KEOLAHRAGAAN
            [
                'kode_klasifikasi' => '400.4',
                'index'            => 'KEOLAHRAGAAN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.4.1',
                'index'            => 'Kebijakan di Bidang Keolahragaan yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.4.2',
                'index'            => 'Pengelolaan Olahraga Pendidikan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.4.2.1',
                'index'            => 'Olahraga Pendidikan Dasar dan Menengah',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.4.2.2',
                'index'            => 'Olahraga Pendidikan Tinggi',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.4.2.3',
                'index'            => 'Olahraga Pendidikan Nonformal dan Informal',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.4.3',
                'index'            => 'Pengelolaan Olahraga Rekreasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.4.3.1',
                'index'            => 'Olahraga Massal',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.4.3.2',
                'index'            => 'Olahraga Tradisional',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.4.3.3',
                'index'            => 'Olahraga Petualangan, Tantangan, dan Wisata',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.4.4',
                'index'            => 'Pengelolaan Pembinaan Sentra dan Sekolah Khusus Olahraga',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.4.4.1',
                'index'            => 'Olahraga Pendidikan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.4.4.2',
                'index'            => 'Olahraga Rekreasi',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.4.4.3',
                'index'            => 'Olahraga Prestasi',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.4.4.4',
                'index'            => 'Sekolah Khusus Olahraga',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.4.5',
                'index'            => 'Pengembangan Olahraga Tradisional dan Layanan Khusus',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.4.5.1',
                'index'            => 'Olahraga Tradisional',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.4.5.2',
                'index'            => 'Layanan Khusus',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.4.6',
                'index'            => 'Kemitraan dan Penghargaan Olahraga',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.4.6.1',
                'index'            => 'Kemitraan Keolahragaan',
                'retensi_aktif'    => '2 Tahun Setelah Perjanjian, Kontrak, Kerja Sama Berakhir, dan Kewajiban Para Pihak Telah Ditunaikan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.4.6.2',
                'index'            => 'Penghargaan Olahraga',
                'retensi_aktif'    => '2 Tahun Setelah Perjanjian, Kontrak, Kerja Sama Berakhir, dan Kewajiban Para Pihak Telah Ditunaikan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.4.7',
                'index'            => 'Pembibitan dan Ilmu Pengetahuan (Iptek) Olahraga',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.4.7.1',
                'index'            => 'Pembibitan Olahraga',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.4.7.2',
                'index'            => 'Kompetisi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.4.7.3',
                'index'            => 'Iptek Olahraga',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.4.8',
                'index'            => 'Peningkatan Tenaga dan Organisasi Keolahragaan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.4.8.1',
                'index'            => 'Tenaga Keolahragaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.4.8.2',
                'index'            => 'Organisasi Keolahragaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.4.9',
                'index'            => 'Industri dan Promosi Olahraga',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.4.9.1',
                'index'            => 'Industri Olahraga',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.4.9.2',
                'index'            => 'Promosi Olahraga',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.4.10',
                'index'            => 'Olahraga Prestasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.4.10.1',
                'index'            => 'Daerah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.4.10.2',
                'index'            => 'Nasional',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.4.10.3',
                'index'            => 'Internasional',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.4.11',
                'index'            => 'Standardisasi dan Infrastruktur Olahraga',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.4.11.1',
                'index'            => 'Standardisasi Keolahragaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.4.11.2',
                'index'            => 'Akreditasi dan Sertifikasi Keolahragaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.4.11.3',
                'index'            => 'Infrastruktur Olahraga',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],

            // Data 400.5 - KEPEMUDAAN
            [
                'kode_klasifikasi' => '400.5',
                'index'            => 'KEPEMUDAAN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.5.1',
                'index'            => 'Kebijakan di Bidang Kepemudaan yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.5.2',
                'index'            => 'Peningkatan Tenaga dan Sumber Daya Pemuda',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.5.2.1',
                'index'            => 'Penelusuran (Duta Kepemudaan)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.5.2.2',
                'index'            => 'Pengkajian (Rekomendasi Kepemudaan melalui Forum Kepemudaan)',
                'retensi_aktif'    => '2 Tahun Setelah Laporan Hasil Penelitian Dipublikasikan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.5.2.3',
                'index'            => 'Pengembangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.5.3',
                'index'            => 'Peningkatan Wawasan Pemuda',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.5.3.1',
                'index'            => 'Wawasan Kebangsaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.5.3.2',
                'index'            => 'Wawasan Lingkungan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.5.3.3',
                'index'            => 'Wawasan Sosial dan Hukum',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.5.4',
                'index'            => 'Peningkatan Kapasitas Pemuda',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.5.4.1',
                'index'            => 'Kapasitas Iman dan Takwa',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.5.4.2',
                'index'            => 'Kapasitas Iptek (Ilmu Pengetahuan dan Teknologi)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.5.4.3',
                'index'            => 'Pemanfaatan Iptek',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.5.5',
                'index'            => 'Peningkatan Kreativitas Pemuda (Pemetaan Kreativitas/Seni Kepemudaan)',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.5.5.1',
                'index'            => 'Pengkajian',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.5.5.2',
                'index'            => 'Pengembangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.5.5.3',
                'index'            => 'Pendayagunaan (Fasilitasi)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.5.6',
                'index'            => 'Kepemimpinan dan Kepeloporan Pemuda',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.5.6.1',
                'index'            => 'Kepemimpinan: Penelusuran, Pengaderan, Pendayagunaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.5.6.2',
                'index'            => 'Kepeloporan Pemuda: Kesukarelawanan, Pengembangan Kepedulian, Pendampingan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.5.7',
                'index'            => 'Kewirausahaan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.5.7.1',
                'index'            => 'Kelembagaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.5.7.2',
                'index'            => 'Pengaderan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.5.7.3',
                'index'            => 'Perintisan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.5.8',
                'index'            => 'Organisasi Kepemudaan dan Pengawasan Kepramukaan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.5.8.1',
                'index'            => 'Pemberdayaan Organisasi Kepemudaan: Kelembagaan dan Sumber Daya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.5.8.2',
                'index'            => 'Pemberdayaan Organisasi Kemahasiswaan: Kelembagaan dan Sumber Daya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.5.8.3',
                'index'            => 'Pemberdayaan Organisasi Kepelajaran: Kelembagaan dan Sumber Daya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.5.8.4',
                'index'            => 'Pengawasan Kepramukaan: Kelembagaan, Program dan Sumber Daya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.5.9',
                'index'            => 'Standardisasi dan Infrastruktur Pemuda',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.5.9.1',
                'index'            => 'Standardisasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.5.9.2',
                'index'            => 'Infrastruktur Pemuda',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.5.10',
                'index'            => 'Kemitraan dan Penghargaan Pemuda',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.5.10.1',
                'index'            => 'Kemitraan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.5.10.2',
                'index'            => 'Penghargaan Pemuda',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],

            // Data 400.6 - KEBUDAYAAN
            [
                'kode_klasifikasi' => '400.6',
                'index'            => 'KEBUDAYAAN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.6.1',
                'index'            => 'Kebijakan di Bidang Kebudayaan yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.6.2',
                'index'            => 'Pelestarian Cagar Budaya dan Permuseuman',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.6.2.1',
                'index'            => 'Registrasi Nasional',
                'retensi_aktif'    => '1 Tahun Setelah Data Diperbarui',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.6.2.2',
                'index'            => 'Pelindungan',
                'retensi_aktif'    => '1 Tahun Setelah Data Diperbarui',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.6.2.3',
                'index'            => 'Pengembangan dan Pemanfaatan',
                'retensi_aktif'    => '1 Tahun Setelah Data Diperbarui',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.6.2.4',
                'index'            => 'Eksplorasi dan Dokumentasi',
                'retensi_aktif'    => '1 Tahun Setelah Data Diperbarui',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.6.3',
                'index'            => 'Pembinaan Kesenian dan Perfilman',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.6.3.1',
                'index'            => 'Pembinaan Seni Pertunjukan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.6.3.2',
                'index'            => 'Pembinaan Seni Rupa',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.6.3.3',
                'index'            => 'Pembinaan Seni Literasi dan Apresiasi Film',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.6.3.4',
                'index'            => 'Dokumentasi dan Publikasi',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.6.4',
                'index'            => 'Sejarah dan Nilai Budaya',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.6.4.1',
                'index'            => 'Sejarah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.6.4.2',
                'index'            => 'Pemetaan Nilai',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.6.4.3',
                'index'            => 'Verifikasi dan Perumusan Nilai',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.6.4.4',
                'index'            => 'Dokumentasi dan Publikasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.6.4.5',
                'index'            => 'Dokumentasi Sejarah dan Nilai Sejarah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.6.4.6',
                'index'            => 'Publikasi Sejarah dan Nilai Sejarah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.6.5',
                'index'            => 'Internalisasi Nilai dan Diplomasi Budaya',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.6.5.1',
                'index'            => 'Internalisasi Nilai Budaya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.6.5.2',
                'index'            => 'Kekayaan Budaya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.6.5.3',
                'index'            => 'Warisan Budaya Nasional dan Dunia',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.6.5.4',
                'index'            => 'Diplomasi Budaya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],

            // Data 400.7 - KESEHATAN
            [
                'kode_klasifikasi' => '400.7',
                'index'            => 'KESEHATAN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.1',
                'index'            => 'Kebijakan di Bidang Kesehatan yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.7.2',
                'index'            => 'Upaya Kesehatan Dasar',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.2.1',
                'index'            => 'Pelayanan Kedokteran Keluarga',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.2.2',
                'index'            => 'Praktik Klinis Dokter di Pelayanan Kesehatan Primer',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.2.3',
                'index'            => 'Pelaksanaan Kesehatan Primer',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.2.4',
                'index'            => 'Kesehatan Gigi dan Mulut di Puskesmas',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.2.5',
                'index'            => 'Kesehatan Gigi dan Mulut di Rumah Sakit',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.2.6',
                'index'            => 'ICD 10, Dentistry, dan Stomatologi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.2.7',
                'index'            => 'Infeksi Menular Lewat Transfusi Darah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.2.8',
                'index'            => 'Penyakit Mulut di Tingkat Primer',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.2.9',
                'index'            => 'Pembiayaan Darah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.2.10',
                'index'            => 'Penggunaan Darah Rasional',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.2.11',
                'index'            => 'Unit Transfusi Darah, Bank Darah Rumah Sakit dan Jejaring Pelayanan Darah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.2.12',
                'index'            => 'Pelayanan Kesehatan di Daerah Terpencil, Sangat Terpencil, dan Kepulauan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.2.13',
                'index'            => 'Akreditasi Puskesmas',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.2.14',
                'index'            => 'Puskesmas Berprestasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.3',
                'index'            => 'Upaya Kesehatan Rujukan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.3.1',
                'index'            => 'Pelayanan Kesehatan Rujukan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.3.2',
                'index'            => 'Pelayanan Kedokteran, Organisasi Profesi dan Konsorsium Upaya Kesehatan (KUK)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.3.3',
                'index'            => 'Pelayanan Rumah Sakit Privat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.3.4',
                'index'            => 'Pelayanan Kesehatan Rumah Sakit Khusus dan Fasilitas Pelayanan Kesehatan Lainnya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.3.5',
                'index'            => 'Pelayanan Kesehatan Rumah Sakit Pendidikan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.3.6',
                'index'            => 'Pelayanan Pasien Jaminan Kesehatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.3.7',
                'index'            => 'Fasilitas Pelayanan Kesehatan Asing dan Perdagangan Jasa',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.3.8',
                'index'            => 'Badan Pengawas Rumah Sakit',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.3.9',
                'index'            => 'Perizinan dan Penetapan Kelas Rumah Sakit Kelas A dan Penanam Modal Asing (PMA)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.7.3.10',
                'index'            => 'Akreditasi Rumah Sakit dan Fasilitas Kesehatan Lainnya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.7.4',
                'index'            => 'Keperawatan dan Keteknisian Medik',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.4.1',
                'index'            => 'Pelayanan Keperawatan Dasar',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.4.2',
                'index'            => 'Pelayanan Keperawatan Profesional di Rumah Sakit',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.4.3',
                'index'            => 'Pelayanan Keperawatan di Rumah Sakit Umum',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.4.4',
                'index'            => 'Pelayanan Keperawatan di Rumah Sakit Khusus',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.4.5',
                'index'            => 'Bina Pelayanan Kebidanan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.5',
                'index'            => 'Penunjang Medik dan Sarana Kesehatan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.5.1',
                'index'            => 'Mikrobiologi dan Imunologi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.5.2',
                'index'            => 'Patologi dan Toksikologi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.5.3',
                'index'            => 'Radiologi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.5.4',
                'index'            => 'Perizinan dan Sertifikasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.7.5.5',
                'index'            => 'Prasarana dan Sarana Kesehatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.5.6',
                'index'            => 'Peralatan Medis di Fasilitas Pelayanan Kesehatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.5.7',
                'index'            => 'Aplikasi Prasarana dan Sarana Alat Kesehatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.7.6',
                'index'            => 'Kesehatan Jiwa',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.6.1',
                'index'            => 'Kesehatan Jiwa di Nonfasilitas Pelayanan Kesehatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.6.2',
                'index'            => 'Bina Kesehatan Jiwa di Fasilitas Pelayanan Kesehatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.6.3',
                'index'            => 'Etikolegal dan Asesmen',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.7.6.4',
                'index'            => 'Pencegahan dan Penanggulangan Narkotika dan Sejenisnya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.6.5',
                'index'            => 'Kesehatan Jiwa Kelompok Berisiko',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.7',
                'index'            => 'Surveilans, Imunisasi, Karantina, dan Kesehatan Matra',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.7.1',
                'index'            => 'Surveilans dan Respons Kejadian Luar Biasa',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.7.2',
                'index'            => 'Imunisasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.7.3',
                'index'            => 'Karantina Kesehatan dan Kesehatan di Pelabuhan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.7.4',
                'index'            => 'Kesehatan Matra',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.8',
                'index'            => 'Pengendalian Penyakit Menular Langsung',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.8.1',
                'index'            => 'Pengendalian Tuberkulosis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.8.2',
                'index'            => 'Pengendalian AIDS dan Penyakit Menular Seksual',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.8.3',
                'index'            => 'Pengendalian Infeksi Saluran Pernafasan Akut',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.8.4',
                'index'            => 'Pengendalian Diare dan Infeksi Saluran Pencernaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.8.5',
                'index'            => 'Pengendalian Kusta dan Frambusia',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.9',
                'index'            => 'Pengendalian Penyakit Bersumber Binatang',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.9.1',
                'index'            => 'Pengendalian Malaria',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.9.2',
                'index'            => 'Pengendalian Arbovirosis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.9.3',
                'index'            => 'Pengendalian Zoonosis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.9.4',
                'index'            => 'Pengendalian Filariasis dan Kecacingan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.10',
                'index'            => 'Pengendalian Penyakit Tidak Menular',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.10.1',
                'index'            => 'Pengendalian Penyakit Jantung dan Pembuluh Darah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.10.2',
                'index'            => 'Pengendalian Penyakit Diabetes Melitus dan Penyakit Metabolik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.10.3',
                'index'            => 'Penyakit Kanker',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.10.4',
                'index'            => 'Penyakit Kronis dan Generatif',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.10.5',
                'index'            => 'Gangguan Akibat Kecelakaan dan Tindak Kekerasan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.11',
                'index'            => 'Penyehatan Lingkungan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.11.1',
                'index'            => 'Penyehatan Air dan Sanitasi Dasar',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.11.2',
                'index'            => 'Pemukiman dan Tempat Umum',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.11.3',
                'index'            => 'Kawasan dan Sanitasi Darurat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.11.4',
                'index'            => 'Higiene Sanitasi Pangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.11.5',
                'index'            => 'Pengamanan Limbah, Udara, Radiasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.12',
                'index'            => 'Pengembangan Teknologi Laboratorium dan Penapisan Teknologi Pengendalian Penyakit dan Pengendalian Lingkungan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.13',
                'index'            => 'Gizi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.13.1',
                'index'            => 'Gizi Makro',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.13.2',
                'index'            => 'Gizi Mikro',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.13.3',
                'index'            => 'Gizi Klinik dan Dietetika',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.13.4',
                'index'            => 'Konsumsi Makanan dan Jasa Makanan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.13.5',
                'index'            => 'Kewaspadaan Gizi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.14',
                'index'            => 'Kesehatan Ibu',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.14.1',
                'index'            => 'Kesehatan Ibu Hamil',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.14.2',
                'index'            => 'Kesehatan Ibu Bersalin dan Nifas',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.14.3',
                'index'            => 'Kesehatan Maternal dengan Pencegahan Komplikasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.14.4',
                'index'            => 'Keluarga Berencana',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.14.5',
                'index'            => 'Pelindungan Kesehatan Reproduksi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.15',
                'index'            => 'Kesehatan Anak',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.15.1',
                'index'            => 'Kelangsungan Hidup Bayi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.15.2',
                'index'            => 'Kelangsungan Anak Balita dan Prasekolah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.15.3',
                'index'            => 'Kewaspadaan Penanganan Balita Berisiko',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.15.4',
                'index'            => 'Kualitas Hidup Anak Usia Sekolah dan Remaja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.15.5',
                'index'            => 'Pelindungan Kesehatan Anak',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.16',
                'index'            => 'Kesehatan Tradisional Alternatif dan Komplementer',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.16.1',
                'index'            => 'Kesehatan Tradisional Keterampilan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.16.2',
                'index'            => 'Kesehatan Tradisional Ramuan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.16.3',
                'index'            => 'Kesehatan Alternatif dan Komplementer',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.16.4',
                'index'            => 'Penapisan dan Kemitraan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.17',
                'index'            => 'Kesehatan Kerja dan Olahraga',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.17.1',
                'index'            => 'Pelayanan Kesehatan Kerja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.17.2',
                'index'            => 'Kapasitas Kerja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.17.3',
                'index'            => 'Lingkungan Kerja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.17.4',
                'index'            => 'Kemitraan Kesehatan Kerja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.17.5',
                'index'            => 'Kesehatan Perkotaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.17.6',
                'index'            => 'Kesehatan Olahraga',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.18',
                'index'            => 'Obat Publik dan Perbekalan Kesehatan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.18.1',
                'index'            => 'Harga Obat Publik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.18.2',
                'index'            => 'Pengadaan Obat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.18.3',
                'index'            => 'Perbekalan Kesehatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.19',
                'index'            => 'Produksi dan Distribusi Alat Kesehatan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.19.1',
                'index'            => 'Alat Kesehatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.19.2',
                'index'            => 'Produsen dan Distributor Alat Kesehatan dan Obat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.19.3',
                'index'            => 'Produk Diagnostik In Vitro dan Perbekalan Kesehatan Rumah Tangga',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.20',
                'index'            => 'Kefarmasian',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.20.1',
                'index'            => 'Pelayanan Kefarmasian',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.20.2',
                'index'            => 'Farmasi Klinis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.20.3',
                'index'            => 'Farmasi Komunitas',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.20.4',
                'index'            => 'Penggunaan Obat Rasional',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.21',
                'index'            => 'Produksi dan Distribusi Kefarmasian',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.21.1',
                'index'            => 'Obat Tradisional',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.21.2',
                'index'            => 'Kosmetik dan Makanan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.21.3',
                'index'            => 'Narkotika, Psikotropika, Prekursor Farmasi, dan Sediaan Farmasi Khusus',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.21.4',
                'index'            => 'Kemandirian Obat dan Bahan Baku Obat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.22',
                'index'            => 'Surat Keterangan, Sertifikasi, dan Perizinan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.22.1',
                'index'            => 'Surat Keterangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.22.2',
                'index'            => 'Sertifikasi dan Perizinan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.7.23',
                'index'            => 'Penanggulangan Krisis Kesehatan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.23.1',
                'index'            => 'Pencegahan, Mitigasi, dan Kesiapsiagaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.7.23.2',
                'index'            => 'Tanggap Darurat dan Pemulihan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.23.3',
                'index'            => 'Pemantauan dan Informasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.23.4',
                'index'            => 'Penanggulangan Krisis Kesehatan dalam Bidang Pengendalian Penyakit dan Penyehatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.23.5',
                'index'            => 'Pelayanan Kesehatan Reproduksi Situasi Bencana',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.24',
                'index'            => 'Pengembangan dan Jaminan Kesehatan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.24.1',
                'index'            => 'Tersedianya Data National Health Account (NHA) Setiap Tahun',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.24.2',
                'index'            => 'Tersedianya Dokumen Teknis Penguatan Pelaksanaan Jaringan Kesehatan Nasional (JKN)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.25',
                'index'            => 'Intelegensia Kesehatan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.25.1',
                'index'            => 'Pemeliharaan dan Peningkatan Kemampuan Inteligensia Kesehatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.25.2',
                'index'            => 'Penanggulangan Masalah Inteligensia Kesehatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.26',
                'index'            => 'Kesehatan Haji',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.26.1',
                'index'            => 'Pelayanan dan Pendayagunaan Sumber Daya Kesehatan Haji',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.26.2',
                'index'            => 'Peningkatan Kesehatan dan Pengendalian Faktor Risiko Kesehatan Haji',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.27',
                'index'            => 'Promosi Kesehatan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.27.1',
                'index'            => 'Sarana Promosi Kesehatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.27.2',
                'index'            => 'Pembinaan Advokasi dan Kemitraan serta Pemberdayaan Peran',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.27.3',
                'index'            => 'Pengembangan Pesan Promosi Kesehatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.27.4',
                'index'            => 'Hari Kesehatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.28',
                'index'            => 'Data dan Informasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.28.1',
                'index'            => 'Statistik Kesehatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.7.28.2',
                'index'            => 'Analisis dan Diseminasi Informasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.7.28.3',
                'index'            => 'Pengembangan Sistem Informasi dan Bank Data Kesehatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.7.29',
                'index'            => 'Pengawasan Obat Tradisional, Kosmetik, dan Produk Komplimen',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.29.1',
                'index'            => 'Penilaian Obat Tradisional, Suplemen Makanan, dan Kosmetik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.7.29.2',
                'index'            => 'Standardisasi Obat Tradisional, Kosmetik, dan Produk Komplimen',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.7.29.3',
                'index'            => 'Inspeksi dan Sertifikasi Obat Tradisional, Kosmetik, dan Produk Komplimen',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.7.29.4',
                'index'            => 'Obat Asli Indonesia',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.7.30',
                'index'            => 'Pengawasan Keamanan Pangan dan Bahan Berbahaya',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.7.30.1',
                'index'            => 'Penilaian Keamanan Pangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.7.30.2',
                'index'            => 'Standardisasi Produk Pangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.7.30.3',
                'index'            => 'Inspeksi dan Sertifikasi Produk Pangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.7.30.4',
                'index'            => 'Surveilans dan Penyuluhan Keamanan Pangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.7.30.5',
                'index'            => 'Pengawasan Produk dan Bahan Berbahaya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.7.31',
                'index'            => 'Rekam Medis',
                'retensi_aktif'    => '5 Tahun Sejak Tanggal Kunjungan Terakhir Pasien',
                'retensi_inaktif'  => '20 Tahun',
                'status_akhir'     => 'Musnah, Kecuali Masih Akan Digunakan atau Dimanfaatkan'
            ],

            // Data 400.8 - AGAMA DAN KEPERCAYAAN
            [
                'kode_klasifikasi' => '400.8',
                'index'            => 'AGAMA DAN KEPERCAYAAN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.8.1',
                'index'            => 'Kebijakan di Bidang Agama dan Kepercayaan yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.8.2',
                'index'            => 'Fasilitasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.8.2.1',
                'index'            => 'Data Forum Komunikasi Umat Beragama (FKUB) Provinsi/Kabupaten/Kota',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.8.2.2',
                'index'            => 'Pelaksanaan Kerukunan Umat Beragama dan Kepercayaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.8.2.3',
                'index'            => 'Pelestarian Nilai-nilai Keagamaan dan Kepercayaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.8.2.4',
                'index'            => 'Kasus Keagamaan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.8.2.5',
                'index'            => 'Kasus Aliran Keagamaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.8.3',
                'index'            => 'Pembinaan Kepercayaan Kepada Tuhan YME',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.8.3.1',
                'index'            => 'Kelembagaan dan Kepercayaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.8.3.2',
                'index'            => 'Pembinaan Kerukunan Hidup Beragama',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.8.3.3',
                'index'            => 'Komunitas Kepercayaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.8.3.4',
                'index'            => 'Pengetahuan dan Ekspresi Budaya Tradisional',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.8.3.5',
                'index'            => 'Lingkungan Budaya dan Pranata Sosial',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],

            // Data 400.9 - SOSIAL
            [
                'kode_klasifikasi' => '400.9',
                'index'            => 'SOSIAL',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.9.1',
                'index'            => 'Kebijakan di Bidang Sosial yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.9.2',
                'index'            => 'Kesejahteraan Sosial Anak',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.9.2.1',
                'index'            => 'Kesejahteraan Sosial Anak Balita',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.9.2.2',
                'index'            => 'Kesejahteraan Sosial Anak Terlantar',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.9.2.3',
                'index'            => 'Kesejahteraan Sosial Anak Berhadapan dengan Hukum',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.9.2.4',
                'index'            => 'Kesejahteraan Sosial Anak dengan Kecacatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.9.2.5',
                'index'            => 'Kesejahteraan Sosial Anak yang Membutuhkan Pelindungan Khusus',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.9.3',
                'index'            => 'Rehabilitasi Sosial',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.9.3.1',
                'index'            => 'Rehabilitasi Sosial Orang dengan Kecacatan Tubuh dan Bekas Penderita Penyakit Kronis, Netra dan Rungu Wicara, Mental',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.9.3.2',
                'index'            => 'Kelembagaan dan Advokasi Sosial',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.9.3.3',
                'index'            => 'Asistensi dan Pemeliharaan Kesejahteraan Sosial',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.9.4',
                'index'            => 'Rehabilitasi Sosial Tuna Sosial',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.9.4.1',
                'index'            => 'Gelandangan, Pengemis, dan Pemulung',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.9.4.2',
                'index'            => 'Tuna Susila dan Korban Trafficking Perempuan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.9.4.3',
                'index'            => 'Warga Binaan Lembaga Pemasyarakatan Meliputi Penyiapan, Reintegrasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.9.4.4',
                'index'            => 'Pelayanan Sosial Orang dengan HIV/AIDS dan Kelompok Minoritas',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.9.5',
                'index'            => 'Rehabilitasi Sosial Korban Penyalahgunaan Narkotika, Psikotropika, dan Zat Adiktif (Napza)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.9.6',
                'index'            => 'Pelayanan Sosial Lanjut Usia',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.9.6.1',
                'index'            => 'Pelayanan Sosial Dalam dan Luar Panti',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.9.6.2',
                'index'            => 'Pengembangan Kelembagaan Meliputi Pembinaan Lembaga, Kerja Sama Lembaga',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.9.6.3',
                'index'            => 'Advokasi dan Pelayanan Sosial Kedaruratan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.9.7',
                'index'            => 'Pengumpulan dan Pengelolaan Sumber Dana Bantuan Sosial',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.9.8',
                'index'            => 'Pelindungan Sosial Korban Tindak Kekerasan dan Pekerja Migran',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.9.9',
                'index'            => 'Pelindungan Sosial Korban Bencana Sosial',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.9.9.1',
                'index'            => 'Ketahanan Sosial Masyarakat Meliputi Keserasian Sosial, Penguatan Sumber Daya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.9.9.2',
                'index'            => 'Tanggap Darurat Meliputi Bantuan Darurat, Advokasi Sosial',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.9.9.3',
                'index'            => 'Pemulihan Sosial Meliputi Penguatan Sosial, Reintegrasi Sosial',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.9.9.4',
                'index'            => 'Kerja Sama Meliputi Kerja Sama Pemerintah, Kerja Sama Nonpemerintah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.9.10',
                'index'            => 'Pelindungan Sosial Korban Bencana Alam',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.9.10.1',
                'index'            => 'Kesiapsiagaan dan Mitigasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.9.10.2',
                'index'            => 'Tanggap Darurat Meliputi Bantuan Darurat, Advokasi Sosial',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.9.10.3',
                'index'            => 'Pemulihan Sosial dan Penguatan Sosial',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.9.10.4',
                'index'            => 'Kerja Sama',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.9.11',
                'index'            => 'Jaminan Sosial',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.9.11.1',
                'index'            => 'Seleksi dan Verifikasi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.9.11.2',
                'index'            => 'Asuransi Kesejahteraan Sosial Meliputi Kelembagaan, Pengelolaan Premi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.9.11.3',
                'index'            => 'Bantuan Langsung dan Tunjangan Berkelanjutan Meliputi Pendampingan dan Penyaluran',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.9.11.4',
                'index'            => 'Kerja Sama',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.9.12',
                'index'            => 'Pemberdayaan Keluarga dan Kelembagaan Sosial',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.9.12.1',
                'index'            => 'Ketahanan Keluarga',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.9.12.2',
                'index'            => 'Asistensi Keluarga dan Pemberdayaan Perempuan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.9.12.3',
                'index'            => 'Tenaga Kesejahteraan Sosial Masyarakat dan Organisasi Sosial',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.9.12.4',
                'index'            => 'Kemitraan Dunia Usaha',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.9.12.5',
                'index'            => 'Karang Taruna Meliputi Kelembagaan, Pengembangan Kapasitas',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.9.13',
                'index'            => 'Pemberdayaan Komunitas Adat Terpencil',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.9.13.1',
                'index'            => 'Persiapan Pemberdayaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.9.13.2',
                'index'            => 'Pemberdayaan Sumber Daya Manusia',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.9.13.3',
                'index'            => 'Penggalian dan Pengembangan Potensi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.9.13.4',
                'index'            => 'Keserasian dan Penguatan Komunitas Adat Terpencil',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.9.13.5',
                'index'            => 'Kerja Sama Kelembagaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.9.14',
                'index'            => 'Penanggulangan Kemiskinan Perkotaan dan Perdesaan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.9.14.1',
                'index'            => 'Identifikasi dan Analisis',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.9.14.2',
                'index'            => 'Pengembangan Kapasitas',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.9.14.3',
                'index'            => 'Penataan Sosial Lingkungan Kumuh',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.9.14.4',
                'index'            => 'Advokasi Sosial dan Pengembangan Aksesibilitas',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.9.14.5',
                'index'            => 'Bantuan Langsung',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.9.14.6',
                'index'            => 'Kerja Sama Kelembagaan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.9.15',
                'index'            => 'Kepahlawanan, Keperintisan, dan Kesetiakawanan Sosial',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.9.15.1',
                'index'            => 'Penghargaan dan Kesejahteraan Keluarga Pahlawan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.9.15.2',
                'index'            => 'Pelestarian Nilai-nilai Kepahlawanan dan Keperintisan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.9.15.3',
                'index'            => 'Pengembangan Kesetiakawanan Sosial',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.9.15.4',
                'index'            => 'Pengelolaan Taman Makam Pahlawan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],

            // Data 400.10 - PEMBERDAYAAN MASYARAKAT DESA
            [
                'kode_klasifikasi' => '400.10',
                'index'            => 'PEMBERDAYAAN MASYARAKAT DESA',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.10.1',
                'index'            => 'Kebijakan di Bidang Pemberdayaan Masyarakat Desa yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.10.2',
                'index'            => 'Pemerintahan Desa dan Kelurahan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.10.2.1',
                'index'            => 'Fasilitasi Pengembangan Desa dan Kelurahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.10.2.2',
                'index'            => 'Administrasi Pemerintahan Desa dan Kelurahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.10.2.3',
                'index'            => 'Fasilitasi Permusyawaratan Desa',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.10.2.4',
                'index'            => 'Fasilitasi Pengelolaan Keuangan dan Aset Desa',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.10.2.5',
                'index'            => 'Pengembangan Kapasitas Desa',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.10.3',
                'index'            => 'Kelembagaan dan Pelatihan Masyarakat',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.10.3.1',
                'index'            => 'Lembaga Masyarakat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.10.3.2',
                'index'            => 'Pembangunan Partisipatif',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.10.3.3',
                'index'            => 'Pendataan Potensi Masyarakat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.10.3.4',
                'index'            => 'Pengembangan Kawasan Perdesaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.10.3.5',
                'index'            => 'Pelatihan Masyarakat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.10.4',
                'index'            => 'Pemberdayaan Adat dan Sosial Budaya Masyarakat',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.10.4.1',
                'index'            => 'Budaya Nusantara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.10.4.2',
                'index'            => 'Pemberdayaan Perempuan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.10.4.3',
                'index'            => 'Pemberdayaan dan Kesejahteraan Keluarga',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.10.4.4',
                'index'            => 'Kesejahteraan Sosial',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.10.4.5',
                'index'            => 'Tenaga Kerja Perdesaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.10.5',
                'index'            => 'Usaha Ekonomi Masyarakat',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.10.5.1',
                'index'            => 'Usaha Pertanian dan Pangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.10.5.2',
                'index'            => 'Usaha Perkreditan dan Simpan Pinjam',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '2 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.10.5.3',
                'index'            => 'Produksi dan Pemasaran',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.10.5.4',
                'index'            => 'Usaha Ekonomi dan Keluarga',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.10.5.5',
                'index'            => 'Ekonomi Perdesaan dan Masyarakat Tertinggal',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.10.6',
                'index'            => 'Sumber Daya Alam dan Teknologi Tepat Guna Perdesaan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.10.6.1',
                'index'            => 'Fasilitasi Konservasi dan Rehabilitasi Lingkungan Perdesaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.10.6.2',
                'index'            => 'Fasilitasi Pemanfaatan Lahan dan Pesisir Perdesaan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '2 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.10.6.3',
                'index'            => 'Fasilitasi Prasarana dan Sarana Perdesaan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '2 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.10.6.4',
                'index'            => 'Fasilitasi Pemetaan Kebutuhan dan Pengkajian Teknologi Perdesaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.10.6.5',
                'index'            => 'Pemasyarakatan dan Kerja Sama Teknologi Perdesaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.10.7',
                'index'            => 'Badan Usaha Milik Desa (BUMDes)',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '2 Tahun',
                'status_akhir'     => 'Musnah'
            ],

            // Data 400.11 - PERTAMANAN DAN PEMAKAMAN
            [
                'kode_klasifikasi' => '400.11',
                'index'            => 'PERTAMANAN DAN PEMAKAMAN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.11.1',
                'index'            => 'Kebijakan di Bidang Pertamanan dan Pemakaman yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.11.2',
                'index'            => 'Pertamanan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.11.2.1',
                'index'            => 'Perencanaan Pertamanan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.11.2.2',
                'index'            => 'Taman Kota',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.11.2.3',
                'index'            => 'Tata Hias dan Ornamen Kota',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.11.3',
                'index'            => 'Pemakaman',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.11.3.1',
                'index'            => 'Perencanaan Pemakaman',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.11.3.2',
                'index'            => 'Pemakaman',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '8 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.11.3.3',
                'index'            => 'Pelayanan Pemakaman',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.11.4',
                'index'            => 'Jalur Hijau',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.11.4.1',
                'index'            => 'Perencanaan Jalur Hijau',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.11.4.2',
                'index'            => 'Jalur Hijau Jalan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.11.4.3',
                'index'            => 'Jalur Hijau Penyempurna dan Tepian Air',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.11.5',
                'index'            => 'Peran Serta Masyarakat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.11.6',
                'index'            => 'Pengawasan dan Penindakan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.11.7',
                'index'            => 'Pengelolaan Data',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.11.8',
                'index'            => 'Evaluasi dan Pelaporan',
                'retensi_aktif'    => '2 Tahun Setelah Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],

            // Data 400.12 - KEPENDUDUKAN DAN CATATAN SIPIL
            [
                'kode_klasifikasi' => '400.12',
                'index'            => 'KEPENDUDUKAN DAN CATATAN SIPIL',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.12.1',
                'index'            => 'Kebijakan di Bidang Kependudukan dan Catatan Sipil yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.12.2',
                'index'            => 'Pendaftaran Penduduk',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.12.2.1',
                'index'            => 'Identitas Penduduk',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.12.2.2',
                'index'            => 'Pindah Datang Penduduk dalam Wilayah NKRI',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.12.2.3',
                'index'            => 'Pindah Datang Penduduk Antarnegara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.12.2.4',
                'index'            => 'Pendataan Penduduk Rentan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.12.2.5',
                'index'            => 'Monitoring, Evaluasi, dan Dokumentasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.12.3',
                'index'            => 'Pencatatan Sipil',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.12.3.1',
                'index'            => 'Kelahiran dan Kematian',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.12.3.2',
                'index'            => 'Perkawinan dan Perceraian',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.12.3.3',
                'index'            => 'Pengangkatan Pengakuan dan Pengesahan Anak serta Perubahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.12.3.4',
                'index'            => 'Pencatatan Kewarganegaraan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.12.3.5',
                'index'            => 'Monitoring, Evaluasi, dan Dokumentasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen' // Catatan: Data CSV tertulis 'Permenen', saya koreksi menjadi 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.12.4',
                'index'            => 'Pengelolaan Informasi Administrasi Kependudukan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.12.4.1',
                'index'            => 'Sistem Informasi Administrasi Kependudukan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.12.4.2',
                'index'            => 'Kelembagaan Informasi Administrasi Kependudukan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.12.4.3',
                'index'            => 'Pengelolaan Data Administrasi Kependudukan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.12.4.4',
                'index'            => 'Penyajian dan Layanan Informasi Administrasi Kependudukan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.12.4.5',
                'index'            => 'Monitoring, Evaluasi, dan Dokumentasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.12.5',
                'index'            => 'Pengembangan Kebijakan Kependudukan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.12.5.1',
                'index'            => 'Kuantitas Penduduk',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.12.5.2',
                'index'            => 'Kualitas Penduduk',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.12.5.3',
                'index'            => 'Mobilitas Penduduk',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.12.5.4',
                'index'            => 'Pelindungan dan Pemberdayaan Penduduk',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.12.5.5',
                'index'            => 'Pengembangan Wawasan Kependudukan, Monitoring, dan Evaluasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.12.6',
                'index'            => 'Penyerasian Kependudukan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.12.6.1',
                'index'            => 'Indikator Kependudukan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.12.6.2',
                'index'            => 'Proyeksi Penduduk',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.12.6.3',
                'index'            => 'Perencanaan Kependudukan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.12.6.4',
                'index'            => 'Penyerasian Kebijakan Kependudukan dengan Lembaga Nonpemerintah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.12.6.5',
                'index'            => 'Pelaksanaan Penyerasian Kebijakan Kependudukan dengan Lembaga Pemerintah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],

            // Data 400.13 - KELUARGA BERENCANA
            [
                'kode_klasifikasi' => '400.13',
                'index'            => 'KELUARGA BERENCANA',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.1',
                'index'            => 'Kebijakan di Bidang Keluarga Berencana yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.2',
                'index'            => 'Analisis Pemaduan Kebijakan Pengendalian Penduduk',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.2.1',
                'index'            => 'Pengumpulan dan Pengolahan Data',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.2.2',
                'index'            => 'Evaluasi dan Pelaporan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.3',
                'index'            => 'Fasilitas Pemaduan Kebijakan Pengendalian Penduduk',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.3.1',
                'index'            => 'Penyiapan Fasilitas',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.3.2',
                'index'            => 'Evaluasi dan Pelaporan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.4',
                'index'            => 'Profil dan Proyeksi Penduduk',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.4.1',
                'index'            => 'Data Profil dan Proyeksi Penduduk',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.4.2',
                'index'            => 'Evaluasi Data Profil dan Proyeksi Penduduk',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.5',
                'index'            => 'Penetapan Parameter Pengendalian Penduduk',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.5.1',
                'index'            => 'Penetapan Sasaran Parameter',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.5.2',
                'index'            => 'Evaluasi Sasaran Parameter',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.6',
                'index'            => 'Pemanfaatan Perencanaan Pengendalian Penduduk',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.6.1',
                'index'            => 'Pemanfaatan Profil dan Proyeksi',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.6.2',
                'index'            => 'Pemanfaatan Parameter',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.7',
                'index'            => 'Pengembangan Sistem',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.7.1',
                'index'            => 'Pengembangan Sistem Jalur Pendidikan Formal',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.7.2',
                'index'            => 'Pengembangan Sistem Jalur Pendidikan Nonformal dan Informal',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.8',
                'index'            => 'Pengembangan Materi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.8.1',
                'index'            => 'Pengembangan Materi Jalur Pendidikan Formal',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.8.2',
                'index'            => 'Pengembangan Materi Jalur Pendidikan Nonformal dan Informal',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.9',
                'index'            => 'Monitoring dan Evaluasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.9.1',
                'index'            => 'Monitoring dan Evaluasi Jalur Pendidikan Formal',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.9.2',
                'index'            => 'Monitoring dan Evaluasi Jalur Pendidikan Nonformal dan Informal',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.10',
                'index'            => 'Analisis Sosial',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.11',
                'index'            => 'Analisis Ekonomi',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.12',
                'index'            => 'Analisis Dampak Politik, Pertahanan, dan Keamanan',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.13',
                'index'            => 'Analisis Daya Dukung dan Daya Tampung Lingkungan',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.14',
                'index'            => 'Bina Keluarga Berencana Rumah Sakit dan Klinik Pemerintah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.15',
                'index'            => 'Jaminan Pelayanan dan Penyediaan Sarana Keluarga Berencana',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.16',
                'index'            => 'Kualitas Pelayanan Keluarga Berencana Pemerintah',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.16.1',
                'index'            => 'Standardisasi Pelayanan Keluarga Berencana Pemerintah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.16.2',
                'index'            => 'Monitoring dan Evaluasi Pelayanan Keluarga Berencana Pemerintah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.17',
                'index'            => 'Bina Keluarga Berencana Rumah Sakit dan Klinik Swasta',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.18',
                'index'            => 'Jaminan dan Ketersediaan Sarana Keluarga Berencana Swasta',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.19',
                'index'            => 'Kualitas Pelayanan Keluarga Berencana Swasta',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.19.1',
                'index'            => 'Standardisasi Pelayanan Keluarga Berencana Swasta',
                'retensi_aktif'    => '2 Tahun Setelah Standar Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.19.2',
                'index'            => 'Monitoring dan Evaluasi Pelayanan Keluarga Berencana Swasta',
                'retensi_aktif'    => '2 Tahun Setelah Standar Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.20',
                'index'            => 'Akses dan Kualitas Pelayanan Keluarga Berencana Jalur Wilayah Tertinggal, Terpencil, dan Perbatasan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.20.1',
                'index'            => 'Peningkatan Akses Pelayanan Keluarga Berencana Wilayah Tertinggal, Terpencil, dan Perbatasan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.20.2',
                'index'            => 'Peningkatan Kualitas Pelayanan Keluarga Berencana Wilayah Tertinggal, Terpencil, dan Perbatasan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.21',
                'index'            => 'Akses dan Kualitas Pelayanan Keluarga Berencana Wilayah Miskin Perkotaan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.21.1',
                'index'            => 'Peningkatan Akses Pelayanan Keluarga Berencana Wilayah Miskin Perkotaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.21.2',
                'index'            => 'Peningkatan Kualitas Pelayanan Keluarga Berencana Wilayah Miskin Perkotaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.22',
                'index'            => 'Kesertaan Keluarga Berencana Pria',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.22.1',
                'index'            => 'Peningkatan Akses Keluarga Berencana Pria',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.22.2',
                'index'            => 'Peningkatan Partisipasi Keluarga Berencana Pria',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.23',
                'index'            => 'Kelangsungan Hidup Ibu, Bayi, dan Anak',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.24',
                'index'            => 'Pencegahan Penyakit Menular Seksual (PMS) dan HIV/AIDS',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.25',
                'index'            => 'Pencegahan Kanker Alat Reproduksi dan Penanggulangan Infertilitas',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.26',
                'index'            => 'Pelembagaan Bina Keluarga Balita dan Anak',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.26.1',
                'index'            => 'Pengembangan Kelompok Bina Keluarga Balita dan Anak',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.26.2',
                'index'            => 'Pengembangan Kemitraan Bina Keluarga dan Anak',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.27',
                'index'            => 'Monitoring dan Evaluasi Bina Keluarga Balita dan Anak',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.27.1',
                'index'            => 'Monitoring Bina Keluarga Balita dan Anak',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.27.2',
                'index'            => 'Evaluasi dan Pelaporan Bina Keluarga Balita dan Anak',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.28',
                'index'            => 'Pelembagaan Bina Ketahanan Remaja',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.28.1',
                'index'            => 'Pelembagaan Bina Ketahanan Remaja Jalur Pendidikan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.28.2',
                'index'            => 'Pelembagaan Bina Ketahanan Remaja Jalur Masyarakat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.29',
                'index'            => 'Monitoring dan Evaluasi Bina Ketahanan Remaja',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.29.1',
                'index'            => 'Monitoring Bina Ketahanan Remaja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.29.2',
                'index'            => 'Evaluasi dan Pelaporan Bina Ketahanan Remaja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.30',
                'index'            => 'Pengembangan Program Bina Ketahanan Keluarga Lanjut Usia (Lansia) dan Rentan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.30.1',
                'index'            => 'Pengembangan Program Bina Ketahanan Keluarga Lansia',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.30.2',
                'index'            => 'Pengembangan Program Bina Ketahanan Keluarga Rentan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.31',
                'index'            => 'Pelembagaan Bina Ketahanan Keluarga Lansia dan Rentan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.31.1',
                'index'            => 'Pengembangan Kelompok Bina Ketahanan Keluarga Lansia dan Rentan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.31.2',
                'index'            => 'Pengembangan Kemitraan Bina Ketahanan Keluarga Lansia dan Rentan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.32',
                'index'            => 'Monitoring dan Evaluasi Bina Ketahanan Keluarga Lansia dan Rentan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.32.1',
                'index'            => 'Monitoring Bina Ketahanan Keluarga Lansia dan Rentan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.32.2',
                'index'            => 'Evaluasi dan Pelaporan Bina Ketahanan Keluarga Lansia dan Rentan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.33',
                'index'            => 'Pengembangan Program Usaha Ekonomi Keluarga',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.34',
                'index'            => 'Peningkatan Teknologi dan Permodalan Usaha Ekonomi Keluarga',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.35',
                'index'            => 'Peningkatan Manajemen Usaha Ekonomi Keluarga',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.35.1',
                'index'            => 'Pengembangan Administrasi dan Keuangan Kelompok Usaha Ekonomi Keluarga',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.35.2',
                'index'            => 'Pengembangan Pemasaran Kelompok Usaha Ekonomi Keluarga',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.36',
                'index'            => 'Monitoring dan Evaluasi Usaha Ekonomi Keluarga',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.37',
                'index'            => 'Pengembangan Program Pusat Pelayanan Keluarga Sejahtera',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.38',
                'index'            => 'Pelembagaan Pusat Pelayanan Keluarga Sejahtera',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.38.1',
                'index'            => 'Pengembangan Pusat Pelayanan Keluarga Sejahtera',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.38.2',
                'index'            => 'Pengembangan Kemitraan Pusat Pelayanan Keluarga Sejahtera',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.39',
                'index'            => 'Monitoring dan Evaluasi Pusat Pelayanan Keluarga Sejahtera',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.39.1',
                'index'            => 'Monitoring Pusat Pelayanan Keluarga Sejahtera',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.39.2',
                'index'            => 'Evaluasi dan Pelaporan Pusat Pelayanan Keluarga Sejahtera',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.40',
                'index'            => 'Pengembangan Advokasi dan Komunikasi, Informasi, Edukasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.40.1',
                'index'            => 'Perencanaan Advokasi dan Komunikasi, Informasi, Edukasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.40.2',
                'index'            => 'Evaluasi dan Pelaporan Advokasi dan Komunikasi, Informasi, Edukasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.41',
                'index'            => 'Advokasi dan Pencitraan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.42',
                'index'            => 'Komunikasi, Informasi, dan Edukasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.42.1',
                'index'            => 'Promosi',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.42.2',
                'index'            => 'Sarana Produksi Media Komunikasi',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.42.3',
                'index'            => 'Produk Media Komunikasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.43',
                'index'            => 'Hubungan dengan Lembaga Pemerintah Pusat dan Provinsi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.44',
                'index'            => 'Hubungan dengan Lembaga Pemerintah Kabupaten dan Kota',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.44.1',
                'index'            => 'Pengembangan Hubungan dengan Lembaga Pemerintah Kabupaten dan Kota',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.44.2',
                'index'            => 'Penguatan Hubungan dengan Lembaga Pemerintah Kabupaten dan Kota',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.45',
                'index'            => 'Hubungan dengan Lembaga Nonpemerintah',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.45.1',
                'index'            => 'Pengembangan Hubungan dengan Lembaga Nonpemerintah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.45.2',
                'index'            => 'Penguatan Hubungan dengan Lembaga Nonpemerintah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.46',
                'index'            => 'Tenaga Lini Lapangan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.46.1',
                'index'            => 'Pengembangan Tenaga Lini Lapangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.46.2',
                'index'            => 'Monitoring dan Evaluasi Tenaga Lini Lapangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.47',
                'index'            => 'Institusi Masyarakat Perdesaan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.47.1',
                'index'            => 'Pengembangan Institusi Masyarakat Perdesaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.47.2',
                'index'            => 'Monitoring dan Evaluasi Institusi Masyarakat Perdesaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.48',
                'index'            => 'Mekanisme Operasional Lini Lapangan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.48.1',
                'index'            => 'Pengembangan Mekanisme Operasional Lini Lapangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.48.2',
                'index'            => 'Monitoring dan Evaluasi Mekanisme Operasional Lini Lapangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.49',
                'index'            => 'Pengembangan Sistem Pencatatan dan Pelaporan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.49.1',
                'index'            => 'Perumusan Pola Sistem Pencatatan dan Pelaporan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.49.2',
                'index'            => 'Monitoring dan Evaluasi Sistem Pencatatan dan Pelaporan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.50',
                'index'            => 'Pengumpulan dan Pengolahan Data',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.51',
                'index'            => 'Analisis dan Evaluasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.51.1',
                'index'            => 'Analisis dan Evaluasi Pengendalian Penduduk',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.51.2',
                'index'            => 'Analisis dan Evaluasi Keluarga Berencana dan Keluarga Sejahtera',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.52',
                'index'            => 'Sistem Aplikasi dan Bank Data',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.52.1',
                'index'            => 'Pengembangan Sistem Aplikasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.52.2',
                'index'            => 'Pengelolaan Bank Data',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.53',
                'index'            => 'Infrastruktur Teknologi Informasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.53.1',
                'index'            => 'Pengembangan Infrastruktur Teknologi Informasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.53.2',
                'index'            => 'Pemeliharaan Infrastruktur Teknologi Informasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.13.54',
                'index'            => 'Dokumentasi dan Penyebarluasan Informasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.13.54.1',
                'index'            => 'Dokumentasi dan Perpustakaan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.13.54.2',
                'index'            => 'Pengelolaan Situs BKKBN dan Media Konferensi',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],

            // Data 400.14 - HUBUNGAN MASYARAKAT
            [
                'kode_klasifikasi' => '400.14',
                'index'            => 'HUBUNGAN MASYARAKAT',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.14.1',
                'index'            => 'Keprotokolan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.14.1.1',
                'index'            => 'Penyelenggaraan Acara Kedinasan (Upacara, Pelantikan, Peresmian, dan Jamuan, Termasuk Acara Peringatan Hari-hari Besar)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.14.1.2',
                'index'            => 'Buku Tamu Keprotokolan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.14.1.3',
                'index'            => 'Agenda Kegiatan Pimpinan Daerah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.14.1.4',
                'index'            => 'Kunjungan Dinas Dalam dan Luar Negeri',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.14.2',
                'index'            => 'Daftar Nama/Alamat Kantor/Pejabat',
                'retensi_aktif'    => '1 Tahun Selama Berlaku',
                'retensi_inaktif'  => '2 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.14.3',
                'index'            => 'Dokumentasi/Liputan Kegiatan Dinas Pimpinan, Acara Kedinasan dan Peristiwa-peristiwa Bidang Masing-masing, dalam Berbagai Media: Kertas, Foto/Video/Rekaman Suara/Multimedia',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.14.4',
                'index'            => 'Pengumpulan, Pengolahan, dan Penyajian Informasi Kelembagaan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.14.4.1',
                'index'            => 'Kliping Koran',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.14.4.2',
                'index'            => 'Brosur/Leaflet/Poster/Plakat',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.14.4.3',
                'index'            => 'Pengumuman/Pemberitaan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.14.5',
                'index'            => 'Hubungan Antarlembaga dan Pemerintahan Daerah',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '400.14.5.1',
                'index'            => 'Hubungan Antarlembaga Pemerintah',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.14.5.2',
                'index'            => 'Hubungan dengan Organisasi Sosial/LSM',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.14.5.3',
                'index'            => 'Hubungan dengan Perusahaan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.14.5.4',
                'index'            => 'Hubungan dengan Perguruan Tinggi/Sekolah, Termasuk Magang, Pendidikan Sistem Ganda (PSG)/Praktik Kerja Lapang (PKL)',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.14.5.5',
                'index'            => 'Forum Kehumasan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.14.5.6',
                'index'            => 'Hubungan dengan Media Massa',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.14.6',
                'index'            => 'Dengar Pendapat/Hearing DPRD',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.14.7',
                'index'            => 'Bahan/Materi Pidato/Sidang Muspida Provinsi/Kabupaten/Kota',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.14.8',
                'index'            => 'Penerbitan Majalah, Buletin, Koran, dan Jurnal',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.14.9',
                'index'            => 'Publikasi melalui Media Cetak maupun Elektronik',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.14.10',
                'index'            => 'Pameran/Sayembara/Lomba/Festival, Pembuatan Spanduk dan Iklan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '400.14.11',
                'index'            => 'Penghargaan/Tanda Kenang-kenangan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '400.14.12',
                'index'            => 'Ucapan Terima Kasih, Ucapan Selamat, Bela Sungkawa, Permohonan Maaf',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.1',
                'index'            => 'KETAHANAN PANGAN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.1.1',
                'index'            => 'Kebijakan di Bidang Ketahanan Pangan yang Dilakukan Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.1.2',
                'index'            => 'Ketersediaan dan Kerawanan Pangan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.1.2.1',
                'index'            => 'Ketersediaan Pangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.1.2.2',
                'index'            => 'Akses Pangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.1.2.3',
                'index'            => 'Kerawanan Pangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.1.3',
                'index'            => 'Distribusi dan Cadangan Pangan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.1.3.1',
                'index'            => 'Distribusi Pangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.1.3.2',
                'index'            => 'Harga Pangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.1.3.3',
                'index'            => 'Cadangan Pangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.1.4',
                'index'            => 'Penganekaragaman Konsumsi dan Ketahanan Pangan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.1.4.1',
                'index'            => 'Konsumsi Pangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.1.4.2',
                'index'            => 'Penganekaragaman Pangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.1.4.3',
                'index'            => 'Keamanan Pangan Segar',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.1.5',
                'index'            => 'Penguatan Kelembagaan Ketahanan Pangan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.1.5.1',
                'index'            => 'Dewan Ketahanan Pangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.1.5.2',
                'index'            => 'Penghargaan Ketahanan Pangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.1.6',
                'index'            => 'Swasembada Pangan (Kearifan Lokal)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.1.7',
                'index'            => 'Bimbingan Teknis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.1.8',
                'index'            => 'Evaluasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],

            // Data 500.2 - PERDAGANGAN
            [
                'kode_klasifikasi' => '500.2',
                'index'            => 'PERDAGANGAN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.2.1',
                'index'            => 'Kebijakan di Bidang Perdagangan yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.2.2',
                'index'            => 'Perdagangan Dalam Negeri',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.2.2.1',
                'index'            => 'Bina Usaha Kelembagaan dan Penguatan Usaha',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.2.2',
                'index'            => 'Bisa Usaha Jasa Perdagangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '8 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.2.3',
                'index'            => 'Bina Usaha Dagang Asing dan Keagenan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '8 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.2.4',
                'index'            => 'Informasi Perusahaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.2.5',
                'index'            => 'Pelaku Pasar',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.2.6',
                'index'            => 'Iklim Usaha dan Bimbingan Teknis Usaha Dagang Kecil Menengah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.2.7',
                'index'            => 'Fasilitasi Usaha dan Pemasaran Usaha Dagang Kecil Menengah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.2.8',
                'index'            => 'Pengembangan Produk Lokal',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.2.9',
                'index'            => 'Pencitraan Produk Dalam Negeri',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.2.10',
                'index'            => 'Pengembangan Sarana Distribusi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.2.11',
                'index'            => 'Pengelolaan Sarana Distribusi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.2.12',
                'index'            => 'Kerja Sama Pengembangan Sistem Logistik',
                'retensi_aktif'    => '2 Tahun Setelah Kerja Sama Berakhir',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.2.13',
                'index'            => 'Informasi dan Bimbingan Teknis Penyedia Jasa Logistik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.2.14',
                'index'            => 'Informasi Pasar',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.2.15',
                'index'            => 'Informasi Hasil Industri',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.2.16',
                'index'            => 'Barang Strategis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.2.17',
                'index'            => 'Bahan Pokok Agro',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.3',
                'index'            => 'Standardisasi dan Pelindungan Konsumen',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.2.3.1',
                'index'            => 'Kelembagaan dan Informasi Standar',
                'retensi_aktif'    => '2 Tahun Setelah Kerja Sama Berakhir',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.2.3.2',
                'index'            => 'Kerja Sama Standardisasi',
                'retensi_aktif'    => '2 Tahun Setelah Kerja Sama Berakhir',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.2.3.3',
                'index'            => 'Perumusan dan Penerapan Standar',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.2.3.4',
                'index'            => 'Tata Usaha (Kepegawaian, Keuangan, Perencanaan dan Program, dan Inventaris Kantor/BMAN)',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.2.3.5',
                'index'            => 'Kerja Sama, Informasi, dan Publikasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.3.6',
                'index'            => 'Analisis Penyelenggaraan Pelindungan Konsumen',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.2.3.7',
                'index'            => 'Bimbingan Konsumen dan Pelaku Usaha',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.3.8',
                'index'            => 'Fasilitas Kelembagaan (Pemberdayaan Lembaga Pelindungan Konsumen Swadaya Masyarakat dan Pemberdayaan Badan Penyelesaian Sengketa Konsumen)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.3.9',
                'index'            => 'Produk Pertambangan dan Aneka Industri',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.3.10',
                'index'            => 'Produk Pertanian, Kimia, dan Kehutanan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.3.11',
                'index'            => 'Jasa',
                'retensi_aktif'    => '2 Tahun Setelah Kerja Sama Berakhir',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.3.12',
                'index'            => 'Kerja Sama (Pengawasan Barang Beredar dan Jasa)',
                'retensi_aktif'    => '2 Tahun Setelah Kerja Sama Berakhir',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.3.13',
                'index'            => 'Sarana dan Kerja Sama (Metrologi)',
                'retensi_aktif'    => '3 Tahun Setelah Kerja Sama Berakhir',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.2.3.14',
                'index'            => 'Kelembagaan dan Penilaian',
                'retensi_aktif'    => '2 Tahun Setelah Kerja Sama Berakhir',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.2.3.15',
                'index'            => 'Alat-alat Ukur, Takar, Timbang, dan Perlengkapannya (UTTP) dan Standar Ukuran',
                'retensi_aktif'    => '2 Tahun Setelah Kerja Sama Berakhir',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.2.3.16',
                'index'            => 'Pengawasan (Metrologi)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.2.3.17',
                'index'            => 'Balai Pengelolaan Standar Nasional Satuan Ukuran',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.2.3.18',
                'index'            => 'Balai Pengujian UTTP',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.2.4',
                'index'            => 'Perdagangan Berjangka Komoditi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.2.4.1',
                'index'            => 'Pengkajian Pasar',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.4.2',
                'index'            => 'Pengawasan Transaksi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.4.3',
                'index'            => 'Pengawasan Keuangan dan Audit',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.4.4',
                'index'            => 'Pengkajian Pasar',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.4.5',
                'index'            => 'Pengembangan Pasar',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.4.6',
                'index'            => 'Sistem Informasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.4.7',
                'index'            => 'Pembinaan Pasar Lelang dan Sistem Resi Gudang',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.4.8',
                'index'            => 'Pengawasan Pasar Lelang',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.4.9',
                'index'            => 'Pengawasan Sistem Gudang',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.5',
                'index'            => 'Bimbingan Teknis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.2.6',
                'index'            => 'Evaluasi (Laporan)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],

            // Data 500.3 - KOPERASI DAN USAHA KECIL MENENGAH (KUKM)
            [
                'kode_klasifikasi' => '500.3',
                'index'            => 'KOPERASI DAN USAHA KECIL MENENGAH (KUKM)',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.3.1',
                'index'            => 'Kebijakan di Bidang Koperasi dan Usaha Kecil Menengah yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.3.2',
                'index'            => 'Kelembagaan Koperasi dan UKM',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.3.2.1',
                'index'            => 'Organisasi dan Badan Hukum Koperasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.3.2.2',
                'index'            => 'Tata Laksana Koperasi dan UKM',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Keputusan yang Terbaru atau Sejak Keputusan Lama Dinyatakan Tidak Berlaku',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.3.2.3',
                'index'            => 'Keanggotaan Koperasi',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Keputusan yang Terbaru atau Sejak Keputusan Lama Dinyatakan Tidak Berlaku',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.3.2.4',
                'index'            => 'Pengendalian dan Akuntabilitas',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Keputusan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.3.3',
                'index'            => 'Produksi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.3.3.1',
                'index'            => 'Pertanian Tanaman Pangan dan Hortikultura',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.3.3.2',
                'index'            => 'Kehutanan dan Perkebunan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.3.3.3',
                'index'            => 'Perikanan dan Peternakan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.3.3.4',
                'index'            => 'Industri Kerajinan dan Pertambangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.3.3.5',
                'index'            => 'Ketenagalistrikan dan Aneka Usaha',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.3.4',
                'index'            => 'Pembiayaan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.3.4.1',
                'index'            => 'Program Pendanaan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.3.4.2',
                'index'            => 'Pengembangan dan Pengendalian Simpan Pinjam',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.3.4.3',
                'index'            => 'Urusan Permodalan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.3.4.4',
                'index'            => 'Asuransi dan Jasa Keuangan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.3.4.5',
                'index'            => 'Pembiayaan dan Penjaminan Kredit',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.3.4.6',
                'index'            => 'Lembaga Pengelola Dana Bergulir (LPDB) Koperasi dan Usaha Kecil Menengah (UKM)',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.3.5',
                'index'            => 'Pemasaran dan Jaringan Usaha',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.3.5.1',
                'index'            => 'Perdagangan Dalam Negeri',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.3.5.2',
                'index'            => 'Ekspor dan Impor',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.3.5.3',
                'index'            => 'Prasarana dan Sarana Pemasaran',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.3.5.4',
                'index'            => 'Kemitraan dan Jaringan Usaha',
                'retensi_aktif'    => '2 Tahun Setelah Perjanjian, Kontrak, Kerja Sama Berakhir, dan Kewajiban Para Pihak Telah Ditunaikan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.3.5.5',
                'index'            => 'Informasi dan Publikasi Bisnis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.3.5.6',
                'index'            => 'Lembaga Layanan Pemasaran (LLP) Koperasi dan UKM',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.3.6',
                'index'            => 'Pengembangan Sumber Daya Manusia',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.3.6.1',
                'index'            => 'Pengembangan Kewirausahaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.3.6.2',
                'index'            => 'Kebijakan Pendidikan Koperasi dan UKM',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.3.6.3',
                'index'            => 'Peran Serta Masyarakat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.3.6.4',
                'index'            => 'Monitoring dan Evaluasi Diklat Koperasi dan UKM',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.3.6.5',
                'index'            => 'Advokasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.3.7',
                'index'            => 'Pengembangan dan Restrukturisasi Usaha',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.3.7.1',
                'index'            => 'Produktivitas dan Mutu',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.3.7.2',
                'index'            => 'Restrukturisasi Usaha',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.3.7.3',
                'index'            => 'Pemberdayaan Lembaga Pengembangan Bisnis (LPB)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.3.7.4',
                'index'            => 'Fasilitasi Investasi Unit Kecil, Menengah, dan Koperasi (UKMK)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.3.7.5',
                'index'            => 'Pengembangan Sistem Bisnis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.3.8',
                'index'            => 'Pengkajian Sumber Daya UKMK',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.3.8.1',
                'index'            => 'Penelitian Koperasi',
                'retensi_aktif'    => '2 Tahun Setelah Laporan Hasil Penelitian Dipublikasikan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.3.8.2',
                'index'            => 'Penelitian UKM',
                'retensi_aktif'    => '2 Tahun Setelah Laporan Hasil Penelitian Dipublikasikan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.3.8.3',
                'index'            => 'Penelitian Sumber Daya',
                'retensi_aktif'    => '2 Tahun Setelah Laporan Hasil Penelitian Dipublikasikan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.3.8.4',
                'index'            => 'Pengembangan Pengaderan UMK',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.3.9',
                'index'            => 'Kerja Sama Hubungan Antarlembaga',
                'retensi_aktif'    => '2 Tahun Setelah Perjanjian, Kontrak, Kerja Sama Berakhir, dan Kewajiban Para Pihak Telah Ditunaikan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.3.10',
                'index'            => 'Pedagang Kaki Lima (PKL)',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.3.10.1',
                'index'            => 'Peraturan Perundang-undangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.3.10.2',
                'index'            => 'Prasarana dan Sarana',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.3.11',
                'index'            => 'Monitoring dan Evaluasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],

            // Data 500.4 - KEHUTANAN
            [
                'kode_klasifikasi' => '500.4',
                'index'            => 'KEHUTANAN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.4.1',
                'index'            => 'Kebijakan di Bidang Kehutanan yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '3 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.2',
                'index'            => 'Penyuluhan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.4.2.1',
                'index'            => 'Program Kerja Penyuluhan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.2.2',
                'index'            => 'Materi Penyuluhan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.2.3',
                'index'            => 'Program Penyuluhan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.2.4',
                'index'            => 'Sarana Penyuluhan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.2.5',
                'index'            => 'Pengembangan Tenaga Penyuluhan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.2.6',
                'index'            => 'Pelaksanaan Penyuluhan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.2.7',
                'index'            => 'Pemberdayaan Masyarakat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.2.8',
                'index'            => 'Diseminasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.2.9',
                'index'            => 'Evaluasi dan Laporan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.3',
                'index'            => 'Planologi Kehutanan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.4.3.1',
                'index'            => 'Perencanaan Makro Kawasan Hutan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.3.2',
                'index'            => 'Penataan Ruang Kawasan Hutan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.3.3',
                'index'            => 'Statistik dan Jaringan Komunikasi Data Kehutanan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.3.4',
                'index'            => 'Pengukuhan dan Penataan Kawasan Hutan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.3.5',
                'index'            => 'Perubahan Fungsi dan Peruntukan Kawasan Hutan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.3.6',
                'index'            => 'Informasi dan Dokumentasi Kawasan Hutan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.3.7',
                'index'            => 'Inventarisasi Sumber Daya Hutan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.3.8',
                'index'            => 'Pemantauan Sumber Daya Hutan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.3.9',
                'index'            => 'Pemetaan Sumber Daya Hutan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.3.10',
                'index'            => 'Jaringan Data Spasial',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.3.11',
                'index'            => 'Penggunaan Kawasan Hutan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.3.12',
                'index'            => 'Penerimaan Negara Bukan Pajak (PNBP) Penggunaan Kawasan Hutan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.3.13',
                'index'            => 'Informasi Penggunaan Kawasan Hutan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.3.14',
                'index'            => 'Pembentukan Wilayah Pengelolaan Hutan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.3.15',
                'index'            => 'Penyiapan Areal Pemanfaatan Hutan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.3.16',
                'index'            => 'Informasi Wilayah Pengelolaan dan Pemanfaatan Kawasan Hutan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4',
                'index'            => 'Bina Usaha Kehutanan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.4.4.1',
                'index'            => 'Data Areal Hak Pengusahaan Hutan (HPH)/Hutan Tanaman Industri (HTI)/Izin Usaha Pemanfaatan Hasil Hutan Kayu) IUPHHK',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.2',
                'index'            => 'SK HPH/HTI/IUPHHK',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.3',
                'index'            => 'Kerja Sama',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.4',
                'index'            => 'Pembatalan/Penolakan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.5',
                'index'            => 'Perpanjangan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.6',
                'index'            => 'Modal dan Peralatan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.7',
                'index'            => 'Investasi Industri',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.8',
                'index'            => 'Peralatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.4.9',
                'index'            => 'Tenaga Kerja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.4.10',
                'index'            => 'Pemegang Saham',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.4.11',
                'index'            => 'Neraca Perusahaan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.12',
                'index'            => 'Rencana Karya Kesatuan Pengelolaan Hutan Produksi (KPHP)',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.13',
                'index'            => 'Rencana Karya Pengusahaan Hutan (RKPH)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.14',
                'index'            => 'Rencana Karya Tahunan Pengusahaan Hutan (RKT)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.15',
                'index'            => 'Rencana Karya Lima Tahun Pengusahaan Hutan (RKL)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.16',
                'index'            => 'Target Produksi RKT dan Beban Kerja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.4.17',
                'index'            => 'Produksi Kayu',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.4.18',
                'index'            => 'Produksi Nonkayu',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.4.19',
                'index'            => 'Industri Kayu HPH/HTI/IUPHHK',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.4.20',
                'index'            => 'Industri Kayu Non-HPH/HTI/IUPHHK',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.4.21',
                'index'            => 'Industri Nonkayu',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.22',
                'index'            => 'Hutan Tanaman Industri Pulp',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.23',
                'index'            => 'Hutan Tanaman Industri Pertukangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.24',
                'index'            => 'Pelanggaran dan Sanksi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.4.25',
                'index'            => 'Pemblokiran',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.4.26',
                'index'            => 'Denda',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.4.27',
                'index'            => 'Pencabutan Areal HPH/HTI/IUPHHK',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.28',
                'index'            => 'Pola Pemanfaatan Hutan Produksi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.29',
                'index'            => 'Penataan Pemanfaatan Hutan Produksi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.30',
                'index'            => 'Informasi Sumber Daya Hutan Produksi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.31',
                'index'            => 'Pengembangan Investasi Usaha',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.32',
                'index'            => 'Penyiapan Pemanfaatan Hutan Alam',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.33',
                'index'            => 'Rencana Kerja Pemanfaatan Hutan Alam/Rencana Kerja Usaha Produksi Hasil',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.34',
                'index'            => 'Produksi Hutan Alam',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.35',
                'index'            => 'Penilaian Kinerja Usaha Pemanfaatan Hutan Alam',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.36',
                'index'            => 'Pengembangan Hutan Tanaman Industri',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.37',
                'index'            => 'Pengembangan Hutan Tanaman Rakyat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.38',
                'index'            => 'Pengembangan Rencana Kerja dan Produksi Hutan Tanaman/Rencana Kerja Usaha Produksi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.39',
                'index'            => 'Penilaian Kinerja Pengembangan Usaha Pemanfaatan Hutan Tanaman',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.40',
                'index'            => 'Pembiayaan Hutan Tanaman',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.41',
                'index'            => 'Penerimaan Negara Bukan Pajak Hasil Hutan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.4.42',
                'index'            => 'Peredaran Hasil Hutan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.4.43',
                'index'            => 'Pengukuran dan Pengujian Hasil Hutan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.4.44',
                'index'            => 'Penertiban Peredaran Hasil Hutan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.4.45',
                'index'            => 'Pengolahan dan Pemasaran Hasil Hutan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.46',
                'index'            => 'Pengendalian Bahan Baku dan Industri Primer Hasil Hutan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.47',
                'index'            => 'Penilaian Kinerja Industri dan Pemasaran Hasil Hutan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.4.48',
                'index'            => 'Pembinaan HPH/HTI/IUPHHK',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.4.49',
                'index'            => 'Pembinaan TPTI/TPTJ/Silvikultur',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.5',
                'index'            => 'Standardisasi dan Lingkungan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.4.5.1',
                'index'            => 'Standardisasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.5.2',
                'index'            => 'Sarana Pengujian Hasil Hutan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.5.3',
                'index'            => 'Pengembangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.5.4',
                'index'            => 'Pemasaran Hasil Hutan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.5.5',
                'index'            => 'Pengendalian Lingkungan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.5.6',
                'index'            => 'Angkutan Hasil Hutan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.5.7',
                'index'            => 'Tanda Pengenal Perusahaan Tata Usaha Hasil Hutan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.5.8',
                'index'            => 'Legalitas Tata Usaha Hasil Hutan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.5.9',
                'index'            => 'Palu Tok Kualitas Tata Usaha Hasil Hutan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.5.10',
                'index'            => 'Pas Angkutan Hasil Hutan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.5.11',
                'index'            => 'Sertifikat Ekspor Hasil Hutan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.6',
                'index'            => 'Pelindungan Hutan dan Konservasi Alam',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.4.6.1',
                'index'            => 'Flora dan Fauna yang Dilindungi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.6.2',
                'index'            => 'Flora dan Fauna yang Tidak Dilindungi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.6.3',
                'index'            => 'Lembaga Konservasi/Kebun Binatang',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.6.4',
                'index'            => 'Konvensi Keanekaragaman Hayati',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.6.5',
                'index'            => 'Kawasan Konservasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.6.6',
                'index'            => 'Pengamanan Hutan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.6.7',
                'index'            => 'Program dan Evaluasi Penyidikan dan Pelindungan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.6.8',
                'index'            => 'Penyidikan dan Pelindungan Wilayah Hutan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.6.9',
                'index'            => 'Polisi Kehutanan dan Penyidik Pegawai Negeri Sipil (PPNS)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.6.10',
                'index'            => 'Pemanfaatan Jasa Lingkungan dan Wisata Alam',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.6.11',
                'index'            => 'Bina Cinta Alam',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.6.12',
                'index'            => 'Kader Konservasi Sumber Daya Alam',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.6.13',
                'index'            => 'Data Organisasi Pencinta Alam dan Kader Konservasi SDA',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.7',
                'index'            => 'Bina Pengelolaan Daerah Aliran Sungai dan Perhutanan Sosial',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.4.7.1',
                'index'            => 'Pengelolaan Benih',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.7.2',
                'index'            => 'Kebun Benih',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.7.3',
                'index'            => 'Tegakan Benih',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.7.4',
                'index'            => 'Pengadaan Benih',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.7.5',
                'index'            => 'Pengujian dan Penyimpanan Benih',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.7.6',
                'index'            => 'Lalu Lintas Angkutan Benih',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.4.7.7',
                'index'            => 'Pembibitan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.7.8',
                'index'            => 'Pengembangan Usaha Perbenihan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.7.9',
                'index'            => 'Pengendalian Peredaran Benih',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.7.10',
                'index'            => 'Rehabilitasi Hutan dan Lahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.7.11',
                'index'            => 'Tanaman Reboisasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.7.12',
                'index'            => 'Pengelolaan Daerah Aliran Sungai (DAS)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.7.13',
                'index'            => 'Perhutanan Sosial',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.7.14',
                'index'            => 'Pengendalian Perladangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.8',
                'index'            => 'Penelitian dan Pengembangan Kehutanan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.4.8.1',
                'index'            => 'Penelitian, Pengkajian, dan Pengembangan Kehutanan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.8.2',
                'index'            => 'Monitoring, dan, Evaluasi Penelitian',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.8.3',
                'index'            => 'Diseminasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.8.4',
                'index'            => 'Gelar Teknologi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.4.8.5',
                'index'            => 'Forum Komunikasi Penelitian dan Pengembangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],

            // Data 500.5 - KELAUTAN DAN PERIKANAN
            [
                'kode_klasifikasi' => '500.5',
                'index'            => 'KELAUTAN DAN PERIKANAN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.5.1',
                'index'            => 'Kebijakan di Bidang Kelautan dan Perikanan yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.2',
                'index'            => 'Perikanan Tangkap',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.5.2.1',
                'index'            => 'Data dan Statistik Perikanan Tangkap',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.2.2',
                'index'            => 'Rancang Bangun dan Kelaikan Kapal Perikanan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.2.3',
                'index'            => 'Rancang Bangun dan Kelaikan Alat Tangkap Ikan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.2.4',
                'index'            => 'Pendaftaran Kapal Perikanan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.2.5',
                'index'            => 'Pengawakan Kapal dan Ketenagakerjaan Perikanan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.2.6',
                'index'            => 'Perbantuan dan Evaluasi Kapal Perikanan dan Alat Penangkapan Ikan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.2.7',
                'index'            => 'Alokasi Usaha Penangkapan Ikan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.2.8',
                'index'            => 'Tata Pengusahaan Penangkapan Ikan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.2.9',
                'index'            => 'Verifikasi Dokumen Penangkapan Ikan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.2.10',
                'index'            => 'Pelayanan Dokumen Penangkapan Ikan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.2.11',
                'index'            => 'Pemantauan dan Evaluasi Pelayanan Usaha Penangkapan Ikan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.2.12',
                'index'            => 'Kelembagaan Usaha Penangkapan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.2.13',
                'index'            => 'Investasi dan Permodalan Usaha',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.2.14',
                'index'            => 'Kenelayanan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.2.15',
                'index'            => 'Pembinaan Pengelolaan Usaha',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.2.16',
                'index'            => 'Pemantauan dan Evaluasi Usaha Penangkapan Ikan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.3',
                'index'            => 'Perikanan Budi Daya',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.5.3.1',
                'index'            => 'Potensi Lahan dan Air',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.3.2',
                'index'            => 'Prasarana dan Sarana Budidaya Air Tawar',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.3.3',
                'index'            => 'Pengelolaan Induk Perbenihan Ikan Air Tawar',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.3.4',
                'index'            => 'Perbenihan Skala Kecil',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.3.5',
                'index'            => 'Informasi dan Distribusi Pembenihan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.3.6',
                'index'            => 'Budi Daya Air Tawar',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.3.7',
                'index'            => 'Budi Daya Ikan Hias',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.3.8',
                'index'            => 'Sertifikasi Budi Daya Perikanan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.3.9',
                'index'            => 'Data dan Statistik Perikanan Budi Daya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.3.10',
                'index'            => 'Hama dan Penyakit Ikan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.3.11',
                'index'            => 'Pelindungan Lingkungan Budi Daya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.3.12',
                'index'            => 'Investasi dan Permodalan Usaha Budi Daya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.3.13',
                'index'            => 'Kewirausahaan Budi Daya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.3.14',
                'index'            => 'Pelayanan Usaha Budi Daya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.3.15',
                'index'            => 'Kelembagaan dan Ketenagakerjaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.3.16',
                'index'            => 'Promosi Usaha dan Budaya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.4',
                'index'            => 'Pengolahan dan Pemasaran Hasil Perikanan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.5.4.1',
                'index'            => 'Standardisasi Pengolahan Hasil',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.4.2',
                'index'            => 'Pengembangan Produk',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.4.3',
                'index'            => 'Pengembangan Usaha Mikro, Kecil, dan Menengah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.4.4',
                'index'            => 'Industri Pengolahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.4.5',
                'index'            => 'Prasarana dan Sarana Pengolahan Hasil',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.4.6',
                'index'            => 'Standardisasi Pengembangan Produk Nonkonsumsi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.4.7',
                'index'            => 'Promosi dan Jaringan Ikan Hias',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.4.8',
                'index'            => 'Pengembangan Industri',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.4.9',
                'index'            => 'Prasarana dan Sarana Pengembangan Produk Nonkonsumsi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.4.10',
                'index'            => 'Kelembagaan Pemasaran Dalam Negeri',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.4.11',
                'index'            => 'Analisis dan Informasi Pasar Dalam Negeri',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.4.12',
                'index'            => 'Jaringan Distribusi dan Kemitraan Pemasaran Dalam Negeri',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.4.13',
                'index'            => 'Promosi dan Kerja Sama Pemasaran Dalam Negeri',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.4.14',
                'index'            => 'Prasarana dan Sarana Pemasaran Dalam Negeri',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.4.15',
                'index'            => 'Kelembagaan Pemasaran Luar Negeri',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.4.16',
                'index'            => 'Analisis dan Informasi Pemasaran Luar Negeri',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.4.17',
                'index'            => 'Pengembangan Ekspor',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.4.18',
                'index'            => 'Pengendalian Impor',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.4.19',
                'index'            => 'Promosi dan Kerja Sama Pemasaran Luar Negeri',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.4.20',
                'index'            => 'Pelayanan Usaha',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.4.21',
                'index'            => 'Kemitraan Usaha',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.4.22',
                'index'            => 'Ketenagakerjaan Pengolahan dan Pemasaran',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.4.23',
                'index'            => 'Investasi dan Permodalan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.4.24',
                'index'            => 'Informasi dan Promosi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.5',
                'index'            => 'Kelautan, Pesisir, dan Pulau-pulau Kecil',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.5.5.1',
                'index'            => 'Rencana Tata Ruang Laut Nasional dan Perairan Yurisdiksi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.5.2',
                'index'            => 'Rencana Tata Ruang dan Zona Wilayah I',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.5.3',
                'index'            => 'Rencana Tata Ruang dan Zona Wilayah II',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.5.4',
                'index'            => 'Informasi dan Evaluasi Spasial',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.5.5',
                'index'            => 'Jejaring, Data, dan Informasi Konservasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.5.6',
                'index'            => 'Konservasi Wawasan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.5.7',
                'index'            => 'Konservasi Jenis Ikan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.5.8',
                'index'            => 'Pemanfaatan Kawasan dan Jenis Ikan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.5.9',
                'index'            => 'Mitigasi Bencana Lingkungan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.5.10',
                'index'            => 'Pendayagunaan Sumber Daya Kelautan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.5.11',
                'index'            => 'Penanggulangan Pencemaran Sumber Daya Pesisir dan Laut',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.5.12',
                'index'            => 'Rehabilitasi dan Reklamasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.5.13',
                'index'            => 'Identifikasi Pulau-pulau Terkecil',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.5.14',
                'index'            => 'Pengelolaan Ekosistem Pulau-pulau Terkecil',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.5.15',
                'index'            => 'Investasi dan Promosi Pulau-pulau Terkecil',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.5.16',
                'index'            => 'Sarana dan Prasarana Pulau-pulau Terkecil',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.5.17',
                'index'            => 'Akses Permodalan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.5.18',
                'index'            => 'Akses Ilmu Pengetahuan dan Teknologi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.5.19',
                'index'            => 'Sosial Budaya Masyarakat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.5.20',
                'index'            => 'Pengembangan Usaha',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.6',
                'index'            => 'Pengawasan Sumber Daya Kelautan dan Perikanan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.5.6.1',
                'index'            => 'Pengawasan Penangkapan Wilayah Barat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.6.2',
                'index'            => 'Pengawasan Penangkapan Wilayah Timur',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.6.3',
                'index'            => 'Pengawasan Pengangkutan, Pengolahan, dan Pemasaran',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.6.4',
                'index'            => 'Pengawasan Usaha Budi Daya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.6.5',
                'index'            => 'Pengawasan Ekosistem Perairan dan Kawasan Konservasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.6.6',
                'index'            => 'Pengawasan Pencemaran Perairan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.6.7',
                'index'            => 'Pengawasan Pesisir dan Pulau-pulau Terkecil',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.6.8',
                'index'            => 'Pengawasan Jasa Kelautan dan Sumber Daya Nonhayati',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.6.9',
                'index'            => 'Logistik dan Operasional Wilayah Barat',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.6.10',
                'index'            => 'Logistik dan Operasional Wilayah Timur',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.6.11',
                'index'            => 'Perawatan Kapal Pengawas',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.6.12',
                'index'            => 'Pengawakan Kapal Pengawas',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.6.13',
                'index'            => 'Sistem Pemantauan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.6.14',
                'index'            => 'Pemantauan Pemanfaatan Sumber Daya Kelautan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.6.15',
                'index'            => 'Pemantauan Sumber Daya Perikanan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.6.16',
                'index'            => 'Pengembangan Infrastruktur Pengawasan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.6.17',
                'index'            => 'Penyidikan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.6.18',
                'index'            => 'Penanganan Barang Bukti dan Awak Kapal',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.6.19',
                'index'            => 'Kerja Sama Penegakan Hukum dan Fasilitas PPNS Perikanan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.6.20',
                'index'            => 'Pemantauan dan Evaluasi Penanganan Pelanggaran',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.7',
                'index'            => 'Karantina Ikan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.5.7.1',
                'index'            => 'Pemeriksaan Ikan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.7.2',
                'index'            => 'Penahanan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.7.3',
                'index'            => 'Pengasingan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.7.4',
                'index'            => 'Pengamatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.7.5',
                'index'            => 'Pengakuan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.7.6',
                'index'            => 'Penolakan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.7.7',
                'index'            => 'Pemusnahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.7.8',
                'index'            => 'Persyaratan Lalu Lintas Pemasukan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.7.9',
                'index'            => 'Persyaratan Lalu Lintas Pengeluaran',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.7.10',
                'index'            => 'Permohonan Sertifikat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.7.11',
                'index'            => 'Pemasukan Formulir',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.7.12',
                'index'            => 'Pemasukan Sertifikat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.7.13',
                'index'            => 'Monitoring dan Evaluasi Sertifikat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.7.14',
                'index'            => 'Surat Perintah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.7.15',
                'index'            => 'Rekomendasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.7.16',
                'index'            => 'Penutupan Suatu Area',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.5.7.17',
                'index'            => 'Pelanggaran Lalu Lintas Ikan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.7.18',
                'index'            => 'Pengawasan Peraturan Perkarantinaan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.7.19',
                'index'            => 'Pengawasan Pelaksanaan Operasional',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.7.20',
                'index'            => 'Instalasi Karantina Sementara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.5.7.21',
                'index'            => 'Lokasi Karantina',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],

            // Data 500.6 - PERTANIAN
            [
                'kode_klasifikasi' => '500.6',
                'index'            => 'PERTANIAN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.6.1',
                'index'            => 'Kebijakan di Bidang Pertanian yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.2',
                'index'            => 'Pelindungan Hortikultura',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.6.2.1',
                'index'            => 'Teknologi Pelindungan Tanaman Buah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.2.2',
                'index'            => 'Teknologi Pelindungan Tanaman Sayuran dan Tanaman Obat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.2.3',
                'index'            => 'Teknologi Pelindungan Tanaman Florikultura',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.2.4',
                'index'            => 'Dampak Iklim dan Persyaratan Teknis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.3',
                'index'            => 'Perbenihan Hortikultura',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.6.3.1',
                'index'            => 'Penilaian Varietas',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.3.2',
                'index'            => 'Pengawasan Mutu Benih',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.3.3',
                'index'            => 'Budi Daya dan Pascapanen Florikultura',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.4',
                'index'            => 'Perluasan dan Pengelolaan Lahan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.6.4.1',
                'index'            => 'Basis Data Lahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.4.2',
                'index'            => 'Pengendalian Lahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.4.3',
                'index'            => 'Optimasi, Rehabilitasi, dan Konservasi Lahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.4.4',
                'index'            => 'Perluasan Kawasan Tanaman Pangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.4.5',
                'index'            => 'Perluasan Kawasan Hortikultura, Perkebunan, dan Peternakan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.5',
                'index'            => 'Pengelolaan Air Irigasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.6.5.1',
                'index'            => 'Pengembangan Sumber Air',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.5.2',
                'index'            => 'Pengembangan Jaringan dan Optimasi Air',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.5.3',
                'index'            => 'Iklim, Konservasi Air, dan Lingkungan Hidup',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.5.4',
                'index'            => 'Kelembagaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.6',
                'index'            => 'Pembiayaan Pertanian',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.6.6.1',
                'index'            => 'Data Informasi Pembiayaan Program',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.6.2',
                'index'            => 'Pembiayaan Syariah dan Kerja Sama',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.6.3',
                'index'            => 'Pembiayaan Agribisnis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.6.4',
                'index'            => 'Kelembagaan dan Pemberdayaan Agribisnis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.7',
                'index'            => 'Pupuk Pestisida',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.6.7.1',
                'index'            => 'Pupuk Organik dan Pembenah Tanah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.7.2',
                'index'            => 'Pupuk Anorganik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.7.3',
                'index'            => 'Pestisida',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.7.4',
                'index'            => 'Pengawasan Pupuk dan Pestisida',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.8',
                'index'            => 'Alat dan Mesin Pertanian',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.6.8.1',
                'index'            => 'Pengembangan Alat dan Mesin Pertanian',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.8.2',
                'index'            => 'Pengawasan dan Peredaran Alat dan Mesin Pertanian',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.8.3',
                'index'            => 'Kelembagaan dan Pelayanan Alat dan Mesin Pertanian',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.9',
                'index'            => 'Perbenihan Tanaman Pangan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.6.9.1',
                'index'            => 'Penilaian Varietas dan Pengawasan Mutu Benih',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.9.2',
                'index'            => 'Produksi Benih Serealia',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.9.3',
                'index'            => 'Produksi Benih Aneka Kacang dan Umbi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.9.4',
                'index'            => 'Kelembagaan Benih',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.10',
                'index'            => 'Budi Daya Serealia',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.6.10.1',
                'index'            => 'Padi Irigasi dan Rawa',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.10.2',
                'index'            => 'Padi Tadah Hujan dan Lahan Kering',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.10.3',
                'index'            => 'Jagung',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.10.4',
                'index'            => 'Serealia Lain',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.11',
                'index'            => 'Budidaya Aneka Kacang dan Umbi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.6.11.1',
                'index'            => 'Kedelai',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.11.2',
                'index'            => 'Ubi Kayu',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.11.3',
                'index'            => 'Aneka Kacang',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.11.4',
                'index'            => 'Aneka Umbi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.12',
                'index'            => 'Tanaman Pangan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.6.12.1',
                'index'            => 'Pengelolaan Data Organisasi Pengganggu Tumbuhan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.12.2',
                'index'            => 'Dampak Perubahan Iklim',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.12.3',
                'index'            => 'Teknologi Pengendalian Organisme Pengganggu Tumbuhan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.12.4',
                'index'            => 'Pengelolaan Pengendalian Hama Terpadu',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.13',
                'index'            => 'Pascapanen Tanaman Pangan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.6.13.1',
                'index'            => 'Padi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.13.2',
                'index'            => 'Jagung dan Serealia alin',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.13.3',
                'index'            => 'Kedelai dan Aneka Kacang',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.13.4',
                'index'            => 'Aneka Umbi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.14',
                'index'            => 'Pengolahan Hasil Pertanian',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.6.14.1',
                'index'            => 'Tanaman Pangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.14.2',
                'index'            => 'Hortikultura',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.14.3',
                'index'            => 'Perkebunan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.14.4',
                'index'            => 'Peternakan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.15',
                'index'            => 'Mutu dan Standardisasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.6.15.1',
                'index'            => 'Standardisasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.15.2',
                'index'            => 'Penerapan dan Pengawasan Jaminan Mutu',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.15.3',
                'index'            => 'Akreditasi dan Kelembagaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.15.4',
                'index'            => 'Kerja Sama dan Harmonisasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.16',
                'index'            => 'Pengembangan Usaha dan Investasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.6.16.1',
                'index'            => 'Kemitraan dan Kewirausahaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.16.2',
                'index'            => 'Investasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.16.3',
                'index'            => 'Promosi Dalam Negeri',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.16.4',
                'index'            => 'Promosi Luar Negeri',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.17',
                'index'            => 'Pemasaran Domestik',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.6.17.1',
                'index'            => 'Informasi Pasar',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.17.2',
                'index'            => 'Pemantauan Pasar dan Stabilisasi Harga',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.17.3',
                'index'            => 'Sarana dan Kelembagaan Pasar',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.17.4',
                'index'            => 'Jaringan Pemasaran',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.18',
                'index'            => 'Administrasi Penelitian, Pengkajian, dan Pengembangan, antara lain: Rencana Kerja, Term of Reference (TOR)/Proposal, Pembentukan Tim Kerja, dan Surat-menyurat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.19',
                'index'            => 'Hasil Penelitian, Pengkajian, dan Pengembangan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.6.19.1',
                'index'            => 'Hasil Penelitian dan Pengembangan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.19.2',
                'index'            => 'Hasil Pengkajian dan Kebijakan dan Strategi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.20',
                'index'            => 'Diseminasi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.21',
                'index'            => 'Publikasi Hasil Penelitian/Pengkajian',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.6.21.1',
                'index'            => 'Pameran, Temu Lapang, Temu Bisnis, Demonstration Plot, Seminar Lokakarya, Temu Karya, Workshop',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.21.2',
                'index'            => 'Jurnal, Buletin, Monograf, Prosiding, dan Publikasi Lainnya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.22',
                'index'            => 'Bimbingan Teknis Penelitian, Pengkajian, dan Pengembangan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.23',
                'index'            => 'Forum Komunikasi Penelitian dan Pengembangan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.24',
                'index'            => 'Data Penelitian dan Pengembangan',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '8 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.25',
                'index'            => 'Evaluasi Penelitian/Pengkajian dan Pengembangan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.26',
                'index'            => 'Hak atas Kekayaan Intelektual (HKI)',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.6.26.1',
                'index'            => 'Hak Cipta',
                'retensi_aktif'    => '2 Tahun Setelah Perizinan Masa Berlakunya Habis',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.26.2',
                'index'            => 'Hak Paten Sederhana',
                'retensi_aktif'    => '2 Tahun Setelah Perizinan Masa Berlakunya Habis',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.26.3',
                'index'            => 'Hak Paten Biasa',
                'retensi_aktif'    => '2 Tahun Setelah Perizinan Masa Berlakunya Habis',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.26.4',
                'index'            => 'Hak Merek',
                'retensi_aktif'    => '2 Tahun Setelah Perizinan Masa Berlakunya Habis',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.26.5',
                'index'            => 'Pendaftaran Varietas Tanaman',
                'retensi_aktif'    => '1 Tahun Setelah Perizinan Masa Berlakunya Habis',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.26.6',
                'index'            => 'Permohonan Hak Pelindungan Varietas Tanaman Tahunan (PVTT), Tanaman Semusim dan Tahunan',
                'retensi_aktif'    => '2 Tahun Setelah Perizinan Masa Berlakunya Habis',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.26.7',
                'index'            => 'Permohonan HKI yang Ditolak',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.27',
                'index'            => 'Pelayanan Perizinan Pertanian',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.6.27.1',
                'index'            => 'Sarana I (Bidang Pupuk, Pestisida, Alat, dan Mesin Pertanian)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.27.2',
                'index'            => 'Sarana II (Bidang Benih Tanaman, Bahan Penelitian, Teknis Pangan Segar Asal Tumbuhan, Teknis Pengalihan Saham Perkebunan)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.27.3',
                'index'            => 'Sarana III (Bidang Bibit, Karkas, Daging, dan Jeroan, Pakan Ternak, Obat Hewan, dan Teknis Sumber Daya Genetik Ternak)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.28',
                'index'            => 'Pelayanan Hukum',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.6.28.1',
                'index'            => 'Sertifikasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '8 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.28.2',
                'index'            => 'Pertimbangan Hukum',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.29',
                'index'            => 'Karantina Pertanian',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.6.29.1',
                'index'            => 'Karantina Tumbuhan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.29.2',
                'index'            => 'Karantina Hewan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.6.30',
                'index'            => 'Bimbingan Teknis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.6.31',
                'index'            => 'Evaluasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],

            // Data 500.7 - PETERNAKAN
            [
                'kode_klasifikasi' => '500.7',
                'index'            => 'PETERNAKAN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.7.1',
                'index'            => 'Kebijakan di Bidang Peternakan yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.7.2',
                'index'            => 'Peternakan dan Kesehatan Hewan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.7.2.1',
                'index'            => 'Perbibitan Ternak, antara lain: Produksi Bibit Ternak Ruminansia, Produksi Bibit Ternak Nonruminansia, Penilaian dan Pelepasan Bibit Ternak , Pengembangan Bibit Ternak, Surat Rekomendasi dan Persetujuan Pemasukan/Pengeluaran',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.7.2.2',
                'index'            => 'Pakan Ternak',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.7.2.3',
                'index'            => 'Budi Daya Ternak',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.7.2.4',
                'index'            => 'Kesehatan Hewan, antara lain: Pengamatan Penyakit Hewan, Pencegahan dan Pemberantasan Penyakit Hewan, Pelindungan Hewan, Kelembagaan dan Sumber Daya Kesehatan Hewan, Pengawasan Obat Hewan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.7.2.5',
                'index'            => 'Kesehatan Masyarakat Veteriner dan Pascapanen, antara lain: Pascapanen , Higiene Sanitasi, Pengawasan Sanitasi dan Keamanan Produk Hewan, Zoonosis dan Kesejahteraan Hewan, Pengujian dan Sertifikasi Produk Hewan, Surat Rekomendasi dan Persetujuan Pemasukan/Pengeluaran',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.7.3',
                'index'            => 'Bimbingan Teknis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.7.4',
                'index'            => 'Evaluasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],

            // Data 500.8 - PERKEBUNAN
            [
                'kode_klasifikasi' => '500.8',
                'index'            => 'PERKEBUNAN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.8.1',
                'index'            => 'Kebijakan di Bidang Perkebunan yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '3 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.8.2',
                'index'            => 'Tanaman Semusim',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.8.2.1',
                'index'            => 'Identifikasi dan Pendayagunaan Sumber Daya Tanaman Semusim',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.8.2.2',
                'index'            => 'Perbenihan Tanaman Semusim',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.8.2.3',
                'index'            => 'Budi Daya Teknologi Budi Daya Tanaman Semusim',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.8.2.4',
                'index'            => 'Pemberdayaan Tanaman Semusim',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.8.3',
                'index'            => 'Tanaman Rempah dan Penyegar',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.8.3.1',
                'index'            => 'Identifikasi dan Pendayagunaan Sumber Daya Tanaman Rempah dan Penyegar',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.8.3.2',
                'index'            => 'Perbenihan Tanaman Rempah dan Penyegar',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.8.3.3',
                'index'            => 'Budi Daya Tanaman Rempah dan Penyegar',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.8.3.4',
                'index'            => 'Pemberdayaan dan Kelembagaan Tanaman Rempah dan Penyegar',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.8.4',
                'index'            => 'Tanaman Tahunan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.8.4.1',
                'index'            => 'Identifikasi dan Pendayagunaan Sumber Daya, Tanaman Tahunan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.8.4.2',
                'index'            => 'Perbenihan Tanaman Tahunan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.8.4.3',
                'index'            => 'Budi Daya Tanaman Tahunan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.8.4.4',
                'index'            => 'Pemberdayaan dan Kelembagaan Tanaman Tahunan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.8.5',
                'index'            => 'Pelindungan Perkebunan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.8.5.1',
                'index'            => 'Identifikasi dan Pengendalian Organisme Pengganggu Tumbuhan Tanaman Semusim, Pelindungan Perkebunan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.8.5.2',
                'index'            => 'Identifikasi dan Pengendalian Organisme Pengganggu Tumbuhan Tanaman Rempah dan Penyegar',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.8.5.3',
                'index'            => 'Identifikasi dan Pengendalian Organisme Pengganggu Tumbuhan Tanaman Tahunan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.8.5.4',
                'index'            => 'Dampak Perubahan Iklim dan Pencegahan Kebakaran',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.8.6',
                'index'            => 'Pascapanen dan Pembinaan Usaha',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.8.6.1',
                'index'            => 'Pascapanen Tanaman Semusim, Rempah dan Penyegar',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.8.6.2',
                'index'            => 'Pascapanen Tanaman Tahunan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.8.6.3',
                'index'            => 'Bimbingan Usaha dan Perkebunan Berkelanjutan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.8.6.4',
                'index'            => 'Gangguan Usaha dan Penanganan Konflik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.8.7',
                'index'            => 'Bimbingan Teknis Perkebunan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.8.8',
                'index'            => 'Evaluasi Perkebunan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],

            // Data 500.9 - PERINDUSTRIAN
            [
                'kode_klasifikasi' => '500.9',
                'index'            => 'PERINDUSTRIAN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.9.1',
                'index'            => 'Kebijakan di Bidang Perindustrian yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.9.2',
                'index'            => 'Iklim Usaha dan Kerja Sama',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.9.2.1',
                'index'            => 'Industri Manufaktur',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.9.2.2',
                'index'            => 'Industri Agro',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.9.2.3',
                'index'            => 'Industri Unggulan Berbasis Teknologi Tinggi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.9.2.4',
                'index'            => 'Industri Kecil dan Menengah',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.9.3',
                'index'            => 'Promosi Industri',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.9.3.1',
                'index'            => 'Industri Manufaktur',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.9.3.2',
                'index'            => 'Promosi Industri Agro',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.9.3.3',
                'index'            => 'Industri Unggulan Berbasis Teknologi Tinggi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.9.3.4',
                'index'            => 'Industri Kecil dan Menengah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.9.4',
                'index'            => 'Standardisasi dan Teknologi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.9.4.1',
                'index'            => 'Industri Manufaktur',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.9.4.2',
                'index'            => 'Industri Agro',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.9.4.3',
                'index'            => 'Industri Unggulan Berbasis Teknologi Tinggi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.9.4.4',
                'index'            => 'Industri Kecil dan Menengah',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.9.5',
                'index'            => 'Hak atas Kekayaan Intelektual',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.9.5.1',
                'index'            => 'Industri Manufaktur',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.9.5.2',
                'index'            => 'Industri Agro',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.9.5.3',
                'index'            => 'Industri Unggulan Berbasis Teknologi Tinggi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.9.5.4',
                'index'            => 'Industri Kecil dan Menengah',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.9.6',
                'index'            => 'Industri Hijau',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.9.6.1',
                'index'            => 'Industri Manufaktur',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.9.6.2',
                'index'            => 'Industri Agro',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.9.6.3',
                'index'            => 'Industri Unggulan Berbasis Teknologi Tinggi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.9.6.4',
                'index'            => 'Industri Kecil dan Menengah',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.9.7',
                'index'            => 'Analisis Kerja Sama Industri Unggulan Kabupaten/Kota',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.9.8',
                'index'            => 'Monitoring dan Evaluasi Kompetensi Inti Industri (Provinsi dan Kabupaten/Kota)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.9.9',
                'index'            => 'Pengembangan Infrastruktur Pendukung Pengembangan Kawasan Industri',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.9.10',
                'index'            => 'Fasilitasi Pengembangan Kawasan Industri',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.9.11',
                'index'            => 'Kerja Sama Ketahanan Industri Internasional',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.9.12',
                'index'            => 'Standardisasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.9.12.1',
                'index'            => 'Standar (Standar Industri Manufaktur dan Standar Industri Agro dan Teknologi Tinggi )',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.9.12.2',
                'index'            => 'Penyiapan Penerapan (Penyiapan Penerapan Standar dan Kerja sama Standardisasi)',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.9.12.3',
                'index'            => 'Infrastruktur Standar (Pengembangan Infrastruktur Standar dan Pengawasan Lembaga Penilaian Kesesuaian)',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.9.13',
                'index'            => 'Pengkajian Kebijakan dan Iklim Usaha Industri',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.9.13.1',
                'index'            => 'Kebijakan Industri',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.9.13.2',
                'index'            => 'Perpajakan dan Tarif',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.9.13.3',
                'index'            => 'Pengembangan Model Industrial',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.9.14',
                'index'            => 'Pengkajian Industri Hijau dan Lingkungan Hidup',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.9.14.1',
                'index'            => 'Industri Hijau',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.9.14.2',
                'index'            => 'Lingkungan Hidup',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.9.14.3',
                'index'            => 'Energi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.9.15',
                'index'            => 'Teknologi dan Hak Kekayaan Intelektual',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.9.15.1',
                'index'            => 'Pengkajian dan Penerapan Kebijakan Teknologi Industri',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.9.15.2',
                'index'            => 'Pengkajian dan Penerapan Inovasi Teknologi Industri',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.9.15.3',
                'index'            => 'Pengembangan Hak Kekayaan Intelektual',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.9.16',
                'index'            => 'Monitoring dan Evaluasi Kompetensi Industri',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],

            // Data 500.10 - ENERGI DAN SUMBER DAYA MINERAL
            [
                'kode_klasifikasi' => '500.10',
                'index'            => 'ENERGI DAN SUMBER DAYA MINERAL',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.1',
                'index'            => 'Kebijakan di Bidang Energi dan Sumber Daya Mineral yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.2',
                'index'            => 'Rekomendasi Kegeologian',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.2.1',
                'index'            => 'Mitigasi Gunung Api, Gempa Bumi, Tsunami, dan Gerakan Tanah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.2.2',
                'index'            => 'Air Tanah dan Geologi Tata Lingkungan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.2.3',
                'index'            => 'Pertambangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.2.4',
                'index'            => 'Panas Bumi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.2.5',
                'index'            => 'Geosains',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.2.6',
                'index'            => 'Pengukuran Time Domain Electromagnetic (TDEM)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.2.7',
                'index'            => 'Kelayakan Lingkungan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.3',
                'index'            => 'Penelitian Kegeologian',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.3.1',
                'index'            => 'Administrasi Pelaksanaan Penelitian',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.3.2',
                'index'            => 'Administrasi Tenaga Penelitian',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.3.3',
                'index'            => 'Administrasi Penggunaan Peralatan Penelitian',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.3.4',
                'index'            => 'Log-Book Peralatan Survei/Peralatan Uji/Kalibrasi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.3.5',
                'index'            => 'Hasil Penelitian dan Penyelidikan Kegeologian',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.3.6',
                'index'            => 'Sumber Daya Geologi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.3.7',
                'index'            => 'Air Tanah dan Geologi Tata Lingkungan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.3.8',
                'index'            => 'Vulkanologi dan Mitigasi Bencana Geologi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.3.9',
                'index'            => 'Survei Geologi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.4',
                'index'            => 'Inventarisasi dan Evaluasi Kegeologian',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.4.1',
                'index'            => 'Sumber Daya Geologi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.4.2',
                'index'            => 'Vulkanologi dan Mitigasi Bencana Geologi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.4.3',
                'index'            => 'Air Tanah dan Geologi Tata Lingkungan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.4.4',
                'index'            => 'Survei Geologi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.4.5',
                'index'            => 'Konservasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.5',
                'index'            => 'Administrasi Pelayanan Kegeologian dan Penyajian Data dan Informasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.5.1',
                'index'            => 'Peta Potensi dan Sebaran',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.5.2',
                'index'            => 'Air Tanah dan Geologi Tata Lingkungan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.5.3',
                'index'            => 'Mitigasi Bencana Gunung Api, Gerakan Tanah, Gempa Bumi dan Tsunami, Semburan Lumpur/Gas, serta Kebakaran Batu Bara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.5.4',
                'index'            => 'Survei Geologi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.6',
                'index'            => 'Pembinaan Program Minyak dan Gas Bumi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.6.1',
                'index'            => 'Rencana Induk Jaringan Gas Bumi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.6.2',
                'index'            => 'Rencana dan Realisasi Investasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.6.3',
                'index'            => 'Penetapan Harga Minyak Mentah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.6.4',
                'index'            => 'Penetapan Bagi Hasil Penerimaan Negara Bukan Pajak (PNBP) Minyak dan Gas Bumi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.6.5',
                'index'            => 'Pelaksanaan Pemeriksaan dan Pengujian PNBP',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.6.6',
                'index'            => 'Verifikasi Tingkat Komponen Dalam Negeri (TKDN)',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.6.7',
                'index'            => 'Rekomendasi Kemampuan Produksi Barang dan Jasa Dalam Negeri',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.6.8',
                'index'            => 'Rencana Kebutuhan Impor Barang (RKIB) dan Rencana Impor Barang (RIB)',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.7',
                'index'            => 'Pembinaan Usaha Hulu Minyak dan Gas Bumi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.7.1',
                'index'            => 'Penyiapan dan Penawaran Wilayah Kerja (WK) Minyak dan Gas Bumi (Konvensional dan Nonkonvensional)',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.7.2',
                'index'            => 'Eksplorasi Minyak dan Gas Bumi (antara lain: Pemanfaatan Data Migas untuk Presentasi Makalah, Publikasi Makalah, Pembukaan Data, Izin Pengiriman Data ke Luar Negeri, Izin Pengiriman Data ke Luar Negeri, Unitisasi Lapangan Minyak dan Gas Bumi, Rekomendasi Pengalihan Interest, Rekomendasi Penyisihan Wilayah Kerja Minyak dan Gas Bumi, Penyiapan Dokumen Pengakhiran Kontrak, Laporan Data Survei Seismik, Laporan Data Pemboran Sumur Eksplorasi per Semester, Laporan Data Pemboran Sumur Eksplorasi Tahunan)',
                'retensi_aktif'    => '5 Tahun',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.7.3',
                'index'            => 'Eksploitasi Minyak dan Gas Bumi (antara lain: Rekomendasi Penggunaan Data Eksploitasi (Publikasi Makalah, Analisis Laboratorium, Reprocessing), Penetapan Pengusahaan Minyak Bumi dari Sumur Tua, Penetapan Pengusahaan Lapangan Produksi yang Dikembalikan kepada Pemerintah, Buku Cadangan Minyak dan Gas Bumi, Data Cadangan Strategis/Penyangga Minyak dan Gas Bumi, Laporan Hasil Pemantauan Data Produksi Minyak dan Gas Bumi, Laporan Hasil Inventarisasi Mutu Minyak dan Gas Bumi',
                'retensi_aktif'    => '5 Tahun',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.7.4',
                'index'            => 'Pengembangan Lapangan Minyak dan Gas Bumi (POD)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.7.5',
                'index'            => 'Perpanjangan Kontrak KKS',
                'retensi_aktif'    => '2 Tahun Setelah Masa Perpanjangan Kontrak Selesai',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.7.6',
                'index'            => 'Penetapan Alokasi dan Harga Gas',
                'retensi_aktif'    => '2 Tahun Setelah Penetapan Harga Gas yang Baru',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.7.7',
                'index'            => 'Partisipasi Interest',
                'retensi_aktif'    => '2 Tahun Setelah Penetapan Harga Gas yang baru',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.7.8',
                'index'            => 'Tumpang Tindih Lahan',
                'retensi_aktif'    => '2 Tahun Setelah Disetujui',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.8',
                'index'            => 'Pembinaan Usaha Hilir Minyak dan Gas Bumi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.8.1',
                'index'            => 'Perumusan Pedoman, Prosedur, Layanan, serta Pengawasan Usaha Pengolahan, Pengangkutan, Penyimpanan, dan Niaga Minyak Bumi dan Gas Bumi, Hasil Olahan dan Bahan Bakar Lain, antara lain: Pedoman dan Prosedur, Layanan Usaha (Izin/Rekomendasi/Penandasahan), Pengawasan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.8.2',
                'index'            => 'Fasilitasi dan Pertimbangan Pelanggaran',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.8.3',
                'index'            => 'Penetapan Harga dan Subsidi Bahan Bakar yang Ditetapkan dengan Keputusan Menteri',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.9',
                'index'            => 'Teknik dan Lingkungan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.9.1',
                'index'            => 'Perumusan Pelaksanaan dan Pengawasan Standar Nasional Indonesia (SNI)/Standar Kompetensi Kerja Nasional Indonesia (SKKNI)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.9.2',
                'index'            => 'Registrasi Nomor Pelumas Terdaftar (NPT), antara lain: Berkas Permohonan, Berita Acara Hasil Evaluasi, Salinan Sertifikat NPT, Register NPT',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.9.3',
                'index'            => 'Buku Register Welding Procedure Specification (WPS)/Procedure Qualification Record (PQR)',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.9.4',
                'index'            => 'Register dan Sertifikat Kualifikasi Juru Las',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.9.5',
                'index'            => 'Keselamatan Hulu Minyak dan Gas Bumi, antara lain: Pemeriksaan Teknis dan Pengujian Instalasi dan Peralatan, Pemeriksaan Kalibrasi Teknis, Pengawasan Keselamatan Operasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.9.6',
                'index'            => 'Keselamatan Hilir Minyak dan Gas Bumi, antara lain: Pemeriksaan Teknis dan Pengujian Instalasi dan Peralatan, Pemeriksaan Kalibrasi Teknis, Pengawasan Keselamatan Operasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.9.7',
                'index'            => 'Keselamatan Kerja dan Lindungan Lingkungan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.9.8',
                'index'            => 'Dokumen Persetujuan Penunjukan Kepala/Wakil Kepala Teknik Tambang Hulu dan Hilir, antara lain: Dokumen Permohonan Pengajuan Persetujuan Penunjukan Calon Kepala/Wakil Kepala Teknik Tambang Minyak dan Gas Bumi, Surat Undangan Presentasi, Makalah Presentasi, Surat Persetujuan/Pengesahan Penunjukan Kepala/Wakil Kepala Teknik Tambang Minyak dan Gas Bumi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.9.9',
                'index'            => 'Penghargaan Keselamatan Kerja, antara lain: Surat Permohonan Mendapatkan Penghargaan, Surat Penugasan Dalam Rangka Verifikasi, Berkas Hasil Evaluasi Verifikasi, Salinan Tanda Penghargaan, Dokumen Pengajuan dan Penilaian Tanda Penghargaan Keselamatan Minyak dan Gas Bumi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.9.10',
                'index'            => 'Usaha Penunjang',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.10',
                'index'            => 'Infrastruktur Minyak dan Gas Bumi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.10.1',
                'index'            => 'Perencanaan Program Kerja Pembangunan Infrastruktur Minyak dan Gas Bumi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.10.2',
                'index'            => 'Pengadaan Pembangunan Infrastruktur Minyak dan Gas Bumi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.10.3',
                'index'            => 'Pelaksanaan Pembangunan Infrastruktur Minyak dan Gas Bumi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.10.4',
                'index'            => 'Pengawasan dan Evaluasi Pembangunan Infrastruktur Minyak dan Gas Bumi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.11',
                'index'            => 'Penyiapan Program Energi Baru Terbarukan dan Konservasi Energi (EBTKE)',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.11.1',
                'index'            => 'Usulan Wilayah Kerja Panas Bumi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.11.2',
                'index'            => 'Usul Program Aneka Energi Pemerintah Daerah dan Lembaga',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.11.3',
                'index'            => 'Penyiapan Program Pemanfaatan Energi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.11.4',
                'index'            => 'Proyeksi Kebutuhan Energi dari EBT',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.11.5',
                'index'            => 'Perencanaan Pemanfaatan Energi dari EBT',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.11.6',
                'index'            => 'Penyusunan Neraca Energi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.11.7',
                'index'            => 'Road Map di Bidang EBT',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.12',
                'index'            => 'Panas Bumi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.12.1',
                'index'            => 'Penerbitan Surat Keterangan Terdaftar (SKT)',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.12.2',
                'index'            => 'Sertifikasi Kelayakan Penggunaan Instalasi (SKPI)',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.12.3',
                'index'            => 'Sertifikasi Kelayakan Penggunaan Peralatan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.12.4',
                'index'            => 'Rekomendasi Bahan Peledak',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.12.5',
                'index'            => 'Perizinan Penggunaan Gudang Bahan Peledak',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.12.6',
                'index'            => 'Izin Tangki Bahan Bakar Cair',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.12.7',
                'index'            => 'Persetujuan Sertifikasi Welding Prosedure Specification (WPS) dan Procedure Qualification Record (PQR) dan Kualifikasi Juru Las',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.12.8',
                'index'            => 'Penerbitan Izin Usaha Panas Bumi (IUP)',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.12.9',
                'index'            => 'Penerbitan Izin Panas Bumi (IPB)',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.12.10',
                'index'            => 'Penerbitan Izin Pemanfaatan Langsung (IPL)',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.12.11',
                'index'            => 'Penetapan Kapasitas Usaha Panas Bumi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.12.12',
                'index'            => 'Penetapan kapasitas Pembangkit Listrik Tenaga Panas Bumi (PLTP)',
                'retensi_aktif'    => '3 Tahun Setelah Lelang WKP Selesai',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.12.13',
                'index'            => 'Pengawasan Eksplorasi dan Eksploitasi Panas Bumi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.12.14',
                'index'            => 'Pelaksanaan Kerja Sama Panas Bumi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.12.15',
                'index'            => 'Inventarisasi, Verifikasi, dan Evaluasi Objek Vital Nasional (Obvitnas) Bidang Panas Bumi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.12.16',
                'index'            => 'Monitoring Pelaksanaan Program Pengembangan dan Pemberdayaan Masyarakat (PPM) pada Kegiatan Pengusahaan Panas Bumi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.12.17',
                'index'            => 'Pembinaan dan Pengawasan Investasi Panas Bumi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.13',
                'index'            => 'Bioenergi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.13.1',
                'index'            => 'Penerbitan Izin Usaha Niaga Bahan Bakar Nabati (BNN)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.13.2',
                'index'            => 'Pengadaan Bahan Bakar Nabati (BBN)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.13.3',
                'index'            => 'Penerbitan Rekomendasi Ekspor-Impor',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.13.4',
                'index'            => 'Penetapan Indeks Harga Pasar BBN (HIP BBN)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.13.5',
                'index'            => 'Evaluasi/Revisi HIP BBN',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.13.6',
                'index'            => 'Database Pengusahaan Bioenergi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.13.7',
                'index'            => 'Penetapan Badan Usaha sebagai Pengelola Energi Biomassa atau Biogas untuk Pembangkit Listrik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.13.8',
                'index'            => 'Penetapan Spesifikasi Bahan Bakar Nabati',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.13.9',
                'index'            => 'Usul Program Bioenergi Pemerintah Daerah dan Lembaga',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.14',
                'index'            => 'Aneka Energi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.14.1',
                'index'            => 'Penerbitan Izin Usaha Aneka Energi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.14.2',
                'index'            => 'Penetapan Kapasitas Usaha',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.14.3',
                'index'            => 'Rekomendasi Kompetensi dan Rencana Penggunaan Tenaga Kerja Asing',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.14.4',
                'index'            => 'Rekomendasi Persetujuan Perubahan Pemegang Saham',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.14.5',
                'index'            => 'Persetujuan Rencana Impor Barang (RIB)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.15',
                'index'            => 'Konservasi Energi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.15.1',
                'index'            => 'Audit Energi melalui Program Kemitraan Konservasi Energi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.15.2',
                'index'            => 'Monitoring Implementasi Hasil Audit Energi melalui Program Kemitraan Konservasi Energi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.15.3',
                'index'            => 'Pembinaan dan Pengawasan Pelaksanaan Manajemen Energi di Pengguna Energi di atas 6.000 TOE',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.15.4',
                'index'            => 'Pengawasan Sertifikasi Label dan Tanda Hemat Energi pada Lampu Swabalast',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.15.5',
                'index'            => 'Penyusunan Daftar Peralatan/Teknologi Efisiensi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.15.6',
                'index'            => 'Penyusunan Emisi Energi Gas Rumah Kaca',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.15.7',
                'index'            => 'Pemberian Insentif dan Disinsentif Konservasi Energi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.15.8',
                'index'            => 'Profil Investasi Efisiensi Energi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.15.9',
                'index'            => 'Investment Grade Audit (IGA)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.15.10',
                'index'            => 'Bimbingan Teknis Bidang EBTKE',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.16',
                'index'            => 'Perencanaan dan Pembangunan Infrastruktur EBTKE',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.16.1',
                'index'            => 'Usul Pembangunan Infrastruktur Pemerintah Daerah dan Lembaga',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.16.2',
                'index'            => 'Perencanaan Pembangunan Infrastruktur Minyak dan Gas Bumi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.16.3',
                'index'            => 'Pelaksanaan Pembangunan Infrastruktur Bidang EBTKE',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.16.4',
                'index'            => 'Evaluasi Program Kerja',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.17',
                'index'            => 'Bina Program Tenaga Listrik',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.17.1',
                'index'            => 'Investasi dan Pendanaan Tenaga Listrik, antara lain: Dokumen Grant/Hibah/Loan Agreement Luar Negeri, Monitoring Loan Pembangunan Infrastruktur Penyediaan Tenaga Listrik, Laporan Penanganan Permasalahan Infrastruktur Penyediaan Tenaga Listrik, Laporan Kegiatan Investasi, dan Pendanaan Tenaga Listrik',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.17.2',
                'index'            => 'Pengembangan Listrik Perdesaan, antara lain: Data Program Listrik Perdesaan, Data Rasio Elektrifikasi (RE) dan Rasio Desa Berlistrik (RD), Monitoring dan Evaluasi Listrik Perdesaan, Listrik untuk Masyarakat Tidak Mampu',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.17.3',
                'index'            => 'Data dan Informasi Ketenagalistrikan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.18',
                'index'            => 'Bina Usaha Ketenagalistrikan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.18.1',
                'index'            => 'Penyiapan Usaha Ketenagalistrikan, antara lain: Pelayanan Izin Usaha Penyediaan Tenaga Listrik ([Izin Operasi (IO), Izin Usaha Penyediaan Tenaga Listrik Sementara (IUPL-S), dan (Izin Usaha Penyediaan Tenaga Listrik (IUPL)], Bimbingan Usaha Ketenagalistrikan, Data Laporan Berkala Pemegang Izin',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.18.2',
                'index'            => 'Harga dan Subsidi Listrik',
                'retensi_aktif'    => '5 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.18.3',
                'index'            => 'Hubungan Komersial Tenaga Listrik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.18.4',
                'index'            => 'Pelindungan Konsumen Listrik, antara lain: Penanganan Pengaduan Konsumen Listrik, Dokumen Pengawasan Tingkat Mutu Pelayanan Tenaga Listrik, Dokumen Evaluasi Realisasi Tingkat Mutu Pelayanan Tenaga Listrik, Dokumen Evaluasi Pemberian Kompensasi Penalti Tingkat Mutu Pelayanan PT PLN (Persero)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.19',
                'index'            => 'Teknik dan Lingkungan Ketenagalistrikan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.19.1',
                'index'            => 'Kelaikan Teknik dan Keselamatan Ketenagalistrikan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.19.2',
                'index'            => 'Penyiapan Kompetensi dan Pengawasan Tenaga Teknik Ketenagalistrikan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.19.3',
                'index'            => 'Usaha Penunjang Ketenagalistrikan, antara lain: Dokumen Izin Usaha Jasa Penunjang Tenaga Listrik (IUJPTL), Dokumen Izin Pemanfaatan Jaringan Tenaga Listrik untuk Kepentingan Telematika (IPJ Telematika), Dokumen Penandasahan Rencana Impor Barang (RIB)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.19.4',
                'index'            => 'Pelindungan Lingkungan Ketenagalistrikan, antara lain: Dokumen Forum Keselamatan Instalasi Pemanfaatan Tenaga Listrik, Dokumen Pelaksanaan Pengelolaan Lingkungan Hidup Sektor Ketenagalistrikan, Laporan Pembinaan dan Pengawasan Lingkungan, Dokumen Perhitungan Faktor Emisi Clean Development Mechansim (CDM)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.20',
                'index'            => 'Sertifikasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.20.1',
                'index'            => 'Dokumen Sertifikasi Produk Peralatan dan Pemanfaatan Tenaga Listrik',
                'retensi_aktif'    => '2 Tahun Setelah Habis Masa Berlaku',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.20.2',
                'index'            => 'Dokumen Penunjukan Lembaga Sertifikasi Kompetensi (LSK)',
                'retensi_aktif'    => '2 Tahun Setelah Habis Masa Berlaku',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.20.3',
                'index'            => 'Dokumen Penerbitan Sertifikasi Laik Operasi (SLO) Instalasi Tenaga Listrik',
                'retensi_aktif'    => '2 Tahun Setelah Habis Masa Berlaku',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.20.4',
                'index'            => 'Dokumen Pembinaan dan Pengawasan Sertifikat Laik Operasi (SLO) Instalasi Tenaga Listrik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.20.5',
                'index'            => 'Registrasi Sertifikasi',
                'retensi_aktif'    => '2 Tahun Setelah Habis Masa Berlaku',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.21',
                'index'            => 'Akreditasi Ketenagalistrikan',
                'retensi_aktif'    => '2 Tahun Setelah Habis Masa Berlaku',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.22',
                'index'            => 'Standardisasi Kompetensi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.23',
                'index'            => 'Standardisasi Nasional Indonesia (SNI) Bidang Ketenagalistrikan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.23.1',
                'index'            => 'Perumusan Rancangan SNI Bidang Ketenagalistrikan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.23.2',
                'index'            => 'Forum Konsensus Rancangan SNI Bidang Ketenagalistrikan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.23.3',
                'index'            => 'Program Pemberlakuan SNI Wajib Bidang Ketenagalistrikan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.23.4',
                'index'            => 'Dokumen Pengawasan Penerapan SNI Wajib Bidang Ketenagalistrikan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.24',
                'index'            => 'Standardisasi Usaha Penunjang Ketenagalistrikan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.24.1',
                'index'            => 'Klasifikasi Usaha Penunjang Ketenagalistrikan',
                'retensi_aktif'    => '2 Tahun Setelah Ditetapkan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.24.2',
                'index'            => 'Kualifikasi Usaha Penunjang Ketenagalistrikan',
                'retensi_aktif'    => '2 Tahun Setelah Ditetapkan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.24.3',
                'index'            => 'Dokumen Penunjukan LIT (Lembaga Inspeksi Teknis)',
                'retensi_aktif'    => '2 Tahun Setelah Habis Masa Berlaku',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.24.4',
                'index'            => 'Laporan Berkala Pemegang Penunjukan LIT',
                'retensi_aktif'    => '2 Tahun Setelah Habis Masa Berlaku',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.24.5',
                'index'            => 'Laporan Hasil Pengawasan Penunjukan',
                'retensi_aktif'    => '2 Tahun Setelah Habis Masa Berlaku',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.25',
                'index'            => 'Bina Program Mineral dan Batu Bara',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.25.1',
                'index'            => 'Penyiapan dan Perencanaan Program Mineral dan Batu Bara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.25.2',
                'index'            => 'Rencana Induk Mineral dan Batu Bara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.25.3',
                'index'            => 'Pengembangan Investasi dan Kerja Sama Bidang Mineral dan Batu Bara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.25.4',
                'index'            => 'Data dan Informasi Mineral dan Batu Bara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.25.5',
                'index'            => 'Pelaporan Program Mineral dan Batu Bara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.25.6',
                'index'            => 'Perencanaan, Penyiapan, dan Penawaran Wilayah Kerja (WK) Mineral dan Batu Bara melalui Lelang Reguler',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.25.7',
                'index'            => 'Data dan Informasi Wilayah Mineral dan Batu Bara',
                'retensi_aktif'    => '3 Tahun Setelah Diperbarui',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.25.8',
                'index'            => 'Perencanaan Produksi Mineral dan Batu Bara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.25.9',
                'index'            => 'Pengembangan dan Pemanfaatan Mineral dan Batu Bara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],

            // Data 500.10.26 - Pembinaan Pengusahaan Mineral
            [
                'kode_klasifikasi' => '500.10.26',
                'index'            => 'Pembinaan Pengusahaan Mineral',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.26.1',
                'index'            => 'Ketenagakerjaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.26.2',
                'index'            => 'Pemberdayaan Masyarakat sekitar Tambang',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.26.3',
                'index'            => 'Penyelesaian Perselisihan Usaha Pertambangan Mineral',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.26.4',
                'index'            => 'Rekomendasi Kegiatan Usaha Pertambangan Mineral',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.26.5',
                'index'            => 'Laporan/Data Kegiatan Eksplorasi Mineral',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.26.6',
                'index'            => 'Pengawasan Produksi dan Pemasaran Mineral (Logam, Bukan Logam Batuan, Radioaktif, dan Mineral Jarang)',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.26.7',
                'index'            => 'Perizinan Usaha Pertambangan Mineral',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.26.8',
                'index'            => 'Kontrak Karya (KK)',
                'retensi_aktif'    => '2 Tahun Setelah Diperpanjang',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.26.9',
                'index'            => 'Pengelolaan Barang Kontrak Karya (KK)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.26.10',
                'index'            => 'Persetujuan Obyek Vital Nasional (Obvitnas)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.26.11',
                'index'            => 'Persetujuan Perubahan Saham Direksi, Komisaris pada Perusahaan Mineral',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.26.12',
                'index'            => 'Teguran kepada Pengusaha Kontrak Karya (KK)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.26.13',
                'index'            => 'Tanggapan kepada Pemerintah Daerah terkait Usaha Pertambangan Mineral',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.26.14',
                'index'            => 'Pedoman/Petunjuk Teknis Pertambangan Mineral Termasuk Rancangan Awal sampai dengan Rancangan Akhir',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.26.15',
                'index'            => 'Pelaporan Usaha Pertambangan Mineral',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.26.16',
                'index'            => 'Penghargaan Usaha Pertambangan Mineral',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.26.17',
                'index'            => 'Penerbitan Sertifikat Clear and Clean (CnC) Izin Usaha Pertambangan (IUP) Mineral',
                'retensi_aktif'    => '2 Tahun Setelah Dinyatakan Tidak Berlaku',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],

            // Data 500.10.27 - Pembinaan Pengusahaan Batu Bara
            [
                'kode_klasifikasi' => '500.10.27',
                'index'            => 'Pembinaan Pengusahaan Batu Bara',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.27.1',
                'index'            => 'Ketenagakerjaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.27.2',
                'index'            => 'Pemberdayaan Masyarakat Sekitar Tambang',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.27.3',
                'index'            => 'Penyelesaian Perselisihan Usaha Pertambangan Batu Bara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.27.4',
                'index'            => 'Rekomendasi Kegiatan Usaha Pertambangan Batu Bara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.27.5',
                'index'            => 'Laporan/Data Kegiatan Eksplorasi Batu Bara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.27.6',
                'index'            => 'Pengawasan Produksi dan Pemasaran Batu Bara (Bitumen Padat, Batuan Aspal, Batu Bara dan Gambut), antara lain: Laporan Produksi dan Penjualan Batu Bara PKP2B, IUP, hingga Laporan Kontrak Penjualan Pertambangan Batu Bara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.27.7',
                'index'            => 'Perizinan Usaha Pertambangan Batu Bara',
                'retensi_aktif'    => '2 Tahun Setelah Dinyatakan Tidak Berlaku',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.27.8',
                'index'            => 'Perjanjian Karya Pengusahaan Batu Bara (PKP2B)',
                'retensi_aktif'    => '3 Tahun Setelah Diperpanjang',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.27.9',
                'index'            => 'Pengelolaan Barang Perjanjian Karya Pengusahaan Batu Bara (PKP2B), antara lain: Persetujuan Pengadaan Barang Modal (Master List) PKP2B hingga Data Aset Perusahaan Batu Bara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.27.10',
                'index'            => 'Persetujuan Obyek Vital Nasional (Obvitnas)',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.27.11',
                'index'            => 'Persetujuan Perubahan Saham Direksi, Komisaris, pada Perusahaan Perjanjian Karya Pengusahaan Batu Bara (PKP2B)',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.27.12',
                'index'            => 'Teguran kepada Pengusaha Perjanjian Karya Pengusahaan Batu Bara (PKP2B)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.27.13',
                'index'            => 'Tanggapan kepada Pemerintah Daerah terkait Usaha Pertambangan Batu Bara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.27.14',
                'index'            => 'Pedoman/Petunjuk Teknis Pertambangan Mineral Termasuk Rancangan Awal sampai dengan Rancangan Akhir',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.27.15',
                'index'            => 'Pelaporan Usaha Pertambangan Batu Bara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.27.16',
                'index'            => 'Penghargaan Usaha Pertambangan Batu Bara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.27.17',
                'index'            => 'Penerbitan Sertifikat Clear and Clean (CnC) Izin Usaha Pertambangan (IUP) Batu Bara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],

            // Data 500.10.28 - Penerimaan Negara
            [
                'kode_klasifikasi' => '500.10.28',
                'index'            => 'Penerimaan Negara',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.28.1',
                'index'            => 'Penerimaan Negara Bukan Pajak',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.28.2',
                'index'            => 'Penetapan Bagi Hasil Penerimaan Negara Bukan Pajak (PNBP)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.28.3',
                'index'            => 'Pelaksanaan Pemeriksaan dan Pengujian PNBP',
                'retensi_aktif'    => '2 Tahun Setelah Anggaran Berakhir',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],

            // Data 500.10.29 - Teknik dan Lingkungan Mineral dan Batu Bara
            [
                'kode_klasifikasi' => '500.10.29',
                'index'            => 'Teknik dan Lingkungan Mineral dan Batu Bara',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.29.1',
                'index'            => 'Perumusan RSNI (Rancangan Standar Nasional Indonesia)/RSKKNI (Rancangan Standar Kompetensi Kerja Nasional Indonesia), antara lain: Draf Rancangan, Rancangan Standar Nasional Indonesia (RSNI), dan Standar Nasional Indonesia (SNI)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.29.2',
                'index'            => 'Pengawasan Standardisasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.29.3',
                'index'            => 'Persetujuan Penunjukan Kepala/Wakil Kepala Teknik Tambang',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.29.4',
                'index'            => 'Pengawasan Keselamatan Kegiatan dan Keselamatan Pekerja, antara lain: Laporan Kecelakaan Tambang/Statistik hingga Laporan Hasil Pemeriksaan Keselamatan dan Kesehatan Kerja (K3)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.29.5',
                'index'            => 'Pemeriksaan Teknis dan Pengujian Instalasi dan Peralatan Tambang, antara lain: Pemeriksaan dan Pengujian Instalasi dan Peralatan Tambang hingga Berita Acara Hasil Inspeksi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.29.6',
                'index'            => 'Analisis Mengenai Dampak Lingkungan (Amdal)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.29.7',
                'index'            => 'Upaya Pengelolaan Lingkungan (UKL) dan Upaya Pemantauan Lingkungan (UPL)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.29.8',
                'index'            => 'Rekomendasi Bahan Kimia',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.29.9',
                'index'            => 'Pengawasan Pelaksanaan Pengelolaan dan Pemantauan Lingkungan, antara lain: Laporan Pelaksanaan Rencana Pengelolaan Lingkungan (RKL)/Rencana Pemantauan Lingkungan (RPL) hingga Surat Penetapan Jaminan Pascatambang',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.29.10',
                'index'            => 'Laporan Berkala Teknik dan Lingkungan Pertambangan/Laporan Tahunan Pelaksanaan Reklamasi, antara lain: Laporan Bulanan Terjadinya Pencemaran (LPL-5) hingga Laporan Tahunan Pelaksanaan Reklamasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.29.11',
                'index'            => 'Pemberian Penghargaan, antara lain: Pemberian Penghargaan Lingkungan Pertambangan, Pemberian Penghargaan Keselamatan Kerja, Dokumen Pengajuan dan Penilaian Tanda Penghargaan lingkungan Pertambangan, Dokumen Pengajuan, dan Penilaian Tanda Penghargaan Keselamatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.29.12',
                'index'            => 'Pengawasan Lingkungan Pertambangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.29.13',
                'index'            => 'Usaha Jasa Mineral dan Batu Bara',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.29.14',
                'index'            => 'Pembinaan dan Pengawasan Usaha Jasa Mineral dan Batu Bara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.29.15',
                'index'            => 'Rekomendasi Teknis, antara lain: Pengajuan Rekomendasi Teknis, Hasil Evaluasi Dokumen Pengajuan Rekomendasi Teknis, Surat Rekomendasi Teknis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.29.16',
                'index'            => 'Persetujuan Teknis, antara lain: Pengajuan Persetujuan Teknis, Hasil Evaluasi Dokumen Pengajuan Persetujuan Teknis, Surat Persetujuan Teknis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.29.17',
                'index'            => 'Pengawasan Teknis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.29.18',
                'index'            => 'Pengawasan Konservasi Mineral dan Batu Bara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.29.19',
                'index'            => 'Pembinaan Teknik dan Lingkungan Mineral dan Batu Bara antara lain: Sosialisasi Standardisasi, Bimbingan Teknis Lingkungan Pertambangan, Bimbingan Teknis/Sosialisasi Pertambangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],

            // Data 500.10.30 - Program Penelitian dan Pengembangan
            [
                'kode_klasifikasi' => '500.10.30',
                'index'            => 'Program Penelitian dan Pengembangan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.30.1',
                'index'            => 'Rencana Penelitian dan Pengembangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.30.2',
                'index'            => 'Pengembangan dan Inovasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.30.3',
                'index'            => 'Dokumen Penerapan/Pemanfaatan/Pendayagunaan/Replikasi/Prototipe Hasil Penelitian/Pengkajian/Pengembangan/Inovasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.30.4',
                'index'            => 'Advokasi dan Fasilitasi Penelitian, Pengembangan, dan Inovasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.30.5',
                'index'            => 'Diseminasi Hasil Penelitian, Pengembangan dan Penerapan Ilmu Pengetahuan dan Teknologi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.30.6',
                'index'            => 'Pembinaan Penelitian/Pengembangan, Pengkajian, dan Penerapan Ilmu Pengetahuan dan Teknologi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.30.7',
                'index'            => 'Jaringan Sistem Nasional Penelitian, Pengembangan, serta Penerapan Ilmu Pengetahuan dan Teknologi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.30.8',
                'index'            => 'Data dan Informasi Hasil Penelitian, Pengembangan, serta Penerapan Ilmu Pengetahuan dan Teknologi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.30.9',
                'index'            => 'Master Prosiding/Jurnal Penelitian, Pengembangan, dan Penerapan Ilmu Pengetahuan dan Teknologi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.30.10',
                'index'            => 'Hak atas Kekayaan Intelektual (HKI)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.30.11',
                'index'            => 'Forum Komunikasi Penelitian, Pengembangan, dan Penerapan Ilmu Pengetahuan dan teknologi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.30.12',
                'index'            => 'Layanan Jasa Penelitian, Pengembangan, Penerapan Ilmu Pengetahuan (Iptek)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.30.13',
                'index'            => 'Sertifikasi Personil Peneliti Bidang Sumber Daya Mineral',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],

            // Data 500.10.31 - Sarana Litbang
            [
                'kode_klasifikasi' => '500.10.31',
                'index'            => 'Sarana Litbang',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.31.1',
                'index'            => 'Administrasi Penggunaan Peralatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.31.2',
                'index'            => 'Log-Book Peralatan Survei/Peralatan Uji Kalibrasi',
                'retensi_aktif'    => '2 Tahun Setelah Peralatan Dihapus',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],

            // Data 500.10.32 - Afiliasi
            [
                'kode_klasifikasi' => '500.10.32',
                'index'            => 'Afiliasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.32.1',
                'index'            => 'Proyek Percontohan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.32.2',
                'index'            => 'Promosi dan Layanan Jasa Teknologi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.10.32.3',
                'index'            => 'Pembinaan Penelitian dan Pengembangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.32.4',
                'index'            => 'Penyajian Informasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],

            // Data 500.10.33 - Penelitian dan Pengembangan Kegeologian
            [
                'kode_klasifikasi' => '500.10.33',
                'index'            => 'Penelitian dan Pengembangan Kegeologian',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.33.1',
                'index'            => 'Pemetaan dan Penelitian Geologi, Geokimia, dan Geofisika Kelautan',
                'retensi_aktif'    => '3 Tahun Setelah Penelitian Berakhir',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.33.2',
                'index'            => 'Energi Kelautan dan Kewilayahan Penelitian Energi dan Kewilayahan Pantai',
                'retensi_aktif'    => '3 Tahun Setelah Penelitian Berakhir',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.33.3',
                'index'            => 'Penelitian Sumber Daya Energi dan Mineral Kelautan',
                'retensi_aktif'    => '3 Tahun Setelah Penelitian Berakhir',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.33.4',
                'index'            => 'Penelitian Sumber Daya Mineral Kelautan',
                'retensi_aktif'    => '3 Tahun Setelah Penelitian Berakhir',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],

            // Data 500.10.34 - Penelitian dan Pengembangan Teknologi Minyak dan Gas Bumi
            [
                'kode_klasifikasi' => '500.10.34',
                'index'            => 'Penelitian dan Pengembangan Teknologi Minyak dan Gas Bumi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.34.1',
                'index'            => 'Teknologi Eksplorasi',
                'retensi_aktif'    => '3 Tahun Setelah Penelitian Berakhir',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.34.2',
                'index'            => 'Teknologi Eksploitasi',
                'retensi_aktif'    => '3 Tahun Setelah Penelitian Berakhir',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.34.3',
                'index'            => 'Laboratorium',
                'retensi_aktif'    => '3 Tahun Setelah Penelitian Berakhir',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.34.4',
                'index'            => 'Studi',
                'retensi_aktif'    => '3 Tahun Setelah Penelitian Berakhir',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.34.5',
                'index'            => 'Teknologi Proses',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.34.6',
                'index'            => 'Teknologi Aplikasi Produk',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.34.7',
                'index'            => 'Teknologi Gas',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],

            // Data 500.10.35 - Penelitian dan Pengembangan Teknologi Mineral Batubara
            [
                'kode_klasifikasi' => '500.10.35',
                'index'            => 'Penelitian dan Pengembangan Teknologi Mineral Batubara',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.35.1',
                'index'            => 'Teknologi Eksploitasi Tambang dan Pengolahan Sumber Daya',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.35.2',
                'index'            => 'Teknologi Pengolahan dan Pemanfaatan Mineral',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.35.3',
                'index'            => 'Teknologi Pemanfaatan Batu Bara',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],

            // Data 500.10.36 - Penelitian dan Pengembangan Ketenagalistrikan dan Energi Baru Terbarukan
            [
                'kode_klasifikasi' => '500.10.36',
                'index'            => 'Penelitian dan Pengembangan Ketenagalistrikan dan Energi Baru Terbarukan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.10.36.1',
                'index'            => 'Energi Baru Terbarukan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.36.2',
                'index'            => 'Teknologi Ketenagalistrikan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.36.3',
                'index'            => 'Lingkungan dan Konservasi Energi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.10.36.4',
                'index'            => 'Penelitian dan Pengembangan Teknologi PLTSa (Pembangkit Listrik Tenaga Sampah) dan Konservasi Energi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],

            // Data 500.11 - PERHUBUNGAN
            [
                'kode_klasifikasi' => '500.11',
                'index'            => 'PERHUBUNGAN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.1',
                'index'            => 'Kebijakan di Bidang Perhubungan yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '3 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.2',
                'index'            => 'Jaringan Prasarana dan Pelayanan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.2.1',
                'index'            => 'Penentuan Lokasi Terminal Barang Tipe Pengumpul dan Tipe Penunjang',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.2.2',
                'index'            => 'Penentuan Lokasi Terminal Penumpang Tipe A, Tipe B, dan Tipe C',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.2.3',
                'index'            => 'Penetapan Lokasi Terminal Barang Utama',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.2.4',
                'index'            => 'Standar Pelayanan Minimal Pengoperasian Terminal',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.2.5',
                'index'            => 'Jaringan Trayek Angkutan Antarkota/provinsi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.2.6',
                'index'            => 'Jaringan Lintas pada Jaringan Jalan Primer',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.2.7',
                'index'            => 'Penetapan Kelas Jalan Primer',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.2.8',
                'index'            => 'Kualifikasi Teknis Petugas Terminal',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.2.9',
                'index'            => 'Jaringan Transportasi Jalan Sekunder',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.3',
                'index'            => 'Pengembangan Transportasi Jalan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.3.1',
                'index'            => 'Sistem Informasi dan Komunikasi Lalu Lintas dan Angkutan Jalan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.3.2',
                'index'            => 'Pengembangan Transportasi Jalan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.4',
                'index'            => 'Pengujian Kendaraan Bermotor',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.4.1',
                'index'            => 'Pengesahan Hasil Uji Tipe Kendaraan Bermotor',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.4.2',
                'index'            => 'Sertifikasi Uji Tipe Kendaraan Bermotor',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.4.3',
                'index'            => 'Sertifikasi Tenaga Penguji Kendaraan Bermotor',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.4.4',
                'index'            => 'Akreditasi Unit Pengujian Kendaraan Bermotor',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.5',
                'index'            => 'Teknologi Kendaraan Bermotor',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.5.1',
                'index'            => 'Sertifikasi Rancang Bangun dan Rekayasa Kendaraan Bermotor',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.5.2',
                'index'            => 'Pelaksanaan Kalibrasi Peralatan Uji Kendaraan Bermotor',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.5.3',
                'index'            => 'Persyaratan Teknis dan Laik Jalan Kendaraan Bermotor',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.5.4',
                'index'            => 'Harmonisasi dan Standardisasi Regulasi Kendaraan Bermotor',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.6',
                'index'            => 'Manajemen dan Rekayasa Lalu Lintas',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.6.1',
                'index'            => 'Analisis Dampak Lalu Lintas Jalan Nasional di Luar Kawasan Perkotaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.6.2',
                'index'            => 'Manajemen dan Rekayasa Lalu Lintas di Jalan Nasional',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.7',
                'index'            => 'Perlengkapan Jalan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.7.1',
                'index'            => 'Pedoman Teknis Perlengkapan Jalan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.7.2',
                'index'            => 'Penimbangan Kendaraan Bermotor di Jalan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.7.3',
                'index'            => 'Akreditasi Unit Penimbangan Kendaraan Bermotor',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.7.4',
                'index'            => 'Kualifikasi Teknis Petugas Penimbangan Kendaraan Bermotor',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.7.5',
                'index'            => 'Pengadaan, Pemasangan, Perbaikan, dan Pemeliharaan Perlengkapan Jalan di Jalan Nasional',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.8',
                'index'            => 'Angkutan Penumpang',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.8.1',
                'index'            => 'Tarif Angkutan Penumpang Kelas Ekonomi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.8.2',
                'index'            => 'Izin Trayek Angkutan Penumpang untuk Trayek Lintas Batas Negara',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.8.3',
                'index'            => 'Izin Trayek Antarkota Antarprovinsi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.8.4',
                'index'            => 'Izin Operasi Angkutan Pariwisata dan Angkutan Penumpang tidak dalam Trayek yang Wilayah Pelayanannya Bersifat Lintas Batas Negara dan Antarkota Antarprovinsi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.8.5',
                'index'            => 'Penilaian Kinerja Perusahaan Angkutan Umum',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.8.6',
                'index'            => 'Pemberian Subsidi Angkutan Umum',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.8.7',
                'index'            => 'Angkutan Perintis',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.8.8',
                'index'            => 'Penghargaan Perusahaan Angkutan Umum',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.9',
                'index'            => 'Angkutan Barang',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.9.1',
                'index'            => 'Sistem Informasi dan Komunikasi Lalu Lintas dan Angkutan Jalan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.9.2',
                'index'            => 'Tarif Angkutan Barang',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.9.3',
                'index'            => 'Izin Operasi Angkutan Barang Tertentu',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.9.4',
                'index'            => 'Pembinaan Angkutan Barang',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.9.5',
                'index'            => 'Izin Dispensasi Angkutan Jalan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.10',
                'index'            => 'Monitoring Operasional',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.10.1',
                'index'            => 'Pengendalian Operasional Lalu Lintas dan Angkutan Jalan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.10.2',
                'index'            => 'Pengawasan, Penertiban, dan Pemberian Sanksi Administratif terhadap Pelanggaran Operasional Kendaraan Angkutan Umum yang Menjadi Kewenangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.10.3',
                'index'            => 'Berkas Pelanggaran Perda (Lalu Lintas)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.11',
                'index'            => 'Bimbingan Teknis Penyidik Pegawai Negeri Sipil',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.11.1',
                'index'            => 'Pedoman Teknis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.11.2',
                'index'            => 'Penyidikan Pelanggaran Lalu Lintas dan Angkutan Jalan oleh Penyidik Pegawai Negeri Sipil (PPNS)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.11.3',
                'index'            => 'Bimbingan Teknis PPNS',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.11.4',
                'index'            => 'Pengusulan Pengangkatan dan Pemberhentian Penyidik Pegawai Negeri Sipil (PPNS)',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.12',
                'index'            => 'Analisis dan Evaluasi Jaringan Transportasi Sungai, Danau dan Penyeberangan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.12.1',
                'index'            => 'Pendataan Jaringan Transportasi Sungai, Danau, dan Penyeberangan',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.12.2',
                'index'            => 'Analisis serta Informasi Jaringan Transportasi Sungai, Danau, dan Penyeberangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.13',
                'index'            => 'Pengembangan Jaringan Transportasi Sungai, Danau dan Penyeberangan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.13.1',
                'index'            => 'Pengembangan dan Penetapan Jaringan Transportasi Sungai, Danau dan Penyeberangan (Peta Jaringan, Blueprint Jaringan)',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.13.2',
                'index'            => 'Pengembangan Sistem Informasi Manajemen (SIM) Lalu Lintas dan Angkutan Sungai, Danau, dan Penyeberangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.14',
                'index'            => 'Rancang Bangun Sarana Angkutan Sungai, Danau, dan Penyeberangan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.15',
                'index'            => 'Bimbingan Perawatan Sarana Angkutan Sungai, Danau, dan Penyeberangan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.15.1',
                'index'            => 'Perawatan dan Pemeliharaan Sarana Sungai, Danau, dan Penyeberangan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.15.2',
                'index'            => 'Pengawakan dan Registrasi Sarana Angkutan Sungai, dan Danau dan Penyeberangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.16',
                'index'            => 'Rancang Bangun Pelabuhan Sungai, Danau, dan Penyeberangan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.16.1',
                'index'            => 'Perencanaan dan Pembangunan Pelabuhan Sungai, Danau dan Penyeberangan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.16.2',
                'index'            => 'Pemberian Sertifikasi Pelabuhan Penyeberangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.16.3',
                'index'            => 'Rekomendasi Penetapan Lokasi Pelabuhan Penyeberangan di Lintas Nasional dan Internasional',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.16.4',
                'index'            => 'Penyelenggaraan, Pemeliharaan, Perawatan dan Perbaikan Pelabuhan Sungai, Danau, dan Penyeberangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.17',
                'index'            => 'Kualifikasi Teknis Petugas Pelabuhan Sungai, Danau dan Penyeberangan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.18',
                'index'            => 'Manajemen Lalu Lintas Sungai, Danau, dan Penyeberangan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.18.1',
                'index'            => 'Manajemen Lalu Lintas',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.18.2',
                'index'            => 'Tata Cara Berlalu Lintas di Sungai, Danau, dan Penyeberangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.18.3',
                'index'            => 'Penyidik Pegawai Negeri Sipil Bidang Lalu Lintas dan Angkutan Sungai dan Danau',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.18.4',
                'index'            => 'Sertifikasi Inspektur Sungai dan Danau dan Pejabat Pemberangkatan Angkutan Sungai dan Danau',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.19',
                'index'            => 'Alur dan Perambuan Lalu Lintas Sungai, Danau dan Penyeberangan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.19.1',
                'index'            => 'Pengerukan Alur Pelayaran Sungai, Danau, dan Kolam Pelabuhan Penyeberangan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.19.2',
                'index'            => 'Penetapan Kelas Alur dan Peta Alur Pelayaran Sungai dan Danau',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.19.3',
                'index'            => 'Perambuan Sungai, Danau, dan Penyeberangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.20',
                'index'            => 'Bimbingan Usaha Angkutan Sungai, Danau, dan Penyeberangan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.20.1',
                'index'            => 'Penyelenggaraan Angkutan Sungai, Danau, dan Penyeberangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.20.2',
                'index'            => 'Persetujuan Operasi Kapal Penyeberangan di Lintas Nasional dan Internasional',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.21',
                'index'            => 'Tarif dan Keperintisan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.21.1',
                'index'            => 'Perhitungan Tarif, Pemantauan Tarif Angkutan dan Jasa Pelabuhan Sungai, Danau, dan Penyeberangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.21.2',
                'index'            => 'Kriteria dan Pelaksanaan Pelayanan Keperintisan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.22',
                'index'            => 'Bina Sistem Transportasi Perkotaan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.22.1',
                'index'            => 'Jaringan Transportasi Perkotaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.22.2',
                'index'            => 'Transportasi Perkotaan yang Berbasis Jalan, Jalan Rel dan Perairan Daratan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.22.3',
                'index'            => 'Transportasi Perkotaan untuk Kawasan Perkotaan yang Melebihi Satu Wilayah Administrasi Provinsi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.23',
                'index'            => 'Lalu Lintas Perkotaan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.23.1',
                'index'            => 'Manajemen dan Rekayasa Lalu Lintas Perkotaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.23.2',
                'index'            => 'Manajemen dan Rekayasa Lalu Lintas Perkotaan di Jalan Nasional dalam Kawasan Perkotaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.23.3',
                'index'            => 'Penanganan Lalu Lintas Perkotaan Berbasis Teknologi di Wilayah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.24',
                'index'            => 'Angkutan Perkotaan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.24.1',
                'index'            => 'Penyelenggaraan Angkutan Perkotaan dalam Trayek',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.24.2',
                'index'            => 'Jaringan Trayek Perkotaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.24.3',
                'index'            => 'Penentuan dan Pemenuhan Alokasi Kebutuhan Angkutan Perkotaan dalam Trayek yang Wilayah Pelayanannya Melebihi Satu Wilayah Administrasi Provinsi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.25',
                'index'            => 'Pemaduan Moda Transportasi Perkotaan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.25.1',
                'index'            => 'Penyelenggaraan Angkutan Perkotaan Tidak dalam Trayek untuk Angkutan Penumpang dan/atau Barang',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.25.2',
                'index'            => 'Pemaduan Moda Transportasi Perkotaan yang Menghubungkan Antarsimpul (Bandara, Pelabuhan, Stasiun, dan Terminal) di Kawasan Perkotaan yang Melebihi Satu Wilayah Administrasi Provinsi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.25.3',
                'index'            => 'Penentuan dan Pemenuhan Alokasi Kebutuhan Angkutan Perkotaan Tidak dalam Trayek yang Wilayah Pelayanannya Melebihi Satu Wilayah Administrasi Provinsi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.26',
                'index'            => 'Dampak Transportasi Perkotaan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.26.1',
                'index'            => 'Penyelenggaraan Transportasi Perkotaan Berwawasan Lingkungan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.26.2',
                'index'            => 'Penanganan Dampak Transportasi di Kawasan Perkotaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.26.3',
                'index'            => 'Masterplan Pengembangan Teknologi Transportasi Ramah Lingkungan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.26.4',
                'index'            => 'Pelaksanaan Analisis Dampak Lalu Lintas di Jalan Nasional dalam Kawasan Kota',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.26.5',
                'index'            => 'Rekomendasi Hasil Analisis Dampak Lalu Lintas di Jalan Nasional dalam Kawasan Perkotaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.26.6',
                'index'            => 'Masterplan Transportasi Perkotaan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.27',
                'index'            => 'Monitoring dan Evaluasi Manajemen Keselamatan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.27.1',
                'index'            => 'Monitoring dan Evaluasi Data Kecelakaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.27.2',
                'index'            => 'Kualifikasi Unit Pengkajian',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.27.3',
                'index'            => 'Pengembangan Sistem Informasi Manajemen Keselamatan Lalu Lintas dan Angkutan Jalan, Sungai, Danau, dan Penyeberangan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.28',
                'index'            => 'Pengembangan Keselamatan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.28.1',
                'index'            => 'Program Keselamatan Lalu Lintas dan Angkutan Jalan, Sungai, Danau, dan Penyeberangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.28.2',
                'index'            => 'Harmonisasi Kebijakan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.29',
                'index'            => 'Promosi dan Kemitraan Keselamatan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.29.1',
                'index'            => 'Promosi Keselamatan: Penyuluhan, Publikasi dan Destinasi Keselamatan Lalu Lintas dan Angkutan Jalan, Sungai, Danau, dan Penyeberangan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.29.2',
                'index'            => 'Kemitraan Keselamatan Antarlembaga dan Masyarakat di Bidang Keselamatan Lalu Lintas dan Angkutan Jalan, Sungai, Danau, dan Penyeberangan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.30',
                'index'            => 'Bina Keselamatan Angkutan Umum',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.30.1',
                'index'            => 'Keselamatan Pengusahaan Angkutan Umum',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.30.2',
                'index'            => 'Keselamatan Awak Angkutan Umum dan Awak Kapal Sungai dan Danau',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.31',
                'index'            => 'Audit Keselamatan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.31.1',
                'index'            => 'Pedoman Audit Keselamatan Sarana, Prasarana, Sumber Daya Manusia',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.31.2',
                'index'            => 'Identifikasi Daerah Rawan Kecelakaan Jalan dan Pelaku Transportasi Jalan dan Sungai, Danau, dan Penyeberangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.31.3',
                'index'            => 'Audit Faktor Keselamatan Lalu lintas dan Angkutan Jalan, Sungai, Danau, dan Penyeberangan serta Laik Fungsi Jalan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.32',
                'index'            => 'Inspeksi Keselamatan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.32.1',
                'index'            => 'Pedoman Keselamatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.11.32.2',
                'index'            => 'Inspeksi Keselamatan Prasarana, Sarana, Sumber Daya Manusia, dan Pelaku Transportasi Jalan dan Sungai, Danau, dan Penyeberangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.32.3',
                'index'            => 'Investigasi Kecelakaan Sungai, Danau, dan Penyeberangan, serta Laik Fungsi Jalan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.33',
                'index'            => 'Parkir',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.11.33.1',
                'index'            => 'Surat Tugas Juru Parkir',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.33.2',
                'index'            => 'Izin Tempat Khusus Parkir Swasta',
                'retensi_aktif'    => '2 Tahun Setelah Ada Izin Baru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.11.33.3',
                'index'            => 'Surat Tugas TKP Pemerintah',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],

            // Data 500.12 - KOMUNIKASI DAN INFORMATIKA
            [
                'kode_klasifikasi' => '500.12',
                'index'            => 'KOMUNIKASI DAN INFORMATIKA',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.12.1',
                'index'            => 'Kebijakan di Bidang Komunikasi dan Informatika yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '3 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.12.2',
                'index'            => 'Telekomunikasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.12.2.1',
                'index'            => 'Layanan Jaringan Telekomunikasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.2.2',
                'index'            => 'Layanan Jasa Telekomunikasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.2.3',
                'index'            => 'Penomoran Telekomunikasi dan Informatika',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.12.2.4',
                'index'            => 'Kelayakan Sistem Telekomunikasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.3',
                'index'            => 'Penyiaran',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.12.3.1',
                'index'            => 'Pemetaan Penyelenggaraan Radio dan Televisi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.3.2',
                'index'            => 'Database Penyelenggaraan Radio dan Televisi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.4',
                'index'            => 'Telekomunikasi Khusus, Penyiaran Publik, dan Kewajiban Universal',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.12.4.1',
                'index'            => 'Telekomunikasi Khusus Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.4.2',
                'index'            => 'Telekomunikasi Khusus Nonpemerintah Daerah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.4.3',
                'index'            => 'Layanan Khusus Penyiaran',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.4.4',
                'index'            => 'Pelayanan Kewajiban Universal',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.4.5',
                'index'            => 'Pengembangan Infrastruktur',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.5',
                'index'            => 'Pengendalian Informatika',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.12.5.1',
                'index'            => 'Monitoring dan Evaluasi Jaringan Telekomunikasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.5.2',
                'index'            => 'Monitoring dan Evaluasi Jasa Telekomunikasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.5.3',
                'index'            => 'Monitoring dan Evaluasi Penyiaran',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.5.4',
                'index'            => 'Pencegahan dan Penertiban',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.6',
                'index'            => 'e-Government',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.12.6.1',
                'index'            => 'Tata Kelola e-Government',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.6.2',
                'index'            => 'Teknologi dan Infrastruktur e-Government',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.6.3',
                'index'            => 'Interoperabilitas dan Interkonektivitas e-Government',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.6.4',
                'index'            => 'Aplikasi Layanan Kepemerintahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.6.5',
                'index'            => 'Aplikasi Layanan Publik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.7',
                'index'            => 'e-Business',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.12.7.1',
                'index'            => 'Tata Kelola e-Business',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.7.2',
                'index'            => 'Teknologi dan Infrastruktur e-Business',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.7.3',
                'index'            => 'Interoperabilitas dan Interkonektivitas e-Business',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.7.4',
                'index'            => 'Aplikasi Layanan e-Business',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.8',
                'index'            => 'Pemberdayaan Informatika Masyarakat',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.12.8.1',
                'index'            => 'Pemberdayaan Informatika Masyarakat Perkotaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.8.2',
                'index'            => 'Pemberdayaan Informatika Masyarakat Perdesaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.9',
                'index'            => 'Pemberdayaan Industri Informatika',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.12.9.1',
                'index'            => 'Industri Infrastruktur dan Layanan Aplikasi Informatika',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.9.2',
                'index'            => 'Industri Perangkat Informatika Pengguna',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.9.3',
                'index'            => 'Industri Perangkat Lunak',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.9.4',
                'index'            => 'Industri Konten Multimedia',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.10',
                'index'            => 'Keamanan Informasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.12.10.1',
                'index'            => 'Tata Kelola Keamanan Informasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.10.2',
                'index'            => 'Teknologi Keamanan Informasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.10.3',
                'index'            => 'Monitoring, Evaluasi, dan Tanggap Darurat Keamanan Informasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.10.4',
                'index'            => 'Penyidikan dan Penindakan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.12.10.5',
                'index'            => 'Budaya Keamanan Informasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.11',
                'index'            => 'Komunikasi Publik',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.12.11.1',
                'index'            => 'Tata Kelola Komunikasi Publik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.11.2',
                'index'            => 'Pengelolaan Opini Publik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.11.3',
                'index'            => 'Layanan Komunikasi Publik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.12',
                'index'            => 'Pengolahan dan Penyediaan Informasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.12.12.1',
                'index'            => 'Informasi Politik, Hukum, dan Keamanan',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.12.2',
                'index'            => 'Informasi Perekonomian',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.12.3',
                'index'            => 'Informasi Kesejahteraan Rakyat',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.13',
                'index'            => 'Pengelolaan Media Publik',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.12.13.1',
                'index'            => 'Media Cetak',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.13.2',
                'index'            => 'Media Online',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.13.3',
                'index'            => 'Media Luar Ruang dan Audio Visual',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.14',
                'index'            => 'Kemitraan Komunikasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.12.14.1',
                'index'            => 'Kemitraan Pemerintah dan Lembaga Negara',
                'retensi_aktif'    => '2 Tahun Setelah Perjanjian, Kontrak, Kerja Sama Berakhir, dan Kewajiban Para Pihak Telah Ditunaikan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.14.2',
                'index'            => 'Kemitraan Media dan Dunia Usaha',
                'retensi_aktif'    => '2 Tahun Setelah Perjanjian, Kontrak, Kerja Sama Berakhir, dan Kewajiban Para Pihak Telah Ditunaikan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.14.3',
                'index'            => 'Kemitraan Organisasi Kemasyarakatan dan Profesi',
                'retensi_aktif'    => '2 Tahun Setelah Perjanjian, Kontrak, Kerja Sama Berakhir, dan Kewajiban Para Pihak Telah Ditunaikan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.15',
                'index'            => 'Infrastruktur Informatika',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.12.15.1',
                'index'            => 'Jaringan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.15.2',
                'index'            => 'Piranti Teknologi Informatika',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.15.3',
                'index'            => 'Keamanan Informatika',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.16',
                'index'            => 'Sistem dan Data',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.12.16.1',
                'index'            => 'Portal dan Konten',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.16.2',
                'index'            => 'Pengumpulan dan Pengolahan Data',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.16.3',
                'index'            => 'Pengembangan Aplikasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.17',
                'index'            => 'Pusat Kerja Sama',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.12.17.1',
                'index'            => 'Kerja Sama Daerah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.12.17.2',
                'index'            => 'Kerja Sama Bilateral',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.12.18',
                'index'            => 'Pusat Informasi dan Hubungan Masyarakat',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.12.18.1',
                'index'            => 'Pelayanan Informasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.18.2',
                'index'            => 'Hubungan Masyarakat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.18.3',
                'index'            => 'Bimbingan Teknis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.12.19',
                'index'            => 'Evaluasi',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],

            // Data 500.13 - PARIWISATA DAN EKONOMI KREATIF
            [
                'kode_klasifikasi' => '500.13',
                'index'            => 'PARIWISATA DAN EKONOMI KREATIF',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.13.1',
                'index'            => 'Kebijakan di Bidang Pariwisata dan Ekonomi Kreatif yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.13.2',
                'index'            => 'Pengembangan Destinasi Wisata',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.13.2.1',
                'index'            => 'Perancangan Destinasi dan Investasi Pariwisata',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.13.2.2',
                'index'            => 'Pengembangan Daya Tarik Wisata',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.13.2.3',
                'index'            => 'Industri Pariwisata',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.13.2.4',
                'index'            => 'Pemberdayaan Masyarakat Destinasi Pariwisata',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.13.2.5',
                'index'            => 'Pengembangan Wisata Minat Khusus, Konvensi, Insentif, dan Event',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.13.3',
                'index'            => 'Pemasaran Pariwisata',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.13.3.1',
                'index'            => 'Pengembangan Pasar dan Informasi Pariwisata',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.13.3.2',
                'index'            => 'Promosi Pariwisata Luar Negeri',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.13.3.3',
                'index'            => 'Promosi Pariwisata Dalam Negeri',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.13.3.4',
                'index'            => 'Pencitraan Indonesia',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.13.4',
                'index'            => 'Ekonomi Kreatif Berbasis Seni dan Budaya',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.13.4.1',
                'index'            => 'Pengembangan Industri Perfilman',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.13.4.2',
                'index'            => 'Pengembangan Seni Pertunjukan dan Industri Musik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.13.4.3',
                'index'            => 'Pengembangan Seni Rupa',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.13.5',
                'index'            => 'Ekonomi Kreatif Berbasis Media, Desain, dan Iptek',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.13.5.1',
                'index'            => 'Pengembangan Ekonomi Kreatif Berbasis Media',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.13.5.2',
                'index'            => 'Desain dan Arsitektur',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.13.5.3',
                'index'            => 'Kerja Sama dan Fasilitasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.13.6',
                'index'            => 'Pengembangan Sumber Daya Pariwisata dan Ekonomi Kreatif',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.13.6.1',
                'index'            => 'Penelitian dan Pengembangan Kebijakan Kepariwisataan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.13.6.2',
                'index'            => 'Penelitian dan Pengembangan Kebijakan Ekonomi Kreatif',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.13.6.3',
                'index'            => 'Pengembangan SDM Kepariwisataan dan Ekonomi Kreatif',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.13.6.4',
                'index'            => 'Kompetensi Kepariwisataan dan Ekonomi Kreatif',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],

            // Data 500.14 - STATISTIK
            [
                'kode_klasifikasi' => '500.14',
                'index'            => 'STATISTIK',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.14.1',
                'index'            => 'Kebijakan di Bidang Statistik yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.14.2',
                'index'            => 'Sensus Penduduk, Pertanian, dan Ekonomi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.14.2.1',
                'index'            => 'Perencanaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.14.2.2',
                'index'            => 'Persiapan, antara lain: Penyusunan Rancangan Organisasi Kegiatan Sensus, Penyusunan Kuesioner, Penyusunan Konsep dan Definisi, Penyusunan Metodologi (Cakupan, Organisasi, Lapangan, Ukuran Statistik, Prosedur), Penyusunan Buku Pedoman (Pencacahan, Pengawasan, Pengolahan), Penyusunan Peta Wilayah Kerja dan Muatan Peta Wilayah, Penyusunan Pedoman Sosialisasi, Sosialisasi Kegiatan kepada Stakeholders dan Sumber Data (Leaflet, Poster, Pertemuan), Pelaksanaan Pertemuan Koordinasi (Intern dan Ekstern), Pelaksanaan Pelatihan Instruktur (TOT), Pelaksanaan Pelatihan Petugas, Penyusunan Program Pengolahan (Rule Validasi, Pemeriksaan Data Entri, Tabulasi), Pelatihan Petugas Pengolahan, Perancangan Tabel, Pelaksanaan Uji Coba',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.14.2.3',
                'index'            => 'Pelaksanaan Lapangan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.14.2.4',
                'index'            => 'Pengolahan, antara lain: Pengelolaan Dokumen (Penerimaan/Pengiriman, Pengelompokan/Batching), Pemeriksaan Dokumen dan Pengkodean (Editing/Coding), Perekaman Data (Entri, Scanner), Tabulasi Data, Pemeriksaan Tabulasi, Laporan Konsistensi Tabulasi',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.14.2.5',
                'index'            => 'Analisis dan Penyajian Hasil Sensus',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.14.2.6',
                'index'            => 'Diseminasi Hasil Sensus',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.14.3',
                'index'            => 'Survei',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.14.3.1',
                'index'            => 'Perencanaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.14.3.2',
                'index'            => 'Persiapan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.14.3.3',
                'index'            => 'Pelaksanaan Lapangan, antara lain: Pelaksanaan Listing, Pemilihan Sampel, Pengumpulan Data, Pemeriksaan, Pengawasan Lapangan, Monitoring Kualitas',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.14.3.4',
                'index'            => 'Pengolahan, antara lain: Pengelolaan Dokumen (Penerimaan/Pengiriman, Pengelompokan/Batching), Pemeriksaan Dokumen dan Pengkodean (Editing/Coding), Perekaman Data (Entri, Scanner), Tabulasi Data, Pemeriksaan Tabulasi, Laporan Konsistensi Tabulasi',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.14.3.5',
                'index'            => 'Analisis dan Penyajian Hasil Survei, antara lain: Pembahasan Angka Hasil Pengolahan, Penyusunan Angka Sementara, Penyusunan Angka Tetap, Penyusunan/Pembahasan Draf Publikasi, Analisis Data, Penyusunan Publikasi',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.14.3.6',
                'index'            => 'Diseminasi Hasil Survei',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.14.4',
                'index'            => 'Konsolidasi Data Statistik',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.14.4.1',
                'index'            => 'Kompilasi Data',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.14.4.2',
                'index'            => 'Analisis Data',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.14.4.3',
                'index'            => 'Penyusunan Publikasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.14.5',
                'index'            => 'Evaluasi dan Pelaporan Sensus, Survei, dan Konsolidasi Data Statistik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],

            // Data 500.15 - KETENAGAKERJAAN
            [
                'kode_klasifikasi' => '500.15',
                'index'            => 'KETENAGAKERJAAN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.15.1',
                'index'            => 'Kebijakan di Bidang Ketenagakerjaan yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.15.2',
                'index'            => 'Perencanaan Tenaga Kerja',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.15.2.1',
                'index'            => 'Perencanaan Tenaga Kerja Perusahaan Pemerintah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.15.2.2',
                'index'            => 'Perencanaan Tenaga Kerja Perusahaan Swasta',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.15.3',
                'index'            => 'Pengembangan Standardisasi Kompetensi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.15.3.1',
                'index'            => 'Penerapan Standar Kompetensi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.3.2',
                'index'            => 'Pengembangan Standardisasi Kompetensi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.3.3',
                'index'            => 'Pengembangan Program Pelatihan Ketenagakerjaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.3.4',
                'index'            => 'Pengembangan Program Pelatihan Produktivitas dan Kewirausahaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.3.5',
                'index'            => 'Pengembangan Program Pelatihan Ketransmigrasian',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.4',
                'index'            => 'Bina Lembaga dan Sarana Pelatihan Kerja',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.15.4.1',
                'index'            => 'Akreditasi dan Sistem Informasi Kelembagaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.15.4.2',
                'index'            => 'Pengembangan Sarana dan Fasilitas Lembaga Pelatihan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.4.3',
                'index'            => 'Pengembangan Standar Mutu (PSM) Lembaga Pelatihan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.4.4',
                'index'            => 'Sistem Pendanaan dan Kerja Sama Antarlembaga',
                'retensi_aktif'    => '3 Tahun Setelah Kerja Sama Selesai dan Kewajiban Para Pihak Telah Ditunaikan',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.15.5',
                'index'            => 'Bina Instruktur dan Tenaga Pelatihan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.15.5.1',
                'index'            => 'Instruktur dan PSM Lembaga Pelatihan Pemerintah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.5.2',
                'index'            => 'Instruktur Lembaga Pelatihan Swasta',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.5.3',
                'index'            => 'Tenaga Pelatihan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.5.4',
                'index'            => 'Sistem Informasi Instruktur, PSM, dan Tenaga Pelatihan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.6',
                'index'            => 'Bina Pemagangan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.15.6.1',
                'index'            => 'Pemagangan Dalam Negeri',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.6.2',
                'index'            => 'Pemagangan Luar Negeri',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.6.3',
                'index'            => 'Perizinan dan Advokasi Pemagangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.6.4',
                'index'            => 'Promosi dan Jenjang Pemagangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.7',
                'index'            => 'Produktivitas dan Kewirausahaan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.15.7.1',
                'index'            => 'Pengembangan Promosi dan Kerja Sama Produktivitas dan Kewirausahaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.7.2',
                'index'            => 'Pengembangan Sistem dan Peningkatan Produktivitas',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.7.3',
                'index'            => 'Pengembangan Pengukuran dan Kajian Produktivitas',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.7.4',
                'index'            => 'Pengembangan Kewirausahaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.8',
                'index'            => 'Pengembangan Pasar Kerja',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.15.8.1',
                'index'            => 'Informasi Pasar Kerja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.8.2',
                'index'            => 'Analisis Pasar Kerja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.8.3',
                'index'            => 'Bursa Kerja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.8.4',
                'index'            => 'Analisis Jabatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.9',
                'index'            => 'Penempatan Tenaga Kerja Dalam Negeri',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.15.9.1',
                'index'            => 'Antarkerja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.9.2',
                'index'            => 'Penempatan Tenaga Kerja Khusus',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.9.3',
                'index'            => 'Penyuluhan dan Bimbingan Jabatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.9.4',
                'index'            => 'Pemberdayaan Pengantar Kerja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.10',
                'index'            => 'Perluasan Kesempatan Kerja dan Pengembangan Tenaga Kerja Sektor Informal',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.15.10.1',
                'index'            => 'Tenaga Kerja Mandiri dan Sektoral Informal',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.10.2',
                'index'            => 'Pengembangan Padat Karya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.10.3',
                'index'            => 'Terapan Teknologi Tepat Guna',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.15.10.4',
                'index'            => 'Pemberdayaan Pendampingan dan Kerja Sama Antarlembaga',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.11',
                'index'            => 'Standardisasi Profesi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.15.11.1',
                'index'            => 'Sistem Informasi dan Registrasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.15.11.2',
                'index'            => 'Pembakuan Akreditasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.12',
                'index'            => 'Persyaratan Kerja, Kesejahteraan, dan Analisis Diskriminasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.15.12.1',
                'index'            => 'Peraturan Perusahaan dan Perjanjian Kerja Sama Bersama',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.15.12.2',
                'index'            => 'Perjanjian Kerja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.15.12.3',
                'index'            => 'Kesejahteraan Pekerja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.12.4',
                'index'            => 'Analisis Diskriminasi Syarat Kerja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.13',
                'index'            => 'Kelembagaan dan Pemasyarakatan Hubungan Industrial',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.15.13.1',
                'index'            => 'Organisasi Pekerja dan Pengusaha',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.13.2',
                'index'            => 'Kelembagaan Hubungan Industrial',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.13.3',
                'index'            => 'Pemasyarakatan Hubungan Industrial',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.14',
                'index'            => 'Pengupahan dan Penyelesaian Perselisihan Hubungan Industrial',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.15.14.1',
                'index'            => 'Pengupahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.14.2',
                'index'            => 'Jaminan Sosial Tenaga Kerja Dalam Hubungan Kerja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.15',
                'index'            => 'Pencegahan dan Penyelesaian Pelestarian Hubungan Industrial',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.15.15.1',
                'index'            => 'Pencegahan Perselisihan Hubungan Industrial',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.15.2',
                'index'            => 'Penyelenggaraan Penyelesaian Perselisihan Hubungan Industrial',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.15.15.3',
                'index'            => 'Pemberdayaan Kelembagaan dan Tenaga Penyelesaian Perselisihan Hubungan Industrial',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.15.16',
                'index'            => 'Pengawasan Norma Kerja dan Jaminan Sosial Tenaga Kerja',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.15.16.1',
                'index'            => 'Pengawasan Norma Kerja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.16.2',
                'index'            => 'Pengawasan Norma Hubungan Kerja dan Pelindungan Berserikat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.16.3',
                'index'            => 'Pengawasan Norma Penempatan dan Latihan Tenaga Kerja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.17',
                'index'            => 'Pengawasan Norma Kerja Perempuan dan Anak',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.15.17.1',
                'index'            => 'Pengawasan Norma Kerja Perempuan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.17.2',
                'index'            => 'Pengawasan Norma Kerja Anak',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.17.3',
                'index'            => 'Kerja Sama Lintas Sektoral',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.17.4',
                'index'            => 'Advokasi Tenaga Kerja Perempuan dan Anak',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.18',
                'index'            => 'Pengawasan Norma Keselamatan dan Kesehatan Kerja',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.15.18.1',
                'index'            => 'Pengawasan Norma Mekanik, Pesawat Uap dan Bejana Tekan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.18.2',
                'index'            => 'Pengawasan Norma Konstruksi Bangunan, Listrik dan Penanggulangan Kebakaran',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.18.3',
                'index'            => 'Pengawasan Norma Kesehatan Kerja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.18.4',
                'index'            => 'Pengawasan Norma Lingkungan Kerja dan Bahan Berbahaya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.18.5',
                'index'            => 'Pengawasan Norma Kelembagaan, Keahlian, dan Sistem Manajemen K3',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.19',
                'index'            => 'Laporan Hasil Pengawasan Ketenagakerjaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.15.20',
                'index'            => 'Bina Penegakan Hukum',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.15.20.1',
                'index'            => 'Pemeriksaan Norma Ketenagakerjaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.20.2',
                'index'            => 'Penyidikan Norma Ketenagakerjaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.20.3',
                'index'            => 'Pengembangan Penyidik Pegawai Negeri Sipil',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.20.4',
                'index'            => 'Kerja Sama Penegakan Hukum',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.15.21',
                'index'            => 'Pengkajian dan Bimbingan Teknis Pelayanan Keselamatan dan Kesehatan Kerja (K3)',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.15.21.1',
                'index'            => 'Analisis dan Standardisasi bidang K3',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.15.21.2',
                'index'            => 'Hasil Kajian, Perekayasaan dan Penerapan Teknologi, dan Alih Teknologi K3',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.15.21.3',
                'index'            => 'Bimbingan Teknis dan Evaluasi Pengkajian K3',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.21.4',
                'index'            => 'Bimbingan Teknis dan Evaluasi Pelayanan K3',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.15.22',
                'index'            => 'Pengembangan SDM dan Kompetensi K3',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.15.22.1',
                'index'            => 'Program, Analisis dan Standardisasi Pengembangan SDM dan Kompetensi K3',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.15.22.2',
                'index'            => 'Penyebarluasan Informasi Pengembangan SDM dan Kompetensi K3',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.15.22.3',
                'index'            => 'Kerja Sama Tingkat Nasional Bidang Pengembangan SDM dan Kompetensi K3',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.15.22.4',
                'index'            => 'Kerja Sama Tingkat Regional Bidang Pengembangan SDM dan Kompetensi K3',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.15.22.5',
                'index'            => 'Kerja Sama Tingkat Internasional Bidang Pengembangan SDM dan Kompetensi K3',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.15.22.6',
                'index'            => 'Bimbingan Teknis dan Evaluasi Pengembangan SDM dan Kompetensi K3',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],

            // Data 500.16 - PENANAMAN MODAL
            [
                'kode_klasifikasi' => '500.16',
                'index'            => 'PENANAMAN MODAL',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.16.1',
                'index'            => 'Kebijakan di Bidang Penanaman Modal yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.16.2',
                'index'            => 'Perencanaan Penanaman Modal',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.16.2.1',
                'index'            => 'Perencanaan Industri Agribisnis dan Sumber Daya Alam Lainnya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.16.2.2',
                'index'            => 'Perencanaan Industri Manufaktur',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.16.2.3',
                'index'            => 'Perencanaan Jasa dan Kawasan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.16.2.4',
                'index'            => 'Perencanaan Infrastruktur',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.16.3',
                'index'            => 'Pengembangan Iklim Penanaman Modal',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.16.3.1',
                'index'            => 'Deregulasi Penanaman Modal',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.16.3.2',
                'index'            => 'Pengembangan Potensi Daerah',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.16.3.3',
                'index'            => 'Pemberdayaan Usaha',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.16.3.4',
                'index'            => 'Pemberdayaan Usaha Pembinaan dan Penyuluhan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.16.3.5',
                'index'            => 'Pemberdayaan Usaha Kemitraan Usaha',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.16.3.6',
                'index'            => 'Pemberdayaan Usaha Pelayanan Usaha',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.16.4',
                'index'            => 'Promosi Penanaman Modal',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.16.4.1',
                'index'            => 'Pengembangan Promosi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.16.4.2',
                'index'            => 'Analisis Strategi Promosi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.16.4.3',
                'index'            => 'Fasilitasi Promosi Luar Negeri',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.16.4.4',
                'index'            => 'Promosi Sektoral',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.16.4.5',
                'index'            => 'Fasilitasi Promosi Daerah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.16.4.6',
                'index'            => 'Pameran dan Sarana Promosi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.16.5',
                'index'            => 'Kerja Sama Penanaman Modal',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.16.5.1',
                'index'            => 'Kerja Sama Bilateral dan Multilateral',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.16.5.2',
                'index'            => 'Kerja Sama Regional',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.16.5.3',
                'index'            => 'Kerja Sama Dunia Usaha Internasional',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.16.6',
                'index'            => 'Pengendalian Pelaksanaan Penanaman Modal',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.16.6.1',
                'index'            => 'Pemantauan Penanaman Modal',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.16.6.2',
                'index'            => 'Data Realisasi Penanaman Modal',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.16.6.3',
                'index'            => 'Bimbingan Sosialisasi Ketentuan Penanaman Modal',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.16.6.4',
                'index'            => 'Fasilitasi Penyelesaian Masalah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.16.6.5',
                'index'            => 'Pengawasan Penanaman Modal',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.16.6.6',
                'index'            => 'Pencabutan/Pembatalan Perizinan Penanaman Modal',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.16.7',
                'index'            => 'Pelayanan Penanaman Modal',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.16.7.1',
                'index'            => 'Pelayanan Aplikasi',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.16.7.2',
                'index'            => 'Pelayanan Perizinan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.16.7.3',
                'index'            => 'Pelayanan Konsultasi Perizinan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.16.7.4',
                'index'            => 'Pelayanan Nonperizinan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.16.7.5',
                'index'            => 'Pelayanan Fasilitas',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],

            // Data 500.17 - PERTANAHAN
            [
                'kode_klasifikasi' => '500.17',
                'index'            => 'PERTANAHAN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.17.1',
                'index'            => 'Kebijakan di Bidang Pertanahan yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.17.2',
                'index'            => 'Pengadaan dan Penataan Administrasi Pertanahan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.17.2.1',
                'index'            => 'Fasilitasi Pengadaan Tanah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.17.2.2',
                'index'            => 'Pembinaan dan Pengendalian Administrasi Pertanahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.17.2.3',
                'index'            => 'Data dan Informasi Pertanahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.17.2.4',
                'index'            => 'Advokasi dan Pengendalian',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.17.3',
                'index'            => 'Penatagunaan dan Penguatan Hak Atas Tanah',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.17.3.1',
                'index'            => 'Penatagunaan Tanah',
                'retensi_aktif'    => '2 Tahun Setelah Izin Tidak Berlaku',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.17.3.2',
                'index'            => 'Data dan Pemetaan Tematik',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.17.3.3',
                'index'            => 'Penguatan Atas Tanah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.17.4',
                'index'            => 'Sengketa Tanah',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.17.4.1',
                'index'            => 'Pengkajian dan Penanganan Sengketa',
                'retensi_aktif'    => '2 Tahun Setelah Adanya Kekuatan Hukum Tetap',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.17.4.2',
                'index'            => 'Advokasi dan Pengendalian',
                'retensi_aktif'    => '2 Tahun Setelah Adanya Kekuatan Hukum Tetap',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],

            // Data 500.18 - TRANSMIGRASI
            [
                'kode_klasifikasi' => '500.18',
                'index'            => 'TRANSMIGRASI',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.18.1',
                'index'            => 'Kebijakan di Bidang Transmigrasi yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.18.2',
                'index'            => 'Penyediaan Tanah Transmigrasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.18.2.1',
                'index'            => 'Fasilitasi Pengadaan Tanah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.18.2.2',
                'index'            => 'Pengurusan Legalitas Tanah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.18.2.3',
                'index'            => 'Dokumentasi Pertanahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.18.2.4',
                'index'            => 'Advokasi Pertanahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.18.3',
                'index'            => 'Pembangunan Pemukiman dan Infrastruktur Kawasan Transmigrasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.18.3.1',
                'index'            => 'Penyiapan Lahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.18.3.2',
                'index'            => 'Penyiapan Sarana',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.18.3.3',
                'index'            => 'Penyiapan Prasarana',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.18.3.4',
                'index'            => 'Evaluasi Kelayakan Permukiman',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.18.4',
                'index'            => 'Fasilitasi Penempatan Transmigrasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.18.4.1',
                'index'            => 'Penyiapan Calon Transmigrasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.18.4.2',
                'index'            => 'Penyiapan Perpindahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.18.4.3',
                'index'            => 'Pelaksanaan Perpindahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.18.4.4',
                'index'            => 'Penataan dan Adaptasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.18.5',
                'index'            => 'Partisipasi Masyarakat',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.18.5.1',
                'index'            => 'Promosi dan Motivasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.18.5.2',
                'index'            => 'Kerja Sama Kelembagaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.18.5.3',
                'index'            => 'Kerja Sama Antardaerah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.18.5.4',
                'index'            => 'Pelayanan Investasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.18.6',
                'index'            => 'Pembinaan Pengembangan Masyarakat dan Kawasan Transmigrasi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.18.6.1',
                'index'            => 'Perencanaan Teknis Pengembangan Masyarakat dan Kawasan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.18.6.2',
                'index'            => 'Bina Sistem Informasi',
                'retensi_aktif'    => '2 Tahun Setelah Sistem Aplikasi Ditingkatkan dan Dikembangkan (Upgrade)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.18.6.3',
                'index'            => 'Perencanaan Pengembangan Kawasan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.18.6.4',
                'index'            => 'Perencanaan Pengembangan Masyarakat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.18.6.5',
                'index'            => 'Perencanaan Pengembangan Pusat Pertumbuhan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.18.7',
                'index'            => 'Peningkatan Kapasitas Sumber Daya Manusia dan Masyarakat',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.18.7.1',
                'index'            => 'Bantuan Pangan dan Kesehatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.18.7.2',
                'index'            => 'Fasilitas Sosial Budaya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.18.7.3',
                'index'            => 'Pengembangan Kelembagaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.18.7.4',
                'index'            => 'Bina Pendampingan Masyarakat Transmigrasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.18.8',
                'index'            => 'Pengembangan Usaha',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.18.8.1',
                'index'            => 'Kewirausahaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.18.8.2',
                'index'            => 'Produksi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.18.8.3',
                'index'            => 'Pengolahan Hasil dan Pemasaran',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.18.8.4',
                'index'            => 'Lembaga Ekonomi dan Permodalan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.18.9',
                'index'            => 'Pengembangan Prasarana dan Sarana Kawasan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.18.9.1',
                'index'            => 'Analisis dan Standardisasi Prasarana dan Sarana',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.18.9.2',
                'index'            => 'Pengembangan Prasarana',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.18.9.3',
                'index'            => 'Pengembangan Sarana',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.18.9.4',
                'index'            => 'Evaluasi Pengembangan Prasarana dan Sarana',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.18.10',
                'index'            => 'Penyerasian Lingkungan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '500.18.10.1',
                'index'            => 'Persiapan Pengelolaan dan Pemantauan Lingkungan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.18.10.2',
                'index'            => 'Adaptasi dan Mitigasi Lingkungan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '500.18.10.3',
                'index'            => 'Evaluasi Perkembangan Permukiman Transmigrasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '500.18.10.4',
                'index'            => 'Evaluasi Perkembangan Pusat Pertumbuhan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1',
                'index'            => 'PEKERJAAN UMUM',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.1.1',
                'index'            => 'Kebijakan di Bidang Pekerjaan Umum yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.2',
                'index'            => 'Penatagunaan Sumber Daya Air',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.1.2.1',
                'index'            => 'Perencanaan Wilayah Sungai',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.2.2',
                'index'            => 'Kelembagaan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.2.3',
                'index'            => 'Pemanfaatan Sumber Daya Air',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.2.4',
                'index'            => 'Hidrologi dan Lingkungan Sumber Daya Air',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.2.5',
                'index'            => 'Pengaturan dan Pemantauan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.3',
                'index'            => 'Pengembangan Jaringan Sumber Daya Air',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.1.3.1',
                'index'            => 'Perencanaan Pengelolaan Sumber Daya Air',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.3.2',
                'index'            => 'Manajemen Mutu',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.3.3',
                'index'            => 'Informasi dan Data Sumber Daya Air (Pengembangan Sistem Informasi dan Pengelolaan Data dan Informasi)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.3.4',
                'index'            => 'Keterpaduan Pemrograman',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.4',
                'index'            => 'Pengelolaan Sumber Daya Air',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.1.4.1',
                'index'            => 'Pengelolaan Sungai dan Pantai',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.4.2',
                'index'            => 'Pengelolaan Irigasi dan Rawa',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.4.3',
                'index'            => 'Pengelolaan Bendungan, Danau, Situ, dan Embung',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.4.4',
                'index'            => 'Pengelolaan Air Tanah dan Air Baku',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.5',
                'index'            => 'Operasi dan Pemeliharaan Sumber Daya Air',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.1.5.1',
                'index'            => 'Operasi dan Pemeliharaan Sungai dan Pantai',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.5.2',
                'index'            => 'Operasi dan Pemeliharaan Irigasi dan Rawa',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.5.3',
                'index'            => 'Operasi dan Pemeliharaan Bendungan, Danau, Situ, dan Embung',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.5.4',
                'index'            => 'Operasi dan Pemeliharaan Air Tanah dan Air Baku',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.5.5',
                'index'            => 'Operasi dan Pemeliharaan Pengendalian Lumpur',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.6',
                'index'            => 'Pengendalian Lumpur (Bencana Lokal Lingkup Nasional)',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.1.6.1',
                'index'            => 'Perencanaan Pengendalian Lumpur',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.6.2',
                'index'            => 'Pemrograman Pengendalian Lumpur',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.6.3',
                'index'            => 'Pelaksanaan Pengendalian Lumpur',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.6.4',
                'index'            => 'Pengendalian Dampak Sosial, Ekonomi, dan Lingkungan akibat Lumpur',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.6.5',
                'index'            => 'Sistem Manajemen Keselamatan dan Kesehatan Kerja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.7',
                'index'            => 'Pengembangan Jaringan Jalan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.1.7.1',
                'index'            => 'Keterpaduan Perencanaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.7.2',
                'index'            => 'Sistem Jaringan Jalan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.7.3',
                'index'            => 'Lingkungan dan Keselamatan Jalan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.8',
                'index'            => 'Pembangunan Jalan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.1.8.1',
                'index'            => 'Standar dan Pedoman',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.8.2',
                'index'            => 'Manajemen Konstruksi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.8.3',
                'index'            => 'Pengelolaan Geometrik, Perkerasan, dan Drainase',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.8.4',
                'index'            => 'Pengelolaan Geoteknik dan Manajemen Lereng',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.9',
                'index'            => 'Preservasi Jalan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.1.9.1',
                'index'            => 'Standar dan Pedoman',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.9.2',
                'index'            => 'Perencanaan Teknis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.9.3',
                'index'            => 'Teknik Rekonstruksi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.9.4',
                'index'            => 'Teknik Pemeliharaan Jalan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.10',
                'index'            => 'Pengelolaan Jembatan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.1.10.1',
                'index'            => 'Standar dan Pedoman',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.10.2',
                'index'            => 'Perencanaan Teknis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.10.3',
                'index'            => 'Teknik Jembatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.10.4',
                'index'            => 'Teknik Terowongan dan Jembatan Khusus',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.11',
                'index'            => 'Pengelolaan Jalan Bebas Hambatan, Perkotaan, dan Fasilitas Jalan Daerah',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.1.11.1',
                'index'            => 'Bimbingan Teknik Jalan Daerah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.11.2',
                'index'            => 'Pengembangan Jalan Metropolitan dan Kota Besar',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.11.3',
                'index'            => 'Hidrologi dan Lingkungan Sumber Daya Air',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.12',
                'index'            => 'Pengaturan Jalan Tol',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.1.12.1',
                'index'            => 'Persiapan Pengusahaan Jalan Tol',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.12.2',
                'index'            => 'Pengadaan Investasi Jalan Tol',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '8 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.12.3',
                'index'            => 'Teknik Pengaturan Jalan Tol',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.12.4',
                'index'            => 'Pengambilalihan Hak Pengusahaan Jalan Tol',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '8 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.13',
                'index'            => 'Keterpaduan Infrastruktur Permukiman',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.1.13.1',
                'index'            => 'Keterpaduan Perencanaan dan Kemitraan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.13.2',
                'index'            => 'Keterpaduan Pembiayaan dan Pelaksanaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.14',
                'index'            => 'Pengembangan Kawasan Permukiman',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.1.14.1',
                'index'            => 'Perencanaan Teknis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.14.2',
                'index'            => 'Kawasan Permukiman Perkotaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.14.3',
                'index'            => 'Kawasan Permukiman Perdesaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.14.4',
                'index'            => 'Kawasan Permukiman Khusus',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.14.5',
                'index'            => 'Kelembagaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.15',
                'index'            => 'Pembinaan Penataan Bangunan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.1.15.1',
                'index'            => 'Perencanaan Teknis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.15.2',
                'index'            => 'Penataan Bangunan Gedung',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.15.3',
                'index'            => 'Pengelolaan Rumah Negara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.15.4',
                'index'            => 'Penataan Bangunan dan Lingkungan Khusus',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.15.5',
                'index'            => 'Kelembagaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.16',
                'index'            => 'Pengembangan Sistem Penyediaan Air Minum',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.1.16.1',
                'index'            => 'Perencanaan Teknis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.16.2',
                'index'            => 'Sistem Penyediaan Air Minum Perkotaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.16.3',
                'index'            => 'Sistem Penyediaan Air Minum Perdesaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.16.4',
                'index'            => 'Sistem Penyediaan Air Minum Khusus',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.16.5',
                'index'            => 'Kelembagaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.16.6',
                'index'            => 'Peningkatan Penyelenggaraan Sistem Penyediaan Air Minum',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.16.7',
                'index'            => 'Pengelolaan Laboratorium dan Bengkel Kerja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.17',
                'index'            => 'Pengembangan Penyehatan Lingkungan Permukiman',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.1.17.1',
                'index'            => 'Perencanaan Teknis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.17.2',
                'index'            => 'Pengelolaan Air Limbah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.17.3',
                'index'            => 'Pengelolaan Persampahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.1.17.4',
                'index'            => 'Penyehatan Lingkungan Permukiman Khusus',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.17.5',
                'index'            => 'Kelembagaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.17.6',
                'index'            => 'Pengelolaan Laboratorium dan Bengkel Kerja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.1.18',
                'index'            => 'Pemantauan dan Evaluasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],

            // Data 600.2 - PERUMAHAN RAKYAT DAN KAWASAN PEMUKIMAN
            [
                'kode_klasifikasi' => '600.2',
                'index'            => 'PERUMAHAN RAKYAT DAN KAWASAN PEMUKIMAN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.2.1',
                'index'            => 'Kebijakan di Bidang Perumahan Rakyat dan Kawasan Pemukiman yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.2',
                'index'            => 'Perencanaan Pembiayaan Perumahan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.2.2.1',
                'index'            => 'Keterpaduan Perencanaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.2.2.2',
                'index'            => 'Strategi Pembiayaan dan Analisis Pasar Perumahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.2.3',
                'index'            => 'Kemitraan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.3',
                'index'            => 'Pola Pembiayaan Perumahan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.2.3.1',
                'index'            => 'Pola Pembiayaan Perumahan Rumah Umum',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.3.2',
                'index'            => 'Pola Pembiayaan Perumahan Rumah Swadaya dan Mikro Perumahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.3.3',
                'index'            => 'Pola Investasi Perumahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.4',
                'index'            => 'Pendayagunaan Sumber Pembiayaan Perumahan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.2.4.1',
                'index'            => 'Sumber Pembiayaan Primer',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.4.2',
                'index'            => 'Sumber Pembiayaan Sekunder',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.4.3',
                'index'            => 'Sumber Tabungan Perumahan dan Pembiayaan Lainnya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.4.4',
                'index'            => 'Sistem Pembiayaan Perumahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.4.5',
                'index'            => 'Pengelolaan Dana Pembiayaan Perumahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.5',
                'index'            => 'Perencanaan Penyediaan Perumahan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.2.5.1',
                'index'            => 'Keterpaduan Perencanaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.5.2',
                'index'            => 'Analisis Teknik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.5.3',
                'index'            => 'Rencana Pengembangan Lingkungan Hunian',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.5.4',
                'index'            => 'Kemitraan dan Kelembagaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.6',
                'index'            => 'Penyediaan Rumah Susun',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.2.6.1',
                'index'            => 'Perencanaan Teknik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.6.2',
                'index'            => 'Penyediaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.6.3',
                'index'            => 'Penghunian, Pengalihan, dan Pemanfaatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.6.4',
                'index'            => 'Pengelolaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.7',
                'index'            => 'Penyediaan Rumah Khusus',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.2.7.1',
                'index'            => 'Perencanaan Teknik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.7.2',
                'index'            => 'Penyediaan dan Pengelolaan Rumah Tapak Khusus',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.7.3',
                'index'            => 'Bimbingan Teknis dan Supervisi',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.2.7.4',
                'index'            => 'Penyelenggaraan Bantuan Rumah Swadaya',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.7.5',
                'index'            => 'Perencanaan Teknik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.7.6',
                'index'            => 'Fasilitas Backlog Rumah Swadaya dan Rumah Tidak Layak Huni',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.7.7',
                'index'            => 'Pelaksanaan Bantuan Simultan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.2.8',
                'index'            => 'Penyediaan Rumah Umum dan Komersial',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.2.8.1',
                'index'            => 'Perencanaan Teknik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.2.8.2',
                'index'            => 'Pemberian Bantuan Rumah Umum',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.8.3',
                'index'            => 'Fasilitasi Hunian Berimbang',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.8.4',
                'index'            => 'Fasilitasi Penyediaan Lahan Perumahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.9',
                'index'            => 'Investasi Infrastruktur',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.2.9.1',
                'index'            => 'Pelaksanaan Kebijakan Investasi Infrastruktur',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.2.9.2',
                'index'            => 'Sinkronisasi Investasi Infrastruktur',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.2.9.3',
                'index'            => 'Fasilitasi dan Mitigasi Risiko Investasi Infrastruktur',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.2.9.4',
                'index'            => 'Pasar Infrastruktur',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.2.10',
                'index'            => 'Penyelenggaraan Jasa Konstruksi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.2.10.1',
                'index'            => 'Sistem Penyelenggaraan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.2.10.2',
                'index'            => 'Kontrak Konstruksi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.2.10.3',
                'index'            => 'Konstruksi Berkelanjutan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.2.10.4',
                'index'            => 'Manajemen Mutu',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.2.11',
                'index'            => 'Kelembagaan dan Sumber Daya Konstruksi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.2.11.1',
                'index'            => 'Kelembagaan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.2.11.2',
                'index'            => 'Material dan Peralatan Konstruksi',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.2.11.3',
                'index'            => 'Teknologi Konstruksi dan Produksi Dalam Negeri',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.2.11.4',
                'index'            => 'Usaha Jasa Konstruksi',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.2.12',
                'index'            => 'Kompetensi dan Produktivitas Konstruksi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.2.12.1',
                'index'            => 'Standar dan Materi Kompetensi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.2.12.2',
                'index'            => 'Penerapan Kompetensi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.2.12.3',
                'index'            => 'Pengembangan Profesi Jasa Konstruksi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.12.4',
                'index'            => 'Pengembangan Produktivitas',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.2.13',
                'index'            => 'Peningkatan Kerja Sama dan Pemberdayaan Jasa Konstruksi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.2.13.1',
                'index'            => 'Peningkatan Kerja Sama',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.2.13.2',
                'index'            => 'Pemberdayaan Jasa Konstruksi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.2.14',
                'index'            => 'Peningkatan Jasa Konstruksi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.2.14.1',
                'index'            => 'Koordinasi dan Sinkronisasi Rencana Kerja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.2.14.2',
                'index'            => 'Pelaksanaan Pengendalian Mutu',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.15',
                'index'            => 'Penerapan Teknologi Konstruksi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.2.15.1',
                'index'            => 'Koordinasi, Sinkronisasi, dan Kerja Sama Penerapan Teknologi Konstruksi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.15.2',
                'index'            => 'Pengembangan Materi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.2.15.3',
                'index'            => 'Pendayagunaan Material dan Peralatan Konstruksi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.2.16',
                'index'            => 'Rencana Pengembangan Infrastruktur Pekerjaan Perumahan Rakyat (PUPR)',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.2.16.1',
                'index'            => 'Antarsektor',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.16.2',
                'index'            => 'Antarwilayah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.17',
                'index'            => 'Pengembangan Kawasan Strategis',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.2.17.1',
                'index'            => 'Keterpaduan Infrastruktur Kawasan Strategis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.17.2',
                'index'            => 'Pengembangan Infrastruktur Antarkawasan Strategis',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.2.18',
                'index'            => 'Pengembangan Kawasan Perkotaan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.2.18.1',
                'index'            => 'Pengembangan Infrastruktur Kawasan Metropolitan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.18.2',
                'index'            => 'Pengembangan Infrastruktur Kawasan Kota Besar dan Kota Baru',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.18.3',
                'index'            => 'Pengembangan Infrastruktur Kawasan Kota Kecil dan Perdesaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.18.4',
                'index'            => 'Analisis Manfaat dan Skema Pembiayaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.18.5',
                'index'            => 'Sinkronisasi Program dan Pembiayaan Infrastruktur Perumahan Rakyat (PUPR)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.2.19',
                'index'            => 'Pemantauan dan Evaluasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],

            // Data 600.3 - TATA RUANG (TATA KOTA)
            [
                'kode_klasifikasi' => '600.3',
                'index'            => 'TATA RUANG (TATA KOTA)',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.3.1',
                'index'            => 'Kebijakan di Bidang Tata Ruang yang Dilakukan Pemerintahan Daerah',
                'retensi_aktif'    => '1 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.3.2',
                'index'            => 'Perencanaan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.3.2.1',
                'index'            => 'Tata Ruang Wilayah Kabupaten (RT/RW)',
                'retensi_aktif'    => '1 Tahun Setelah Tidak Dipergunakan',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.3.2.2',
                'index'            => 'Rencana Detail Tata Ruang (RDTR)',
                'retensi_aktif'    => '1 Tahun Setelah Tidak Dipergunakan',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.3.2.3',
                'index'            => 'Rencana Tata Ruang Strategis Kabupaten',
                'retensi_aktif'    => '1 Tahun Setelah Tidak Dipergunakan',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.3.2.4',
                'index'            => 'Rencana Tata Bangun Lingkungan (RTBL)',
                'retensi_aktif'    => '1 Tahun Setelah Tidak Dipergunakan',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.3.2.5',
                'index'            => 'Rencana Pengembangan Sistem Sarana dan Prasarana Kabupaten',
                'retensi_aktif'    => '1 Tahun Setelah Tidak Dipergunakan',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.3.2.6',
                'index'            => 'Rencana Teknis Prasarana Kota',
                'retensi_aktif'    => '1 Tahun Setelah Tidak Dipergunakan',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.3.2.7',
                'index'            => 'Rencana Teknis, Rencana Peremajaan, dan Pengembangan Kota Prasarana Kota',
                'retensi_aktif'    => '1 Tahun Setelah Tidak Dipergunakan',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.3.3',
                'index'            => 'Pemanfaatan dan Pengendalian',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.3.3.1',
                'index'            => 'Evaluasi dan Pengawasan Penata Ruang',
                'retensi_aktif'    => '2 Tahun Setelah Tidak Berlaku',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.3.3.2',
                'index'            => 'Izin Pemanfaatan Ruang',
                'retensi_aktif'    => '2 Tahun Setelah Tidak Berlaku',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.3.3.3',
                'index'            => 'Pembatalan Izin Pemanfaatan Ruang',
                'retensi_aktif'    => '2 Tahun Setelah Tidak Berlaku',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.3.4',
                'index'            => 'Pemetaan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.3.4.1',
                'index'            => 'Peta Dasar',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.3.4.2',
                'index'            => 'Survei Pemetaan Ruang Darat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.3.4.3',
                'index'            => 'Survei Pemetaan Ruang Air',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.3.4.4',
                'index'            => 'Survei Pemetaan Ruang Udara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],

            // Data 600.4 - LINGKUNGAN HIDUP
            [
                'kode_klasifikasi' => '600.4',
                'index'            => 'LINGKUNGAN HIDUP',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.4.1',
                'index'            => 'Kebijakan di Bidang Lingkungan Hidup yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.2',
                'index'            => 'Perencanaan Pemanfaatan Sumber Daya Alam dan Lingkungan Hidup',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.4.2.1',
                'index'            => 'Inventarisasi, Penerapan Ekoregion, dan Rencana Pelindungan dan Pengelolaan Lingkungan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.2.2',
                'index'            => 'Evaluasi Pemanfaatan Sumber Daya Alam',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.3',
                'index'            => 'Penerapan Kebijakan Wilayah dan Sektor',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.4.3.1',
                'index'            => 'Evaluasi Penerapan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.3.2',
                'index'            => 'Perencanaan Lingkungan Hidup',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.4',
                'index'            => 'Ekonomi Lingkungan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.5',
                'index'            => 'Dampak Lingkungan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.4.5.1',
                'index'            => 'Bimbingan Teknis Dampak Lingkungan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.4.5.2',
                'index'            => 'Penerapan Sistem Kebijakan Dampak Lingkungan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.5.3',
                'index'            => 'Evaluasi dan Tindak Lanjut',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.6',
                'index'            => 'Pemantauan dan Pengawasan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.4.6.1',
                'index'            => 'Manufaktur Prasarana dan Jasa',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.6.2',
                'index'            => 'Pertambangan Energi, Minyak, dan Gas',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.6.3',
                'index'            => 'Agro Industri dan Usaha Skala Kecil',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.6.4',
                'index'            => 'Udara Sumber Bergerak',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.7',
                'index'            => 'Evaluasi dan Pengembangan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.4.7.1',
                'index'            => 'Manufaktur, Prasarana, dan Jasa',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.4.7.2',
                'index'            => 'Pertambangan Energi, Minyak, dan Gas',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.4.7.3',
                'index'            => 'Agro Industri dan Usaha Skala Kecil',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.4.7.4',
                'index'            => 'Udara Sumber Bergerak',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.4.8',
                'index'            => 'Keanekaragaman Hayati dan Pengendalian Kerusakan Lahan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.4.8.1',
                'index'            => 'Pengembangan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.8.2',
                'index'            => 'Pemanfaatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.8.3',
                'index'            => 'Pengelolaan Sumber Daya Genetik',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.8.4',
                'index'            => 'Keamanan Hayati',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.8.5',
                'index'            => 'Pengendalian Kerusakan Lahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.9',
                'index'            => 'Kerusakan Ekosistem Perairan Darat',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.4.9.1',
                'index'            => 'Kerusakan Ekosistem',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.9.2',
                'index'            => 'Rawa',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.10',
                'index'            => 'Mitigasi dan Pelestarian Fungsi Atmosfer',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.4.10.1',
                'index'            => 'Perangkat Mitigasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.10.2',
                'index'            => 'Inventarisasi Emisi Gas Rumah Kaca',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.4.10.3',
                'index'            => 'Pengendalian Bahan Perusak Ozon',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.10.4',
                'index'            => 'Pengendalian Kerusakan Akibat Kebakaran Hutan dan Lahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.11',
                'index'            => 'Adaptasi Perubahan Iklim',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.4.11.1',
                'index'            => 'Perangkat Adaptasi Perubahan Iklim, antara lain: Pengembangan Perangkat Adaptasi Perubahan Iklim, Pemantauan, dan Evaluasi Adaptasi Perusahaan Iklim',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.11.2',
                'index'            => 'Kerentanan Perubahan Iklim',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.12',
                'index'            => 'Pengelolaan Bahan Berbahaya dan Beracun',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.4.12.1',
                'index'            => 'Registrasi dan Notifikasi',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.12.2',
                'index'            => 'Pemantauan Bahan Berbahaya dan Beracun',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.12.3',
                'index'            => 'Evaluasi dan Tindak Lanjut',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.13',
                'index'            => 'Verifikasi Pengelolaan Limbah Bahan Berbahaya dan Beracun (B3)',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.4.13.1',
                'index'            => 'Pengumpulan dan Pemanfaatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.13.2',
                'index'            => 'Pengangkutan dan Pengolahan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.13.3',
                'index'            => 'Penimbunan dan Dumping',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.13.4',
                'index'            => 'Notifikasi dan Rekomendasi Limbah Lintas Batas',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.14',
                'index'            => 'Pengelolaan Limbah B3 dan Pemulihan Kontaminasi Limbah B3',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.4.14.1',
                'index'            => 'Pemantauan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.4.14.2',
                'index'            => 'Tanggap Darurat dan Pemulihan Kontaminasi',
                'retensi_aktif'    => '5 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.15',
                'index'            => 'Pengelolaan Sampah',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.4.15.1',
                'index'            => 'Pembatasan Sampah',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.15.2',
                'index'            => 'Daur Ulang dan Pemanfaatan Sampah',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.15.3',
                'index'            => 'Pembentukan Dewan Adipura',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.15.4',
                'index'            => 'Penetapan Pemenang Adipura',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.16',
                'index'            => 'Hukum Administrasi Lingkungan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.4.16.1',
                'index'            => 'Pengelolaan dan Pengembangan Pengaduan',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.4.16.2',
                'index'            => 'Penataan Hukum Administrasi Lingkungan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.4.17',
                'index'            => 'Penyelesaian Sengketa Lingkungan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.4.17.1',
                'index'            => 'Penyelesaian Sengketa melalui Pengadilan',
                'retensi_aktif'    => '2 Tahun Setelah Kasus/Perkara Mempunyai Kekuatan Hukum Tetap',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.17.2',
                'index'            => 'Penyelesaian Sengketa Lingkungan di Luar Pengadilan',
                'retensi_aktif'    => '2 Tahun Setelah Kasus/Perkara Mempunyai Kekuatan Hukum Tetap',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.18',
                'index'            => 'Penegakan Hukum Pidana Lingkungan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.4.18.1',
                'index'            => 'Penyidikan',
                'retensi_aktif'    => '7 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.18.2',
                'index'            => 'Koordinasi Penuntutan, Evaluasi, dan Tindak Lanjut',
                'retensi_aktif'    => '7 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.18.3',
                'index'            => 'Koordinasi Pembinaan Penyidik PNS',
                'retensi_aktif'    => '7 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.4.19',
                'index'            => 'Komunikasi Lingkungan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.4.19.1',
                'index'            => 'Pengembangan Komunikasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.4.19.2',
                'index'            => 'Publikasi dan Kampanye',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '600.4.20',
                'index'            => 'Penguatan Inisiatif Masyarakat',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.4.20.1',
                'index'            => 'Komunitas Pendidikan Lingkungan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.20.2',
                'index'            => 'Kearifan Lingkungan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.21',
                'index'            => 'Peningkatan Peran Masyarakat',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.4.21.1',
                'index'            => 'Masyarakat Perkotaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.21.2',
                'index'            => 'Masyarakat Perdesaan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.22',
                'index'            => 'Peningkatan Peran Organisasi Kemasyarakatan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.4.22.1',
                'index'            => 'Organisasi Sosial Masyarakat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.22.2',
                'index'            => 'Organisasi Profesi Dunia Usaha',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.23',
                'index'            => 'Data dan Informasi Lingkungan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.4.23.1',
                'index'            => 'Pengelolaan Data',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.23.2',
                'index'            => 'Pengelolaan Informasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.23.3',
                'index'            => 'Pengembangan Perangkat Lunak',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.23.4',
                'index'            => 'Pengembangan Sistem dan Layanan Jaringan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.24',
                'index'            => 'Kelembagaan Lingkungan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.4.24.1',
                'index'            => 'Kelembagaan dan Tata Laksana',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.24.2',
                'index'            => 'Fasilitasi Standar Pelayanan Minimal',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.25',
                'index'            => 'Standardisasi dan Teknologi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.4.25.1',
                'index'            => 'Standardisasi Manajemen dan Pengujian Lingkungan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.25.2',
                'index'            => 'Standardisasi Kompetensi Keahlian dan Lembaga Penyedia Jasa Lingkungan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.25.3',
                'index'            => 'Teknologi Ramah Lingkungan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.26',
                'index'            => 'Pusat Sarana Pengendalian Dampak Lingkungan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '600.4.26.1',
                'index'            => 'Pemantauan dan Kajian Kualitas Lingkungan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '600.4.26.2',
                'index'            => 'Laboratorium Rujukan dan Pengujian',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '700.1',
                'index'            => 'PENGAWASAN INTERNAL',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '700.1.1',
                'index'            => 'Rencana Pengawasan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '700.1.1.1',
                'index'            => 'Rencana Strategis Pengawasan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '700.1.1.2',
                'index'            => 'Rencana Kerja Pengawas Tahunan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '700.1.1.3',
                'index'            => 'Rencana Kinerja Tahunan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '700.1.1.4',
                'index'            => 'Rencana dan Penetapan Kinerja Tahunan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '700.1.1.5',
                'index'            => 'Rakor Pengawasan Tingkat Daerah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '700.1.2',
                'index'            => 'Pelaksanaan Pengawasan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '700.1.2.1',
                'index'            => 'Laporan Hasil Audit (LHA), Laporan Hasil Pemeriksaan (LHP), Laporan Hasil Pemeriksaan Operasional (LHPO), Laporan Hasil Evaluasi (LHE), Laporan Akuntan (LA), Laporan Auditor Independen (LAI) yang Memerlukan Tindak Lanjut (TL)',
                'retensi_aktif'    => '2 Tahun Setelah Tindak Lanjut Selesai',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '700.1.2.2',
                'index'            => 'Laporan Hasil Audit Investigasi (LHAI) yang Mengandung Unsur Tindak Pidana Korupsi (TPK) dan Memerlukan Tindak Lanjut',
                'retensi_aktif'    => '2 Tahun Setelah Keputusan Mempunyai Kekuatan Hukum Tetap',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '700.1.2.3',
                'index'            => 'Laporan Hasil Audit Investigasi (LHAI) yang Mengandung Unsur Tindak Pidana Korupsi (TPK) dan Tidak Memerlukan Tindak Lanjut',
                'retensi_aktif'    => '2 Tahun Setelah Keputusan Mempunyai Kekuatan Hukum Tetap',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '700.1.2.4',
                'index'            => 'Laporan Perkembangan Penanganan Surat Pengaduan Masyarakat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '700.1.2.5',
                'index'            => 'Laporan Pemutakhiran Data Tindak Lanjut Temuan',
                'retensi_aktif'    => '2 Tahun Setelah Proses Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '700.1.2.6',
                'index'            => 'Laporan Perkembangan Barang Milik Negara',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '700.1.2.7',
                'index'            => 'Laporan Hasil Monitoring dan Evaluasi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '700.1.2.8',
                'index'            => 'Laporan Kegiatan Pendampingan Penyusunan Laporan Keuangan dan Reviu',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '700.1.2.9',
                'index'            => 'Good Corporate Governance (GCG)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '800.1',
                'index'            => 'SUMBER DAYA MANUSIA',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '800.1.1',
                'index'            => 'Penyusunan dan Penetapan Kebutuhan Aparatur Sipil Negara',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '800.1.1.1',
                'index'            => 'Perencanaan Kebutuhan Aparatur Sipil Negara, antara lain: Bahan Penyusunan Rencana Kebutuhan, Analisis Kebutuhan, Pengolahan Data Kebutuhan',
                'retensi_aktif'    => '2 Tahun Sejak Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.1.2',
                'index'            => 'Perencanaan Pertimbangan Formasi, antara lain: Pertimbangan Teknis Penetapan Formasi ASN, Pertimbangan Teknis Penetapan Formasi Ikatan Dinas',
                'retensi_aktif'    => '2 Tahun Sejak Keputusan Lama Dinyatakan Tidak Berlaku',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.1.3',
                'index'            => 'Penetapan Kebutuhan Aparatur Sipil Negara',
                'retensi_aktif'    => '2 Tahun Sejak Keputusan Lama Dinyatakan Tidak Berlaku',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.1.4',
                'index'            => 'Standardisasi Jabatan, antara lain: Informasi Jabatan, Kompetensi Jabatan, Klasifikasi Jabatan',
                'retensi_aktif'    => '2 Tahun Sejak Standar Baru Ditetapkan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '800.1.2',
                'index'            => 'Formasi dan Pengadaan Pegawai',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '800.1.2.1',
                'index'            => 'Formasi ASN, antara lain: Usulan Formasi, Usulan Permintaan Formasi kepada Menpan RB dan Kepala BKN, Persetujuan Formasi, Penetapan Formasi, Penetapan Formasi Khusus',
                'retensi_aktif'    => '2 Tahun Sejak Keputusan Lama Dinyatakan Tidak Berlaku',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.2.2',
                'index'            => 'Proses Rekrutmen/Pengadaan ASN, antara lain: Proses Rekrutmen ASN, Penetapan Pengumuman Kelulusan ASN',
                'retensi_aktif'    => '2 Tahun Sejak Keputusan Lama Dinyatakan Tidak Berlaku',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.2.3',
                'index'            => 'Pengumuman Kelulusan ASN',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.2.4',
                'index'            => 'Berkas Lamaran yang Tidak Diterima',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.2.5',
                'index'            => 'Pengangkatan ASN (PNS/P3K)',
                'retensi_aktif'    => '1 Tahun Sejak Keputusan Lama Dinyatakan Tidak Berlaku',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah, kecuali SK Masuk Berkas Perseorangan'
            ],
            [
                'kode_klasifikasi' => '800.1.2.6',
                'index'            => 'Open Bidding (Seleksi Terbuka Jabatan)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.2.7',
                'index'            => 'Pengelolaan Sistem Rekrutmen ASN',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.2.8',
                'index'            => 'Fasilitasi Penyelenggaraan Seleksi ASN',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.3',
                'index'            => 'Mutasi Pegawai',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '800.1.3.1',
                'index'            => 'Usulan Alih Status, Pindah Instansi, Pindah Wilayah Kerja, Diperbantukan, Dipekerjakan, Penugasan Sementara, Mutasi Antarperwakilan, Mutasi ke dan dari Perwakilan, Pemindahan Sementara, Persetujuan/Pertimbangan Kepala BKN',
                'retensi_aktif'    => '1 Tahun Sejak Proses Kegiatan Dinyatakan Selesai Dilaksanakan',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.3.2',
                'index'            => 'Kenaikan Pangkat/Golongan/Jabatan',
                'retensi_aktif'    => '1 Tahun Sejak Keputusan Lama Dinyatakan Tidak Berlaku',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah, kecuali SK Masuk Berkas Perseorangan'
            ],
            [
                'kode_klasifikasi' => '800.1.3.3',
                'index'            => 'Pengangkatan dan Pemberhentian Jabatan Struktural/Fungsional',
                'retensi_aktif'    => '1 Tahun Sejak Keputusan Lama Dinyatakan Tidak Berlaku',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah, kecuali SK Masuk Berkas Perseorangan'
            ],
            [
                'kode_klasifikasi' => '800.1.3.4',
                'index'            => 'Perubahan Data Dasar/Status/Kedudukan Hukum Pegawai',
                'retensi_aktif'    => '1 Tahun Sejak Keputusan Lama Dinyatakan Tidak Berlaku',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah, kecuali Surat Persetujuan dan SK Masuk Berkas Perseorangan'
            ],
            [
                'kode_klasifikasi' => '800.1.3.5',
                'index'            => 'Peninjauan Masa Kerja',
                'retensi_aktif'    => '1 Tahun Sejak Keputusan Lama Dinyatakan Tidak Berlaku',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah, kecuali Nota dan SK Masuk Berkas Perseorangan'
            ],
            [
                'kode_klasifikasi' => '800.1.3.6',
                'index'            => 'Badan Pertimbangan Jabatan dan Pangkat (Baperjakat)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.4',
                'index'            => 'Pengembangan Karier',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '800.1.4.1',
                'index'            => 'Usulan Tugas Belajar/Izin Belajar/Diklat/Kursus/Magang/Ujian Dinas/Praktik Kerja di Instansi Lain/Pertukaran Antar-ASN dengan Pegawai Swasta',
                'retensi_aktif'    => '1 Tahun Sejak Selesainya Pertanggung jawaban Suatu Penugasan',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.4.2',
                'index'            => 'Penyesuaian Ijazah',
                'retensi_aktif'    => '1 Tahun Sejak Data Diperbarui (Update)',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.4.3',
                'index'            => 'Penyusunan Sistem Karier',
                'retensi_aktif'    => '2 Tahun Sejak Keputusan Lama Dinyatakan Tidak Berlaku',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.4.4',
                'index'            => 'Standar Kinerja Pegawai (SKP) dan Penilaian Prestasi Kerja',
                'retensi_aktif'    => '1 Tahun Sejak Berakhirnya Masa Tahun Anggaran',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.4.5',
                'index'            => 'Angka Kredit, antara lain: Pengajuan Daftar Usul Pengajuan Angka Kredit, Penilaian Daftar Usul Pengajuan Angka Kredit',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.5',
                'index'            => 'Kinerja Aparatur Sipil Negara',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '800.1.5.1',
                'index'            => 'Hasil Penilaian Kinerja dan Standar Kerja',
                'retensi_aktif'    => '2 Tahun Sejak Proses Kegiatan Dinyatakan Selesai Dilaksanakan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.5.2',
                'index'            => 'Pengelolaan Database dan Analisis Sistem Informasi Kinerja',
                'retensi_aktif'    => '2 Tahun Setelah Sistem atau Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '800.1.5.3',
                'index'            => 'Evaluasi dan Pemantauan Penilaian Kinerja dan Standar Kinerja',
                'retensi_aktif'    => '2 Tahun Sejak Proses Kegiatan Dinyatakan Selesai Dilaksanakan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.6',
                'index'            => 'Kode Etik, Disiplin, Pemberhentian, dan Pensiun ASN',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '800.1.6.1',
                'index'            => 'Kode Etik Pegawai',
                'retensi_aktif'    => '2 Tahun Setelah Memperoleh Kekuatan Hukum Tetap',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '800.1.6.2',
                'index'            => 'Disiplin',
                'retensi_aktif'    => '2 Tahun Setelah Memperoleh Kekuatan Hukum Tetap',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.6.3',
                'index'            => 'Pemberhentian dengan Hormat',
                'retensi_aktif'    => '2 Tahun Setelah Memperoleh Kekuatan Hukum Tetap',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah, Kecuali SK Masuk Berkas Perseorangan'
            ],
            [
                'kode_klasifikasi' => '800.1.6.4',
                'index'            => 'Pemberhentian dengan Tidak Hormat',
                'retensi_aktif'    => '2 Tahun Setelah Memperoleh Kekuatan Hukum Tetap',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah, Kecuali SK Masuk Berkas Perseorangan'
            ],
            [
                'kode_klasifikasi' => '800.1.6.5',
                'index'            => 'Pemberhentian Sementara',
                'retensi_aktif'    => '2 Tahun Setelah Memperoleh Kekuatan Hukum Tetap',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah, Kecuali SK Masuk Berkas Perseorangan'
            ],
            [
                'kode_klasifikasi' => '800.1.6.6',
                'index'            => 'Pensiun ASN, antara lain: Administrasi Pensiun ASN, Penetapan Pensiun ASN, Penetapan Pertimbangan Teknis Pensiun ASN, Pensiun Pejabat Negara dan Janda/Dudanya',
                'retensi_aktif'    => '1 Tahun Sejak Hak dan Kewajiban Habis',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah, kecuali Pensiun Pejabat Tinggi Pratama, Utama, Pejabat Negara/Daerah dan Janda/Dudanya Permanen'
            ],
            [
                'kode_klasifikasi' => '800.1.7',
                'index'            => 'Bantuan Hukum',
                'retensi_aktif'    => '2 Tahun Sejak Selesainya Pertanggung jawaban Suatu Penugasan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.8',
                'index'            => 'Status dan Kedudukan Pegawai',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '800.1.8.1',
                'index'            => 'Status Kepegawaian',
                'retensi_aktif'    => '2 Tahun Sejak Proses Kegiatan Dinyatakan Selesai Dilaksanakan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.8.2',
                'index'            => 'Kedudukan Kepegawaian',
                'retensi_aktif'    => '2 Tahun Sejak Proses Kegiatan Dinyatakan Selesai Dilaksanakan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.8.3',
                'index'            => 'Keberatan Pegawai',
                'retensi_aktif'    => '2 Tahun Setelah Ada Keputusan Tetap',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.8.4',
                'index'            => 'Perselisihan/Sengketa Kepegawaian',
                'retensi_aktif'    => '2 Tahun Setelah Memperoleh Kekuatan Hukum Tetap',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.9',
                'index'            => 'Sistem Informasi Kepegawaian',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '800.1.9.1',
                'index'            => 'Pengolahan Data dan Informasi Kepegawaian',
                'retensi_aktif'    => '2 Tahun Setelah Sistem atau Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.9.2',
                'index'            => 'Pengembangan Sistem Informasi Kepegawaian',
                'retensi_aktif'    => '2 Tahun Setelah Sistem atau Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.9.3',
                'index'            => 'Pengembangan Sistem Pengelolaan Arsip Kepegawaian Elektronik',
                'retensi_aktif'    => '1 Tahun Setelah Sistem atau Data Diperbarui (Update)',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '800.1.9.4',
                'index'            => 'Sistem Pengelolaan Arsip Kepegawaian Fisik',
                'retensi_aktif'    => '1 Tahun Sejak Dinyatakan Selesai Dilaksanakan',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.10',
                'index'            => 'Pengawasan dan Pengendalian',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '800.1.10.1',
                'index'            => 'Formasi, Pengadaan, dan Pascadiklat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.10.2',
                'index'            => 'Kepangkatan, Pengangkatan, dan Pemberhentian dalam Jabatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.10.3',
                'index'            => 'Gaji dan Tunjangan, Kesejahteraan, dan Kinerja',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.10.4',
                'index'            => 'Kode Etik, Disiplin, Pemberhentian, dan Pensiun ASN',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.10.5',
                'index'            => 'Laporan Hasil Pengawasan dan Pengendalian',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.10.6',
                'index'            => 'Sanggahan terhadap Permasalahan Tenaga Honorer',
                'retensi_aktif'    => '2 Tahun Sejak Keputusan Lama Dinyatakan Tidak Berlaku',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.11',
                'index'            => 'Administrasi Pegawai',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '800.1.11.1',
                'index'            => 'Surat Perintah Dinas/Surat Tugas',
                'retensi_aktif'    => '1 Tahun Sejak Selesainya Pertanggungjawaban Suatu Penugasan',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.11.2',
                'index'            => 'Cuti Sakit',
                'retensi_aktif'    => '1 Tahun Sejak Proses Kegiatan Dinyatakan Selesai Dilaksanakan',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.11.3',
                'index'            => 'Cuti Bersalin',
                'retensi_aktif'    => '1 Tahun Sejak Proses Kegiatan Dinyatakan Selesai Dilaksanakan',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.11.4',
                'index'            => 'Cuti Tahunan',
                'retensi_aktif'    => '1 Tahun Sejak Proses Kegiatan Dinyatakan Selesai Dilaksanakan',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.11.5',
                'index'            => 'Cuti Alasan Penting',
                'retensi_aktif'    => '1 Tahun Sejak Proses Kegiatan Dinyatakan Selesai Dilaksanakan',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.11.6',
                'index'            => 'Cuti Besar',
                'retensi_aktif'    => '2 Tahun Sejak Proses Kegiatan Dinyatakan Selesai Dilaksanakan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.11.7',
                'index'            => 'Cuti di Luar Tanggungan Negara',
                'retensi_aktif'    => '2 Tahun Sejak Proses Kegiatan Dinyatakan Selesai Dilaksanakan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.11.8',
                'index'            => 'Kartu Pegawai Negeri Sipil (Karpeg)/Kartu Pegawai Negeri Elektronik (KPE)/Kartu Istri (Karis)/Kartu Suami (Karsu)',
                'retensi_aktif'    => '1 Tahun Setelah Sistem atau Data Diperbarui (Update)',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.11.9',
                'index'            => 'Keanggotaan Organisasi Profesi/Kedinasan',
                'retensi_aktif'    => '1 Tahun Setelah Sistem atau Data Diperbarui (Update)',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.11.10',
                'index'            => 'Laporan Pajak Penghasilan Pribadi (LP2P)',
                'retensi_aktif'    => '1 Tahun Setelah Sistem atau Data Diperbarui (Update)',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.11.11',
                'index'            => 'Keterangan Penerimaan Pembayaran Penghasilan Pegawai (KP4)',
                'retensi_aktif'    => '1 Tahun Setelah Sistem atau Data Diperbarui (Update)',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.11.12',
                'index'            => 'Daftar Urut Kepangkatan (DUK)',
                'retensi_aktif'    => '1 Tahun Setelah Sistem atau Data Diperbarui (Update)',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.11.13',
                'index'            => 'Pengurusan Kenaikan Gaji Berkala, Mutasi Gaji/Tunjangan',
                'retensi_aktif'    => '1 Tahun Sejak Proses Kegiatan Dinyatakan Selesai Dilaksanakan',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.12',
                'index'            => 'Kesejahteraan Pegawai',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '800.1.12.1',
                'index'            => 'Pemeliharaan Kesehatan Pegawai',
                'retensi_aktif'    => '1 Tahun Sejak Hak dan Kewajiban Habis',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.12.2',
                'index'            => 'Asuransi Pegawai/BPJS',
                'retensi_aktif'    => '1 Tahun Sejak Hak dan Kewajiban Habis',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.12.3',
                'index'            => 'Tabungan Perumahan',
                'retensi_aktif'    => '1 Tahun Sejak Hak dan Kewajiban Habis',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.12.4',
                'index'            => 'Bantuan Sosial',
                'retensi_aktif'    => '1 Tahun Sejak Hak dan Kewajiban Habis',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.12.5',
                'index'            => 'Pakaian Dinas',
                'retensi_aktif'    => '1 Tahun Sejak Hak dan Kewajiban Habis',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.12.6',
                'index'            => 'Layanan Pegawai yang Meninggal Karena Dinas',
                'retensi_aktif'    => '1 Tahun Sejak Hak dan Kewajiban Habis',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.12.7',
                'index'            => 'Pemberian Tali Kasih',
                'retensi_aktif'    => '1 Tahun Sejak Hak dan Kewajiban Habis',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.12.8',
                'index'            => 'Pemberian Piagam Penghargaan dan Tanda Jasa',
                'retensi_aktif'    => '1 Tahun Sejak Hak dan Kewajiban Habis',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.12.9',
                'index'            => 'Olahraga dan Rekreasi',
                'retensi_aktif'    => '1 Tahun Sejak Hak dan Kewajiban Habis',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.12.10',
                'index'            => 'Rekam Medis',
                'retensi_aktif'    => '1 Tahun Sejak Hak dan Kewajiban Habis',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.13',
                'index'            => 'Administrasi Perseorangan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '800.1.13.1',
                'index'            => 'Pegawai Negeri Sipil (PNS)',
                'retensi_aktif'    => '3 Tahun Setelah Penetapan Pensiun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.13.2',
                'index'            => 'Pegawai Pemerintah dengan Perjanjian Kerja (PPPK)',
                'retensi_aktif'    => '3 Tahun Setelah Penetapan Pensiun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.13.3',
                'index'            => 'Pejabat Negara dan Pejabat Lainnya yang Disetarakan',
                'retensi_aktif'    => '1 Tahun Sejak Hak dan Kewajiban Habis',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '800.1.13.4',
                'index'            => 'Sekretaris Daerah',
                'retensi_aktif'    => '1 Tahun Sejak Hak dan Kewajiban Habis',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '800.1.13.5',
                'index'            => 'ASN Berjasa/Terlibat dalam Peristiwa Berskala Nasional',
                'retensi_aktif'    => '1 Tahun Sejak Hak dan Kewajiban Habis',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '800.1.14',
                'index'            => 'Penilaian Kompetensi',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '800.1.14.1',
                'index'            => 'Penilaian Kompetensi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.1.14.2',
                'index'            => 'Hasil Penilaian Kompetensi',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],

            // Data 800.2 - PENDIDIKAN DAN PELATIHAN (DIKLAT)
            [
                'kode_klasifikasi' => '800.2',
                'index'            => 'PENDIDIKAN DAN PELATIHAN (DIKLAT)',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '800.2.1',
                'index'            => 'Kebijakan di Bidang Pendidikan dan Pelatihan yang Dilakukan oleh Pemerintah Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Penetapan Kebijakan yang Terbaru',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '800.2.2',
                'index'            => 'Pendidikan dan Pelatihan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '800.2.2.1',
                'index'            => 'Sistem Informasi Program dan Pembinaan Diklat',
                'retensi_aktif'    => '2 Tahun Setelah Sistem Aplikasi Ditingkatkan dan Dikembangkan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '800.2.2.2',
                'index'            => 'Pedoman-pedoman Kediklatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '800.2.2.3',
                'index'            => 'Kurikulum-kurikulum Diklat',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.2.2.4',
                'index'            => 'Modul-modul Diklat',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.2.2.5',
                'index'            => 'Panduan Fasilitator',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.2.2.6',
                'index'            => 'Saran/Rekomendasi Penyelenggaraan Diklat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '800.2.2.7',
                'index'            => 'Notula Sosialisasi/Rapat Koordinasi Kebijakan Diklat',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.2.2.8',
                'index'            => 'Monitoring dan Evaluasi Program dan Pembinaan Diklat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '800.2.2.9',
                'index'            => 'Konsultasi, Advokasi, Asistensi Diklat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '800.2.3',
                'index'            => 'Widyaiswara',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '800.2.3.1',
                'index'            => 'Seleksi dan Pengembangan Widyaiswara',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.2.3.2',
                'index'            => 'Sertifikasi Widyaiswara',
                'retensi_aktif'    => '2 Tahun Sejak Proses Kegiatan Dinyatakan Selesai Dilaksanakan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.2.3.3',
                'index'            => 'Monitoring dan Evaluasi Widyaiswara',
                'retensi_aktif'    => '2 Tahun Sejak Proses Kegiatan Dinyatakan Selesai Dilaksanakan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '800.2.3.4',
                'index'            => 'Penilaian Widyaiswara',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.2.3.5',
                'index'            => 'Konsultasi, Advokasi, dan Asistensi Widyaiswara',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.2.3.6',
                'index'            => 'Sistem Informasi Pembinaan Widyaiswara',
                'retensi_aktif'    => '2 Tahun Setelah Sistem Aplikasi Ditingkatkan dan Dikembangkan (Upgrade)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '800.2.4',
                'index'            => 'Penyelenggaraan Diklat',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '800.2.4.1',
                'index'            => 'Perencanaan, Peserta, Pengajar, Penjadwalan Penyelenggaraan Diklat',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.2.4.2',
                'index'            => 'Penyelenggaraan Diklat',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.2.4.3',
                'index'            => 'Konsultasi, Advokasi, Asistensi Penyelenggaraan Diklat',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.2.4.4',
                'index'            => 'Pengembangan Bahan Ajar dan Metodologi Pembelajaran',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '800.2.4.5',
                'index'            => 'Sistem Informasi Diklat',
                'retensi_aktif'    => '2 Tahun Setelah Sistem Aplikasi Ditingkatkan dan Dikembangkan (Upgrade)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '800.2.4.6',
                'index'            => 'Monitoring Penyelenggara Diklat',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '800.2.4.7',
                'index'            => 'Monitoring dan Evaluasi Pascadiklat',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '800.2.5',
                'index'            => 'Alumni',
                'retensi_aktif'    => '2 Tahun Setelah Data Diperbarui (Update)',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1',
                'index'            => 'KEUANGAN DAERAH',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '900.1.1',
                'index'            => 'Rencana Anggaran Pendapatan dan Belanja Daerah (RAPBD) dan Anggaran Pendapatan dan Belanja Daerah Perubahan (APBD-P)',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '900.1.1.1',
                'index'            => 'Penyusunan Prioritas Plafon Anggaran (PPA)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.1.2',
                'index'            => 'Penyusunan Rencana Kerja Anggaran Satuan Kerja Perangkat Daerah (RKASKPD)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.1.3',
                'index'            => 'Penyampaian Rancangan Anggaran Pendapatan dan Belanja Daerah kepada Dewan Perwakilan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.1.4',
                'index'            => 'Anggaran Pendapatan dan Belanja Daerah Perubahan (RAPBD-P)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.2',
                'index'            => 'Penyusunan Anggaran',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '900.1.2.1',
                'index'            => 'Musyawarah Rencana Pembangunan (Musrenbang) Kecamatan',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.2.2',
                'index'            => 'Musyawarah Rencana Pembangunan (Musrenbang) Kota',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.2.3',
                'index'            => 'Rancangan Dokumen Pelaksanaan Anggaran (RDPA) SKPD yang Telah Disetujui Sekretaris Daerah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.2.4',
                'index'            => 'Dokumen Pelaksanaan Anggaran (DPA) SKPD yang Telah Disahkan oleh Pejabat Pengelola Keuangan Daerah (PPKD)',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.3',
                'index'            => 'Pelaksanaan Anggaran',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '900.1.3.1',
                'index'            => 'Surat Penyedia Dana (SPP, SPM dan SP2D): UP, GU, TU, LS',
                'retensi_aktif'    => '2 Tahun Sejak Perda tentang Pertanggungjawaban APBD Disahkan',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.3.2',
                'index'            => 'Pendapatan',
                'retensi_aktif'    => '2 Tahun Sejak Perda tentang Pertanggungjawaban APBD Disahkan',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.3.3',
                'index'            => 'Belanja',
                'retensi_aktif'    => '2 Tahun Sejak Perda tentang Pertanggungjawaban APBD Disahkan',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.3.4',
                'index'            => 'Pembiayaan Daerah',
                'retensi_aktif'    => '2 Tahun Sejak Perda tentang Pertanggungjawaban APBD Disahkan',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.3.5',
                'index'            => 'Dokumen Penatausahaan Keuangan',
                'retensi_aktif'    => '2 Tahun Sejak Perda tentang Pertanggungjawaban APBD Disahkan',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.3.6',
                'index'            => 'Pertanggungjawaban Penggunaan Dana',
                'retensi_aktif'    => '2 Tahun Sejak Perda tentang Pertanggungjawaban APBD Disahkan',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.3.7',
                'index'            => 'Daftar Gaji',
                'retensi_aktif'    => '2 Tahun Sejak Perda tentang Pertanggungjawaban APBD Disahkan',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.3.8',
                'index'            => 'Kartu Gaji',
                'retensi_aktif'    => '1 Tahun Setelah Dinyatakan Tidak Berlaku',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.3.9',
                'index'            => 'Data Rekening Bendahara Umum Daerah (BUD)',
                'retensi_aktif'    => '2 Tahun Sejak Perda tentang Pertanggungjawaban APBD Disahkan',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.3.10',
                'index'            => 'Laporan Keuangan (Tahunan)',
                'retensi_aktif'    => '2 Tahun Sejak Perda tentang Pertanggungjawaban APBD Disahkan',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.4',
                'index'            => 'Pinjaman/Hibah Luar Negeri',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '900.1.4.1',
                'index'            => 'Permohonan Pinjaman/Hibah Luar Negeri (Blue Book)',
                'retensi_aktif'    => '2 Tahun Setelah Diterbitkan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.4.2',
                'index'            => 'Dokumen Kesanggupan Negara Donor untuk Membiayai (Green Book)',
                'retensi_aktif'    => '2 Tahun Setelah Loan Agreement Ditandatangani',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.4.3',
                'index'            => 'Dokumen Memorandum of Understanding (MoU), dan Dokumen Sejenisnya',
                'retensi_aktif'    => '2 Tahun Setelah Perjanjian Pinjaman Berakhir',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.4.4',
                'index'            => 'Dokumen Loan Agremeent (PHLN), antara lain: Draf Agreement, Legal Opinion, Surat-menyurat dengan Lender',
                'retensi_aktif'    => '2 Tahun Setelah Perjanjian Pinjaman Berakhir',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.4.5',
                'index'            => 'Alokasi dan Relokasi Penggunaan Dana Luar Negeri, antara lain: Usulan Luncuran Dana',
                'retensi_aktif'    => '2 Tahun Setelah Perjanjian Pinjaman Berakhir',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.4.6',
                'index'            => 'Aplikasi Penarikan Dana BLN Berikut Lampirannya',
                'retensi_aktif'    => '2 Tahun Setelah Perjanjian Pinjaman Berakhir',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.4.7',
                'index'            => 'Dokumen Otorisasi Penarikan Dana (Payment Advice)',
                'retensi_aktif'    => '2 Tahun Setelah Perjanjian Pinjaman Berakhir',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.4.8',
                'index'            => 'Dokumen Realisasi Pencairan Dana Bantuan Luar Negeri, antara lain: Surat Perintah Pencairan Dana, SPM Beserta Lampirannya (SPP, Kontrak, Berita Acara, dan Data Pendukung Lainnya)',
                'retensi_aktif'    => '2 Tahun Setelah Perjanjian Pinjaman Berakhir',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.4.9',
                'index'            => 'Replenishment (Permintaan Penarikan Dana dari Negara Donor), antara lain: No Objection Letter (NOL), Project Implementation, Notification of Contract, Withdrawal Authorization (WA)',
                'retensi_aktif'    => '2 Tahun Setelah Perjanjian Pinjaman Berakhir',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.4.10',
                'index'            => 'Staff Appraisal Report',
                'retensi_aktif'    => '2 Tahun Setelah Perjanjian Pinjaman Berakhir',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.4.11',
                'index'            => 'Report/Laporan',
                'retensi_aktif'    => '2 Tahun Setelah Perjanjian Pinjaman Berakhir',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.4.12',
                'index'            => 'Laporan Hutang Daerah',
                'retensi_aktif'    => '2 Tahun Setelah Perjanjian Pinjaman Berakhir',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.4.13',
                'index'            => 'Completion Report/Annual Report',
                'retensi_aktif'    => '2 Tahun Setelah Perjanjian Pinjaman Berakhir',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.4.14',
                'index'            => 'Ketentuan/Peraturan yang Menyangkut Pinjaman/Hibah Luar Negeri',
                'retensi_aktif'    => '1 Tahun Setelah Diperbarui',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.5',
                'index'            => 'Pengelolaan APBD/Dana Pinjaman/Hibah Luar Negeri (PHLN)',
                'retensi_aktif'    => '1 Tahun Setelah Ada Pejabat Pengganti',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.6',
                'index'            => 'Sistem Akuntansi Keuangan Daerah (SAKD)',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '900.1.6.1',
                'index'            => 'Manual Implementasi Sistem Akuntansi Keuangan Daerah (SAKD)',
                'retensi_aktif'    => '1 Tahun Selama Belum Ada Perubahan',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.6.2',
                'index'            => 'Dokumen Kebijakan Akuntansi',
                'retensi_aktif'    => '1 Tahun Selama Belum Ada Perubahan',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.6.3',
                'index'            => 'Arsip Data Komputer dan Berita Acara Rekonsiliasi',
                'retensi_aktif'    => '2 Tahun Sejak Perda tentang Pertanggungjawaban APBD Disahkan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.6.4',
                'index'            => 'Laporan Realisasi Anggaran dan Neraca Bulanan/Triwulanan/Semesteran',
                'retensi_aktif'    => '2 Tahun Sejak Perda tentang Pertanggungjawaban APBD Disahkan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.7',
                'index'            => 'Penyaluran Anggaran Tugas Pembantuan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '900.1.7.1',
                'index'            => 'Surat Penetapan Pemimpin Proyek/Bagian Proyek, Bendahara, atas Penggunaan Anggaran Kegiatan Pembantuan, Termasuk Spesimen Tanda Tangan',
                'retensi_aktif'    => '2 Tahun Sejak Perda tentang Pertanggungjawaban APBD Disahkan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.7.2',
                'index'            => 'Berkas Permintaan Pembayaran (SPP) dan Lampirannya, antara lain: SPP-SPP-Daftar Perincian Penggunaan SPPR-SPDR-L, SPM-LS, SPM-DU, Bilyet Giro, SPM Nihil, Penagihan/Invoice, Faktur Pajak, Bukti Penerimaan Kas/Bank beserta Bukti Pendukungnya a.l.: Fotokopi Faktur Pajak dan Nota Kredit Bank, Permintaan Pelayanan Jasa/Service Report dan Berita Acara Penyelesaian Pekerjaan',
                'retensi_aktif'    => '2 Tahun Sejak Perda tentang Pertanggungjawaban APBD Disahkan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.7.3',
                'index'            => 'Buku Rekening Bank',
                'retensi_aktif'    => '1 Tahun Selama Rekening Masih Aktif',
                'retensi_inaktif'  => '1 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.7.4',
                'index'            => 'Keputusan Pembukuan Rekening',
                'retensi_aktif'    => '3 Tahun Selama Rekening Masih Aktif',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.7.5',
                'index'            => 'Pembukuan Anggaran, antara lain: Buku Kas Umum (BKU), Buku Pembantu, Register dan Buku Tambahan, Daftar Pembukuan Pencairan/Pengeluaran (DPP), Daftar Himpunan Pencairan (DHP), dan Rekening Koran',
                'retensi_aktif'    => '2 Tahun Sejak Perda tentang Pertanggungjawaban APBD Disahkan',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.8',
                'index'            => 'Penerimaan Anggaran Tugas Pembantuan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '900.1.8.1',
                'index'            => 'Berkas Penerimaan Keuangan Pelaksanaan dan Tugas Pembantuan Termasuk Dana Sisa atau Pengeluaran Lainnya',
                'retensi_aktif'    => '2 Tahun Sejak Perda tentang Pertanggungjawaban APBD Disahkan',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.8.2',
                'index'            => 'Berkas Penerimaan Pajak Termasuk PPh 21, PPh 22, PPh 23, dan PPn dan Denda Keterlambatan Menyelesaikan Pekerjaan',
                'retensi_aktif'    => '2 Tahun Sejak Perda tentang Pertanggungjawaban APBD Disahkan',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.9',
                'index'            => 'Penyusunan Anggaran Pilkada dan Biaya Bantuan Pemilu dari APBD, antara lain: Kebijakan Keuangan Pilkada dan Penyusunan Anggaran Bantuan Pemilu, Peraturan/Pedoman/Standar Belanja Pegawai, Barang dan Jasa, Operasional dan Kontingensi untuk Biaya Pilkada dan Bantuan Pemilu, Bahan Usulan Rencana Kegiatan dan Anggaran (RKA) Pilkada KPUD dan Panwasda Kota, PPK, PPS, KPPS dan Permohonan Pengajuan RKA KPUD dan Panwas, Berkas Pembahasan RKA Pilkada dan Bantuan Pemilu, Rencana Anggaran Satuan Kerja (RASK) Pilkada dan Bantuan Pemilu Kota, Dokumen Rancangan Anggaran Satuan Kerja (DRASK) Pilkada KPUD dan Panwas Kota dan Bantuan Biaya Pemilu dari APBD, Berkas Pembentukan Dana Cadangan Pilkada, Bahan Rapat Rancangan Peraturan Daerah tentang Pilkada, dan Bantuan Biaya Pemilu dari APBD, Nota Persetujuan DPRD tentang Perda APBD Pilkada dan Bantuan Biaya Pemilu dari APBD',
                'retensi_aktif'    => '2 Tahun Sejak Perda tentang Pertanggungjawaban APBD Disahkan',
                'retensi_inaktif'  => '5 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.10',
                'index'            => 'Pelaksanaan Anggaran PILKADA dan Anggaran Biaya Bantuan Pemilu',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '900.1.10.1',
                'index'            => 'Berkas Penetapan Bendahara dan Atasan Langsung Bendahara KPUD, Bendahara Panwasda dan Bendahara pada Panitia Pilkada dan Pemilu',
                'retensi_aktif'    => '2 Tahun Sejak Perda tentang Pertanggungjawaban APBD Disahkan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.10.2',
                'index'            => 'Berkas Penerimaan Komisi, Rabat Pembayaran Pengadaan Jasa, Bunga, Pelaksanaan Pilkada/Pemilu',
                'retensi_aktif'    => '2 Tahun Sejak Perda tentang Pertanggungjawaban APBD Disahkan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.10.3',
                'index'            => 'Berkas Setor Sisa Dana Pilkada/Pemilu Termasuk Setor Komisi Pengadaan Barang/Jasa, Rabat, Bunga, Jasa Giro Berkas Penyaluran Biaya Pemilu Termasuk di antaranya Bukti Transfer Bank',
                'retensi_aktif'    => '2 Tahun Sejak Perda tentang Pertanggungjawaban APBD Disahkan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.10.4',
                'index'            => 'Pedoman Dokumen Penyediaan Pembiayaan Kegiatan Operasional (PPKO) Pemilu Termasuk Perubahan/Pergeseran/Revisinya',
                'retensi_aktif'    => '2 Tahun Sejak Perda tentang Pertanggungjawaban APBD Disahkan',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.11',
                'index'            => 'Pemeriksaan/Pengawasan Keuangan Daerah',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '900.1.11.1',
                'index'            => 'Laporan Hasil Pemeriksaan Badan Pemeriksa Keuangan Republik Indonesia atas Laporan Keuangan',
                'retensi_aktif'    => '2 Tahun Setelah Ditindaklanjuti',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.11.2',
                'index'            => 'Hasil Pengawasan dan Pemeriksaan Internal',
                'retensi_aktif'    => '2 Tahun Setelah Ditindaklanjuti',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.11.3',
                'index'            => 'Laporan Aparat Pemeriksa Fungsional',
                'retensi_aktif'    => '2 Tahun Setelah Ditindaklanjuti',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.11.4',
                'index'            => 'Dokumen Penyelesaian Kerugian Daerah',
                'retensi_aktif'    => '2 Tahun Setelah Tagihan Tuntutan Perbendaharaan/Tuntutan Ganti Rugi Dilunasi',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
            [
                'kode_klasifikasi' => '900.1.12',
                'index'            => 'Anggaran Daerah',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '900.1.12.1',
                'index'            => 'Anggaran Daerah',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.12.2',
                'index'            => 'Dukungan Teknis Anggaran Daerah',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.13',
                'index'            => 'Pendapatan dan Investasi Daerah',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '900.1.13.1',
                'index'            => 'Pajak Daerah dan Retribusi Daerah, antara lain: Fasilitasi Pelaksanaan Kebijakan Standardisasi Pajak Daerah dan Retribusi Daerah, Penyiapan Bahan Perumusan Bimbingan Teknis Pajak Daerah dan Retribusi Daerah, Penyiapan Bahan Perumusan Analisis dan Evaluasi, Pemantauan Pajak Daerah dan Retribusi Daerah, Penyiapan Bahan Perumusan Kebijakan Fasilitasi Pemberian Insentif Pajak Daerah dan Retribusi Daerah',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.13.2',
                'index'            => 'Badan Usaha Milik Daerah, antara lain: Fasilitasi serta Bimbingan Teknis di Bidang Usaha Milik Daerah Lembaga Keuangan, Fasilitas, serta Bimbingan Teknis di Bidang Badan Usaha Milik Daerah Lembaga Nonkeuangan, Penyiapan Pelaksanaan Monitoring dan Evaluasi Badan Usaha Milik Daerah',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.13.3',
                'index'            => 'Badan Layanan Umum Daerah, antara lain: Analisis, Standardisasi Teknis, Fasilitasi serta Bimbingan Teknis, Pemantauan dan Evaluasi di Bidang Pola Pengelolaan Keuangan Badan Layanan Umum Daerah, Pembinaan Pelaksanaan Kebijakan, Standardisasi Teknis, Prosedur dan Kriteria, Fasilitasi Serta Bimbingan Teknis Penerapan Pola Pengelolaan Keuangan Badan Layanan Umum Daerah, Penyiapan Pelaksanaan Monitoring dan Evaluasi Pola Pengelolaan Keuangan Badan Layanan Umum Daerah',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.13.4',
                'index'            => 'Pengelolaan Kekayaan Daerah, antara lain: Fasilitasi serta Bimbingan Teknis Pengelolaan Kekayaan, Fasilitasi serta Bimbingan Teknis Investasi Daerah, Penyiapan Pelaksanaan Monitoring dan Evaluasi Pengelolaan Kekayaan dan Investasi Daerah',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.13.5',
                'index'            => 'Pinjam dan Obligasi Daerah, antara lain: Fasilitasi Pelaksanaan Kebijakan Pinjaman dan Hibah Kepada Pemerintah Daerah dan/atau Badan Usaha Milik Daerah, Fasilitasi Pelaksanaan Kebijakan Obligasi Daerah, Fasilitasi Pelaksanaan Kebijakan Dana Bergulir yang Bersumber dari APBN, Bimbingan Teknis Obligasi Daerah, Dana Bergulir Serta Penyertaan Modal Daerah, Penyiapan Pelaksanaan Monitoring dan Evaluasi Pinjaman dan Hibah, Obligasi Daerah dan Dana Bergulir, dan Penyertaan Modal Daerah',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.14',
                'index'            => 'Fasilitasi Dana Perimbangan',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '900.1.14.1',
                'index'            => 'Fasilitasi Dana Alokasi Umum, antara lain: Koordinasi Penyiapan Data Dasar Penghitungan, dan Rekonsiliasi Dana Alokasi Umum, Sosialisasi dan Supervisi Dana Alokasi Umum, Penyiapan Pelaksanaan Monitoring dan Evaluasi Dana Alokasi Umum',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.14.2',
                'index'            => 'Fasilitasi Dana Alokasi Khusus, antara lain: Koordinasi Penyiapan Data Dasar, Sosialisasi dan Supervisi Dana Alokasi Khusus, Penyiapan Pelaksanaan Monitoring, Evaluasi Dana Alokasi Khusus',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.14.3',
                'index'            => 'Dana Bagi Hasil Pajak dan Sumber Daya Alam, antara lain: Koordinasi Penyiapan Data Dasar Perhitungan, dan Rekonsiliasi Dana Bagi Hasil Pajak dan Sumber Daya Alam, Sosialisasi dan Supervisi Dana Bagi Hasil Pajak dan Sumber Daya Alam, Penyiapan Pelaksanaan Monitoring dan Evaluasi Dana Bagi Hasil Pajak dan Sumber Daya Alam',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.14.4',
                'index'            => 'Dana Otonomi Khusus dan Dana Transfer Lainnya, antara lain: Sosialisasi dan Supervisi Dana Otonomi Khusus, Sosialisasi dan Supervisi dan Transfer Lainnya, Pelaksanaan Monitoring dan Evaluasi serta Otonomi Khusus dan Dana Transfer Lainnya',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.14.5',
                'index'            => 'Dukungan Teknis Fasilitasi Dana Perimbangan, antara lain: Penyiapan Sinkronisasi Kebijakan dan Perimbangan, Penyiapan Dukungan Teknis Dana Perimbangan, Penyiapan Data dan Informasi untuk Penyusunan Laporan Dana Perimbangan',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.15',
                'index'            => 'Pelaksanaan dan Pertanggungjawaban Keuangan Daerah',
                'retensi_aktif'    => '',
                'retensi_inaktif'  => '',
                'status_akhir'     => ''
            ],
            [
                'kode_klasifikasi' => '900.1.15.1',
                'index'            => 'Akuntansi Dan Pertanggungjawaban Keuangan Daerah, antara lain: Fasilitasi serta Bimbingan Teknis di Bidang Akuntansi dan Pertanggungjawaban Keuangan Daerah, Penyiapan Evaluasi Rancangan Peraturan Daerah Pertanggungjawaban Keuangan Daerah',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.15.2',
                'index'            => 'Pembinaan Kinerja dan Kapasitas Pengelolaan Keuangan Daerah, antara lain: Fasilitasi serta Bimbingan Teknis di Bidang Pembinaan Kinerja dan Kapasitas Pengelolaan Keuangan Daerah, Penyiapan Evaluasi Rancangan Peraturan Daerah, Pertanggungjawaban Keuangan Daerah',
                'retensi_aktif'    => '3 Tahun',
                'retensi_inaktif'  => '7 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.15.3',
                'index'            => 'Pembinaan dan Evaluasi Pengelolaan Keuangan Daerah, antara lain: Fasilitasi serta Bimbingan Teknis di Bidang Pembinaan dan Evaluasi Pengelolaan Keuangan Daerah, Penyiapan Evaluasi Rancangan Peraturan Daerah Pertanggungjawaban Keuangan Daerah',
                'retensi_aktif'    => '1 Tahun',
                'retensi_inaktif'  => '2 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.15.4',
                'index'            => 'Kajian Kebijakan dan Bantuan Keterangan Ahli, antara lain: Penyiapan Bahan Bantuan Keterangan Ahli di Bidang Keuangan Daerah, Penyiapan Evaluasi Rancangan Peraturan Daerah Pertanggungjawaban Keuangan Daerah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Musnah'
            ],
            [
                'kode_klasifikasi' => '900.1.15.5',
                'index'            => 'Data Informasi dan Pengelolaan Keuangan Daerah, antara lain: Penyiapan Sinkronisasi Kebijakan Pelaksanaan Pertanggungjawaban Pelaksanaan Keuangan Daerah, Penyiapan Data dan Informasi untuk Penyusunan Laporan Pertanggungjawaban Pelaksanaan Keuangan Daerah, Pengelolaan Sistem Informasi Pengelolaan Keuangan Daerah',
                'retensi_aktif'    => '2 Tahun',
                'retensi_inaktif'  => '3 Tahun',
                'status_akhir'     => 'Permanen'
            ],
        ];

        Pergub30::insert($data);
    }
}