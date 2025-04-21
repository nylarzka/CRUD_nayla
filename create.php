<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $nomor_kursi = $_POST['nomor_kursi'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tujuan = $_POST['tujuan'];
    $waktu_keberangkatan = $_POST['waktu_keberangkatan'];

    $query = "INSERT INTO penumpang (nomor_kursi, nama, jenis_kelamin, tujuan, waktu_keberangkatan) VALUES ('$nomor_kursi', '$nama', '$jenis_kelamin', '$tujuan', '$waktu_keberangkatan')";
    if (mysqli_query($conn, $query)) {
        header('Location: index.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Penumpang - KA Serayu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tambah Penumpang</h1>
    <form method="POST">
        <input type="text" name="nomor_kursi" placeholder="Nomor Kursi" required>
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="radio" name="jenis_kelamin" value="L" required> L
        <input type="radio" name="jenis_kelamin" value="P" required> P
        <input type="text" name="tujuan" placeholder="Tujuan" required>
        <input type="time" name="waktu_keberangkatan" required>
        <button type="submit" name="submit">Tambah</button>
    </form>
    <a href="index.php">Kembali</a>
</body>
</html>
