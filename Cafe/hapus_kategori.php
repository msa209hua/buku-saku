<?php
    include 'koneksi.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM kategori_bintang WHERE id_kategori=$id";
    $hapus = mysqli_query($conn, $sql);

    if ($hapus) {
        echo "
            <script>
                alert('Data anda berhasil dihapus');
            </script>
        ";
        header("Location: kategori.php");
    } else {
        echo "
            <script>
                alert('Data anda gagal dihapus');
            </script>
        ";
        header("Location: kategori.php");
    }
?>