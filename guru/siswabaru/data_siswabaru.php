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
   
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="../assets/css/navbar-static-top.css" rel="stylesheet">

    <!-- datatables -->
    <link href="../assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
  <?php
    include '../menu.php';
  ?>
  <div class="container">
  <div class="row col-sm-12 col-xs-12 col-md-10">
  <legend>Data Siswa Baru</legend>
  <div class="table-responsive">
  <table class="table table-condensed table-bordered" id="table">
      <thead>
      <tr>
        <th width='5'>No.</th>
        <th>BP</th>
        <th>Nama Siswa</th>
        <th>Jenis Kelamin</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Agama</th>
        <th>Alamat</th>
        <th>No HP Ortu</th>
        <th>Keterangan</th>
      </tr>
      </thead>
    <tbody>


    <?php
        include '../lib/koneksi.php';
        $sql = "SELECT * FROM tb_siswabaru where proses='N'";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<td colspan='11'><span class='badge badge-pill badge-success'>Data Tidak Ditemukan</span></td>";
        } else {
          $No = 1;
          while ($data = mysqli_fetch_array($result)) {
    ?>
        <tr>
        <td><?php echo $No; ?></td>
        <td><?php echo $data['NIS']; ?></td>
        <td><?php echo $data['NamaSiswa']; ?></td>
        <td><?php echo $data['JenisKelamin']; ?></td>
        <td><?php echo $data['TempatLahir']; ?></td>
        <td><?php echo $data['TanggalLahir']; ?></td>
        <td><?php echo $data['Agama']; ?></td>
        <td><?php echo $data['AlamatSiswa']; ?></td>
        <td><?php echo $data['NoHpOrtu']; ?></td>
        <td>
        <span class="badge badge-pill badge-secondary">Belum di Proses Admin</span>
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
  <br>
  
  <div class="row row col-sm-12 col-xs-12 col-md-10">
  <legend>Pendataran Siswa yang sudah diproses</legend>
  <div class="table-responsive">
  <table class="table table-condensed table-striped table-bordered">
      <thead>
      <tr>
        <th width='5'>No.</th>
        <th>BP</th>
        <th>Nama Siswa</th>
        <th>Jenis Kelamin</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Agama</th>
        <th>Alamat</th>
        <th>No HP Ortu</th>
      </tr>
      </thead>
    <tbody>


    <?php
        include '../lib/koneksi.php';
      
        $sql = "SELECT * FROM tb_siswabaru where proses='Y'";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<td colspan='11'><span class='badge badge-pill badge-success'>Data Tidak Ditemukan</span></td>";
        } else {
          $No = 1;
          while ($data = mysqli_fetch_array($result)) {
    ?>
        <tr>
        <td><?php echo $No; ?></td>
        <td><?php echo $data['NIS']; ?></td>
        <td><?php echo $data['NamaSiswa']; ?></td>
        <td><?php echo $data['JenisKelamin']; ?></td>
        <td><?php echo $data['TempatLahir']; ?></td>
        <td><?php echo $data['TanggalLahir']; ?></td>
        <td><?php echo $data['Agama']; ?></td>
        <td><?php echo $data['AlamatSiswa']; ?></td>
        <td><?php echo $data['NoHpOrtu']; ?></td>
        
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
    <script src="../assets/js/jquery.js"></script>  
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
      $(function() {
        $("#table").DataTable();
      });

    </script>
  </body>
  <?php
  include "../footer.php";
  ?>
</html>