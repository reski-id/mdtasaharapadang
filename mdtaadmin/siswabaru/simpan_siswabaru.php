<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<?php
	include '../lib/koneksi.php'; 
	$NIS = htmlentities(trim($_POST['NIS'])); 
	$NamaSiswa = htmlentities(trim($_POST['NamaSiswa'])); 
	$JenisKelamin = htmlentities(trim($_POST['JenisKelamin'])); 
	$TempatLahir = htmlentities(trim($_POST['TempatLahir'])); 
	$TanggalLahir = htmlentities(trim($_POST['TanggalLahir'])); 
	$Agama = htmlentities(trim($_POST['Agama'])); 
	$AlamatSiswa = htmlentities(trim($_POST['AlamatSiswa'])); 
	$NoHpOrtu = htmlentities(trim($_POST['NoHpOrtu'])); 
	$proses= "N";


	$sql = ("INSERT INTO tb_siswabaru (NIS, NamaSiswa, JenisKelamin, TempatLahir, TanggalLahir, 
		Agama, AlamatSiswa, NoHpOrtu, proses)VALUES ('$NIS', '$NamaSiswa', '$JenisKelamin', '$TempatLahir', '$TanggalLahir', '$Agama', '$AlamatSiswa', '$NoHpOrtu', '$proses')")or die(mysql_error()); 
	$result = mysqli_query($conn, $sql); 

	header("location: data_siswabaru.php"); ?> 
