<?php
// Koneksi ke database
include 'config/database.php';

// Ambil data buku terbaru (3 buku terakhir)
$queryTerbaru = "SELECT * FROM buku ORDER BY id DESC LIMIT 3";
$resultTerbaru = mysqli_query($conn, $queryTerbaru);

// Ambil data buku rekomendasi (acak 3 buku)
$queryRekomendasi = "SELECT * FROM buku ORDER BY RAND() LIMIT 3";
$resultRekomendasi = mysqli_query($conn, $queryRekomendasi);
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

    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="brand">
                <img src="assets/img/logo.png" alt="Logo Perpustakaan" class="logo">
                <h2>Perpustakaan</h2>
            </div>

            <nav>
                <ul>
                    <li><a href="index.php" class="active">Beranda</a></li>
                    <li><a href="katalog.php">Katalog</a></li>
                    <li><a href="daftar.php">Pendaftaran</a></li>
                    <li><a href="tentang.php">Tentang Kami</a></li>
                    <li><a href="bantuan.php">Bantuan</a></li>
                    <li><a href="kontak.php">Kontak</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </nav>

            <div class="user-profile">
                <img src="assets/img/user.jpg" alt="User">
                <div>
                    <h4>Pengunjung</h4>
                    <p>Tamu</p>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="content">
            <header class="search-bar">
                <form action="katalog.php" method="get">
                    <input type="text" name="q" placeholder="Cari buku, penulis, atau kategori...">
                </form>
            </header>

            <!-- Buku Terbaru -->
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

            <!-- Buku Rekomendasi -->
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
        </main>
    </div>

</body>

</html>