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

.button {
            padding: 7px;
            background-color: blue;
            color: white;
            border-radius: 10px;
            text-decoration: none;
        }
</style>
</head>
<body>
<?php
include 'koneksi.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_menu = $_POST['nama_menu'];
    $harga_menu = $_POST['harga_menu'];
    $id_kategori = $_POST['id_kategori'];
    $foto_menu = $_POST['foto_menu'];
    $status_menu = $_POST['status_menu'];

    $result = mysqli_query($conn, "UPDATE menu_bintang SET nama_menu='$nama_menu', harga_menu='$harga_menu', id_kategori='$id_kategori',
    foto_menu='$foto_menu', status_menu='$status_menu' WHERE id_menu=$id");
    if ($result) {
        echo "
        <script>
            alert('Data berhasil diedit');
            window.location.href='menu.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal diedit');
            window.location.href='edit_menu.php';
        </script>";
    }
    
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM menu_bintang WHERE id_menu = $id");

while ($menu_data = mysqli_fetch_array($result)) {
    $nama_menu = $menu_data['nama_menu'];
    $harga_menu = $menu_data['harga_menu'];
    $id_kategori = $menu_data['id_kategori'];
    $foto_menu = $menu_data['foto_menu'];
    $status_menu = $menu_data['status_menu'];
}
?>

<?php
    include 'koneksi.php';

    $sql = "SELECT * FROM kategori_bintang";
    $kategori = mysqli_query($conn, $sql);
    ?>

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
<a href="index.php" class="button"><b>HOME</b></a>
        <a href="menu.php" class="button"><b>BACK</b></a>
        <br><br>

        <form action="edit_menu.php" name="edit_menu" method="post">
            <table border="0">
                <tr>
                    <td>Nama Menu</td>
                    <td>
                        <input type="text" name="nama_menu" value=<?php echo $nama_menu; ?>>
                    </td>
                </tr>
                <tr>
                    <td>Harga Menu</td>
                    <td>
                        <input type="number" name="harga_menu" value=<?php echo $harga_menu; ?> max="10000000000" min="1">
                    </td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>
                    <select name="id_kategori">
                    <?php foreach ($kategori as $row) : ?>
                    <option value="<?= $row["id_kategori"];?>" <?php echo ($id_kategori == $row["id_kategori"]) ? 'selected' : '' ; ?>><?= $row["nama_kategori"];  ?></option>
                    <?php endforeach; ?>
                </select>
                    </td>
                </tr>
                <tr>
                    <td>Foto Menu</td>
                    <td>
                        <input type="file" name="foto_menu" value=<?php echo $foto_menu; ?>>
                    </td>
                </tr>
                <tr>
                    <td>Status Menu</td>
                    <td>
                    <select name="status_menu">
                        <option value="Tersedia" <?php echo ($status_menu == "Tersedia") ? 'selected' : '' ; ?>>Tersedia</option>
                        <option value="Tidak Tersedia" <?php echo ($status_menu == "Tidak Tersedia") ? 'selected' : '' ; ?>>Tidak Tersedia</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
                    </td>
                    <td>
                        <input type="submit" value="Update" name="update">
                    </td>
                </tr>
            </table>
        </form>
</div>

</body>
</html>

