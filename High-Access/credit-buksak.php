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

    .td-2,
    .th-2 {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    .card-client {
      background: #2cb5a0;
      width: 13rem;
      padding-top: 25px;
      padding-bottom: 25px;
      padding-left: 20px;
      padding-right: 20px;
      border: 4px solid #7cdacc;
      box-shadow: 0 6px 10px rgba(207, 212, 222, 1);
      border-radius: 10px;
      text-align: center;
      color: #fff;
      font-family: "Poppins", sans-serif;
      transition: all 0.3s ease;
    }

    .card-client:hover {
      transform: translateY(-10px);
    }

    .user-picture {
      overflow: hidden;
      object-fit: cover;
      width: 5rem;
      height: 5rem;
      border: 4px solid #7cdacc;
      border-radius: 999px;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: auto;
    }

    .user-picture svg {
      width: 2.5rem;
      fill: currentColor;
    }

    .name-client {
      margin: 0;
      margin-top: 20px;
      font-weight: 600;
      font-size: 18px;
    }

    .name-client span {
      display: block;
      font-weight: 200;
      font-size: 16px;
    }

    .social-media:before {
      content: " ";
      display: block;
      width: 100%;
      height: 2px;
      margin: 20px 0;
      background: #7cdacc;
    }

    .social-media a {
      position: relative;
      margin-right: 15px;
      text-decoration: none;
      color: inherit;
    }

    .social-media a:last-child {
      margin-right: 0;
    }

    .social-media a svg {
      width: 1.1rem;
      fill: currentColor;
    }

    /*-- Tooltip Social Media --*/
    .tooltip-social {
      background: #262626;
      display: block;
      position: absolute;
      bottom: 0;
      left: 50%;
      padding: 0.5rem 0.4rem;
      border-radius: 5px;
      font-size: 0.8rem;
      font-weight: 600;
      opacity: 0;
      pointer-events: none;
      transform: translate(-50%, -90%);
      transition: all 0.2s ease;
      z-index: 1;
    }

    .tooltip-social:after {
      content: " ";
      position: absolute;
      bottom: 1px;
      left: 50%;
      border: solid;
      border-width: 10px 10px 0 10px;
      border-color: transparent;
      transform: translate(-50%, 100%);
    }

    .social-media a .tooltip-social:after {
      border-top-color: #262626;
    }

    .social-media a:hover .tooltip-social {
      opacity: 1;
      transform: translate(-50%, -130%);
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
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
        <h2>Tentang</h2>
      </div>
    </div>
    <table align="center">
      <tr>
        <td align="center">
          <h1>Di Buat Oleh</h1>
        </td>
      </tr>
      <tr>
        <td>
          <div class="card-client">
            <div class="user-picture">
              <svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z">
                </path>
              </svg>
            </div>
            <p class="name-client"> Artoria
              <span>XI - RPL - Z
              </span>
            </p>
            <div class="social-media">
              <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                  <path
                    d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                  </path>
                </svg>
                <span class="tooltip-social">Twitter</span>
              </a>
              <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                  <path
                    d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                  </path>
                </svg>
                <span class="tooltip-social">Instagram</span>
              </a>
              <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                  <path
                    d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z">
                  </path>
                </svg>
                <span class="tooltip-social">Facebook</span>
              </a>
              <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                  <path
                    d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z">
                  </path>
                </svg>
                <span class="tooltip-social">LinkedIn</span>
              </a>
            </div>
          </div>
        </td>
        <td>
          <div class="card-client">
            <div class="user-picture">
              <svg viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z">
                </path>
              </svg>
            </div>
            <p class="name-client">Welt Yang
              <span>XI - RPL - Z
              </span>
            </p>
            <div class="social-media">
              <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                  <path
                    d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                  </path>
                </svg>
                <span class="tooltip-social">Twitter</span>
              </a>
              <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                  <path
                    d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                  </path>
                </svg>
                <span class="tooltip-social">Instagram</span>
              </a>
              <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                  <path
                    d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z">
                  </path>
                </svg>
                <span class="tooltip-social">Facebook</span>
              </a>
              <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                  <path
                    d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z">
                  </path>
                </svg>
                <span class="tooltip-social">LinkedIn</span>
              </a>
            </div>
          </div>
        </td>
      </tr>
    </table>
  </div>

  <div class="main--content">
    <div class="header--wrapper">
      <div class="header--title">
        <h2>Help</h2>
      </div>
    </div>
    <table>
      <tr>
        <td class="td-2">Ada kendala? Silahkan hubungi nomor di bawah ini.</td>
      </tr>
      <tr>
        <td class="td-2">+62 821-5555-7777 (Kesiswaan/Admin)</td>
      </tr>
      <tr>
        <td class="td-2">+62 822-3333-4444 (Kesiswaan/Admin)</td>
      </tr>
    </table>
  </div>

  <script src="script.js"></script>
</body>

</html>