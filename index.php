<?php
// // Koneksi ke database
// include 'config/database.php';

// // Ambil data buku terbaru (3 buku terakhir)
// $queryTerbaru = "SELECT * FROM buku ORDER BY id DESC LIMIT 3";
// $resultTerbaru = mysqli_query($conn, $queryTerbaru);

// // Ambil data buku rekomendasi (acak 3 buku)
// $queryRekomendasi = "SELECT * FROM buku ORDER BY RAND() LIMIT 3";
// $resultRekomendasi = mysqli_query($conn, $queryRekomendasi);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital | Beranda</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- NAVBAR -->
    <header class="navbar">
        <div class="logo">
            <img src="assets/img/logo.png" alt="Logo Perpustakaan">
            <h1>Perpustakaan Digital</h1>
        </div>
        <ul>
            <li><a href="index.php" class="active">Beranda</a></li>
            <li><a href="katalog.php">Katalog</a></li>
            <li><a href="daftar.php">Daftar Anggota</a></li>
            <li><a href="tentang.php">Tentang</a></li>
            <li><a href="bantuan.php">Bantuan</a></li>
            <li><a href="kontak.php">Kontak</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </header>

    <!-- HERO SECTION -->
    <section class="hero">
        <h1>Selamat Datang di Perpustakaan Digital</h1>
        <p>Temukan ribuan koleksi buku menarik yang bisa kamu baca dan pinjam secara online.</p>
        <a href="katalog.php"><button class="cta-btn">Cari Buku Sekarang</button></a>
    </section>

    <!-- SEARCH BAR -->
    <div class="search-bar">
        <form action="katalog.php" method="get">
            <input type="text" name="q" placeholder="Cari buku, penulis, atau kategori...">
            <button type="submit">Cari</button>
        </form>
    </div>

    <!-- BUKU TERBARU -->
    <section class="book-section">
        <h2>Buku Terbaru</h2>
        <div class="book-grid">
            <?php if (mysqli_num_rows($resultTerbaru) > 0): ?>
                <?php while ($buku = mysqli_fetch_assoc($resultTerbaru)): ?>
                    <div class="book-card">
                        <img src="assets/img/cover/<?= htmlspecialchars($buku['cover'] ?: 'default.jpg') ?>"
                            alt="<?= htmlspecialchars($buku['judul']) ?>">
                        <h3><?= htmlspecialchars($buku['judul']) ?></h3>
                        <p><?= htmlspecialchars($buku['penulis']) ?></p>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Belum ada buku terbaru.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- BUKU REKOMENDASI -->
    <section class="book-section">
        <h2>Rekomendasi Buku</h2>
        <div class="book-grid">
            <?php if (mysqli_num_rows($resultRekomendasi) > 0): ?>
                <?php while ($buku = mysqli_fetch_assoc($resultRekomendasi)): ?>
                    <div class="book-card">
                        <img src="assets/img/cover/<?= htmlspecialchars($buku['cover'] ?: 'default.jpg') ?>"
                            alt="<?= htmlspecialchars($buku['judul']) ?>">
                        <h3><?= htmlspecialchars($buku['judul']) ?></h3>
                        <p><?= htmlspecialchars($buku['penulis']) ?></p>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Belum ada buku rekomendasi.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <p>© <?= date("Y") ?> Perpustakaan Digital. Semua hak dilindungi. |
            <a href="tentang.php">Tentang Kami</a>
        </p>
    </footer>

</body>

</html>