<!DOCTYPE html>
<html>
<head>
<style>
body {
  margin: 0;
  font-family: Arial;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 25%;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background: linear-gradient(brown, chocolate);
  font-size: 30px;
  color: white;
}

li a:hover:not(.active) {
  background-color: rgb(82, 28, 14);
  color: white;
  font-weight: bold;
}
</style>
</head>
<body>

<ul>
  <li><a class="active" href="index.php"><b>La Cafe</b></a></li>
  <li><a href="index.php">Dasboard</a></li>
  <li><a href="user.php">Users</a></li>
  <li><a href="role.php">Role</a></li>
  <li><a href="#pelanggan">Pelanggan</a></li>
  <li><a href="kategori.php">Kategori Menu</a></li>
  <li><a href="menu.php">Menu</a></li>
  <li><a href="#order">Order</a></li>
  <li><a href="#pembayaran">Pembayaran</a></li>
</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
  <!-- role -->
  <?php
    include 'koneksi.php';

    $sql = "SELECT * FROM kategori_bintang";
    $kategori = mysqli_query($conn, $sql);
    ?>

    <!-- menu -->
    <?php 
    require 'koneksi.php';

    if (isset($_POST['simpan'])) {
        $nama_menu = $_POST['nama_menu'];
        $harga_menu = $_POST['harga_menu'];
        $id_kategori = $_POST['id_kategori'];
        $foto_menu = $_POST['foto_menu'];
        $status_menu = $_POST['status_menu'];
    
        $query = "INSERT INTO menu_bintang (nama_menu, harga_menu, id_kategori, foto_menu, status_menu) VALUES ('$nama_menu','$harga_menu','$id_kategori','$foto_menu', '$status_menu')";
        $proses =  mysqli_query($conn, $query);
    
        if ($proses) {
            echo "
            <script>
                alert('Data berhasil ditambahkan');
                window.location.href='menu.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Data gagal ditambahkan');
                window.location.href='tambah_menu.php';
            </script>
            ";
        }
    }
    ?>

    <!-- form -->
    <form action="tambah_menu.php" method="post">
        <h2>Tambah Menu</h2><br>
        Nama Menu <input type="text" name="nama_menu"><br>
        Harga Menu <input type="number" name="harga_menu" min="1" max="10000000000"><br>
        Kategori <select name="id_kategori">
                    <?php foreach ($kategori as $row) : ?>
                    <option value="<?= $row["id_kategori"];?>"><?= $row["nama_kategori"];  ?></option>
                    <?php endforeach; ?>
                </select><br>
        Foto Menu <input type="file" name="foto_menu"><br>
        Status Menu <select name="status_menu">
                        <option value="Tersedia">Tersedia</option>
                        <option value="Tidak Tersedia">Tidak Tersedia</option>
                    </select><br>
        <input type="submit" value="Simpan" name="simpan">
    </form>
</div>

</body>
</html>