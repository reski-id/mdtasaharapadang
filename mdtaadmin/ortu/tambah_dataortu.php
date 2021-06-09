<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>

<?php
  include "../lib/koneksi.php";
  $cariid = mysqli_query($conn,"SELECT (MAX(idortu)+1) AS 'newid' FROM tb_ortu");
  $idbaru = mysqli_fetch_array($cariid);
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
      <div class="panel-heading">Entri Data</div>
       <div class="panel-body">
        <div class="container">
        <form method="POST" action="simpan_dataortu.php">
          <div class="form-group">
            <div class="input-group">
            <label>ID</label>
            <input type="text" name="idortu" class="form-control" id="idortu" value="<?php echo $idbaru[0];?>"></input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Nama</label>
            <input type="text" name="Nama" class="form-control" id="Nama" required></input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Pilih Jenis Kelamin</label>
            <select name="JenisKelamin" class="form-control">
            <option selected="selected">Jenis Kelamin</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
            </select>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Tempat Lahir</label>
            <textarea name="TempatLahir" class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label>Tanggal Lahir</label>
              <div class="input-group date form_date col-md-3" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
              <input class="form-control" type="text" disabled="disabled">
              <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
              </div>
            <input type="hidden" id="dtp_input2" name="TanggalLahir" value="1995-08-05">
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Pilih Agama</label>
            <select name="Agama" class="form-control">
            <option value="" selected="selected">Agama</option>
            <option value="Islam">Islam</option>
            <option value="Katolik">Katolik</option>
            <option value="Protestan">Protestan</option>
            <option value="Hindu">Hindu</option>
            <option value="Buddha">Buddha</option>           
            </select>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Pendidikan Terakhir</label>
            <select name="Pendidikan" class="form-control">
            <option value="" selected="selected">Pendidikan Terakhir</option>
            <option value="SMA Sederajat">SMA Sederajat</option>
            <option value="S1">S1</option>           
            <option value="S2">S2</option>           
            <option value="S3">S3</option>           
            </select>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Alamat</label>
            <textarea name="Alamat" class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>No HP</label>
            <input type="text" name="NoHp" class="form-control" id="NoHp" required>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Username (<i>default:ortu</i>)</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="username" required></input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Password(<i>default:123</i>)</label>
            <input type="password" name="sandi1" class="form-control" id="sandi1" maxlength="20" autocomplete="off" placeholder="Masukkan Kata Sandi"  required></input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Sekali Lagi</label>
            <input type="password" name="sandi2" class="form-control" id="sandi2" placeholder="Masukkan Kata Sandi Sekali lagi" autocomplete="off" maxlength="20" required></input>
            </div>
          </div>
        <a name="Batal" class="btn btn-warning" href="data_ortu.php" role="button">Batal</a>
        <input type="submit" class="btn btn-primary" name="submit" value="Simpan"></input>
        
      </form>
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
