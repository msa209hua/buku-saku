<?php
include "koneksi.php";
$id=$_GET['id'];
$sql=mysqli_query($conn, "SELECT * FROM siswa WHERE nis=$id");
$sql_kasus=mysqli_query($conn, "SELECT * FROM tb_kasus");
$sql_pelanggaran=mysqli_query($conn, "SELECT * FROM tb_pelanggaran WHERE nis=$id");
include "koneksi.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="side-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/
  font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
  margin: 0;
  font-family: Arial;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

.judul {
      background-color: #d7d8da;
      text-align: center;
      font-weight: 900;
      font-size: 25px;
      margin-top: 100px;
      margin-bottom: -1px;
      border-top: 1px solid #b5b6b7;
      border-bottom: 1px solid #b5b6b7;
    }
@media screen and (max-width: 600px)
{
  li a.active {
  background: linear-gradient(#181C24, #282c34);
  font-size: 20px;
  color: white;
}
li a {
  display: block;
  color: white;
  padding: 8px 16px;
  text-decoration: none;
  font-size: 10px;
}
  table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  font-size: 9px;
}
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
<div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li>
                <a href="admin-buksak.php">
                    <img src="img/list.png" alt="" style="width: 30px; height: 30px;">
                    <span>List</span>
                </a>
            </li>
            <li>
                <a href="data-kasus.php">
                    <img src="img/log.png" alt="" style="width: 33px; height: 30px;">
                    <span>Log</span>
                </a>
            </li>
            <li>
                <a href="pedoman.php">
                    <img src="img/pedoman.png" alt="" style="width: 30px; height: 30px;">
                    <span>Pedoman</span>
                </a>
            </li>
            <li>
                <a href="credit-buksak.php">
                    <img src="img/about.png" alt="" style="width: 30px; height: 30px;"> 
                    <span>Tentang</span>
                </a>
            </li>
            <li class="logout">
                <a href="index.php">
                    <img src="img/logout.png" alt="" style="width: 30px; height: 30px;">
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
    
    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <span>Administrator</span>
                <h2>Report Siswa</h2>
            </div>
        </div>

<div>
<form action="proses.php" method="POST">
    <table>
    <tr>
                <td></td>
                <td><input type="hidden" name="id" value=<?=$id?>></td>
            </tr>
    <tr>
            <td>NIS</td>
            <td><?php foreach ($sql as $nama) :?><?=$nama["nis"]; ?><?php endforeach;?></td>
        </tr>
        <tr>
            <td>Nama Siswa</td>
            <td><?php foreach ($sql as $nama) :?><?=$nama["nama"]; ?><?php endforeach;?></td>
        </tr>
        <tr>
            <td>Pilih Kasus</td>
            <td>
            <select name="kasus">
                    <?php foreach ($sql_kasus as $row) :?>
                        <option value=<?= $row["jenis_kasus"];?>><?= $row["jenis_kasus"];?></option>
                        
                        <?php endforeach;?>
                    </select>
            </td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td><input type="text" name="keterangan"></td>
        </tr>
        <tr>
            <td><input type="submit" name="lapor" value="Laporkan" ?id=<?= $id?>></td>
            <td><input type="submit" name="batalkan" value="Batalkan"></td>
        </tr>
    </table><br>

    <table>
      <tr>
        <td><b>Riwayat Pelanggaran</b></td>
      </tr>
      <?php 
      $jumlah_baris = 3;
      $log = array();
      while ($row = $sql_pelanggaran->fetch_assoc()) {
        $log[] = $row;
      }
      $log_terbaru = array_slice($log, -$jumlah_baris);
      foreach ($log_terbaru as $row) : ?>
      <tr>
        <td><?=$row["tanggal"]; ?></td>
        <td><?=$row["nis"]; ?></td>
        <td><?=$row["nama_siswa"]; ?></td>
        <td><?=$row["kelas"]; ?></td>
        <td><?=$row["pelanggaran"]; ?></td>
        <td>-<?=$row["poin_minus"]; ?></td>
        <td><?=$row["keterangan"]; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <?php
    include 'koneksi.php';

    $sql = "SELECT * FROM tb_kasus";
    $pelanggaran = mysqli_query($conn, $sql);
    ?>
      <div class="jenis-kasus">
      <p class="judul">Jenis Pelanggaran</p>
      <div class="row">
        <div>
          <table class="table-3 table table-striped" style="width: 100%;">
          <thead>
            <tr style="font-size: 20px;">
              <td><b>No.</b></td>
              <td><b>Kasus</b></td>
              <td><b>Poin Minus</b></td>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($pelanggaran as $item) : ?>
                <tr>
                    <td><?= $item["id_kasus"];  ?></td>
                    <td><?= $item["jenis_kasus"];  ?></td>
                    <td>-<?= $item["poin"];  ?></td>
                </tr>
            <?php endforeach; ?>
          </tbody>
          </table>
        </div>
      </div>
</form>
</div>
</body>
</html>