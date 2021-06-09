<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/guru/login.php');
}
?>

<?php
	require_once '../lib/koneksi.php';
	$KodeKls = htmlentities(trim($_POST['KodeKls']));
	$NamaKls = htmlentities(trim($_POST['NamaKls']));


	$sql = ("INSERT INTO tb_kelas (KodeKls, NamaKls)
			VALUES ('$KodeKls', '$NamaKls')
			") or die(mysql_error());
	$result = mysqli_query($conn, $sql);

	header("location: data-kls.php");
?>