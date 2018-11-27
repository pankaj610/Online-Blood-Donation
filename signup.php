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
	<script type="text/javascript" src="js/testInput.js"></script>


</head>
<body>

<div class="container">
	<script type="text/javascript">
		function formValidation(){
			var pass1=document.forms["donarform"]["pass1"].value;
		    var pass2=document.forms["donarform"]["pass2"].value;
		    if(pass1 == pass2)
		    {return true;}else{
		    	alert('Password not match.');
		    	//document.getElementById("errpass").style.color='red';
		    	//document.getElementById("errpass").innerHTML="* Password not match.";
		    	return false;
		    }
		};
	</script>
	<?php require('header.php') ?>
	<?php
		$errphoto="";
		$errregister="";
		if(isset($_POST["submit"]))
		{
			
			$email=testInput($_POST["email"]);
			$con=makeconnection();
			$q="SELECT * FROM donarsignup WHERE email='$email' ";
			$res=mysqli_query($con,$q);
			$r=mysqli_num_rows($res);
			if($r>0){
			$errregister="User Already Registered";}else{

			mkdir("donarpic/$email/");
			$target_dir="donarpic/$email/";
			$target_file=$target_dir.basename($_FILES["photo"]["name"]);
			$uploadOk=1;
			$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			 
			 if(file_exists($target_file)){
			 	$errphoto="Sorry, file already exists.";
			 	$uploadOk=0;
			 }
			 if ($_FILES["photo"]["size"] > 5000000) {
            $errphoto="Sorry, your file is too large.";
              $uploadOk = 0;
				}
			 if($imageFileType != "jpg" && $imageFileType !="png" && $imageFileType !="jpeg" && $imageFileType !="gif"){
			 	$errphoto="File should be only jpg, jpeg, png, gif .";
			 	$uploadOk=0;
			 }
			if($uploadOk==1){
			 	move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
			 
			 		$name=testInput($_POST["dname"]);
			 		$gender=testInput($_POST["gender"]);
			 		$age=testInput($_POST["age"]);
			 		$mobile=testInput($_POST["mobile"]);
			 		$b_id=testInput($_POST["b_id"]);
			 		$pass=testInput($_POST["pass1"]);
			 		$photo=basename($_FILES["photo"]["name"]);
			 		$query="insert into donarsignup(name,gender,age,mobile,b_id,email,pass,photo) values('$name','$gender','$age','$mobile','$b_id','$email','$pass','$photo')";
			 		if($con->query($query) === TRUE)
			 		{
			 			$errregister="Registered Successfully";
			 		}else{
			 			$errregister="Sorry, Registration Failed.";
			 		}
			 		mysqli_close($con);
			    }
			 
			}
		}
	 ?>
<div style="">
  <div style="width:100%;padding: 10px;" align="center">
	<img src="images/donor.png" style="padding-right: 50px" width="400"><br><br>
	<form class="form" name="donarform" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return formValidation()" enctype="multipart/form-data">
		<table >
			<tr class="form-group">
				<td>Donar Name </td>
				<td><input class="form-control" type="text" name="dname"  pattern="[a-zA-Z 0-9]{4,16}" title="Please Enter Only 4-15 Character."  required></td>
			</tr>
			<tr class="form-group">
				<td>Gender </td>
				<td><input type="radio" name="gender" value="male" checked>Male<input type="radio" name="gender" value="female" required>Female</td>
			</tr>
			<tr class="form-group">
				<td>Age (20-28)</td>
				<td><input class="form-control" type="number" name="age" title="Please Enter Age Between 20-28."  required></td>
			</tr>
			<tr class="form-group">
				<td>Mobile</td>
				<td><input class="form-control" type="number" name="mobile" pattern="[0-9]{10,13}" title="Please Enter Mobile Number."  required></td>
			</tr>
			<tr class="form-group">
				<td>Blood Group</td>
				<td><select class="form-control" name="b_id"  required>
					<option>Select</option>
					<?php
						$con=makeconnection();
						$q="select * from bloodgroup";
						$result=mysqli_query($con,$q);
						$rows=mysqli_num_rows($result);
						while($data=mysqli_fetch_array($result)){
							echo "<option value=$data[0]>".$data[1]."</option>";
   						}
   						mysqli_close($con)
					 ?>
				</select></td>
			</tr>
			<tr class="form-group">
				<td>Email</td>
				<td><input class="form-control" type="email" name="email" title="Please Enter Valid Mobile Number."  required></td>
			</tr>
			<tr class="form-group">
				<td>Password</td>
				<td><input class="form-control" type="password" name="pass1" pattern="[a-zA-Z0-9 @]{8,15}" title="Please Enter Password 8-15 Character Long.Only alphabet ,numbers,whitespaces and @ Character are allowed."  required></td>
			</tr>
			<tr class="form-group">
				<td>Confirm Password</td>
				<td><input class="form-control" type="password" name="pass2" pattern="[a-zA-Z0-9 @]{8,15}" title="Please Enter Password 8-15 Character Long.Only alphabet ,numbers,whitespaces and @ Character are allowed." required></td>
			</tr>
			<tr class="form-group">
				<td>Photo</td>
				<td><input  type="file"  name="photo" title="Upload Photo"  required></td>
				<td><?php echo $errphoto; ?></td>
			</tr>
			<tr class="form-group">
				<td>
					<button type="submit" name="submit" class="btn btn-primary">Register</button> 
				</td>
				<td><?php 
				if(isset($_POST['submit'])){
					echo $errregister;
				}
					 ?></td>
				
			</tr>
		</table>
	</form>
 
  </div>
</div>
<?php require('footer.php') ?>

</div>
</body>
</html>