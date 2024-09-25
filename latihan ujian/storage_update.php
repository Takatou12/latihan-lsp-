<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    die('ID tidak ada.');
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $query = "SELECT * FROM storage_unit WHERE Id = '$id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
}

$id = mysqli_real_escape_string($con, $_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_gudang = mysqli_real_escape_string($con, $_POST['nama_gudang']);
    $lokasi_gudang = mysqli_real_escape_string($con, $_POST['lokasi_gudang']);

    $update_query = "UPDATE storage_unit SET Nama_gudang='$nama_gudang', Lokasi_gudang='$lokasi_gudang' WHERE Id='$id'";

    if (mysqli_query($con, $update_query)) {
        $message = 'Data successfully updated';
        header("Refresh: 2; URL=storage_unit.php");
    } else {
        $message = 'Error updating data: ' . mysqli_error($con);
    }
} else {
    $result = mysqli_query($con, "SELECT * FROM storage_unit WHERE Id='$id'");
    $row = mysqli_fetch_assoc($result);
}

mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Storage Unit</title>
</head>
<body>
    <div class="form-container">
        <h2>Update Storage Unit</h2>
        <?php if (isset($message)): ?>
            <p class="message"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>
        <form action="storage_update.php?id=<?php echo htmlspecialchars($id); ?>" method="POST">
            <label for="nama_gudang">Nama Gudang:</label><br>
            <input type="text" id="nama_gudang" name="nama_gudang" value="<?php echo htmlspecialchars($row['Nama_gudang']); ?>" required><br><br>

            <label for="lokasi_gudang">Lokasi Gudang:</label><br>
            <input type="text" id="lokasi_gudang" name="lokasi_gudang" value="<?php echo htmlspecialchars($row['Lokasi_gudang']); ?>" required><br><br>

            <input type="submit" value="Update" class="submit-button">
            <a href="storage_unit.php" class="back-button">Back</a>
        </form>
    </div>
</body>
</html>


