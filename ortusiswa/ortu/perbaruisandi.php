<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/ortusiswa/login.php');
}
?>

<?php
     include "../lib/koneksi.php";
     
	$idortu = htmlentities(trim($_POST['idortu']));
	$username = htmlentities(trim($_POST['username']));
	$sandi1 = htmlentities(trim(md5($_POST['sandi1'])));
	$sandi2 = htmlentities(trim(md5($_POST['sandi2'])));


	if($sandi1==$sandi2){
		$sql = ("UPDATE tb_ortu SET username = '$username', sandi = '$sandi1' WHERE idortu = '$idortu';

        ") or die(mysqli_error());
		$result = mysqli_query($conn, $sql);
	
		header("location: http://localhost/mdtatamu/ortusiswa");
	} else {
		echo "<script type='text/javascript'>
				alert('Kata Sandi di Kolom 1 dan 2 tidak Sama Silahkan Periksa lagi'); 
				window.history.back();
			  </script>";

	}

	
?>