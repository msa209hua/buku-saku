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

input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 3px solid #ccc;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
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
        if (isset($_GET['update'])) {
            $id = $_GET['id'];
            $jenis = $_GET['jenis'];
            $poin = $_GET['poin'];

            $result = mysqli_query($conn, "UPDATE tb_kasus SET jenis_kasus='$jenis' WHERE id_kasus=$id");
            if ($result) {
                echo "
                <script>
                    alert('Data berhasil diedit');
                    window.location.href='kasus.php';
                </script>";
            } else {
                echo "
                <script>
                    alert('Data gagal diedit');
                    window.location.href='edit_kasus.php';
                </script>";
            }
        }

        $id = $_GET['id'];

        $result = mysqli_query($conn, "SELECT * FROM tb_kasus WHERE id_kasus = $id");
        

        while ($user_data = mysqli_fetch_array($result)) {
            $jenis = $user_data['jenis_kasus'];
            $poin = $user_data['poin'];
        }
        ?>

<ul>
    <li><a class="active" href="index.php"><b>SUPER Administrator</b></a></li>
    <li><a href="index.php">Dasboard</a></li>
    <li><a href="admin-buksak.php">List Siswa</a></li>
    <li><a href="data-kasus.php">Log Kasus</a></li>
    <li><a href="kasus.php">Data Kasus</a></li>
    <li><a href="pedoman.php">Pedoman</a></li>
    <li><a href="hapus-pelanggaran.php">Hapus Pelanggaran</a></li>
    <li><a href="credit-buksak.php">Tentang</a></li>
  </ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
<a href="index.php">Home</a>
        <a href="kasus.php">Back</a>
        <br><br>

        <form action="edit_Kasus.php" name="update_Kasus" method="GET">
            <table border="0">
                <tr>
                    <td>Jenis Kasus</td>
                    <td>
                        <input type="text" name="jenis" value=<?php echo $jenis; ?>>
                    </td>
                </tr>
                <tr>
                    <td>Poin Minus</td>
                    <td>
                        <input type="number" name="poin" value=<?php echo $poin; ?>>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
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