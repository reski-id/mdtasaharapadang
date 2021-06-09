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
  require_once ('../../lib/koneksi.php');
  $query="SELECT * from tb_video";
  $result=mysqli_query($conn,$query) or die(mysqli_error());
  $data=mysqli_fetch_array($result);
?>


<div class="container">
    <div class="row">
      <div class="col-md-10">
      <div class="panel panel-primary">
      <div class="panel-heading">Video</div>
       <div class="panel-body">
        <div class="container">
		<form  method="POST" id="form1" enctype="multipart/form-data"
		action="editlinkvideo_act.php">
		  <div class="form-group">
            <div class="input-group col-md-5 col-sm-8 col-xs-12">
            <label>Link</label>
            <input type="text" name="link" class="form-control" value="<?php echo $data ["link"];?>"/>
            </div>
            </div>
            <div class="input-group hidden">
                <input type="text" name="id" class="form-control" value="<?php echo $data ["id"];?>"/>
                </div>
            </div>
        <div class="input-group col-md-5 col-sm-8 col-xs-12">
          <a name="" id="" class="btn btn-warning" href="foto_view.php" role="button"> Batal</a> &nbsp;
        <button  class="btn btn-primary"  type="submit"> Edit</button>
        </div>
		</form>

 </div>
 </div>
 </div>
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


