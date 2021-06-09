<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<?php
	include "../lib/koneksi.php";
	$idtunggakan = htmlentities(trim($_POST['idtunggakan']));
	$pesan = htmlentities(trim($_POST['pesan']));
	$pembayaran = htmlentities(trim($_POST['jenis_pembayaran']));



	$sql = ("UPDATE tb_tunggakan SET proses = 'Y', jenis_pembayaran = '$pembayaran', pesan = '$pesan' WHERE idtunggakan = '$idtunggakan';

	") or die(mysql_error());
	$result = mysqli_query($conn, $sql);	
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil di Proses'); 
				window.location.href='data_tunggakan_proses.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Proses'); 
				window.location.href='data_tunggakan_proses.php';
			  </script>"; 
	}
?>