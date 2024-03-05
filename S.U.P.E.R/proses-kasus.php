<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Siswa</title>
    <link rel="stylesheet" href="styleBar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/
    font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <style>
        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .css-button {
            text-decoration: none;
            color: white;
            padding: 5px;
            background-color: red;
            border-radius: 7px;
            font-weight: 700;
        }

        .css-button:hover {
            color: red;
            padding: 4px;
            background-color: white;
            border: 1px solid red;
            transition: .2s;
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
        <?php
include "koneksi.php";
$id=$_GET['id'];
$sql=mysqli_query($conn, "SELECT * FROM siswa WHERE nis=$id");
$sql_kasus=mysqli_query($conn, "SELECT * FROM tb_kasus");
$sql_pelanggaran=mysqli_query($conn, "SELECT * FROM tb_pelanggaran WHERE nis=$id");
include "koneksi.php";

?>
<?php
session_start();

if (!isset($_SESSION['id_masuk'])) {
  header('Location: ../index.php');
}
?>

    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../img/smkn2cmi.png" alt="logo">
                </span>

                <div class="text header-text">
                    <span class="name">S.U.P.E.R.</span>
                    <span class="profession">Administrators</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
              <input type="hidden" class="search-box">

            <!-- Search under construction -->

                <!-- <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" name="" id="" placeholder="Search...">

                </li> -->

            <!-- Search under construction -->
                <ul class="menu-link">
                    <li class="nav-link">
                        <a href="admin-buksak.php">
                            <i class='bx bx-list-ul icon'></i>
                            <span class="text nav-text">List Siswa</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="data-kasus.php">
                            <i class='bx bx-history icon'></i>
                            <span class="text nav-text">Pelanggaran</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="kasus.php">
                            <i class='bx bx-data icon'></i>
                            <span class="text nav-text">Data Kasus</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="pedoman.php">
                            <i class='bx bx-book-bookmark icon'></i>
                            <span class="text nav-text">Pedoman</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="hapus-pelanggaran.php">
                            <i class='bx bx-edit-alt icon'></i>
                            <span class="text nav-text">Edit</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="credit-buksak.php">
                        <i class='bx bx-info-circle icon'></i>
                            <span class="text nav-text">Tentang</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="admin-settings.php">
                            <i class='bx bx-cog icon'></i>
                            <span class="text nav-text">Settings</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                <a href="../index.php">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Log Out</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="moon-sun">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark Mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
            </div>

        </div>
    </nav>

    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <span>S.U.P.E.R. Administrator</span>
                <h2>Report Siswa</h2>
            </div>
        </div>
  <div>
  <form action="proses.php" method="POST" enctype="multipart/form-data">
      <table>
      <tr>
                  <td></td>
                  <td><input type="hidden" name="id" value=<?=$id?>></td>
              </tr>
      <tr>
              <td>NIS</td>
              <td><?php foreach ($sql as $nis) :?><?=$nis["nis"]; ?><?php endforeach;?></td>
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
          <td>Upload Gambar</td>
          <td><input type="file" name="file"></td>
        </tr>
          <tr>
              <td><input type="submit" name="lapor" value="Laporkan" ?id=<?= $id?> onclick="return confirm ('Yakin untuk melaporkan?');"></td>
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
          <td><?=$row["kelas"]; ?></td>
          <td><?=$row["pelanggaran"]; ?></td>
          <td>-<?=$row["poin_minus"]; ?></td>
          <td><?=$row["keterangan"]; ?></td>
          <td><?=$row["gambar"]; ?></td>
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
        </div>

    <script src="script.js"></script>

</body>

</html>