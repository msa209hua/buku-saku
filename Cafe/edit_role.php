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

input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 3px solid #ccc;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
}

input[type=text]:focus {
  border: 3px solid #555;
}
</style>
</head>
<body>
<?php
        include 'koneksi.php';

        if (isset($_GET['update'])) {
            $id = $_GET['id'];
            $nama = $_GET['nama'];

            $result = mysqli_query($conn, "UPDATE role_bintang SET nama_role='$nama' WHERE id_role=$id");
            if ($result) {
                echo "
                <script>
                    alert('Data berhasil diedit');
                    window.location.href='role.php';
                </script>";
            } else {
                echo "
                <script>
                    alert('Data gagal diedit');
                    window.location.href='edit_role.php';
                </script>";
            }
        }

        $id = $_GET['id'];

        $result = mysqli_query($conn, "SELECT * FROM role_bintang WHERE id_role = $id");
        

        while ($user_data = mysqli_fetch_array($result)) {
            $nama = $user_data['nama_role'];
        }
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
<a href="index.php">Home</a>
        <a href="role.php">Back</a>
        <br><br>

        <form action="edit_role.php" name="update_role" method="GET">
            <table border="0">
                <tr>
                    <td>Nama Role</td>
                    <td>
                        <input type="text" name="nama" value=<?php echo $nama; ?>>
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