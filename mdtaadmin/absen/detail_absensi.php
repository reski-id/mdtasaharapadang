<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
  include '../lib/koneksi.php';
?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../assets/css/bootstrap1.min.css" rel="stylesheet">
    <link href="../assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="../assets/css/navbar-static-top.css" rel="stylesheet">
    <style>
  .btn-latar {
    color: #333;
    background-color: #f5f5f5;
    border-color: #333;
}</style>
  </head>
  <body>
<?php
  include "../menu.php";
?>
  <div class="container">
  <div class="row">
  <div class="col-lg-12">
  <img src="../assets/img/mdtalogo.png" width="100px" width="100px" align="left">
  <img src="../assets/img/tutwuri.png" align="right">
  <div style="border-bottom:solid 2px" id="container">
  <div class="row">
  <h2 align="center"><b>MDTA SAHARA PADANG</h2></b>
  <p align="center">
  ALAMAT SEKOLAH</p>
  </div>
  </div>
  <div id="container">
  <div class="row">
  <p></p>
  <h4 align="center"><b>DETAIL ABSENSI SISWA</b></h4>
  <div class="col-lg-3">
  <?php
    $txtcari = isset($_GET['txtcari'])? $_GET['txtcari'] : '0';
  ?>
  <form action="" method="get" name="FCari" id="FCari" class="hidden-print">
  <div class="input-group">
    <select name="txtcari" class="form-control">
      <option value="NULL">Pilih Siswa</option>
      <?php
        $sql = "SELECT * FROM tb_siswa";
        $result = mysqli_query($conn, $sql);
        while($data=mysqli_fetch_array($result)){
          echo "<option value=$data[NIS]>$data[NIS]"." => $data[NamaSiswa]</option>";
        }
      ?>
    </select>
    <span class="input-group-btn">
      <button class="btn btn-primary" type="submit" value="Cari">Cari!</button>
    </span>
  </div><!-- /input-group -->  
  </form>
  
  <?php
    $sql="SELECT * FROM tb_siswa  WHERE NIS=$txtcari";
    $result=mysqli_query($conn, $sql);
    $dataku=mysqli_fetch_array($result);

                          $KodeKls=$dataku['KodeKls'];
                     $result1 = mysqli_query($conn,"select * from tb_kelas where KodeKls='$KodeKls' ");
                      $row1 = mysqli_fetch_array($result1);
  ?>
  </div>

  <?php
    if(isset($_GET['txtcari'])){
  ?>

  <div class="col-md-2 pull-right hidden-print">
  <button onclick="window.print();" class="btn btn-primary hidden-print ">Print</button>
  <!--<a href="detail-absensi-export.php"> <button class="btn btn-success">Export</button></a>-->
  </div>
  </div><p>
  </div>
  </div>

  <table class="table table-bordered table-condensed" align="center">
  <thead>
      <tr>
        <th width='20'>BP</td><td width='30'><?php echo $dataku['NIS'] ?></th>        
      </tr>
      <tr>
        <th width='20'>Nama</td><td width='50'><?php echo $dataku['NamaSiswa'] ?></th>
      </tr>
        <tr>
        <th width='20'>Kelas</td><td width='30'><?php echo $row1['NamaKls'] ?></th>        
      </tr>
  </thead>
  </table>

    <table class="table table-bordered table-condensed" align="center" width="730">
      <thead>
      <tr>
        <th>No.</th>
        <th>Tanggal</th>
        <th>Keterangan</th>
      </tr>
      </thead>
    <tbody>
 <?php
 $nomor=1;
  $myquery="SELECT tb_absen.TglAbsen, tb_absen.KetAbsen FROM tb_siswa, tb_absen WHERE tb_siswa.NIS=tb_absen.NIS AND tb_absen.NIS=$txtcari";
  $daftarsiswa=mysqli_query($conn, $myquery) or die (mysql_error());
  while($dataku=mysqli_fetch_array($daftarsiswa))
  {
    echo "
      <tr>
        <td>$nomor</td>
        <td>$dataku[TglAbsen]</td>        
        <td>$dataku[KetAbsen]</td>        
       </tr>
    ";
    $nomor++;
  }
  ?>
      </tbody>
    </table>

<div class="col-md-3 pull-left" align="center">
    <p>Diketahui oleh:
    <br>Kepala Sekolah,</p>
    <p>  <br> </p>
    <p><u> Nama Kepala Sekolah</u><br>
    NIP</p>
   
    </div>

    <div class="col-md-3 pull-right" align="center">
    <p>Padang, <?php $tgl=date('d M Y'); echo $tgl; ?>
    <br>Wakill Kurikulum,</p>
    <p>  <br> </p>
    <p><u> Nama Guru</u><br>
    NIP. </p>
    </div>


    <?php
      }
    ?>
  </div>
  </div>
  </div>
  
    <script src="../assets/js/jquery.js"></script>  
    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>