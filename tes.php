// Halaman login

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>
    <form action="validate.php" method="post">
        Username: <input type="text" name="username" />
        Password: <input type="password" name="password" />
        <input type="submit" value="Login" />
    </form>
</body>
</html>
// Halaman validasi

<?php
// Koneksi ke database MySQL
$conn = mysqli_connect("localhost", "root", "", "mydb");

// Terima input dari halaman login
$username = $_POST["username"];
$password = $_POST["password"];

// Validasi username dan password
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);

// Cek apakah username dan password valid
if (mysqli_num_rows($result) == 1) {
    // Username dan password valid
    $row = mysqli_fetch_assoc($result);

    // Kirim data pengguna ke halaman data
    header("Location: data.php?id=" . $row["id"]);
} else {
    // Username dan password tidak valid
    echo "Username atau password tidak valid";
}

mysqli_close($conn);
?>
// Halaman data

<?php
// Terima id pengguna dari halaman validasi
$id = $_GET["id"];

// Ambil data pengguna dari database
$sql = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $sql);

// Tampilkan data pengguna
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    echo "Nama: " . $row["nama"];
    echo "<br />";
    echo "Email: " . $row["email"];
} else {
    echo "Data pengguna tidak ditemukan";
}

mysqli_close($conn);
?>
