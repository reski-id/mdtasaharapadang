<?php

include '../../lib/koneksi.php';

$nama_file = $_POST['nama_file'];
$tanggal = $_POST['tanggal'];
$keterangan = $_POST['keterangan'];
$judul = $_POST['judul'];

//kode upload
$lokasi_file = $_FILES['nama_file']['tmp_name'];
$nama_file = $_FILES['nama_file']['name'];
$tipe_file = $_FILES['nama_file']['type'];
$ukuran_file = $_FILES['nama_file']['size'];

//kode untuk mengganti spasi dan karakter pada nama file
// serta karakter non alphabet menjadi garis bawah

$nama_baru = preg_replace("/\s+/", "_", $nama_file);
$direktori = "foto/$nama_baru";



//code untuk mengkopi file ke fodler foto
move_uploaded_file($lokasi_file, $direktori);
$sql = "INSERT INTO tb_foto(nama_file,judul,waktu,keterangan)
		VALUES('$nama_baru','$judul','$tanggal','$keterangan')";

//masukan nama file kedalam tabel foto di database mysql 
$result = mysqli_query($conn,$sql) or die(mysqli_error());

//check if query successful
if($result==true) {
	header('location:foto_view.php');
} else {
	header('location:foto_form.php');
}
mysqli_close();
?>
