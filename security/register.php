<?php
session_start();
include "../security/config.php";   // Pastikan config.php berisi variabel $pdo
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>

    <?php
    if (isset($_POST['username'])) {
        $nama = trim($_POST['nama']);
        $username = trim($_POST['username']);
        $password = md5($_POST['password']); // disamakan dengan login.php
    
        // 1. Cek username sudah ada atau belum
        $check = $pdo->prepare("SELECT * FROM user WHERE username = :username");
        $check->execute([':username' => $username]);

        if ($check->rowCount() > 0) {
            echo '<script>alert("Username sudah digunakan!");</script>';
        } else {
            // 2. Insert user baru
            $insert = $pdo->prepare("
                INSERT INTO user (nama, username, password) 
                VALUES (:nama, :username, :password)
            ");

            if (
                $insert->execute([
                    ':nama' => $nama,
                    ':username' => $username,
                    ':password' => $password
                ])
            ) {
                echo '<script>alert("Register berhasil! Silakan login."); location.href="../security/login.php";</script>';
            } else {
                echo '<script>alert("Terjadi kesalahan saat mendaftar.");</script>';
            }
        }
    }
    ?>

    <form method="post">
        <table align="center">
            <tr>
                <td colspan="2" align="center">
                    <h3>Register User</h3>
                </td>
            </tr>

            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" required></td>
            </tr>

            <tr>
                <td>Username</td>
                <td><input type="text" name="username" required></td>
            </tr>

            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required></td>
            </tr>

            <tr>
                <td>
                    <button type="submit">Register</button>
                    <a href="login.php">Login</a>
                </td>
            </tr>
        </table>
    </form>

</body>

</html>