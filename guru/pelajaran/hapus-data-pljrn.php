<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/guru/login.php');
}
?>

<?php
	include '../lib/koneksi.php';
	$KodePljrn = $_GET['KodePljrn'];


	$sql = "DELETE FROM tb_pelajaran WHERE KodePljrn = '$KodePljrn'";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil di Hapus'); 
				window.location.href='data-pljrn.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Hapus'); 
				window.location.href='data-pljrn.php';
			  </script>"; 
	}
?>
