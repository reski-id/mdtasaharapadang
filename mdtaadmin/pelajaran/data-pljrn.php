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

    <!-- Bootstrap -->
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
  <div class="row">
  <legend>Manajemen Data Mata Pelajaran</legend>
  <p><a href="../pelajaran/tambah-data-pljrn.php"><button type="button" class="btn btn-success">Tambah Data</button></a></p>
    <table class="table table-condensed table-bordered" id="table">
      <thead>
      <tr>
        <th>No.</th>
        <th>Kode Pelajaran</th>
        <th>Nama Mata Pelajaran</th>
        <th align="center">Aksi</th>
      </tr>
      </thead>
    <tbody>
    
    <?php
        include '../lib/koneksi.php';
        $sql = "SELECT * FROM tb_pelajaran";
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
        <td><?php echo $data['KodePljrn']; ?></td>
        <td><?php echo $data['NamaPljrn']; ?></td>
        <td align="center">
        <button type="button" class="btn btn-warning">
        <a href="ubah-data-pljrn.php?KodePljrn=<?php echo $data['KodePljrn'];?>">
        <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Ubah"></span>
        </a> </button>
        <button type="button" class="btn btn-danger">
        <a href="hapus-data-pljrn.php?KodePljrn=<?php echo $data['KodePljrn'];?>">
        <span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span>
        </a></button>
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