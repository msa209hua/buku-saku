<?php

if (isset($_POST['signin'])) {
  
  if ($_POST['username'] == "admin" && $_POST['password'] == "admin") {
    header("location: home.php");
  } else if ($_POST['username'] == "hi" && $_POST['password'] == "yey") {
    header("location: forgot.php");
  } else {
    echo "
      <script>
          alert('Username atau Password salah');
          window.location.href='login.php';
      </script>
      ";
  }
}
?>