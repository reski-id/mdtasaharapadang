<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<?php
    include "../lib/koneksi.php";

    $idortu = htmlentities($_GET['idortu']);
    $sql = "select * from tb_ortu where idortu='$idortu'";
    $result = mysqli_query($conn, $sql);
    $data1 = mysqli_fetch_array($result);
   
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MDTA SAHARA PADANG</title>
    
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
      <div class="panel-heading">Kirim Pesan</div>
       <div class="panel-body">
        <div class="container">
        <form method="POST" action="kirimpesanortusingle.php">
        <div class="form-group">
            <div class="input-group col-xs-12 col-sm-7 col-md-5">
            <label>NOHP</label>
            <input type="text" name="nohp" value="<?php echo $data1['NoHp']; ?>" class="form-control">
            </input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-xs-12 col-sm-7 col-md-5">
            <label>Pesan</label>
            <textarea name="pesan" class="form-control" rows="10" required>Assalamualaikum, Akun anda sudah diaktifkan, (username: <?php echo $data1['username']; ?>, pass:123), setelah login langsung ganti username dan password.. Terima Kasih 
            </textarea>
            </div>
          </div>
          <a name="Batal" id="Batal" class="btn btn-warning" href="data_ortu.php" role="button">Batal</a>
        <input type="submit" class="btn btn-primary" name="submit" value="Kirim Pesan"></input><br>
      </form><br>
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
    <script type="text/javascript" src="../assets/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-datetimepicker.id.js"></script>
    <script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "dd MM yyyy - HH:ii P",
        showMeridian: true,
        autoclose: true,
        todayBtn: true
    });
</script> 
  </body>
</html>
