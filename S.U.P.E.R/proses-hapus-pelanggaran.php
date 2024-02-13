<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>e - Buku Saku</title>
  <link rel="stylesheet" href="css_style_new.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/
    font-awesome/6.4.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    .nav {
      list-style-type: none;
      height: 80px;
      width: 100%;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #181c24;
      ;
    }

    h1 {
      color: white;
      background-color: #282C34;
      padding: 10px 20px 35px 20px;
    }

    .judul {
      background-color: #d7d8da;
      text-align: center;
      font-weight: 900;
      font-size: 30px;
      margin-top: 100px;
      border-top: 1px solid #b5b6b7;
      border-bottom: 1px solid #b5b6b7;
    }

    .footer {
      background-color: #d7d8da;
      text-align: center;
      height: 25px;
      font-weight: 700;
      font-size: 14px;
      margin-top: 100px;
      border-top: 1px solid #b5b6b7;
      border-bottom: 1px solid #b5b6b7;
    }


    .row {
      margin-right: 0px;
      padding: 0px;
      margin-top: -16px;
    }

    button {
      display: flex;
      align-items: center;
      justify-content: center;
      outline: none;
      cursor: pointer;
      width: 150px;
      height: 50px;
      background-image: linear-gradient(to top, #D8D9DB 0%, #fff 80%, #FDFDFD 100%);
      border-radius: 30px;
      border: 1px solid #8F9092;
      transition: all 0.2s ease;
      font-family: "Source Sans Pro", sans-serif;
      font-size: 14px;
      font-weight: 600;
      color: #606060;
      text-shadow: 0 1px #fff;
    }

    button:hover {
      box-shadow: 0 4px 3px 1px #FCFCFC, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 3px 3px #CECFD1;
    }

    button:active {
      box-shadow: 0 4px 3px 1px #FCFCFC, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 5px 3px #999, inset 0 0 30px #aaa;
    }

    button:focus {
      box-shadow: 0 4px 3px 1px #FCFCFC, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 5px 3px #999, inset 0 0 30px #aaa;
    }

    @media screen and (max-width: 600px) {
      h1 {
        padding-top: 23px;
      }

      .judul {
        font-size: 25px;
      }

      .table-2,
      .table-3,
      .table-4 {
        font-size: 12px;
      }

      .pedoman img {
        width: 400px;
        height: 600px;
      }

      .button {
        margin-left: 33%;
      }
    }
  </style>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <?php
  session_start();

  if (!isset($_SESSION['id_masuk'])) {
    header('Location: index.php');
  }
  ?>
  <?php
  // Definisikan variabel session
  

  // Koneksi ke database MySQL
  include "koneksi.php";

  // Terima id pengguna dari session
  $id = $_GET['id'];

  // Ambil data pengguna dari database
  $sql = "SELECT * FROM siswa WHERE nis = $id";
  $sql_2 = "SELECT * FROM tb_pelanggaran WHERE nis = $id";
  
  $result = mysqli_query($conn, $sql);
  $pelanggaran = mysqli_query($conn, $sql_2);


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
                <h2>Hapus Pelanggaran Siswa</h2>
            </div>
        </div>
  <div class="identitas">
    <table class="table table-secondary table-striped table-responsive-md">
      <?php
      // Tampilkan data pengguna
      if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Cek apakah nama ada di database
        if (empty($row["nama"])) {
          // Nama tidak ada
          echo "
          <tr>
            <td><b>Nama Lengkap</b></td>
            <td><b>:
               - 
              </b></td>
          </tr>
          ";
        } else {
          // Nama ada
          echo "
          <tr>
            <td><b>Nama Lengkap</b></td>
            <td><b>: " .
            $row["nama"]
            . "</b></td>
          </tr>
          ";
        }

        // Tampilkan NIS
        echo "
          <tr>
            <td><b>NIS</b></td>
            <td><b>: " .
          $row["nis"]
          . "</b></td>
          </tr>
          ";

        // Tampilkan kelas
        echo "
          <tr>
            <td><b>Kelas</b></td>
            <td><b>: " .
          $row["tingkat"] . " - " . $row["jurusan"] . " - " . $row["kelas"]
          . "</b></td>
          </tr>
          ";

        // Tampilkan poin
        if (empty($row["poin"])) {
          // Poin tidak ada
          echo "
          <tr>
            <td><b>Poin</b></td>
            <td><b>:
               - 
              </b></td>
          </tr>
          ";
        } else {
          // Poin ada
          echo "
          <tr>
            <td><b>Poin</b></td>
            <td><b>: " .
            $row["poin"]
            . "</b></td>
          </tr>
          ";
        }
      } else {
        echo "Data pengguna tidak ditemukan";
      }
      ?>
    </table>
  </div>

  <div class="catatan">
    <p class="judul">Catatan Kasus</p>
    <form action="delete-pelanggaran.php" method="GET">
    <table class="table-2 table table-striped">
      <tr>
        <td><b>NO</b></td>
        <td><b>TANGGAL/WAKTU</b></td>
        <td><b>PELANGGARAN</b></td>
        <td><b>POIN</b></td>
        <td><b>ACTION</b></td>
      </tr>
      <?php
      $nomor = 1;
      foreach ($pelanggaran as $row) : ?>
          <tr>
            <td><?=$nomor; ?></td>
            <td><?=$row["tanggal"]; ?></td>
            <td><?=$row["pelanggaran"]; ?></td>
            <td><?=-$row["poin_minus"]; ?></td>
            <td><a href="delete-pelanggaran.php?id_pelanggaran=<?=$row["id_pelanggaran"];?>" onclick="return confirm ('yakin hapus?');">Hapus</a></b><td>
          </tr>
          
        <?php $nomor++; ?>
        <?php endforeach; ?>
      <tr>
        <td><b>TOTAL POIN</b></td>
        <td></td>
        <td></td>
        <?php
        $sql = "SELECT * FROM siswa WHERE nis = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        echo "
        <td><b>" . $row["poin"] . "</b></td>
        <td></td>
        ";
        ?>
      </tr>
    </table>
    </form>
  </div>
          </tbody>
        </table>
      </div>
    </div>

    </div>
</body>

</html>