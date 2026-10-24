# Sistem Pemesanan Tiket Bola Berbasis Web

Purwarupa aplikasi web untuk melihat informasi pertandingan sepak bola dan mencatat pemesanan tiket. Proyek ini dibuat untuk keperluan pembelajaran mata kuliah **Wireless Computing**.

> Proyek ini merupakan simulasi pembelajaran. Aplikasi tidak mewakili klub, stadion, liga, atau penyelenggara resmi. Pembayaran daring dan penerbitan tiket resmi tidak termasuk dalam cakupan proyek.

## Fitur

### Pemesan
- Melihat daftar dan detail pertandingan.
- Melihat kategori serta harga tiket simulasi.
- Memilih kategori dan jumlah tiket.
- Mengisi formulir pemesanan dengan nama dan informasi kontak.
- Melihat ringkasan dan kode pemesanan setelah pesanan dicatat.

### Pengelola
- Masuk ke halaman pengelolaan.
- Menambah, mengubah, dan menghapus informasi pertandingan.
- Mengatur kategori tiket dan harga simulasi.
- Melihat pesanan yang masuk dan memperbarui statusnya.

## Teknologi

Proposal proyek mengusulkan teknologi berikut; sesuaikan bagian ini dengan teknologi yang benar-benar digunakan pada implementasi:

- HTML untuk struktur halaman.
- CSS untuk tampilan.
- JavaScript untuk interaksi pada halaman.
- PHP atau teknologi sisi server lain untuk pemrosesan data.
- MySQL atau basis data sejenis untuk menyimpan data.

## Alur pemesanan

1. Pemesan membuka halaman web dan memilih pertandingan.
2. Sistem menampilkan detail pertandingan dan kategori tiket.
3. Pemesan memilih kategori serta jumlah tiket.
4. Pemesan mengisi nama dan informasi kontak.
5. Sistem memeriksa kelengkapan data dan menampilkan ringkasan.
6. Setelah dikirim, pesanan dicatat dan sistem menampilkan konfirmasi beserta kode pemesanan.

## Data utama

- **Pertandingan:** tim kandang, tim tamu, tanggal, waktu, lokasi, dan status.
- **Kategori tiket:** nama kategori, harga simulasi, dan jumlah tersedia.
- **Pemesan:** nama dan alamat surel atau nomor kontak.
- **Pesanan:** kode pesanan, pertandingan, kategori, jumlah tiket, waktu pemesanan, dan status.

## Cara menjalankan

Langkah berikut merupakan panduan umum untuk implementasi PHP dan MySQL. Perintah atau konfigurasi dapat berbeda sesuai struktur aplikasi yang dibuat.

1. Pasang server lokal yang mendukung PHP dan MySQL, misalnya XAMPP.
2. Salin folder proyek ke direktori web server lokal.
3. Buat basis data untuk aplikasi melalui phpMyAdmin atau klien MySQL.
4. Impor berkas skema atau data awal basis data jika tersedia.
5. Sesuaikan konfigurasi koneksi basis data pada aplikasi.
6. Jalankan server web dan MySQL.
7. Buka alamat lokal proyek di peramban, misalnya `http://localhost/nama-folder-proyek`.

Jika proyek hanya memakai HTML, CSS, dan JavaScript tanpa server, buka berkas halaman utamanya melalui browser atau gunakan ekstensi server lokal pada editor.

## Pengujian

| Skenario | Hasil yang diharapkan |
|---|---|
| Membuka halaman beranda | Halaman beranda tampil dengan baik. |
| Membuka daftar pertandingan | Daftar pertandingan ditampilkan. |
| Memilih pertandingan | Detail pertandingan ditampilkan. |
| Mengirim formulir kosong | Sistem meminta data wajib dilengkapi. |
| Mengirim pemesanan lengkap | Pesanan dicatat dan konfirmasi ditampilkan. |
| Pengelola membuka halaman pesanan | Daftar pesanan dapat dilihat. |
| Pengelola mengubah data pertandingan | Perubahan tersimpan dan ditampilkan. |

## Pembagian tugas

| Anggota | Tanggung jawab |
|---|---|
| **Zuli Arifin** | Membuat halaman beranda dan daftar pertandingan, termasuk informasi tim, jadwal, dan lokasi. |
| **Nafran Julian** | Membuat halaman detail pertandingan dan formulir pemesanan, termasuk pilihan kategori serta jumlah tiket. |
| **Abadi** | Menyiapkan basis data dan fungsi penyimpanan pesanan serta kode pemesanan. |
| **M. Maulfi** | Membuat halaman pengelola untuk mengatur pertandingan dan melihat pesanan, serta menguji fitur dan mencatat hasilnya. |
| **Semua anggota** | Menggabungkan bagian sistem, meninjau hasil, memperbaiki masalah, dan menyiapkan laporan serta presentasi. |

## Anggota kelompok

- Zuli Arifin — 23210032
- Nafran Julian — 23210098
- Abadi — 23210004
- M. Maulfi — 22210053

## Status proyek

Purwarupa untuk keperluan pembelajaran. Isi README ini menggambarkan rancangan proyek; perbarui daftar fitur, teknologi, dan cara menjalankan agar sesuai dengan implementasi akhir di repositori.
