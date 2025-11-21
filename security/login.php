<?php
session_start();
include "../security/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <?php
    if (isset($_POST['username'])) {
        $username = trim($_POST['username']);
        $password = md5($_POST['password']); // consider using password_hash() for new applications
    
        // Use PDO prepared statement to avoid SQL injection
        $stmt = $pdo->prepare("SELECT * FROM user WHERE username = :username AND password = :password");
        $stmt->execute([':username' => $username, ':password' => $password]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $_SESSION['user'] = $data;
            $displayName = htmlspecialchars($data['username'] ?? '', ENT_QUOTES, 'UTF-8');
            echo '<script>alert("Selamat datang, ' . $displayName . '"); location.href="../pages/dashboard.php";</script>';
        } else {
            echo '<script>alert("Username/ password tidak sesuai.")</script>';
        }

    }
    ?>

    <form method="post">
        <table align="center">
            <tr>
                <td colspan="2" align="center">
                    <h3>Login User</h3>
                </td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>
                    <button type="submit">Login</button>
                    <a href="register.php">Register</a>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>