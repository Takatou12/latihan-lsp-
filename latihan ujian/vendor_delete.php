<?php
include 'koneksi.php';

$id = $_GET['id']; 
$query = "DELETE FROM supplier WHERE Id='$id'";
$result = mysqli_query($con, $query);

if ($result) {
    header("Location: supplier_list.php"); 
} else {
    echo "Gagal menghapus data: " . mysqli_error($con);
}
?>
