<!DOCTYPE html>
<html lang="en">
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
      background-color: #181C24;
      position: fixed;
      height: 100%;
      overflow: auto;
      color: white;
    }

    li a {
      display: block;
      color: white;
      padding: 5px 16px;
      text-decoration: none;
    }

    li a.active {
      background: linear-gradient(#181C24, #282c34);
      font-size: 30px;
      color: white;
    }

    li a:hover:not(.active) {
      background-color: rgb(82, 28, 14);
      color: white;
      font-weight: bold;
    }

    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
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

    /* From uiverse.io by @satyamchaudharydev */
    /* removing default style of button */
    @media screen and (max-width: 600px) {
      li a.active {
        background: linear-gradient(#181C24, #282c34);
        font-size: 20px;
        color: white;
      }

      li a {
        display: block;
        color: white;
        padding: 8px 16px;
        text-decoration: none;
        font-size: 10px;
      }

      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        font-size: 9px;
      }
    }

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

  ?>
  <ul>
    <li><a class="active" href="admin-buksak.php"><b>Admin <br> Buku Saku</b></a></li>
    <li><a href="admin-buksak.php">List Siswa</a></li>
    <li><a href="data-kasus.php">Data Kasus</a></li>
    <li><a href="pedoman.php">Pedoman</a></li>
    <li><a href="credit-buksak.php">Tentang</a></li>
  </ul>

  <div style="margin-left:20%;padding:10px 16px;height:1000px;">
    <form action="admin-buksak.php" method="GET">
      <table>
        <tr>
          <td>
            <form method="GET">
              <select name="tingkat">
                <option value="10 PPLG A">10 PPLG A</option>
                <option value="10 PPLG B">10 PPLG B</option>
                <option value="10 KIMIA A">10 KIMIA A</option>
                <option value="10 KIMIA B">10 KIMIA B</option>
                <option value="10 KIMIA C">10 KIMIA C</option>
                <option value="10 ANIMASI A">10 ANIMASI A</option>
                <option value="10 ANIMASI B">10 ANIMASI B</option>
                <option value="10 DKV A">10 DKV A</option>
                <option value="10 DKV B">10 DKV B</option>
                <option value="10 DKV C">10 DKV C</option>
                <option value="10 MEKATRONIKA A">10 MEKATRONIKA A</option>
                <option value="10 MEKATRONIKA B">10 MEKATRONIKA B</option>
                <option value="10 MEKATRONIKA C">10 MEKATRONIKA C</option>
                <option value="10 MEKATRONIKA D">10 MEKATRONIKA D</option>
                <option value="10 PEMESINAN A">10 PEMESINAN A</option>
                <option value="10 PEMESINAN B">10 PEMESINAN B</option>
                <option value="11 PPLG A">11 PPLG A</option>
                <option value="11 PPLG B">11 PPLG B</option>
                <option value="11 KIMIA A">11 KIMIA A</option>
                <option value="11 KIMIA B">11 KIMIA B</option>
                <option value="11 KIMIA C">11 KIMIA C</option>
                <option value="11 ANIMASI A">11 ANIMASI A</option>
                <option value="11 ANIMASI B">11 ANIMASI B</option>
                <option value="11 DKV A">11 DKV A</option>
                <option value="11 DKV B">11 DKV B</option>
                <option value="11 DKV C">11 DKV C</option>
                <option value="11 MEKATRONIKA A">11 MEKATRONIKA A</option>
                <option value="11 MEKATRONIKA B">11 MEKATRONIKA B</option>
                <option value="11 MEKATRONIKA C">11 MEKATRONIKA C</option>
                <option value="11 MEKATRONIKA D">11 MEKATRONIKA D</option>
                <option value="11 PEMESINAN A">11 PEMESINAN A</option>
                <option value="11 PEMESINAN B">11 PEMESINAN B</option>
              </select>
          </td>
          <td>
            <input type="submit" name="cari" value="Cari">
          </td>
          <td>
            <div class="input-container">
              <input type="text" name="search" class="input" placeholder="search...">
              <span class="icon">
                <svg width="19px" height="19px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                    <path opacity="1" d="M14 5H20" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path opacity="1" d="M14 8H17" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M21 11.5C21 16.75 16.75 21 11.5 21C6.25 21 2 16.75 2 11.5C2 6.25 6.25 2 11.5 2" stroke="#000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path opacity="1" d="M22 22L20 20" stroke="#000" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </g>
                </svg>
              </span>
            </div>
          </td>
          <td></td>
        </tr>

        <?php
        if (isset($_GET['cari'])) {
          $ting = $_GET['tingkat'];
          $tingkat = explode(" ", $ting);
          $angkatan = $tingkat[0];
          $jurusan = $tingkat[1];
          $kelas = $tingkat[2];
          $sql = mysqli_query($conn, "SELECT * FROM siswa 
      WHERE tingkat='$angkatan' and jurusan='$jurusan' and kelas='$kelas' 
      ORDER BY nis ASC");
          if (isset($_GET['search'])) {
            $hasil = $_GET['search'];
            $sql = mysqli_query($conn, "SELECT * FROM siswa
        WHERE nama
        like '%" . $hasil . "%'");
          }
        ?>
          <tr>
            <td><b style="font-size: 20px; font-weight: 800;">KELAS</b></td>
            <td><b style="font-size: 20px; font-weight: 800;"><?php echo $ting; ?></b></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Laporkan</th>
          </tr>
          <?php foreach ($sql as $row) : ?>
            <tr>
              <td><?= $row["nis"]; ?></td>
              <td><?= $row["nama"]; ?></td>
              <td><?= $row["tingkat"] . " " . $row["jurusan"] . " " . $row["kelas"]; ?></td>
              <td><?php echo "
                        <a href='proses-kasus.php?id=$row[nis]' class='css-button'>Report</a>" ?></td>
            </tr>
        <?php
          endforeach;
        }
        ?>
      </table>
    </form>
</body>

</html>