<?php
    $username = 'root';
    $password = 'WSantika87!';
    $pdo = null;

    try {
        $dsn = 'mysql:host=localhost;port=3306;dbname=db_moneyfy';
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
?>