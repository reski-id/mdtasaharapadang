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
  <h4 align="center"><b>Pelanggaran Absen Subuh</b></h4>
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
        <th>BP</th>
        <th>Nama</th>
        <th>Cabut</th>
        <th>Alfa</th>
        <th>Sakit</th>
        <th>Izin</th>
        <th>Hadir</th>
      </tr>
      </thead>
    <tbody>

    <?php
        include '../lib/koneksi.php';
        $thn = htmlentities(trim($_POST['tahun']));
        $bln = htmlentities(trim($_POST['bulan']));

        //cari data dari t siswa
        $sql = "SELECT NIS, NamaSiswa FROM tb_siswa";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($result);

        //munculkan table
        if ($rows == 0) {
          echo "<td colspan='8'><span class=badge badge-pill badge-secondary>Data Siswa Belum ada</span></td>"; 
        } else {
        
          while ($data = mysqli_fetch_array($result)) {
            
            //if
            if($thn=="kosong" && $bln=="kosong"){
              echo "<script type='text/javascript'> alert('Silahkan Pilih minimal Salah satu tanggal dan tahun..'); window.location.href='laporanabsensbh_cari.php';
              </script>"; 
          } elseif($bln=="kosong"){
              $Cabut = "SELECT COUNT(KetAbsen) AS Cabut FROM vwabsen_subuh  WHERE NIS=$data[NIS] AND KetAbsen='Cabut' AND Thn='$thn'";
              
              $Sakit = "SELECT COUNT(KetAbsen) AS Sakit FROM vwabsen_subuh  WHERE NIS=$data[NIS] AND KetAbsen='Sakit' AND Thn='$thn'";
              
              $Alpa = "SELECT COUNT(KetAbsen) AS Alpa FROM vwabsen_subuh  WHERE NIS=$data[NIS] AND KetAbsen='Alpa' AND Thn='$thn'"; 
              
              $Hadir = "SELECT COUNT(KetAbsen) AS Hadir FROM vwabsen_subuh  WHERE NIS=$data[NIS] AND KetAbsen='Hadir' AND Thn='$thn'"; 

              $Izin = "SELECT COUNT(KetAbsen) AS Izin FROM vwabsen_subuh  WHERE NIS=$data[NIS] AND KetAbsen='Izin' AND Thn='$thn'"; 
  
          }elseif($thn=="kosong"){
            $Cabut = "SELECT COUNT(KetAbsen) AS Cabut FROM vwabsen_subuh  WHERE NIS=$data[NIS] AND KetAbsen='Cabut' AND Bln='$bln'";

            $Sakit = "SELECT COUNT(KetAbsen) AS Sakit FROM vwabsen_subuh  WHERE NIS=$data[NIS] AND KetAbsen='Sakit' AND Bln='$bln'";

            $Alpa = "SELECT COUNT(KetAbsen) AS Alpa FROM vwabsen_subuh  WHERE NIS=$data[NIS] AND KetAbsen='Alpa' AND Bln='$bln'";

            $Hadir = "SELECT COUNT(KetAbsen) AS Hadir FROM vwabsen_subuh  WHERE NIS=$data[NIS] AND KetAbsen='Hadir' AND Bln='$bln'";

            $Izin = "SELECT COUNT(KetAbsen) AS Izin FROM vwabsen_subuh  WHERE NIS=$data[NIS] AND KetAbsen='Izin' AND Bln='$bln'";
            
          } else{
            $Cabut = "SELECT COUNT(KetAbsen) AS Cabut FROM vwabsen_subuh  WHERE NIS=$data[NIS] AND KetAbsen='Cabut' AND Bln='$bln' AND Thn='$thn'";

            $Sakit = "SELECT COUNT(KetAbsen) AS Sakit FROM vwabsen_subuh  WHERE NIS=$data[NIS] AND KetAbsen='Sakit' AND Bln='$bln' AND Thn='$thn'";

            $Alpa = "SELECT COUNT(KetAbsen) AS Alpa FROM vwabsen_subuh WHERE KetAbsen='Alpa' AND NIS=$data[NIS] AND Bln='$bln' AND Thn='$thn'";
            
            $Hadir = "SELECT COUNT(KetAbsen) AS Hadir FROM vwabsen_subuh  WHERE NIS=$data[NIS] AND KetAbsen='Hadir' AND Bln='$bln' AND Thn='$thn'";

            $Izin = "SELECT COUNT(KetAbsen) AS Izin FROM vwabsen_subuh WHERE KetAbsen='Alpa' AND NIS=$data[NIS] AND Bln='$bln' AND Thn='$thn'";
          }
  
            //cabut
            $queryc = mysqli_query($conn, $Cabut);
            $resultc = mysqli_fetch_array($queryc);
    
            //alpa
            $querya = mysqli_query($conn, $Alpa);
            $resulta = mysqli_fetch_array($querya);

            //Sakit
            $querys = mysqli_query($conn, $Sakit);
            $results = mysqli_fetch_array($querys);

            //Hadir
            $queryh = mysqli_query($conn, $Hadir);
            $resulth = mysqli_fetch_array($queryh);

            //Izin
            $queryi = mysqli_query($conn, $Izin);
            $resulti = mysqli_fetch_array($queryi);

          if($resultc['Cabut']>=1 || $resulta['Alpa']>=1 || $results['Sakit']>=1 || $resulti['Izin']>=1){
            ?>
            <tr>
            <td><?php echo $data['NIS']; ?></td>
            <td><?php
              $carinama="SELECT NamaSiswa FROM tb_siswa WHERE NIS=".$data['NIS'];
              $nama = mysqli_query($conn, $carinama);
              $hnama = mysqli_fetch_array($nama);
              echo $hnama['NamaSiswa']; ?></td>
            <td><?php echo $resultc['Cabut']; ?></td>
            <td><?php echo $resulta['Alpa']; ?></td>
            <td><?php echo $results['Sakit']; ?></td>
            <td><?php echo $resulti['Izin']; ?></td>
            <td><?php echo $resulth['Hadir']; ?></td>
            </tr>
            <?php 
          } else{
          }
          
        ?>
      <?php  
    
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
