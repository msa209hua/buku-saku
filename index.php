<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
      body {
        font-family: arial;
        background: url(img/background-1.jpg);
        background-size: cover;
      }

      .form-control {
        margin: 20px;
        background-color: #ffffff;
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.6);
        width: 400px;
        display: flex;
        justify-content: center;
        flex-direction: column;
        gap: 10px;
        padding: 25px;
        border-radius: 8px;
        margin-left: 470px;
        margin-top: 125px;
      }
      .title {
        font-size: 28px;
        font-weight: 800;
      }
      .input-field {
        position: relative;
        width: 100%;
      }

      .input {
        margin-top: 15px;
        width: 100%;
        outline: none;
        border-radius: 8px;
        height: 45px;
        border: 1.5px solid #ecedec;
        background: transparent;
        padding-left: 10px;
      }
      .input:focus {
        border: 1.5px solid #2d79f3;
      }
      .input-field .label {
        position: absolute;
        top: 25px;
        left: 15px;
        color: #ccc;
        transition: all 0.3s ease;
        pointer-events: none;
        z-index: 2;
      }
      .input-field .input:focus ~ .label,
      .input-field .input:valid ~ .label {
        top: 5px;
        left: 5px;
        font-size: 12px;
        color: #2d79f3;
        background-color: #ffffff;
        padding-left: 5px;
        padding-right: 5px;
      }
      .submit-btn {
        margin-top: 30px;
        height: 55px;
        background: #f2f2f2;
        border-radius: 11px;
        border: 0;
        outline: none;
        color: #ffffff;
        font-size: 18px;
        font-weight: 700;
        background: linear-gradient(180deg, #363636 0%, #1b1b1b 50%, #000000 100%);
        box-shadow: 0px 0px 0px 0px #ffffff, 0px 0px 0px 0px #000000;
        transition: all 0.3s cubic-bezier(0.15, 0.83, 0.66, 1);
        cursor: pointer;
      }

      .submit-btn:hover {
        box-shadow: 0px 0px 0px 2px #ffffff, 0px 0px 0px 4px #0000003a;
      }

      a {
        text-decoration: none;
        color: black;
      }
    </style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <form class="form-control" action="proses-login.php" method="POST">
    <p class="title">Login <br><span style="font-size: 18px;">E - Buku Saku</span></p>
    <div class="input-field">
      <input required="" class="input" type="text" name="username"/>
      <label class="label" for="input">Username menggunakan huruf KAPITAL</label>
    </div>
    <div class="input-field">
      <input required="" class="input" type="password" name="password" maxlength="9"/>
      <label class="label" for="input">Masukan Password dengan benar</label>
    </div>
    <a href="forgot.php">Forgot your password?</a>
    <button class="submit-btn" name="signin">Sign In</button>
  </form>

</body>
</html>