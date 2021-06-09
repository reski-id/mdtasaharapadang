<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/guru/login.php');
}
?>
<?php
	require_once '../lib/koneksi.php';
	$iduser = htmlentities(trim($_POST['iduser']));
	$username = htmlentities(trim($_POST['username']));
	$sandi1 = htmlentities(trim(md5($_POST['sandi1'])));
	$sandi2 = htmlentities(trim(md5($_POST['sandi2'])));

	if($sandi1==$sandi2){
		$sql = ("UPDATE tb_user SET username = '$username',sandi = '$sandi1' WHERE iduser = '$iduser';

		") or die(mysqli_error());
		$result = mysqli_query($conn, $sql);
		echo "<script type='text/javascript'>
		alert('Username dan Password anda sudah di perbarui, Akun Lama Anda akan di log out, Silahkan Masuk dengan Akun Baru'); 
		window.location.href='http://localhost/mdtatamu/guru/logout.php';
	  </script>";
		
	} else {
		echo "<script type='text/javascript'>
				alert('Kata Sandi di Kolom 1 dan 2 tidak Sama Silahkan Periksa lagi'); 
				window.history.back();
			  </script>";

	}

	
?>