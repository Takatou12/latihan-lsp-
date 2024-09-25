<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['Nama'];
    $email = $_POST['Email'];

    // Mencegah SQL injection
    $nama = mysqli_real_escape_string($con, $nama);
    $email = mysqli_real_escape_string($con, $email);

    $sql = "SELECT * FROM Admin WHERE Nama='$nama' AND Email='$email'";
    $result = $con->query($sql);

    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $_SESSION['Nama'] = $nama;
        $_SESSION['Level'] = $row['Level'];

        // Set notifikasi sukses
        $_SESSION['login_success'] = "Login berhasil! Selamat datang, " . htmlspecialchars($nama) . ".";

        if ($row['Level'] == 'Admin'){
            header("Location: dashboard.php");
        } else if ($row['Level'] == 'User'){
            header("Location: user.php");
        }
        exit();
    } else {
        echo "Nama atau Email salah. Silahkan coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #e3f2fd; /* Light blue background */
}

.container {
    background-color: #ffffff; /* White background for the container */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    width: 300px;
}

h2 {
    text-align: center;
    color: #0d47a1; /* Deep blue */
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 5px;
    color: #0d47a1; /* Deep blue */
}

input[type="text"],
input[type="password"],
input[type="email"] {
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #90caf9; /* Light blue border */
    border-radius: 5px;
}

button {
    background-color: #0288d1; /* Medium blue */
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0277bd; /* Darker blue on hover */
}

a {
    text-align: center;
    display: block;
    margin-top: 10px;
    color: #0288d1; /* Medium blue */
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

p {
    text-align: center;
    color: #616161; /* Dark gray for text */
}

label[for="Nama"],
label[for="Email"] {
    color: #0d47a1; /* Deep blue */
}

</style>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="POST" action="login.php">
            <label for="Nama">Nama:</label>
            <input type="text" name="Nama" required><br>
            <label for="Email">Email:</label>
            <input type="Email" name="Email" required><br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
