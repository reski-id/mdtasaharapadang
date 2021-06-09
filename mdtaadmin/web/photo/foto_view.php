<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<html>
	<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MDTA SAHARA PADANG</title>

    <!-- Bootstrap -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="../../assets/css/navbar-static-top.css" rel="stylesheet">

	<script type="text/javascript" src="fb/jquery.js"></script>
	<link rel="stylesheet" href="fb/jquery.fancybox.css?v=2.1.0" 
	type="text/css" media="screen" />
	<script type="text/javascript" src="fb/jquery.fancybox.pack.js?v=2.1.0"></script>
	
</script>
	</head>
	<body>
	<?php
  include '../../menu.php';
?>
<div class="container">
<div class="rows">
<legend>Video </legend>
<a name="editvideo" id="editvideo" class="btn btn-warning" href="editlinkvideo.php" role="button">Edit Link Video</a>
</div>
</div>
 <div class="container">
  <div class="row">
  <div class="col-lg-12">
  <legend>Data gallery</legend>

	<table class="table table-condensed table-bordered table-striped" id="tb_acara">
      <thead>
      <tr>
        <th>No. </th>
        <th>Judul</th>
        <th>Photo</th>
        <th>Keterangan</th>
        <th>Aksi</th>
      </tr>
      </thead>
	  <tbody>
		<?php
			require_once ('../../lib/koneksi.php');
			$query="SELECT * from tb_foto order by waktu desc";
			$result=mysqli_query($conn,$query) or die(mysqli_error());
			$no=1;
			while($rows=mysqli_fetch_object($result)){
					?>
			<tr>
			<td><?php echo $no; ?></td>
			<td><?=$rows -> judul;?></td>
			<td>
			<a class="fancybox" href='foto/<?=$rows -> nama_file;?>'
					data-fancybox-group="gallery" > <img class="img-polaroid" 
					src='foto/<?=$rows -> nama_file;?>'
					width='100' height='100'/> </a>
					</td>
			<td>
			<?=$rows -> keterangan;?>
			</td>
			<td align="center">
        <a href="ubah_data_acara.php?id_foto=<?php echo $rows ->id_foto;?>">
       
        <button class="btn btn-success">
		<a href="photo_update.php?id_foto=<?php echo $rows ->id_foto;?>">
        <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Update"></span>
		</button>
		<button class="btn btn-danger">
        <a href="delphoto.php?id_foto=<?php echo $rows ->id_foto;?>">
        <span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span>
        </button>
        </a>
        </td>
			</tr>
					
					<?php
					$no++;
			}?>
			</div>
			</div>
			</div>
			<td colspan=5 align=center> 
    <a href="foto_form.php"><button type="button" class="btn btn-success btn-block">Tambah Data</button></a>
    </td>
			</tbody>
			</table>
    </div>
    </div>
    </div>

 
	<?php
      include '../../footer.php';
  ?>

	<script src="../../assets/js/jquery.js"></script>  
    <script src="../../assets/js/bootstrap.min.js"></script>
	</body>
</html>


