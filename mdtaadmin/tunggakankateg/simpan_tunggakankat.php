<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<?php
	require_once '../lib/koneksi.php';
	$idkategory = htmlentities(trim($_POST['idkategory']));
	$nama = htmlentities(trim($_POST['nama']));
	$jumlah = htmlentities(trim($_POST['jumlah']));
	$keterangan = htmlentities(trim($_POST['keterangan']));

	$sql = ("INSERT INTO tb_tunggakankat () VALUES('$idkategory','$nama','$jumlah','$keterangan');

	") or die(mysql_error());
	$result = mysqli_query($conn, $sql);

	header("location: data_tunggakankat.php");
?>