<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>

<?php
	require_once '../lib/koneksi.php';
	$IdNilai = htmlentities(trim($_POST['IdNilai']));
	$NIS = htmlentities(trim($_POST['NIS']));
	$KodePljrn = htmlentities(trim($_POST['KodePljrn']));
	$Nilai = htmlentities(trim($_POST['Nilai']));


	$sql = ("INSERT INTO tb_nilai (IdNilai, NIS, KodePljrn, Nilai)
			VALUES ('', '$NIS', '$KodePljrn', '$Nilai')
			") or die(mysql_error());
	$result = mysqli_query($conn, $sql);

	header("location: data_nilai.php");
?>