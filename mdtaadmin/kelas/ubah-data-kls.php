<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>

<?php
    include "../lib/koneksi.php";

    $KodeKls = htmlentities($_GET['KodeKls']);
    $sql = "SELECT * FROM tb_kelas WHERE KodeKls = '$KodeKls'";
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
      <div class="panel-heading">Ubah Data Kelas</div>
       <div class="panel-body">
        <div class="container">
        <form method="POST" action="perbarui-data-kls.php">
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Kode Kelas</label>
            <input type="text" name="KodeKls" value="<?php echo $data2['KodeKls']; ?>" readonly class="form-control" id="KodeKls">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Nama Kelas</label>
            <input type="text" name="NamaKls" value="<?php echo $data2['NamaKls']; ?>" class="form-control" id="NamaKls" required>
            </div>
          </div>
          </div>
          <a name="Batal" class="btn btn-warning" href="data-kls.php" role="button">Batal</a>
         <input type="submit" class="btn btn-success" name="submit" value="Update"></input>
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
