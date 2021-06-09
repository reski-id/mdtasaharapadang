<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/guru/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>MDTA SAHARA PADANG</title>

    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="../assets/css/navbar-static-top.css" rel="stylesheet">

  </head>
  <style>

  </style>
 
  <body>
<?php
  include '../menu.php';
?>
  <div class="container">
  <div class="row">
  <div class="col-sm-12 col-xs-12 col-md-12">
  <legend>Data Tunggakan MDTA SAHARA PADANG</legend>
    <table class="table table-condensed table-bordered table-striped table-responsive" id="tbtunggakan">
      <thead>
      <tr>
        <th>No.</th>
        <th>Tanggal</th>
        <th>BP</th>
        <th>Jumlah</th>
        <th>Keterangan</th>
        <th>Aksi</th>
      </tr>
      </thead>
    <tbody>
    
    <?php
        include '../lib/koneksi.php';
        $sql = "SELECT * FROM tb_tunggakan where proses='N' order by tanggal desc";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<td colspan='5'>Data kosong. Silakan tambah data!</td>";
        } else {
          $No = 1;
          while ($data = mysqli_fetch_array($result)) {
    ?>

      <tr>
        <td><?php echo $No; ?></td>
        <td><?php echo $data['tanggal']; ?></td>
        <td><?php echo $data['NIS']; ?></td>
        <td><?php echo "Rp " . number_format($data['jumlah'],2,',','.');?> </td>
        <td><?php echo $data['kettungakan']; ?></td>
        <td align="center"><span class="badge badge-pill badge-warning">Belum di proses Admin</span>
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
  <div class="container">
  <div class="row">
  <div class="col-lg-12">
  <legend>Data Tunggakan yang sudah di Proses</legend>
    <table class="table table-condensed table-bordered table-striped" id="tb_acara">
      <thead>
      <tr>
        <th>No.</th>
        <th>Tanggal</th>
        <th>BP</th>
        <th>Jumlah</th>
        <th>Keterangan</th>
      </tr>
      </thead>
    <tbody>
    
    <?php
        include '../lib/koneksi.php';
        $sql = "SELECT * FROM tb_tunggakan where proses='Y' order by tanggal desc";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<td colspan='4'>Data kosong. Silakan tambah data!</td>";
        } else {
          $No = 1;
          while ($data = mysqli_fetch_array($result)) {
    ?>

      <tr>
        <td><?php echo $No; ?></td>
        <td><?php echo $data['tanggal']; ?></td>
        <td><?php echo $data['NIS']; ?></td>
        <td><?php echo "Rp " . number_format($data['jumlah'],2,',','.');?> </td>
        <td><?php echo $data['kettungakan']; ?></td>
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
  </body>
</html>