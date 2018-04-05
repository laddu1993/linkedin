<?php

	if (isset($_REQUEST['success'])) {
		echo "<script> alert('Successfully Register'); </script>";		
	}

?>
<!DOCTYPE html>
<html>
<head>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
	<title> Login </title> 	
</head>
<body>

<div class="container"> 	

<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" action="login_check.php" method="POST" name="login_form" onsubmit="return login();"> 	
			<fieldset>
				<h2 style="color: green; font-weight: 700; "> Please Sign In </h2> 	
				<?php
	   
				   if(isset($_REQUEST['msg_invalid']))
				   {
					   $msg_invalid=$_REQUEST['msg_invalid'];
					   echo "<h6 style='color:red; text-align:center;'>".$msg_invalid."</h6>";	 
				   }
				   
				   if(isset($_REQUEST['msg_logout']))
				   {
					   $msg_logout=$_REQUEST['msg_logout'];
					   echo "<h6 style='color:green; text-align:center;'>".$msg_logout."</h6>";	
				   }
				   
				   if(isset($_REQUEST['msg']))
				   {
					   $msg=$_REQUEST['msg'];
					   echo "<h6 style='color:red; text-align:center;'>".$msg."</h6>";	
				   }
				  
				?> 	
				<hr class="colorgraph"> 	
				<div class="form-group"> 	
                    <input type="email" name="email" id="vr_email" class="form-control input-lg" placeholder="Email Address">
				</div> 	
				<div class="form-group"> 	
                    <input type="password" name="password" id="vr_password" class="form-control input-lg" placeholder="Password">
				</div>
				
				<hr class="colorgraph"> 	
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="Sign In">
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<a href="register_form.php" class="btn btn-lg btn-primary btn-block">Register</a>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>

</div>

<script type="text/javascript" src="validation.js"></script>
</body>
</html>