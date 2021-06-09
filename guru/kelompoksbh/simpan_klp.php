<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/guru/login.php');
}
?>

<?php
	require_once '../lib/koneksi.php';
	$idklmpk = htmlentities(trim($_POST['idklmpk']));
	$kelommpok = htmlentities(trim($_POST['kelommpok']));


	$sql = ("INSERT INTO klmpsubuh (idklmpk, kelommpok)
			VALUES ('$idklmpk', '$kelommpok')
			") or die(mysql_error());
	$result = mysqli_query($conn, $sql);

	header("location: vklompk.php");
?>