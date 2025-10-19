<?php
include '../../config/database.php';
$result = mysqli_query($conn, "SELECT * FROM buku");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Buku</title>
</head>

<body>
    <h2>Daftar Buku</h2>
    <a href="create.php">+ Tambah Buku</a>
    <table border="1" cellpadding="8">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1;
        while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['judul'] ?></td>
                <td><?= $row['penulis'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                    <a href="delete.php?id=<?= $row['id'] ?>">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>