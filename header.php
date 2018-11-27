<div><img class="img-fluid" src="images/Untitled.jpg" style="float:center;"></div>

<nav style="padding:0px;background-color:#ebebe0" class="navbar navbar-inverse navbar-expand-lg navbar-light sticky-top" >
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"><span class="navbar-toggler-icon"></span></button>
	<div  class="collapse navbar-collapse" id="navigation">
		<div id="home" class="navbar-header">
			<a class="navbar-brand" href="index.php" style="padding-left:5px;"> HOME </a>
		</div>
		<ul class="navbar-nav navbar-left">
			<li id="search" class="nav-item"><a class="nav-link" href="searchblood.php">SEARCH BLOOD</a></li>
			<li id="requestblood" class="nav-item"><a class="nav-link" href="requestblood.php">REQUEST BLOOD</a></li>
			<li id="viewrequest" class="nav-item"><a class="nav-link" href="viewrequest.php">VIEW REQUESTS</a></li>
			<li id="about" class="nav-item"><a class="nav-link" href="about.php">ABOUT US</a></li>
		</ul>
		<ul class="navbar-nav navbar-right">
		<form class="form-inline" method="POST" enctype="multipart/form-data">
			<input class="form-control" type="email" name="email" placeholder="Email" title="Please Enter Valid Email Address." required>
			<input class="form-control" type="password" pattern="[a-zA-Z0-9 @]{8,15}" title="Please Enter Password 8-15 Character Long.Only alphabet ,numbers,whitespaces and @ Character are allowed." name="pass" placeholder="Password" required>
			<button type="submit" class="btn btn-danger" name="submitlogin"><span class="glyphicon glyphicon-log-in">LOGIN</button>
		</form>
			<li class="nav-item">
			  <form action="signup.php" method="POST">
				<button type="submit" class="btn btn-info" >SIGN UP</button>
			  </form>
			</li>
		</ul>
	</div>
</nav>

	<?php
	require 'testInput.php';
	require ('admin/dbcon.php');
	if(isset($_POST['submitlogin'])){
		
		
		$con=makeconnection();
		$email=testInput($_POST["email"]);
		$pass=testInput($_POST["pass"]);
		$query="SELECT * FROM donarsignup WHERE email='$email' and pass='$pass' ";
		$queryresult=mysqli_query($con,$query);
		$rows=mysqli_num_rows($queryresult);
		
		if($rows>0){
			$_SESSION["email"]=$email;
			$_SESSION["loginstatus"]="true";
			echo "<script>location.replace('donarlogin/donar.php');</script>";
		}else{
			$q="SELECT * FROM donarsignup WHERE email='$email' ";
			$r=mysqli_query($con,$q);
			$rows=mysqli_num_rows($r);
			if($rows>0){
				echo "<script>alert('Wrong Password.');</script>";
			}else{
				echo "<script>alert('User Not Registered.');</script>";
			}
		}
		mysqli_close($con);
	}
	?>

