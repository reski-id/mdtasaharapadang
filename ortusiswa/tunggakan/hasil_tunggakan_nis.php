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
    <!-- Bootstrap -->
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
  <div class="container btn-latar">
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
  <p></p>
  <h4 align="center"><b>Laporan Tunggakan Siswa</b></h4>
  <div class="col-lg-3">
  
    
  </div>


  <div class="col-md-2 pull-right hidden-print">
  <button onclick="window.print();" class="btn btn-primary hidden-print ">
 <span class="glyphicon glyphicon-print"> Print</span> </button>
  </div>
  </div><p>
  </div>
  </div>
  <?php 
        include '../lib/koneksi.php';
        $NIS = htmlentities(trim($_GET['NIS']));

        $sql="SELECT * FROM tb_tunggakan_siswa WHERE nis='$NIS'";
        $result = mysqli_query($conn, $sql);
        $ds=mysqli_fetch_array($result);


  ?>
  <table class="table table-bordered table-condensed table-responsive table-striped" align="center">
	<tr>
		<td>BP</td>
		<td>:</td>
		<td><?php echo $NIS; ?></td>
	</tr>
	<tr>
		<td>Nama Siswa</td>
		<td>:</td>
    <td><?php
      $nama="SELECT * FROM tb_siswa where nis=$NIS";
      $hnama = mysqli_query($conn, $nama);
      $dn=mysqli_fetch_array($hnama);
      echo $dn['NamaSiswa']

    ?></td>
	</tr>
	<tr>
		<td>Kelas</td>
		<td>:</td>
    <td><?php
      $kelas="SELECT * FROM tb_siswa s INNER JOIN tb_kelas k WHERE s.NIS='$NIS' AND s.KodeKls=k.KodeKls";
      $hkelas = mysqli_query($conn, $kelas);
      $dk=mysqli_fetch_array($hkelas);
      echo $dk['NamaKls']

    ?></td>
	</tr>
</table>
&nbsp;
  <table class="table table-bordered table-condensed table-responsive table-striped" id="export" align="center">
    <thead>
      <tr>
        <th>Bulan</th>
        <th>January</th>
        <th>February</th>
        <th>Maret</th>
        <th>April</th>
        <th>Mey</th>
        <th>Juni</th>
        <th>Juli</th>
        <th>Agustus</th>
        <th>September</th>
        <th>Oktober</th>
        <th>November</th>
        <th>Desember</th>
      </tr>
    </thead>
    <tbody>

    <?php
        $sql="SELECT * FROM tb_tunggakan_siswa where nis=$NIS";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<td colspan='9'><span class=badge badge-pill badge-secondary>Lakukan Pembayaran SPP terlebih Dahulu </span></td>"; 
        } else {
          $No = 1;
          $datas = mysqli_fetch_array($result);
        ?>
        
        <tr>
        <td><b>Status</b></td>
        <td>
        <?php
            $jan = "SELECT bulan FROM tb_tunggakan_siswa WHERE NIS='$NIS' AND bulan='January' AND tahun='2020' AND statust='Y'";
            $hjanu = mysqli_query($conn, $jan);
            $jjanu = mysqli_affected_rows($conn);
              if($jjanu>0){
                echo "Lunas";
              } else{
                echo "<a style=color:red; >Nunggak</a>";
              }?>
            </td>
        <td>
          <?php
            $feb = "SELECT bulan FROM tb_tunggakan_siswa WHERE NIS='$NIS' AND bulan='February' AND tahun='2020' AND statust='Y'";
            $hfeb = mysqli_query($conn, $feb);
            $jfeb = mysqli_affected_rows($conn);
              if($jfeb>0){
                echo "Lunas";
              } else{
                echo "<a style=color:red;>Nunggak</a>";
              }?>
          </td>
        <td>
        <?php
            $mar = "SELECT bulan FROM tb_tunggakan_siswa WHERE NIS='$NIS' AND bulan='Maret' AND tahun='2020' AND statust='Y'";
            $hmar = mysqli_query($conn, $mar);
            $jmar = mysqli_affected_rows($conn);
              if($jfeb>0){
                echo "Lunas";
              } else{
                echo "<a style=color:red;>Nunggak</a>";
              }?>
        </td>
        <td>
          <?php
            $apr = "SELECT bulan FROM tb_tunggakan_siswa WHERE NIS='$NIS' AND bulan='April' AND tahun='2020' AND statust='Y'";
            $hapr = mysqli_query($conn, $apr);
            $japr = mysqli_affected_rows($conn);
              if($japr>0){
                echo "Lunas";
              } else{
                echo "<a style=color:red; >Nunggak</a>";
              }?>
  </td>
  <td>
        <?php
          $mey = "SELECT bulan FROM tb_tunggakan_siswa WHERE NIS='$NIS' AND bulan='Mey' AND tahun='2020' AND statust='Y'";
          $hmey = mysqli_query($conn, $mey);
          $jmey = mysqli_affected_rows($conn);
            if($jmey>0){
              echo "Lunas";
            } else{
              echo "<a style=color:red;>Nunggak</a>";
            }?>
  </td>
  <td>
        <?php
          $jun = "SELECT bulan FROM tb_tunggakan_siswa WHERE NIS='$NIS' AND bulan='Juni' AND tahun='2020' AND statust='Y'";
          $hjun = mysqli_query($conn, $jun);
          $jjun = mysqli_affected_rows($conn);
            if($jjun>0){
              echo "Lunas";
            } else{
              echo "<a style=color:red;>Nunggak</a>";
            }?>
  </td>
  <td>
        <?php
          $jul = "SELECT bulan FROM tb_tunggakan_siswa WHERE NIS='$NIS' AND bulan='Juli' AND tahun='2020' AND statust='Y'";
          $hjul = mysqli_query($conn, $jul);
          $jjul = mysqli_affected_rows($conn);
            if($jjul>0){
              echo "Lunas";
            } else{
              echo "<a style=color:red;'>Nunggak</a>";
            }?>
  </td>
  <td>
          <?php
            $agu = "SELECT bulan FROM tb_tunggakan_siswa WHERE NIS='$NIS' AND bulan='Agustus' AND tahun='2020' AND statust='Y'";
            $hagu = mysqli_query($conn, $agu);
            $jagu = mysqli_affected_rows($conn);
              if($jagu>0){
                echo "Lunas";
              } else{
                echo "<a style=color:red;>Nunggak</a>";
              }?>
  </td>
  <td>
          <?php
            $sep = "SELECT bulan FROM tb_tunggakan_siswa WHERE NIS='$NIS' AND bulan='September' AND tahun='2020' AND statust='Y'";
            $hsep = mysqli_query($conn, $sep);
            $jsep = mysqli_affected_rows($conn);
              if($jsep>0){
                echo "Lunas";
              } else{
                echo "<a style=color:red;>Nunggak</a>";
              }?>
  </td>
  <td>
  <?php
          $okt = "SELECT bulan FROM tb_tunggakan_siswa WHERE NIS='$NIS' AND bulan='Oktober' AND tahun='2020' AND statust='Y'";
          $hokt = mysqli_query($conn, $okt);
          $jokt = mysqli_affected_rows($conn);
            if($jokt>0){
              echo "Lunas";
            } else{
              echo "<a style=color:red;>Nunggak</a>";
            }?>
  </td>
  <td>
        <?php
          $nov = "SELECT bulan FROM tb_tunggakan_siswa WHERE NIS='$NIS' AND bulan='November' AND tahun='2020' AND statust='Y'";
          $hnov = mysqli_query($conn, $nov);
          $jnov = mysqli_affected_rows($conn);
            if($jnov>0){
              echo "Lunas";
            } else{
              echo "<a style=color:red;>Nunggak</a>";
            }?>
  </td>
  <td>
  <?php
     $des = "SELECT bulan FROM tb_tunggakan_siswa WHERE NIS='$NIS' AND bulan='Desember' AND tahun='2020' AND statust='Y'";
     $hdes = mysqli_query($conn, $des);
     $jdes = mysqli_affected_rows($conn);
      if($jdes>0){
        echo "Lunas";
      } else{
        echo "<a style=color:red;>Nunggak</a>";
      }?>
  </td>
  </tr>
  <?php  
 
      }
  ?>
