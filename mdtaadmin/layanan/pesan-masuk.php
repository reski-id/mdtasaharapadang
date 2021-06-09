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

    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="../assets/css/navbar-static-top.css" rel="stylesheet">
    <link href="../assets/font-awesome-4.6.3/css/font-awesome.css" rel="stylesheet">
    <link href="../assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
<?php
  include "../menu.php";
?>
  <div class="container">
  <div class="row">
  <legend>Pesan Masuk</legend>
    <table class="table table-condensed table-bordered" id="table">
      <thead>
      <tr>
        <th>No.</th>
        <th>Pengirim</th>
        <th>Pesan</th>
        <th>Terkirim</th>
        <th>Diterima</th>
        <th>Balasan</th>
        <th>Aksi</th>
      </tr>
      </thead>
    <tbody>
    <?php
        include '../lib/koneksi.php';
        $sql = "SELECT * FROM inbox";
        $result = mysqli_query($conn, $sql);
        while($data = mysqli_fetch_array($result))
        {
            ?>
        <tr>
        <td><?php echo $data['ID']; ?></td>
        <td><?php echo $data['SenderNumber']; ?></td>
        <td><?php echo $data['TextDecoded']; ?></td>
        <td><?php echo $data['ReceivingDateTime']; ?></td>
        <td><?php echo $data['UpdatedInDB']; ?></td>
        <td><?php echo $data['Processed']; ?></td>
        <td>
        <button type="button" class="btn btn-warning">
        <a href="hapus-pesan-masuk.php?ID=<?php echo $data['ID'];?>">
        <span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span>
        </a></button>
        </td>
        </tr>
    <?php  
        }
    ?>

    </tbody>
    </table>
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
