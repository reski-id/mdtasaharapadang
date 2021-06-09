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
  <?php 
        include '../lib/koneksi.php';
        $nis = htmlentities(trim($_GET['NIS']));

        $sql="SELECT *,DATE_FORMAT(tanggal, '%d %M %Y, %k:%i:%s') AS 'tanggal', DATE_FORMAT(tgl_jatuhtempo, '%d %M %Y, %k:%i:%s') AS 'tgl_jatuhtempo' FROM vtb_tunggakan WHERE NIS='$nis'";
        $result = mysqli_query($conn, $sql);
        $ds=mysqli_fetch_array($result);


  ?>
  <legend>Proses Tunggakan <?php echo $ds['NamaSiswa']." ".$nis; ?></legend>
  <table class="table table-condensed table-bordered" id="table">
      <thead>
      <tr>
        <th>No.</th>
        <th>Tanggal</th>
        <th>BP</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Keterangan</th>
        <th>Aksi</th>
        <th>Proses</th>
      </tr>
      </thead>
    <tbody>
    
    <?php
        include '../lib/koneksi.php';
        $sql = "SELECT t.idtunggakan,t.tanggal,s.NIS,s.NamaSiswa,t.jumlah,t.kettungakan,t.proses FROM tb_siswa s JOIN tb_tunggakan t ON s.NIS=t.NIS WHERE s.NIS='$nis' AND t.proses='N' OR t.proses='O' ORDER BY t.tanggal DESC";
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
        <td><?php echo $data['tanggal']; ?></td>
        <td><?php echo $data['NIS']; ?></td>
        <td><?php echo $data['NamaSiswa']; ?></td>
        <td><?php echo "Rp " . number_format($data['jumlah'],2,',','.');?> </td>
        <td><?php echo $data['kettungakan']; ?></td>
        <td align="center">
        <a href="ubah_data_tunggakan.php?idtunggakan=<?php echo $data['idtunggakan'];?>">
        <button class="btn btn-warning">
        <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Ubah"></span>
        </a></button>
        <button class="btn btn-danger">
        <a href="hapus_data_tunggakan.php?idtunggakan=<?php echo $data['idtunggakan'];?>">
        <span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span>
        </button>
        </a>
        </td>
        <td align="center">
        <a href="kirimpesan_tunggakan.php?idtunggakan=<?php echo $data['idtunggakan'];?>"><button class="btn btn-primary"><span class="glyphicon glyphicon-envelope"></span> SMS</button>
        </a>
        <?php
        if($data['proses']=='O'){
          echo "<a href='formproses_tunggakan.php?idtunggakan=$data[idtunggakan]'><button class='btn btn-warning btn-group-sm'>Validasi Pembayaran</button></a>";
        }
        elseif($data['proses']=='N'){
          echo "<a href='formproses_tunggakan.php?idtunggakan=$data[idtunggakan]'><button class='btn btn-primary btn-group-sm'>Menunggu Pembayaran</button></a>";
        }
        ?>
        
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
  <div class="container">
  <div class="row">
  <div class="col-lg-12">
  <legend>Data Tunggakan yang sudah di Proses</legend>
  <table class="table table-condensed table-bordered" id="table2">
      <thead>
      <tr>
        <th>No.</th>
        <th>Tanggal</th>
        <th>BP</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Keterangan</th>
      </tr>
      </thead>
    <tbody>
    
    <?php
        include '../lib/koneksi.php';
        $sql = "SELECT t.idtunggakan,t.tanggal,s.NIS,s.NamaSiswa,t.jumlah,t.kettungakan,t.proses FROM tb_siswa s JOIN tb_tunggakan t ON s.NIS=t.NIS WHERE s.NIS='$nis' AND t.proses='Y' ORDER BY t.tanggal DESC";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<td colspan='4'>Data kosong. Silakan tambah data!</td>";
        } else {
          $No = 1;
          while ($data = mysqli_fetch_array($result)) {
    ?>

      <tr>
        <td><?php echo $No; ?></td>
        <td><?php echo $data['tanggal']; ?></td>
        <td><?php echo $data['NIS']; ?></td>
        <td><?php echo $data['NamaSiswa']; ?></td>
        <td><?php echo "Rp " . number_format($data['jumlah'],2,',','.');?> </td>
        <td><?php echo $data['kettungakan']; ?></td>
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