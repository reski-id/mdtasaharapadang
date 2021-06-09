<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<?php
	require_once '../lib/koneksi.php';
	$username = htmlentities(trim($_POST['username']));
	$sandi1 = htmlentities(trim(md5($_POST['sandi1'])));
	$sandi2 = htmlentities(trim(md5($_POST['sandi2'])));

	$tingkat = htmlentities(trim($_POST['tingkat']));
	$aktif = htmlentities(trim($_POST['aktif']));

	if($sandi1==$sandi2){
		$sql = ("INSERT INTO tb_user (username,sandi,tingkat,aktif) VALUES('$username','$sandi1','$tingkat','$aktif');

		") or die(mysqli_error());
		$result = mysqli_query($conn, $sql);
	
		header("location: data_user.php ");
	} else {
		echo "<script type='text/javascript'>
				alert('Kata Sandi di Kolom 1 dan 2 tidak Sama Silahkan Periksa lagi'); 
				window.location.href='tambah_data_user.php';
			  </script>";

	}

	
?>