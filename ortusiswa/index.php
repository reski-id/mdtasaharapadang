<?php
session_start();
ob_start();


//Mengecek status login
if( empty($_SESSION['username']) or empty($_SESSION['password']) ){
   header('location: http://localhost/mdtatamu/ortusiswa/login.php');
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
  </head>
<style>
.navbar-inverse .navbar-nav > li > a:hover {
    color: #fff !important;
}
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
</style>
  <body>
  <?php
  include 'menu.php';?>
<div class="container">
    <div class="rows">
    <div class="jumbotron">
  <h1>Selamat Datang,</h1>
  <br>
  <p>Saat ini berada di Website Parental Control MDTA SAHARA PADANG !</p>
  <p><h4>Melalui Website ini anda bisa meninjau Kegiatan Anak Anda selama Belajar di MDTA</p></h4><br>
  <p><button class="btn btn-gold btn-lg" data-toggle="modal" data-target="#myModal">Fitur</button></p>
</div>
    </div>
  </div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header btn-goldblack">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><h3>Melalui Halaman Anda dapat : </h3>
      </div>
      <div class="modal-body">
      <ol>
      <li>Melihat Data Siswa</li>
      <li>Mengedit Data Siswa</li>
      <li>Melihat Absen Siswa</li>
      <li>Melihat Absen Subuh</li>
      <li>Melihat Nilai Siswa</li>
      <li>Melihat Nilai Baca Qur'an</li>
      <li>Melihat Data Tunggakan</li>
      <li>Melakukan Pembayaran Tunggakan</li>
      <li>Melihat Data Pelanggaran</li>
      <li>Melihat Berita Acara MDTA dan Kegiatan Akademik</li>
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