<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/guru/login.php');
}
?>
<?php
    include "../lib/koneksi.php";
    $iduser = htmlentities($_GET['iduser']);
    $sql = "SELECT * FROM tb_user WHERE iduser = '$iduser'";
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
    <div class="row col-md-10 col-sm-9 col-xs-11">
      <div class="span12">
      <legend>Ubah Data</legend>
        <form method="POST" action="perbarui_data_user.php">
        <div class="form-group">
            <div class="input-group col-md-5 hidden">
            <label>UserID</label>
            <input type="text" name="iduser" value="<?php echo $data2['iduser']; ?>" class="form-control" id="iduser" readonly/>
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
            <input type="password" name="sandi1" class="form-control" id="sandi1" maxlength="30" placeholder="Masukkan Password" autocomplete="off" required></input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Re - Password</label>
            <input type="password" name="sandi2" class="form-control" id="sandi2" maxlength="30" placeholder="Masukkan Password Sekali lagi" autocomplete="off" required></input>
            </div>
          </div>
          <a name="Batal" class="btn btn-warning" href="data_user.php" role="button">Batal</a>
        <input type="submit" class="btn btn-primary" name="submit" value="Update"></input><br>
      </form><br>
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
