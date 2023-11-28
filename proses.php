<?php
include "koneksi.php";
if (isset($_POST['lapor'])) {
    $tambah_sql = mysqli_query($conn, "UPDATE tb_pelanggaran SET nis = hasil_vote + 1 WHERE no = 1");
    echo "
    <script>
        alert('Vote Berhasil!');
        window.location.href='success.php';
    </script>
    ";
}
?>