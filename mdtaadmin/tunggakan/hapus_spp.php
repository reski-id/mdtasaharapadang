<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>

<?php
    include "../lib/koneksi.php";

    $id = htmlentities(trim($_GET['idtunggakan']));
   
   
    //hapus
    $hapussql = "DELETE FROM tb_tunggakan_siswa WHERE idtunggakan = '$id';";
    $hasils = mysqli_query($conn, $hapussql);
    //hapus berhasil
    if ($hasils) {
        mysqli_close($conn);
        echo "<script type='text/javascript'>
                alert('Data Berhasil di Hapus');
                window.location.href='data_tunggakan_massl.php';
                </script>"; 
    } else {
        mysqli_close($conn);
        echo "<script type='text/javascript'>
                window.location.href='data_tunggakan_massl.php';
                </script>"; 
    }

?>