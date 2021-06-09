<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>

<?php
  include "../lib/koneksi.php";
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
      <div class="input-group">
      <legend>Tambah Data User</legend>
        <form method="POST" action="simpan_data_user.php">
          <div class="form-group">
            <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="username" required></input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Password</label>
            <input type="password" name="sandi1" class="form-control" id="sandi1" maxlength="20" placeholder="Masukkan Kata Sandi"  required></input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Sekali Lagi</label>
            <input type="password" name="sandi2" class="form-control" id="sandi2" placeholder="Masukkan Kata Sandi Sekali lagi"  maxlength="20" required></input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Level</label>
            <select name="tingkat" class="form-control">
            <option selected="selected">Pilih Level</option>
            <option value="Admin">Admin</option>
            <option value="Guru">Guru</option>
            </select>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Status</label>
            <select name="aktif" class="form-control">
            <option selected="selected">Pilih Status</option>
            <option value="Aktif">Aktif</option>
            <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
            </div>
          </div>
        <input type="submit" class="btn btn-warning" name="submit" value="Simpan"></input>
        <input type="submit" class="btn btn-info" name="submit" value="Batal"></input>
      </form>
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
    
  </body>
</html>
