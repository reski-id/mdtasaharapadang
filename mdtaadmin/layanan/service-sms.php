<?php
session_start();
if($_SESSION['StatusLogin']=="OK")
{
  ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/navbar-static-top.css" rel="stylesheet">
    <link href="../assets/css/sticky-footer-navbar.css" rel="stylesheet">
    

  </head>

  <body>
  <?php
  include '../menu.php';
  ?>
     
    <?php
    ?>
    <!-- Begin page content -->
    <div class="container well">
    <div class="page-header">
    <div align="center" col-md-6>
    <?php
    
    if (isset($_POST['submit']))
    {
        passthru("C:\gammu\bin\gammu-smsd -c smsdrc -s");
    }
    else
    {
        echo "<form method='post' action=".$_SERVER['PHP_SELF'].">";
        echo "<input type='submit' name='submit' value='Jalankan Service Gammu'>";
        echo "</form>";
    }
    ?>

    </div>
    </div>
    </div>
    </div>
    

    <?php
      include '../footer.php';
    ?>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    
  </body>
</html>
<?php
}
else
{
 header("location:../login.php");
}
?>
