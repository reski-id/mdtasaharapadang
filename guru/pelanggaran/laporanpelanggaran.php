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
    <link href="../assets/css/bootstrap1.min.css" rel="stylesheet">
    <link href="../assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="../assets/css/navbar-static-top.css" rel="stylesheet">
  </head>
  <style>
  .btn-latar {
    color: #333;
    background-color: #f5f5f5;
    border-color: #333;
}</style>
  <body>

<?php
  include "../menu.php";
?>

  
  <div class="container btn-latar">
 <div class="rows col-sm-12 col-xs-12 col-md-12">
  <form action="" method="POST" class="hidden-print">
    <div class="form-group hidden-print">
      <div class="input-group col-md-2">
      <div class="rows">
      </div>
        <label> </label>
        
      </div>
    </div>
    </form>
    
    <div class="row">
        <div class="col-lg-3">
    </div>

    <div class="col-md-2 pull-right hidden-print">
    <button onclick="window.print();" class="btn btn-primary hidden-print ">
 <span class="glyphicon glyphicon-print"> Print</span> </button>
    </div>

    <div class="row">
      <div class="">
          <div style="border-bottom:solid 2px" id="container">
          <div class="row">
          <h2 align="center"><b>MDTA SAHARA PADANG </h2></b>
          <p align="center">
          Jalan Padang Pasir No 30 Padang, Sumatera Barat</br>
          Telp. 05, Fax 22</br></p>
          </div>
          </div>


  <div id="container">
    <div class="row">
    <div class="col-sm-12 col-xs-12 col-md-12">
    <p></p>
    <h4 align="center"><b>REKAPITULASI PELANGGARAN MDTA SAHARA PADANG</b></h4>
    </div>
    </div>
  </div>
    <table class="table table-bordered table-condensed table-responsive table-striped" id="export" align="center">
    <thead>
      <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Jenis Pelanggaran</th>
        <th>Keterangan</th>
        <th>Proses</th>
      </tr>
    </thead>
    <tbody>
    <?php
        include '../lib/koneksi.php';
        $sql = "SELECT p.tanggal as tgl,s.NIS as nis,s.NamaSiswa as nama,p.jenispelanggara as jp,p.keterangan as ket,p.proses as pros FROM tb_pelanggaran p JOIN tb_siswa s ON p.NIS=s.NIS order by p.tanggal desc;
        ";
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
        <td><?php echo $data['tgl']; ?></td>
        <td><?php echo $data['nis']; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['jp']; ?></td>
        <td><?php echo $data['ket']; ?></td>
        <td><?php if($data['pros']=='Y'){
            echo "Sudah di Proses";
        } else{
            echo "Belum di Proses";
        }
        
        ?></td>
        <?php  
        $No++;
        }
      }
    ?>
    </tbody>
    </table>

    <div class="col-md-3 pull-right" align="center"><p>Padang Pasir, <?php $tgl=date('d M Y'); echo $tgl; ?><br> Kepala Sekolah :<br><br><br> Nama<br>NIP.1111111111</p>
    </div>

    </div>
    </div>
  </div>
  </div>

    <script src="../assets/js/jquery.js"></script>  
    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>