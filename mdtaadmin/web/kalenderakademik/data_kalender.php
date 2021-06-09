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
  <div class="col-lg-8">
  <legend>Data Jadwal Akademik</legend>
    <table class="table table-condensed table-bordered table-striped" id="tbJadwal Akademik">
      <thead>
      <tr>
        <th>No.</th>
        <th>Mulai</th>
        <th>Selesai</th>
        <th>Acara</th>
        <th align="center">Aksi</th>
      </tr>
      </thead>
    <tbody>
    
    <?php
        include '../../lib/koneksi.php';
        $sql = "SELECT * FROM tb_kalender_akademik";
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
        <td><?php echo $data['mulai']; ?></td>
        <td><?php echo $data['selesai']; ?></td>
        <td><?php echo $data['acara']; ?></td>
        <td align="center">
        <a href="ubah_data_kalender.php?id=<?php echo $data['id'];?>">
        <button class="btn btn-warning">
        <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Ubah"></span>
        </a></button>
        <button class="btn btn-danger">
        <a href="hapus_data_kalender.php?id=<?php echo $data['id'];?>">
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
    <a href="../../web/kalenderakademik/tambah_data_kalender.php"><button type="button" class="btn btn-success btn-block">Tambah Data</button></a>
    </td>
    </tbody>
    </table>
    </div>
    <script type="text/javascript">
      $(function() {
        $("#tbJadwal Akademik").DataTable();
      });

    </script>  
  </div>
  </div>
  
  <?php
      include '../../footer.php';
  ?>

    <script src="../../assets/js/jquery.js"></script>  
    <script src="../../assets/js/bootstrap.min.js"></script>

  </body>
</html>