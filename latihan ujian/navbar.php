<?php 
 include 'koneksi.php';
 session_start();

if (isset($_SESSION['login_success'])) {
    echo '<p style="text-align: center; color: green;">' . $_SESSION['login_success'] . '</p>';
    unset($_SESSION['login_success']);
}
?>

<style>
body {
    background: skyblue;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    min-height: 100vh;
}

.sidebar {
    width: 240px;
    background-color: #2c3e50;
    color: #ecf0f1;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    padding: 20px;
    box-shadow: 2px 0 5px rgba(0,0,0,0.2);
    overflow-y: auto;
}

.sidebar h2 {
    text-align: center;
    color: #ffffff;
    font-size: 24px;
    margin-bottom: 30px;
}

.sidebar ul {
    list-style: none;
    padding: 0;
}

.sidebar ul li {
    margin-bottom: 20px;
}

.sidebar ul li a {
    color: #ecf0f1;
    font-size: 18px;
    text-decoration: none;
    display: block;
    padding: 10px;
    border-radius: 6px;
    transition: background-color 0.3s ease;
}

.sidebar ul li a:hover {
    background-color: #34495e;
}

.sidebar form.search-form {
    display: flex;
    align-items: center; 
    margin-top: 20px;
}

.sidebar input[type="text"] {
    padding: 8px;
    font-size: 16px;
    width: 100%; 
    border-radius: 4px;
    border: none;
    outline: none;
    margin-right: 10px; 
}

.sidebar button {
    padding: 8px 10px; 
    font-size: 14px; 
    color: #ffffff;
    background-color: #003366;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.sidebar button:hover {
    background-color: #005580;
}

.konten {
    margin-left: 260px;
    padding: 20px;
    width: calc(100% - 260px); 
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
    background-color: #ecf0f1; /* Warna latar tabel lebih lembut */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sedikit bayangan */
}

table, th, td {
    border: 1px solid #ddd;
    width: 1010px;
}

th, td {
    padding: 12px;
    text-align: left;
}

th {
    background-color: #34495e; 
    color: #ecf0f1; 
}

td {
    background-color: #ffffff; 
    color: #333;
}


.konten {
    margin-left: 240px;
    padding: 20px;
}
.footer {
    background: #0000CD;
    color: #ffffff;
    text-align: center;
    padding: 15px;
    position: fixed;
    bottom: 0;
    width: 100%;
    box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.3);
}

.footer p {
    margin: 0;
    font-size: 14px;
}
header {
    background-color: darkblue; 
    padding: 20px;
    text-align: center;
    border-bottom: 2px solid #264653; 
}

header h3 {
    color: white;
    font-size: 24px;
    margin: 0;
    font-family: 'Arial', sans-serif;
    letter-spacing: 1px;
}


</style>

<div class="sidebar">
    <h2>Dashboard</h2>
    <form class="search-form" action="searching.php" method="GET">
        <input type="text" name="query" placeholder="Search..." required>
        <button type="submit">Search</button>
    </form>
    <ul>
        <li><a href="dashboard.php">Menu</a></li>
        <li><a href="inventory.php">Inventory</a></li>
        <li><a href="storage_unit.php">Storage</a></li>
        <li><a href="vendor_supplier.php">Supplier</a></li>
        <li><a href="login.php">Logout</a></li>
    </ul>
</div>

<div class="konten">
</div>

<div class="footer">
    <p>&copy; Footer @2024 Angjay.Id.</p>
</div>
