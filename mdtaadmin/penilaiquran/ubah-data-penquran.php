<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>

<?php
    include "../lib/koneksi.php";

    $kdpenilai = htmlentities($_GET['kdpenilai']);
    $sql = "SELECT * FROM tb_kriteria_penilaianquran WHERE kdpenilai = '$kdpenilai'";
    $result = mysqli_query($conn, $sql);
    $data2 = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
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
      <div class="span12">
      <legend>DATA PENILAIAN QURAN</legend>
        <form method="POST" action="perbarui-data-penquran.php">
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Kode Penilaian</label>
            <input type="text" name="kdpenilai" value="<?php echo $data2['kdpenilai']; ?>" readonly class="form-control" id="kdpenilai">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Keriteria</label>
            <input type="text" name="kriteria" value="<?php echo $data2['kriteria']; ?>" class="form-control" id="kriteria" required>
            </div>
          </div>
        <input type="submit" class="btn btn-warning" name="submit" value="Perbarui"></input>
      </form>
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
