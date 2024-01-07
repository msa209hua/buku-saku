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
    $user_name = $_POST['username'];
    $password = $_POST['password'];
    $pass = password_hash($password, PASSWORD_DEFAULT);
    $nama_user = $_POST['nama_user'];
    $id_role = $_POST['role'];

    $result = mysqli_query($conn, "UPDATE user_bintang SET nama_role='$id_role', username='$user_name', password='$pass', nama_user='$nama_user' WHERE id_user=$id");
    if ($result) {
        echo "
        <script>
            alert('Data berhasil diedit');
            window.location.href='user.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal diedit');
            window.location.href='edit_user2.php';
        </script>";
    }
    
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM user_bintang WHERE id_user = $id");

while ($user_data = mysqli_fetch_array($result)) {
    $user_name = $user_data['username'];
    $password = $user_data['password'];
    $nama_user = $user_data['nama_user'];
    $id_role = $user_data['nama_role'];
}
?>

<?php
    include 'koneksi.php';

    $sql = "SELECT * FROM role_bintang";
    $role = mysqli_query($conn, $sql);
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
        <a href="user.php" class="button"><b>BACK</b></a>
        <br><br>

        <form action="edit_user2.php" name="edit_user2" method="post">
            <table border="0">
                <tr>
                    <td>Role</td>
                    <td>
                     <select name="role" id="">
                        <?php foreach ($role as $row) : ?>
                        <option value="<?= $row["nama_role"];  ?>"><?= $row["nama_role"];  ?></option>
                        <?php endforeach; ?>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" value=<?php echo $user_name; ?>>
                    </td>
                </tr>
                <tr>
                    <td>password</td>
                    <td>
                        <input type="text" name="password" value=<?php echo $password; ?>>
                    </td>
                </tr>
                <tr>
                    <td>nama user</td>
                    <td>
                        <input type="text" name="nama_user" value=<?php echo $nama_user; ?>>
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

