<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/ortusiswa/login.php');
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
    .modal-open {
      overflow: hidden;
      text-shadow: 0 0 0px black;
      background-color: #f5f5f5;
      color: #984646;
      font-size: 17px;
    }
    .modal-header {
      padding: 15px;
      border-bottom: 1px solid #e5e5e5;
    }
    .btn-carapm {
      color: orange;
      background-color: #555;
      border-color: #a94442;
}
    .btn-fotter {
      color: #333;
      background-color: #ccc;
      border-color: #333;
      border-top: 0px solid #e5e5e5;
    }
  </style>
 
  <body>
<?php
  include '../menu.php';
?>
  <div class="container">
  <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <legend>Data Tunggakan MDTA SAHARA PADANG</legend>

  <?php
   $idortu= $_SESSION['idortua'];
  ?>
    <table class="table table-condensed table-bordered table-striped" id="tbtunggakan">
      <thead>
      <tr>
        <th>No.</th>
        <th>Tanggal</th>
        <th>NIS</th>
        <th>Nama Siswa</th>
        <th>Jumlah</th>
        <th>Keterangan</th>
        <th>Aksi</th>
      </tr>
      </thead>
    <tbody>
    
    <?php
        include '../lib/koneksi.php';
        $sql = "SELECT t.tanggal,t.idtunggakan,s.NIS,s.NamaSiswa,t.jumlah,t.kettungakan FROM tb_tunggakan t JOIN tb_siswa s ON t.NIS=s.NIS WHERE proses='N' AND s.idorangtuas='$idortu'";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<td colspan='7'><span class=badge badge-pill badge-info>Tidak ada data Tunggakan</span></td>";
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
        <button class="btn btn-danger" data-toggle="modal" data-target="#carabayar">Cara Pembayaran</button>
        </<button>
        <a href="formproses_tunggakan.php?idtunggakan=<?php echo $data['idtunggakan'];?>"><button class="btn btn-primary">Lakukan Pembayaran</button>
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
  <!-- Modal -->
<div class="modal fade" id="carabayar" tabindex="-1" role="dialog" aria-labelledby="carabayar">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header btn-carapm">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><h3>Cara Melakukan Pembayaran Tunggakan: </h3>
      </div>
      <div class="modal-body">
      <ol>
      <li>Lihat Jumlah Nominal, Keterangan Tunggakan</li>
      <li>Lakukan Pembayaran sejumlah nominal tunggakan ke Bank</li>
      <li>Nomor Rekening Bank (xxxxxxxxxx) atas nama MDTA SAHARA PADANG</li>
      <li>Photokan Bukti Transfer</li>
      <li>Melalui Form Tunggakan Klik tombol <button type="button" class="btn btn-primary btn-group-sm">Lakukan Pembayaran</button></li>
      <li>Pilih File Photo Bukti Transfer -> Upload</li>
      <li>Isikan Keterangan Tunggakan (optional)</li>
      <li>Klik Tombol <button type="button" class="btn btn-danger btn-group-sm">Proses</button></li>
      <li>Pembayaran Tunggakan Selesai</li>
      <li>Pembayaran tunggakan akan di validasi oleh Admin</li>
      </ol>
      </div>
      <div class="modal-footer btn-fotter">
        <button type="button" class="btn btn-carapm" data-dismiss="modal">Saya Mengerti</button>
      </div>
    </div>
  </div>
</div>


<div class="container">
  <div class="row">
  <div class="col-lg-12">
  <legend>Sedang di Proses</legend>
    <table class="table table-condensed table-bordered table-striped" id="tb_acara">
      <thead>
      <tr>
        <th>No.</th>
        <th>Tanggal</th>
        <th>NIS</th>
        <th>Nama Siswa</th>
        <th>Jumlah</th>
        <th>Keterangan</th>
      </tr>
      </thead>
    <tbody>
    
    <?php
        include '../lib/koneksi.php';
        $sql = "SELECT t.tanggal,s.NIS,s.NamaSiswa,t.jumlah,t.kettungakan FROM tb_tunggakan t JOIN tb_siswa s ON t.NIS=s.NIS WHERE proses='O' AND s.idorangtuas='$idortu'";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<td colspan='6'><span class=badge badge-pill badge-info>Tidak ada Pembayaran Tunggakan yang sedang di Proses</span></td>";
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
        <td><span class="badge badge-pill badge-danger">Mohon Menunggu, Pembayaran Tunggakan Anda sedang diproses Admin</span></td>
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
  <div class="col-lg-12">
  <legend>sudah di Proses</legend>
    <table class="table table-condensed table-bordered table-striped" id="tb_acara">
      <thead>
      <tr>
        <th>No.</th>
        <th>Tanggal</th>
        <th>BP</th>
        <th>Nama Siswa</th>
        <th>Jumlah</th>
        <th>Keterangan</th>
      </tr>
      </thead>
    <tbody>
    
    <?php
        include '../lib/koneksi.php';
        $sql = "SELECT t.tanggal,s.NIS,s.NamaSiswa,t.jumlah,t.kettungakan FROM tb_tunggakan t JOIN tb_siswa s ON t.NIS=s.NIS WHERE proses='Y' AND s.idorangtuas='$idortu'";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<td colspan='6'><span class=badge badge-pill badge-info>Tidak ada data Tunggakan</span></td>";
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
  </body>
</html>