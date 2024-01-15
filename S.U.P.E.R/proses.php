<?php
include "koneksi.php";
$id=$_POST['id'];
$sql=mysqli_query($conn, "SELECT * FROM siswa WHERE nis=$id");
$nama=mysqli_fetch_array($sql)["nama"];
$sql_2 = mysqli_query($conn, "SELECT * FROM tb_pelanggaran WHERE nama_siswa='$nama'");
$sql_3=mysqli_query($conn, "SELECT * FROM tb_pelanggaran");
$pelanggaran=mysqli_fetch_array($sql_2)["pelanggaran"];
$tanggal=mysqli_fetch_array($sql_2)["tanggal"];
foreach ($sql_3 as $hasil) {
  $nama_siswa=$hasil["nama_siswa"];
  $jenis_pel=$hasil["pelanggaran"];
  $tanggal_kasus=$hasil["tanggal"];
  if ($nama == $nama_siswa && $pelanggaran == $jenis_pel && $tanggal == $tanggal_kasus) {
    echo "
  <script>
      alert('Pelanggaran telah dilaporkan hari ini, LAPORAN DITOLAK!');
      window.location.href='admin-buksak.php';
  </script>
  ";
  }
}


if (isset($_POST['lapor'])) {
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
    
  } else {
    
  } 
  if (isset($_POST['batalkan'])) {
    header('Location: admin-buksak.php');
  }
?>