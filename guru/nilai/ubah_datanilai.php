<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/guru/login.php');
}
?>

<?php
    include "../lib/koneksi.php";

    $IdNilai = htmlentities($_GET['IdNilai']);
    $sql = "SELECT * FROM tb_nilai WHERE IdNilai = '$IdNilai'";
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
      <div class="panel-heading">Ubah Data Nilai</div>
       <div class="panel-body">
       <div class="container">
        <form method="POST" action="perbarui_datanilai.php">
        <div class="form-group">
            <div class="input-group">
            <label>Nilai</label>
            <input type="text" name="IdNilai" class="form-control" id="IdNilai" placeholder="IdNilai" value="<?php echo "$data2[IdNilai]"; ?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Siswa</label>
            <select name="NIS" class="form-control" id="NIS">
                <?php
                  $sql = "SELECT * FROM tb_siswa";
                  $result = mysqli_query($conn, $sql);
                  echo "<option value=$data2[NIS]>$data2[NIS]</option>";
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
                <?php
                  $sql = "SELECT * FROM tb_pelajaran";
                  $result = mysqli_query($conn, $sql);
                  echo "<option value=$data2[KodePljrn]>$data2[KodePljrn]</option>";
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
            <input type="number" name="Nilai" class="form-control" id="Nilai" placeholder="Nilai" value="<?php echo "$data2[Nilai]"; ?>">
            </div>
          </div>
        <input type="submit" class="btn btn-warning" name="submit" value="Perbarui"></input>
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
