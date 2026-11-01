CREATE DATABASE IF NOT EXISTS lagakita CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE lagakita;

CREATE TABLE IF NOT EXISTS pertandingan (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  tim_tuan_rumah VARCHAR(100) NOT NULL,
  tim_tamu VARCHAR(100) NOT NULL,
  kompetisi VARCHAR(120) NOT NULL,
  tanggal DATETIME NOT NULL,
  stadion VARCHAR(150) NOT NULL,
  kota VARCHAR(100) NOT NULL,
  deskripsi TEXT NULL,
  status ENUM('akan_datang','selesai','dibatalkan') NOT NULL DEFAULT 'akan_datang',
  dibuat_pada TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX idx_pertandingan_tanggal_status (tanggal, status)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS kategori_tiket (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  pertandingan_id INT UNSIGNED NOT NULL,
  nama_kategori VARCHAR(80) NOT NULL,
  harga DECIMAL(12,2) UNSIGNED NOT NULL,
  stok INT UNSIGNED NOT NULL DEFAULT 0,
  dibuat_pada TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_kategori_pertandingan FOREIGN KEY (pertandingan_id) REFERENCES pertandingan(id) ON DELETE CASCADE,
  UNIQUE KEY uq_kategori_pertandingan_nama (pertandingan_id, nama_kategori)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS pemesanan (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  kode_pemesanan VARCHAR(24) NOT NULL UNIQUE,
  nama_pemesan VARCHAR(120) NOT NULL,
  email VARCHAR(150) NOT NULL,
  no_telepon VARCHAR(30) NULL,
  total_harga DECIMAL(12,2) UNSIGNED NOT NULL,
  status ENUM('menunggu','dibayar','dibatalkan') NOT NULL DEFAULT 'menunggu',
  dibuat_pada TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX idx_pemesanan_email (email)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS detail_pemesanan (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  pemesanan_id INT UNSIGNED NOT NULL,
  pertandingan_id INT UNSIGNED NOT NULL,
  kategori_tiket_id INT UNSIGNED NOT NULL,
  jumlah INT UNSIGNED NOT NULL,
  harga_satuan DECIMAL(12,2) UNSIGNED NOT NULL,
  subtotal DECIMAL(12,2) UNSIGNED NOT NULL,
  CONSTRAINT fk_detail_pemesanan FOREIGN KEY (pemesanan_id) REFERENCES pemesanan(id) ON DELETE CASCADE,
  CONSTRAINT fk_detail_pertandingan FOREIGN KEY (pertandingan_id) REFERENCES pertandingan(id),
  CONSTRAINT fk_detail_kategori FOREIGN KEY (kategori_tiket_id) REFERENCES kategori_tiket(id),
  CHECK (jumlah > 0)
) ENGINE=InnoDB;

INSERT INTO pertandingan (id,tim_tuan_rumah,tim_tamu,kompetisi,tanggal,stadion,kota,deskripsi,status) VALUES
(1,'Persija Jakarta','Persib Bandung','Liga Indonesia','2026-12-12 19:00:00','Stadion Utama Gelora Bung Karno','Jakarta','Laga klasik penuh gengsi. Datang lebih awal dan dukung tim favoritmu.','akan_datang'),
(2,'Arema FC','Persebaya Surabaya','Liga Indonesia','2026-12-19 15:30:00','Stadion Kanjuruhan','Malang','Derbi Jawa Timur dalam suasana stadion yang meriah.','akan_datang'),
(3,'Bali United','PSM Makassar','Liga Indonesia','2026-12-27 20:00:00','Stadion Kapten I Wayan Dipta','Gianyar','Pertandingan seru di penghujung tahun.','akan_datang')
ON DUPLICATE KEY UPDATE tim_tuan_rumah=VALUES(tim_tuan_rumah), tim_tamu=VALUES(tim_tamu), kompetisi=VALUES(kompetisi), tanggal=VALUES(tanggal), stadion=VALUES(stadion), kota=VALUES(kota), deskripsi=VALUES(deskripsi), status=VALUES(status);

INSERT INTO kategori_tiket (pertandingan_id,nama_kategori,harga,stok) VALUES
(1,'Tribun Atas',75000,250),(1,'Tribun Timur',125000,150),(1,'VIP',350000,50),
(2,'Tribun Ekonomi',60000,300),(2,'Tribun Utama',150000,120),(2,'VIP',300000,40),
(3,'Tribun Reguler',80000,200),(3,'Tribun Barat',175000,100),(3,'VIP',400000,35)
ON DUPLICATE KEY UPDATE harga=VALUES(harga), stok=VALUES(stok);
