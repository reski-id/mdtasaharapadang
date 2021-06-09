<?php
session_start();

if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/ortusiswa/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="assets/css/navbar-static-top.css" rel="stylesheet">

    <!-- datatables -->
    <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

  <?php
    include 'menu.php';

  ?>

  <div class="container">
  <div class="row col-sm-12 col-xs-12 col-md-10">
  <legend>Cara menggunakan SMS Gateway</legend>
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-success">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#absen" aria-expanded="true" aria-controls="collapseOne">
         CARA CEK ABSEN
        </a>
      </h4>
    </div>
    <div id="absen" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        Cara Cek Absen dengan ketik CEK#ABSEN#NIS  Kirim ke <span class="badge badge-pill badge-warning">0831 8348 5014</span><br>
        contoh: <br><br>
        Cek Absen Siswa:
        <pre>CEK#ABSEN#14002</pre>
        Cek Absen Subuh:
        <pre>CEK#ABSUBUH#14002</pre>
      </div>
    </div>
  </div>
  <div class="panel panel-success">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#nilai" aria-expanded="false" aria-controls="collapseTwo">
        CARA CEK NILAI
        </a>
      </h4>
    </div>
    <div id="nilai" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
      Cara Cek Nilai dengan ketik CEK#NILAI#NIS  Kirim ke <span class="badge badge-pill badge-warning">0831 8348 5014</span><br>
        contoh:  <br><br>
        Cek Nilai: <br>
        <pre>CEK#NILAI#14002</pre>
        Cek Nilai Qur'an: <br>
        <pre>CEK#NQURAN#14002</pre>
      </div>
    </div>
  </div>
  <div class="panel panel-success">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#pelanggaran" aria-expanded="false" aria-controls="collapseThree">
        CARA CEK PELANGGARAN  
        </a>
      </h4>
    </div>
    <div id="pelanggaran" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
      Cara Cek Pelanggaran dengan ketik CEK#PELANGGARAN#NIS  Kirim ke <span class="badge badge-pill badge-warning">0831 8348 5014</span><br>
      contoh:  <br><br>

      <pre>CEK#PELANGGARAN#14002</pre>
      </div>
    </div>
  </div>
  <div class="panel panel-success">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#tunggakan" aria-expanded="false" aria-controls="tunggakan">
        CARA CEK TUNGGAKAN  
        </a>
      </h4>
    </div>
    <div id="tunggakan" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
      Cara Cek Tunggakan dengan ketik CEK#TUNGGAKAN#NIS  Kirim ke <span class="badge badge-pill badge-warning">0831 8348 5014</span><br>
      contoh:  <br><br>
      <pre>CEK#TUNGGAKAN#14002</pre>
      </div>
    </div>
  </div>
</div>

  
  </div>
  </div>  
  </div>
  </div>
  </div>
    <script src="assets/js/jquery.js"></script>  
    <script src="assets/js/bootstrap.min.js">
    <script>
    $('.collapse').collapse()
    </script>
  <?php
  include "footer.php";
  ?>
</html>