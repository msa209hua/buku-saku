<?php
    include 'koneksi.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM menu_bintang WHERE id_menu=$id";
    $hapus = mysqli_query($conn, $sql);

    if ($hapus) {
        echo "
            <script>
                alert('Data anda berhasil dihapus');
            </script>
        ";
        header("Location: menu.php");
    } else {
        echo "
            <script>
                alert('Data anda gagal dihapus');
            </script>
        ";
        header("Location: menu.php");
    }
?>