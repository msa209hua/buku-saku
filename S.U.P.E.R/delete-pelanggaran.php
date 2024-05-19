<?php
    include 'koneksi.php';
    if (isset($_GET['lihat'])) {
    $id_kasus_1 = $_GET['id_pelanggaran'];
    $sql_2=mysqli_query($conn, "SELECT * FROM tb_pelanggaran WHERE id_pelanggaran='$id_kasus_1'");
    foreach ($sql_2 as $row) {
        $ket_poin=$row["ket_poin"];
        if ($ket_poin == "-") {
            $kasus_id=$row["pelanggaran"];
            $nis=$row["nis"];
            $nama=$row["nama"];
            $kelas=$row["kelas"];
            $alasan=$_GET["alasan"];
            $tambah_sql = mysqli_query($conn, "INSERT INTO tb_riwayat (id_pelanggaran,nis,nama,kelas,pelanggaran,alasan_hapus) VALUES
            ('$id_kasus_1','$nis','$nama','$kelas','$kasus','$alasan')");
            $sql = "DELETE FROM tb_pelanggaran WHERE id_pelanggaran = $id_kasus_1";
            $kasus_sql =mysqli_query($conn, "SELECT poin FROM tb_kasus WHERE jenis_kasus='$kasus_id'");
            $poin_total=mysqli_fetch_array($kasus_sql);
            $poin_kasus=$poin_total["poin"];
            $poin_sql=mysqli_query($conn,"UPDATE siswa SET poin = poin + $poin_kasus WHERE nis=$nis");
            $hapus = mysqli_query($conn, $sql);

            if ($poin_kasus) {
                echo "
                    <script>
                        alert('Data anda berhasil dihapus');
                        window.location.href='proses-hapus-pelanggaran.php?id=$nis';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data anda gagal dihapus');
                        window.location.href='hapus-pelanggaran.php';
                    </script>
                ";
            }
        } else if ($ket_poin == "+") {
            $kasus_id=$row["pelanggaran"];
            $nis=$row["nis"];
            $nis=$row["nis"];
            $nama=$row["nama"];
            $kelas=$row["kelas"];
            $alasan=$_GET["alasan"];
            $tambah_sql = mysqli_query($conn, "INSERT INTO tb_riwayat (id_pelanggaran,nis,nama,kelas,pelanggaran,alasan_hapus) VALUES
            ('$id_kasus_1','$nis','$nama','$kelas','$kasus','$alasan')");
            $sql = "DELETE FROM tb_pelanggaran WHERE id_pelanggaran = $id_kasus_1";
            $kasus_sql =mysqli_query($conn, "SELECT poin FROM tb_kasus WHERE jenis_kasus='$kasus_id'");
            $poin_total=mysqli_fetch_array($kasus_sql);
            $poin_kasus=$poin_total["poin"];
            $poin_sql=mysqli_query($conn,"UPDATE siswa SET poin = poin - $poin_kasus WHERE nis=$nis");
            $hapus = mysqli_query($conn, $sql);

            if ($poin_kasus) {
                echo "
                    <script>
                        alert('Data anda berhasil dihapus');
                        window.location.href='proses-hapus-pelanggaran.php?id=$nis';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Data anda gagal dihapus');
                        window.location.href='hapus-pelanggaran.php';
                    </script>
                ";
            }
        }
        
    }
}
    
?>