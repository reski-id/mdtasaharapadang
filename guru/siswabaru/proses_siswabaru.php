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
	$NoHpOrtu = htmlentities(trim($_POST['NoHpOrtu'])); 


	$simpandatasiswa = ("INSERT INTO tb_siswa (NIS, NamaSiswa, JenisKelamin, TempatLahir, TanggalLahir, 
		Agama, AlamatSiswa, KodeKls, NoHpOrtu,idklmpk)VALUES ('$NIS', '$NamaSiswa', '$JenisKelamin', '$TempatLahir', '$TanggalLahir', '$Agama', '$AlamatSiswa', '$KodeKls', '$NoHpOrtu', '$idklmpk')")or die(mysql_error()); 
	$simpan = mysqli_query($conn, $simpandatasiswa);
	
	//update 
	$updatetbsiswabaru = ("UPDATE tb_siswabaru SET proses = 'Y' WHERE NIS = '$NIS';")or die(mysql_error()); 
	$update = mysqli_query($conn, $updatetbsiswabaru); 

	if ($simpan && $update) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil di Proses dan disimpan ke Database Siswa MDTA Sahara Padang'); 
				window.location.href='data_siswabaru.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Hapus'); 
				window.location.href='data_siswabaru.php';
			  </script>"; 
	} ?> 
