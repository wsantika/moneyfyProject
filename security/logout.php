<?php
session_start();
session_destroy();
?>

<script type="text/javascript">
    alert('Selamat, Anda telah berhasil logout!.');
    location.href = "../security/login.php";
</script>