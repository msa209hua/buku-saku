<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>e - Buku Saku</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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

    .table-2 {
      margin-top: -16px;
    }

    .table-3 {
      border: 1px solid #b5b6b7;
      border-top: 0;
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

    @media screen and (max-width: 600px) {
      h1 {
        padding-top: 23px;
      }

      .judul {
        font-size: 25px;
      }

      .table-2, .table-3, .table-4 {
        font-size: 12px;
      }
    }
  </style>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

    <?php
    // Definisikan variabel session
    session_start();

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

  <div class="nav">
    <h1>e-Buku Saku</h1>
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
            <td><b>: ".
               $row["nama"] 
              ."</b></td>
          </tr>
          ";
        }

        // Tampilkan NIS
        echo "
          <tr>
            <td><b>NIS</b></td>
            <td><b>: ".
               $row["nis"] 
              ."</b></td>
          </tr>
          ";

        // Tampilkan kelas
        echo "
          <tr>
            <td><b>Kelas</b></td>
            <td><b>: ".
              $row["tingkat"]." - ".$row["jurusan"]." - ".$row["kelas"] 
              ."</b></td>
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
            <td><b>: ".
               $row["poin"] 
              ."</b></td>
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
    <table class="table-2 table table-striped">
      <tr>
        <td><b>NO</b></td>
        <td><b>TANGGAL/WAKTU</b></td>
        <td><b>PELANGGARAN</b></td>
        <td><b>POIN</b></td>
      </tr>
      <?php
      $nomor = 1;
        foreach ($pelanggaran as $row) {
          echo "
          <tr>
            <td>".$nomor."</td>
            <td>".$row["tanggal"]."</td>
            <td>".$row["pelanggaran"]."</td>
            <td>-".$row["poin_minus"]."</td>
          <tr/>
          ";
        $nomor++;
        }
      
      ?>
      
      <tr>
        <td><b>TOTAL POIN</b></td>
        <td></td>
        <td></td>
        <?php 
        $sql = "SELECT * FROM siswa WHERE nis = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        echo "
        <td><b>".$row["poin"]."</b></td>
        ";
        ?>
      </tr>
    </table>
  </div>
  <div class="jenis-kasus">
    <p class="judul">Jenis Pelanggaran</p>
    <div class="row">
      <div class="col-md-6">
        <table class="table-3 table table-striped">
          <thead>
            <tr>
              <th>NO</th>
              <th>Pelanggaran</th>
              <th>Poin</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Terlambat</td>
              <td>-10</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Merokok</td>
              <td>-50</td>
            </tr>
            <tr>
              <td>3</td>
              <td>Mabok</td>
              <td>-75</td>
            </tr>
            <tr>
              <td>4</td>
              <td>Kabur</td>
              <td>-25</td>
            </tr>
            <tr>
              <td>5</td>
              <td>Rambut Panjang(Laki-Laki)</td>
              <td>-10</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-6">
        <table class="table-4 table table-striped">
          <thead>
            <tr>
              <th>NO</th>
              <th>Pelanggaran</th>
              <th>Poin</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>6</td>
              <td>Berkata Kasar/Kotor</td>
              <td>-5</td>
            </tr>
            <tr>
              <td>7</td>
              <td>Berkelahi</td>
              <td>-20</td>
            </tr>
            <tr>
              <td>8</td>
              <td>Seragam tidak sesuai hari</td>
              <td>-10</td>
            </tr>
            <tr>
              <td>9</td>
              <td>Sepatu</td>
              <td>-10</td>
            </tr>
            <tr>
              <td>10</td>
              <td>Atribut</td>
              <td>-10</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>

  <div class="pedoman" style="text-align: center;">
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
    <img src="img/pedoman_24.png" alt=""><br>
  </div>

  <div class="footer">
    <p>&copy;TEFA RPL</p>
  </div>
</body>

</html>