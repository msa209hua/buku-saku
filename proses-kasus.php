<?php
include "koneksi.php";
$id=$_GET['id'];
$sql=mysqli_query($conn, "SELECT * FROM siswa WHERE nis=$id");
$sql_kasus=mysqli_query($conn, "SELECT * FROM tb_kasus");
include "koneksi.php";

?>
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
<ul>
  <li><a class="active" href="admin.php"><b>Buku Saku</b></a></li>
  <li><a href="admin.php">Data Kasus</a></li>
</ul>

<div style="margin-left:20%;padding:10px 16px;height:1000px;">
<form action="proses.php" method="POST">
    <table>
    <tr>
                <td>id</td>
                <td><input type="hidden" name="id" value=<?=$id?>></td>
            </tr>
    <tr>
            <td>NIS</td>
            <td><?php foreach ($sql as $nama) :?><?=$nama["nis"]; ?><?php endforeach;?></td>
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
            <td><input type="submit" name="lapor" value="Laporkan" ?id=<?= $id?>></td>
            <td><input type="submit" name="batalkan" value="Batalkan"></td>
        </tr>
    </table>
</form>
</div>
</body>
</html>