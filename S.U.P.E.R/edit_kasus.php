<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Siswa</title>
    <link rel="stylesheet" href="styleBar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/
    font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <style>
        input[type=text]:focus {
        border: 3px solid #555;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

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
  <?php
        include 'koneksi.php';

        if (!isset($_SESSION['id_masuk'])) {
          header('Location: index.php');
        }
        if (isset($_GET['update'])) {
            $id = $_GET['id'];
            $jenis = $_GET['jenis'];
            $poin = $_GET['poin'];

            $result = mysqli_query($conn, "UPDATE tb_kasus SET jenis_kasus='$jenis', poin='$poin' WHERE id_kasus=$id");
            if ($result) {
                echo "
                <script>
                    alert('Data berhasil diedit');
                    window.location.href='kasus.php';
                </script>";
            } else {
                echo "
                <script>
                    alert('Data gagal diedit');
                    window.location.href='edit_kasus.php';
                </script>";
            }
        }

        if (isset($_GET['batal'])) {
          header("Location: kasus.php");
        }

        $id = $_GET['id'];

        $result = mysqli_query($conn, "SELECT * FROM tb_kasus WHERE id_kasus = $id");
        

        while ($user_data = mysqli_fetch_array($result)) {
            $jenis = $user_data['jenis_kasus'];
            $poin = $user_data['poin'];
        }
        ?>

    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../img/smkn2cmi.png" alt="logo">
                </span>

                <div class="text header-text">
                    <span class="name">S.U.P.E.R.</span>
                    <span class="profession">Administrators</span>
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
                        <a href="pedoman.php">
                            <i class='bx bx-book-bookmark icon'></i>
                            <span class="text nav-text">Pedoman</span>
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
                    <a href="index.php">
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
                <h2>Edit Kasus</h2>
            </div>
        </div>
      <div>
        <form action="edit_Kasus.php" name="update_Kasus" method="GET">
            <table border="0">
                <tr>
                    <td>Jenis Kasus</td>
                    <td>
                        <input type="text" name="jenis" value=<?php echo $jenis; ?>>
                    </td>
                </tr>
                <tr>
                    <td>Poin Minus</td>
                    <td>
                        <input type="number" name="poin" value=<?php echo $poin; ?>>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
                    </td>
                </tr>
            </table>

            <table style="width: 0px;">
  <tr>
    <td><input type="submit" value="Batalkan" name="batal"></td>
    <td><input type="submit" value="Update" name="update"></td>
    </tr>
  </table>
        </form>

</div>
      </div>

    <script src="script.js"></script>

</body>

</html>