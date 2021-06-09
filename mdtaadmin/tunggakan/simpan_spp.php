<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>

<?php
    include "../lib/koneksi.php";

    $NIS = htmlentities(trim($_GET['NIS']));
    $bln = htmlentities(trim($_GET['bln']));
    $tgl=date("Y-m-d h:i:sa");
    
    switch ($bln) {
        case '01':
            $bln="January";
            break;
        case '02':
            $bln="February";
            break;
        case '03':
            $bln="Maret";
            break;
        case '04':
            $bln="April";
            break;
        case '05':
            $bln="Mey";
            break;
        case '06':
            $bln="Juni";
            break;
        case '07':
            $bln="Juli";
            break;
        case '08':
            $bln="Agustus";
            break;
        case '09':
            $bln="September";
            break;
        case '10':
            $bln="Oktober";
            break;
        case '11':
            $bln="November";
            break;
        case '12':
            $bln="Desember";
            break;
        default:
            $bln;
            break;
    }

    //cari data
    $cekt = "SELECT * FROM tb_tunggakan_siswa WHERE NIS='$NIS' AND bulan='$bln' AND tahun='2020' AND statust='Y'";
	$hasil = mysqli_query($conn, $cekt);
	$jumlah = mysqli_affected_rows($conn);
    if($jumlah>0){
        echo "<script type='text/javascript'>
        window.location.href='data_tunggakan_massl.php';
        </script>"; 
    } else{
        //simpan
        $simpt = "INSERT INTO tb_tunggakan_siswa (nis, idkategory, tahun, bulan, statust, tgl_bayar) VALUES ('$NIS','1','2020','$bln','Y','$tgl');";
        $hasils = mysqli_query($conn, $simpt);
        //simpn berhasil
        if ($hasils) {
            mysqli_close($conn);
            echo "<script type='text/javascript'>
                    alert('Pembayaran berhasil');
                    window.location.href='data_tunggakan_massl.php';
                    </script>"; 
        } else {
            mysqli_close($conn);
            echo "<script type='text/javascript'>
                    window.location.href='data_tunggakan_massl.php';
                    </script>"; 
        }

    } 
?>