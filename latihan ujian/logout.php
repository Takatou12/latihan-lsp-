<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Jika form dikirim
    if (isset($_POST['confirm_logout'])) {
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Logout</title>
</head>
<body>
    <div class="container">
        <h1>Konfirmasi Logout</h1>
        <form method="post" action="">
            <button type="submit" name="confirm_logout">Ya, Logout</button>
            <a href="navbar.php">Batal</a> 
        </form>
    </div>
</body>
</html>
