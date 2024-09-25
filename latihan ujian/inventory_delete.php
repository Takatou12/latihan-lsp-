<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM inventory WHERE Id = $id";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: inventory.php");
        exit();
    } else {
        die("Query error: " . mysqli_error($con));
    }
}
?>
