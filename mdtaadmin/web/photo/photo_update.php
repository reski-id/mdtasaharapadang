<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<html>
	<head>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>MDTA SAHARA PADANG</title>

		<!-- Bootstrap -->
		<link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="../../assets/css/sticky-footer-navbar.css" rel="stylesheet">
		<link href="../../assets/css/navbar-static-top.css" rel="stylesheet">
	</head>
	<body>
	<?php
  include '../../menu.php';
?>
 <div class="container">
    <div class="row">
      <div class="col-md-10">
      <div class="panel panel-primary">
      <div class="panel-heading">Update Photo</div>
      <?php
    include "../../lib/koneksi.php";

    $id_foto = htmlentities($_GET['id_foto']);
    $sql = "SELECT * FROM tb_foto WHERE id_foto = '$id_foto'";
    $result = mysqli_query($conn, $sql);
    $data1 = mysqli_fetch_array($result);
?>
       <div class="panel-body">
        <div class="container">
		<form  method="POST" id="form1" enctype="multipart/form-data"
		action="photo_update_act.php">
    <div class="form-group">
            <div class="input-group hidden">
            <label>ID</label>
            <input type="text" class="form-control" id="id_foto" name="id_foto" value="<?php echo $data1['id_foto'] ?>"></input>
            </div>
          </div>
		<div class="form-group">
            <label>Tanggal</label>
              <div class="input-group date form_date col-xs-6 col-md-4 col-lg-4" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
              <input class="form-control" type="text" value="<?php echo $data1['waktu']; ?>">
              <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
              </div>
            <input type="hidden" id="dtp_input2" name="waktu" value="2019-12-05">
          </div>
		  <div class="form-group">
            <div class="input-group">
            <label>Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $data1['judul'] ?>"></input>
            </div>
          </div>
		  <div class="form-group">
            <div class="input-group">
            <label>Keterangan</label>
            <textarea class="form-control" id="content" name="keterangan" rows="6"><?php echo $data1['keterangan'] ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Photo</label> <br>
            <img src="foto/<?php echo $data1['nama_file']; ?>" alt="<?php echo $data1['nama_file']; ?>" width=500 height=400 class="img-thumbnail">
           
            </div>
          </div>
		  <div class="form-group">
            <div class="input-group">
            <label>Ganti Photo</label>
            <input type="file" name='nama_file'>
            </div>
          </div>

			
			<button class="btn-warning" type="submit">
				Edit
			</button>
		</form>
		</div>
			
			<?php
      
// KODE UNTUK MENAMPILKAN PESAN STATUS
if(isset($_GET['status'])) {
	$status=$_GET['status'];
	switch($status) {
		case 0 :
			echo " upload sukses!";
			break;
		case 1 :
			echo " Anda belum memilih file yang akan diupload!";
			break;
		case 2 :
			echo " upload gagal, Format yang diperbolehkan hanya jpg,png dan gif!";
			break;
			case 2 :
			echo " upload gagal, Ukuran file terlalu besar!";
			break;
	}
}
?>
	</body>
    <script src="../../assets/js/jquery.js"></script>  
    <script src="../../assets/js/bootstrap.min.js"></script>

    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

    <script type="text/javascript" src="../../assets/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="../../assets/js/bootstrap-datetimepicker.id.js"></script>
    <script type="text/javascript">
      $('.form_date').datetimepicker({
          language:  'id',
          weekStart: 1,
          todayBtn:  1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      minView: 2,
      forceParse: 0
      });
    </script>
    <script type='text/javascript'>
                     var editor = CKEDITOR.replace('content');
                     CKFinder.setupCKEditor(editor, 'ckfinder/');    
                 </script>
</html>
