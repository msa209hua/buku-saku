<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>e - Buku Saku</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    .nav {
      list-style-type: none;
      height: 80px;
      width: 100%;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #181c24;
      ;
    }

    h1 {
      color: white;
      background-color: #282C34;
      padding: 10px 20px 35px 20px;
    }

    .judul {
      background-color: #d7d8da;
      text-align: center;
      font-weight: 900;
      font-size: 30px;
      margin-top: 100px;
      border-top: 1px solid #b5b6b7;
      border-bottom: 1px solid #b5b6b7;
    }

    .footer {
      background-color: #d7d8da;
      text-align: center;
      height: 25px;
      font-weight: 700;
      font-size: 14px;
      margin-top: 100px;
      border-top: 1px solid #b5b6b7;
      border-bottom: 1px solid #b5b6b7;
    }

    .table-2 {
      margin-top: -16px;
    }

    .table-3 {
      margin-left: 20px;
      border: 1px solid #b5b6b7;
      border-top: 0;
    }

    .table-4 {
      margin-left: -5px;
      border: 1px solid #b5b6b7;
      border-top: 0;
    }

    .row {
      margin-right: 0px;
      padding: 0px;
      margin-top: -16px;
    }
  </style>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

  <div class="nav">
    <h1>e-Buku Saku</h1>
  </div>

  <div class="identitas">
    <table class="table table-secondary table-striped table-responsive-md">
      <tr>
        <td><b>Nama Lengkap</b></td>
        <td><b>:
            <!-- dari databes -->
          </b></td>
      </tr>
      <tr>
        <td><b>NIS</b></td>
        <td><b>:
            <!-- dari databes -->
          </b></td>
      </tr>
      <tr>
        <td><b>Kelas</b></td>
        <td><b>:
            <!-- dari databes -->
          </b></td>
      </tr>
      <tr>
        <td><b>Total Poin</b></td>
        <td><b>:
            <!-- dari databes -->
          </b></td>
      </tr>
    </table>
  </div>

  <div class="catatan">
    <p class="judul">Catatan Kasus</p>
    <table class="table-2 table table-striped table-secondary">
      <tr>
        <td>NO</td>
        <td>HARI/TANGGAL</td>
        <td>PELANGGARAN & KEBAIKAN</td>
        <td>POIN</td>
      </tr>
      <tr>
        <!-- dari databes -->
      </tr>
      <tr>
        <td>TOTAL POIN</td>
        <td>
          <!-- dari databes -->poin
        </td>
      </tr>
    </table>
  </div>
  <div class="jenis-kasus">
    <p class="judul">Jenis Pelanggaran</p>
    <div class="row">
      <div class="col-md-6">
        <table class="table-3 table table-striped">
          <thead>
            <tr>
              <th>NO</th>
              <th>Pelanggaran</th>
              <th>Poin</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Terlambat</td>
              <td>-10</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Merokok</td>
              <td>-50</td>
            </tr>
            <tr>
              <td>3</td>
              <td>Mabok</td>
              <td>-75</td>
            </tr>
            <tr>
              <td>4</td>
              <td>Kabur</td>
              <td>-25</td>
            </tr>
            <tr>
              <td>5</td>
              <td>Rambut Panjang(Laki-Laki)</td>
              <td>-10</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-6">
        <table class="table-4 table table-striped">
          <thead>
            <tr>
              <th>NO</th>
              <th>Pelanggaran</th>
              <th>Poin</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>6</td>
              <td>Berkata Kasar/Kotor</td>
              <td>-5</td>
            </tr>
            <tr>
              <td>7</td>
              <td>Berkelahi</td>
              <td>-20</td>
            </tr>
            <tr>
              <td>8</td>
              <td>Seragam tidak sesuai hari</td>
              <td>-10</td>
            </tr>
            <tr>
              <td>9</td>
              <td>Sepatu</td>
              <td>-10</td>
            </tr>
            <tr>
              <td>10</td>
              <td>Atribut</td>
              <td>-10</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>
  <div class="footer">
    <p>&copy;TEFA RPL</p>
  </div>
</body>

</html>