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
      width: 20%;
      background-color: #f1f1f1;
      position: fixed;
      height: 100%;
      overflow: auto;
    }

    li a {
      display: block;
      color: #000;
      padding: 5px 16px;
      text-decoration: none;
    }

    li a.active {
      background: linear-gradient(brown, chocolate);
      font-size: 30px;
      color: white;
      line-height: 34px;
      padding-top: 8px;
      padding-bottom: 8px;
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
    <li><a class="active" href="index.php"><b>SUPER Administrator</b></a></li>
    <li><a href="index.php">Dasboard</a></li>
    <li><a href="admin-buksak.php">List Siswa</a></li>
    <li><a href="data-kasus.php">Data Kasus</a></li>
    <li><a href="pedoman.php">Pedoman</a></li>
    <li><a href="user.php">Users</a></li>
    <li><a href="kasus.php">Kasus</a></li>
    <li><a href="kategori.php">Kategori Menu</a></li>
    <li><a href="menu.php">Menu</a></li>
  </ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
<h3>Data Kasus</h3>
    <a href="index.php">[<] Back</a><br><br>
    <br>

    <?php
    include 'koneksi.php';

    $sql = "SELECT * FROM tb_kasus";
    $role = mysqli_query($conn, $sql);
    ?>
    <nav>
        
        <a href="tambah_kasus.php">[+] Tambah Kasus</a>
    </nav>
    <br>
    <table border="1" cellspacing="0" cellpadding="10px">
        <thead>
            <tr>
                <th>Id Kasus</th>
                <th>Jenis Kasus</th>
                <th>Edit | Hapus</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($role as $row) : ?>
                <tr>
                    <td><?= $row["id_kasus"];  ?></td>
                    <td><?= $row["jenis_kasus"];  ?></td>
                    <td>
                    <?php
                    echo "<a href='edit_kasus.php?id=$row[id_kasus]'>Edit</a>";
                    ?>
                    |
                    <a href="hapus_kasus.php?id=<?= $row['id_kasus']; ?>" onclick="return confirm ('yakin hapus?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>