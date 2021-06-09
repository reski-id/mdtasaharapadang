<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>

<?php
    include "../lib/koneksi.php";

    $idklmpk = htmlentities($_GET['idklmpk']);
    $sql = "SELECT * FROM klmpsubuh WHERE idklmpk = '$idklmpk'";
    $result = mysqli_query($conn, $sql);
    $data2 = mysqli_fetch_array($result);
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
      <div class="panel-heading">Ubah Data Kelompok</div>
       <div class="panel-body">
        <div class="container">
        <form method="POST" action="edit_kelompokpr.php">
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Kode Kelompok</label>
            <input type="text" name="idklmpk" value="<?php echo $data2['idklmpk']; ?>" readonly class="form-control" id="idklmpk">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Nama Kelompok</label>
            <input type="text" name="kelommpok" value="<?php echo $data2['kelommpok']; ?>" class="form-control" id="kelommpok" required>
            </div>
          </div>
          </div>
          <a name="Batal" class="btn btn-warning" href="vklompk.php" role="button">Batal</a>
         <input type="submit" class="btn btn-success" name="submit" value="Update"></input>
      </form>
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
