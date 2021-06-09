<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>

<?php
    include "../lib/koneksi.php";
    $idortu = htmlentities($_GET['idortu']);
    $sql = "SELECT * FROM tb_ortu WHERE idortu = '$idortu'";
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
    <link href="../assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
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
      <div class="panel-heading">Ubah Data</div>
       <div class="panel-body">
        <div class="container">
        <form method="POST" action="perbarui_pdataortu.php">
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>ID</label>
            <input type="text" name="idortu" value="<?php echo $data2['idortu']; ?>" class="form-control" id="idortu" readonly></input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $data2['username']; ?>" class="form-control" id="username"  class="form-control" required></input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Password</label>
            <input type="password" name="sandi1" class="form-control" id="sandi1" maxlength="10" placeholder="Masukkan Password" autocomplete="off" required></input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Re - Password</label>
            <input type="password" name="sandi2" class="form-control" id="sandi2" maxlength="10" autocomplete="off" placeholder="Masukkan Password Sekali lagi" required></input>
            </div>
          </div>
         <a name="" id="" class="btn btn-primary" href="data_portu.php" role="button">Batal</a>
        <input type="submit" class="btn btn-warning" name="submit" value="Update"></input><br>
      </form><br>
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
    <script type="text/javascript" src="../assets/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-datetimepicker.id.js"></script>
    <script type="text/javascript">
      $('.form_date').datetimepicker({
          language:  'id',
          weekStart: 1,
          todayBtn:  1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      minView: 2,
      forceParse: 0
      });
    </script>
  </body>
</html>
