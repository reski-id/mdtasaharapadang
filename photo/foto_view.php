<html>
<head>
	<style>
	#a:hover{
		color:#a94442;
	}
	</style>
</head>
<body>
<?php
	require_once ('mdtaadmin/lib/koneksi.php');
	$query="SELECT id_foto, nama_file, judul, waktu, LEFT(keterangan,500) AS keterangan FROM tb_foto

	order by id_foto desc limit 3";
	$result=mysqli_query($conn,$query) or die(mysqli_error());
	$no=1;
	while($rows=mysqli_fetch_object($result)){
?>
<div class="col-md-4 col-sm-12">

</div>
	<div class="card-body">
	<h6 class="card-title"></h6>
	
	<br>
	
	</div>
</div>
<div class="media">
  <div class="media-left">
    <a href="">
      <img class="media-object" width="100" height="100" src="http://localhost/mdtatamu/mdtaadmin/web/photo/foto/<?=$rows -> nama_file;?>" alt="...">
    </a>
  </div>
  <div class="media-body">
    <h6 class="media-heading"><h4 style="color: #3c763d;"><?=$rows -> judul;?></h4></h6>
    <p align="justify"><?=$rows -> keterangan;?>  <a style="color: #3c763d;" href="detailphoto.php?id_foto=<?=$rows -> id_foto;?>">  <b> Baca Selanjutnya</b></a>
	</p>
	<palign="left">
	<p align="left" class="text-muted"><?= date('d F Y h:i:s', strtotime($rows -> waktu))?></p>
  </div>
  
<?php
}?>
</body>
</html>