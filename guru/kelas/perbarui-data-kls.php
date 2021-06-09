<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/guru/login.php');
}
?>
<?php
	include "../lib/koneksi.php";
	$KodeKls = htmlentities(trim($_POST['KodeKls']));
	$NamaKls = htmlentities(trim($_POST['NamaKls']));


	$sql = ("UPDATE tb_kelas SET NamaKls = '$NamaKls' WHERE KodeKls = '$KodeKls'") or die(mysql_error());
	$result = mysqli_query($conn, $sql);	
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil Diubah'); 
				window.location.href='data-kls.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Edit'); 
				window.location.href='data-kls.php';
			  </script>"; 
	}
?>