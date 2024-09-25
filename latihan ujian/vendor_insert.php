<?php
include 'koneksi.php'; 

if (!$con) {
    die('Database connection failed.');
}

$message = ''; 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $kontak = mysqli_real_escape_string($con, $_POST['kontak']);
    $nama_barang = mysqli_real_escape_string($con, $_POST['nama_barang']);
    $nomor_invoice = mysqli_real_escape_string($con, $_POST['nomor_invoice']);

    $insert_query = "INSERT INTO supplier (Nama, Kontak, Nama_barang, Nomor_invoice) VALUES ('$nama', '$kontak', '$nama_barang', '$nomor_invoice')";

    if (mysqli_query($con, $insert_query)) {
        $message = 'Data successfully inserted!';
        header("Refresh: 2; URL=vendor_supplier.php");
    } else {
        $message = 'Error inserting data: ' . mysqli_error($con);
    }
}

mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert New Supplier</title>
</head>
<body>
    <div class="form-container">
        <h2>Insert New Supplier</h2>
        <?php if ($message): ?>
            <p class="message"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>
        <form action="vendor_insert.php" method="POST">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required><br>

            <label for="kontak">Kontak:</label>
            <input type="text" id="kontak" name="kontak" required><br>

            <label for="nama_barang">Nama Barang:</label>
            <input type="text" id="nama_barang" name="nama_barang" required><br>

            <label for="nomor_invoice">Nomor Invoice:</label>
            <input type="text" id="nomor_invoice" name="nomor_invoice" required><br>

            <input type="submit" value="Insert" class="submit-button">
            <a href="vendor_supplier.php" class="back-button">Back</a>
        </form>
    </div>
</body>
</html>

