<?php 
	if(!isset($_SESSION)) {session_start();}
      require 'verifylogin.php';
      $loginid=$_SESSION['email'];
      $errpass="";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<meta name="viewport" charset="utf-8" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<script type="text/javascript" src="Scripts/jquery-3.2.1.slim.min.js"></script>
	<script type="text/javascript" src="Scripts/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
		<?php require('header.php'); ?>

		<script type="text/javascript">
		function formValidation(){
			var pass1=document.forms["changepassform"]["newpass1"].value;
		    var pass2=document.forms["changepassform"]["newpass2"].value;
		    if(pass1 == pass2)
		    {return true;}else{
		    	document.getElementById("errpass").style.color='red';
		    	document.getElementById("errpass").innerHTML="* Password not match.";
		    	return false;
		    }
		};

	</script>
	<?php
if(isset($_POST["submit"])){
	$con=makeconnection();
	$oldpass=testInput($_POST["oldpass"]);
	$pass=testInput($_POST["newpass1"]);
	$q="SELECT * FROM donarsignup WHERE email='$loginid' AND pass='$oldpass'; ";
	$r=mysqli_query($con,$q);
	if(mysqli_num_rows($r)==1){
		$q2="UPDATE donarsignup SET pass='$pass' WHERE email='$loginid';";
		if($con->query($q2)==true){
			$errpass="Password Successfully Changed.";
		}else{
			$errpass="Error.";
		}
	}else{
		$errpass="Wrong Password.";
	}
}	
?>
<br>
<div  style="height: 270px;width: 100%;padding: 10px" align="center">
	<div  style="width: 400px;height: 250px;background-color: #FFA597;padding:15px;align-content: center;
border-radius: 15px 15px 15px 15px;
border:2px solid red;
  left: 50%;">
		<form class="form" method="POST" onsubmit="return formValidation()" enctype="multipart/form-data" name="changepassform">
			<table>
			<tr><h1>Change Password</h1></tr>
			<tr class="form-group">
				<td>Old Password</td>
				<td><input class="form-control" type="password" name="oldpass" pattern="[a-zA-Z0-9 @]{8,15}" title="Please Enter Password 8-15 Character Long.Only alphabet ,numbers,whitespaces and @ Character are allowed." ></td>
			</tr>
			<tr class="form-group">
				<td>Password</td>
				<td><input class="form-control" type="password" name="newpass1" pattern="[a-zA-Z0-9 @]{8,15}" title="Please Enter Password 8-15 Character Long.Only alphabet ,numbers,whitespaces and @ Character are allowed." ></td>
			</tr>
			<tr class="form-group">
				<td>Confirm Password</td>
				<td><input class="form-control" type="password" name="newpass2" pattern="[a-zA-Z0-9 @]{8,15}" title="Please Enter Password 8-15 Character Long.Only alphabet ,numbers,whitespaces and @ Character are allowed."></td>
				<td><p id="errpass"></p></td>
			</tr>
				<tr>
					<td><button type="submit" name="submit" class="btn btn-danger">Change</button></td>
					<td></td>
					<td><?php echo $errpass ?></td>
				</tr>
			</table>
		</form>
	</div>
</div>
<br>
		<?php require 'footer.php'; ?>
</div>
</body>
</html>
