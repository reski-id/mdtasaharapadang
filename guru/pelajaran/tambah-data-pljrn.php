<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/guru/login.php');
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
      <div class="col-md-8">
      <div class="panel panel-primary">
      <div class="panel-heading">Entri Data Pelajaran</div>
      <div class="panel-body">
      <div class="container">
        <form method="POST" action="simpan-data-pljrn.php">
          <div class="form-group">
            <div class="input-group">
            <label>Kode Pelajaran</label>
            <input type="text" name="KodePljrn" class="form-control" id="KodePljrn" required>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Nama Pelajaran</label>
            <input type="text" name="NamaPljrn" class="form-control" id="NamaPljrn" required>
            </div>
          </div>
          <a class="btn btn-warning" href="data-pljrn.php" role="button">Batal</a>
        <input type="submit" class="btn btn-info" name="submit" value="Simpan"></input>
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
