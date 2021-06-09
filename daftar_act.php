<?php
    require_once("koneksi.php");

    $NIS = htmlentities(trim($_POST['NIS'])); 
    $NamaSiswa = htmlentities(trim($_POST['NamaSiswa'])); 
    $JenisKelamin = htmlentities(trim($_POST['JenisKelamin'])); 
    $TempatLahir = htmlentities(trim($_POST['TempatLahir'])); 
    $TanggalLahir = htmlentities(trim($_POST['TanggalLahir'])); 
    $Agama = htmlentities(trim($_POST['Agama'])); 
    $AlamatSiswa = htmlentities(trim($_POST['AlamatSiswa'])); 
    $NoHpOrtu = htmlentities(trim($_POST['NoHpOrtu'])); 
    $NamaOrtu = htmlentities(trim($_POST['NamaOrtu'])); 
    $proses = "N"; 
    $cek="";

    $sql = ("INSERT INTO tb_siswabaru (NIS, NamaSiswa, JenisKelamin, TempatLahir, TanggalLahir, 
    Agama, AlamatSiswa,NoHpOrtu,NamaOrtu,proses)VALUES ('$NIS', '$NamaSiswa', '$JenisKelamin', '$TempatLahir', '$TanggalLahir', '$Agama', '$AlamatSiswa', '$NoHpOrtu','$NamaOrtu', '$proses')")or die(mysql_error()); 
    $result = mysqli_query($conn, $sql); 
    header("location:media.php?p=daftar");

?>