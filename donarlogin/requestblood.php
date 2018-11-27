<!DOCTYPE html>
<html>
<head>
	<title>Request Blood</title>
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
	<?php require('header.php') ?>
	
	<?php
		$errrequest="";
		if(isset($_POST["sbmt"]))
		{
					$email=testInput($_POST["emailb"]);
			 		$name=testInput($_POST["rname"]);
			 		$gender=testInput($_POST["gender"]);
			 		$age=testInput($_POST["age"]);
			 		$mobile=testInput($_POST["mobile"]);
			 		$b_id=testInput($_POST["b_id"]);
			 		$detail=testInput($_POST["detail"]);

			 		$con=makeconnection();
			 		$query="INSERT INTO requestblood(rname,gender,age,mobile,b_id,email,detail) VALUES('$name','$gender','$age','$mobile','$b_id','$email','$detail');";

			 		if($con->query($query) === TRUE)
			 		{
			 			$errrequest="Requested Successfully";
			 		}else{
			 			$errrequest="Error.";
			 		}
			 		mysqli_close($con);
	      }	
	 ?>
<div>
  <div align="left" class="img-fluid" style=" width: 100%;height:460px;">
	<div>
		<img src="images/blooddonation.jpg" style="width:60%;float: left;">
	</div>
	<div align="left" style="float:right;padding: 10px;">
	<img src="images/brequest.png">
	<form class="form" name="donarform" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
		<table >
			<tr class="form-group">
				<td>Name </td>
				<td><input class="form-control" type="text" name="rname"  pattern="[a-zA-Z 0-9]{4,16}" title="Please Enter Only 4-15 Character."></td>
			</tr>
			<tr class="form-group">
				<td>Gender</td>
				<td><input type="radio" name="gender" value="male" checked>Male<input type="radio" name="gender" value="female">Female</td>
			</tr>
			<tr class="form-group">
				<td>Age</td>
				<td><input class="form-control" type="number" name="age" title="Please Enter Age Between 20-28." ></td>
			</tr>
			<tr class="form-group">
				<td>Mobile</td>
				<td><input class="form-control" type="number" name="mobile" pattern="[0-9]{10,13}" title="Please Enter Mobile Number." ></td>
			</tr>
			<tr class="form-group">
				<td>Blood Group</td>
				<td><select class="form-control" name="b_id" >
					<option>Select</option>
					<?php 
						$con=makeconnection();
						$q="select * from bloodgroup";
						$result=mysqli_query($con,$q);
						while($data=mysqli_fetch_array($result)){
							echo "<option value=$data[0]>".$data[1]."</option>";
   						}
   						mysqli_close($con);
					 ?>
				</select></td>
			</tr>
			<tr class="form-group">
				<td>Email</td>
				<td><input class="form-control" type="email" name="emailb" title="Please Enter Valid Mobile Number." ></td>
			</tr>
			<tr class="form-group">
				<td>Detail</td>
				<td><textarea class="form-control" name="detail" title="Please Provide Additional Details." rows="2" cols="40"></textarea></td>
			</tr>
			<tr class="form-group">
				<td>
					<button type="submit" name="sbmt" class="btn btn-primary">Submit</button> 
				</td>
				<td><?php echo $errrequest; ?></td>
			</tr>
		</table>
	</form>
  </div>
 </div>
</div>
	<?php require('footer.php') ?>
</div>
</body>
</html>