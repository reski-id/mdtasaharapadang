<?php

include '../../lib/koneksi.php';

$id_foto = $_POST['id_foto'];
$nama_file = @$_POST['nama_file'];
$waktu = $_POST['waktu'];
$judul = $_POST['judul'];
$keterangan = $_POST['keterangan'];


//kode upload
$lokasi_file = @$_FILES['nama_file']['tmp_name'];
$nama_file = @$_FILES['nama_file']['name'];
$tipe_file = @$_FILES['nama_file']['type'];
$ukuran_file = @$_FILES['nama_file']['size'];

if(empty($nama_file)){
    //update tanpa ganti photo
    $sql = "UPDATE tb_foto SET judul = '$judul', waktu = '$waktu', keterangan = '$keterangan' WHERE id_foto = '$id_foto';

    ";
    $result = mysqli_query($conn,$sql) or die(mysqli_error());
    if($result==true) {
        	header('location:foto_view.php');
        } else {
        	header('location:foto_form.php');
        }
        mysqli_close();
} else{
   //ubah dengan photo

   $nama_baru = preg_replace("/\s+/", "_", $nama_file);
   $direktori = "foto/$nama_baru";

   $sql = "UPDATE tb_foto SET judul = '$judul', nama_file = '$nama_baru', waktu = '$waktu', keterangan = '$keterangan' WHERE id_foto = '$id_foto';

    ";
    $result = mysqli_query($conn,$sql) or die(mysqli_error());
    if($result==true) {
        	header('location:foto_view.php');
        } else {
        	header('location:foto_form.php');
        }
        mysqli_close();


}
// //kode untuk mengganti spasi dan karakter pada nama file
// // serta karakter non alphabet menjadi garis bawah





// //code untuk mengkopi file ke fodler foto
// move_uploaded_file($lokasi_file, $direktori);
// $sql = "INSERT INTO tb_foto(nama_file,judul,waktu,keterangan)
// 		VALUES('$nama_baru','$judul','$tanggal','$keterangan')";

// $result = mysqli_query($conn,$sql) or die(mysqli_error());

// //check if query successful
// if($result==true) {
// 	header('location:foto_view.php');
// } else {
// 	header('location:foto_form.php');
// }
// mysqli_close();
?>
