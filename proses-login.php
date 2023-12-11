<?php
// include "koneksi.php";

// $sql = "SELECT * FROM siswa";
// $siswa = mysqli_query($conn, $sql);

// if (isset($_POST['signin'])) {
//   $username = $_POST['username'];
//   $password = $_POST['password'];
//   foreach ($siswa as $data) {
//     if ($username == "admin" && $password == "admin") {
//       header("location: home.php");
//     } else if ($username == $data['nama'] && $password == $data['nis']) {
//       header("location: buku-saku.php");
//     } else {
//       echo "
//         <script>
//             alert('Username atau Password salah');
//             window.location.href='index.php';
//         </script>
//         ";
//     }
//  }
// }
?>

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
    $_SESSION["id"] = $row["nis"];

    // Kirim data pengguna ke halaman data
    header("Location: buku-saku.php?id=" . $row["nis"]);
} else if ($username == "admin" && $password == "admin") {
    header("Location: admin.php");
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