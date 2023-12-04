<?php
include "koneksi.php";
$id=$_POST['id'];
$sql=mysqli_query($conn, "SELECT * FROM siswa WHERE nis=$id");
if (isset($_POST['lapor'])) {
    foreach ($sql as $value) {
        $nis=$value["nis"];
        $nama=$value["nama"];
        $kelas=$value["tingkat"]." ".$value["jurusan"]." ".$value["kelas"];;
        $kasus=$_POST["kasus"];
        $poin=$_POST["poin"];
        $keterangan=$_POST["keterangan"];
      $tambah_sql = mysqli_query($conn, "INSERT INTO tb_pelanggaran (nis,nama_siswa,kelas,pelanggaran,poin,keterangan) VALUES
      ('$nis','$nama','$kelas','$kasus','$poin','$keterangan')");
      }
      echo "
    <script>
        alert('Laporan Berhasil!');
        window.location.href='home.php';
    </script>
    ";
  }
?>