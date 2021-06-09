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
  $NIS = isset($_POST['NIS'])? $_POST['NIS'] : '';
?>


<?php
  $idortu= $_SESSION['idortua'];
  ?>

  
  <div class="container btn-latar">
 
  <form action="" method="POST" class="hidden-print">
    <div class="form-group hidden-print">
      <div class="input-group col-md-2">
      <div class="rows">
      </div>
        <label>Pilih Siswa</label>
        <select name="NIS" class="form-control" onchange="this.form>submit();">
        <option value="" selected="selected">Siswa</option>
        <?php
          include '../lib/koneksi.php';
          $sql = "SELECT * FROM tb_siswa where idorangtuas='$idortu'";
          $result = mysqli_query($conn, $sql);
          while($data=mysqli_fetch_array($result))
          {
            echo "<option value=$data[NIS]>$data[NamaSiswa]</option>";
          }
        ?>
        </select>
        
      </div>
    </div>
    </form>
    
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
        <?php
          $txtcari = isset($_POST['txtcari'])? $_POST['txtcari'] : '';
        ?>
        <form action="" method="post" name="FCari" id="FCari" class="hidden-print">
        <div class="input-group">
          <input name="txtcari" value="<?php echo $txtcari?>" type="text" class="form-control" placeholder="Masukkan NIS">
          <span class="input-group-btn">
            <button class="btn btn-primary" type="submit" value="Cari">Cari!</button>
          </span>
        </div>
        </form>
    </div>

    <div class="col-md-2 pull-right hidden-print">
    <button onclick="window.print();" class="btn btn-primary hidden-print ">
    <span class="glyphicon glyphicon-print"> Print</span> </button>
    </div>

    <div class="row">
      <div class="col-lg-12">
      <!-- <img src="../assets/img/mdtalogo.png"  align="left" heigh="10px" widht="10px" > -->
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
    <div class="col-lg-12">
    <p></p>
    <h4 align="center"><b>REKAPITULASI ABSEN SISWA</b></h4>
    </div>
    </div>
  </div>
    <table class="table table-bordered table-condensed table-responsive table-striped" id="export" align="center">
    <thead>
      <tr>
        <th>BP</th>
        <th>Nama</th>
        <th>Hadir</th>
        <th>Alfa</th>
        <th>Izin</th>
        <th>Sakit</th>
        <th>Cabut</th>
      </tr>
    </thead>
    <tbody>

    <?php
    include '../lib/koneksi.php';
    if(isset($_POST['txtcari']))
    {
      $myquery="SELECT NIS, NamaSiswa from tb_siswa where NIS='$txtcari' or NamaSiswa LIKE '%$txtcari%' AND idorangtuas='$idortu'";
    }
    else if(isset($_POST['NIS']))
    {     

      $myquery="select tb_siswa.NIS, tb_siswa.NamaSiswa from tb_siswa, tb_kelas where tb_siswa.KodeKls=tb_kelas.KodeKls AND tb_siswa.NIS=$NIS";
    }
    else
    {
      $myquery="select NIS, NamaSiswa from tb_siswa where idorangtuas='$idortu'";
    } 
    $daftarsiswa=mysqli_query($conn, $myquery) or die (mysql_error());
    while($dataku=mysqli_fetch_object($daftarsiswa))
    {
    ?>
          <tr>
          <td><?php echo  $dataku->NIS?></td>
          <td><?php echo  $dataku->NamaSiswa?></td>
          <td>
            <?php
              $sql = "SELECT COUNT(KetAbsen) AS KetAbsen FROM tb_absen WHERE NIS=$dataku->NIS AND KetAbsen='Hadir'";
              $query = mysqli_query($conn, $sql);
              $result = mysqli_fetch_object($query);
              echo $result->KetAbsen;
            ?>
          </td>
          <td>
            <?php
              $sql = "SELECT COUNT(KetAbsen) AS KetAbsen FROM tb_absen WHERE NIS=$dataku->NIS AND KetAbsen='Alfa'";
              $query = mysqli_query($conn, $sql);
              $result = mysqli_fetch_object($query);
              echo $result->KetAbsen;
            ?>
          </td>
          <td>
            <?php
              $sql = "SELECT COUNT(KetAbsen) AS KetAbsen FROM tb_absen WHERE NIS=$dataku->NIS AND KetAbsen='Izin'";
              $query = mysqli_query($conn, $sql);
              $result = mysqli_fetch_object($query);
              echo $result->KetAbsen;
            ?>
          </td>
          <td>
            <?php
              $sql = "SELECT COUNT(KetAbsen) AS KetAbsen FROM tb_absen WHERE NIS=$dataku->NIS AND KetAbsen='Sakit'";
              $query = mysqli_query($conn, $sql);
              $result = mysqli_fetch_object($query);
              echo $result->KetAbsen;
            ?>
          </td>
          <td><?php
              $sql = "SELECT COUNT(KetAbsen) AS KetAbsen FROM tb_absen WHERE NIS=$dataku->NIS AND KetAbsen='Cabut'";
              $query = mysqli_query($conn, $sql);
              $result = mysqli_fetch_object($query);
              echo $result->KetAbsen;
            ?></td>
          </tr>
    <?php
    }
    ?>
    </tbody>
    </table>
    
    </div>
    </div>
  </div>

    <script src="../assets/js/jquery.js"></script>  
    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>