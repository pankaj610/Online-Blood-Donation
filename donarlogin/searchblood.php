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
	<?php  require('header.php'); ?>
<div align="center">
  <div class="col-13" align="left" style="padding: 10px;height: 150px;">
	<img src="images/search.png" width="200">

<br><br>
	<form method="POST" enctype="multipart/form-data">
		<table class="form">
			<tr>
				<td ><select class="form-control " name="bg" >
					<option value="select">Select</option>
					<?php 
					$con=makeconnection();
					$q="SELECT * FROM bloodgroup";
					$r=mysqli_query($con,$q);
					while($data=mysqli_fetch_array($r)){

						echo "<option value='$data[0]'>$data[1]</option>";

					}
					mysqli_close($con);
					?>
				</select>
				</td>
				<td><button class="btn btn-danger" type="submit" name="search" >Search</button></td>
			</tr>
		</table>
	</form>
	</div>
  </div>

<?php 
	if(isset($_POST["search"])){
		$bgid=$_POST['bg'];
		require 'searchresult.php';
	}


			/*$bgid=testInput($_POST["bg"]);
		echo "<script>location.replace('searchresult.php?bgid=$bgid')</script>";*/
?>

<?php require('footer.php') ?>



</div>
</body>
</html>