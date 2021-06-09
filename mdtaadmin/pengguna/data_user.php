<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['password'])){
   header('location: http://localhost/mdtatamu/mdtaadmin/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MDTA SAHARA PADANG</title>

    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="../assets/css/navbar-static-top.css" rel="stylesheet">

   
  </head>
  <body>
<?php
  include '../menu.php';
?>
  <div class="container">
  <div class="row">
  <div class="col-lg-8">
  <legend>Data Pengguna</legend>
    <table class="table table-condensed table-bordered table-striped" id="tabeluser">
      <thead>
      <tr>
        <th>No.</th>
        <th>Username</th>
        <th>Level</th>
        <th>Status</th>
        <th align="center">Aksi</th>
      </tr>
      </thead>
    <tbody>
    
    <?php
        include '../lib/koneksi.php';
        $sql = "SELECT * FROM tb_user";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
          echo "<td colspan='5'><span class='badge badge-pill badge-warning'>Data tidak di temukan</span></td>";
          
        } else {
          $No = 1;
          while ($data = mysqli_fetch_array($result)) {
    ?>

      <tr>
        <td><?php echo $No; ?></td>
        <td><i>Username_User<?php echo $No;?></i></td>
        <td>
        <?php
        if($data['tingkat']=='Admin'){
          echo "<span class='badge badge-pill badge-danger'>Admin</span>"; 
        } else{
          echo "Guru";
        }

        ?>
        </td>
        <td><?php echo $data['aktif']; ?></td>
        <td align="center">
        <a href="ubah_data_user.php?iduser=<?php echo $data['iduser'];?>">
        <button class="btn btn-warning">
        <span class="glyphicon glyphicon-edit" aria-hiduserden="true" title="Ubah"></span>
        </a></button>
        <button class="btn btn-danger">
        <a href="hapus_data_user.php?iduser=<?php echo $data['iduser'];?>">
        <span class="glyphicon glyphicon-trash" aria-hiduserden="true" title="Hapus"></span>
        </button>
        </a>
        </td>
      </tr>
       <?php  
        $No++;
        }
      }
    ?>
    <td colspan=5 align=center> 
    <a href="../pengguna/tambah_data_user.php"><button type="button" class="btn btn-success btn-block">Tambah Data</button></a>
    </td>
    </tbody>
    </table>
    </div>
    
  </div>
  </div>
  
  <?php
      include '../footer.php';
  ?>

    <script src="../assets/js/jquery.js"></script>  
    <script src="../assets/js/bootstrap.min.js"></script>
    
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap.min.js"></script>

  </body>
</html>