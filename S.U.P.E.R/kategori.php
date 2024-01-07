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
<h3>Kategori Menu</h3>
    <br>

    <?php
    include 'koneksi.php';

    $sql = "SELECT * FROM kategori_bintang";
    $kategori = mysqli_query($conn, $sql);
    ?>
    <nav>
        <a href="tambah_kategori.php">[+] Tambah Kategori</a>
    </nav>
    <br>
    <table border="1" cellspacing="0" cellpadding="10px">
        <thead>
            <tr>
                <th>Id kategori</th>
                <th>Nama Kategori</th>
                <th>Edit | Hapus</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kategori as $row) : ?>
                <tr>
                    <td><?= $row["id_kategori"];  ?></td>
                    <td><?= $row["nama_kategori"];  ?></td>
                    <td>
                    <?php
                    echo "<a href='edit_kategori.php?id=$row[id_kategori]'>Edit</a>";
                    ?>
                    |
                    <a href="hapus_kategori.php?id=<?= $row['id_kategori']; ?>" onclick="return confirm ('yakin hapus?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>