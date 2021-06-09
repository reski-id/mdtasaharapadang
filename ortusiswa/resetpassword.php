<html>
<head>
<title>MDTA Sahara Padang</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />

<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/css/login.css"/>
	
<script type="text/javascript" src="assets/jquery/jquery-2.0.2.min.js"></script>

<script type="text/javascript">
$(function(){
   $('.alert').hide();
   $('.reset-form').submit(function(){
      $('.alert').hide();
      if($('input[name=nohp]').val() == ""){
         $('.alert').fadeIn().html('Kotak input <b>Nohp</b> masih kosong!');
      }else if($('input[name=nis]').val() == ""){
         $('.alert').fadeIn().html('Kotak input <b>NIS</b> masih kosong!');
      }else{
         $.ajax({
            type : "POST",
            url : "resetcek.php",
            data : $(this).serialize(),
            success : function(data){
               if(data == "ok") window.location = "resetpassword.php";	
               else $('.alert').fadeIn().html(data);	
            }
         });
      }
      return false;
   });
});
</script>


</head>
<body>

<div class="container-fluid"> 	
   <div class="row">
      <div class="col-md-4 col-md-offset-4">

<div class="alert alert-danger" role="alert"> </div>
		
<div class="list-group">
   <div class="list-group-item active">
      <h3 class="text-center">Reset Password</h3>
   </div>
   <div class="list-group-item list-group-item-info">
				  
<form class="reset-form">   
   <div class="input-group">
      <div class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></div>
      <input type="text" name="nohp" placeholder="Masukkan Nomor HP" autofocus autocomplete="off" class="form-control">
   </div><br/>
	
   <div class="input-group">
      <div class="input-group-addon"><i class="glyphicon glyphicon-check"></i></div>
      <input type="text" name="nis" placeholder="Masukkan salah satu NIS Anak anda" autocomplete="off" class="form-control">
   </div><br/>
	
   <button class="btn btn-primary pull-right login-button"> OK
   </button> 
   <a name="" id="" class="btn btn-primary" href="login.php" role="button" data-toggle="tooltip" data-placement="bottom" title="Kembali"><i class="glyphicon glyphicon-circle-arrow-left"></a></i>
 
   
</form>
 
   </div>
</div>

      </div>
   </div>
</div>

</body>
</html>
