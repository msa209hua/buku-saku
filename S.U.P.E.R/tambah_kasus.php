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
session_start();

if (!isset($_SESSION['id_masuk'])) {
  header('Location: index.php');
}
?>
<?php

require 'koneksi.php';

if (isset($_POST['tambah'])) {
    $jenis = $_POST['jenis'];
    $poin = $_POST['poin'];

    $query = "INSERT INTO tb_kasus (jenis_kasus, poin) VALUES ('$jenis','$poin')";
    $proses =  mysqli_query($conn, $query);

    if ($proses) {
        echo "
        <script>
            alert('Data berhasil ditambah');
            window.location.href='kasus.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal ditambah');
            window.location.href='tambah_kasus.php';
        </script>";
    }
}
?>

<ul>
    <li><a class="active" href="index.php"><b>SUPER Administrator</b></a></li>
    <li><a href="index.php">Dasboard</a></li>
    <li><a href="admin-buksak.php">List Siswa</a></li>
    <li><a href="data-kasus.php">Log Kasus</a></li>
    <li><a href="kasus.php">Data Kasus</a></li>
    <li><a href="pedoman.php">Pedoman</a></li>
    <li><a href="hapus-pelanggaran.php">Hapus Pelanggaran</a></li>
    <li><a href="credit-buksak.php">Tentang</a></li>
  </ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
<form action="tambah_kasus.php" method="post">
        <h2>Tambah kasus</h2><br>
        Jenis Kasus <input type="text" name="jenis"><br>
        Poin Minus <input type="text" name="poin"><br>
        <input type="submit" value="tambahkan" name="tambah"><br>
    </form>

    
</div>

</body>
</html>
