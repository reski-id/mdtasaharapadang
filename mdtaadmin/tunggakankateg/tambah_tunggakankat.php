<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MDTA SAHARA PADANG</title>

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
      <div class="panel-heading">Entri Data Kategory Tunggakan</div>
       <div class="panel-body">
        <form method="POST" action="simpan_tunggakankat.php">
          <div class="form-group">
            <div class="input-group col-md-5">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Kategori Tunggakan</label>
            <input type="text" name="nama"  class="form-control" required></input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Jumlah</label>
            <input type="text" name="jumlah"  class="form-control" required></input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" required></textarea>
            </div>
          </div>
          <a name="Batal" id="Batal" class="btn btn-info" href="data_tunggakankat.php" role="button">Batal</a>
        <input type="submit" class="btn btn-success" name="submit" value="Simpan"></input><br>
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
