<?php
    include 'koneksi.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM tb_pelanggaran WHERE id_kasus = $id";
    $hapus = mysqli_query($conn, $sql);

    if ($hapus) {
        echo "
            <script>
                alert('Data anda berhasil dihapus');
            </script>
        ";
        header("Location: hapus-pelanggaran.php");
    } else {
        echo "
            <script>
                alert('Data anda gagal dihapus');
            </script>
        ";
        header("Location: hapus-pelanggaran.php");
    }
?>