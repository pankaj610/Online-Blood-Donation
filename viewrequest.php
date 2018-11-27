<!DOCTYPE html>
<html>
<head>
	<title>Request For Blood
	</title>
	<meta name="viewport" charset="utf-8" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<script type="text/javascript" src="Scripts/jquery-3.2.1.slim.min.js"></script>
	<script type="text/javascript" src="Scripts/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/testInput.js"></script>
</head>
<body>
<div class="container">

	<?php require('header.php'); ?>
	<div style="overflow-x: auto;border-collapse: collapse;
    		border-spacing: 0;
    		">
		<style type="text/css">
			tr:nth-child(even){background-color: #f2f2f2}
		</style>
		<table  class="table table-bordered table-striped table-hover table-secondary" >
		<tr>
			<td>Blood Group</td>
			<td>Name</td>
			<td>Gender</td>
			<td>Age</td>
			<td>Mobile</td>
			<td>Email</td>
		<!-- 	<td>Till Date</td> -->
			<td>Details</td>
		</tr>
		<?php 
			$con=makeconnection();
			$q="SELECT * FROM requestblood";
			$r=mysqli_query($con,$q);
			while($data=mysqli_fetch_array($r)){

				$q2="SELECT * FROM bloodgroup where bg_id='$data[4]' ";
				$r2=mysqli_query($con,$q2);
				$data2=mysqli_fetch_array($r2);

				echo "<tr>
				<td>$data2[1]</td>
				<td>$data[0]</td>
				<td>$data[1]</td>
				<td>$data[2]</td>
				<td>$data[3]</td>
				<td>$data[5]</td>
				<td>$data[6]</td>
				<tr>";
			}
			mysqli_close($con);
		 ?>
		</table>
	</div>
	<?php require('footer.php') ?>

</div>
</body>
</html>