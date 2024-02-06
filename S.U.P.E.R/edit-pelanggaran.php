<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css_style_new.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/
    font-awesome/6.4.0/css/all.min.css">
<style>

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

<div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li class="active">
                <a href="index.php">
                    <img src="../img/dashboard.png" alt="" style="width: 30px; height: 30px;">
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="admin-buksak.php">
                    <img src="../img/list.png" alt="" style="width: 30px; height: 30px;">
                    <span>List</span>
                </a>
            </li>
            <li>
                <a href="data-kasus.php">
                    <img src="../img/log.png" alt="" style="width: 33px; height: 30px;">
                    <span>Log</span>
                </a>
            </li>
            <li>
                <a href="kasus.php">
                    <img src="../img/data.png" alt="" style="width: 30px; height: 30px;">
                    <span>Kasus</span>
                </a>
            </li>
            <li>
                <a href="pedoman.php">
                    <img src="../img/pedoman.png" alt="" style="width: 30px; height: 30px;">
                    <span>Pedoman</span>
                </a>
            </li>
            <li>
                <a href="hapus-pelanggaran.php">
                    <img src="../img/hapus.png" alt="" style="width: 30px; height: 30px;">
                    <span>Hapus Pelanggaran</span>
                </a>
            </li>
            <li>
                <a href="credit-buksak.php">
                    <img src="../img/about.png" alt="" style="width: 30px; height: 30px;"> 
                    <span>Tentang</span>
                </a>
            </li>
            <li class="logout">
                <a href="../index.php">
                    <img src="../img/logout.png" alt="" style="width: 30px; height: 30px;">
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>

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