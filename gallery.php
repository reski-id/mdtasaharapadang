<style type="text/css">
<!--
body,td,th {
color: #333333;
}
body {
background-color: #FFFFFF;
}
-->
</style>
<div class="col-sm-8">
<div class="panel panel-primary">
  <div class="panel-heading"><b>Gallery</b></div>
    <div class="panel-body">
    <div class="card mb-8">

    <?php
        include "photo/foto_view.php";
    ?>
    </div>
  </div> 
</div>
<div class="panel panel-primary">
  <div class="panel-heading"><b>Profile MDTA Sahara Padang Pasir </b></div>
    <div class="panel-body">
    <?php
      require_once ('mdtaadmin/lib/koneksi.php');
      $query="select link from tb_video";
      $result=mysqli_query($conn,$query) or die(mysqli_error());
      $no=1;
      while($rows=mysqli_fetch_array($result))
      $link =$rows["link"];
?>
<div
    <div class="embed-responsive embed-responsive-4by3">
      <iframe width="560" height="315" src=<?php echo $link;?> frameborder="0" allowfullscreen></iframe>
      </div>
  </div>
</div>
</div>