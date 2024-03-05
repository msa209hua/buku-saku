<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="styleBar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
<div class="main--content">
    <div class="header--wrapper">
      <div class="header--title">
        <h2>Lupa Sandi</h2>
      </div>
    </div>
    <form action="forgot_3.php" method="post">
    <table>
        <tr>
          <td><b>Ganti Sandi</b></td>
        </tr>
        <tr>
          <td><input type="password" name="first" placeholder="Sandi baru" maxlength="20" minlength="8"></td>
        </tr>
        <tr>
            <td><b>Kekuatan sandi: </b><br> Gunakan setidaknya 8 karakter, maksimal 20 karakter. <br> Jangan gunakan sandi dari situs lain atau sesuatu yang <br> mudah ditebak, seperti nama hewan peliharaan Anda.</td>
        </tr>
        <tr>
          <td><input type="password" name="second" placeholder="Konfirmasi sandi baru" maxlength="20" minlength="8"></td>
        </tr>
        <tr>
            <td><input type="submit" name="ganti" value="Ubah sandi"></td>
        </tr>
        <tr>
            <td>
                <b>*PENTING* <br>
                Catat dan ingat baik-baik password Anda, agar Anda tidak kesulitan dikemudian hari!</b>
            </td>
        </tr>
      </table>
        <br>
      
      <table>
        <tr>
          <td>
            <button class="btn btn-primary" name="Back">Kembali</button>
          </td>
        </tr>
      </table>
    </div>
    </form>

    <?php
    include "koneksi.php";
    session_start();
    if (isset($_POST['Back'])) {
        header("Location: index.php");
    }
    $nis = $_SESSION['id'];
    $sql=mysqli_query($conn, "SELECT * FROM siswa WHERE nis=$nis");
    if (isset($_POST['ganti'])) {
        $new_password_1 = $_POST['first'];
        $new_password_2 = $_POST['second'];

        if ($new_password_2 == $new_password_1) {
            $ganti_pw=mysqli_query($conn, "UPDATE siswa SET password='$new_password_1' WHERE nis=$nis");
    
            echo "
            <script>
                alert('Sandi berhasil diganti!');
                window.location.href='index.php';
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
    ?>
</div>
</body>
</html>