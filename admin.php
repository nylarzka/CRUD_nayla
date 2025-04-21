<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include "db.php";

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}

if (isset($_POST['add'])) {
    $nomor_kursi = $_POST['nomor_kursi'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tujuan = $_POST['tujuan'];
    $waktu_keberangkatan = $_POST['waktu_keberangkatan'];

    $query = "INSERT INTO penumpang (nomor_kursi, nama, jenis_kelamin, tujuan, waktu_keberangkatan) 
              VALUES ('$nomor_kursi', '$nama', '$jenis_kelamin', '$tujuan', '$waktu_keberangkatan')";
    mysqli_query($conn, $query);
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM penumpang WHERE id = $id";
    mysqli_query($conn, $query);
}

$query = "SELECT * FROM penumpang";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - KA Serayu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Daftar Penumpang KA Serayu</h2>
    <form method="POST">
        <h3>Tambah Penumpang</h3>
        <input type="text" name="nomor_kursi" placeholder="Nomor Kursi" required>
        <input type="text" name="nama" placeholder="Nama" required>
        <select name="jenis_kelamin" required>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
        <input type="text" name="tujuan" placeholder="Tujuan" required>
        <input type="time" name="waktu_keberangkatan" required>
        <button type="submit" name="add">Tambah</button>
    </form>

    <h3>Daftar Penumpang</h3>
    <table>
        <tr>
            <th>Nomor Kursi</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tujuan</th>
            <th>Waktu Keberangkatan</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $row['nomor_kursi'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['jenis_kelamin'] ?></td>
            <td><?= $row['tujuan'] ?></td>
            <td><?= $row['waktu_keberangkatan'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> | 
                <a href="?delete=<?= $row['id'] ?>">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <form method="POST">
        <button type="submit" name="logout">Logout</button>
    </form>
</body>
</html>
