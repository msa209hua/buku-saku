<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="styleBar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/
    font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

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
                    <a href="index.php">
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
        <h2>Data Kasus</h2>
      </div>
    </div>

    <div>
    <form action="data-kasus.php" method="GET">
 
 <table id="table_kasus" class="display" border="1px">
     <tr>
         <td>
         <select name="kelas">
             <option value="10 PPLG A">10 PPLG A</option>
             <option value="10 PPLG B">10 PPLG B</option>
             <option value="10 DKV A">10 DKV A</option>
             <option value="10 DKV B">10 DKV B</option>
             <option value="10 DKV C">10 DKV C</option>
             <option value="10 PEMESINAN A">10 PEMESINAN A</option>
             <option value="10 PEMESINAN B">10 PEMESINAN B</option>
             <option value="10 ANIMASI A">10 ANIMASI A</option>
             <option value="10 ANIMASI B">10 ANIMASI B</option>
             <option value="10 KIMIA A">10 KIMIA A</option>
             <option value="10 KIMIA B">10 KIMIA B</option>
             <option value="10 KIMIA C">10 KIMIA C</option>
             <option value="10 MEKATRONIKA A">10 MEKATRONIKA A</option>
             <option value="10 MEKATRONIKA B">10 MEKATRONIKA B</option>
             <option value="10 MEKATRONIKA C">10 MEKATRONIKA C</option>
             <option value="10 MEKATRONIKA D">10 MEKATRONIKA D</option>
             <option value="11 PPLG A">11 PPLG A</option>
             <option value="11 PPLG B">11 PPLG B</option>
             <option value="11 DKV A">11 DKV A</option>
             <option value="11 DKV B">11 DKV B</option>
             <option value="11 DKV C">11 DKV C</option>
             <option value="11 PEMESINAN A">11 PEMESINAN A</option>
             <option value="11 PEMESINAN B">11 PEMESINAN B</option>
             <option value="11 ANIMASI A">11 ANIMASI A</option>
             <option value="11 ANIMASI B">11 ANIMASI B</option>
             <option value="11 KIMIA A">11 KIMIA A</option>
             <option value="11 KIMIA B">11 KIMIA B</option>
             <option value="11 KIMIA C">11 KIMIA C</option>
             <option value="11 MEKATRONIKA A">11 MEKATRONIKA A</option>
             <option value="11 MEKATRONIKA B">11 MEKATRONIKA B</option>
             <option value="11 MEKATRONIKA C">11 MEKATRONIKA C</option>
             <option value="11 MEKATRONIKA D">11 MEKATRONIKA D</option>
         </select>
         </td>
         <td>
         <select name="hari">
  <option value="">Pilih Hari</option>
  <?php for ($i = 1; $i <= 31; $i++) { ?>
    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
  <?php } ?>
</select>
         </td>
         <td>
         <select name="bulan">
  <option value="">Pilih Bulan</option>
  <?php for ($i = 1; $i <= 12; $i++) { ?>
    <option value="<?php echo $i; ?>"><?php echo date('F', mktime(0, 0, 0, $i, 1)); ?></option>
  <?php } ?>
</select>
         </td>
         <td>
         <select name="tahun">
  <option value="">Pilih Tahun</option>
  <?php for ($i = 2023; $i <= 2030; $i++) { ?>
    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
  <?php } ?>
</select>
         </td>
         <td>
         <input type="submit" value="Lihat" name="lihat">
         </td>
     </tr>
     <?php
     if (isset($_GET['lihat'])) {
         $kelas=$_GET["kelas"];
         $tanggal=$_GET["hari"];
         $bulan=$_GET["bulan"];
         $tahun=$_GET["tahun"];
         $gabung=sprintf("$tahun-$bulan-$tanggal");
         $sql= mysqli_query($conn, "SELECT * FROM tb_pelanggaran WHERE kelas='$kelas' and tanggal like'%2024%'");
     ?>
     <tr align="center">
         <th><?=$kelas;?></th>
     </tr>
     <tr>
 <th>Tanggal</th>
 <th>NIS</th>
 <th>Nama</th>
 <th>Kelas</th>
 <th>Pelanggaran</th>
 <th>Poin</th>
 <th>Keterangan</th>
 <th>Foto</th>
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
   <td><img src="../image/<?= $row["gambar"] ?>" width="100" height="100"></td>
 </tr>
 </tr>
<?php
endforeach;
$kelas_sql =mysqli_query($conn, "SELECT kelas FROM tb_pelanggaran WHERE kelas='$kelas'");
        $sql_total=mysqli_fetch_array($kelas_sql);
        $sql_kelas=$sql_total["kelas"];
echo "<tr><td><a href='../print-laporan.php?id=$sql_kelas' class='css-button'>Print</a></td></tr>" ;
     }
?>
 </table>
</form>
    </div>
  </div>
  <script src="script.js"></script>
</body>

</html>