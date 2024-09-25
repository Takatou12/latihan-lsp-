<?php 
include 'koneksi.php';
include 'navbar.php';
$query ="SELECT * FROM storage_unit";
$result = mysqli_query($con, $query);

if (!$result){
    die("query error: " . mysqli_error($con));
}
?>
<div class="container">
<header><h3>Data Storage</h3></header>
<a href="storage_insert.php">
        <button type="button" class="insert-button">Insert Storage</button>
</a>
    <table border="1">
    <tr>
        <th>Id</th>
        <th>Nama Gudang</th>
        <th>Lokasi Gudang</th>
        <th>Action</th>
    </tr>
    <?php 
       while ($row = mysqli_fetch_assoc($result)) {?>
       <tr>
       <td><?php echo $row['Id'];?></td>
       <td><?php echo $row['Nama_gudang'];?></td>
       <td><?php echo $row['Lokasi_gudang'];?></td>
       <td>
        <a href="storage_update.php?id=<?php echo $row['Id']; ?>" class="action-button update-button">Update</a>
        <a href="storage_delete.php?id=<?php echo $row['Id']; ?>" class="action-button delete-button" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Delete</a>
     </td>
       </tr>
       <?php } ?>
    </table>
</div>
<style>
.insert-button {
    background-color: blue;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

.insert-button:hover {
    background-color: #00CED1;
}

.action-button {
    padding: 5px 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    text-decoration: none;
    color: white;
}
.update-button {
    background-color: #008CBA;
    margin-right: 10px;
}

.update-button:hover {
    background-color: #007bb5;
}

.delete-button {
    background-color: #f44336;
}

.delete-button:hover {
    background-color: #d32f2f;
}
</style>


