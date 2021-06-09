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
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <link href="../../assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="../../assets/css/navbar-static-top.css" rel="stylesheet">
  </head>
  <body>
  <?php
    include '../../menu.php';
  ?>
    <div class="container">
    <div class="row">
      <div class="col-md-10">
      <div class="panel panel-primary">
      <div class="panel-heading">Entri Data Uang Masuk</div>
       <div class="panel-body">
        <div class="container">
        <form method="POST" action="simpan_data_uangmasuk.php">
          <div class="form-group">
            <div class="input-group col-md-5">
            </div>
          </div>
          <div class="form-group">
            <label>Tanggal</label>
              <div class="input-group date form_datetime col-lg-4" data-date="" data-time-format="dd MM yyyy -  hh:mm:ss" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd hh:mm:ss">
              <input class="form-control" type="text">
              <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
              </div>
            <input type="hidden" id="dtp_input1" name="tanggal" value="2019-12-05">
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Jumlah</label>
            <input type="text" name="jumlah" class="form-control" required></input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" required></textarea>
            </div>
          </div>
        <input type="submit" class="btn btn-success" name="submit" value="Simpan"></input><br>
      </form><br>
      </div>
    </div>
  </div>
  </div>
    </div>
  </div>
  
  <?php
      include '../../footer.php';
  ?>
    <script src="../../assets/js/jquery.js"></script>  
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../assets/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="../../assets/js/bootstrap-datetimepicker.id.js"></script>
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
