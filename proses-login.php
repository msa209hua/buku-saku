<?php
// Koneksi ke database MySQL
include "koneksi.php";

// Terima input dari halaman login
$username = $_POST["username"];
$password = $_POST["password"];

// Validasi username dan password
$sql = "SELECT * FROM siswa WHERE nama = '$username' AND nis = '$password'";
$result = mysqli_query($conn, $sql);

// Cek apakah username dan password valid
if (mysqli_num_rows($result) == 1) {
    // Username dan password valid
    $row = mysqli_fetch_assoc($result);

    // Simpan data pengguna ke dalam session
    session_start();
    $_SESSION["id_masuk"] = $row["nis"];

    // Kirim data pengguna ke halaman data
    header("Location: buku-saku.php?id=" . $row["nis"]);
} else if ($username == "LOWER ADMIN" && $password == "LOWER") {
    session_start();
    $_SESSION["id_masuk"] = $password;
    header("Location: admin-buksak.php");

} else if ($username == "SUPER ADMIN" && $password == "SUPER") {
    session_start();
    $_SESSION["id_masuk"] = $password;
    header("Location: S.U.P.E.R/index.php");
}

else {
    // Username atau password tidak valid
    echo "<script>
        alert('Username atau Password salah');
        window.location.href='index.php';
    </script>";
}

mysqli_close($conn);
?>