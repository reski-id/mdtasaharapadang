<?php
session_start();
ob_start();

//Mengecek status login
if( empty($_SESSION['username']) or empty($_SESSION['password']) ){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
} else{
	 header('location: data_uangkeluar.php');;
}
