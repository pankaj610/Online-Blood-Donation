<?php 
if(!isset($_SESSION)) {
	  session_start();
	}
	
      require 'verifylogin.php';
?>
<div><img class="img-fluid" src="images/Untitled.jpg" style="float:center;"></div>
<?php require('dbcon.php'); ?>
<?php require('testInput.php'); ?>
<nav style="padding:0px;background-color:#ebebe0" class="navbar navbar-expand-sm navbar-light sticky-top" >
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"><span class="navbar-toggler-icon"></span></button>
	<div  class="collapse navbar-collapse" id="navigation">
		<div id="home" class="navbar-header">
			<a class="navbar-brand btn btn-danger" href="donar.php" style="padding-left:5px"> DONAR</a>
		</div>
		<ul class="nav  navbar-nav navbar-left">
			<li id="search" class="nav-item"><a class="nav-link" href="searchblood.php">SEARCH BLOOD</a></li>
			<li id="requestblood" class="nav-item"><a class="nav-link" href="requestblood.php">REQUEST BLOOD</a></li>
			<li id="viewrequest" class="nav-item"><a class="nav-link" href="viewrequest.php">VIEW REQUESTS</a></li>
			<li id="about" class="nav-item"><a class="nav-link" href="about.php">ABOUT US</a></li>
		</ul>	
	</div>
			<li class="nav navbar-nav nav-item dropdown justify-content-end">
				<a class="nav-link dropdown-toggle" href="#" id="navdrop" data-toggle="dropdown">
					More Options
				</a>
				<div class="dropdown-menu">
				 <a class="dropdown-item" href="blooddonated.php">Blood Donated</a>
				 <a class="dropdown-item" href="viewdonations.php">View Donations</a>
				 <a class="dropdown-item" href="updateprofile.php">Update Profile</a>
				 <a class="dropdown-item" href="changepass.php">Change Password</a>
				</div>
			</li>
			<form action="logout.php" method="POST">
			<button  type="submit" class="nav-item dropdown justify-content-end btn btn-info" target="logout.php">LOGOUT</button>
			</form>
</nav>
<?php require 'verifylogin.php'; ?>



