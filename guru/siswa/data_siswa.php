<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/guru/login.php');
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="../assets/css/navbar-static-top.css" rel="stylesheet">

    <!-- datatables -->
    <link href="../assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
  <?php
    include '../menu.php';
    $KodeKls = isset($_POST['KodeKls'])? $_POST['KodeKls'] : '';
  ?>
  <div class="container">
  <div class="row col-md-12 col-lg-12 col-xs-12 col-sm-12">
  <legend>Data Siswa</legend>
  <p><a href="tambah_data_siswa.php"><button type="button" class="btn btn-danger">Tambah Data</button></a></p>
  <div class="form-group">
            <div class="input-group">
              <form method="post" action="">
            <label>Pilih Kelas</label>
            <select name="KodeKls" class="form-control" onchange="this.form.submit()">
            <option value="" selected="selected">Kelas</option>
                <?php
                  include '../lib/koneksi.php';
                  $sql = "SELECT * FROM tb_kelas";
                  $result = mysqli_query($conn, $sql);
                  while($data1=mysqli_fetch_array($result)){
                    echo "<option value=$data1[KodeKls]>$data1[NamaKls]</option>";
                  }
                ?>
            </select>
           <span class="input-group-btn">
    </span>
          </form>
            </div>
          </div>
  <div class="table-responsive">
  <table class="table table-condensed table-bordered" id="table">
      <thead>
      <tr>
        <th width='5'>No.</th>
        <th>BP</th>
        <th>Nama Siswa</th>
        <th>Jenis Kelamin</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Agama</th>
        <th>Alamat</th>
        <th>Kode Kelas</th>
        <th>Kode Kelompok</th>
        <th>KodeOrtu</th>
        <th align="center">Aksi</th>
      </tr>
      </thead>
    <tbody>


    <?php
        include '../lib/koneksi.php';
        if (isset($_POST['KodeKls']))
        $filt="WHERE KodeKls=".$_POST['KodeKls']."";
    else
      $filt=" ";
        $sql = "SELECT * FROM tb_siswa $filt";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<td colspan='11'>Data kosong. Silakan tambah data!</td>";
        } else {
          $No = 1;
          while ($data = mysqli_fetch_array($result)) {
    ?>
        <tr>
        <td><?php echo $No; ?></td>
        <td><?php echo $data['NIS']; ?></td>
        <td><?php echo $data['NamaSiswa']; ?></td>
        <td><?php echo $data['JenisKelamin']; ?></td>
        <td><?php echo $data['TempatLahir']; ?></td>
        <td><?php echo $data['TanggalLahir']; ?></td>
        <td><?php echo $data['Agama']; ?></td>
        <td><?php echo $data['AlamatSiswa']; ?></td>
        <td><?php echo $data['KodeKls']; ?></td>
        <td><?php echo $data['idklmpk']; ?></td>
        <td><?php echo $data['idorangtuas']; ?></td>
        <td align="center">
        <button type="button" class="btn btn-warning">
        <a href="ubah_data_siswa.php?NIS=<?php echo $data['NIS'];?>">
        <span class="glyphicon glyphicon-edit" aria-hidden="true" title="Ubah"></span>
        </a></button>
        <button type="button" class="btn btn-danger">
        <a href="hapus_data_siswa.php?NIS=<?php echo $data['NIS'];?>">
        <span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span>
        </a></button>
        </td>
      </tr>
      <?php  
        $No++;
        }
      }
    ?>
    </tbody>
    </table>
    </div>
  </div> 
  </div>
  </div>
    <script src="../assets/js/jquery.js"></script>  
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
      $(function() {
        $("#table").DataTable();
      });

    </script>
  </body>
  <?php
  include "../footer.php";
  ?>
</html>