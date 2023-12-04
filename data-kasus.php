<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
  margin: 0;
  font-family: Arial;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 20%;
  background-color: #181C24;
  position: fixed;
  height: 100%;
  overflow: auto;
  color: white;
}

li a {
  display: block;
  color: white;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background: linear-gradient(#181C24, #282c34);
  font-size: 30px;
  color: white;
}

li a:hover:not(.active) {
  background-color: rgb(82, 28, 14);
  color: white;
  font-weight: bold;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
    </style>
</head>
<body>
    <?php
    include "koneksi.php";
    $sql=mysqli_query($conn, "SELECT * FROM tb_pelanggaran")
    ?>
<ul>
  <li><a class="active" href="index.php"><b>Buku Saku</b></a></li>
  <li><a href="index.php">Data Kasus</a></li>
  <li><a href="user.php">Data Siswa </a></li>
</ul>

<div style="margin-left:20%;padding:10px 16px;height:1000px;">
<table>
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
        <td><?= $row["tanggal"];?></td>
          <td><?= $row["nis"];?></td>
          <td><?= $row["nama_siswa"]?></td>
          <td><?= $row["kelas"]?></td>
          <td><?= $row["pelanggaran"];?></td>
          <td><?= $row["poin"]?></td>
          <td><?= $row["keterangan"]?></td>
    </tr>
        </tr>
        <?php
    endforeach;
    ?>
</table>
</div>
</body>
</html>