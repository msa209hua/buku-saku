<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="side-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/
    font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial;
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <?php
  session_start();

  if (!isset($_SESSION['id_masuk'])) {
    header('Location: index.php');
  }
?>

<div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li>
                <a href="admin-buksak.php">
                    <img src="img/list.png" alt="" style="width: 30px; height: 30px;">
                    <span>List</span>
                </a>
            </li>
            <li>
                <a href="data-kasus.php">
                    <img src="img/log.png" alt="" style="width: 33px; height: 30px;">
                    <span>Log</span>
                </a>
            </li>
            <li>
                <a href="pedoman.php">
                    <img src="img/pedoman.png" alt="" style="width: 30px; height: 30px;">
                    <span>Pedoman</span>
                </a>
            </li>
            <li>
                <a href="credit-buksak.php">
                    <img src="img/about.png" alt="" style="width: 30px; height: 30px;"> 
                    <span>Tentang</span>
                </a>
            </li>
            <li class="logout">
                <a href="index.php">
                    <img src="img/logout.png" alt="" style="width: 30px; height: 30px;">
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
    
    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <span>Administrator</span>
                <h2>Pedoman Sekolah</h2>
            </div>
        </div>

    <div class="pedoman" style="text-align: center;">
        <img src="img/pedoman_1.png" alt=""><br>
        <img src="img/pedoman_2.png" alt=""><br>
        <img src="img/pedoman_3.png" alt=""><br>
        <img src="img/pedoman_4.png" alt=""><br>
        <img src="img/pedoman_5.png" alt=""><br>
        <img src="img/pedoman_6.png" alt=""><br>
        <img src="img/pedoman_7.png" alt=""><br>
        <img src="img/pedoman_8.png" alt=""><br>
        <img src="img/pedoman_9.png" alt=""><br>
        <img src="img/pedoman_10.png" alt=""><br>
        <img src="img/pedoman_11.png" alt=""><br>
        <img src="img/pedoman_12.png" alt=""><br>
        <img src="img/pedoman_13.png" alt=""><br>
        <img src="img/pedoman_14.png" alt=""><br>
        <img src="img/pedoman_15.png" alt=""><br>
        <img src="img/pedoman_16.png" alt=""><br>
        <img src="img/pedoman_17.png" alt=""><br>
        <img src="img/pedoman_18.png" alt=""><br>
        <img src="img/pedoman_19.png" alt=""><br>
        <img src="img/pedoman_20.png" alt=""><br>
        <img src="img/pedoman_21.png" alt=""><br>
        <img src="img/pedoman_22.png" alt=""><br>
        <img src="img/pedoman_23.png" alt=""><br>
    </div>
    <form action='pedoman.php' method='post'>
        <button class="button" style="margin-left: 45%; margin-top: 40px; margin-bottom: -40px;">Kembali Ke Atas</button>
    </form>

    <div class="footer">
        <p>&copy;TEFA RPL</p>
    </div>
</body>

</html>