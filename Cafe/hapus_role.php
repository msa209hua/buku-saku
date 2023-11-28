<?php
    include 'koneksi.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM role_bintang WHERE id_role=$id";
    $hapus = mysqli_query($conn, $sql);

    if ($hapus) {
        echo "
            <script>
                alert('Data anda berhasil dihapus');
            </script>
        ";
        header("Location: role.php");
    } else {
        echo "
            <script>
                alert('Data anda gagal dihapus');
            </script>
        ";
        header("Location: level.php");
    }
?>