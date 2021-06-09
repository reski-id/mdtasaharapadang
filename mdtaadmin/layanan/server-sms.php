<!DOCTYPE html>
<head>   
<!-- Bootstrap -->
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<link href="../assets/css/sticky-footer-navbar.css" rel="stylesheet">
<link href="../assets/css/navbar-static-top.css" rel="stylesheet">
<title>MDTA SAHARA PADANG</title>
<!-- refresh script setiap 30 detik --> 
<meta http-equiv="refresh" content="10; url=<?php $_SERVER['PHP_SELF']; ?>">
</head>
<body>
<div class="container">
<div class="row">
<button class="btn btn-block btn-warning">
<h1>Server SMS sedang berjalan...</h1></button></div></div>

<?php

include '../lib/koneksi.php';

$absenceknis = 1;
$absensubuhceknis = 1;
$laporanceknis = 1;
$nilaiceknis = 1;
$nilaiquran = 1;
$pelanggaranceknis = 1;
$tunggakanceknis = 1;

// query untuk membaca SMS yang belum diproses
$query = "SELECT * FROM inbox WHERE Processed = 'false'";
$hasil = mysqli_query($conn, $query);
while ($data = mysqli_fetch_array($hasil))
{
// membaca ID SMS
$id = $data['ID'];   // membaca no pengirim
$noPengirim = $data['SenderNumber'];   // membaca pesan SMS dan mengubahnya menjadi kapital
$msg = strtoupper($data['TextDecoded']);   // proses parsing    // memecah pesan berdasarkan karakter <spasi> 
$pecah = explode(" ", $msg);  // baca NIS dari pesan SMS
$nis = $pecah[2];   // jika kata terdepan dari SMS adalah 'CEK' dan 'ABSEN' maka cari keterangan Absensi

if ($pecah[0] == "CEK" && $pecah[1] == "ABSEN") {

$query2 = "SELECT NamaSiswa, NamaKls, KetAbsen, TglAbsen from tb_siswa INNER JOIN tb_absen ON tb_siswa.NIS = tb_absen.NIS INNER JOIN tb_kelas ON tb_siswa.KodeKls = tb_kelas.KodeKls WHERE tb_absen.NIS = '$nis' AND TglAbsen = CURDATE()";      
$hasil2 = mysqli_query($conn, $query2); 
// cek bila data Absensi tidak ditemukan

if (mysqli_num_rows($hasil2) == 0) {
$reply = "Data absen tidak ditemukan, Cek Kembali format sms dan nis";
$absenceknis = 0;

} else {
// bila nilai ditemukan
$data2 = mysqli_fetch_array($hasil2);
$nama_siswa = $data2['NamaSiswa'];
$nama_kelas = $data2['NamaKls'];
$keterangan = $data2['KetAbsen'];
$tanggal = $data2['TglAbsen'];
$reply = "Cek Absen MDTA Sahara Padang, tgl ".$tanggal.", ".$nama_siswa.",".$keterangan;
}
}
//ABSEN SUBUH
else if ($pecah[0] == "CEK" && $pecah[1] == "ABSUBUH") {
$query2 = "SELECT NamaSiswa, NamaKls, KetAbsen, TglAbsen FROM tb_siswa INNER JOIN tb_absensubuh ON tb_siswa.NIS = tb_absensubuh.NIS INNER JOIN tb_kelas ON tb_siswa.KodeKls = tb_kelas.KodeKls WHERE tb_absensubuh.NIS = '$nis' AND TglAbsen = CURDATE()";      
$hasil2 = mysqli_query($conn, $query2); 
// cek bila data Absensi tidak ditemukan

if (mysqli_num_rows($hasil2) == 0) {
$reply = "absen subuh tidak ditemukan, Cek Kembali NIS";
$absensubuhceknis=0;

} else {
// bila nilai ditemukan
$data2 = mysqli_fetch_array($hasil2);
$nama_siswa = $data2['NamaSiswa'];
$nama_kelas = $data2['NamaKls'];
$keterangan = $data2['KetAbsen'];
$tanggal = $data2['TglAbsen'];
$reply = "Absen Subuh MDTA Sahara Padang tgl ".$tanggal.", ".$nama_siswa.", ".$keterangan;
}
}

//NILAI
else if ($pecah[0] == "CEK" && $pecah[1] == "NILAI") {
$query3 = "SELECT NamaSiswa, NamaKls, GROUP_CONCAT(CONCAT_WS('-',tb_pelajaran.NamaPljrn, tb_nilai.Nilai)SEPARATOR ' | ') AS Nilai from tb_siswa
INNER JOIN tb_nilai ON tb_siswa.NIS = tb_nilai.NIS
INNER JOIN tb_pelajaran ON tb_nilai.KodePljrn = tb_pelajaran.KodePljrn
INNER JOIN tb_kelas ON tb_siswa.KodeKls = tb_kelas.KodeKls WHERE tb_nilai.NIS = '$nis'";
$hasil3 = mysqli_query($conn, $query3); 
// cek bila data Absensi tidak ditemukan

if (mysqli_num_rows($hasil3) == 0) {
$reply = "Data Siswa tidak ditemukan, Cek Kembali NIS";
$nilaiceknis = 0;

} else {
// bila nilai ditemukan
$data3 = mysqli_fetch_array($hasil3);
$nama_siswa = $data3['NamaSiswa'];
$nama_kelas = $data3['NamaKls'];
$nilai = $data3['Nilai'];
$reply = "Nama : ".$nama_siswa." "."Kelas : ".$nama_kelas.". ".$nilai;
}
}

//NILAIQURAN
else if ($pecah[0] == "CEK" && $pecah[1] == "NQURAN") {
$query3 = "SELECT NamaSiswa, NamaKls, GROUP_CONCAT(CONCAT_WS('-',tb_kriteria_penilaianquran.kriteria, tb_nilaiquran.nilai)SEPARATOR ' | ') AS Nilai FROM tb_siswa
INNER JOIN tb_nilaiquran ON tb_siswa.NIS = tb_nilaiquran.NIS
INNER JOIN tb_kriteria_penilaianquran ON tb_nilaiquran.kdkriteria = tb_kriteria_penilaianquran.kdpenilai INNER JOIN tb_kelas ON tb_siswa.KodeKls = tb_kelas.KodeKls WHERE tb_nilai.NIS = '$nis'";
$hasil3 = mysqli_query($conn, $query3); 

if (mysqli_num_rows($hasil3) == 0) {
$reply = "Data nilai qur'an tidak ditemukan, Cek Kembali format sms atau nis";
$nilaiquran = 0;

} else {
// bila nilai ditemukan
$data3 = mysqli_fetch_array($hasil3);
$nama_siswa = $data3['NamaSiswa'];
$nama_kelas = $data3['NamaKls'];
$nilai = $data3['Nilai'];
$reply = "Nama : ".$nama_siswa." "."Kelas : ".$nama_kelas.". ".$nilai;
}
}

//TUNGGAKAN <test successs
else if ($pecah[0] == "CEK" && $pecah[1] == "TUNGGAKAN") {
$query3 = "SELECT tb_siswa.NIS,NamaSiswa,tanggal,jumlah,kettungakan FROM tb_tunggakan  INNER JOIN tb_siswa ON tb_siswa.NIS=tb_tunggakan.NIS WHERE tb_tunggakan.proses='N' AND tb_siswa.NIS = '$nis'";
$hasil3 = mysqli_query($conn, $query3); 

if (mysqli_num_rows($hasil3) == 0) {
$reply = "Tidak ada data tunggakan";
$tunggakanceknis = 0;

} else {
// bila tunggakan
$data3 = mysqli_fetch_array($hasil3);
$nama_siswa = $data3['NamaSiswa'];
$nis = $data3['NIS'];
$tanggal = $data3['tanggal'];
$jumlah = $data3['jumlah'];
$kettungakan = $data3['kettungakan'];
$reply = "Nama : ".$nama_siswa." "."NIS : ".$nis.". ".$tanggal." ".$jumlah." ".$kettungakan;
}
}

//PELANGGARAN <test successs
else if ($pecah[0] == "CEK" && $pecah[1] == "PELANGGARAN") {
$query3 = "SELECT tb_siswa.NIS,NamaSiswa,tanggal,keterangan,jenispelanggara FROM tb_pelanggaran INNER JOIN tb_siswa ON tb_siswa.NIS=tb_pelanggaran.NIS WHERE tb_pelanggaran.proses='N' AND tb_siswa.NIS = '$nis'";
$hasil3 = mysqli_query($conn, $query3); 

if (mysqli_num_rows($hasil3) == 0) {
$reply = "tidak ada data pelanggaran";
$pelanggaranceknis = 0;

} else {
// bila pelanggaran ditemukan
$data3 = mysqli_fetch_array($hasil3);
$nama_siswa = $data3['NamaSiswa'];
$nis = $data3['NIS'];
$tanggal = $data3['tanggal'];
$keterangan = $data3['keterangan'];
$jenispelanggara = $data3['jenispelanggara'];
$reply = "Nama : ".$nama_siswa." "."NIS : ".$nis.". ".$tanggal." ".$keterangan;
}
}

//LAPORAN ABSEN       
else if ($pecah[0] == "CEK" && $pecah[1] == "LAPSUBUH") {

$query9 = "SELECT NamaSiswa, NamaKls from tb_siswa INNER JOIN tb_kelas ON tb_siswa.KodeKls = tb_kelas.KodeKls WHERE tb_siswa.NIS = '$nis'";
$hasil9 = mysqli_query($conn, $query9);
// cek bila data nilai tidak ditemukan
if (mysqli_num_rows($hasil9) == 0) {
$reply = "Data Siswa tidak ditemukan, Cek Kembali NIS";
$laporanceknis = 0;
} else {
//Hitung Bulanan
$awalbulan = date('Y-m-1');
$sekarang = date('Y-m-d');
//Hitung Jumlah Masuk
$QHadir = "SELECT COUNT( KetAbsen ) AS 'jumlahabsen' FROM tb_siswa INNER JOIN tb_absensubuh ON tb_siswa.NIS = tb_absensubuh.NIS WHERE tb_absensubuh.KetAbsen = 'Hadir' AND tb_siswa.NIS =
$nis AND (TglAbsen between '$awalbulan' AND '$sekarang') ";
$jumlahhadir = mysqli_query( $conn, $QHadir ) or die(mysqli_error()."error 1");
$datahadir = mysqli_fetch_array($jumlahhadir);
$totalhadir = $datahadir[0];
//Hitung Jumlah Alfa
$QAlfa = "SELECT COUNT( KetAbsen ) AS 'jumlahabsen' FROM tb_siswa INNER JOIN tb_absensubuh ON tb_siswa.NIS = tb_absensubuh.NIS WHERE tb_absensubuh.KetAbsen = 'Alfa' AND tb_siswa.NIS = $nis
AND (TglAbsen between '$awalbulan' AND '$sekarang') ";
$jumlahalfa = mysqli_query( $conn, $QAlfa ) or die(mysqli_error()."error 4");
$dataalfa = mysqli_fetch_array($jumlahalfa);
$totalalfa = $dataalfa[0];               
//Hitung Jumlah Izin
$QIzin = "SELECT COUNT( KetAbsen ) AS 'jumlahabsen' FROM tb_siswa INNER JOIN tb_absensubuh ON tb_siswa.NIS = tb_absensubuh.NIS WHERE tb_absensubuh.KetAbsen = 'Izin' AND tb_siswa.NIS = $nis
AND (TglAbsen between '$awalbulan' AND '$sekarang') ";
$jumlahizin = mysqli_query( $conn, $QIzin ) or die(mysqli_error())."error 3";
$dataizin = mysqli_fetch_array($jumlahizin);
$totalizin = $dataizin[0];   
//Hitung Jumlah Sakit
$QSakit = "SELECT COUNT( KetAbsen ) AS 'jumlahsakit' FROM tb_siswa INNER JOIN tb_absensubuh ON tb_siswa.NIS = tb_absensubuh.NIS WHERE tb_absensubuh.KetAbsen = 'Sakit' AND tb_siswa.NIS = $nis             
AND (TglAbsen between '$awalbulan' AND '$sekarang') ";
$jumlahsakit = mysqli_query( $conn, $QSakit ) or die(mysqli_error()."error 2");
$datasakit = mysqli_fetch_array($jumlahsakit);
$totalsakit = $datasakit[0];    
//Hitung Jumlah Cabut
$QCabut = "SELECT COUNT( KetAbsen ) AS 'jumlahcabut' FROM tb_siswa INNER JOIN tb_absensubuh ON tb_siswa.NIS = tb_absensubuh.NIS WHERE tb_absensubuh.KetAbsen = 'Cabut' AND tb_siswa.NIS = $nis             
AND (TglAbsen between '$awalbulan' AND '$sekarang') ";
$jumlahcabut = mysqli_query( $conn, $QCabut ) or die(mysqli_error()."error 2");
$datacabut = mysqli_fetch_array($jumlahcabut);
$totalcabut = $datacabut[0];        
//isi balasan
$data9 = mysqli_fetch_array($hasil9);
$nama_siswa = $data9['NamaSiswa'];
$nama_kelas = $data9['NamaKls'];
$reply = "selamat Datang di MDTA Sahara Padang ".$nama_siswa." Kelas: ".$nama_kelas." bulan ini: Kehadiran: ".$totalhadir.". Sakit: ".$totalsakit.". Izin: ".$totalizin.". Alfa: ".$totalalfa.". Cabut: ".$totalcabut;
}
} 


//LAPORAN ABSEN       
else if ($pecah[0] == "CEK" && $pecah[1] == "LAPABSEN") {

$query9 = "SELECT NamaSiswa, NamaKls from tb_siswa INNER JOIN tb_kelas ON tb_siswa.KodeKls = tb_kelas.KodeKls WHERE tb_siswa.NIS = '$nis'";
$hasil9 = mysqli_query($conn, $query9);
// cek bila data nilai tidak ditemukan
if (mysqli_num_rows($hasil9) == 0) {
$reply = "Data Siswa tidak ditemukan, Cek Kembali NIS";
$laporanceknis = 0;
} else {
//Hitung Bulanan
$awalbulan = date('Y-m-1');
$sekarang = date('Y-m-d');
//Hitung Jumlah Masuk
$QHadir = "SELECT COUNT( KetAbsen ) AS 'jumlahabsen' FROM tb_siswa INNER JOIN tb_absen ON tb_siswa.NIS = tb_absen.NIS WHERE tb_absen.KetAbsen = 'Hadir' AND tb_siswa.NIS =
$nis AND (TglAbsen between '$awalbulan' AND '$sekarang') ";
$jumlahhadir = mysqli_query( $conn, $QHadir ) or die(mysqli_error()."error 1");
$datahadir = mysqli_fetch_array($jumlahhadir);
$totalhadir = $datahadir[0];
//Hitung Jumlah Alfa
$QAlfa = "SELECT COUNT( KetAbsen ) AS 'jumlahabsen' FROM tb_siswa INNER JOIN tb_absen ON tb_siswa.NIS = tb_absen.NIS WHERE tb_absen.KetAbsen = 'Alfa' AND tb_siswa.NIS = $nis
AND (TglAbsen between '$awalbulan' AND '$sekarang') ";
$jumlahalfa = mysqli_query( $conn, $QAlfa ) or die(mysqli_error()."error 4");
$dataalfa = mysqli_fetch_array($jumlahalfa);
$totalalfa = $dataalfa[0];               
//Hitung Jumlah Izin
$QIzin = "SELECT COUNT( KetAbsen ) AS 'jumlahabsen' FROM tb_siswa INNER JOIN tb_absen ON tb_siswa.NIS = tb_absen.NIS WHERE tb_absen.KetAbsen = 'Izin' AND tb_siswa.NIS = $nis
AND (TglAbsen between '$awalbulan' AND '$sekarang') ";
$jumlahizin = mysqli_query( $conn, $QIzin ) or die(mysqli_error())."error 3";
$dataizin = mysqli_fetch_array($jumlahizin);
$totalizin = $dataizin[0];   
//Hitung Jumlah Sakit
$QSakit = "SELECT COUNT( KetAbsen ) AS 'jumlahsakit' FROM tb_siswa INNER JOIN tb_absen ON tb_siswa.NIS = tb_absen.NIS WHERE tb_absen.KetAbsen = 'Sakit' AND tb_siswa.NIS = $nis             
AND (TglAbsen between '$awalbulan' AND '$sekarang') ";
$jumlahsakit = mysqli_query( $conn, $QSakit ) or die(mysqli_error()."error 2");
$datasakit = mysqli_fetch_array($jumlahsakit);
$totalsakit = $datasakit[0];    
//Hitung Jumlah Cabut
$QCabut = "SELECT COUNT( KetAbsen ) AS 'jumlahcabut' FROM tb_siswa INNER JOIN tb_absen ON tb_siswa.NIS = tb_absen.NIS WHERE tb_absen.KetAbsen = 'Cabut' AND tb_siswa.NIS = $nis             
AND (TglAbsen between '$awalbulan' AND '$sekarang') ";
$jumlahcabut = mysqli_query( $conn, $QCabut ) or die(mysqli_error()."error 2");
$datacabut = mysqli_fetch_array($jumlahcabut);
$totalcabut = $datacabut[0];        
//isi balasan
$data9 = mysqli_fetch_array($hasil9);
$nama_siswa = $data9['NamaSiswa'];
$nama_kelas = $data9['NamaKls'];
$reply = "selamat Datang di MDTA Sahara Padang ".$nama_siswa." Kelas: ".$nama_kelas." bulan ini: Kehadiran: ".$totalhadir.". Sakit: ".$totalsakit.". Izin: ".$totalizin.". Alfa: ".$totalalfa.". Cabut: ".$totalcabut;
}
} 
else 
{
$reply = "format SMS salah. CEK ABSEN NIS atau CEK LAPORAN NIS atau CEK NILAI NIS, CEK PELANGGARAN NIS atau CEK TUNGGAKAN NIS";
}
$query = "INSERT INTO outbox(DestinationNumber, TextDecoded) VALUES ('$noPengirim', '$reply')";
$query = mysqli_query($conn, $query);
$query = "UPDATE inbox SET Processed = 'true' WHERE ID = '$id'";
$query = mysqli_query($conn, $query);
}
?>
</body>
<script src="../assets/js/jquery.js"></script>  
<script src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap-datetimepicker.id.js"></script>
<script type="text/javascript">
