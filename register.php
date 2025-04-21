<?php
session_start();
include "db.php";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $confirm_password = md5($_POST['confirm_password']);

    if ($password == $confirm_password) {
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo '<script>alert("Username sudah terdaftar!");</script>';
        } else {
            $role = 'admin';
            $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
            if (mysqli_query($conn, $query)) {
                echo '<script>alert("Pendaftaran berhasil! Silakan login."); window.location.href = "login.php";</script>';
            } else {
                echo '<script>alert("Gagal mendaftar!");</script>';
            }
        }
    } else {
        echo '<script>alert("Password tidak sama dengan konfirmasi password!");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Pengguna - KA Serayu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="register-container">
        <h2>Pendaftaran Pengguna</h2>
        <form method="POST">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="confirm_password">Konfirmasi Password</label>
                <input type="password" name="confirm_password" required>
            </div>
            <button type="submit" name="register">Daftar</button>
        </form>
        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </div>
</body>
</html>
