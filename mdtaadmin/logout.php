<?php
  session_start();
  include "lib/koneksi.php";
  
  session_destroy();
  echo "<script>
   alert('Anda sudah Log out! Terimakasih sudah menggunakan Sistem!'); 
   window.location = 'login.php';
   </script>";
?>
