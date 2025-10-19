<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit;
}
$user = $_SESSION['user'];
?>
<h2>Halo, <?= $user['nama'] ?>!</h2>
<p>Selamat datang di dashboard anggota.</p>
<a href="../katalog.php">Lihat Katalog Buku</a>