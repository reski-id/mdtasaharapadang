<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<?php
	include "../lib/koneksi.php";
	$idtunggakan = htmlentities(trim($_POST['idtunggakan']));
	$tanggal = htmlentities(trim($_POST['tanggal']));
	$jumlah = htmlentities(trim($_POST['jumlah']));
	$kettungakan = htmlentities(trim($_POST['kettungakan']));
	$NIS = htmlentities(trim($_POST['NIS']));



	$sql = ("UPDATE tb_tunggakan SET tanggal = '$tanggal',NIS = '$NIS',jumlah = '$jumlah',kettungakan = '$kettungakan' WHERE idtunggakan = '$idtunggakan';

	") or die(mysql_error());
	$result = mysqli_query($conn, $sql);	
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil Diubah'); 
				window.location.href='data_tunggakan.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Edit'); 
				window.location.href='data_tunggakan.php';
			  </script>"; 
	}
?>