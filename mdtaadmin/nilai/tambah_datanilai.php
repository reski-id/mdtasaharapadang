<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>

<?php
  include '../lib/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
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
      <div class="panel-heading">Tambah Nilai</div>
       <div class="panel-body">
        <div class="container">
        <form method="POST" action="simpan_datanilai.php">
          <div class="form-group">
            <div class="input-group">
            <label>Nama Siswa</label>
            <select name="NIS" class="form-control" id="NIS">
              <option value="" selected="selected">Nama Siswa</option>
                <?php
                  $sql = "SELECT * FROM tb_siswa";
                  $result = mysqli_query($conn, $sql);
                  while($data=mysqli_fetch_array($result)){
                    echo "<option value=$data[NIS]>$data[NIS]"." => $data[NamaSiswa]</option>";
                  }
                ?>
            </select>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Mata Pelajaran</label>
            <select name="KodePljrn" class="form-control" id="KodePljrn">
              <option value="" selected="selected">Mata Pelajaran</option>
                <?php
                  $sql = "SELECT * FROM tb_pelajaran";
                  $result = mysqli_query($conn, $sql);
                  while($data=mysqli_fetch_array($result)){
                    echo "<option value=$data[KodePljrn]>$data[NamaPljrn]</option>";
                  }
                ?>
            </select>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Nilai</label>
            <input type="number" name="Nilai" class="form-control" id="Nilai" placeholder="Nilai">
            </div>
          </div>
          <a class="btn btn-warning" href="data_nilai.php" role="button">Batal</a>
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
  </body>
</html>
