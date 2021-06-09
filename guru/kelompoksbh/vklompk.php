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
  <div class="row">
  <div class="col-lg-5">
  <legend>Data Kelompok Subuh</legend>
    <table class="table table-condensed table-bordered table-striped" id="tableklp">
      <thead>
      <tr>
        <th>No.</th>
        <th>Kode</th>
        <th>Kelompok</th>
        <th align="center">Aksi</th>
      </tr>
      </thead>
    <tbody>
    
    <?php
        include '../lib/koneksi.php';
        $sql = "SELECT * FROM klmpsubuh";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<td colspan=5 align=center>Data kosong. Silakan tambah data!</td>";
        } else {
          $No = 1;
          while ($data = mysqli_fetch_array($result)) {
    ?>

      <tr>
        <td><?php echo $No; ?></td>
        <td><?php echo $data['idklmpk']; ?></td>
        <td><?php echo $data['kelommpok']; ?></td>
        <td align="center">
        <a href="edit_kelompok.php?idklmpk=<?php echo $data['idklmpk'];?>">
        <button class="btn btn-warning">
        <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Ubah"></span>
        </a></button>
        <button class="btn btn-danger">
        <a href="hpskelompok.php?idklmpk=<?php echo $data['idklmpk'];?>">
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
    <table>
        <td colspan=4 align=center> 
      <a href="../kelompoksbh/klompk_tambah.php"><button type="button" class="btn btn-success btn-block">Tambah Data Kelompok</button></a>
      </td></table>
    </div>
</div>


    <script src="../assets/js/jquery.js"></script>  
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
      $(function() {
        $("#tableklp").DataTable();
      });

    </script>
  </body>
</html>