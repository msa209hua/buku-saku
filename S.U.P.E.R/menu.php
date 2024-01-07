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

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background: linear-gradient(brown, chocolate);
  color: white;
}

nav a {
    text-decoration: none;
    color: black;
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
<h3>Menu</h3>
    <br>

    <?php
    include 'koneksi.php';

    $sql = "SELECT menu_bintang.id_menu, menu_bintang.nama_menu, menu_bintang.harga_menu, menu_bintang.foto_menu, kategori_bintang.nama_kategori, menu_bintang.status_menu
            FROM menu_bintang INNER JOIN kategori_bintang ON menu_bintang.id_kategori = kategori_bintang.id_kategori";
    $menu = mysqli_query($conn, $sql);
    ?>
    <nav>
        <a href="tambah_menu.php">[+] Tambah Menu</a>
    </nav>
    <br>
    <table border="1" cellspacing="0" cellpadding="10px">
        <thead>
            <tr>
                <th>Id Menu</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Foto Menu</th>
                <th>Status Menu</th>
                <th>Edit | Hapus</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($menu as $row) : ?>
                <tr>
                    <td><?= $row["id_menu"];  ?></td>
                    <td><?= $row["nama_menu"];  ?></td>
                    <td><?= $row["harga_menu"];  ?></td>
                    <td><?= $row["nama_kategori"];  ?></td>
                    <td><input type="image" src="img/<?= $row["foto_menu"];  ?>" alt="Foto Tidak Tersedia"></td>
                    <td><?= $row["status_menu"];  ?></td>
                    <td>
                    <?php
                    echo "<a href='edit_menu.php?id=$row[id_menu]'>Edit</a>";
                    ?>
                    |
                    <a href="hapus_menu.php?id=<?= $row['id_menu']; ?>" onclick="return confirm ('yakin hapus?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>