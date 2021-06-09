<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<?php
    include "../../lib/koneksi.php";

    $id = htmlentities($_GET['id']);
    $sql = "SELECT * FROM tb_acara WHERE id = '$id'";
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
      <div class="panel-heading">Update Data Kegiatan</div>
       <div class="panel-body">
        <div class="container">
        <form method="POST" action="perbarui_data_acara.php">
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>ID Kegiatan</label>
            <input type="text" name="id" value="<?php echo $data1['id']; ?>" class="form-control" id="id" readonly></input>
            </div>
          </div>
          <div class="form-group">
            <label>Tanggal</label>
              <div class="input-group date form_datetime col-md-4 col-xs-8" data-date="" data-time-format="dd MM yyyy -  hh:mm:ss" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd hh:mm:ss">
              <input class="form-control" type="text" value="<?php echo $data1['tanggal']; ?>">
              <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
              </div>
            <input type="hidden" id="dtp_input1" name="tanggal" value="2019-12-05">
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Acara</label>
            <textarea name="acara" class="form-control" required><?php echo $data1['acara'] ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Lokasi</label>
            <textarea name="lokasi" class="form-control" required><?php echo $data1['lokasi'] ?></textarea>
            </div>
          </div>
        <input type="submit" class="btn btn-warning" name="submit" value="Update"></input><br>
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
