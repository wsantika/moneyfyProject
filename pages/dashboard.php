<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:../security/config.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body style="text-align:center">
    <h1>Halaman Dashboard</h1>
    <a href="dashboard.php">Home</a>
    <a href="../security/logout.php">Logout</a>
    <hr>
    <h3>Selamat datang, <?php echo $_SESSION['user']['nama'] ?></h3>
    halaman ini tampil setelah user login
</body>

</html>