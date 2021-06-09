<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/ortusiswa/login.php');
}
?>
<?php
    include "../lib/koneksi.php";

    $NIS = htmlentities($_GET['NIS']);
    $sql = "SELECT * FROM tb_siswa WHERE NIS = '$NIS'";
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
      <div class="span12">
      <legend>Ubah Data Siswa</legend>
        <form method="POST" action="perbarui_data_siswa.php">
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>BP</label>
            <input type="text" name="NIS" value="<?php echo $data2['NIS']; ?>" class="form-control" id="NIS" readonly></input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Nama Siswa</label>
            <input type="text" name="NamaSiswa" value="<?php echo $data2['NamaSiswa']; ?>" class="form-control" id="NamaSiswa" required></input>
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
              <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
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
            <label>Alamat</label>
            <textarea name="AlamatSiswa" class="form-control" required><?php echo $data2['AlamatSiswa']; ?></textarea>
            </div>
          </div>
          
        <input type="submit" class="btn btn-warning" name="submit" value="Update"></input><br>
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
