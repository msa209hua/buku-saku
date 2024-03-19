<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>e - Buku Saku</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
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
      margin-bottom: 0;
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
    table {
      overflow-x: scroll;
    }

    .table-2 {
      overflow-x: auto;
    }

    .table-3 {
      border: 1px solid #b5b6b7;
    }

    .table-4 {
      border: 1px solid #b5b6b7;
      border-top: 0;
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
      margin-left: 45%;
      margin-top: 40px;
      margin-bottom: -40px;
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

    @media (max-width: 400px) {
      .catatan {
        max-width: 400px;
        max-height: 400px;
        overflow-x: scroll;
        overflow-y: scroll;
      }
      .jenis-kasus {
        overflow-y: scroll;
      }
      .row>* {
        text-align: left;
        padding-right: 0;
      }
      .jenis-kasus th {
        font-size: 16px;
      }
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
        width: 200%;
        height: 150%;
      }

      .pedoman img {
        width: 400px;
        height: 600px;
      }

      .button {
        margin-left: 30%;
      }
    }
  </style>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <?php
  // Definisikan variabel session
  session_start();

  if (!isset($_SESSION['id_masuk'])) {
    header('Location: index.php');
  }

  // Koneksi ke database MySQL
  include "koneksi.php";

  // Terima id pengguna dari session
  $id = $_GET['id'];
  $_SESSION['nis'] = $id;

  // Ambil data pengguna dari database
  $sql = "SELECT * FROM siswa WHERE nis = $id";
  $sql_2 = "SELECT * FROM tb_pelanggaran WHERE nis = $id";
  $result = mysqli_query($conn, $sql);
  $pelanggaran = mysqli_query($conn, $sql_2);


  ?>

  <div class="nav">
    <h1>e-Buku Saku</h1>
    <a href="settings-siswa.php">
      <img src="img/settings.png" title="Settings" width="25" height="25">
    </a>
    <a href="help-buku-saku-2.php">
      <img src="img/help.png" title="Help" width="25" height="25">
    </a>
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

  <p class="judul">Catatan Kasus</p>
  <div class="catatan">
    <table class="table-2 table table-striped">
      <thead>
        <tr>
          <td><b>NO</b></td>
          <td><b>TANGGAL/WAKTU</b></td>
          <td><b>PELANGGARAN & KEBAIKAN</b></td>
          <td><b>KETERANGAN</b></td>
          <td><b>FOTO BUKTI</b></td>
          <td><b>POIN</b></td>
        </tr>
      </thead>
      <tbody>
      <?php
      $nomor = 1;
      foreach ($pelanggaran as $row) {
        echo "
          <tr>
            <td>" . $nomor . "</td>
            <td>" . $row["tanggal"] . "</td>
            <td>" . $row["pelanggaran"], $row["kebaikan"] . "</td>
            <td>" . $row["keterangan"] . "</td>
            <td><img src='image/".$row['gambar']."' width='100' height='100' alt='foto tidak ada' title='Foto Bukti'></td>
            <td>" .$row["ket_poin"], $row["poin_minus"], $row["poin_plus"] . "</td>
          <tr/>
          ";
        $nomor++;
      }

      ?>
      <tr>
        <td><b>TOTAL POIN</b></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <?php
        $sql = "SELECT * FROM siswa WHERE nis = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        echo "
        <td><b>" . $row["poin"] . "</b></td>
        ";
        ?>
      </tr>
      </tbody>
    </table>
  </div>
  <?php
    include 'koneksi.php';

    $sql = "SELECT * FROM tb_kasus";
    $pelanggaran = mysqli_query($conn, $sql);
    ?>
      <p class="judul">Jenis Pelanggaran</p>
      <div class="jenis-kasus">
      <div class="row">
        <div>
          <table class="table-3 table table-striped" style="width: 100%;">
          <thead>
            <tr style="font-size: 20px;">
              <th style="text-align: center;"><b>No.</b></th>
              <th style="width: 10%;"><b>Kasus</b></th>
              <th style="text-align: center;"><b>Poin Minus</b></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($pelanggaran as $item) : ?>
                <tr>
                    <td style="text-align: center; width: 40%;"><?= $item["id_kasus"];  ?></td>
                    <td><?= $item["jenis_kasus"];  ?></td>
                    <td style="text-align: center;">-<?= $item["poin"];  ?></td>
                </tr>
            <?php endforeach; ?>
          </tbody>
          </table>
          
        </div>
      </div>

    </div>

  </div>

  <div class="pedoman" style="text-align: center;">
    <p class="judul">PEDOMAN</p>
    <img src="img/pedoman_1.png" alt=""><br>
    <img src="img/pedoman_2.png" alt=""><br>
    <img src="img/pedoman_3.png" alt=""><br>
    <img src="img/pedoman_4.png" alt=""><br>
    <img src="img/pedoman_5.png" alt=""><br>
    <img src="img/pedoman_6.png" alt=""><br>
    <img src="img/pedoman_7.png" alt=""><br>
    <img src="img/pedoman_8.png" alt=""><br>
    <img src="img/pedoman_9.png" alt=""><br>
    <img src="img/pedoman_10.png" alt=""><br>
    <img src="img/pedoman_11.png" alt=""><br>
    <img src="img/pedoman_12.png" alt=""><br>
    <img src="img/pedoman_13.png" alt=""><br>
    <img src="img/pedoman_14.png" alt=""><br>
    <img src="img/pedoman_15.png" alt=""><br>
    <img src="img/pedoman_16.png" alt=""><br>
    <img src="img/pedoman_17.png" alt=""><br>
    <img src="img/pedoman_18.png" alt=""><br>
    <img src="img/pedoman_19.png" alt=""><br>
    <img src="img/pedoman_20.png" alt=""><br>
    <img src="img/pedoman_21.png" alt=""><br>
    <img src="img/pedoman_22.png" alt=""><br>
    <img src="img/pedoman_23.png" alt=""><br>
  </div>

  <?php
  echo "<form action='buku-saku.php?id=$id' method='post'>"
  ?>
  <button class="button">Kembali Ke Atas</button>
  </form>

  <div class="footer">
    <p>&copy;TEFA RPL</p>
  </div>

</body>

</html>