<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<?php
	require_once '../../lib/koneksi.php';
	$mulai = htmlentities(trim($_POST['mulai']));
	$selesai = htmlentities(trim($_POST['selesai']));
	$acara = htmlentities(trim($_POST['acara']));


	$sql = ("INSERT INTO tb_kalender_akademik (mulai, selesai, acara) VALUES ('$mulai', '$selesai', '$acara');
	") or die(mysql_error());
	$result = mysqli_query($conn, $sql);

	header("location: data_kalender.php ");
?>