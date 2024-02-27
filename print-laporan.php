<?php
  include "koneksi.php";
  $id=$_GET["id"];
  $sql = mysqli_query($conn, "SELECT * FROM tb_pelanggaran WHERE kelas='$id'")
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
      header("Content-Disposition: attachment; filename=Data Kasus.xls");
      
    ?>
<table border="1px solid black">
      <tr>
        <th>Tanggal</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Pelanggaran</th>
        <th>Poin</th>
        <th>Keterangan</th>
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
        </tr>
        </tr>
      <?php
      endforeach;
      ?>
    </table>
</body>
</html>