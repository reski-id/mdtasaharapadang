<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
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
  <div class="col-lg-12">
  <legend>Kategori Tunggakan</legend>
    <table class="table table-condensed table-bordered table-striped" id="tbtunggakan">
      <thead>
      <tr>
        <th>No.</th>
        <th>Tunggakan</th>
        <th>Jumlah</th>
        <th>Keterangan</th>
        <th>Aksi</th>
      </tr>
      </thead>
    <tbody>
    
    <?php
        include '../lib/koneksi.php';
        $sql = "select * from tb_tunggakankat";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<td colspan='5'><span class='badge badge-pill badge-warning'>Belum ada data Kategori tunggakan</span></td>";
        } else {
          $No = 1;
          while ($data = mysqli_fetch_array($result)) {
    ?>

      <tr>
        <td><?php echo $No; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo "Rp " . number_format($data['jumlah'],2,',','.');?> </td>
        <td><?php echo $data['keterangan']; ?></td>
        <td align="center">
        <a href="ubah_tunggakankat.php?idkategory=<?php echo $data['idkategory'];?>">
        <button class="btn btn-warning">
        <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Ubah"></span>
        </a></button>
        <button class="btn btn-danger">
        <a href="hapus_tunggakankat.php?idkategory=<?php echo $data['idkategory'];?>">
        <span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span>
        </button>
        </a>
      </tr>
       <?php  
        $No++;
        }
      }
    ?>
    <td colspan=2 align=center> 
    <a href="../tunggakankateg/tambah_tunggakankat.php"><button type="button" class="btn btn-success btn-block">Tambah Data Kategori</button></a>
    </td>
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