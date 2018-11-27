<?php session_start(); ?>


<!DOCTYPE html>
<html>   
<head>
	<meta name="viewport" charset="utf-8" content="width=device-width,initial-scale=1.0">
	<title>Blood Bank</title>
	<link rel="stylesheet" type="text/css" href="css/front.css">
	<script type="text/javascript" src="Scripts/jquery-3.2.1.slim.min.js"></script>
	<script type="text/javascript" src="Scripts/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/body.css">

	<script src="js/jssor.slider-27.1.0.min.js" type="text/javascript"></script>

	<style type="text/css">
		#home{
			background-color: red;
		}
	</style>
</head>
<body >
<div class="container" style="position: relative;">

	<?php require('header.php');?>

	<img src="images/LisaResize.jpg" class="img-fluid">
	<br>
	<?php require('slider.php') ?>
<br>

	<div id="news" style="background-color: #c5c5c5">
	  <div>
		<div style="background-color:#f5f5f5;height:40px;width:10%;float:left;padding: 8px;text-align: center">News</div>
		<div style="background-color: #f5f5f5;float:left;height:40px;width:90%;padding: 8px">
			<marquee>This Website is an address which can save your life. From all countries, from the most common blood group to the rarest, the site has a huge database of blood donors. So if you need blood, it's a good place to turn to. It's simple. It's effective. It's Free. It can match you with a donor near you in minutes. And you can save the life of a loved one. You can also Sign up as a donor at the site and save the life of someone else's loved one. Pass the message and let's build a community that cares !</marquee>
		</div>
		<br>
		
		  <div style="background-color: white;height:230px;width:  70%;float:left;position: relative;">
			<p style="padding: 20px;position: absolute;">
				Blood is universally recognized as the most precious element that sustains life. It saves innumerable lives across the world in a variety of conditions. The need for blood is great - on any given day, approximately 39,000 units of Red Blood Cells are needed. More than 29 million units of blood components are transfused every year.
Donate Blood 	
Despite the increase in the number of donors, blood remains in short supply during emergencies, mainly attributed to the lack of information and accessibility.

We positively believe this tool can overcome most of these challenges by effectively connecting the blood donors with the blood recipients.
			</p>
		  </div>
		<div style="background-color: brown;float:left;height:230px;width:30%;padding: 1px">
			<div style="float:left;width:100%;padding:5px">
		  		<?php require 'carousel.php'; ?>
		  	</div>
	    </div>
	 </div>
    </div>
    <br>
    
	<!-- <div style="background-color: ;color:white;padding: 30px">
		<div class="welcome">
		<img src="images/welcome.png" style="width:30%" id="logo">
		<p>Blood is universally recognized as the most precious element that sustains life. It saves innumerable lives across the world in a variety of conditions. The need for blood is great - on any given day, approximately 39,000 units of Red Blood Cells are needed. More than 29 million units of blood components are transfused every year.
Donate Blood 	
Despite the increase in the number of donors, blood remains in short supply during emergencies, mainly attributed to the lack of information and accessibility.

We positively believe this tool can overcome most of these challenges by effectively connecting the blood donors with the blood recipients.</p>
		</div>
	</div> -->
<br>
<?php require('footer.php') ?>
</div>
</body>
</html>