<?php
    include '../lib/koneksi.php'; 
    $nohp = htmlentities(trim($_POST['nohp']));
    $pesan = htmlentities(trim($_POST['pesan']));

    
    $sql = ("Insert into outbox (InsertIntoDB,
    SendingDateTime,DestinationNumber,TextDecoded,
    SendingTimeOut,DeliveryReport,CreatorID)
    values (sysdate(),sysdate(),'$nohp','$pesan',
    sysdate(),'yes','system')") or die(mysql_error());
    
    $result = mysqli_query($conn, $sql);	
    if ($result) {
        mysqli_close($conn);
        echo "<script type='text/javascript'>
                alert('Berhasil'); 
                window.location.href='data_tunggakan.php';
                </script>"; 
    } else {
        mysqli_close($conn);
        echo "<script type='text/javascript'>
                alert('Gagal'); 
                window.location.href='data_tunggakan.php';
                </script>"; 
    }
?>