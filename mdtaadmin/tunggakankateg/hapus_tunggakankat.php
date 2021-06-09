<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<?php
	include '../lib/koneksi.php';
	$idkategory = $_GET['idkategory'];


	$sql = "DELETE FROM tb_tunggakankat WHERE idkategory = '$idkategory'";

	$result = mysqli_query($conn, $sql);
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil di Hapus'); 
				window.location.href='data_tunggakankat.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Hapus'); 
				window.location.href='data_tunggakankat.php';
			  </script>"; 
	}
?>
