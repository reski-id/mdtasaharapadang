<?php
session_start();

include "lib/koneksi.php";
include "lib/function_antiinjection.php";

$nohp = antiinjeksi($_POST['nohp']);
$nis = antiinjeksi($_POST['nis']);

$cekuser = mysqli_query($conn, "SELECT * FROM tb_ortu WHERE nohp='$nohp'");
$jmluser = mysqli_num_rows($cekuser);
$data = mysqli_fetch_array($cekuser);
$idortu=$data['idortu'];


if($jmluser > 0){
        //cek nis
        $ceknis = "SELECT NIS FROM tb_siswa WHERE idorangtuas='$idortu'";
        $hasilnis = mysqli_query($conn, $ceknis);
        $jumlahnis = mysqli_affected_rows($conn);

        if($jumlahnis > 0){
           $userbaru="ortu123";
           $pass=rand(100000,900000);
           $passwordbaru=md5($pass);

        
           $updatepasword = ("UPDATE tb_ortu SET username = '$userbaru', sandi = '$passwordbaru', aktif = 'Aktif' WHERE idortu = '$idortu';

           ") or die(mysql_error());
	        $hasilupdass = mysqli_query($conn, $updatepasword);	
                    if ($hasilupdass) {
                       //kirim password
                       $pesan="username baru anda : $userbaru dan password : $pass jangan lupa mengganti nya langsung di halaman website";

                       $kirimsms = ("Insert into outbox (InsertIntoDB,
                       SendingDateTime,DestinationNumber,TextDecoded,
                       SendingTimeOut,DeliveryReport,CreatorID)
                       values (sysdate(),sysdate(),'$nohp','$pesan',
                       sysdate(),'yes','system')") or die(mysql_error());
                       $kirimsmsresult = mysqli_query($conn, $kirimsms);	
                       if($kirimsmsresult){
                           //goodtogo
                           echo "Username dan password baru sudah di kirimkan ke nomor hp anda.....
                           Silahkan tunggu 1x24 jam...";
                           echo "Lupa Password cukup 1x click karna berulang akan mengenerate password baru lagi, kadang sms membutuhkan waktu lama,   ";
                           echo "Silahkan Hubungi  <b>Administrator</b> mdta:081268555xx jika anda terdesak waktu";
                    } else{
                            //err
                            mysqli_close($conn);
                            echo "Silahkan Hubungi  <b>Administrator</b> mdta:081268555xx"; 
                    }

                      
                    } else {
                        //err
                        mysqli_close($conn);
                        echo "Silahkan Hubungi  <b>Administrator</b> mdta:081268555xx"; 
                    }

           
        } else{
            //nis 404
            echo "<b>Nis</b> yang anda masukkan Salah, Silahkan Hubungi  <b>Administrator</b> mdta:081268555xx";
        }
   }
	

else {
    //hp 404
   echo "<b>Nomor Handphone</b> yang anda masukkan tidak terdaftar, Silahkan Hubungi  <b>Administrator</b> mdta:081268555xx";
}

?>