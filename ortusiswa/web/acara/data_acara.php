<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/ortusiswa/login.php');
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
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="../../assets/css/navbar-static-top.css" rel="stylesheet">
    
  </head>
  <body>
<?php
  include '../../menu.php';
?>
  <div class="container">
  <div class="row">
  <div class="col-lg-12">
  <legend>Data Jadwal Kegiatan MDTA SAHARA PADANG</legend>
    <table class="table table-condensed table-bordered table-striped table-responsive" id="tb_acara">
      <thead>
      <tr>
        <th>No.</th>
        <th>Tanggal</th>
        <th>Acara</th>
        <th>Lokasi</th>
      </tr>
      </thead>
    <tbody>
    
    <?php
        include '../../lib/koneksi.php';
        $sql = "SELECT * FROM tb_acara";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<td colspan='4'>Belum ada data!</td>";
        } else {
          $No = 1;
          while ($data = mysqli_fetch_array($result)) {
    ?>

      <tr>
        <td><?php echo $No; ?></td>
        <td class="warning"><?php echo $data['tanggal']; ?></td>
        <td><?php echo $data['acara']; ?></td>
        <td><?php echo $data['lokasi']; ?></td>
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
      include '../../footer.php';
  ?>

    <script src="../../assets/js/jquery.js"></script>  
    <script src="../../assets/js/bootstrap.min.js"></script>

  </body>
</html>