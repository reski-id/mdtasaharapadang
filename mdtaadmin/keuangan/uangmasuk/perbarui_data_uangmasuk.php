<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>

<?php
	include "../../lib/koneksi.php";
	$kode = htmlentities(trim($_POST['kode']));
	// $tanggal = htmlentities(trim($_POST['tanggal']));
	// $jumlah = htmlentities(trim($_POST['jumlah']));
	// $keterangan = htmlentities(trim($_POST['keterangan']));



	$sql = ("update tb_kas set keterangan='".$_POST["keterangan"]."',  tgl='".$_POST["tanggal"]."', jumlah='".$_POST["jumlah"]."' where kode='$kode'") or die(mysql_error());
	$result = mysqli_query($conn, $sql);	
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil Diubah'); 
				window.location.href='data_uangmasuk.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Edit'); 
				window.location.href='data_uangmasuk.php';
			  </script>"; 
	}
?>