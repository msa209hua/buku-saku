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

      .form-container {
        width: 320px;
        border-radius: 0.75rem;
        background-color: rgba(17, 24, 39, 1);
        padding: 2rem;
        color: rgba(243, 244, 246, 1);
        margin: 120px 0 0 480px;
      }

      .title {
        text-align: center;
        font-size: 1.5rem;
        line-height: 2rem;
        font-weight: 700;
      }

      .form {
        margin-top: 1.5rem;
      }

      .input-group {
        margin-top: 0.25rem;
        font-size: 0.875rem;
        line-height: 1.25rem;
      }

      .input-group label {
        display: block;
        color: rgba(156, 163, 175, 1);
        margin-bottom: 4px;
      }

      .input-group input {
        width: 100%;
        border-radius: 0.375rem;
        border: 1px solid rgba(55, 65, 81, 1);
        outline: 0;
        background-color: rgba(17, 24, 39, 1);
        padding: 0.75rem 1rem;
        color: rgba(243, 244, 246, 1);
      }

      .input-group input:focus {
        border-color: rgba(167, 139, 250);
      }

      .forgot {
        display: flex;
        justify-content: flex-end;
        font-size: 0.75rem;
        line-height: 1rem;
        color: rgba(156, 163, 175,1);
        margin: 8px 0 14px 0;
      }

      .forgot a,.signup a {
        color: rgba(243, 244, 246, 1);
        text-decoration: none;
        font-size: 14px;
      }

      .forgot a:hover, .signup a:hover {
        text-decoration: underline rgba(167, 139, 250, 1);
      }

      .sign {
        display: block;
        width: 100%;
        background-color: rgba(167, 139, 250, 1);
        padding: 0.75rem;
        text-align: center;
        color: rgba(17, 24, 39, 1);
        border: none;
        border-radius: 0.375rem;
        font-weight: 600;
      }

      .social-message {
        display: flex;
        align-items: center;
        padding-top: 1rem;
      }

      .line {
        height: 1px;
        flex: 1 1 0%;
        background-color: rgba(55, 65, 81, 1);
      }

      .social-message .message {
        padding-left: 0.75rem;
        padding-right: 0.75rem;
        font-size: 0.875rem;
        line-height: 1.25rem;
        color: rgba(156, 163, 175, 1);
      }

      .social-icons {
        display: flex;
        justify-content: center;
      }

      .social-icons .icon {
        border-radius: 0.125rem;
        padding: 0.75rem;
        border: none;
        background-color: transparent;
        margin-left: 8px;
      }

      .social-icons .icon svg {
        height: 1.25rem;
        width: 1.25rem;
        fill: #fff;
      }

      .signup {
        text-align: center;
        font-size: 0.75rem;
        line-height: 1rem;
        color: rgba(156, 163, 175, 1);
      }

      @media screen and (max-width: 476px){
        .form-container {
          margin: 0 0 0 15px;
        }

        body {
          background: url(img/background-2.jpg);
        }
      }
    </style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<div class="form-container">
	<p class="title">Login <br> <span style="font-size: 18px;">E - Buku Saku</span></p>
	<form class="form" action="proses-login.php" method="POST">
		<div class="input-group">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" style="width: 90%;" placeholder="Username menggunakan huruf KAPITAL">
		</div>
		<div class="input-group">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" style="width: 90%;" placeholder="Masukan Password dengan benar">
			<div class="forgot">
				<a rel="noopener noreferrer" href="forgot.php">Forgot Password ?</a>
			</div>
		</div>
    <input type="submit" value="Sign in" name="signin" class="sign">
	</form>

  
</body>
</html>