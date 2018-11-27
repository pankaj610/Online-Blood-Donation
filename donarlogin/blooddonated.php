<?php 
	if(!isset($_SESSION)) {session_start();}
      require 'verifylogin.php';
      $loginid=$_SESSION['email'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Donate Blood</title>
	<meta name="viewport" charset="utf-8" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<script type="text/javascript" src="Scripts/jquery-3.2.1.slim.min.js"></script>
	<script type="text/javascript" src="Scripts/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<?php require('header.php'); ?>
	<?php require('dbcon.php'); ?>
	<?php require ('testInput.php'); ?>

	

</body>
</html>