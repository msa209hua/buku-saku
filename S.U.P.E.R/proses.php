<?php
include "koneksi.php";
$id=$_POST['id'];
$sql=mysqli_query($conn, "SELECT * FROM siswa WHERE nis=$id");
$nama=mysqli_fetch_array($sql)["nama"];
$sql_2 = mysqli_query($conn, "SELECT * FROM tb_pelanggaran WHERE nama_siswa='$nama'");
$pelanggaran=mysqli_fetch_array($sql_2)["pelanggaran"];
$tanggal=mysqli_fetch_array($sql_2)["tanggal"];

if (isset($_POST['lapor']) || "SELECT * FROM tb_pelanggaran WHERE nama_siswa='$nama' AND pelanggaran='$pelanggaran' AND tanggal='$tanggal'") {
  echo $nama."<br>";
  echo $pelanggaran."<br>";
  echo $tanggal;
  // $result = "SELECT nama_siswa, pelanggaran, tanggal FROM tb_pelanggaran WHERE nama_siswa='$nama', pelanggaran='$pelanggaran', tanggal='$tanggal'";
  
  
    echo "
    <script>
        alert('Pelanggaran telah dilaporkan hari ini, LAPORAN DITOLAK!');
        window.location.href='admin-buksak.php';
    </script>
    ";
  } else {
    foreach ($sql as $value) {
      $nis=$value["nis"];
      $nama=$value["nama"];
      $kelas=$value["tingkat"]." ".$value["jurusan"]." ".$value["kelas"];
      $kasus=$_POST["kasus"];
      $keterangan=$_POST["keterangan"];
      $kasus_sql =mysqli_query($conn, "SELECT poin FROM tb_kasus WHERE jenis_kasus='$kasus'");
      $poin_total=mysqli_fetch_array($kasus_sql);
      $poin_kasus=$poin_total["poin"];
      $poin_sql=mysqli_query($conn,"UPDATE siswa SET poin = poin - $poin_kasus WHERE nis=$nis");
    $tambah_sql = mysqli_query($conn, "INSERT INTO tb_pelanggaran (nis,nama_siswa,kelas,pelanggaran,poin_minus,keterangan) VALUES
    ('$nis','$nama','$kelas','$kasus','$poin_kasus','$keterangan')");
    }
    echo "
    <script>
        alert('Laporan Berhasil!');
        window.location.href='admin-buksak.php';
    </script>
    ";
  } 
  if (isset($_POST['batalkan'])) {
    header('Location: admin-buksak.php');
  }
?>