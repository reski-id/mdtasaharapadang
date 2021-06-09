<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<?php
	require_once '../../lib/koneksi.php';
	$id = htmlentities(trim($_POST['id']));
	$link = htmlentities(trim($_POST['link']));


	$sql = ("UPDATE tb_video SET link = '$link' WHERE id = '$id';

    ") or die(mysql_error());
	$result = mysqli_query($conn, $sql);

	header("location: foto_view.php ");
?>