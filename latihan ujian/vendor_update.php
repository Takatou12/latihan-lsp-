<?php
include 'koneksi.php'; 

if (!$con) {
    die('Database connection failed.');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM supplier WHERE Id = '$id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        die('Record not found.');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama = mysqli_real_escape_string($con, $_POST['nama']);
        $kontak = mysqli_real_escape_string($con, $_POST['kontak']);
        $nama_barang = mysqli_real_escape_string($con, $_POST['nama_barang']);
        $nomor_invoice = mysqli_real_escape_string($con, $_POST['nomor_invoice']);

        $check_query = "SELECT * FROM supplier WHERE Nama_barang = '$nama_barang' AND Id != '$id'";
        $check_result = mysqli_query($con, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            $message = 'Error: Nama_barang already exists.';
        } else {
            $update_query = "UPDATE supplier SET Nama = '$nama', Kontak = '$kontak', Nama_barang = '$nama_barang', Nomor_invoice = '$nomor_invoice' WHERE Id = '$id'";

            if (mysqli_query($con, $update_query)) {
                $message = 'Data updated successfully.';
                header('Refresh: 2; URL=vendor_supplier.php'); 
                exit();
            } else {
                $message = 'Error updating record: ' . mysqli_error($con);
            }
        }
    }
} else {
    die('No ID specified.');
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Supplier</title>
</head>
<body>
    <div class="form-container">
        <h1>Update Supplier</h1>
        <?php if (isset($message)): ?>
            <p class="message"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($row['Nama']); ?>" required><br>

            <label for="kontak">Kontak:</label>
            <input type="text" id="kontak" name="kontak" value="<?php echo htmlspecialchars($row['Kontak']); ?>" required><br>

            <label for="nama_barang">Nama Barang:</label>
            <input type="text" id="nama_barang" name="nama_barang" value="<?php echo htmlspecialchars($row['Nama_barang']); ?>" required><br>

            <label for="nomor_invoice">Nomor Invoice:</label>
            <input type="text" id="nomor_invoice" name="nomor_invoice" value="<?php echo htmlspecialchars($row['Nomor_invoice']); ?>" required><br>

            <input type="submit" value="Update" class="submit-button">
            <a href="vendor_supplier.php" class="back-button">Back</a>
        </form>
    </div>
</body>
</html>
