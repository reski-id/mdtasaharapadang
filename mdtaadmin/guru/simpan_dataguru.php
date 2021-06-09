<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>

<?php
	include '../lib/koneksi.php'; 
	$IDGURU = htmlentities(trim($_POST['IDGURU']));
	$Nama = htmlentities(trim($_POST['Nama']));
	$JenisKelamin = htmlentities(trim($_POST['JenisKelamin']));
	$TempatLahir = htmlentities(trim($_POST['TempatLahir']));
	$Pendidikan = htmlentities(trim($_POST['Pendidikan']));
	$TanggalLahir = htmlentities(trim($_POST['TanggalLahir']));
	$Agama = htmlentities(trim($_POST['Agama']));
	$Alamat = htmlentities(trim($_POST['Alamat']));
	$NoHp = htmlentities(trim($_POST['NoHp']));

	$sql = ("INSERT INTO tb_guru (IDGURU,Nama,JenisKelamin,TempatLahir,Pendidikan,TanggalLahir,Agama,Alamat,NoHp) VALUES ('$IDGURU','$Nama','$JenisKelamin','$TempatLahir','$Pendidikan','$TanggalLahir','$Agama','$Alamat','$NoHp');

	")or die(mysql_error()); 
	$result = mysqli_query($conn, $sql); 

	header("location: data_guru.php"); ?> 
