<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://www.mdtasaharapadang.byethost6.com/mdtaadmin/login.php');
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
    <link href="../assets/font-awesome-4.6.3/css/font-awesome.css" rel="stylesheet">
    <link href="../assets/css/dataTables.bootstrap.min.css" rel="stylesheet">

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
  <legend>Data Tunggakan SPP</legend>
    <table class="table table-condensed table-bordered table-striped" id="table2">
      <thead>
      <tr>
        <th>No.</th>
        <th>BP</th>
        <th>Nama</th>
        <th>Lunas</th>
        <th>Tunggakan</th>
        <th>Proses</th>
      </tr>
      </thead>
    <tbody>
    
    <?php
        include '../lib/koneksi.php';
        $sql = "SELECT * FROM tb_siswa";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<td colspan='6'><span class='badge badge-pill badge-warning'>Belum ada data tunggakan</span></td>";
        } else {
          $No = 1;
          while ($data = mysqli_fetch_array($result)) {
    ?>

      <tr>
        <td><?php echo $No; ?></td>
        <td><?php echo $data['NIS']; ?></td>
        <td><?php echo $data['NamaSiswa']; ?></td>
        <?php
                $caridata="SELECT COUNT(nis) AS 'Lunas' FROM tb_tunggakan_siswa WHERE nis='$data[NIS]' AND Statust='Y'";
                $hcari = mysqli_query($conn, $caridata);
                $datac = mysqli_fetch_array($hcari);
                $lunas=$datac['Lunas'];
                $nunggak=12-$lunas;
                ?>
        <td> <?php
                if($lunas==0){
                    echo 'Belum ada Bayar';
                } else{
                    echo $lunas." Bulan";
                }
        
        ?> </td>
        <td> <?php echo $nunggak;?> Bulan</td>
        
        <td align="center">
        <a href="kirimpesan_spp.php?NIS=<?php echo $data['NIS'];?>"><button class="btn btn-primary"><span class="glyphicon glyphicon-envelope"></span> SMS</button>
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
      include '../footer.php';
  ?>
<script src="../assets/js/jquery.js"></script>  
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
      $(function() {
        $("#table").DataTable();
      });

    </script>    
    <script type="text/javascript">
      $(function() {
        $("#table2").DataTable();
      });

    </script>   
      
  </body>
</html>