<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<?php
    include "../lib/koneksi.php";

    $idpelanggaran = htmlentities($_GET['idpelanggaran']);
    $sql = "SELECT p.idpelanggaran, p.tanggal,s.NIS,s.NamaSiswa,p.jenispelanggara,p.keterangan,p.proses FROM tb_pelanggaran p JOIN tb_siswa s ON p.NIS=s.NIS WHERE p.idpelanggaran = '$idpelanggaran'";
    $result = mysqli_query($conn, $sql);
    $data1 = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MDTA SAHARA PADANG</title>
    
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <link href="../assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="../assets/css/navbar-static-top.css" rel="stylesheet">
  </head>
  <body>
  <?php
    include '../menu.php';
  ?>
    <div class="container">
    <div class="row">
      <div class="col-md-10">
      <div class="panel panel-danger">
      <div class="panel-heading">Kirim Pesan Pelanggaran</div>
       <div class="panel-body">
        <div class="container">
        <form method="POST" action="kirimpesan_pelanggaran_act.php">
        <div class="form-group">
            <div class="input-group col-xs-12 col-sm-5 col-md-5 hidden">
            <label>ID Pelanggaran</label>
            <input type="text" name="idpelanggaran" value="<?php echo $data1['idpelanggaran']; ?>" class="form-control" id="idpelanggaran" readonly></input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-xs-12 col-sm-7 col-md-5">
            <label>Pesan</label>
            <textarea name="pesan" class="form-control" rows="10" required>Assalamualaikum, MDTA Sahara mengundang untuk mencarikan solusi pelanggaran Siswa (<?php echo $data1['NamaSiswa']; ?>,<?php echo $data1['NIS']; ?>, <?php echo $data1['keterangan']; ?>)
            </textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-xs-12 col-sm-5 col-md-5">
            <label>No HP</label>
            <?php
            $carihp = "select * from tb_siswa s join tb_ortu o on s.idorangtuas=o.idortu where s.NIS=".$data1['NIS'];
            $carihphasil = mysqli_query($conn, $carihp);
            $data2 = mysqli_fetch_array($carihphasil);
            ?>
            <input type="text" name="nohp" value="<?php echo $data2['NoHp']; ?>" class="form-control" id="NoHp"></input>
            </div>
          </div>
          <a name="Batal" id="Batal" class="btn btn-warning" href="data_pelanggaran.php" role="button">Batal</a>
        <input type="submit" class="btn btn-primary" name="submit" value="Kirim Pesan"></input><br>
      </form><br>
      </div>
    </div>
  </div>
  </div>
    </div>
  </div>
  <?php
      include '../footer.php';
  ?>
    <script src="../assets/js/jquery.js"></script>  
    <script src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-datetimepicker.id.js"></script>
    <script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "dd MM yyyy - HH:ii P",
        showMeridian: true,
        autoclose: true,
        todayBtn: true
    });
</script> 
  </body>
</html>
