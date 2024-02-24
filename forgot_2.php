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
        <form action="forgot_2.php" method="post">
        <table>
            <tr>
                <td colspan=2><b>Verifikasi diri Anda sebelum mengubah sandi!</b></td>
            </tr>
            <tr>
                <td>Input Tingkatan Anda: </td>
                <td>
                    <select name="tingkat">
                        <option value="10">10</option>
                        <option value="11">11</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Input Jurusan Anda: </td>
                <td>
                    <select name="jurusan">
                        <option value="ANIMASI">ANIMASI</option>
                        <option value="DKV">DKV</option>
                        <option value="PPLG">RPL</option>
                        <option value="MEKATRONIKA">MEKATRONIKA</option>
                        <option value="PEMESINAN">PEMESINAN</option>
                        <option value="KIMIA">KIMIA</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Input Kelas Anda: </td>
                <td>
                    <select name="kelas">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Input Jenis Kelamin Anda: </td>
                <td>
                    <select name="gender">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </td>
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
        header("Location: forgot.php");
    }

    include "koneksi.php";
    session_start();
    $id = $_SESSION['id'];

    if (isset($_POST['verif'])) {
        // Terima input dari halaman login
        $tingkat = $_POST["tingkat"];
        $jurusan = $_POST["jurusan"];
        $kelas = $_POST["kelas"];
        $gender = $_POST["gender"];
    
        $sql = "SELECT * FROM siswa WHERE nis = $id";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_array($result);
        $sql_tingkat = $row["tingkat"];
        $sql_jurusan = $row["jurusan"];
        $sql_kelas = $row["kelas"];
        $sql_gender = $row["jenis_kelamin"];

        if ($tingkat != $sql_tingkat ||
            $jurusan != $sql_jurusan ||
            $kelas != $sql_kelas ||
            $gender != $sql_gender) {
            echo "<script>
                alert('Data tidak cocok!');
                window.location.href='forgot_2.php?id=$id';
                </script>";
        } else {
            header("Location: forgot_3.php");
        }
        
    
        mysqli_close($conn);
    }
    ?>
    </div>
</body>

</html>