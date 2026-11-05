
<?php
require_once __DIR__ . '/includes/db.php';

$stmt = $pdo->query("
    SELECT p.*,
    (SELECT MIN(harga)
     FROM kategori_tiket k
     WHERE k.pertandingan_id = p.id) AS harga_mulai
    FROM pertandingan p
    WHERE p.status = 'akan_datang'
    ORDER BY p.tanggal ASC
    LIMIT 6
");

$matches = $stmt->fetchAll();
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LagaKita | Tiket Sepak Bola</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="assets/css/style.css?v=2">
</head>

<body class="lk-body">

<?php include __DIR__ . '/includes/navbar.php'; ?>

<!-- HERO SECTION -->
<section class="lk-hero">
    <div class="lk-overlay"></div>

    <div class="container position-relative">
        <div class="row align-items-center min-vh-75">

            <div class="col-lg-7 py-5">

                <span class="lk-label">
                    <i class="bi bi-lightning-charge-fill"></i>
                    MUSIM SEPAK BOLA 2026
                </span>

                <h1 class="lk-hero-title mt-4">
                    Satu Stadion.<br>
                    Satu Semangat.<br>
                    <span>Rasakan Aksinya!</span>
                </h1>

                <p class="lk-hero-desc mt-3">
                    Jangan hanya menonton dari layar.
                    Rasakan atmosfer pertandingan secara langsung
                    dan dukung tim favoritmu bersama LagaKita.
                </p>

                <div class="d-flex flex-wrap gap-3 mt-4">

                    <a href="pertandingan.php" class="btn lk-btn-primary">
                        Cari Tiket Sekarang
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>

                    <a href="#pertandingan" class="btn lk-btn-outline">
                        Lihat Jadwal
                    </a>

                </div>

                <div class="lk-hero-info mt-5">
                    <div>
                        <h4>MUDAH</h4>
                        <small>Pemesanan tiket</small>
                    </div>

                    <div>
                        <h4>CEPAT</h4>
                        <small>Proses transaksi</small>
                    </div>

                    <div>
                        <h4>AMAN</h4>
                        <small>Data pemesanan</small>
                    </div>
                </div>

            </div>

            <div class="col-lg-5 d-none d-lg-block">
                <div class="lk-floating-card">
                    <div class="lk-card-icon">
                        <i class="bi bi-ticket-perforated-fill"></i>
                    </div>

                    <div>
                        <span>Pengalaman terbaik</span>
                        <h4>Matchday Dimulai!</h4>
                        <p>Temukan pertandingan favoritmu sekarang.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- KEUNGGULAN -->
<section class="lk-benefits">
    <div class="container">
        <div class="row g-4">

            <div class="col-md-4">
                <div class="lk-benefit">
                    <i class="bi bi-ticket-perforated"></i>
                    <div>
                        <h5>Pemesanan Mudah</h5>
                        <p>Pesan tiket pertandingan tanpa proses yang rumit.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="lk-benefit">
                    <i class="bi bi-calendar-event"></i>
                    <div>
                        <h5>Jadwal Terupdate</h5>
                        <p>Temukan jadwal pertandingan yang akan datang.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="lk-benefit">
                    <i class="bi bi-shield-check"></i>
                    <div>
                        <h5>Transaksi Tercatat</h5>
                        <p>Informasi pemesanan tersimpan dengan rapi.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- PERTANDINGAN -->
<section class="lk-matches py-5" id="pertandingan">

    <div class="container py-3">

        <div class="d-flex flex-wrap justify-content-between align-items-end mb-5">

            <div>
                <span class="lk-section-label">JADWAL PILIHAN</span>
                <h2 class="lk-section-title mt-2">
                    Pertandingan Mendatang
                </h2>
                <p class="text-muted mb-0">
                    Jangan lewatkan keseruan pertandingan berikutnya.
                </p>
            </div>

            <a href="pertandingan.php" class="lk-see-all mt-3">
                Lihat Semua Pertandingan
                <i class="bi bi-arrow-up-right"></i>
            </a>

        </div>


        <div class="row g-4">

            <?php foreach ($matches as $m): ?>

                <div class="col-md-6 col-lg-4">

                    <article class="lk-match-card h-100">

                        <div class="lk-match-top">

                            <span class="lk-match-status">
                                <span></span> Akan Datang
                            </span>

                            <span class="lk-match-league">
                                <?= e($m['kompetisi']) ?>
                            </span>

                        </div>


                        <div class="lk-match-date">
                            <i class="bi bi-calendar3"></i>

                            <?= e(date('d M Y', strtotime($m['tanggal']))) ?>

                            <span class="mx-2">|</span>

                            <i class="bi bi-clock"></i>

                            <?= e(date('H:i', strtotime($m['tanggal']))) ?> WIB
                        </div>


                        <div class="lk-team-area">

                            <div class="lk-team">
                                <div class="lk-team-logo">
                                    <?= e(strtoupper(substr($m['tim_tuan_rumah'], 0, 1))) ?>
                                </div>

                                <h5>
                                    <?= e($m['tim_tuan_rumah']) ?>
                                </h5>

                                <small>Tuan Rumah</small>
                            </div>


                            <div class="lk-vs">
                                VS
                            </div>


                            <div class="lk-team">
                                <div class="lk-team-logo lk-team-away">
                                    <?= e(strtoupper(substr($m['tim_tamu'], 0, 1))) ?>
                                </div>

                                <h5>
                                    <?= e($m['tim_tamu']) ?>
                                </h5>

                                <small>Tamu</small>
                            </div>

                        </div>


                        <div class="lk-stadium">
                            <i class="bi bi-geo-alt-fill"></i>
                            <?= e($m['stadion']) ?>
                        </div>


                        <div class="lk-match-bottom">

                            <div>
                                <small>Harga tiket mulai</small>

                                <h4>
                                    <?= $m['harga_mulai'] !== null
                                        ? rupiah($m['harga_mulai'])
                                        : 'Belum tersedia' ?>
                                </h4>
                            </div>

                            <a href="detail.php?id=<?= (int)$m['id'] ?>"
                               class="lk-detail-btn"
                               aria-label="Lihat detail pertandingan">
                                <i class="bi bi-arrow-right"></i>
                            </a>

                        </div>

                    </article>

                </div>

            <?php endforeach; ?>


            <?php if (!$matches): ?>

                <div class="col-12">
                    <div class="lk-empty">
                        <i class="bi bi-calendar-x"></i>
                        <h5>Belum Ada Pertandingan</h5>
                        <p>Jadwal pertandingan akan ditampilkan di sini.</p>
                    </div>
                </div>

            <?php endif; ?>

        </div>

    </div>

</section>


<!-- CTA -->
<section class="lk-cta">
    <div class="container text-center py-5">

        <span class="lk-section-label">JANGAN LEWATKAN</span>

        <h2 class="mt-3">
            Sepak Bola Lebih Seru<br>
            <span>Jika Ditonton Langsung!</span>
        </h2>

        <p>
            Temukan pertandingan favoritmu dan amankan tiketnya sekarang.
        </p>

        <a href="pertandingan.php" class="btn lk-btn-primary mt-3">
            Pesan Tiket Sekarang
            <i class="bi bi-arrow-right ms-2"></i>
        </a>

    </div>
</section>


<?php include __DIR__ . '/includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
