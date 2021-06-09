<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="user/bootstrap/css/bootstrap.min.css">
<title>MDTA SAHARA PADANG</title>

<style>
.style1 {
	color: #FFFFFF;
	background-color: #FFFFFF;
}
body,td,th {
	color: #006600;
}
.style5 {color: #006600}

.footersty {
    color: #006600;
    font-size: medium;
    background-color: #ccc;
    text-shadow: 0 0 0px black;
}

ul {
    display: block;
    list-style-type: disc;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 20px;
}
.panel-primary {
    border-top-color: #337ab7;
    border-right-color: #337ab7;
    border-bottom-color: #337ab7;
    border-left-color: #337ab7;
    background-color: #eee;
}
.panel-primary>.panel-heading .badge {
    color: orange;
    background-color: #333;
}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
<body>
<header>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<br><br>
			<img src="images/header.jpg" class="img-responsive" with=100%>
		</div>
	</div>
</div>
</header>
<div class="container">
<nav class="navbar navbar-inverse">
	<div class="row">
		<div class="col-sm-12">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbar">
				<ul class="nav navbar-nav">
					<li><a href="http://localhost/mdtatamu/media.php?p=beranda">Home</a></li>
					<li><a href="http://localhost/mdtatamu/media.php?p=profil">Profil</a></li>
					<li><a href="http://localhost/mdtatamu/media.php?p=visimisi">Visi Misi</a></li>
					<li><a href="http://localhost/mdtatamu/media.php?p=struktur">Struktur Organisasi</a></li>
					<li><a href="http://localhost/mdtatamu/media.php?p=gallery">Gallery</a></li>
					<li><a href="http://localhost/mdtatamu/media.php?p=kontak">Alamat</a></li>
					<li><a href="http://localhost/mdtatamu/media.php?p=daftar">Daftar Siswa Baru</a></li>
					<li><a href="http://localhost/mdtatamu/ortusiswa">Masuk</a></li>
				</ul>
			</div>
		</div>
	</div>
</nav>
</div>
<!-- konten -->
<section>
<div class="container">
	<div class="row">
	<div class="col-sm-8">
<div class="panel panel-primary">
<?php
	require_once ('mdtaadmin/lib/koneksi.php');
	$id_foto = htmlentities($_GET['id_foto']);
    $sql = "SELECT * FROM tb_foto WHERE id_foto=$id_foto";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);
?>
	<div class="panel-heading"><b><?php echo $data['judul']; ?>
	<span class="badge badge-pill badge-success"><?php echo date('d F Y', strtotime($data['waktu'])) ?></span>
	</b></div>
	<div class="panel-body"><h3><b></b></h3>
	<a class="thumbnail">
      <img src="http://localhost/mdtatamu/mdtaadmin/web/photo/foto/<?=$data['nama_file'];?>" alt=""></a>
	<p align=justify><?php echo $data['keterangan']; ?></p><br>
</div>
</div>
</div>
<div class="col-sm-4">
<div class="panel panel-primary">
<div class="panel-heading"><b>Jam</b></div>
<div class="panel-body">
<?php
	date_default_timezone_set('Asia/Jakarta');
	$namahari	= array(1=>"Senin",2=>"Selasa",3=>"Rabu",4=>"Kamis",5=>"Jumat",6=>"Sabtu",7=>"Minggu");
	$namabulam	= array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","Spetember"
	,"Oktober","November","Desember");
	$today		= date("l. F j Y");
	$jam		= date("h:i:s a");
	$sekarang	= $namahari[date('N')].", ".date('j')." ".$namabulam[(date('n')-1)]." ". date('Y');
	echo "<p class='text-primary text-center'><b>$sekarang, $jam</b></p>";
?>
</div>
</div>
<div class="panel panel-primary">
<div class="panel-heading"><b>Acara Terbaru</b></div>
<div class="panel-body">
<?php
		require_once ("koneksi.php");
		$sql = "SELECT * FROM tb_acara order by tanggal desc";
		$result = mysqli_query($conn, $sql);
		$i = 1;
		$rows = mysqli_num_rows($result);
		if ($rows == 0) {
		} else {
		$No = 1;
		while ($data = mysqli_fetch_array($result)) 
		{
		$dtanggal = $data['tanggal'];
		$mtangall   =    date('m-d-Y h:i:s a', strtotime($dtanggal));
		echo "<ul>
		<li>Acara ".$data["acara"]." pada  ".$mtangall."  di  ".$data["lokasi"]."</li> <hr>
	</ul>";

		}
	}
?> 	
</div>
</div>
<div class="panel panel-primary">
<div class="panel-heading"><b>	<b>	<b>Kalender Akademik</b></b></b></div>
<div class="panel-body">
<?php
		require_once ("koneksi.php");
		$sql = "SELECT * FROM tb_kalender_akademik order by id desc";
		$result = mysqli_query($conn, $sql);
		$i = 1;
		$rows = mysqli_num_rows($result);
		if ($rows == 0) {
		} else {
		$No = 1;
		while ($data = mysqli_fetch_array($result)){
		$dmulai = $data['mulai'];
		$dselesai = $data['selesai'];
		$mtmula   =    date('m-d-Y', strtotime($dmulai));
		$mtselesai =    date('m-d-Y', strtotime($dselesai));
		

		echo "<ul>
		<li>Acara ".$data["acara"]." pada ".$mtmula." sampai  ".$mtselesai."</li> <hr>
	</ul>";
		}
	}
?> 	
</div>
</div>
</div>
</div>
</div>
</section>

<footer>
<div class="container">
	<div class="row">
		<hr>
		<p class="text-muted text-center footersty">MDTA Sahara || Jalan Padang Pasir 30 Padang</p>
	</div>
</div>
</footer>
<!-- konten Selesai -->

<!-- JQuery Plugin -->
<script src="user/bootstrap/js/jquery.min.js"></script>
<script src="user/bootstrap/js/bootstrap.min.js"></script>	
</body>
</html>	