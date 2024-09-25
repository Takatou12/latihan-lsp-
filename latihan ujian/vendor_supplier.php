<?php 
include 'koneksi.php';
include 'navbar.php';
$query ="SELECT * FROM supplier";
$result = mysqli_query($con, $query);

if (!$result){
    die("query error: " . mysqli_error($con));
}

?>
<div class="container">
<header><h3>Data Supplier</h3></header>
    <table border="1">
    <a href="vendor_insert.php">
        <button type="button" class="insert-button">Insert Data Supplier</button>
    </a>
    <tr>
        <th>Id</th>
        <th>Nama</th>
        <th>Kontak</th>
        <th>Nama Barang</th>
        <th>Nomor Invoice</th>
        <th>Action</th>
    </tr>   
    <?php 
       while ($row = mysqli_fetch_assoc($result)) {?>
    <tr>
     <td><?php echo $row['Id'];?></td>
     <td><?php echo $row['Nama'];?></td>
     <td><?php echo $row['Kontak'];?></td>
     <td><?php echo $row['Nama_barang'];?></td>
     <td><?php echo $row['Nomor_invoice'];?></td>
     <td>
        <a href="vendor_update.php?id=<?php echo $row['Id']; ?>" class="action-button update-button">Update</a>
        <a href="vendor_delete.php?id=<?php echo $row['Id']; ?>" class="action-button delete-button" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Delete</a>
     </td>
    </tr>
       <?php } ?>
    </table>
    
    <br>
</div>

<style>
/* CSS untuk tombol Insert */
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
