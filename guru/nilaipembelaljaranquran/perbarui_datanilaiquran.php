<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/guru/login.php');
}
?>

<?php
	include "../lib/koneksi.php";

	$idpenilaian = htmlentities(trim($_POST['idpenilaian']));
	$NIS = htmlentities(trim($_POST['NIS']));
	$kdkriteria = htmlentities(trim($_POST['kdkriteria']));
	$nilai = htmlentities(trim($_POST['nilai']));


	$sql = ("UPDATE tb_nilaiquran SET NIS='$NIS', kdkriteria='$kdkriteria', nilai='$nilai' WHERE idpenilaian='$idpenilaian';

	") or die(mysql_error());
	$result = mysqli_query($conn, $sql);	
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil Diubah'); 
				window.location.href='data_nilaiquran.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Edit'); 
				window.location.href='data_nilaiquran.php';
			  </script>"; 
	}
?>