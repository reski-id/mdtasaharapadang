<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/guru/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MDTA SAHARA PADANG</title>

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
  <div class="col-lg-8">
  <legend>Ubah Data</legend>
    <div class="alert alert-success" role="alert">
      <strong>Anda akan merubah username dan password!</strong>
    </div>
    <div class="alert alert-warning" role="alert">
      <strong>Setelah Anda merubah Username dan Password Akun Anda akan di logout otomatis</strong><br><i>Masuk kembali dengan Username dan Password Baru</i>
    </div>

  <?php
  $username=$_SESSION['username'];
  $id= $_SESSION['iduser'];

  $cekuser = mysqli_query($conn, "SELECT iduser FROM tb_user WHERE iduser='$id' AND username= '$username'");
  $jmluser = mysqli_num_rows($cekuser);
  $datauser = mysqli_fetch_array($cekuser);
  $iduser= $datauser[0];
  ?>
    <table class="table table-condensed table-bordered table-striped" id="tabeluser">
      <thead>
      <tr>
        <th>Username</th>
        <th>Aksi</th>
      </tr>
      </thead>
    <tbody>
    
    <?php
        include '../lib/koneksi.php';
        $sql = "SELECT * FROM tb_user where iduser='$iduser'";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<span class='badge badge-pill badge-success'>Data Tidak Ditemukan</span>";
        } else {
          $No = 1;
          while ($data = mysqli_fetch_array($result)) {
    ?>

      <tr>
        <td><?php echo $data['username']; ?></td>
        <td align="center">
        <a href="ubah_data_user.php?iduser=<?php echo $data['iduser'];?>">
        <button class="btn btn-warning">
        <span class="glyphicon glyphicon-edit" aria-hiduserden="true" title="Ubah"></span> Ubah
        </a></button>
        </a>
        </td>
      </tr>
       <?php  
        $No++;
        }
      }
    ?>
   
    </tbody>
    </table>
    </div>
   
  </div>
  </div>
  
  <?php
      include '../footer.php';
  ?>

    <script src="../assets/js/jquery.js"></script>  
    <script src="../assets/js/bootstrap.min.js"></script>
    
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap.min.js"></script>

  </body>
</html>