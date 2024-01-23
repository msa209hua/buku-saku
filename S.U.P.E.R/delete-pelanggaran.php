<?php
    include 'koneksi.php';
    
    $id_kasus_1 = $_GET['id_pelanggaran'];
    $kasus_id = $_GET['id_kasus'];
    $nis=$_GET['id'];
    $sql = "DELETE FROM tb_pelanggaran WHERE id_pelanggaran = $id_kasus_1";
    $kasus_sql =mysqli_query($conn, "SELECT poin FROM tb_kasus WHERE id_kasus='$kasus_id'");
    $poin_total=mysqli_fetch_array($kasus_sql);
    $poin_kasus=$poin_total["poin"];
    $poin_sql=mysqli_query($conn,"UPDATE siswa SET poin = poin + $poin_kasus WHERE nis=$nis");
    $hapus = mysqli_query($conn, $sql);
    echo "$id_kasus";
    /*if ($hapus) {
        echo "
            <script>
                alert('Data anda berhasil dihapus');
                window.location.href='hapus-pelanggaran.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data anda gagal dihapus');
                window.location.href='hapus-pelanggaran.php';
            </script>
        ";
    }*/
?>