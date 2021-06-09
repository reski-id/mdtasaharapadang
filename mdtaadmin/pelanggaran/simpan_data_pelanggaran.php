<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<?php
	require_once '../lib/koneksi.php';
	$tanggal = htmlentities(trim($_POST['tanggal']));
	$jenispelanggara = htmlentities(trim($_POST['jenispelanggara']));
	$keterangan = htmlentities(trim($_POST['keterangan']));
	$NIS = htmlentities(trim($_POST['NIS']));
	$proses = "N";


	$sql = ("INSERT INTO tb_pelanggaran (tanggal,jenispelanggara,NIS,keterangan,proses) VALUES ('$tanggal','$jenispelanggara','$NIS','$keterangan','$proses');

	") or die(mysql_error());
	$result = mysqli_query($conn, $sql);

	header("location: data_pelanggaran.php ");
?>