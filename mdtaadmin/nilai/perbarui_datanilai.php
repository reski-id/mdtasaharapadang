<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>

<?php
	include "../lib/koneksi.php";
	$IdNilai = htmlentities(trim($_POST['IdNilai']));
	$NIS = htmlentities(trim($_POST['NIS']));
	$KodePljrn = htmlentities(trim($_POST['KodePljrn']));
	$Nilai = htmlentities(trim($_POST['Nilai']));


	$sql = ("UPDATE tb_nilai SET NIS = '$NIS', KodePljrn = '$KodePljrn', Nilai = '$Nilai' WHERE IdNilai = '$IdNilai'") or die(mysql_error());
	$result = mysqli_query($conn, $sql);	
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil Diubah'); 
				window.location.href='data_nilai.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Edit'); 
				window.location.href='data_nilai.php';
			  </script>"; 
	}
?>