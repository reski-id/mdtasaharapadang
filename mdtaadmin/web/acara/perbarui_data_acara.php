<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<?php
	include "../../lib/koneksi.php";
	$id = htmlentities(trim($_POST['id']));
	$tanggal = htmlentities(trim($_POST['tanggal']));
	$acara = htmlentities(trim($_POST['acara']));
	$lokasi = htmlentities(trim($_POST['lokasi']));


	$sql = ("UPDATE tb_acara SET tanggal = '$tanggal',acara = '$acara',lokasi = '$lokasi' WHERE id = '$id';

	") or die(mysql_error());
	$result = mysqli_query($conn, $sql);	
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil Diubah'); 
				window.location.href='data_acara.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Edit'); 
				window.location.href='data_acara.php';
			  </script>"; 
	}
?>