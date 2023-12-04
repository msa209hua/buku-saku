<?php
include "koneksi.php";

$sql = "SELECT * FROM siswa";
$siswa = mysqli_query($conn, $sql);

if (isset($_POST['signin'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  foreach ($siswa as $data) {
    if ($username == "admin" && $password == "admin") {
      header("location: home.php");
    } else if ($username == $data['nama'] && $password == $data['nis']) {
      header("location: buku-saku.php");
    } else {
      echo "
        <script>
            alert('Username atau Password salah');
            window.location.href='index.php';
        </script>
        ";
    }
 }
}
?>