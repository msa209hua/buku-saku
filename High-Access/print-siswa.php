<?php
  include "koneksi.php";
  $id=$_GET["id"];
  $sql = mysqli_query($conn, "SELECT * FROM tb_pelanggaran WHERE nis='$id'");
  $sql_poin = mysqli_query($conn, "SELECT poin FROM siswa WHERE nis='$id'");
  $poin_total=mysqli_fetch_array($sql_poin);
  $poin_kasus=$poin_total["poin"];
  $nama=mysqli_fetch_array($sql);
  $nama_siswa=$nama["nama_siswa"];
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    
        
      header("Content-type: application/vnd-ms-excel");
      header("Content-Disposition: attachment; filename=Data $nama_siswa.xls");
      
    ?>
<table border="1px solid black">
      <tr>
        <th>Tanggal</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Pelanggaran</th>
        <th>Keterangan</th>
        <th>Poin</th>
      </tr>
      <?php foreach ($sql as $row) : ?>
        <tr>
          <td><?= $row["tanggal"]; ?></td>
          <td><?= $row["nis"]; ?></td>
          <td><?= $row["nama_siswa"] ?></td>
          <td><?= $row["kelas"] ?></td>
          <td><?= $row["pelanggaran"]; ?></td>
          <td><?= $row["keterangan"] ?></td>
          <td>-<?= $row["poin_minus"] ?></td>
        </tr>
      <?php
      endforeach;
      ?>
      <tr>
        <td colspan="6">Total Poin:</td>
        <td><?=$poin_kasus;?></td>
      </tr>
    </table>
</body>
</html>