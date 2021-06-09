<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/ortusiswa/login.php');
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
        <form method="POST" action="perbarui_dataortu.php">
          <div class="form-group hidden">
            <div class="input-group col-md-5">
            <label>ID</label>
            <input type="text" name="idortu" value="<?php echo $data2['idortu']; ?>" class="form-control" id="idortu" readonly></input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Nama</label>
            <input type="text" name="Nama" value="<?php echo $data2['Nama']; ?>" class="form-control" id="Nama" required></input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Jenis Kelamin</label>
            <select name="JenisKelamin" class="form-control">
            <option value="<?php echo $data2['JenisKelamin']; ?>"><?php echo $data2['JenisKelamin']; ?></option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
            </select>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Tempat Lahir</label>
            <textarea name="TempatLahir" class="form-control" required><?php echo $data2['TempatLahir'] ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label>Tanggal Lahir</label>
              <div class="input-group date form_date col-md-5 col-sm-5 col-xs-6" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
              <input class="form-control" type="text" disabled="disabled" value="<?php echo $data2['TanggalLahir']; ?>">
              <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
              </div>
            <input type="hidden" id="dtp_input2" name="TanggalLahir" value="1995-08-05">
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Agama</label>
            <select name="Agama" class="form-control">
            <option value="<?php echo $data2['Agama']; ?>" selected="selected"><?php echo $data2['Agama']; ?></option>
            <option value="Islam">Islam</option>
            <option value="Katolik">Katolik</option>
            <option value="Protestan">Protestan</option>
            <option value="Hindu">Hindu</option>
            <option value="Buddha">Buddha</option>           
            </select>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Pendidikan Terakhir</label>
            <select name="Pendidikan" class="form-control">
            <option value="<?php echo $data2['Pendidikan']; ?>" selected="selected"><?php echo $data2['Pendidikan']; ?></option>
            <option value="SMA Sederajat">SMA Sederajat</option>
            <option value="S1">S1</option>           
            <option value="S2">S2</option>           
            <option value="S3">S3</option>           
            </select>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Alamat</label>
            <textarea name="Alamat" class="form-control" required><?php echo $data2['Alamat']; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>No HP</label>
            <input type="text" name="NoHp" class="form-control" id="NoHp" value="<?php echo $data2['NoHp']; ?>">
            </div>
          </div>
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
