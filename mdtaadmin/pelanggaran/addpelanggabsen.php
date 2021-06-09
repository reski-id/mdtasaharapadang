<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<?php
   
    require_once '../lib/koneksi.php';
    
    
    $nis = htmlentities($_GET['NIS']);
	//cabut
	$Cabutsql = "SELECT COUNT(KetAbsen) AS Cabut FROM jml_cabutalfa WHERE NIS=$nis AND KetAbsen='Cabut'";
	$queryc = mysqli_query($conn, $Cabutsql);
	$resultc = mysqli_fetch_array($queryc);
	$cabut = $resultc['Cabut'];

	//alfa
	$Alpasql = "SELECT COUNT(KetAbsen) AS Alpa FROM jml_cabutalfa WHERE NIS=$nis AND KetAbsen='Alfa'";
	$querya = mysqli_query($conn, $Alpasql);
	$resulta = mysqli_fetch_array($querya);
	$alpa = $resulta['Alpa'];

	//cari data

	$ket="pelanggaran absensi jumlah Alpa:$alpa dan Cabut:$cabut";
	$cekdata = "SELECT * FROM tb_pelanggaran WHERE NIS='$nis' AND keterangan='$ket'";
	$hasil = mysqli_query($conn, $cekdata);
	$jumlah = mysqli_affected_rows($conn);

	if($jumlah==0){
		$tgl=date("Y-m-d H:i:s");
		$tambah = ("INSERT INTO tb_pelanggaran (tanggal,jenispelanggara,NIS,keterangan,proses) VALUES ('$tgl','SEDANG','$nis','pelanggaran absensi jumlah Alpa:$alpa dan Cabut:$cabut','N');") or die(mysql_error());
		$result = mysqli_query($conn, $tambah);	
		if ($result) {
			mysqli_close($conn);
			echo "<script type='text/javascript'>
					alert('Berhasil'); 
					window.location.href='data_pelanggaran.php';
					</script>"; 
		} else {
			mysqli_close($conn);
			echo "<script type='text/javascript'>
					alert('Gagal'); 
					window.location.href='data_pelanggaran.php';
					</script>"; 
		}
	} else{
		echo "<script type='text/javascript'>
					alert('Data Sudah ditambahkan'); 
					window.location.href='data_pelanggaran.php';
					</script>"; 
	}


	
?>