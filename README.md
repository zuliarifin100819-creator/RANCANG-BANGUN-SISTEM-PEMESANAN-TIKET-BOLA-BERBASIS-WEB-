# LagaKita

LagaKita adalah aplikasi web sederhana untuk melihat jadwal pertandingan sepak bola dan memesan tiket. Aplikasi dibuat dengan PHP, MySQL, HTML, CSS, JavaScript, dan Bootstrap, serta dijalankan secara lokal menggunakan XAMPP.

## Fitur

- Melihat pertandingan yang akan datang.
- Membuka detail pertandingan, stadion, kategori tiket, harga, dan stok.
- Mengisi formulir pemesanan tiket.
- Menyimpan pemesanan dan mengurangi stok tiket.
- Melihat kode serta ringkasan pemesanan.

Pembayaran online, akun pengguna, dan panel admin belum termasuk dalam versi ini.

## Teknologi

- PHP 8 atau lebih baru dengan PDO MySQL
- MySQL/MariaDB dari XAMPP
- HTML, CSS, dan JavaScript
- Bootstrap 5.3 melalui CDN (perlu koneksi internet saat membuka aplikasi)

## Cara menjalankan di XAMPP

1. Letakkan folder proyek di `C:\xampp\htdocs\Lagakita`.
2. Buka XAMPP Control Panel, lalu jalankan **Apache** dan **MySQL**.
3. Buka `http://localhost/phpmyadmin` di browser.
4. Pilih **Import**, lalu pilih file `database/lagakita.sql` dari folder proyek dan jalankan impor.
   - File SQL akan membuat database `lagakita`, empat tabel, dan tiga contoh pertandingan.
5. Buka `http://localhost/Lagakita/`.

## Koneksi database

Pengaturan bawaan ada di `includes/db.php`:

- Host: `127.0.0.1`
- Database: `lagakita`
- Username: `root`
- Password: kosong

Jika pengaturan MySQL di komputer berbeda, ubah konstanta koneksi tersebut.

## Struktur folder

```text
Lagakita/
├── assets/
│   ├── css/style.css
│   └── js/app.js
├── database/lagakita.sql
├── includes/
│   ├── db.php
│   ├── footer.php
│   └── navbar.php
├── berhasil.php
├── detail.php
├── index.php
├── pertandingan.php
├── pesan.php
├── README.md
└── PEMBAGIAN_TUGAS.md
```

## Alur pemesanan

Pengunjung memilih pertandingan, memilih kategori dan jumlah tiket, mengisi nama serta email, lalu mengirim formulir. Sistem mencatat pemesanan dengan status **menunggu**, menyimpan detail tiket, dan mengurangi stok dalam satu transaksi database. Halaman konfirmasi menampilkan kode pemesanan.

## Catatan

Data pertandingan dalam SQL hanya contoh untuk demonstrasi. Ganti jadwal dan harga dengan data yang benar sebelum aplikasi digunakan. Proyek ini merupakan starter untuk pembelajaran dan belum memproses pembayaran.

## Pembagian tugas kelompok

Pembagian berikut untuk kelompok beranggotakan empat orang. Ganti **Anggota 1–4** dengan nama anggota kelompok.

| Anggota | Tanggung jawab | Hasil kerja |
|---|---|---|
| Zuli Arifin — Tampilan | Mengatur navigasi, tata letak, CSS, dan tampilan responsif halaman. | Beranda, jadwal pertandingan, dan tampilan yang konsisten. |
| M.Maulfi fata Al Khair — Database | Menyiapkan database, tabel pertandingan dan kategori tiket, serta data contoh. | `database/lagakita.sql` dan data jadwal/tiket. |
| Nafran julian — Pemesanan | Membuat koneksi PHP ke MySQL, validasi formulir, penyimpanan pesanan, dan pengurangan stok. | `includes/db.php`, `pesan.php`, serta alur penyimpanan. |
| Abadi — Pengujian dan dokumentasi | Mencoba alur aplikasi, mencatat perbaikan, menyusun panduan, dan menyiapkan demo. | Pengujian, README, dan penjelasan presentasi. |

### Pekerjaan bersama

- Semua anggota mencoba alur dari beranda sampai halaman konfirmasi.
- Setiap perubahan kode diperiksa oleh minimal satu anggota lain.
- Kelompok menyepakati jadwal, nama tim, dan harga tiket untuk data demonstrasi.
- Saat presentasi, setiap anggota menjelaskan bagian yang dikerjakan.

### Urutan kerja yang disarankan

1. Anggota 2 menyiapkan database dan contoh jadwal.
2. Anggota 1 membuat tampilan halaman.
3. Anggota 3 menghubungkan halaman dengan database dan menyelesaikan pemesanan.
4. Anggota 4 menguji halaman dan merapikan panduan.
5. Seluruh anggota mencoba demo di XAMPP dan menyiapkan penjelasan.
