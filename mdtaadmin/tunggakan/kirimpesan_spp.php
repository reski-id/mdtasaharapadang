<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<?php
    include "../lib/koneksi.php";

    $NIS = htmlentities($_GET['NIS']);
    $caridata="SELECT COUNT(nis) AS 'Lunas' FROM tb_tunggakan_siswa WHERE nis='$NIS' AND Statust='Y'";
    $hcari = mysqli_query($conn, $caridata);
    $datac = mysqli_fetch_array($hcari);
    $lunas=$datac['Lunas'];
    $nunggak=12-$lunas;
              

    $hp = "SELECT o.NoHp FROM tb_siswa s INNER JOIN tb_ortu o ON s.idorangtuas=o.idortu WHERE s.NIS='$NIS'";
    $hashp = mysqli_query($conn, $hp);
    $dhp = mysqli_fetch_array($hashp);
    $nohp=$dhp['NoHp'];
  
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
  </head>
  <body>
  <?php
    include '../menu.php';
  ?>
    <div class="container">
    <div class="row">
      <div class="col-md-10">
      <div class="panel panel-primary">
      <div class="panel-heading">Kirim Pesan Tunggakan</div>
      
       <div class="panel-body">
        <div class="container">
        <form method="POST" action="kirimpesan_spp_act.php">
          <div class="form-group">
            <div class="input-group  col-md-5">
            <label>Pesan</label>
            <textarea name="pesan" class="form-control" rows="10" required>Assalamualaikum, Tunggakan SPP 2020 Lunas: <?php echo $lunas;?> Bulan, Belum Bayar:<?php echo $nunggak;?> Bulan selengkapnya: lihat di Web MDTA Sahara
            </textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group col-md-5">
            <label>Nohp</label>
            <input type="text" name="nohp" class="form-control" value="<?php echo $nohp?>"></input>
            
             </div>
          </div>
          <a name="Batal" id="Batal" class="btn btn-info" href="data_tunggakan.php" role="button">Batal</a>
        <input type="submit" class="btn btn-primary" name="submit" value="Kirim Pesan"></input><br>
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
