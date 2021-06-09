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
  <h4 align="center"><b>Pencarian Pelanggaran Siswa</b></h4>
  <div class="rows">&nbsp;</div>
  
  <!-- cari / tahun, bln -->
  <div class="col-lg-3">
    <form action="hasil_pelanggaran.php" method="post" >
    <div class="input-group">
      <select name="tahun" class="form-control">
        <option value="kosong">Pilih Tahun</option>
        <?php
          $sql = "SELECT tahun FROM vpelanggaranperbulan GROUP BY tahun";
          $result = mysqli_query($conn, $sql);
          while($tahun=mysqli_fetch_array($result)){
            echo "<option value=$tahun[tahun]>$tahun[tahun]</option>";
          }
        ?>
      </select>
      &nbsp;
      <select name="bulan" class="form-control">
          <option value="kosong">Pilih Bulan</option>
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
    
        <button class="btn btn-success" type="submit" value="Cari">Data Pelanggaran !</button>
      </span>
    </div>
    </div>
    </form>
  </div>

  <!-- cari dengan select -->
  <div class="col-lg-3">
    <form action="hasil_pelanggarannis.php" method="post" >
    <div class="input-group">
    <select name="nis" class="form-control" onchange="this.form.submit()">
          <option value="">Pilih Siswa</option>
          <?php
          $nisf = "SELECT * FROM tb_siswa";
          $nisg = mysqli_query($conn, $nisf);
          while($dnis=mysqli_fetch_array($nisg)){
            echo "<option value=$dnis[NIS]>$dnis[NIS] $dnis[NamaSiswa]</option>";
          }
        ?>
      </select>
    </div>
    </form>
  </div>
  <!-- cari dengan searchbox -->
  <div class="col-lg-3">
    <form action="" method="post" >
    <div class="input-group">
     
      </form>
      <form action="hasil_pelanggarannis.php" method="post" class="hidden-print">
        <div class="input-group">
          <input name="nis" type="text" class="form-control" placeholder="Masukkan NIS" required>
          <span class="input-group-btn">
            <button class="btn btn-info" type="submit" value="Cari">Cari!</button>
          </span>
        </div>
        </form>
      <div class="rows">
      &nbsp;
      <span class="input-group-btn">
    
        
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
