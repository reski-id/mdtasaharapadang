<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<?php
    include "../../lib/koneksi.php";

    $id = htmlentities($_GET['id']);
    $sql = "SELECT * FROM tb_kalender_akademik WHERE id = '$id'";
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
      <div class="panel-heading">Update Data Kegiatan Akademik</div>
       <div class="panel-body">
        <div class="container">
        <form method="POST" action="perbarui_data_kalender.php">
          <div class="form-group">
            <div class="input-group col-md-5 hidden">
            <label>ID Kegiatan</label>
            <input type="text" name="id" value="<?php echo $data1['id']; ?>" class="form-control" id="id" readonly></input>
            </div>
          </div>
          <div class="form-group">
            <label>Mulai Kegiatan</label>
              <div class="input-group date form_date col-xs-6 col-md-4 col-lg-4" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
              <input class="form-control" type="text" value="<?php echo $data1['mulai']; ?>">
              <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
              </div>
            <input type="hidden" id="dtp_input2" name="mulai" value="1995-08-05">
          </div>
          <div class="form-group">
            <label>Selesai</label>
              <div class="input-group date form_date col-xs-6 col-md-4 col-lg-4" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input" data-link-format="yyyy-mm-dd">
              <input class="form-control" type="text" value="<?php echo $data1['selesai']; ?>">
              <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
              </div>
            <input type="hidden" id="dtp_input" name="selesai" value="1995-08-05">
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Acara</label>
            <textarea name="acara" rows="5" class="form-control" required><?php echo $data1['acara'] ?></textarea>
            </div>
          </div>
          <a name="Batal" class="btn btn-warning" href="data_kalender.php" role="button">Batal</a>
        <input type="submit" class="btn btn-primary" name="submit" value="Update"></input><br>
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
