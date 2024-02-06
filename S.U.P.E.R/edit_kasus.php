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
        if (isset($_GET['update'])) {
            $id = $_GET['id'];
            $jenis = $_GET['jenis'];
            $poin = $_GET['poin'];

            $result = mysqli_query($conn, "UPDATE tb_kasus SET jenis_kasus='$jenis', poin='$poin' WHERE id_kasus=$id");
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
    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <span>S.U.P.E.R. Administrator</span>
                <h2>Edit Kasus</h2>
            </div>
        </div>
<div>
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
      </div>
</body>
</html>