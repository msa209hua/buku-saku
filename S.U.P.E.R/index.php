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
      width: 20%;
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

  

</body>

</html>