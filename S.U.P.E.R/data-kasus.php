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
  $sql = mysqli_query($conn, "SELECT * FROM tb_pelanggaran")
  ?>
  <ul>
    <li><a class="active" href="admin-buksak.php"><b>Buku Saku</b></a></li>
    <li><a href="admin-buksak.php">List Siswa</a></li>
    <li><a href="data-kasus.php">Data Kasus</a></li>
    <li><a href="pedoman.php">Pedoman</a></li>
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
      <tr>
        <td><input type="submit" name="print" value="Print"></td>
      </tr>
    </table>
    <?php
    if (isset($_POST['print'])) {
      header("Content-type: application/vnd-ms-excel");
      header("Content-Disposition: attachment; filename=Data Pegawai.xls");
    }
    ?>
  </div>
</body>

</html>