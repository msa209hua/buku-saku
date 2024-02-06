<!DOCTYPE html>
<html>
<head>
<style>
body {
  margin: 0;
  font-family: Arial;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 25%;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background: linear-gradient(brown, chocolate);
  font-size: 30px;
  color: white;
}

li a:hover:not(.active) {
  background-color: rgb(82, 28, 14);
  color: white;
  font-weight: bold;
}

input[type=text]:focus {
  border: 3px solid #555;
}
</style>
</head>
<body>
<?php
  include 'koneksi.php';

  session_start();

  if (!isset($_SESSION['id_masuk'])) {
    header('Location: index.php');
  }

  $sql_kasus=mysqli_query($conn, "SELECT * FROM tb_kasus");
  $sql_pelanggaran=mysqli_query($conn, "SELECT * FROM tb_pelanggaran");

  if (isset($_POST['update'])) {
      $id = $_GET['id'];
      $pelanggaran = $sql_pelanggaran['pelanggaran'];
      $keterangan = $sql_pelanggaran['keterangan'];

      $result = mysqli_query($conn, "UPDATE tb_pelanggaran SET pelanggaran='$pelanggaran' WHERE id_pelanggaran=$id");
      if ($result) {
          echo "
          <script>
              alert('Data berhasil diedit');
              window.location.href='proses-hapus-pelanggaran.php?id=$id';
          </script>";
      } else {
          echo "
          <script>
              alert('Data gagal diedit');
              window.location.href='edit-pelanggaran.php';
          </script>";
      }
  }

  $id = $_GET['id_pelanggaran'];

  $result = mysqli_query($conn, "SELECT * FROM tb_pelanggaran WHERE id_pelanggaran = $id");
        

  while ($user_data = mysqli_fetch_array($result)) {
      $pelanggaran = $user_data['pelanggaran'];
      $keterangan = $user_data['keterangan'];
  }
?>

<ul>
    <li><a class="active" href="index.php"><b>SUPER Administrator</b></a></li>
    <li><a href="admin-buksak.php">List Siswa</a></li>
    <li><a href="data-kasus.php">Data Kasus</a></li>
    <li><a href="pedoman.php">Pedoman</a></li>
    <li><a href="index.php">Dasboard</a></li>
    <li><a href="user.php">Users</a></li>
    <li><a href="kasus.php">Kasus</a></li>
    <li><a href="kategori.php">Kategori Menu</a></li>
    <li><a href="menu.php">Menu</a></li>
  </ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
<a href="index.php">Home</a>
<a href="proses-hapus-pelanggaran.php">Back</a>
        <br><br>

<form action="edit_pelanggaran.php" name="update_pelanggaran" method="GET">
    <table border="0">
        <tr>
            <td>Jenis Pelanggaran</td>
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
            <td>
                <input type="text" name="keterangan" value=<?php echo $keterangan; ?>>
            </td>
        </tr>
        <tr>
            <td>
                <input type="hidden" name="id" value=<?php echo $_GET['id_pelanggaran']; ?>>
            </td>
            <td>
                <input type="submit" value="Update" name="update">
            </td>
        </tr>
    </table>
</form>
</div>

</body>
</html>