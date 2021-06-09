<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
  include '../lib/koneksi.php';
?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap1.min.css" rel="stylesheet">
    <link href="../assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="../assets/css/navbar-static-top.css" rel="stylesheet">
    <style>
      .btn-latar {
        color: #333;
        background-color: #f5f5f5;
        border-color: #333;
}</style>
  </head>
  <body>
<?php
  include "../menu.php";
?>
  <div class="container btn-latar">
   <div class="row">
  <div class="col-lg-12">
  
  <div style="border-bottom:solid 2px" id="container">
  <div class="row">
  <h2 align="center"><b>MDTA SAHARA PADANG </h2></b>
  <p align="center">
          Jalan Padang Pasir No 30 Padang, Sumatera Barat</br>
          Telp. 05, Fax 22</br></p>
  </div>
  </div>

  <div id="container">
  <div class="row">
  <p></p>
  <h4 align="center"><b>Pencarian Transaksi Keuangan</b></h4>
  <div class="rows">&nbsp;</div>

  <!-- cari kas masuk dan keluar -->
  <div class="col-lg-3">
    <form action="hasil_caritransaksi.php" method="post" >
    <div class="input-group">
      <select name="tahun" class="form-control">
        <option value="">Pilih Tahun</option>
        <?php
          $sql = "SELECT Tahun FROM vkas GROUP BY Tahun";
          $result = mysqli_query($conn, $sql);
          while($tahun=mysqli_fetch_array($result)){
            echo "<option value=$tahun[Tahun]>$tahun[Tahun]</option>";
          }
        ?>
      </select>
      &nbsp;
      <select name="bulan" class="form-control">
          <option value="">Pilih Bulan</option>
          <option value="January">Januari</option>
          <option value="February">Februari</option>
          <option value="March">Maret</option>
          <option value="April">April</option>
          <option value="May">Mei</option>
          <option value="June">Juni</option>
          <option value="July">Juli</option>
          <option value="August">Agustus</option>
          <option value="September">September</option>
          <option value="October">Oktober</option>
          <option value="November">November</option>
          <option value="December">Desember</option>
      </select>
      <div class="rows">
      &nbsp;
      <span class="input-group-btn">
    
        <button class="btn btn-success" type="submit" value="Cari">Cari Laporan Kas !</button>
      </span>
    </div>
    </div>
    </form>
  </div>

  <!-- carikas masuk -->
  <div class="col-lg-3">
    <form action="hasil_datapemasukan.php" method="post" >
    <div class="input-group">
      <select name="tahun" class="form-control">
        <option value="">Pilih Tahun</option>
        <?php
          $sql = "SELECT Tahun FROM vkas GROUP BY Tahun";
          $result = mysqli_query($conn, $sql);
          while($tahun=mysqli_fetch_array($result)){
            echo "<option value=$tahun[Tahun]>$tahun[Tahun]</option>";
          }
        ?>
      </select>
      &nbsp;
      <select name="bulan" class="form-control">
          <option value="">Pilih Bulan</option>
          <option value="January">Januari</option>
          <option value="February">Februari</option>
          <option value="March">Maret</option>
          <option value="April">April</option>
          <option value="May">Mei</option>
          <option value="June">Juni</option>
          <option value="July">Juli</option>
          <option value="August">Agustus</option>
          <option value="September">September</option>
          <option value="October">Oktober</option>
          <option value="November">November</option>
          <option value="December">Desember</option>
      </select>
      <div class="rows">
      &nbsp;
      <span class="input-group-btn">
    
        <button class="btn btn-info" type="submit" value="Cari">Data Pemasukan</button>
      </span>
    </div>
    </div>
    </form>
  </div>
<!-- cari pengeluaran -->
  <div class="col-lg-3">
    <form action="hasil_datapengeluaran.php" method="post" >
    <div class="input-group">
      <select name="tahun" class="form-control">
        <option value="">Pilih Tahun</option>
        <?php
          $sql = "SELECT Tahun FROM vkas GROUP BY Tahun";
          $result = mysqli_query($conn, $sql);
          while($tahun=mysqli_fetch_array($result)){
            echo "<option value=$tahun[Tahun]>$tahun[Tahun]</option>";
          }
        ?>
      </select>
      &nbsp;
      <select name="bulan" class="form-control">
          <option value="">Pilih Bulan</option>
          <option value="January">Januari</option>
          <option value="February">Februari</option>
          <option value="March">Maret</option>
          <option value="April">April</option>
          <option value="May">Mei</option>
          <option value="June">Juni</option>
          <option value="July">Juli</option>
          <option value="August">Agustus</option>
          <option value="September">September</option>
          <option value="October">Oktober</option>
          <option value="November">November</option>
          <option value="December">Desember</option>
      </select>
      <div class="rows">
      &nbsp;
      <span class="input-group-btn">
    
        <button class="btn btn-danger" type="submit" value="Cari">Data Pengeluaran</button>
      </span>
    </div>
    </div>
    </form>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>


    
  <?php
      include '../footer.php';
  ?>
  
    <script src="../assets/js/jquery.js"></script>  
    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>
