<?php
include 'koneksi.php';

$query = isset($_GET['query']) ? mysqli_real_escape_string($con, $_GET['query']) : '';

$sql = "
    SELECT 'inventory' AS table_name, Id AS id, Nama_barang AS name 
    FROM inventory 
    WHERE Nama_barang LIKE '%$query%' OR Lokasi_gudang LIKE '%$query%' OR Jenis_barang LIKE '%$query%' OR Serial_number LIKE '%$query%'
    UNION ALL
    SELECT 'storage_unit' AS table_name, Id AS id, Nama_gudang AS name 
    FROM storage_unit 
    WHERE Nama_gudang LIKE '%$query%' OR Lokasi_gudang LIKE '%$query%'
    UNION ALL
    SELECT 'supplier' AS table_name, Id AS id, Nama AS name 
    FROM supplier 
    WHERE Nama LIKE '%$query%' OR Nama_barang LIKE '%$query%' OR Nomor_invoice LIKE '%$query%'
";

$result = mysqli_query($con, $sql);

if (!$result) {
    die("Query error: " . mysqli_error($con));
}

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        switch ($row['table_name']) {
            case 'inventory':
                $url = "inventory.php?id=" . urlencode($row['id']);
                break;
            case 'storage_unit':
                $url = "storage_unit.php?id=" . urlencode($row['id']);
                break;
            case 'supplier':
                $url = "vendor_supplier.php?id=" . urlencode($row['id']);
                break;
        }

        echo 'Redirecting to URL: ' . htmlspecialchars($url) . '<br>';

        header("Location: " . $url);
        exit();
    }
} else {
    echo 'Tidak ada hasil yang ditemukan.';
}

mysqli_close($con);
?>
