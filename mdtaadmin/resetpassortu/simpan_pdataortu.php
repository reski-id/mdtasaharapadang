<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<?php
	include '../lib/koneksi.php'; 
	$idortu = htmlentities(trim($_POST['idortu']));
	$Nama = htmlentities(trim($_POST['Nama']));
	$JenisKelamin = htmlentities(trim($_POST['JenisKelamin']));
	$TempatLahir = htmlentities(trim($_POST['TempatLahir']));
	$Pendidikan = htmlentities(trim($_POST['Pendidikan']));
	$TanggalLahir = htmlentities(trim($_POST['TanggalLahir']));
	$Agama = htmlentities(trim($_POST['Agama']));
	$Alamat = htmlentities(trim($_POST['Alamat']));
	$NoHp = htmlentities(trim($_POST['NoHp']));

	$username = htmlentities(trim($_POST['username']));
	$sandi1 = htmlentities(trim(md5($_POST['sandi1'])));
	$sandi2 = htmlentities(trim(md5($_POST['sandi2'])));
	$aktif = "Aktif";

	if($sandi1==$sandi2){
		$sql = ("INSERT INTO tb_ortu (idortu,Nama,JenisKelamin,TempatLahir,Pendidikan,TanggalLahir,Agama,Alamat,NoHp,username,sandi,aktif) 
		VALUES ('$idortu','$Nama','$JenisKelamin','$TempatLahir','$Pendidikan','$TanggalLahir','$Agama','$Alamat','$NoHp','$username','$sandi1','$aktif');
		
		") or die(mysqli_error());
		$result = mysqli_query($conn, $sql);
	
		header("location: data_ortu.php ");
	} else {
		echo "<script type='text/javascript'>
				alert('Kata Sandi di Kolom 1 dan 2 tidak Sama Silahkan Periksa lagi'); 
				window.history.go(-1)
			  </script>";

	}

?>