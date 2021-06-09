<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/guru/login.php');
}
?>

<?php
	require_once '../lib/koneksi.php';
	$KodePljrn = htmlentities(trim($_POST['KodePljrn']));
	$NamaPljrn = htmlentities(trim($_POST['NamaPljrn']));


	$sql = ("INSERT INTO tb_pelajaran (KodePljrn, NamaPljrn)
			VALUES ('$KodePljrn', '$NamaPljrn')
			") or die(mysql_error());
	$result = mysqli_query($conn, $sql);

	header("location: data-pljrn.php");
?>