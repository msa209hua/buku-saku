<?php
include "koneksi.php";
$id=$_POST['id'];
$sql=mysqli_query($conn, "SELECT * FROM siswa WHERE nis=$id");

if (isset($_POST['lapor'])) {
  foreach ($sql as $value) {
    $nis=$value["nis"];
    $nama=$value["nama"];
    $kelas=$value["tingkat"]." ".$value["jurusan"]." ".$value["kelas"];
    $kasus=$_POST["kasus"];
    $keterangan=$_POST["keterangan"];
    $sql_2=mysqli_query($conn, "SELECT id_kasus FROM tb_kasus WHERE jenis_kasus='$kasus'");
    $kasus_id=mysqli_fetch_array($sql_2);
    $id_kasus=$kasus_id["id_kasus"];
    $kasus_sql =mysqli_query($conn, "SELECT poin FROM tb_kasus WHERE jenis_kasus='$kasus'");
    $poin_total=mysqli_fetch_array($kasus_sql);
    $poin_kasus=$poin_total["poin"];
    echo "$id_kasus";
    $poin_sql=mysqli_query($conn,"UPDATE siswa SET poin = poin - $poin_kasus WHERE nis=$nis");
  $tambah_sql = mysqli_query($conn, "INSERT INTO tb_pelanggaran (id_pelanggaran,nis,nama_siswa,kelas,pelanggaran,poin_minus,keterangan) VALUES
  ('$id_kasus','$nis','$nama','$kelas','$kasus','$poin_kasus','$keterangan')");
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