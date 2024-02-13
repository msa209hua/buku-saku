<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css_style_new.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/
    font-awesome/6.4.0/css/all.min.css">
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

if (isset($_POST['batal'])) {
  header("Location: kasus.php");
}
?>

<div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li class="active">
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
            <li>
                <a href="admin-settings.php">
                    <img src="../img/settings.png" alt="" style="width: 30px; height: 30px;">
                    <span>Settings</span>
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
    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <span>S.U.P.E.R. Administrator</span>
                <h2>Tambah Kasus</h2>
            </div>
        </div>
<div>
<form action="tambah_kasus.php" method="post">
  <table>
    <tr>
      <td>Jenis Kasus</td>
      <td><input type="text" name="jenis"></td>
    </tr>
    <tr>
      <td>Poin Minus</td>
      <td><input type="text" name="poin"></td>
    </tr>
  </table>

  <table style="width: 0px;">
  <tr>
    <td><input type="submit" value="Batalkan" name="batal"></td>
    <td><input type="submit" value="Tambahkan" name="tambah"></td>
    </tr>
  </table>
    </form>

    
</div>
</div>

</body>
</html>
