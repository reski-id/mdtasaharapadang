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
  $KodeKls = isset($_POST['KodeKls'])? $_POST['KodeKls'] : '';
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
      <div class="col-lg-12">
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
    <div class="col-sm-12 col-xs-12 col-md-12 col-lg-9">
    <p></p>
    <h4 align="center"><b>REKAPITULASI TUNGGAKAN MDTA SAHARA PADANG</b></h4>
    </div>
    </div>
  </div>
    <table class="table table-bordered table-condensed table-responsive table-striped" id="export" align="center">
    <thead>
      <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>BP</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Keterangan</th>
        <th>Proses</th>
      </tr>
    </thead>
    <tbody>
    <?php
        include '../lib/koneksi.php';
        $sql = "SELECT s.NIS,s.NamaSiswa as Nama,t.tanggal,t.jumlah,t.kettungakan,t.proses FROM tb_tunggakan t JOIN tb_siswa s ON t.NIS=s.NIS WHERE t.proses='N' OR t.proses='O' order by t.tanggal desc;
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
        <td><?php echo $data['tanggal']; ?></td>
        <td><?php echo $data['NIS']; ?></td>
        <td><?php echo $data['Nama']; ?></td>
        <td><?php echo "Rp " . number_format($data['jumlah'],2,',','.');?> </td>
        <td><?php echo $data['kettungakan']; ?></td>
        <td><?php if($data['proses']=='O'){
            echo "Sedang di Proses";
        } else{
            echo "Belum di Bayarkan";
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
  </div></div>
 

    <script src="../assets/js/jquery.js"></script>  
    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>