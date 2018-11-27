<?php 
		if(!isset($_SESSION)) {session_start();}
 		require 'verifylogin.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Donar Login</title>
	<meta name="viewport" charset="utf-8" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<script type="text/javascript" src="Scripts/jquery-3.2.1.slim.min.js"></script>
	<script type="text/javascript" src="Scripts/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
		<?php require 'header.php'; ?>


<h1>Successfully Logged IN</h1>


		<?php require 'footer.php'; ?>
</div>
</body>
</html>
<?php
	
?>