<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM penumpang WHERE id = $id");
    $penumpang = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $nomor_kursi = $_POST['nomor_kursi'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tujuan = $_POST['tujuan'];
    $waktu_keberangkatan = $_POST['waktu_keberangkatan'];

    $query = "UPDATE penumpang SET nomor_kursi='$nomor_kursi', nama='$nama', jenis_kelamin='$jenis_kelamin', tujuan='$tujuan', waktu_keberangkatan='$waktu_keberangkatan' WHERE id=$id";
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
    <title>Edit Penumpang - KA Serayu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Penumpang</h1>
    <form method="POST">
        <input type="text" name="nomor_kursi" value="<?= $penumpang['nomor_kursi'] ?>" required>
        <input type="text" name="nama" value="<?= $penumpang['nama'] ?>" required>
        <input type="radio" name="jenis_kelamin" value="L" <?= $penumpang['jenis_kelamin'] == 'L' ? 'checked' : '' ?> required> L
        <input type="radio" name="jenis_kelamin" value="P" <?= $penumpang['jenis_kelamin'] == 'P' ? 'checked' : '' ?> required> P
        <input type="text" name="tujuan" value="<?= $penumpang['tujuan'] ?>" required>
        <input type="time" name="waktu_keberangkatan" value="<?= $penumpang['waktu_keberangkatan'] ?>" required>
        <button type="submit" name="update">Update</button>
    </form>
    <a href="index.php">Kembali</a>
</body>
</html>
