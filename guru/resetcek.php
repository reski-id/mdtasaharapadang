<?php
session_start();

include "lib/koneksi.php";
include "lib/function_antiinjection.php";

$nohp = antiinjeksi($_POST['nohp']);
$id = antiinjeksi($_POST['id']);

$cekuser = mysqli_query($conn, "SELECT * FROM tb_guru WHERE IDGURU='$id' AND NoHp='$nohp'");
$jmluser = mysqli_num_rows($cekuser);
$data = mysqli_fetch_array($cekuser);
$iduser=$data['iduser'];

if($jmluser > 0){
    //temukan di tb user
    $cektbuser = mysqli_query($conn, "SELECT * FROM tb_user where iduser='$iduser'");
    $jmluser = mysqli_num_rows($cektbuser);
    $data2 = mysqli_fetch_array($cektbuser);
    $key=$data2['iduser'];

    //update
    $userbaru="guru123";
    $pass=rand(100000,900000);
    $passwordbaru=md5($pass);
    $updatepasword = ("UPDATE tb_user SET username = '$userbaru', sandi = '$passwordbaru' WHERE iduser = '$key'") or die(mysql_error());
    $hasilupdass = mysqli_query($conn, $updatepasword);	

    if($hasilupdass){
        $pesan="username sementara anda adalah: $userbaru dan password: $pass jangan lupa mengganti nya langsung di halaman website";
        
        $kirimsms = ("Insert into outbox (InsertIntoDB,
                SendingDateTime,DestinationNumber,TextDecoded,
                SendingTimeOut,DeliveryReport,CreatorID)
                values (sysdate(),sysdate(),'$nohp','$pesan',
                sysdate(),'yes','system')") or die(mysql_error());
        $kirimsmsresult = mysqli_query($conn, $kirimsms);	
        if($kirimsmsresult){
            //sms 11
            echo "Username dan password baru sudah di kirimkan ke nomor hp anda.....Silahkan tunggu 1x24 jam...";
            echo "Lupa Password cukup 1x click karna berulang akan mengenerate password baru lagi, kadang sms membutuhkan waktu lama,   ";
            echo "Silahkan Hubungi  <b>Administrator</b> mdta:081268555xx jika anda terdesak waktu <b>Terimakasih</b>";
        } else{
            //sms 00
            echo "<b>Maaf Permintaan tidak bisa di Proses</b>, Silahkan Hubungi  <b>Administrator</b> mdta:081268555xx";
        }

    } else{
        //update 00
        echo "<b>Maaf Permintaan tidak bisa di Proses</b>, Silahkan Hubungi  <b>Administrator</b> mdta:081268555xx";
    }
 


} else{
    //404 nohp atau id
    echo "<b>Maaf Permintaan tidak bisa di Proses</b>, Pastikan Data yang anda masukkan atau Benar Atau Silahkan Hubungi  <b>Administrator</b> mdta:081268555xx";
}
?>