<tr>
  <td colspan=3>Lunas</td>
  <td colspan=10>
  <?php
     $jumls = "SELECT SUM(statust) AS 'jml' FROM tb_tunggakan_siswa WHERE NIS='$NIS' AND statust='Y'";
     $hss = mysqli_query($conn, $jumls);
     $hsj=mysqli_fetch_array($hss);
     $jml=$hsj['jml'];
     if($jml==0){
      echo "Data belum diisi";
    } else{
      echo $jml." Bulan";
    }?>
  </td>
</tr>
<tr>
  <td colspan=3>Belum Lunas</td>
  <td colspan=10><?php
  $tunggakan=12-$jml;
  if($tunggakan==0){
    echo "Tidak ada tunggakan";
  } else{
    echo 12-$jml ." Bulan"; 
  }?>
   </td>
</tr>
  </tbody>
  </table>

<!-- aaaaaaaaaaaaaaaa -->
&nbsp;
  <table class="table table-bordered table-condensed table-responsive table-striped" id="export" align="center">
    <thead>
      <tr>
        <th>No</th>
        <th>Bulan</th>
        <th>Tanggal Bayar</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>

    <?php
        $sql="SELECT *,DATE_FORMAT(tgl_bayar, '%d %M %Y, %k:%i:%s') AS 'tanggal' FROM tb_tunggakan_siswa where nis=$NIS";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<td colspan='9'><span class=badge badge-pill badge-secondary>Lakukan Pembayaran SPP terlebih Dahulu </span></td>"; 
        } else {
          $No = 1;
          while($datas = mysqli_fetch_array($result)){
        ?>
        
        <tr>
        <td><?php echo $No;?></td>
        <td><?php echo $datas['bulan'];?> </td>
        <td><?php echo $datas['tanggal'];?> </td>
        <td><?php
            if($datas['statust']=="Y"){
              echo "Lunas";
            } else{
              echo "Nunggak";
            }?>
  </tr>
  <?php  
      $No++;
      }
    }
  ?>

  </tbody>
  </table>






<!-- aaaaaaaaaaaaaaaaaa -->
<div class="col-md-3 pull-right" align="center"><p>Padang Pasir, <?php $tgl=date('d M Y'); echo $tgl; ?><br> Kepala Sekolah :<br><br><br> Mukhtar Ridwan, S.Ag<br></p>
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


       ?>