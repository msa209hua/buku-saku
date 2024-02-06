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

<div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li class="active">
                <a href="index.php">
                    <img src="../img/dashboard.png" alt="" style="width: 30px; height: 30px;">
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="admin-buksak.php">
                    <img src="../img/list.png" alt="" style="width: 30px; height: 30px;">
                    <span>List</span>
                </a>
            </li>
            <li>
                <a href="data-kasus.php">
                    <img src="../img/log.png" alt="" style="width: 33px; height: 30px;">
                    <span>Log</span>
                </a>
            </li>
            <li>
                <a href="kasus.php">
                    <img src="../img/data.png" alt="" style="width: 30px; height: 30px;">
                    <span>Kasus</span>
                </a>
            </li>
            <li>
                <a href="pedoman.php">
                    <img src="../img/pedoman.png" alt="" style="width: 30px; height: 30px;">
                    <span>Pedoman</span>
                </a>
            </li>
            <li>
                <a href="hapus-pelanggaran.php">
                    <img src="../img/hapus.png" alt="" style="width: 30px; height: 30px;">
                    <span>Hapus Pelanggaran</span>
                </a>
            </li>
            <li>
                <a href="credit-buksak.php">
                    <img src="../img/about.png" alt="" style="width: 30px; height: 30px;"> 
                    <span>Tentang</span>
                </a>
            </li>
            <li class="logout">
                <a href="../index.php">
                    <img src="../img/logout.png" alt="" style="width: 30px; height: 30px;">
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>

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
