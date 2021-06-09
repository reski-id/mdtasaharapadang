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
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="../../assets/css/navbar-static-top.css" rel="stylesheet">
    
     <!-- datatables -->
     <link href="../../assets/css/dataTables.bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
<?php
  include '../../menu.php';
?>
  <div class="container">
  <div class="row">
  <div class="col-sm-12 col-xs-12 col-md-12">
  <legend>Data Pengeluaran Dana MDTA SAHARA PADANG</legend>
    <table class="table table-condensed table-bordered table-striped" id="tbuangk">
      <thead>
      <tr>
        <th>No.</th>
        <th>Tanggal</th>
        <th>Jumlah</th>
        <th>Keterangan</th>
      </tr>
      </thead>
    <tbody>
    
    <?php
        include '../../lib/koneksi.php';
        $sql = "SELECT * FROM tb_uangkeluar order by tanggal desc";
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
        <td><?php echo "Rp " . number_format($data['jumlah'],2,',','.');?> </td>
        <td><?php echo $data['keterangan']; ?></td>
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
    <script src="../../assets/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
      $(function() {
        $("#tbuangk").DataTable();
      });

    </script>
  </body>
</html>