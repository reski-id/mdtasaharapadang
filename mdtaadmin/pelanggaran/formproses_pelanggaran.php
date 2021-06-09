<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<?php
include "../lib/koneksi.php";

$idpelanggaran = htmlentities($_GET['idpelanggaran']);
$sql = "SELECT * FROM tb_pelanggaran WHERE idpelanggaran = '$idpelanggaran'";
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
<div class="panel panel-primary">
<div class="panel-heading">Proses Data Pelanggaran</div>
<div class="panel-body">
<div class="container">
<form method="POST" action="proses_pelanggaran.php">
<div class="form-group">
<div class="input-group col-md-5">
<label>ID Pelanggaran</label>
<input type="text" name="idpelanggaran" value="<?php echo $data1['idpelanggaran']; ?>" class="form-control" id="idpelanggaran" readonly></input>
</div>
</div>
<div class="form-group">
<div class="input-group col-md-5">
<label>NIS</label>
<input type="text" name="NIS" value="<?php echo $data1['NIS']; ?>" class="form-control" id="idpelanggaran" readonly></input>
</div>
</div>
<div class="form-group">
<div class="input-group col-md-5">
<label>Tanggal</label>
<input type="text" name="tanggal" value="<?php echo $data1['tanggal']; ?>" class="form-control" id="tanggal" readonly></input>
</div>
</div>
<div class="form-group">
<div class="input-group col-md-5">
<label>Jenis Pelanggaran</label>
<input type="text" name="jenispelanggara" value="<?php echo $data1['jenispelanggara']; ?>" class="form-control" id="jenispelanggara" readonly></input>
</div>
</div>
<div class="form-group">
<div class="input-group col-md-5">
<label>Keterangan</label>
<textarea name="keterangan" class="form-control" required><?php echo $data1['keterangan'] ?></textarea>
</div>
</div>
<div class="form-group">
<div class="input-group col-md-5">
<label>Solusi</label>
<textarea name="solusi" class="form-control" required></textarea>
</div>
</div>
<a name="Batal" id="Batal" class="btn btn-primary" href="data_pelanggaran.php" role="button">Batal</a>
<input type="submit" class="btn btn-warning" name="submit" value="Proses"></input><br>
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
