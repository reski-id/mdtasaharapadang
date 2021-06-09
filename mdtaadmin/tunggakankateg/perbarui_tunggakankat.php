<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<?php
	include "../lib/koneksi.php";
	$idkategory = htmlentities(trim($_POST['idkategory']));
	$nama = htmlentities(trim($_POST['nama']));
	$jumlah = htmlentities(trim($_POST['jumlah']));
	$keterangan = htmlentities(trim($_POST['keterangan']));



	$sql = ("UPDATE tb_tunggakankat SET nama = '$nama',jumlah = '$jumlah',keterangan = '$keterangan' WHERE idkategory = '$idkategory';

	") or die(mysql_error());
	$result = mysqli_query($conn, $sql);	
	if ($result) {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Berhasil Diubah'); 
				window.location.href='data_tunggakankat.php';
			  </script>"; 
	} else {
		mysqli_close($conn);
		echo "<script type='text/javascript'>
				alert('Data Gagal di Edit'); 
				window.location.href='data_tunggakankat.php';
			  </script>"; 
	}
?>