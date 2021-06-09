<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/guru/login.php');
}
?>

<?php
    include "../lib/koneksi.php";

    $KodePljrn = htmlentities($_GET['KodePljrn']);
    $sql = "SELECT * FROM tb_pelajaran WHERE KodePljrn = '$KodePljrn'";
    $result = mysqli_query($conn, $sql);
    $data2 = mysqli_fetch_array($result);
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
      <div class="col-md-10">
      <div class="panel panel-primary">
      <div class="panel-heading">Ubah Data Pelajaran</div>
       <div class="panel-body">
        <form method="POST" action="perbarui-data-pljrn.php">
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Kode Pelajaran</label>
            <input type="text" name="KodePljrn" value="<?php echo $data2['KodePljrn']; ?>" readonly class="form-control" id="KodePljrn">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Nama Pelajaran</label>
            <input type="text" name="NamaPljrn" value="<?php echo $data2['NamaPljrn']; ?>" class="form-control" id="NamaPljrn" required>
            </div>
          </div>
        <input type="submit" class="btn btn-warning" name="submit" value="Perbarui"></input>
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
