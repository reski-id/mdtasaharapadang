<?php
session_start();

include "lib/koneksi.php";
include "lib/function_antiinjection.php";

$username = antiinjeksi($_POST['username']);
$password = md5(antiinjeksi($_POST['password']));

$cekuser = mysqli_query($conn, "SELECT * FROM tb_ortu WHERE username='$username' AND sandi='$password'");
$jmluser = mysqli_num_rows($cekuser);
$data = mysqli_fetch_array($cekuser);


if($jmluser > 0){

   if($data['aktif']=="Tidak Aktif"){
      echo "<b>Akun anda tidak Aktif !<br></b>";
      echo "<b>Hubungi Admin untuk mengaktifkan Akun<br></b>";
   } else{
   
       $_SESSION['username']     = $data['username'];
       $_SESSION['idortua']   = $data['idortu'];
       $_SESSION['namalengkap']  = $data['Nama'];
       $_SESSION['password']     = $data['sandi'];

	   echo "ok";
   }
	
}
else {
   echo "<b>Username</b> atau <b>password</b> tidak terdaftar!";
}

?>