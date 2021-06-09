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
    <title>MDTA SAHARA PADANG</title>

    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="../assets/css/navbar-static-top.css" rel="stylesheet">
    
    <style>
    .modal-open {
      overflow: hidden;
      text-shadow: 0 0 0px black;
      background-color: #f5f5f5;
    }
    .modal-header {
      padding: 15px;
      border-bottom: 1px solid #e5e5e5;
    }
    .btn-goldblack {
      color: orange;
      background-color: #555;
      border-color: #a94442;
}
  .btn-magents {
      color: #fff;
      background-color: #a94442;
      border-color: #d9edf7;
    }
    .btn-magents:hover {
      color: #fff;
      background-color: #800f0d;
      border-color: #d9edf7;
    }
    .btn-gold {
      color: #ffd700;
      background-color: #514e3d;
      border-color: #ffd700;
}
    .btn-gold:hover {
      color: #171717;
      background-color: #d0b937;
      border-color: #353535;
}
  span.badge.badge-pill.badge-info {
     background-color: purple;
}
</style>
  </head>
  <body>
<?php
  include '../menu.php';
?>
  <div class="container">
  <div class="row">
  <div class="col-lg-10 col-md-8 col-sm-8 col-xs-8">
  <legend>Data Pelanggaran MDTA SAHARA PADANG</legend>
  <?php
      $idortu= $_SESSION['idortua'];
  ?>
    <table class="table table-condensed table-bordered table-striped table-responsive" id="tb_acara">
      <thead>
      <tr>
        <th>No.</th>
        <th>Tanggal</th>
        <th>BP</th>
        <th>Nama Siswa</th>
        <th>Pelanggaran</th>
        <th>Jenis Pelanggaran</th>
        <th>Status</th>
      </tr>
      </thead>
    <tbody>
    
    <?php
        include '../lib/koneksi.php';
        $sql = "SELECT * FROM tb_pelanggaran p JOIN tb_siswa s ON p.NIS=s.NIS WHERE p.proses='N' AND s.idorangtuas=$idortu";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<td colspan='6'><span class=badge badge-pill badge-danger>Selamat! Tidak ada Data Pelanggaran Anak di Database</span></td>";
        } else {
          $No = 1;
          while ($data = mysqli_fetch_array($result)) {
    ?>

      <tr>
        <td><?php echo $No; ?></td>
        <td><?php echo $data['tanggal']; ?></td>
        <td><?php echo $data['NIS']; ?></td>
        <td><?php echo $data['NamaSiswa']; ?></td>
        <td><?php echo $data['keterangan']; ?></td>
        <td><?php echo $data['jenispelanggara']; ?></td>
        <td>
        <button class="btn btn-gold" data-toggle="modal" data-target="#solusi">Belum Ada Solusi</button>
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


  <div class="container">
  <div class="row">
  <div class="col-lg-10 col-md-8 col-sm-8 col-xs-8">
  <legend>Pelanggaran yang sudah diproses</legend>
    <table class="table table-condensed table-bordered table-striped" id="tb_acara">
      <thead>
      <tr>
        <th>No.</th>
        <th>Tanggal</th>
        <th>BP</th>
        <th>Nama</th>
        <th>Pelanggaran</th>
        <th>Jenis Pelanggaran</th>
        <th>Solusi</th>
      </tr>
      </thead>
    <tbody>
    
    <?php
        include '../lib/koneksi.php';
        $sql = "SELECT * FROM tb_pelanggaran p JOIN tb_siswa s ON p.NIS=s.NIS WHERE p.proses='Y' AND s.idorangtuas=$idortu";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<td colspan='6'><span class=badge badge-pill badge-secondary>Data pelanggaran tidak ada</span></td>"; 
        } else {
          $No = 1;
          while ($data = mysqli_fetch_array($result)) {
    ?>

      <tr>
        <td><?php echo $No; ?></td>
        <td><?php echo $data['tanggal']; ?></td>
        <td><?php echo $data['NIS']; ?></td>
        <td><?php echo $data['NamaSiswa']; ?></td>
        <td><?php echo $data['keterangan']; ?></td>
        <td><?php echo $data['jenispelanggara']; ?></td>
        <td><?php echo $data['solusi']; ?></td>
        
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


  <!-- Modal -->
<div class="modal fade" id="solusi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header btn-goldblack">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><h3>Proses untuk menyelesaikan Pelanggaran : </h3>
      </div>
      <div class="modal-body">
      <ol>
      <li>Hubungi pihak MDTA Sahara Padang <span class="badge badge-pill badge-info">081268501104</span>  untuk mencarikan jadwal pertemuan</li>
      <li>Atur Jadwal pertemuan dengan pihak MDTA Sahara Padang</li>
      <li>Datang dengan anak (siswa) sesuai jadwal</li>
      <li>Carikan Solusi dengan Pihak MDTA</li>
      <li>Solusi Pelanggaran sangat berpengaruh terhadap Sikologi Perkembangan dan Pendidikan Anak</li>
      </div>
      <div class="modal-footer btn-fotter">
        <button type="button" class="btn btn-magents" data-dismiss="modal">OK</button>
      </div>
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