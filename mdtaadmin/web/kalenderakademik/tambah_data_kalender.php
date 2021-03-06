<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>

<?php
  include '../../lib/koneksi.php';
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
      <div class="panel-heading">Entri Acara Akademik</div>
       <div class="panel-body">
        <div class="container">
        <form method="POST" action="simpan_data_kalender.php">
          <div class="form-group">
            <label>Mulai Kegiatan</label>
              <div class="input-group date form_date col-xs-6 col-md-4 col-lg-4" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
              <input class="form-control" type="text">
              <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
              </div>
            <input type="hidden" id="dtp_input1" name="mulai" value="2019-12-05">
          </div>

          <div class="form-group">
            <label>Selesai</label>
              <div class="input-group date form_date col-xs-6 col-md-4 col-lg-4" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
              <input class="form-control" type="text">
              <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
              </div>
            <input type="hidden" id="dtp_input2" name="selesai" value="2019-12-05">
          </div>

          <div class="form-group">
            <div class="input-group">
            <label>Acara</label>
            <textarea class="form-control" id="acara" name="acara" rows="5"></textarea>
            </div>
          </div>
          <a name="Batal" class="btn btn-warning" href="data_kalender.php" role="button">Batal</a>
         <input type="submit" class="btn btn-success" name="submit" value="Simpan"></input>
        
      </form>
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
