<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<?php
	include '../lib/koneksi.php';
	$kdpenilai = $_GET['kdpenilai'];


	$sql = "DELETE FROM tb_kriteria_penilaianquran WHERE kdpenilai = '$kdpenilai'";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil di Hapus'); 
				window.location.href='penilaiqur_data.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Hapus'); 
				window.location.href='penilaiqur_data.php';
			  </script>"; 
	}
?>
