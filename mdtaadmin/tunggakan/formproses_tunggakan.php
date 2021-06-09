<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<?php
    include "../lib/koneksi.php";

    $idtunggakan = htmlentities($_GET['idtunggakan']);
    $sql = "SELECT * FROM tb_tunggakan WHERE idtunggakan = '$idtunggakan'";
    $result = mysqli_query($conn, $sql);
    $data1 = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MDTA SAHARA PADANG</title>
    
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
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
    <div class="container">
    <div class="row">
      <div class="col-md-10">
      <div class="panel panel-primary">
      <div class="panel-heading">Proses Tunggakan</div>
       <div class="panel-body">
        <div class="container">
        <form method="POST" action="proses_tunggakan.php">
          <div class="form-group">
            <div class="input-group col-md-5 hidden">
            <label>ID Tunggakan</label>
            <input type="text" name="idtunggakan" value="<?php echo $data1['idtunggakan']; ?>" class="form-control" id="idtunggakan" readonly></input>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Tanggal</label>
            <input type="text" name="tanggal" value="<?php echo $data1['tanggal']; ?>" class="form-control" id="idtunggakan" readonly></input>
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
            <textarea name="pesan" class="form-control" rows="5" placeholder="isikan keterangan tunggakan cth: Saya bayar melalui transfer BRI REK NO222222"><?php echo $data1['pesan']; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
            <label>Bukti Transfer </label> <br>
            <img src="http://localhost/mdtatamu/ortusiswa/tunggakan/foto/<?php echo $data1['bukti_bayar']; ?>" alt="<?php echo $data1['bukti_bayar']; ?>" width=500 height=400 class="img-thumbnail">
           
            </div>
          </div>
         
        <a name="Batal" id="Batal" class="btn btn-primary" href="data_tunggakan.php" role="button">Batal</a>
        <input type="submit" class="btn btn-danger" name="submit" value="Validasi"></input><br>
      </form><br>
      </div>
    </div>
  </div>
  </div>
    </div>
  </div>
  <?php
      include '../footer.php';
  ?>
    <script src="../assets/js/jquery.js"></script>  
    <script src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-datetimepicker.id.js"></script>
    <script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "dd MM yyyy - HH:ii P",
        showMeridian: true,
        autoclose: true,
        todayBtn: true
    });
</script> 
  </body>
</html>
