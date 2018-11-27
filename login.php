<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Search Blood</title>
	<meta name="viewport" charset="utf-8" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<script type="text/javascript" src="Scripts/jquery-3.2.1.slim.min.js"></script>
	<script type="text/javascript" src="Scripts/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">

	<?php require('header.php')?>
	<?php require ('admin/dbcon.php'); ?>
	<h1>Login</h1>
	<div>
		<form class="form" method="POST" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Email</td>
					<td><input class="form-control" type="text" name="email"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input class="form-control" type="password" pattern="[a-zA-Z0-9 @]{8,15}" title="Please Enter Password 8-15 Character Long.Only alphabet ,numbers,whitespaces and @ Character are allowed." name="pass"></td>
				</tr>
				<tr>
					<td><button type="submit" name="submit">Login</button></td>
					<td></td>
				</tr>
			</table>
		</form>
		<p>Not Registered?<a href="signup.php">Click Here</a></p>
	</div>

	<?php
	$_SESSION["loginstatus"]="";

	if(isset($_POST['submit'])){
		require 'testInput.php';
		$con=makeconnection();
		$email=testInput($_POST["email"]);
		$pass=testInput($_POST["pass"]);
		$query="SELECT * FROM donarsignup WHERE email='$email' and pass='$pass' ";
		$queryresult=mysqli_query($con,$query);
		$rows=mysqli_num_rows($queryresult);
		mysqli_close($con);
		if($rows>0){
			$_SESSION["email"]=$email;
			$_SESSION["loginstatus"]="true";
			echo "<script>location.replace('donarlogin/donar.php');</script>";
		}
	}
	?>
	<?php require 'footer.php'; ?>

</div>
</body>
</html>