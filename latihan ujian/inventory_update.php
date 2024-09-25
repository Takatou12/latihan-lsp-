<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM inventory WHERE Id = $id";
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($con));
    }

    $row = mysqli_fetch_assoc($result);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['Id'];
    $nama_barang = $_POST['Nama_barang'];
    $jenis_barang = $_POST['Jenis_barang'];
    $kuantitas_stock = $_POST['Kuantitas_stock'];
    $lokasi_gudang = $_POST['Lokasi_gudang'];
    $serial_number = $_POST['Serial_number'];
    
   
    $harga = str_replace('.', '', $_POST['harga']); 

    
    $query = "UPDATE inventory SET Nama_barang='$nama_barang', Jenis_barang='$jenis_barang', Kuantitas_stock='$kuantitas_stock', Lokasi_gudang='$lokasi_gudang', Serial_number='$serial_number', harga='$harga' WHERE Id=$id";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: inventory.php");
        exit();
    } else {
        die("Query error: " . mysqli_error($con));
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Inventory</title>
</head>
<body>
    <div class="form-container">
        <header><h3>Update Inventory</h3></header>
        <form method="POST" action="inventory_update.php">
            <input type="hidden" name="Id" value="<?php echo $row['Id']; ?>">
            <label for="Nama_barang">Nama Barang:</label>
            <input type="text" id="Nama_barang" name="Nama_barang" value="<?php echo htmlspecialchars($row['Nama_barang']); ?>" required><br>

            <label for="Jenis_barang">Jenis Barang:</label>
            <input type="text" id="Jenis_barang" name="Jenis_barang" value="<?php echo htmlspecialchars($row['Jenis_barang']); ?>" required><br>

            <label for="Kuantitas_stock">Kuantitas Stock:</label>
            <input type="number" id="Kuantitas_stock" name="Kuantitas_stock" value="<?php echo htmlspecialchars($row['Kuantitas_stock']); ?>" required><br>

            <label for="Lokasi_gudang">Lokasi Gudang:</label>
            <input type="text" id="Lokasi_gudang" name="Lokasi_gudang" value="<?php echo htmlspecialchars($row['Lokasi_gudang']); ?>" required><br>

            <label for="Serial_number">Serial Number:</label>
            <input type="text" id="Serial_number" name="Serial_number" value="<?php echo htmlspecialchars($row['Serial_number']); ?>" required><br>
            
            <label for="harga">Harga:</label>
            <input type="text" id="harga" name="harga" value="<?php echo htmlspecialchars($row['harga']); ?>" required><br>
           
            <button class="submit-button" type="submit">Update</button>
            <a href="inventory.php" class="back-button">Back</a>
        </form>
    </div>
</body>
</html>

