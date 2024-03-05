<!DOCTYPE html>
<html lang="en">
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
  <link rel="stylesheet" href="styleBar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/
    font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <style>
        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
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

        button {
            display: flex;
            align-items: center;
            justify-content: center;
            outline: none;
            cursor: pointer;
            width: 150px;
            height: 50px;
            background-image: linear-gradient(to top, #D8D9DB 0%, #fff 80%, #FDFDFD 100%);
            border-radius: 30px;
            border: 1px solid #8F9092;
            transition: all 0.2s ease;
            font-family: "Source Sans Pro", sans-serif;
            font-size: 14px;
            font-weight: 600;
            color: #606060;
            text-shadow: 0 1px #fff;
        }

        button:hover {
            box-shadow: 0 4px 3px 1px #FCFCFC, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 3px 3px #CECFD1;
        }

        button:active {
            box-shadow: 0 4px 3px 1px #FCFCFC, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 5px 3px #999, inset 0 0 30px #aaa;
        }

        button:focus {
            box-shadow: 0 4px 3px 1px #FCFCFC, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 5px 3px #999, inset 0 0 30px #aaa;
        }

        .footer {
            background-color: #d7d8da;
            text-align: center;
            height: 20px;
            font-weight: 700;
            font-size: 14px;
            margin-top: 100px;
            padding-bottom: 20px;
            border-top: 1px solid #b5b6b7;
            border-bottom: 1px solid #b5b6b7;
        }
    </style>
</head>

<body>
<?php
  session_start();

  if (!isset($_SESSION['id_masuk'])) {
    header('Location: index.php');
  }
?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <?php
  include "koneksi.php";
  $sql=mysqli_query($conn, "SELECT * FROM siswa");
  ?>
  <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../img/smkn2cmi.png" alt="logo">
                </span>

                <div class="text header-text">
                    <span class="name">Buku Saku</span>
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
                        <a href="pedoman.php">
                            <i class='bx bx-book-bookmark icon'></i>
                            <span class="text nav-text">Pedoman</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="credit-buksak.php">
                        <i class='bx bx-info-circle icon'></i>
                            <span class="text nav-text">Tentang</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="settings-admin-2.php">
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
                <span>Administrator</span>
                <h2>Pedoman Sekolah</h2>
            </div>
        </div>

    <div class="pedoman" style="text-align: center;">
        <img src="../img/pedoman_1.png" alt=""><br>
        <img src="../img/pedoman_2.png" alt=""><br>
        <img src="../img/pedoman_3.png" alt=""><br>
        <img src="../img/pedoman_4.png" alt=""><br>
        <img src="../img/pedoman_5.png" alt=""><br>
        <img src="../img/pedoman_6.png" alt=""><br>
        <img src="../img/pedoman_7.png" alt=""><br>
        <img src="../img/pedoman_8.png" alt=""><br>
        <img src="../img/pedoman_9.png" alt=""><br>
        <img src="../img/pedoman_10.png" alt=""><br>
        <img src="../img/pedoman_11.png" alt=""><br>
        <img src="../img/pedoman_12.png" alt=""><br>
        <img src="../img/pedoman_13.png" alt=""><br>
        <img src="../img/pedoman_14.png" alt=""><br>
        <img src="../img/pedoman_15.png" alt=""><br>
        <img src="../img/pedoman_16.png" alt=""><br>
        <img src="../img/pedoman_17.png" alt=""><br>
        <img src="../img/pedoman_18.png" alt=""><br>
        <img src="../img/pedoman_19.png" alt=""><br>
        <img src="../img/pedoman_20.png" alt=""><br>
        <img src="../img/pedoman_21.png" alt=""><br>
        <img src="../img/pedoman_22.png" alt=""><br>
        <img src="../img/pedoman_23.png" alt=""><br>
    </div>
    <form action='pedoman.php' method='post'>
        <button class="button" style="margin-left: 45%; margin-top: 40px; margin-bottom: -40px;">Kembali Ke Atas</button>
    </form>

    <div class="footer">
        <p>&copy;TEFA RPL</p>
    </div>
    <script src="script.js"></script>
</body>

</html>