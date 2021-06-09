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
  <div class="row col-sm-12 col-xs-12">
  <legend>Data Orang Tua</legend>
  <?php
  $idortu= $_SESSION['idortua'];

  $cekuser = mysqli_query($conn, "SELECT idortu FROM tb_ortu WHERE idortu='$idortu'");
  $jmluser = mysqli_num_rows($cekuser);
  $datauser = mysqli_fetch_array($cekuser);
  $idortu= $datauser[0];

  ?>
  <div class="table-responsive">
  <table class="table table-condensed table-bordered" id="table">
      <thead>
      <tr>
        <th width='5'>No.</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Tempat Lahir</th> 
        <th>Tanggal Lahir</th>
        <th>Pendidikan</th>
        <th>Agama</th>
        <th>Alamat</th>
        <th>No HP</th>
        <th align="center">Aksi</th>
      </tr>
      </thead>
    <tbody>


    <?php
        include '../lib/koneksi.php';
        
        $sql = "SELECT * FROM tb_ortu where idortu='$idortu'";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<td colspan='11'>Data kosong. Silakan tambah data!</td>";
        } else {
          $No = 1;
          while ($data = mysqli_fetch_array($result)) {
    ?>
        <tr>
        <td><?php echo $No; ?></td>
        <td><?php echo $data['Nama']; ?></td>
        <td><?php echo $data['JenisKelamin']; ?></td>
        <td><?php echo $data['TempatLahir']; ?></td>
        <td><?php echo $data['TanggalLahir']; ?></td>
        <td><?php echo $data['Pendidikan']; ?></td>
        <td><?php echo $data['Agama']; ?></td>
        <td><?php echo $data['Alamat']; ?></td>
        <td><?php echo $data['NoHp']; ?></td>
        <td align="center">
        <button type="button" class="btn btn-warning">
        <a href="ubah_dataortu.php?idortu=<?php echo $data['idortu'];?>">
        <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Ubah"></span>
        </a>
        </button>
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