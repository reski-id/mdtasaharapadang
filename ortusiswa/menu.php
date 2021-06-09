
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
        <?php
        $idortu= $_SESSION['idortua'];

        ?>

    <ul class="nav navbar-nav navbar-right">
    <li><a href="http://localhost/mdtatamu/ortusiswa/">Home</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-edit"></span>    Data<span class="caret"></span></a>

              <ul class="dropdown-menu">
              <li><a href="http://localhost/mdtatamu/ortusiswa/siswa/data_siswa.php"> Data Siswa<span class="sr-only">(current)</span></a></li>
         
              <li><a href="http://localhost/mdtatamu/ortusiswa/ortu/data_ortu.php"> Data Orang Tua Siswa</a></li>

              <li><a href="http://localhost/mdtatamu/ortusiswa/petunjuksms.php"> SMS Gateway</a></li>
              </ul>
              </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-edit"></span>    Absen<span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li><a href="http://localhost/mdtatamu/ortusiswa/absen/rekap_absensi.php"> Laporan Absen Sekolah<span class="sr-only">(current)</span></a></li>
              <li><a href="http://localhost/mdtatamu/ortusiswa/absensubuh/rekap_absensisbh.php">Laporan Absen Didikan Subuh</a></li>
              </ul>
              </li>

              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-education"></span>  Nilai<span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li><a href="http://localhost/mdtatamu/ortusiswa/nilai/detail_nilai.php"> Nilai Sekolah<span class="sr-only">(current)</span></a></li>
              <li><a href="http://localhost/mdtatamu/ortusiswa/nilaipembelaljaranquran/detail_nilaiquran.php">Nilai Praktek Qur'an</a></li>
              </ul>
              </li>

              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-alert"></span>   Tunggakan
              <span class="caret"></span> </a>
              <ul class="dropdown-menu">
              <li><a href="http://localhost/mdtatamu/ortusiswa/tunggakan/data_tunggakan.php"> Data Tunggakan  <span class="sr-only">(current)</span> 
              <?php 
              require_once( 'lib/koneksi.php');
              $tungsql = "SELECT t.tanggal,s.NIS,s.NamaSiswa,t.jumlah,t.kettungakan FROM tb_tunggakan t JOIN tb_siswa s ON t.NIS=s.NIS WHERE proses='N' AND s.idorangtuas='$idortu'";
              $hastung = mysqli_query($conn, $tungsql);
              $tunggakan = mysqli_num_rows($hastung);
              $mtungg="<span class=\"badge badge-light\">$tunggakan</span>";
           
              if($tunggakan>0){
                 echo $mtungg;
     
             }else{
                 $mtungg=" ";
             }?>
              </a></li>
              <li><a href="http://localhost/mdtatamu/ortusiswa/tunggakan/data_spp.php">SPP</a></li>
              </ul>
              </li>

              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-bullhorn"></span>  Pelanggaran<span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li><a href="http://localhost/mdtatamu/ortusiswa/pelanggaran/data_pelanggaran.php">Data Pelanggaran <span class="sr-only">(current)</span>
              <?php 
              require_once( 'lib/koneksi.php');
              //hitung pelanggaran
              $pelsql = "SELECT * FROM tb_pelanggaran p JOIN tb_siswa s ON p.NIS=s.NIS WHERE p.proses='N' AND s.idorangtuas=$idortu";
              $haspelanggaran = mysqli_query($conn, $pelsql);
              $pelanggaran = mysqli_num_rows($haspelanggaran);
              $mpel="<span class=\"badge badge-light\">$pelanggaran</span>";
              if($pelanggaran>0){
                  echo $mpel;

              }else{
                  $mpel=" ";
              }?>
              </a></li>
              </ul>
              </li>
  
              
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-globe"></span>  Berita<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="http://localhost/mdtatamu/ortusiswa/web/acara/data_acara.php">Acara MDTA<span class="sr-only">(current)</span></a></li>
            <li><a href="http://localhost/mdtatamu/ortusiswa/web/kalenderakademik/data_kalender.php">Kegiatan Akademik</a></li>
            </ul>
            </li>

            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span>  <?= $_SESSION['namalengkap'] ?><span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="http://localhost/mdtatamu/ortusiswa/ortu/editusername.php">Edit Kata Sandi</a></li>
            <li><a href="http://localhost/mdtatamu/ortusiswa/logout.php">Keluar</a></li>
            </ul>
            </li> 
 </div>
</div>
</nav>
<div class="modal fade" id="modalsiaran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
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
                                              <textarea type="text" class="form-control" name="pesan" placeholder="Isikan Pesan" required></textarea>
                                          </div>
                                      </div>
                              </div>
                              <div class="modal-footer">
                                  <input type="submit" class="btn btn-warning" name="inputgroup" value="KIRIM">
                              </div>
                              </form>
                          </div>
                      </div>
                  </div>
<?php
if (isset($_POST['inputgroup'])) {
                  $kelas = $_POST['Kelas'];
                  $message = $_POST['pesan'];
                  $query = mysqli_query($conn, "SELECT * FROM tb_siswa WHERE KodeKls='".$kelas."'");
                  while ($row = mysqli_fetch_array($query)) {
                      $query2 = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('" . $row['NoHpOrtu'] . "', '$message', 'Gammu')";
                      $hasil = mysqli_query($conn,$query2);

                      if ($hasil > 0) {
                          echo "<div class='alert alert-block alert-success'><button type='button' class='close' data-dismiss='alert'><i class='fa fa-times'></i></button><strong><i class='fa fa-check'></i> BERHASIL </strong>Pesan Berhasil di Kirim ke no " . $row['NoHpOrtu'] . "<br/></div>";
                      } else {
                          echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='fa fa-times'></i></button><strong><i class='fa fa-times'></i> MAAF! </strong>" .mysql_error()."<br/></div>";
                      }

                  }
}
?>