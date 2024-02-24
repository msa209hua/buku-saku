<!DOCTYPE html>
<html lang="en">
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="css_style_new.css">
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

    /* From uiverse.io by @satyamchaudharydev */
    /* removing default style of button */
    @media screen and (max-width: 600px) {}

    .input-container {
      width: 220px;
      position: relative;
    }

    .icon {
      position: absolute;
      right: 10px;
      top: calc(50% + 5px);
      transform: translateY(calc(-50% - 5px));
    }

    .input {
      width: 100%;
      height: 40px;
      padding: 10px;
      transition: .2s linear;
      border: 2.5px solid black;
      font-size: 14px;
      text-transform: uppercase;
      letter-spacing: 2px;
    }

    .input:focus {
      outline: none;
      border: 0.5px solid black;
      box-shadow: -5px -5px 0px black;
    }

    .input-container:hover>.icon {
      animation: anim 1s linear infinite;
    }

    @keyframes anim {

      0%,
      100% {
        transform: translateY(calc(-50% - 5px)) scale(1);
      }

      50% {
        transform: translateY(calc(-50% - 5px)) scale(1.1);
      }
    }
  </style>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <?php
  include "koneksi.php";
  session_start();

  if (!isset($_SESSION['id_masuk'])) {
    header('Location: ../index.php');
  }
  $sql = mysqli_query($conn, "SELECT * FROM siswa");
  ?>

  <div class="sidebar">
    <div class="logo"></div>
    <ul class="menu">
      <li class="active">
        <a href="admin-buksak.php">
          <img src="../img/list.png" alt="" style="width: 30px; height: 30px;">
          <span>List</span>
        </a>
      </li>
      <li>
        <a href="data-kasus.php">
          <img src="../img/log.png" alt="" style="width: 33px; height: 30px;">
          <span>Log</span>
        </a>
      </li>
      <li>
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
        <h2>List Siswa</h2>
      </div>
    </div>

    <div>
      <form action="admin-buksak.php" method="GET">
        <table id="table_kasus" class="display">
          <thead>
            <tr>
              <th>NIS</th>
              <th>Nama</th>
              <th>Kelas</th>
              <th>Laporkan</th>
            </tr>
          </thead>
          <tbody>
            <?php

            foreach ($sql as $row) : ?>
              <tr>
                <td><?php echo $row["nis"]; ?></td>
                <td><?php echo $row["nama"]; ?></td>
                <td><?php echo $row["tingkat"] . " " . $row["jurusan"] . " " . $row["kelas"]; ?></td>
                <td><?php echo "
                        <a href='proses-kasus.php?id=$row[nis]' class='css-button'>Report</a>" ?></td>
              </tr>
            <?php
            endforeach;

            ?>
          </tbody>
        </table>

        <script>
          $(document).ready(function() {
            $('#table_kasus').DataTable();
          });
        </script>
      </form>
    </div>

</body>

</html>