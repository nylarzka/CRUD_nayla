<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

include "db.php";
$result = mysqli_query($conn, "SELECT * FROM penumpang");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Penumpang KA Serayu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Daftar Penumpang KA Serayu</h1>
    <p>Selamat datang, <?= $_SESSION['user']['username']; ?>!</p>

    <!-- Tabel Daftar Penumpang -->
    <table border="1">
        <thead>
            <tr>
                <th>Nomor Kursi</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tujuan</th>
                <th>Waktu Keberangkatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $row['nomor_kursi']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['jenis_kelamin']; ?></td>
                    <td><?= $row['tujuan']; ?></td>
                    <td><?= $row['waktu_keberangkatan']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> | 
                        <a href="delete.php?id=<?= $row['id']; ?>">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Tombol Logout -->
    <form method="POST">
        <button type="submit" name="logout">Logout</button>
    </form>
</body>
</html>
