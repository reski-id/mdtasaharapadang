<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>


<?php
  include '../lib/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="../assets/css/navbar-static-top.css" rel="stylesheet">
  </head>
  <body>
<?php
  include '../menu.php';
?>
  <div class="container">
    <div class="row">
      <div class="span12">
      <div class="input-group">
      <legend>Entri Data Kriteria Penilaian Quran</legend>
        <form method="POST" action="simpan-data-penquran.php">
          <div class="form-group">
            <div class="input-group">
            <label>Kode Kriteria</label>
            <input type="text" name="kdpenilai" class="form-control" id="kdpenilai" required>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Kriteria Penilaian</label>
            <input type="text" name="kriteria" class="form-control" id="kriteria" required>
            </div>
          </div>
        <input type="submit" class="btn btn-warning" name="submit" value="Simpan"></input>
        <input type="submit" class="btn btn-info" name="submit" value="Batal"></input>
      </form>
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
