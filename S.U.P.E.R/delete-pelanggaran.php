<?php
    include 'koneksi.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM tb_pelanggaran WHERE id_kasus = $id";
    $hapus = mysqli_query($conn, $sql);

    if ($hapus) {
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
    }
?>