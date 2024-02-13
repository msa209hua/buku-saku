<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css_style_new.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/
    font-awesome/6.4.0/css/all.min.css">
  <style>

    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td,
    th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }

    @media screen and (max-width: 600px) {
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
  include "koneksi.php";
  session_start();

  if (!isset($_SESSION['id_masuk'])) {
    header('Location: index.php');
  }
  $sql = mysqli_query($conn, "SELECT * FROM tb_pelanggaran")
  ?>
 <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li>
                <a href="admin-buksak.php">
                    <img src="../img/list.png" alt="" style="width: 30px; height: 30px;">
                    <span>List</span>
                </a>
            </li>
            <li class="active">
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
                <h2>Log History</h2>
            </div>
        </div>

  <div>
    <table>
      <tr>
        <th>Tanggal</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Pelanggaran</th>
        <th>Poin</th>
        <th>Keterangan</th>
        <th>Gambar</th>
      </tr>
      <?php foreach ($sql as $row) : ?>
        <tr>
          <td><?= $row["tanggal"]; ?></td>
          <td><?= $row["nis"]; ?></td>
          <td><?= $row["nama_siswa"] ?></td>
          <td><?= $row["kelas"] ?></td>
          <td><?= $row["pelanggaran"]; ?></td>
          <td>-<?= $row["poin_minus"] ?></td>
          <td><?= $row["keterangan"] ?></td>
          <td><img src="<?= $row["gambar"] ?>"></td>
        </tr>
        </tr>
      <?php
      endforeach;
      ?>
      <tr>
        <td><input type="submit" name="print" value="Print"></td>
      </tr>
    </table>
    <?php
    if (isset($_POST['print'])) {
      header("Content-type: application/vnd-ms-excel");
      header("Content-Disposition: attachment; filename=Data Pegawai.xls");
    }
    ?>
  </div>
  </div>
</body>

</html>