<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/guru/login.php');
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
	$KodeKls = htmlentities(trim($_POST['KodeKls'])); 
	$idklmpk = htmlentities(trim($_POST['idklmpk'])); 
	$idortu = htmlentities(trim($_POST['idortu'])); 


	$sql = ("INSERT INTO tb_siswa (NIS,NamaSiswa,JenisKelamin,TempatLahir,TanggalLahir,Agama,AlamatSiswa,KodeKls,idklmpk,idorangtuas) VALUES('$NIS','$NamaSiswa','$JenisKelamin','$TempatLahir','$TanggalLahir','$Agama','$AlamatSiswa','$KodeKls','$idklmpk','$idortu');
	
	")or die(mysql_error()); 
	$result = mysqli_query($conn, $sql); 

	header("location: data_siswa.php"); ?> 
