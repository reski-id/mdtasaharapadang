<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/guru/login.php');
}
?>

<?php
	include "../lib/koneksi.php";
	$kdpenilai = htmlentities(trim($_POST['kdpenilai']));
	$kriteria = htmlentities(trim($_POST['kriteria']));


	$sql = ("UPDATE tb_kriteria_penilaianquran SET kriteria = '$kriteria' WHERE kdpenilai = '$kdpenilai'") or die(mysql_error());
	$result = mysqli_query($conn, $sql);	
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil Diubah'); 
				window.location.href='penilaiqur_data.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Edit'); 
				window.location.href='penilaiqur_data.php';
			  </script>"; 
	}
	// header("location:data-jrs.php");
?>