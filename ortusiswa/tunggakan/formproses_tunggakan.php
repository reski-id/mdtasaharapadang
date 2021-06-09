<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/ortusiswa/login.php');
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
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="../assets/css/sticky-footer-navbar.css" rel="stylesheet">
		<link href="../assets/css/navbar-static-top.css" rel="stylesheet">
    <style>
    .cash .primary {
      display: inline-block;
      color: #f5f5f5;
      background-color: #3c763d;
      border-radius: 10px;
}
    span.badge.badge-pill.cash-primary {
      background-color: rebeccapurple;
}
</style>
	</head>
	<body>
	<?php
  include '../menu.php';
?>
<?php
    include "../lib/koneksi.php";

    $idtunggakan = htmlentities($_GET['idtunggakan']);
    $sql = "SELECT * FROM tb_tunggakan WHERE idtunggakan = '$idtunggakan'";
    $result = mysqli_query($conn, $sql);
    $data1 = mysqli_fetch_array($result);
?>
 <div class="container">
    <div class="row">
      <div class="col-md-10">
      <div class="panel panel-primary">
      <div class="panel-heading">Entri</div>
       <div class="panel-body">
        <div class="container">
		<form  method="POST" id="form1" enctype="multipart/form-data"
		action= "tunggakan_action.php">
    <div class="input-group col-md-5">
            <label>ID Tunggakan</label>
            <input type="text" name="idtunggakan" value="<?php echo $data1['idtunggakan']; ?>" class="form-control" id="idtunggakan" readonly></input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Tanggal</label>
            <input type="text" name="tanggal" value="<?php echo $data1['tanggal']; ?>" class="form-control" id="tanggal" readonly></input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>BP</label>
            <input type="text" name="NIS" value="<?php echo $data1['NIS']; ?>" class="form-control" id="NIS" readonly></input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Jumlah</label>
            <input type="text" name="jumlah" class="form-control" value="<?php echo $data1['jumlah'] ?>" readonly></input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Tunggakan</label>
            <input type="text" name="kettungakan" class="form-control" value="<?php echo $data1['kettungakan'] ?>" readonly></input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Pilih Jenis Pembayaran</label>
            <select name="jenis_pembayaran" class="form-control">
            <option value="<?php echo $data1['jenis_pembayaran']; ?>" selected="selected"><?php echo $data1['jenis_pembayaran']; ?></option>
            <option value="Cash">Cash</option>
            <option value="Transfer">Transfer Bank</option>          
            </select>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Keterangan</label>
            <textarea name="pesan" class="form-control" rows="3" placeholder="isikan keterangan tunggakan cth: Saya bayar melalui transfer BRI REK NO222222"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Bukti Transfer <span class="badge badge-success">jika lewat transfer Bank</span>  <span class="badge badge-pill cash-primary">Abaikan jika Cash</span> </label>
            <input type="file" name="nama_file">
            </div>
          </div>
		  
			<button class="btn-success" type="submit">
				Upload
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
	<script src="../assets/js/jquery.js"></script>  
    <script src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-datetimepicker.id.js"></script>
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
</html>
