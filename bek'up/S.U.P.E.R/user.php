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
<h3>Registrasi User</h3>
    <br>

    <?php
    include 'koneksi.php';

    $sql = "SELECT * FROM user_bintang";
    $registrasi = mysqli_query($conn, $sql);
    ?>
    <nav>
        <a href="registrasi_user.php">[+] Tambah User</a>
    </nav>
    <br>
    <table border="1" cellspacing="0" cellpadding="10px">
        <thead>
            <tr>
                <th>Id User</th>
                <th>Role</th>
                <th>Username</th>
                <th>Nama User</th>
                <th>Edit | Hapus</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($registrasi as $row) : ?>
                <tr>
                    <td><?= $row["id_user"];  ?></td>
                    <td><?= $row["nama_role"];  ?></td>
                    <td><?= $row["username"];  ?></td>
                    <td><?= $row["nama_user"];  ?></td>
                    <td>
                    <?php
                    echo "<a href='edit_user2.php?id=$row[id_user]'>Edit</a>";
                    ?>
                    |
                    <a href="hapus_user.php?id=<?= $row['id_user']; ?>" onclick="return confirm ('yakin hapus?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>