<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>

<?php
	include '../lib/koneksi.php';
	$ID = $_GET['ID'];
	$sql = "DELETE FROM inbox WHERE ID = '$ID'";
	$result = mysqli_query($conn, $sql);
	header("location: pesan-masuk.php");
?>
