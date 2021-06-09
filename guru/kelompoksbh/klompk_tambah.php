<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/guru/login.php');
}
?>

<?php
  include "../lib/koneksi.php";
  $cariid = mysqli_query($conn,"SELECT (MAX(idklmpk)+1) AS 'newid' FROM klmpsubuh");
  $idbaru = mysqli_fetch_array($cariid);
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
      <div class="col-md-10">
      <div class="panel panel-primary">
      <div class="panel-heading">Entri Data Kelompok Subuh</div>
       <div class="panel-body">
        <div class="container">
        <form method="POST" action="simpan_klp.php">
          <div class="form-group">
            <div class="input-group">
            <label>Kode</label>
            <input type="text" name="idklmpk" class="form-control" id="idklmpk" value="<?php echo $idbaru[0];?>" required>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Nama Kelompok Subuh</label>
            <input type="text" name="kelommpok" class="form-control" id="kelommpok" required>
            </div>
          </div>
          <a name="Batal" class="btn btn-warning" href="vklompk.php" role="button">Batal</a>
         <input type="submit" class="btn btn-success" name="submit" value="Simpan"></input>
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
