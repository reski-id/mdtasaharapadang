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
    <title>MDTA SAHARA PADANG</title>

    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="../assets/css/navbar-static-top.css" rel="stylesheet">
    <link href="../assets/font-awesome-4.6.3/css/font-awesome.css" rel="stylesheet">
    <link href="../assets/css/dataTables.bootstrap.min.css" rel="stylesheet">

    
  </head>
  <body>
<?php
  include '../menu.php';
?>
<div class="container">
  <div class="row">
  <div class="col-lg-12">
  <?php 
     include '../lib/koneksi.php';
    $pela_absen = "SELECT COUNT(DISTINCT(NIS)) AS 'Jml' FROM jml_cabutalfa";
    $hpa = mysqli_query($conn, $pela_absen);
    $pelanggabse = mysqli_fetch_array($hpa);
    $pla="<span class=\"badge badge-light\">$pelanggabse[0]</span>";
   ?>


  <legend>Pelanggaran Absensi Bulan ini
  <?php  if($pelanggabse>0){
    echo $pla;
    }else{
    $pla=" ";
    }?>
    </legend>
    <table class="table table-condensed table-bordered" id="table">
      <thead>
      <tr>
        <th>BP</th>
        <th>Nama</th>
        <th>Cabut</th>
        <th>Alfa</th>
        <th align="center">Proses</th>
      </tr>
      </thead>
    <tbody>
    
    <?php
        include '../lib/koneksi.php';
        //cari data dari t siswa
        $sql = "SELECT NIS, NamaSiswa FROM tb_siswa";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($result);

        //munculkan table
        if ($rows == 0) {
          echo "<td colspan='8'><span class=badge badge-pill badge-secondary>Data pelanggaran tidak ada</span></td>"; 
        } else {
        
          while ($data = mysqli_fetch_array($result)) {

            $Cabut = "SELECT COUNT(KetAbsen) AS Cabut FROM jml_cabutalfa  WHERE NIS=$data[NIS] AND KetAbsen='Cabut'";
            $queryc = mysqli_query($conn, $Cabut);
            $resultc = mysqli_fetch_array($queryc);

            $Alpa = "SELECT COUNT(KetAbsen) AS Alpa FROM jml_cabutalfa WHERE  NIS=$data[NIS] AND KetAbsen='Alfa'";
            $querya = mysqli_query($conn, $Alpa);
            $resulta = mysqli_fetch_array($querya);
            $No = 1;
            if($resultc['Cabut']>=1 || $resulta['Alpa']>=1){
            
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
              <td align="center">
              <?php
                  $ket="pelanggaran absensi jumlah Alpa:$resulta[Alpa] dan Cabut:$resultc[Cabut]";
                  $cekdata = "SELECT * FROM tb_pelanggaran WHERE NIS='$data[NIS]' AND keterangan='$ket'";
                  $hasil = mysqli_query($conn, $cekdata);
                  $jumlah = mysqli_affected_rows($conn);
                  if($jumlah==0){
                      ?>
                       <a href="addpelanggabsen.php?NIS=<?php echo $data['NIS'];?>"><button class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span></button>
              </a><?php
                  } else{
                    ?>
                     <a><button class="btn btn-danger"><span class="glyphicon glyphicon-ban-circle"></span></button><?php
                  }?>  
        </td>
              </tr>

              <?php 
            }
            else{
              //DO NOTHING
            }
            
            ?>
          
          
       <?php  
     
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
  <?php 
    include '../lib/koneksi.php';
    $pelang = "SELECT * FROM tb_pelanggaran WHERE proses='N'";
    $hastung = mysqli_query($conn, $pelang);
    $peljum = mysqli_num_rows($hastung);
    $mpelanggaran="<span class=\"badge badge-light\">$peljum</span>";
    ?>

  <legend>Data Pelanggaran MDTA SAHARA PADANG <span class="badge badge-pill badge-primary"><?php if($peljum>0){
    echo $mpelanggaran;
    }else{
    $mpelanggaran=" ";
    }?></span></legend>
      <table class="table table-condensed table-bordered" id="table2">
      <thead>
      <tr>
        <th>No.</th>
        <th>Tanggal / Jam</th>
        <th>BP</th>
        <th>Nama</th>
        <th>Pelanggaran</th>
        <th>Jenis Pelanggaran</th>
        <th>Aksi</th>
        <th align="center">Proses</th>
      </tr>
      </thead>
    <tbody>
    
    <?php
        include '../lib/koneksi.php';
        $sql = "SELECT p.idpelanggaran, p.tanggal,s.NIS,s.NamaSiswa,p.jenispelanggara,p.keterangan,p.proses FROM tb_pelanggaran p JOIN tb_siswa s ON p.NIS=s.NIS
        where proses='N' order by p.tanggal desc";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<td colspan='6'><span class=badge badge-pill badge-secondary>Data pelanggaran tidak ada</span></td>"; 
        } else {
          $No = 1;
          while ($data = mysqli_fetch_array($result)) {
    ?>

      <tr>
        <td><?php echo $No; ?></td>
        <td><?php echo $data['tanggal']; ?></td>
        <td><?php echo $data['NIS']; ?></td>
        <td><?php echo $data['NamaSiswa']; ?></td>
        <td><?php echo $data['keterangan']; ?></td>
        <td><?php echo $data['jenispelanggara']; ?></td>
        <td align="center">
        <a href="ubah_data_pelanggaran.php?idpelanggaran=<?php echo $data['idpelanggaran'];?>">
        <button class="btn btn-warning">
        <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Ubah"></span>
        </a></button> 
        <button class="btn btn-danger">
        <a href="hapus_data_pelanggaran.php?idpelanggaran=<?php echo $data['idpelanggaran'];?>">
        <span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span>
        </button>
        </a>
        </td>
        <td align="center">
        <a href="kirimpesan_pelanggaran.php?idpelanggaran=<?php echo $data['idpelanggaran'];?>"><button class="btn btn-primary"><span class="glyphicon glyphicon-envelope"></span> SMS</button>
        </a>
        <a href="formproses_pelanggaran.php?idpelanggaran=<?php echo $data['idpelanggaran'];?>"><button class="btn btn-danger">Proses</button>
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


  <div class="container">
  <div class="row">
  <div class="col-lg-12">
  <?php 
    include '../lib/koneksi.php';
    $pelang2 = "SELECT * FROM tb_pelanggaran WHERE proses='Y'";
    $hastung2 = mysqli_query($conn, $pelang2);
    $peljum2 = mysqli_num_rows($hastung2);
    $mpelanggaran2="<span class=\"badge badge-light\">$peljum2</span>";
    ?>
  <legend>Pelanggaran yang sudah diproses</legend>
  <table class="table table-condensed table-bordered" id="table3">
      <thead>
      <tr>
        <th>No.</th>
        <th>Tanggal / Jam</th>
        <th>BP</th>
        <th>Pelanggaran</th>
        <th>Jenis Pelanggaran</th>
        <th>Solusi</th>
      </tr>
      </thead>
    <tbody>
    
    <?php
        include '../lib/koneksi.php';
        $sql = "SELECT * FROM tb_pelanggaran where proses='Y' order by tanggal desc";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<td colspan='8'><span class=badge badge-pill badge-secondary>Data pelanggaran tidak ada</span></td>"; 
        } else {
          $No = 1;
          while ($data = mysqli_fetch_array($result)) {
    ?>

      <tr>
        <td><?php echo $No; ?></td>
        <td><?php echo $data['tanggal']; ?></td>
        <td><?php echo $data['NIS']; ?></td>
        <td><?php echo $data['keterangan']; ?></td>
        <td><?php echo $data['jenispelanggara']; ?></td>
        <td><?php echo $data['solusi']; ?></td>
        
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
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
      $(function() {
        $("#table").DataTable();
      });

    </script>    
    <script type="text/javascript">
      $(function() {
        $("#table2").DataTable();
      });

    </script>   
    <script type="text/javascript">
      $(function() {
        $("#table3").DataTable();
      });

    </script>    
  </body>
</html>