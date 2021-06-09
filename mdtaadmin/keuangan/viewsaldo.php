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

</head>
<body>
<?php
include '../lib/koneksi.php';
$sqlp = "SELECT SUM(keluar)FROM vkas WHERE jenis='Keluar' ORDER BY tgl DESC";
$resultp = mysqli_query($conn, $sqlp);
$dpengeluaran = mysqli_fetch_array($resultp);



$sqlm = "SELECT SUM(jumlah)FROM vkas WHERE jenis='Masuk' ORDER BY tgl DESC";
$resultm = mysqli_query($conn, $sqlm);
$dpemasukan= mysqli_fetch_array($resultm);


$pemasukan=$dpemasukan[0];
$pengeluaran=$dpengeluaran[0];
$saldo=$pemasukan-$pengeluaran;

?>
<?php
include '../menu.php';
?>
<div class="container">
<div class="row">
<div class="col-lg-12">
<legend>Data Keuangan MDTA SAHARA PADANG</legend>
<div class="row">
<div class="col-lg-6">
<div class="panel panel-success">
<div class="panel-heading"><h5>PEMASUKAN</h5></div>
<div class="panel-body">
<button type="button" class="btn btn-success btn-block">Pemasukan MDTA SAHARA PADANG <?php echo "Rp " . number_format($pemasukan,2,',','.');?></button>
</div>
<div class="panel-footer">
<a name="" id="" class="btn btn-primary" href="http://localhost/mdtatamu/mdtaadmin/keuangan/uangmasuk/data_uangmasuk.php" role="button">Lihat Data</a>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="panel panel-danger">
<div class="panel-heading"><h5>PENGELUARAN</h5></div>
<div class="panel-body">
<button type="button" class="btn btn-success btn-danger">Pengeluaran MDTA SAHARA PADANG <?php echo "Rp " . number_format($pengeluaran,2,',','.');?> </button>
</div>
<div class="panel-footer">
<a name="" id="" class="btn btn-primary" href="http://localhost/mdtatamu/mdtaadmin/keuangan/uangkeluar/data_uangkeluar.php" role="button">Lihat Data</a>
</div>
</div>
</div>
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading"><h5>SALDO</h5></div>
<div class="panel-body">
<button type="button" class="btn btn-success btn-info">Saldo MDTA SAHARA PADANG <?php echo "Rp " . number_format($saldo,2,',','.');?></button>
</div>
</div>
</div>

</div>
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

</body>
</html>