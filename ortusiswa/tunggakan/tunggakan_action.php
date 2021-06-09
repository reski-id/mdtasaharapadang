<?php

include '../lib/koneksi.php';

$nama_file = $_POST['nama_file'];
$idtunggakan = htmlentities(trim($_POST['idtunggakan']));
$jenis_pembayaran = htmlentities(trim($_POST['jenis_pembayaran']));
$pesan = htmlentities(trim($_POST['pesan']));

//kode upload
$lokasi_file = $_FILES['nama_file']['tmp_name'];
$nama_file = $_FILES['nama_file']['name'];
$tipe_file = $_FILES['nama_file']['type'];
$ukuran_file = $_FILES['nama_file']['size'];

//kode untuk mengganti spasi dan karakter pada nama file
// serta karakter non alphabet menjadi garis bawah

$nama_baru = preg_replace("/\s+/", "_", $nama_file);
$direktori = "foto/$nama_baru";

$MAX_FILE_SIZE = 50000; //50kb


//cek apakah format file adalah format gambar
$formatgambar = array("image/jpg", "image/jpeg","image/gif", "image/png");

//cek apakah ukuran file diatas 50kb 

//code untuk mengkopi file ke fodler foto
move_uploaded_file($lokasi_file, $direktori);
$sql="UPDATE tb_tunggakan SET proses = 'O', jenis_pembayaran = '$jenis_pembayaran', pesan = '$pesan', bukti_bayar = '$nama_baru' WHERE idtunggakan = '$idtunggakan';

";

// UPDATE tb_tunggakan SET 
//   tanggal = 'tanggal',
//   NIS = 'NIS',
//   jumlah = 'jumlah',
//   tahun = 'tahun',
//   bulan = 'bulan',
//   idkategori = 'idkategori',
//   kettungakan = 'kettungakan',
//   tgl_jatuhtempo = 'tgl_jatuhtempo',
//   tgl_bayar = 'tgl_bayar',
//   jenis_pembayaran = 'jenis_pembayaran',
//   proses = 'proses',
//   pesan = 'pesan',
//   bukti_bayar = 'bukti_bayar'
// WHERE idtunggakan = 'idtunggakan';
$result = mysqli_query($conn,$sql) or die(mysqli_error());

//check if query successful
if($result==true) {
	header('location:data_tunggakan.php');
} else {
	header('location:data_tunggakan.php');
}
mysqli_close();
?>
