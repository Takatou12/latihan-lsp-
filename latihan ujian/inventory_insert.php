
<!DOCTYPE html><?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gudang";

$con = new mysqli($servername, $username, $password, $dbname);
if (!$con) {
    die('Database connection failed.');
}

$message = ''; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang = mysqli_real_escape_string($con, $_POST['Nama_barang']);
    $jenis_barang = mysqli_real_escape_string($con, $_POST['Jenis_barang']);
    $kuantitas_stock = mysqli_real_escape_string($con, $_POST['Kuantitas_stock']);
    $lokasi_gudang = mysqli_real_escape_string($con, $_POST['Lokasi_gudang']);
    $serial_number = mysqli_real_escape_string($con, $_POST['Serial_number']);
    $harga = mysqli_real_escape_string($con, $_POST['harga']);

    $insert_query = "INSERT  INTO  inventory (Nama_barang, Jenis_barang, Kuantitas_stock, Lokasi_gudang, Serial_number, harga) VALUES ('$nama_barang', '$jenis_barang', '$kuantitas_stock', '$lokasi_gudang', '$serial_number', '$harga')";

    if (mysqli_query($con, $insert_query)) {
        $message = 'Data successfully inserted!';
    
        header("Refresh: 2; URL=inventory.php");
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
    <title>Insert Inventory</title>
</head>
<body>
    <div class="container">
        <header><h3>Insert Inventory</h3></header>
        <form method="POST" action="inventory_insert.php">
            <label for="Nama_barang">Nama Barang:</label>
            <select id="Nama_barang" name="Nama_barang" required>
                <option value="" disabled selected>Select Nama Barang</option>
                <?php 
                include 'koneksi.php';
                $query_nama_barang = mysqli_query($con, "SELECT * FROM supplier");
                while ($data = mysqli_fetch_array($query_nama_barang)){
                    echo '<option value="'.$data['Nama_barang']. '">'.$data['Nama_barang'].'</option>';
                }
                ?>
            </select><br>

            <label for="Jenis_barang">Jenis Barang:</label>
            <input type="text" id="Jenis_barang" name="Jenis_barang" required><br>

            <label for="Kuantitas_stock">Kuantitas Stock:</label>
            <input type="text" id="Kuantitas_stock" name="Kuantitas_stock" required><br>

            <label for="Lokasi_gudang">Lokasi Gudang:</label>
            <select id="Lokasi_gudang" name="Lokasi_gudang" required>
                <option value="" disabled selected>Select Lokasi Gudang</option>
                <?php 
                include 'koneksi.php';
                $query_lokasi_gudang = mysqli_query($con, "SELECT * FROM storage_unit");
                while ($data = mysqli_fetch_array($query_lokasi_gudang)){
                    echo '<option value="'.$data['Lokasi_gudang']. '">'.$data['Lokasi_gudang'].'</option>';
                }
                ?>
            </select><br>

            <label for="Serial_number">Serial Number:</label>
            <input type="text" id="Serial_number" name="Serial_number" required><br>

            <label for="harga">Harga:</label>
            <input type="text" id="harga" name="harga" required><br>
           
            <button type="submit" class="submit-button">Insert</button>
            <button type="button" class="back-button" onclick="window.location.href='inventory.php'">Back</button>
        </form>
    </div>
</body>
</html>
