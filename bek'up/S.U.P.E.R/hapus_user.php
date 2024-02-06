<?php
    include 'koneksi.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM user_bintang WHERE id_user=$id";
    $hapus = mysqli_query($conn, $sql);

    if ($hapus) {
        echo "
            <script>
                alert('Data anda berhasil dihapus');
            </script>
        ";
        header("Location: user.php");
    } else {
        echo "
            <script>
                alert('Data anda gagal dihapus');
            </script>
        ";
        header("Location: user.php");
    }
?>