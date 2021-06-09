<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<?php
	require_once '../lib/koneksi.php';

	$idtunggakan = htmlentities(trim(md5($_POST['idtunggakan'])));
	$tanggalentry = htmlentities(trim($_POST['tanggal1']));
	$kate = htmlentities(trim($_POST['kate']));
	$tahun = htmlentities(trim($_POST['tahun']));
	$bulan = htmlentities(trim($_POST['bulan']));
	$jumlaht = htmlentities(trim($_POST['jumlaht']));
	$kettungakan = htmlentities(trim($_POST['kettungakan']));
	$jatuhtempo = htmlentities(trim($_POST['tanggal2']));

	$query = mysqli_query($conn, "SELECT * FROM tb_siswa");

	while ($row = mysqli_fetch_array($query)) {
	$query2 = "INSERT INTO tb_tunggakan (NIS, tanggal, jumlah, tahun, bulan, idkategori, kettungakan, tgl_jatuhtempo, proses) VALUES ('" . $row['NIS'] . "', '$tanggalentry', '$jumlaht','$tahun', '$bulan', '$kate', '$kettungakan', '$jatuhtempo', 'N')";
	$hasil = mysqli_query($conn,$query2);

	
	}
	if ($hasil > 0) {
		echo "<script type='text/javascript'>
				alert('Data Berhasil disimpan'); 
				window.location.href='data_tunggakan_proses.php';
			  </script>"; 
	} else {
		echo "<script type='text/javascript'>
				alert('something wrong'); 
				window.location.href='data_tunggakan_proses.php';
			  </script>"; 
	}

?>
