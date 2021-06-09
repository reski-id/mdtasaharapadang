<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<?php
	include '../lib/koneksi.php';
	$idpendaftaran = htmlentities(trim($_POST['idpendaftaran']));
	$NIS = htmlentities(trim($_POST['NIS']));
	$NamaSiswa = htmlentities(trim($_POST['NamaSiswa']));
	$JenisKelamin = htmlentities(trim($_POST['JenisKelamin']));
	$TempatLahir = htmlentities(trim($_POST['TempatLahir']));
	$TanggalLahir = htmlentities(trim($_POST['TanggalLahir']));
	$Agama = htmlentities(trim($_POST['Agama']));
	$AlamatSiswa = htmlentities(trim($_POST['AlamatSiswa']));
	$NoHpOrtu = htmlentities(trim($_POST['NoHpOrtu']));


	$sql = ("UPDATE tb_siswabaru SET NIS = '$NIS', NamaSiswa = '$NamaSiswa', JenisKelamin = '$JenisKelamin', TempatLahir = '$TempatLahir', TanggalLahir = '$TanggalLahir', Agama = '$Agama', AlamatSiswa = '$AlamatSiswa' WHERE idpendaftaran = '$idpendaftaran' ") or die(mysql_error());
	$result = mysqli_query($conn, $sql);	
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil Diubah'); 
				window.location.href='data_siswabaru.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Edit'); 
				window.location.href='data_siswabaru.php';
			  </script>"; 
	}
?>