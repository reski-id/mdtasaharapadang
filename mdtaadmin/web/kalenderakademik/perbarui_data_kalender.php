<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<?php
	include "../../lib/koneksi.php";
	$id = htmlentities(trim($_POST['id']));
	$mulai = htmlentities(trim($_POST['mulai']));
	$selesai = htmlentities(trim($_POST['selesai']));
	$acara = htmlentities(trim($_POST['acara']));


	$sql = ("UPDATE tb_kalender_akademik SET mulai = '$mulai',selesai = '$selesai',acara = '$acara' WHERE id = '$id'") or die(mysql_error());
	$result = mysqli_query($conn, $sql);	
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil Diubah'); 
				window.location.href='data_kalender.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Edit'); 
				window.location.href='data_kalender.php';
			  </script>"; 
	}
	// header("location:data-jrs.php");
?>