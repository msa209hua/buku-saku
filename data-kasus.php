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
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
  <style>
    body {
      margin: 0;
      font-family: Arial;
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
  session_start();

  if (!isset($_SESSION['id_masuk'])) {
    header('Location: index.php');
  }
  ?>
  <?php
  include "koneksi.php";
  $sql = mysqli_query($conn, "SELECT * FROM tb_pelanggaran")
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
        <h2>Data Kasus</h2>
      </div>
    </div>

    <div>
      <form action="data-kasus.php" method="get">
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
   <td><img src="image/<?= $row["gambar"] ?>" width="100" height="100"></td>
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
</body>

</html>