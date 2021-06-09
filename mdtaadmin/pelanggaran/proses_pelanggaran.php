<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<?php
	include "../lib/koneksi.php";
	$idpelanggaran = htmlentities(trim($_POST['idpelanggaran']));
	$keterangan = htmlentities(trim($_POST['keterangan']));
	$solusi = htmlentities(trim($_POST['solusi']));
	$proses = "Y";

	$sql = ("UPDATE tb_pelanggaran SET keterangan = '$keterangan',solusi = '$solusi',proses = '$proses' WHERE idpelanggaran = '$idpelanggaran';

	") or die(mysql_error());
	$result = mysqli_query($conn, $sql);	
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil di Proses'); 
				window.location.href='data_pelanggaran.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Proses'); 
				window.location.href='data_pelanggaran.php';
			  </script>"; 
	}
?>