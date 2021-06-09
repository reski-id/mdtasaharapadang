<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<?php
	require_once '../../lib/koneksi.php';
	$tanggal = htmlentities(trim($_POST['tanggal']));
	$acara = htmlentities(trim($_POST['acara']));
	$lokasi = htmlentities(trim($_POST['lokasi']));


	$sql = ("INSERT INTO tb_acara (tanggal, acara, lokasi) VALUES ('$tanggal', '$acara', '$lokasi');

	") or die(mysql_error());
	$result = mysqli_query($conn, $sql);

	header("location: data_acara.php ");
?>