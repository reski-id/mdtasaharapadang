<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
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
  <div class="col-lg-12">
  <legend>Data Pemasukan Dana MDTA SAHARA PADANG</legend>
  
  <p><a href="../../keuangan/uangmasuk/tambah_data_uangmasuk.php"><button type="button" class="btn btn-success">Tambah Data</button></a></p>
    <table class="table table-condensed table-bordered table-striped" id="tbuangm">
      <thead>
      <tr>
        <th>No.</th>
        <th>Tanggal</th>
        <th>Jumlah</th>
        <th>Keterangan</th>
        <th align="center">Aksi</th>
      </tr>
      </thead>
    <tbody>
    
    <?php
        include '../../lib/koneksi.php';
        $sql = "SELECT *,DATE_FORMAT(tgl, '%d %M %Y, %k:%i:%s') AS 'tanggal' FROM tb_kas WHERE jenis='Masuk' ORDER BY tgl DESC";
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
        <td align="center">
        <a href="ubah_data_uangmasuk.php?kode=<?php echo $data['kode'];?>">
        <button class="btn btn-warning">
        <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Ubah"></span>
        </a></button> ||
        <button class="btn btn-danger">
        <a href="hapus_data_uangmasuk.php?kode=<?php echo $data['kode'];?>">
        <span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span>
        </button>
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
      include '../../footer.php';
  ?>

    <script src="../../assets/js/jquery.js"></script>  
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
      $(function() {
        $("#tbuangm").DataTable();
      });

    </script>
  </body>
</html>