<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help</title>
    <link rel="stylesheet" href="side-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/
    font-awesome/6.4.0/css/all.min.css">
    <style>
    td,
    th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    </style>
</head>
<body>
<div class="main--content">
    <div class="header--wrapper">
      <div class="header--title">
        <h2>Help?</h2>
      </div>
    </div>
    <table>
        <tr>
          <td><b>Ada kendala? Silahkan hubungi nomor di bawah ini;</b></td>
        </tr>
        <tr>
          <td>+62 821-5555-7777 (Kesiswaan/Admin)</td>
        </tr>
        <tr>
          <td>+62 822-3333-4444 (Kesiswaan/Admin)</td>
        </tr>
      </table>
        <br>
      <table>
        <tr>
            <td><b>Tidak dapat memasukan Username dan Password?</b></td>
        </tr>
        <tr>
            <td>Username: Pastikan Username sama dengan nama panjang kalian.</td>
        </tr>
        <tr>
            <td>Password: Pastikan Password sama dengan NIS kalian.</td>
        </tr>
      </table>
        <br>
      <form action="help-buku-saku-2.php" method="post">
      <table>
        <tr>
          <td>
            <button name="Back">Kembali</button>
          </td>
        </tr>
      </table>
    </div>
    </form>

    <?php
    session_start();
    if (isset($_POST['Back'])) {
        $nis = $_SESSION['nis'];
        header("Location: buku-saku.php?id=$nis");
    }
    ?>
</div>
</body>
</html>