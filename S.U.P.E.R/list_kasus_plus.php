<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Kasus Plus</title>
    <link rel="stylesheet" href="styleBar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/
    font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <style>
        .css-button {
            text-decoration: none;
            color: white;
            padding: 5px;
            background-color: red;
            border-radius: 7px;
            font-weight: 700;
        }

        .css-button:hover {
            color: red;
            padding: 4px;
            background-color: white;
            border: 1px solid red;
            transition: .2s;
        }

        .edit, .hapus {
            text-decoration: none;
            color: white;
            padding: 6px;
            border-radius: 7px;
        }

        .edit {
            background-color: green;
        }

        .hapus {
            background-color: red;
        }

        .edit:hover {
            padding: 3px;
            border: 3px solid green;
            background-color: white;
            color: green;
            transition: .2s;
        }

        .hapus:hover {
            padding: 3px;
            border: 3px solid red;
            background-color: white;
            color: red;
            transition: .2s;
        }

        th, td {
        text-align: left;
        padding: 8px;
        }

       

        th {
        background: linear-gradient(brown, chocolate);
        color: white;
        }

        nav a {
            text-decoration: none;
            color: black;
        }

        .btn {
            text-decoration: none;
            padding: 5px;
            color: white;
            background-color: green;
            border-radius: 10px;
        }   
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <?php
  include "koneksi.php";
  session_start();

  if (!isset($_SESSION['id_masuk'])) {
    header('Location: ../index.php');
  }
  $sql = mysqli_query($conn, "SELECT * FROM siswa");
  ?>

    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../img/smkn2cmi.png" alt="logo">
                </span>

                <div class="text header-text">
                    <span class="name">E - Buku Saku</span>
                    <span class="profession">S.U.P.E.R. Admin</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
              <input type="hidden" class="search-box">

            <!-- Search under construction -->

                <!-- <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" name="" id="" placeholder="Search...">

                </li> -->

            <!-- Search under construction -->
                <ul class="menu-link">
                    <li class="nav-link">
                        <a href="admin-buksak.php">
                            <i class='bx bx-list-ul icon'></i>
                            <span class="text nav-text">List Siswa</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="data-kasus.php">
                            <i class='bx bx-history icon'></i>
                            <span class="text nav-text">Pelanggaran</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="kasus.php">
                            <i class='bx bx-data icon'></i>
                            <span class="text nav-text">Data Kasus</span>
                        </a>
                    </li>
                    <li class="nav-link">
                    <a href="notification.php">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Notifikasi</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="hapus-pelanggaran.php">
                            <i class='bx bx-edit-alt icon'></i>
                            <span class="text nav-text">Edit</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="credit-buksak.php">
                        <i class='bx bx-info-circle icon'></i>
                            <span class="text nav-text">Tentang</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="admin-settings.php">
                            <i class='bx bx-cog icon'></i>
                            <span class="text nav-text">Settings</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="../index.php">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Log Out</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="moon-sun">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark Mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
            </div>

        </div>
    </nav>

    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <span>S.U.P.E.R. Administrator</span>
                <h2>List Kasus Plus</h2>
            </div>

            <div class="header--title">
                <span>E - Buku Saku</span>
            </div>
        </div>
<div>
    <?php
    include 'koneksi.php';

    $sql = "SELECT * FROM tb_kasus_plus";
    $role = mysqli_query($conn, $sql);
    ?>
    <nav>
        
        <a href="tambah_kasus_plus.php" style="padding: 8px; border-radius: 16px; background-color: green; color: white; font-weight: 600;">+ Tambah Kasus</a>
    </nav>
    <br>
    <table border="1" cellspacing="0" cellpadding="10px">
        <thead>
            <tr>
                <th>Id Kasus</th>
                <th>Jenis Kasus</th>
                <th>Poin Minus</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($role as $row) : ?>
                <tr>
                    <td><?= $row["id_kasus"];  ?></td>
                    <td><?= $row["jenis_kasus"];  ?></td>
                    <td>+<?= $row["poin"];  ?></td>
                    <td>
                    <?php
                    echo "<a href='edit_kasus_plus.php?id=$row[id_kasus]' class='edit'>Edit</a>";
                    ?>
                    |
                    <a href="hapus_kasus_plus.php?id=<?= $row['id_kasus']; ?>" onclick="return confirm ('yakin hapus?');" class='hapus'>Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <a href="kasus.php" class="btn">Kembali</a>

    <script src="script.js"></script>

</body>

</html>