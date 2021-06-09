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


	$sql = ("UPDATE tb_guru SET Nama = '$Nama', JenisKelamin = '$JenisKelamin', TempatLahir = '$TempatLahir', Pendidikan = '$Pendidikan',TanggalLahir = '$TanggalLahir', Agama = '$Agama', Alamat = '$Alamat', NoHp = '$NoHp' WHERE IDGURU = '$IDGURU';

	") 
		or die(mysql_error());
	$result = mysqli_query($conn, $sql);	
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil Diubah'); 
				window.location.href='data_guru.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Edit'); 
				window.location.href='data_guru.php';
			  </script>"; 
	}
	header("location:data_guru.php");
?>