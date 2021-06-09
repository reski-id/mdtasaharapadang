<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<?php
	include "../lib/koneksi.php";
	$KodePljrn = htmlentities(trim($_POST['KodePljrn']));
	$NamaPljrn = htmlentities(trim($_POST['NamaPljrn']));


	$sql = ("UPDATE tb_pelajaran SET NamaPljrn = '$NamaPljrn' WHERE KodePljrn = '$KodePljrn'") or die(mysql_error());
	$result = mysqli_query($conn, $sql);	
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil Diubah'); 
				window.location.href='data-pljrn.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Edit'); 
				window.location.href='data-pljrn.php';
			  </script>"; 
	}
	 header("location:data-pljrn.php");
?>