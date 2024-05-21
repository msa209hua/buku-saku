<?php
include "koneksi.php";
$id=$_POST['id'];
$sql=mysqli_query($conn, "SELECT * FROM siswa WHERE nis=$id");

if (isset($_POST['lapor_2'])) {
  $id=$_POST['id'];
  $sql=mysqli_query($conn, "SELECT * FROM siswa WHERE nis=$id");
  $ekstensi_diperbolehkan = array('png','jpg');
   $gambar = $_FILES['file']['name'];
   $x = explode('.', $gambar);
   $ekstensi = strtolower(end($x));
   $ukuran = $_FILES['file']['size'];
   $file_tmp = $_FILES['file']['tmp_name']; 
 
 move_uploaded_file($file_tmp, '../image/'.$gambar);
    foreach ($sql as $value) {
      
        $nis=$value["nis"];
        $nama=$value["nama"];
        $kelas=$value["tingkat"]." ".$value["jurusan"]." ".$value["kelas"];
        $kasus=$_POST["kasus"];
        $keterangan=$_POST["keterangan"];
        $pelapor=$_POST["pelapor"];
        $kasus_sql =mysqli_query($conn, "SELECT poin FROM tb_kasus_plus WHERE jenis_kasus='$kasus'");
        $poin_total=mysqli_fetch_array($kasus_sql);
        $poin_kasus=$poin_total["poin"];
        $poin_sql=mysqli_query($conn,"UPDATE siswa SET poin = poin + $poin_kasus WHERE nis=$nis");
      $tambah_sql = mysqli_query($conn, "INSERT INTO tb_pelanggaran (nis,nama_siswa,kelas,pelanggaran,ket_poin,poin_minus,keterangan,gambar,pelapor) VALUES
      ('$nis','$nama','$kelas','$kasus','+','$poin_kasus','$keterangan','$gambar','$pelapor')");
      }
      echo "
    <script>
        alert('Laporan Berhasil!');
        window.location.href='admin-buksak.php';
    </script>
    ";
  }
  if (isset($_POST['batalkan'])) {
    header('Location: choose-report.php?id='.$id.'');
  }
?>