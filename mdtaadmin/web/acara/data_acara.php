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
    
  </head>
  <body>
<?php
  include '../../menu.php';
?>
  <div class="container">
  <div class="row" align=center>
  <div class="col-lg-12">
  <legend>Data Jadwal Kegiatan MDTA SAHARA PADANG</legend>
    <table class="table table-condensed table-bordered table-striped" id="tb_acara">
      <thead>
      <tr>
        <th>No.</th>
        <th>Tanggal</th>
        <th>Acara</th>
        <th>Lokasi</th>
        <th align="center">Aksi</th>
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
          echo "<td colspan='5'>Data kosong. Silakan tambah data!</td>";
        } else {
          $No = 1;
          while ($data = mysqli_fetch_array($result)) {
    ?>

      <tr>
        <td><?php echo $No; ?></td>
        <td><?php echo $data['tanggal']; ?></td>
        <td><?php echo $data['acara']; ?></td>
        <td><?php echo $data['lokasi']; ?></td>
        <td align="center">
        <a href="ubah_data_acara.php?id=<?php echo $data['id'];?>">
        <button class="btn btn-warning">
        <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Ubah"></span>
        </a></button>
        <button class="btn btn-danger">
        <a href="hapus_data_acara.php?id=<?php echo $data['id'];?>">
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
    <td colspan=5 align=center> 
    <a href="../../web/acara/tambah_data_acara.php"><button type="button" class="btn btn-success btn-block">Tambah Data</button></a>
    </td>
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