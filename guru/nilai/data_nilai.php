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
  <div class="row col-sm-12 col-xs-12 col-md-10">
  <legend>Data Nilai MDTA Sahara Padang</legend>
  <p><a href="../nilai/tambah_datanilai.php"><button type="button" class="btn btn-warning">Tambah Data</button></a></p>
    <table class="table table-condensed table-bordered" id="table">
      <thead>
      <tr>
        <th>No.</th>
        <th>Nama Siswa</th>
        <th>Kelas</th>
        <th>Mata Pelajaran</th>
        <th>Nilai</th>
        <th align="center">Aksi</th>
      </tr>
      </thead>
    <tbody>
    
    <?php
        include '../lib/koneksi.php';
        $sql = "SELECT * FROM tb_nilai";
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
        <td><?php 
              $krj=mysqli_query($conn, "select * from tb_siswa where NIS='$data[NIS]'");
              while($a=mysqli_fetch_array($krj)){
                echo $a['NamaSiswa'];
              }
            ?></td>
        <td><?php 
              $krj=mysqli_query($conn, "select * from tb_siswa where NIS='$data[NIS]'");
              while($a=mysqli_fetch_array($krj)){
                echo $a['KodeKls'];
              }
            ?></td>
        <td><?php 
              $krj=mysqli_query($conn, "select * from tb_pelajaran where KodePljrn='$data[KodePljrn]'");
              while($a=mysqli_fetch_array($krj)){
                echo $a['NamaPljrn'];
              }
            ?></td>
        <td><?php echo $data['Nilai']; ?></td>
        <td align="center">
        <button type="button" class="btn btn-warning">
        <a href="ubah_datanilai.php?IdNilai=<?php echo $data['IdNilai'];?>">
        <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Ubah"></span>
        </a></button>
        <button type="button" class="btn btn-danger">
        <a href="hapus_datanilai.php?IdNilai=<?php echo $data['IdNilai'];?>">
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