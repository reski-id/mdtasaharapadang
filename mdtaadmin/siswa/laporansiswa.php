<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
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
 
  <div class="input-group">
              <form method="post" action="">
            <label>Pilih Kelas</label>
            <select name="KodeKls" class="form-control" onchange="this.form.submit()">
            <option value="" selected="selected">Pilih Kelas</option>
                <?php
                  include '../lib/koneksi.php';
                  $sql = "SELECT * FROM tb_kelas";
                  $result = mysqli_query($conn, $sql);
                  while($data1=mysqli_fetch_array($result)){
                    echo "<option value=$data1[KodeKls]>$data1[NamaKls]</option>";
                  }
                ?>
            </select>
           <span class="input-group-btn">
    </span>
          </form>
            </div>
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


<!-- 
  data is hrtr
 -->
 <div id="container">
    <div class="row">
    <div class="col-lg-12">
    <p></p>
    <h4 align="center"><b>REKAP SISWA SAHARA PADANG</b></h4>
    </div>
    </div>
  </div>
    <table class="table table-bordered table-condensed table-responsive table-striped" id="export" align="center">
    <thead>
      <tr>
        <th>No</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Tempat, Tgl Lahir</th>
        <th>Alamat</th> 
        </tr>
    </thead>
    <tbody>
 <?php
        include '../lib/koneksi.php';
        if (isset($_POST['KodeKls']))
        $filt="WHERE KodeKls=".$_POST['KodeKls']."";
    else
      $filt=" ";
        $sql = "SELECT * FROM tb_siswa $filt";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {

        } else {
          $No = 1;
          while ($data = mysqli_fetch_array($result)) {
    ?>
        <tr>
        <td><?php echo $No; ?></td>
        <td><?php echo $data['NIS']; ?></td>
        <td><?php echo $data['NamaSiswa']; ?></td>
        <td><?php echo $data['JenisKelamin']; ?></td>
        <td><?php echo $data['TempatLahir'].", ".date('d F Y', strtotime($data['TanggalLahir'])); ?></td>
        <td><?php echo $data['AlamatSiswa']; ?></td>

        <?php  
        $No++;
        }
      }
    ?>
    </tbody>
    </table>

    <div class="col-md-3 pull-right" align="center"><p>Padang Pasir, <?php $tgl=date('d M Y'); echo $tgl; ?><br> Kepala Sekolah :<br><br><br> Mukhtar Ridwan, S.Ag<br></p>
    </div>

    </div>
    </div>
  </div>

    <script src="../assets/js/jquery.js"></script>  
    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>