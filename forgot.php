<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help</title>
    <link rel="stylesheet" href="side-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
            <td><b>Jika terdapat kesalahan seperti;</b></td>
        </tr>
        <tr>
            <td>
                a. Report berulang pada hari yang sama <br>
                b. Salah report kasus <br>
                c. Ketidakcocokan pada 'nilai' poin pelanggaran dengan 'nilai' poin yang sebenarnya <br>
                   (Contoh: Udin terlambat hari ini kesekolah, poinnya seharusnya dikurangi 10, tapi dalam aplikasi malah dikurangi 20.) <br>
                d. Terdapat bug/kecacatan
            </td>
        </tr>
        <tr>
            <td>Mohon untuk melapor kepada Admin.</td>
        </tr>
      </table>
        <br>
      <form action="help-buku-saku-2.php" method="post">
      <table>
        <tr>
          <td>
            <button class="btn btn-primary" name="Back">Kembali</button>
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