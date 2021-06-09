<?php
session_start();
ob_start();

//Mengecek status login
if( empty($_SESSION['username']) or empty($_SESSION['password']) ){
   header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="">
    <meta name="author" content="">
    <title>MDTA SAHARA PADANG</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <link href="assets/css/navbar-static-top.css" rel="stylesheet">
    <link href="assets/css/sticky-footer-navbar.css" rel="stylesheet">

    <style>
    .jumbotron {
        padding-top: 30px;
        padding-bottom: 30px;
        margin-bottom: 30px;
        color: gold;
        background-color: #868065;
        box-shadow: 0 0 11px 4px black;
        text-shadow: 0 0 11px black;
    }
    .modal-open {
      overflow: hidden;
      text-shadow: 0 0 0px black;
      background-color: #f5f5f5;
      color: #984646;
      font-size: 17px;
    }
    .btn-magents {
      color: #fff;
      background-color: #a94442;
      border-color: #d9edf7;
    }
    .btn-magents:hover {
      color: #fff;
      background-color: #800f0d;
      border-color: #d9edf7;
    }
    .modal-header {
      padding: 15px;
      border-bottom: 1px solid #e5e5e5;
    }
    .btn-goldblack {
      color: orange;
      background-color: #555;
      border-color: #a94442;
}
    .btn-fotter {
      color: #333;
      background-color: #ccc;
      border-color: #333;
      border-top: 0px solid #e5e5e5;
}
    .btn-gold {
      color: #ffd700;
      background-color: #514e3d;
      border-color: #ffd700;
}
    .btn-gold:hover {
      color: #171717;
      background-color: #d0b937;
      border-color: #353535;
}
.panel-blackgold>.panel-heading {
      color: orange;
      background-color: #333;
      border-color: #04c;
      box-shadow: 0 0 0 0px black;
}
        </style>
  </head>

  <body>
  <?php
  include 'menu.php';?>

  <div class="container">
    <div class="rows">
    <div class="jumbotron">
  <h1>Selamat Datang,</h1>
  <br>
  <p>Saat ini berada di Halaman Guru MDTA SAHARA Padang!</p>
  <p><button class="btn btn-gold btn-lg" data-toggle="modal" data-target="#myModal">Fitur</button></p>
</div>
    </div>
  </div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header btn-goldblack">
        <button type="button " class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><h3>Melalui halaman ini Guru dapat : </h3>
      </div>
      <div class="modal-body">
      <ol>
      <li>Menambahkan, Mengedit, Menghapus dan Melihat Data Siswa</li>
      <li>Menambahkan, Mengedit, Menghapus dan Melihat Data Kelas</li>
      <li>Menambahkan, Mengedit, Menghapus dan Melihat Data Nilai Sekolah</li>
      <li>Menambahkan, Mengedit, Menghapus dan Melihat Data Nilai Praktek Qur'an</li>
      <li>Menambahkan, Mengedit, Menghapus dan Melihat Data Kelompok Subuh</li>
      <li>Menambahkan, Mengedit, Menghapus dan Melihat Data Pelajaran</li>
      <li>Melihat Data Siswa Baru yang Sudah Mendaftarkan dirinya di MDTA</li>
      <li>Mengelola Data Absen Sekolah </li>
      <li>Mengelola Data Absen Didikan Subuh </li>
      <li>Melihat Data Tunggakan, Pelanggaran dan Keuangan</li>
      </ol>
      </div>
      <div class="modal-footer btn-fotter">
        <button type="button" class="btn btn-magents" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
  <?php include "footer.php";?>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
    
  </body>

</html>