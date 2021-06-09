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
  <h4 align="center"><b>Laporan Tunggakan</b></h4>
  <div class="col-lg-3">
  

  </div>


  <div class="col-md-2 pull-right hidden-print">
  <button onclick="window.print();" class="btn btn-primary hidden-print ">
 <span class="glyphicon glyphicon-print"> Print</span> </button>
  </div>
  </div><p>
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
        <th>Tunggakan</th>
        <th>Keterangan</th>
      </tr>
    </thead>
    <tbody>

    <?php
        include '../lib/koneksi.php';
        $thn = htmlentities(trim($_POST['tahun']));
        $bln = htmlentities(trim($_POST['bulan']));
        $kate = htmlentities(trim($_POST['kate']));
        
        if($thn=="" && $bln=="" && $kate==""){
            echo "<script type='text/javascript'> alert('Silahkan Pilih minimal Salah satu tanggal/tahun/Jenis Tunggakan..'); window.location.href='laporantungakan_2.php';
            </script>"; 
        } elseif($bln=="" && $kate==""){ //bln dan kategori kosong
            $sql="SELECT *,DATE_FORMAT(tanggal, '%d %M %Y, %k:%i:%s') AS 'tanggal' FROM vtb_tunggakan WHERE tahun='$thn'";
        } elseif($thn=="" && $bln==""){ //thn dan bln kosong
            $sql="SELECT *,DATE_FORMAT(tanggal, '%d %M %Y, %k:%i:%s') AS 'tanggal' FROM vtb_tunggakan WHERE nama='$kate'";
          } elseif($thn=="" && $kate==""){ //thn dan kateg kosong
            $sql="SELECT *,DATE_FORMAT(tanggal, '%d %M %Y, %k:%i:%s') AS 'tanggal' FROM vtb_tunggakan WHERE bulan='$bln'";
        } elseif($kate==""){ //kategori kosong
            $sql="SELECT *,DATE_FORMAT(tanggal, '%d %M %Y, %k:%i:%s') AS 'tanggal' FROM vtb_tunggakan WHERE bulan='$bln' AND tahun='$thn'";
        } elseif($thn==""){ //tahun kosong
            $sql="SELECT *,DATE_FORMAT(tanggal, '%d %M %Y, %k:%i:%s') AS 'tanggal' FROM vtb_tunggakan WHERE bulan='$bln' AND nama='$kate'";
          } elseif($bln==""){ //bln kosong
            $sql="SELECT *,DATE_FORMAT(tanggal, '%d %M %Y, %k:%i:%s') AS 'tanggal' FROM vtb_tunggakan WHERE tahun='$thn' AND nama='$kate'";
        } else{ //tiga2  berisi
            $sql="SELECT *,DATE_FORMAT(tanggal, '%d %M %Y, %k:%i:%s') AS 'tanggal' FROM vtb_tunggakan WHERE bulan='$bln' AND tahun='$thn' AND nama='$kate'";
           
        }

        $result = mysqli_query($conn, $sql);
        $i = 1;
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<td colspan='7'><span class=badge badge-pill badge-secondary>Data Tunggakan tidak ditemukan</span></td>"; 
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
        <td>
        <?php
        if($data['proses']=="Y"){
            echo "Lunas";
        } else{
            echo "Belum Lunas";
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