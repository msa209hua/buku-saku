<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help</title>
    <link rel="stylesheet" href="side-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
        <form action="forgot.php" method="post">
            <table>
            <tr>
                <td>Jika Anda melupakan sandi Anda, Anda dapat mengganti sandi Anda.</td>
            </tr>
            </table>
            <br>
        <table>
            <tr>
                <td><b>Verifikasi diri Anda sebelum mengubah sandi!</b></td>
            </tr>
            <tr>
                <td>Input nama lengkap Anda: </td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Input NIS Anda: </td>
                <td><input type="text" name="nis"></td>
            </tr>
            <tr>
                <td><button class="btn btn-primary" name="verif">Verifikasi</button></td>
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
    if (isset($_POST['Back'])) {
        header("Location: index.php");
    }

    
    // Koneksi ke database MySQL
    include "koneksi.php";

    if (isset($_POST['verif'])) {
        // Terima input dari halaman login
        $username = $_POST["nama"];
        $nis = $_POST["nis"];
    
        // Validasi username dan nis
        $sql = "SELECT * FROM siswa WHERE nama = '$username' AND nis = '$nis'";
        $result = mysqli_query($conn, $sql);
    
        // Cek apakah username dan password valid
        if (mysqli_num_rows($result) == 1) {
            // Username dan password valid
            $row = mysqli_fetch_assoc($result);
    
            // Simpan data pengguna ke dalam session
            session_start();
            $_SESSION["id_masuk"] = $row["nis"];
    
            // Kirim data pengguna ke halaman data
            header("Location: forgot_2.php?id=" . $row["nis"]);
        } else {
            // Username atau password tidak valid
            echo "<script>
                alert('Nama dan NIS tidak cocok.');
            </script>";
        }
    
        mysqli_close($conn);
    }
        
    ?>
    </div>
</body>

</html>