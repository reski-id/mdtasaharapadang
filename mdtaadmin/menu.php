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
</style>
<ul class="nav navbar-nav navbar-right">
<li><a href="http://localhost/mdtatamu/mdtaadmin/">Home</a></li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-edit"></span>    Data<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="http://localhost/mdtatamu/mdtaadmin/siswa/data_siswa.php"> Data Siswa<span class="sr-only">(current)</span></a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/siswabaru/data_siswabaru.php"> 
Data Siswa Baru  
<?php 
require_once( 'lib/koneksi.php');
//hitung siswa baru
$siswabaru = "select * from tb_siswabaru where proses='N'
";
$hasilsiswabaru = mysqli_query($conn, $siswabaru);
$siswabaru = mysqli_num_rows($hasilsiswabaru);
$msiswa="<span class=\"badge badge-light\">$siswabaru</span>";
if($siswabaru>0){
echo $msiswa;
}else{
$msiswa=" ";
}?>
</a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/guru/data_guru.php">Data Guru</a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/ortu/data_ortu.php">Data Orang Tua Siswa</a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/kelas/data-kls.php">Data Kelas</a></li> 
<li><a href="http://localhost/mdtatamu/mdtaadmin/kelompoksbh/vklompk.php">Data Kelompok</a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/pelajaran/data-pljrn.php">Data Pelajaran</a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/penilaiquran/penilaiqur_data.php">Data Kriteria Penilaian Al-Qur'an</a></li>
</ul>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-edit"></span>    Absen<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="http://localhost/mdtatamu/mdtaadmin/absen/data_absensi.php"> Absen Sekolah<span class="sr-only">(current)</span></a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/absen/laporanabsenbln_cari.php"> Absen Sekolah/Bulan<span class="sr-only">(current)</span></a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/absensubuh/data_absensisbh.php">Absen Subuh</a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/absensubuh/laporanabsensbh_cari.php">Absen Subuh/Bulan</a></li>
</ul>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-education"></span>  Nilai<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="http://localhost/mdtatamu/mdtaadmin/nilai/data_nilai.php"> Nilai Sekolah<span class="sr-only">(current)</span></a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/nilaipembelaljaranquran/data_nilaiquran.php">Nilai Qur'an</a></li>
</ul>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-comment"></span>   Pesan<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="http://localhost/mdtatamu/mdtaadmin/layanan/pesan-masuk.php">Pesan Masuk<span class="sr-only">(current)</span></a>
</li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/layanan/pesan-keluar.php">Pesan Keluar</a></li>
<li><a href="" data-toggle="modal" data-target="#modalsiaran"><span> Pemberitahuan</span></a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/layanan/server-sms.php" target="_blank">AutoLoad</a></li>
</ul>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

