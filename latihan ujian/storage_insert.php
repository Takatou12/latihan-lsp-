<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_gudang = mysqli_real_escape_string($con, $_POST['nama_gudang']);
    $lokasi_gudang = mysqli_real_escape_string($con, $_POST['lokasi_gudang']);

    $insert_query = "INSERT INTO storage_unit (Nama_gudang, Lokasi_gudang) VALUES ('$nama_gudang', '$lokasi_gudang')";

    if (mysqli_query($con, $insert_query)) {
        $message = 'Data successfully inserted!';
        header("Refresh: 2; URL=storage_unit.php");
    } else {
        $message = 'Error inserting data: ' . mysqli_error($con);
    }
}

mysqli_close($con);
?>

<div class="form-container">
    <h2>Insert New Storage Unit</h2>
    <?php if (isset($message)): ?>
        <p class="message"><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
    <form action="storage_insert.php" method="POST">
        <label for="nama_gudang">Nama Gudang:</label><br>
        <input type="text" id="nama_gudang" name="nama_gudang" required><br><br>

        <label for="lokasi_gudang">Lokasi Gudang:</label><br>
        <input type="text" id="lokasi_gudang" name="lokasi_gudang" required><br><br>

        <input type="submit" value="Insert" class="submit-button">
        <a href="storage_unit.php" class="back-button">Back</a>
    </form>
</div>
<