<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<?php
	include '../lib/koneksi.php'; 
	$idpendaftaran = htmlentities(trim($_POST['idpendaftaran'])); 
	$NIS = htmlentities(trim($_POST['NIS'])); 
	$NamaSiswa = htmlentities(trim($_POST['NamaSiswa'])); 
	$JenisKelamin = htmlentities(trim($_POST['JenisKelamin'])); 
	$TempatLahir = htmlentities(trim($_POST['TempatLahir'])); 
	$TanggalLahir = htmlentities(trim($_POST['TanggalLahir'])); 
	$Agama = htmlentities(trim($_POST['Agama'])); 
	$AlamatSiswa = htmlentities(trim($_POST['AlamatSiswa'])); 
	$KodeKls = htmlentities(trim($_POST['KodeKls'])); 
	$idklmpk = htmlentities(trim($_POST['idklmpk'])); 

	
	$cekid = "SELECT * FROM tb_siswa WHERE NIS='$NIS'
	";
	$hasil = mysqli_query($conn, $cekid);
	$jumlah = mysqli_affected_rows($conn);
	if($jumlah==0){
		$simpandatasiswa = ("INSERT INTO tb_siswa (NIS, NamaSiswa, JenisKelamin, TempatLahir, TanggalLahir, 
		Agama, AlamatSiswa, KodeKls,idklmpk) VALUES ('$NIS', '$NamaSiswa', '$JenisKelamin', '$TempatLahir', '$TanggalLahir', '$Agama', '$AlamatSiswa', '$KodeKls', '$idklmpk')")or die(mysql_error()); 
		$simpan = mysqli_query($conn, $simpandatasiswa);

		//update tb to Y
		$updatetbsiswabaru = ("UPDATE tb_siswabaru SET proses = 'Y' WHERE idpendaftaran = '$idpendaftaran'")or die(mysqli_error()); 
		$update = mysqli_query($conn, $updatetbsiswabaru); 

		echo "<script type='text/javascript'> alert('Validasi berhasil, Siswa sudah dimasukkan ke tabel Siswa'); window.location.href='data_siswabaru.php';
		</script>"; 

	} elseif ($jumlah>0) {
		echo "<script type='text/javascript'> alert('Nis Sudah diambil, Silahkan Edit dan ganti NIS!'); window.location.href='data_siswabaru.php';
		</script>"; 
	} else {
		echo "errr";
	}

	?> 