<span class="glyphicon glyphicon-alert"></span>   Tunggakan
<span class="caret"></span> </a>
<ul class="dropdown-menu">
<li><a href="http://localhost/mdtatamu/mdtaadmin/tunggakan/tambah_data_tunggakan.php">Tambah Tunggakan</a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/tunggakankateg/data_tunggakankat.php">Kategori Tunggakan</a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/tunggakan/data_tunggakan_proses.php"> Tunggakan <?php 
require_once( 'lib/koneksi.php');
$tungsql = "SELECT * FROM tb_tunggakan WHERE proses='N'
";
$hastung = mysqli_query($conn, $tungsql);
$tunggakan = mysqli_num_rows($hastung);
$mtungg="<span class=\"badge badge-light\">$tunggakan</span>";
if($tunggakan>0){
echo $mtungg;
}else{
$mtungg=" ";
}?></a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/tunggakan/data_tunggakanspp_proses.php"> Data Tunggakan SPP</a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/tunggakan/data_tunggakan_massl.php"> Proses  SPP</a></li>
</ul>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-bullhorn"></span>  Pelanggaran<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="http://localhost/mdtatamu/mdtaadmin/pelanggaran/data_pelanggaran.php">Data Pelanggaran <span class="sr-only">(current)</span>
<?php 
require_once( 'lib/koneksi.php');
//hitung pelanggaran
$pelsql = "SELECT * FROM tb_pelanggaran WHERE proses='N'
";
$haspelanggaran = mysqli_query($conn, $pelsql);
$pelanggaran = mysqli_num_rows($haspelanggaran);
$mpel="<span class=\"badge badge-light\">$pelanggaran</span>";
if($pelanggaran>0){
echo $mpel;
}else{
$mpel=" ";
}?>
</a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/pelanggaran/laporanpelanggaran_2.php">Cari Pelanggaran</a></li>
</ul>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-usd"></span>  Keuangan<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="http://localhost/mdtatamu/mdtaadmin/keuangan/uangmasuk/data_uangmasuk.php"> Uang Masuk<span class="sr-only">(current)</span></a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/keuangan/uangkeluar/data_uangkeluar.php">Uang Keluar</a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/keuangan/viewsaldo.php">Saldo</a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/keuangan/cari_transaksi.php">Laporan Kas</a></li>
</ul>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span>  Laporan<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="http://localhost/mdtatamu/mdtaadmin/absen/rekap_absensi.php">Absen Sekolah<span class="sr-only">(current)</span></a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/absensubuh/rekap_absensisbh.php">Absen Subuh</a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/nilai/detail_nilai.php">Nilai Sekolah</a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/nilaipembelaljaranquran/detail_nilaiquran.php">Nilai Quran</a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/tunggakan/laporantungakan_2.php">Tunggakan</a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/pelanggaran/laporanpelanggaran.php">Pelanggaran</a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/guru/lapguru.php">Laporan Tenaga Pengajar</a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/siswa/laporansiswa.php">Laporan Siswa</a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/siswabaru/lapsiswabaru.php">Laporan Siswa Baru</a></li>
</ul>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-globe"></span>  WEB<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="http://localhost/mdtatamu/mdtaadmin/web/acara/data_acara.php">Acara MDTA<span class="sr-only">(current)</span></a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/web/kalenderakademik/data_kalender.php">Kegiatan Akademik</a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/web/photo/foto_view.php">Photo</a></li></ul>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span>  <?= $_SESSION['username'] ?><span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="http://localhost/mdtatamu/mdtaadmin/pengguna/data_user.php">Kelola User<span class="sr-only">(current)</span></a></li> 
<li><a href="http://localhost/mdtatamu/mdtaadmin/resetpassortu/data_portu.php">Reset Password Ortu</a></li>
<li><a href="http://localhost/mdtatamu/mdtaadmin/logout.php">Keluar</a></li>
</ul>
</li>
</div>
</div>
</nav>
<div class="modal fade" id="modalsiaran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header btn-goldblack">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">Pemberitahuan</h4>
</div>
<div class="modal-body">
<form class="form-horizontal style-form" action="" method="post">
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Kelas</label>
<div class="col-sm-10">
<select name="Kelas" class="form-control"><option value=0 selected>- Pilih Kelas -</option>
<?php
$q = mysqli_query($conn,"select * from tb_kelas");
while ($a = mysqli_fetch_array($q)){
echo "<option value='$a[KodeKls]'>$a[NamaKls]</option>";
}
?>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Pesan</label>
<div class="col-sm-10">
<textarea type="text" class="form-control" name="pesan" rows="5" placeholder="Isikan Pesan" required><?php echo "Assalamualaikum, Kami dari MDTA Sahara Padang memberitahukan bahwasanya........." ?></textarea>
</div>
</div>
</div>
<div class="modal-footer">
<input type="submit" class="btn btn-goldblack" name="inputgroup" value="KIRIM">
</div>
</form>
</div>
</div>
</div>
<?php
if (isset($_POST['inputgroup'])) {
$kelas = $_POST['Kelas'];
$message = $_POST['pesan'];
$query = mysqli_query($conn, "SELECT * FROM tb_siswa s JOIN tb_ortu o ON s.idorangtuas=o.idortu WHERE s.KodeKls='".$kelas."'");
while ($row = mysqli_fetch_array($query)) {
$query2 = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('" . $row['NoHp'] . "', '$message', 'Gammu')";
$hasil = mysqli_query($conn,$query2);

if ($hasil > 0) {
echo "<div class='container'><div class='rows'><div class='col-md-12'>
<div class='alert alert-success alert-dismissible col-xs-4 col-md-3' role='alert'>
<button type='button' class='close' data-dismiss='alert' aria-label=Close><span aria-hidden=true>&times;</span></button>
<strong>Sukses!</strong></div>
</div></div></div>";
} else {
echo "<div class='container'><div class='rows'><div class='col-md-12'>
<div class='alert alert-danger alert-dismissible col-xs-4 col-md-3' role='alert'>
<button type='button' class='close' data-dismiss='alert' aria-label=Close><span aria-hidden=true>&times;</span></button>
<strong>Gagal!</strong></div>
</div></div></div>";
}
}
}
?>