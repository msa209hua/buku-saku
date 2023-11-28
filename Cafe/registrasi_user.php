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

    $sql = "SELECT * FROM role_bintang";
    $role = mysqli_query($conn, $sql);
    ?>

    <!-- user -->
    <?php 
    require 'koneksi.php';

    if (isset($_POST['simpan'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $nama_user = $_POST['nama_user'];
        $nama_role = $_POST['role'];
    
        $query = "INSERT INTO user_bintang ( username, password, nama_user, nama_role) VALUES ('$username','$pass','$nama_user','$nama_role')";
        $proses =  mysqli_query($conn, $query);
    
        if ($proses) {
            echo "
            <script>
                alert('Data berhasil ditambahkan');
                window.location.href='user.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Data gagal ditambahkan');
                window.location.href='registrasi_user.php';
            </script>
            ";
        }
    }
    ?>

    <!-- form -->
    <form action="registrasi_user.php" method="post">
        <h2>Registrasi User</h2><br>
        Role <select name="role" id="">
                <?php foreach ($role as $row) : ?>
                <option value="<?= $row["nama_role"];?>"><?= $row["nama_role"];  ?></option>
                <?php endforeach; ?>
              </select><br>
        Username <input type="text" name="username"><br>
        Password <input type="password" name="password" id=""><br>
        Nama User <input type="text" name="nama_user">
        <input type="submit" value="Simpan" name="simpan">
    </form>
</div>

</body>
</html>