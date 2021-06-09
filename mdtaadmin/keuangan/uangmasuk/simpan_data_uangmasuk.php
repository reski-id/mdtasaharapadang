<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>

<?php
	require_once '../../lib/koneksi.php';

	$sql = ("insert into tb_kas set kode='".$_POST["kode"]."', keterangan='".$_POST["keterangan"]."', tgl='".$_POST["tanggal"]."', jumlah='".$_POST["jumlah"]."',jenis='Masuk'") or die(mysql_error());
	$result = mysqli_query($conn, $sql);

	header("location: data_uangmasuk.php ");
?>