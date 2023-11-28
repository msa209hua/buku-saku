<!DOCTYPE html>
<html>
<head>
<style>
body {
  margin: 0;
  font-family: Arial;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 25%;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background: linear-gradient(brown, chocolate);
  font-size: 30px;
  color: white;
}

li a:hover:not(.active) {
  background-color: rgb(82, 28, 14);
  color: white;
  font-weight: bold;
}
</style>
</head>
<body>
<?php

require 'koneksi.php';

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];

    $query = "INSERT INTO role_bintang (nama_role) VALUES ('$nama')";
    $proses =  mysqli_query($conn, $query);

    if ($proses) {
        echo "
        <script>
            alert('Data berhasil ditambah');
            window.location.href='role.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal ditambah');
            window.location.href='tambah_role.php';
        </script>";
    }
}
?>

<ul>
  <li><a class="active" href="index.php"><b>La Cafe</b></a></li>
  <li><a href="index.php">Dasboard</a></li>
  <li><a href="user.php">Users</a></li>
  <li><a href="role.php">Role</a></li>
  <li><a href="#pelanggan">Pelanggan</a></li>
  <li><a href="kategori.php">Kategori Menu</a></li>
  <li><a href="menu.php">Menu</a></li>
  <li><a href="#order">Order</a></li>
  <li><a href="#pembayaran">Pembayaran</a></li>
</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
<form action="tambah_role.php" method="post">
        <h2>Tambah Role</h2><br>
        Nama Profesi <input type="text" name="nama"><br>
        <input type="submit" value="tambahkan" name="tambah">
    </form>

    
</div>

</body>
</html>
