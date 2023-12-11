<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
/* From uiverse.io by @satyamchaudharydev */
/* removing default style of button */

.form button {
  border: none;
  background: none;
  color: #8b8ba7;
}
/* styling of whole input container */
.form {
  --timing: 0.3s;
  --width-of-input: 200px;
  --height-of-input: 40px;
  --border-height: 2px;
  --input-bg: #fff;
  --border-color: #2f2ee9;
  --border-radius: 30px;
  --after-border-radius: 1px;
  position: relative;
  width: var(--width-of-input);
  height: var(--height-of-input);
  display: flex;
  align-items: center;
  padding-inline: 0.8em;
  border-radius: var(--border-radius);
  transition: border-radius 0.5s ease;
  background: var(--input-bg,#fff);
}
/* styling of Input */
.input {
  font-size: 0.9rem;
  background-color: transparent;
  width: 100%;
  height: 100%;
  padding-inline: 0.5em;
  padding-block: 0.7em;
  border: none;
}
/* styling of animated border */
.form:before {
  content: "";
  position: absolute;
  background: var(--border-color);
  transform: scaleX(0);
  transform-origin: center;
  width: 100%;
  height: var(--border-height);
  left: 0;
  bottom: 0;
  border-radius: 1px;
  transition: transform var(--timing) ease;
}
/* Hover on Input */
.form:focus-within {
  border-radius: var(--after-border-radius);
}

input:focus {
  outline: none;
}
/* here is code of animated border */
.form:focus-within:before {
  transform: scale(1);
}
/* styling of close button */
/* == you can click the close button to remove text == */
.reset {
  border: none;
  background: none;
  opacity: 0;
  visibility: hidden;
}
/* close button shown when typing */
input:not(:placeholder-shown) ~ .reset {
  opacity: 1;
  visibility: visible;
}
/* sizing svg icons */
.form svg {
  width: 17px;
  margin-top: 3px;
}
</style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<?php
include "koneksi.php";

?>
<ul>
  <li><a class="active" href="admin.php"><b>Buku Saku</b></a></li>
  <li><a href="data-kasus.php">Data Kasus</a></li>
</ul>

<div style="margin-left:20%;padding:10px 16px;height:1000px;">
<form action="admin.php" method="GET">
  <table>
  <tr>
          <td width="7%">
          <form method="GET">
            <select name="tingkat">
              <option value="10 PPLG A">10 PPLG A</option>
              <option value="10 PPLG B">10 PPLG B</option>
              <option value="10 KIMIA A">10 KIMIA A</option>
              <option value="10 KIMIA B">10 KIMIA B</option>
              <option value="10 KIMIA C">10 KIMIA C</option>
              <option value="10 ANIMASI A">10 ANIMASI A</option>
              <option value="10 ANIMASI B">10 ANIMASI B</option>
              <option value="10 DKV A">10 DKV A</option>
              <option value="10 DKV B">10 DKV B</option>
              <option value="10 DKV C">10 DKV C</option>
              <option value="10 MEKATRONIKA A">10 MEKATRONIKA A</option>
              <option value="10 MEKATRONIKA B">10 MEKATRONIKA B</option>
              <option value="10 MEKATRONIKA C">10 MEKATRONIKA C</option>
              <option value="10 MEKATRONIKA D">10 MEKATRONIKA D</option>
              <option value="10 PEMESINAN A">10 PEMESINAN A</option>
              <option value="10 PEMESINAN B">10 PEMESINAN B</option>
              <option value="11 PPLG A">11 PPLG A</option>
              <option value="11 PPLG B">11 PPLG B</option>
              <option value="11 KIMIA A">11 KIMIA A</option>
              <option value="11 KIMIA B">11 KIMIA B</option>
              <option value="11 KIMIA C">11 KIMIA C</option>
              <option value="11 ANIMASI A">11 ANIMASI A</option>
              <option value="11 ANIMASI B">11 ANIMASI B</option>
              <option value="11 DKV A">11 DKV A</option>
              <option value="11 DKV B">11 DKV B</option>
              <option value="11 DKV C">11 DKV C</option>
              <option value="11 MEKATRONIKA A">11 MEKATRONIKA A</option>
              <option value="11 MEKATRONIKA B">11 MEKATRONIKA B</option>
              <option value="11 MEKATRONIKA C">11 MEKATRONIKA C</option>
              <option value="11 MEKATRONIKA D">11 MEKATRONIKA D</option>
              <option value="11 PEMESINAN A">11 PEMESINAN A</option>
              <option value="11 PEMESINAN B">11 PEMESINAN B</option>
            </select>
            </td>
            <td>
              <input type="submit" name="cari" value="Cari">
            </td>
          
        </tr>
    <?php
    if (isset($_GET['tingkat'])) {
      $ting = $_GET['tingkat'];
      $tingkat = explode(" ",$ting);
      $angkatan=$tingkat[0];
      $jurusan=$tingkat[1];
      $kelas=$tingkat[2];
      $sql=mysqli_query($conn, "SELECT * FROM siswa 
      WHERE tingkat='$angkatan' and jurusan='$jurusan' and kelas='$kelas' 
      ORDER BY nis ASC");
    
    ?>
    <tr>
      <th>NIS</th>
      <th>Nama</th>
      <th>Kelas</th>
      <th>Laporkan</th>
    </tr>
    <?php foreach ($sql as $row) : ?>
    <tr>
    <td><?= $row["nis"];?></td>
          <td><?= $row["nama"];?></td>
          <td><?= $row["tingkat"]." ".$row["jurusan"]." ".$row["kelas"];?></td>
          <td><?php echo "
                        <a href='proses-kasus.php?id=$row[nis]'>Lapor</a>"?></td>
    </tr>
    <?php
    endforeach;
    }
    ?>
  </table>
</form>
</body>
</html>
