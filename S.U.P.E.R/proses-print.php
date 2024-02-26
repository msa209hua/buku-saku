<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap");

        * {
            margin: 0;
            padding: 0;
            outline: none;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            display: flex;
        }

        .sidebar {
            position: sticky;
            top: 0;
            left: 0;
            bottom: 0;
            width: 120px;
            height: 100vh;
            padding: 0 1.7rem;
            color: #fff;
            overflow: hidden;
            transition: all 0.5s linear;
            background: linear-gradient(240deg, brown, chocolate);
        }

        .sidebar:hover {
            width: 260px;
            transition: .4s;
        }

        .logo {
            height: 80px;
            padding: 16px;
        }

        .menu {
            height: 88%;
            position: relative;
            list-style: none;
            padding: 0;
            margin-top: -65px;
        }

        .menu li {
            padding: 1rem;
            margin: 8px 0;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
        }

        .menu li:hover,
        .active {
            background: #e0e0e058;
        }

        .menu a {
            color: #fff;
            font-size: 14px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .menu a span {
            overflow: hidden;
        }

        .menu a i {
            font-size: 1.2rem;
        }

        .logout {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
        }

        .main--content {
            position: relative;
            background: #ebe9e9;
            width: 100%;
            padding: 1rem;
        }

        .header--wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            background: #fff;
            border-radius: 10px;
            padding: 10px 2rem;
            margin-bottom: 1rem;
        }

        .header--title {
            color: linear-gradient(#181C24, #282c34);
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            background-color: white;
        }

        /* Kode responsif untuk layar 400px kebawah */
        @media (max-width: 400px) {
            .sidebar {
                width: 80px; /* Sidebar lebih sempit*/
                position: fixed; /* Sidebar tetap di posisi awalnya */
                z-index: 1000; /* Pastikan di atas konten lain */
            }

            .sidebar:hover {
                width: 160px; /* Lebar saat hover lebih kecil */
            }

            .menu a span {
                display: none; /* Sembunyikan teks menu */
            }

            .main--content {
            margin-left: 80px; /* Tambahkan margin untuk konten utama */
            }
        }
    </style>
</head>
<body>
<div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li>
                <a href="admin-buksak.php">
                    <img src="../img/list.png" alt="" style="width: 30px; height: 30px;">
                    <span>List</span>
                </a>
            </li>
            <li>
                <a>
                    <img src="../img/log.png" alt="" style="width: 33px; height: 30px;">
                    <span>Log</span>
                </a>
            </li>
            <li class="active">
                <a href="kasus.php">
                    <img src="../img/data.png" alt="" style="width: 30px; height: 30px;">
                    <span>Kasus</span>
                </a>
            </li>
            <li>
                <a href="pedoman.php">
                    <img src="../img/pedoman.png" alt="" style="width: 30px; height: 30px;">
                    <span>Pedoman</span>
                </a>
            </li>
            <li>
                <a href="hapus-pelanggaran.php">
                    <img src="../img/hapus.png" alt="" style="width: 30px; height: 30px;">
                    <span>Hapus Pelanggaran</span>
                </a>
            </li>
            <li>
                <a href="credit-buksak.php">
                    <img src="../img/about.png" alt="" style="width: 30px; height: 30px;"> 
                    <span>Tentang</span>
                </a>
            </li>
            <li>
                <a href="admin-settings.php">
                    <img src="../img/settings.png" alt="" style="width: 30px; height: 30px;">
                    <span>Settings</span>
                </a>
            </li>
            <li class="logout">
                <a href="../index.php">
                    <img src="../img/logout.png" alt="" style="width: 30px; height: 30px;">
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="main--content">
    <div class="header--wrapper">
      <div class="header--title">
        <span>S.U.P.E.R. Administrator</span>
        <h2>List Kelas</h2>
      </div>
    </div>
    
    <form action="proses-print.php" method="POST">
    <select name="kelas">
                    <option value="10 RPL A">10 RPL A</option>
                    <option value="10 RPL B">10 RPL B</option>
                    <option value="10 DKV A">10 DKV A</option>
                    <option value="10 DKV B">10 DKV B</option>
                    <option value="10 DKV C">10 DKV C</option>
                    <option value="10 PEMESINAN A">10 PEMESINAN A</option>
                    <option value="10 PEMESINAN B">10 PEMESINAN B</option>
                    <option value="10 ANIMASI A">10 ANIMASI A</option>
                    <option value="10 ANIMASI B">10 ANIMASI B</option>
                    <option value="10 KIMIA A">10 KIMIA A</option>
                    <option value="10 KIMIA B">10 KIMIA B</option>
                    <option value="10 KIMIA C">10 KIMIA C</option>
                    <option value="10 MEKATRONIKA A">10 MEKATRONIKA A</option>
                    <option value="10 MEKATRONIKA B">10 MEKATRONIKA B</option>
                    <option value="10 MEKATRONIKA C">10 MEKATRONIKA C</option>
                    <option value="10 MEKATRONIKA D">10 MEKATRONIKA D</option>
                    <option value="11 RPL A">11 RPL A</option>
                    <option value="11 RPL B">11 RPL B</option>
                    <option value="11 DKV A">11 DKV A</option>
                    <option value="11 DKV B">11 DKV B</option>
                    <option value="11 DKV C">11 DKV C</option>
                    <option value="11 PEMESINAN A">11 PEMESINAN A</option>
                    <option value="11 PEMESINAN B">11 PEMESINAN B</option>
                    <option value="11 ANIMASI A">11 ANIMASI A</option>
                    <option value="11 ANIMASI B">11 ANIMASI B</option>
                    <option value="11 KIMIA A">11 KIMIA A</option>
                    <option value="11 KIMIA B">11 KIMIA B</option>
                    <option value="11 KIMIA C">11 KIMIA C</option>
                    <option value="11 MEKATRONIKA A">11 MEKATRONIKA A</option>
                    <option value="11 MEKATRONIKA B">11 MEKATRONIKA B</option>
                    <option value="11 MEKATRONIKA C">11 MEKATRONIKA C</option>
                    <option value="11 MEKATRONIKA D">11 MEKATRONIKA D</option>
                </select>
                <input type="submit" value="Lihat" name="lihat">
            <?php
            if (isset($_POST['lihat'])) {
                $kelas=$_POST["kelas"];
                $sql= mysqli_query($conn, "SELECT * FROM tb_pelanggaran WHERE kelas='$kelas'");
            ?>
        <table>
            <tr>
        <th>Tanggal</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Pelanggaran</th>
        <th>Poin</th>
        <th>Keterangan</th>
      </tr>
      <?php foreach ($sql as $row) : ?>
        <tr>
          <td><?= $row["tanggal"]; ?></td>
          <td><?= $row["nis"]; ?></td>
          <td><?= $row["nama_siswa"] ?></td>
          <td><?= $row["kelas"] ?></td>
          <td><?= $row["pelanggaran"]; ?></td>
          <td>-<?= $row["poin_minus"] ?></td>
          <td><?= $row["keterangan"] ?></td>
        </tr>
        </tr>
      <?php
      endforeach;
    
      ?>
        </table>
    </form>
    <?php
            }
    ?>
    </div>
</body>
</html>