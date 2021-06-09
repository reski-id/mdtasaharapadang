<?php
include 'lib/koneksi.php';
?>
<!-- Static navbar -->
<nav class="navbar navbar-inverse navbar-static-top navbar-default">
<div class="container-fluid">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>
    
  </div>

  <div id="navbar" class="collapse navbar-collapse">
    <style type="text/css">
      .container-fluid {
        padding-right: 25px;
        padding-left: 35px;
        margin-right: auto;
        margin-left: auto;
        background-color: #262626;
        font-size: 15px;
        line-height: 1.5;
        color: #333;
       
}
.navbar-inverse .navbar-nav > li > a {
    color: #cc9900 !important;
}
.navbar-inverse .navbar-nav > li > a:hover {
    color: #fff !important;
}
.navbar-inverse .navbar-nav > li > a:focus {
    color: #cc9900 !important;
}

.navbar-inverse .navbar-nav > .open > a, .navbar-inverse .navbar-nav > .open > a:hover, .navbar-inverse .navbar-nav > .open > a:focus {
    color: #fff;
    background-color: #fff !important;
}
.badge {
    display: inline-block;
    min-width: 10px;
    padding: 3px 7px;
    font-size: 12px;
    font-weight: bold;
    line-height: 1;
    color: #f5f5f5;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    background-color: #9c3d26;
    border-radius: 10px;
}


    </style>
    <ul class="nav navbar-nav navbar-right">
            <li><a href="http://localhost/mdtatamu/guru/">Home</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-edit"></span>    Data<span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li><a href="http://localhost/mdtatamu/guru/siswa/data_siswa.php"> Data Siswa<span class="sr-only">(current)</span></a></li>
              <li><a href="http://localhost/mdtatamu/guru/siswabaru/data_siswabaru.php">Data Siswa Baru</a></li> 
              <li><a href="http://localhost/mdtatamu/guru/kelas/data-kls.php">Data Kelas</a></li> 
              <li><a href="http://localhost/mdtatamu/guru/kelompoksbh/vklompk.php">Data Kelompok</a></li>
              <li><a href="http://localhost/mdtatamu/guru/pelajaran/data-pljrn.php">Data Pelajaran</a></li>
              </ul>
              </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-edit"></span>    Absen<span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li><a href="http://localhost/mdtatamu/guru/absen/data_absensi.php"> Absen Sekolah<span class="sr-only">(current)</span></a></li>
              <li><a href="http://localhost/mdtatamu/guru/absensubuh/data_absensisbh.php">Absen Subuh</a></li>
              </ul>
              </li>

              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-education"></span>  Nilai<span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li><a href="http://localhost/mdtatamu/guru/nilai/data_nilai.php"> Nilai Sekolah<span class="sr-only">(current)</span></a></li>
              <li><a href="http://localhost/mdtatamu/guru/nilaipembelaljaranquran/data_nilaiquran.php">Nilai Qur'an</a></li>
              </ul>
              </li>
           
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-alert"></span>   Tunggakan
              <span class="caret"></span> </a>
              <ul class="dropdown-menu">
              <li><a href="http://localhost/mdtatamu/guru/tunggakan/data_tunggakan.php"> Data Tunggakan  <span class="sr-only">(current)</span> 
              </a></li>
              <li><a href="http://localhost/mdtatamu/guru/tunggakan/laporantunggakan.php"> Laporan Tunggakan
              </a></li>
              </ul>
              </li>

              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-bullhorn"></span>  Pelanggaran<span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li><a href="http://localhost/mdtatamu/guru/pelanggaran/data_pelanggaran.php">Data Pelanggaran <span class="sr-only">(current)</span>
              </a></li>
              <li><a href="http://localhost/mdtatamu/guru/pelanggaran/laporanpelanggaran.php">Laporan Pelanggaran
              </a></li>
              </ul>
              </li>
  
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-usd"></span>  Keuangan<span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li><a href="http://localhost/mdtatamu/guru/keuangan/uangmasuk/data_uangmasuk.php"> Uang Masuk<span class="sr-only">(current)</span></a></li>
              <li><a href="http://localhost/mdtatamu/guru/keuangan/uangkeluar/data_uangkeluar.php">Uang Keluar</a></li>
              <li><a href="http://localhost/mdtatamu/guru/keuangan/viewsaldo.php">Saldo</a></li>
              </ul>
              </li>
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span>  Laporan<span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li><a href="http://localhost/mdtatamu/guru/absen/rekap_absensi.php">Absen Sekolah<span class="sr-only">(current)</span></a></li>
              <li><a href="http://localhost/mdtatamu/guru/absensubuh/rekap_absensisbh.php">Absen Subuh</a></li>
              <li><a href="http://localhost/mdtatamu/guru/nilai/detail_nilai.php">Nilai Sekolah</a></li>
              <li><a href="http://localhost/mdtatamu/guru/nilaipembelaljaranquran/detail_nilaiquran.php">Nilai Quran</a></li>
              </ul>
            </li>
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span>  <?= $_SESSION['username'] ?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="http://localhost/mdtatamu/guru/pengguna/data_user.php">Ganti Password</a></li>
            <li><a href="http://localhost/mdtatamu/guru/logout.php">Keluar</a><span class="sr-only">(current)</span></li>
            </ul>
            </li>
 </div>
</div>
</nav>