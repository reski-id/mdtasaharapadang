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
  <h4 align="center"><b>NILAI SISWA</b></h4>
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
  </div>
  </form>
  
  <?php
    $sql="SELECT * FROM tb_siswa WHERE NIS=$txtcari";
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
  <button onclick="window.print();" class="btn btn-primary hidden-print ">
 <span class="glyphicon glyphicon-print"> Print</span> </button>
  </div>
  </div><p>
  </div>
  </div>

  <table class="table table-bordered table-condensed" align="center">
  <thead>
      <tr>
        <td rowspan="3" align='center' width='20'><img src="" width="40" height="40" align="center"></td>
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
        <th>Mata Pelajaran</th>
        <th>Nilai</th>
      </tr>
      </thead>
    <tbody>
 <?php
 $nomor=1;
  $myquery="SELECT tb_nilai.KodePljrn, tb_nilai.Nilai FROM tb_siswa, tb_nilai WHERE tb_siswa.NIS=tb_nilai.NIS AND tb_nilai.NIS=$txtcari";
  $daftarsiswa=mysqli_query($conn, $myquery) or die (mysql_error());
  while($dataku=mysqli_fetch_array($daftarsiswa))
  { ?>
      <tr>
        <td><?php echo $nomor ?></td>
        <td><?php
                  $sql = "SELECT * FROM tb_pelajaran WHERE KodePljrn = '$dataku[KodePljrn]'";
                  $result = mysqli_query($conn, $sql);
                  while($data=mysqli_fetch_array($result)){
                    echo "$data[NamaPljrn]";
                  }
          ?></td>        
        <td><?php echo $dataku['Nilai']; ?></td>
       </tr>
    <?php $nomor++;
  }
  ?>
      </tbody>
    </table>

    <div class="col-md-3 pull-right" align="center"><p>Padang Pasir, <?php $tgl=date('d M Y'); echo $tgl; ?><br> Kepala Sekolah :<br><br><br> Mukhtar Ridwan, S.Ag<br></p>
    </div>
    <?php
      }
    ?>

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
