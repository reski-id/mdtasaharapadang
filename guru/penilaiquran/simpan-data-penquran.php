<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/guru/login.php');
}
?>

<?php
	require_once '../lib/koneksi.php';
	$kdpenilai = htmlentities(trim($_POST['kdpenilai']));
	$kriteria = htmlentities(trim($_POST['kriteria']));


	$sql = ("INSERT INTO tb_kriteria_penilaianquran (kdpenilai, kriteria)
			VALUES ('$kdpenilai', '$kriteria')
			") or die(mysql_error());
	$result = mysqli_query($conn, $sql);

	header("location: penilaiqur_data.php");
?>