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
  <h4 align="center"><b>Laporan Pelanggaran Siswa</b></h4>
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
        $nis = htmlentities(trim($_POST['nis']));
        
        $sql="SELECT * FROM tb_siswa WHERE NIS='$nis'";
        $result = mysqli_query($conn, $sql);
        $ds=mysqli_fetch_array($result);


  ?>
  <table class="table table-bordered table-condensed table-responsive table-striped" align="center">
	<tr>
		<td>BP</td>
		<td>:</td>
		<td><?php echo $nis; ?></td>
	</tr>
	<tr>
		<td>Nama Siswa</td>
		<td>:</td>
		<td><?php echo  $ds['NamaSiswa']; ?></td>
	</tr>
	<tr>
		<td>Kelas</td>
		<td>:</td>
    <td><?php
      $kelas="SELECT * FROM tb_siswa s INNER JOIN tb_kelas k WHERE s.NIS='$nis' AND s.KodeKls=k.KodeKls";
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
        <th>No</th>
        <th>Tanggal</th>
        <th>Keterangan</th>
        <th>Kategori</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>

    <?php
        $i = 1;

        $sql="SELECT *,DATE_FORMAT(tgl, '%d %M %Y, %k:%i:%s') AS 'tanggal' FROM vpelanggaranperbulan WHERE NIS='$nis'";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<td colspan='9'><span class=badge badge-pill badge-secondary>Data Tunggakan tidak ditemukan</span></td>"; 
        } else {
          $No = 1;
          while ($data = mysqli_fetch_array($result)) {
        ?>
        
        <tr>
        <td><?php echo $No; ?></td>
        <td><?php echo $data['tanggal']; ?></td>
        <td><?php echo $data['ket']; ?></td>
        <td><?php echo $data['jp']; ?></td>
        <td>
        <?php
        if($data['pros']=="Y"){
            echo "Sudah di Proses";
        } else{
            echo "Belum di Proses";
         }?>
        </td>
        </tr>
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

        <?php
        include '../footer.php';
        ?>

        <script src="../assets/js/jquery.js"></script>  
        <script src="../assets/js/bootstrap.min.js"></script>
        </body>
        </html>


       ?>