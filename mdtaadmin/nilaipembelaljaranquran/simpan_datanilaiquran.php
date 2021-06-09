<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>

<?php
	require_once '../lib/koneksi.php';
	$NIS = htmlentities(trim($_POST['NIS']));
	$kdpenilai = htmlentities(trim($_POST['kdpenilai']));
	$Nilai = htmlentities(trim($_POST['Nilai']));


	$sql = ("INSERT INTO tb_nilaiquran (NIS, kdkriteria, nilai) VALUES ('$NIS','$kdpenilai','$Nilai');

	") or die(mysql_error());
	$result = mysqli_query($conn, $sql);

	header("location: data_nilaiquran.php");
?>