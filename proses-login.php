<?php
// Koneksi ke database MySQL
include "koneksi.php";

// Terima input dari halaman login
$username = $_POST["username"];
$password = $_POST["password"];

// Validasi username dan password
$sql = "SELECT * FROM siswa WHERE nis = '$username' AND password = '$password'";
$sql_admin = "SELECT * FROM administrators WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);
$result_admin = mysqli_query($conn, $sql_admin);

// Cek apakah username dan password valid
if (mysqli_num_rows($result_admin) == 1) {
    $row = mysqli_fetch_assoc($result_admin);
    if ($username == $row["username"] && $password == $row["password"]) {
        if ($row["role"] == 1) {
            session_start();
            $_SESSION["id_masuk"] = $row["password"];
            header("Location: S.U.P.E.R/admin-buksak.php");
        } elseif ($row["role"] == 2) {
            session_start();
            $_SESSION["id_masuk"] = $row["password"];
            header("Location: High-Access/admin-buksak.php");
        }
    } else {
        echo "<script>
        alert('Username atau Password salah');
        window.location.href='index.php';
    </script>";
    }
    
} else {
    // Username atau password tidak valid
    echo "<script>
        alert('Username atau Password salah');
        window.location.href='index.php';
    </script>";
}

if (mysqli_num_rows($result) == 1) {
    // Username dan password valid
    $row = mysqli_fetch_assoc($result);

    // Simpan data pengguna ke dalam session
    session_start();
    $_SESSION["id_masuk"] = $row["nis"];

    // Kirim data pengguna ke halaman data
    header("Location: buku-saku.php?id=" . $row["nis"]);
} else {
    // Username atau password tidak valid
    echo "<script>
        alert('Username atau Password salah');
        window.location.href='index.php';
    </script>";
}

mysqli_close($conn);
?>