<?php
	session_start();
	$name = $_SESSION['username'];  

?>

<!DOCTYPE html> 	
<html>
<head>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
	<title> Wellcome Page </title> 	
</head>
<body>

<div class="jumbotron">
  <h1 class="display-4"> Hello <?php echo $name; ?> </h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <p class="lead">
    <a class="btn btn-danger btn-lg" href="logout.php" role="button">Logout</a>
  </p>
</div>

	<!-- <h2> Hello <?php //echo $name; ?> </h2> -->

</body>
</html>