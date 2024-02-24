<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css_style_new.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/
    font-awesome/6.4.0/css/all.min.css">
    <style>
    td,
    th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

        <?php
        include "koneksi.php";
        session_start();

        if (!isset($_SESSION['id_masuk'])) {
            header('Location: admin-buksak.php');
        }
        
        if (isset($_POST['back'])) {
            header("Location: admin-settings.php");
        }

        $sql = mysqli_query($conn, "SELECT * FROM tb_pelanggaran")
        ?>

    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
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
            <li class="active">
                <a href="admin-settings.php">
                    <img src="../img/settings.png" alt="" style="width: 30px; height: 30px;">
                    <span>Settings</span>
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
                <h2>Ganti Username & Password S.U.P.E.R. Admin</h2>
            </div>
        </div>

        <form action="usr-pw-super-admin.php" method="post">
            <table>
                <tr>
                    <td><b>Ganti Username</b></td>
                </tr>
                <tr>
                    <td><input type="text" name="alpha" placeholder="Nama Pengguna baru" maxlength="20" minlength="8"></td>
                </tr>
                <tr>
                    <td><b>Kekuatan Nama Pengguna: </b><br> Gunakan setidaknya 8 karakter, maksimal 20 karakter. <br> Jangan gunakan Nama Pengguna dari situs lain atau sesuatu yang <br> mudah ditebak, seperti <b>Administrator</b>.</td>
                </tr>
                <tr>
                    <td>
                        <b>*PENTING* <br>
                        Catat dan ingat baik-baik Nama Pengguna yang telah diubah, agar Anda tidak kesulitan dikemudian hari!</b>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="ganti-usr" value="Ubah Nama Pengguna"></td>
                </tr>
            </table>
            <br>
            <table>
                <tr>
                    <td><b>Ganti Sandi</b></td>
                </tr>
                <tr>
                    <td><input type="password" name="first" placeholder="Sandi baru" maxlength="20" minlength="8"></td>
                </tr>
                <tr>
                    <td><b>Kekuatan sandi: </b><br> Gunakan setidaknya 8 karakter, maksimal 20 karakter. <br> Jangan gunakan sandi dari situs lain atau sesuatu yang <br> mudah ditebak, seperti <b>123456789</b>.</td>
                </tr>
                <tr>
                    <td><input type="password" name="second" placeholder="Konfirmasi sandi baru" maxlength="20" minlength="8"></td>
                </tr>
                <tr>
                    <td>
                        <b>*PENTING* <br>
                        Catat dan ingat baik-baik password yang telah diubah, agar Anda tidak kesulitan dikemudian hari!</b>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="ganti-pw" value="Ubah sandi"></td>
                </tr>
            </table>
            <br>
            <table>
                <tr>
                    <td>
                        <button class="btn btn-primary" name="back">Kembali</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <?php
    include "koneksi.php";
    $nis = $_SESSION['id'];
    $sql = mysqli_query($conn, "SELECT * FROM administrators WHERE role = 1");
    
    if (isset($_POST['ganti-pw'])) {
        $new_password_1 = $_POST['first'];
        $new_password_2 = $_POST['second'];

        if ($new_password_2 == $new_password_1) {
            $ganti_pw=mysqli_query($conn, "UPDATE administrators SET password = '$new_password_1' WHERE role = 1");
    
            echo "
            <script>
                alert('Sandi berhasil diganti!');
                window.location.href='usr-pw-super-admin.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Sandi tidak sama!');
            </script>
            ";
        }

    }

    if (isset($_POST['ganti-usr'])) {
        $new_username = $_POST['alpha'];
        $ganti_pw=mysqli_query($conn, "UPDATE administrators SET username = '$new_username' WHERE role = 1");
            echo "
            <script>
                alert('Nama Pengguna berhasil diganti!');
                window.location.href='usr-pw-super-admin.php';
            </script>
            ";
        }

    ?>
</body>

</html>