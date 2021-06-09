<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/guru/login.php');
}
?>

<?php
include '../lib/koneksi.php';

if (isset($_POST['keterangan_absen'])) {
  $nis = $_POST['NIS'];
  $tgl_absen = $_POST['tgl_absen'];
  $keterangan_absen = $_POST['keterangan_absen'];

  $sql = "SELECT * FROM tb_absensubuh WHERE NIS = $nis AND TglAbsen='$tgl_absen'";
  $query = mysqli_query($conn, $sql);
  $row = mysqli_num_rows($query);
  if($row == 0)
  {
    $sql = "INSERT INTO tb_absensubuh (NIS, TglAbsen, KetAbsen) VALUES($nis,'$tgl_absen','$keterangan_absen')";
    mysqli_query($conn, $sql);
  }
  else
  {
    $sql = "UPDATE tb_absensubuh SET KetAbsen='$keterangan_absen' WHERE NIS=$nis AND TglAbsen ='$tgl_absen'";
    mysqli_query($conn, $sql);
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/navbar-static-top.css" rel="stylesheet">
  </head>
  <body> 
  <?php
    include "../menu.php";
  ?>
  <div class="container">
  <div class="row col-sm-12 col-xs-12 col-md-10">
  <legend>Halaman Absensi</legend>
  <div class="form-group">
  <div class="input-group col-md-2">
  <form action="" method="post">
    <label> Pilih Kelompok</label>
    <select name="idklmpk" class="form-control" onchange="this.form.submit();">
      <option value="">Kelompok</option>
        <?php
          if(isset($_POST['idklmpk']))
          {
            $idklmpk = $_POST['idklmpk'];
          }
          else
          {
            $idklmpk = "";
          }
          $sql = "SELECT * FROM klmpsubuh";
          $result = mysqli_query($conn, $sql);
          while($data=mysqli_fetch_array($result)){
            if($idklmpk == $data['idklmpk'])
              {
                $select = "selected";
              }
              else
              {
                $select = "";
              }

            echo "<option $select value=$data[idklmpk]>$data[kelommpok]</option>";
          }
        ?>
      </select>
  </div>
  </div>
  <div class="form-group">
  <div class="input-group col-md-2">
    <label>Pilih Tanggal</label>
      <?php
         $tgl = isset($_POST['tgl_absen']) ? $_POST['tgl_absen'] : date('Y-m-d');
      ?>
    <input type="date" class=" form-control dtp_input2" name="tgl_absen" value="<?php echo $tgl ?>" onchange="this.form.submit();">
  </div>          
  </div>
  </form>
  <div class="table-responsive table-striped ">
  <table class="table table-bordered table-striped table-hover table-condensed">
      <thead>
      <tr>
        <th>No.</th>
        <th>BP</th>
        <th>Nama Siswa</th>
        <th>Keterangan</th>
      </tr>
      </thead>
    <tbody>
    <?php
    if(isset($_POST['idklmpk']) || isset($_POST['tgl_absen']) )
    {
        $kodeKelompok = $_POST['idklmpk'];
       
        include '../lib/koneksi.php';
        $sql = "SELECT tb_siswa.NIS, tb_siswa.NamaSiswa, (SELECT KetAbsen FROM tb_absensubuh WHERE tb_siswa.NIS = tb_absensubuh.NIS AND TglAbsen = '$tgl') AS ket_absen FROM tb_siswa, klmpsubuh WHERE tb_siswa.idklmpk = klmpsubuh.idklmpk AND klmpsubuh.idklmpk = $kodeKelompok ";
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
        <td><?php echo $data['NIS']; ?></td>
        <td><?php echo $data['NamaSiswa']; ?></td>
        <td>
          <form action="" method="POST">
            <input type="hidden" name="idklmpk" value="<?php echo $_POST['idklmpk']; ?>">
            <input type="hidden" name="NIS" value="<?php echo $data['NIS']; ?>">
            <input type="hidden" name="tgl_absen" value="<?php echo $tgl; ?>">
            <select name="keterangan_absen" class="form-control" onchange="this.form.submit();">
              <option value="">Pilih</option>
              <option  <?php if($data['ket_absen'] == "Hadir") echo "selected"?> value="Hadir">Hadir</option>
              <option  <?php if($data['ket_absen'] == "Alfa") echo "selected"?>  value="Alfa">Alfa</option>
              <option  <?php if($data['ket_absen'] == "Izin") echo "selected"?>  value="Izin">Izin</option>
              <option  <?php if($data['ket_absen'] == "Sakit") echo "selected"?>  value="Sakit">Sakit</option>
              <option  <?php if($data['ket_absen'] == "Cabut") echo "selected"?>  value="Cabut">Cabut</option>
            </select>
          </form>
        </td>
        </tr>
        <?php  
          $No++;
          }
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
  </body>
</html>
