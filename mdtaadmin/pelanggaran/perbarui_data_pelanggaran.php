<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>

<?php
	include "../lib/koneksi.php";
	$idpelanggaran = htmlentities(trim($_POST['idpelanggaran']));
	$tanggal = htmlentities(trim($_POST['tanggal']));
	$jenispelanggara = htmlentities(trim($_POST['jenispelanggara']));
	$keterangan = htmlentities(trim($_POST['keterangan']));
	$NIS = htmlentities(trim($_POST['NIS']));

	$sql = ("UPDATE tb_pelanggaran SET tanggal = '$tanggal',jenispelanggara = '$jenispelanggara',NIS = '$NIS',keterangan = '$keterangan' WHERE idpelanggaran = '$idpelanggaran';

	") or die(mysql_error());
	$result = mysqli_query($conn, $sql);	
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil Diubah'); 
				window.location.href='data_pelanggaran.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Edit'); 
				window.location.href='data_pelanggaran.php';
			  </script>"; 
	}
?>