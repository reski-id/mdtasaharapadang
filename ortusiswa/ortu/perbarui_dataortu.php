<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/ortusiswa/login.php');
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


	$sql = ("UPDATE tb_ortu SET Nama = '$Nama', JenisKelamin = '$JenisKelamin', TempatLahir = '$TempatLahir', Pendidikan = '$Pendidikan',TanggalLahir = '$TanggalLahir', Agama = '$Agama', Alamat = '$Alamat', NoHp = '$NoHp' WHERE idortu = '$idortu';

	") 
		or die(mysql_error());
	$result = mysqli_query($conn, $sql);	
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil Diubah'); 
				window.location.href='data_ortu.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Edit'); 
				window.location.href='data_ortu.php';
			  </script>"; 
	}
	header("location:data_ortu.php");
?>