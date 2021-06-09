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
  <legend>Data Tunggakan MDTA SAHARA PADANG</legend>
    <table class="table table-condensed table-bordered table-striped" id="tbtunggakan">
      <thead>
      <tr>
        <th>No.</th>
        <th>Tanggal</th>
        <th>NIS</th>
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
        $sql = "SELECT t.idtunggakan,t.tanggal,s.NIS,s.NamaSiswa,t.jumlah,t.kettungakan,t.proses FROM tb_siswa s JOIN tb_tunggakan t ON s.NIS=t.NIS WHERE t.proses='N' OR t.proses='O' ORDER BY t.tanggal DESC";
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
        <td><?php echo $data['jumlah']; ?></td>
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
    <td colspan=8 align=center> 
    <a href="../tunggakan/tambah_data_tunggakan.php"><button type="button" class="btn btn-success btn-block">Tambah Data</button></a>
    </td>
    </tbody>
    </table>
    </div>
   
  </div>
  </div>
  <div class="container">
  <div class="row">
  <div class="col-lg-12">
  <legend>Data Tunggakan yang sudah di Proses</legend>
    <table class="table table-condensed table-bordered table-striped" id="tb_acara">
      <thead>
      <tr>
        <th>No.</th>
        <th>Tanggal</th>
        <th>NIS</th>
        <th>Jumlah</th>
        <th>Keterangan</th>
        <th>Pembayaran</th>
      </tr>
      </thead>
    <tbody>
    
    <?php
        include '../lib/koneksi.php';
        $sql = "SELECT * FROM tb_tunggakan where proses='Y' order by tanggal desc";
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
        <td><?php echo $data['jumlah']; ?></td>
        <td><?php echo $data['kettungakan']; ?></td>
        <td><?php echo $data['pembayaran']; ?></td>
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
  </body>
</html>