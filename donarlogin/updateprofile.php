<?php 
	if(!isset($_SESSION)) {session_start();}
      require 'verifylogin.php';
      $loginid=$_SESSION['email'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Profile</title>
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



	
		
	 <?php
	 $errchange="";
	 $errphoto="";
if(isset($_POST["submit"])){
	$con=makeconnection();

	$q="SELECT * FROM donarsignup WHERE email='$loginid' ";
	$r=mysqli_query($con,$q);

	if(mysqli_num_rows($r)==1){		
			$email=$loginid;
			$target_dir="../donarpic/$email/";
			$target_file=$target_dir.basename($_FILES["photo"]["name"]);
			$uploadOk=1;
			$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			 

			 if ($_FILES["photo"]["size"] > 5000000) {
            $errphoto="Sorry, your file is too large.";
              $uploadOk = 0;
				}
			 if($imageFileType != "jpg" && $imageFileType !="png" && $imageFileType !="jpeg" && $imageFileType !="gif"){
			 	$errphoto="File should be only jpg, jpeg, png, gif .";
			 	$uploadOk=0;
			 }
			 	$photo=basename($_FILES["photo"]["name"]);
			 	$name=testInput($_POST["dname"]);
				$gender=testInput($_POST["gender"]);
				$age=testInput($_POST["age"]);
				$mobile=testInput($_POST["mobile"]);

				$q2="UPDATE donarsignup SET name='$name',age='$age',gender='$gender',mobile='$mobile',photo='$photo' WHERE email='$loginid';";
				$con->query($q2);
			if( $uploadOk==1 ){
				move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
			 	$errchange="Updated Profile.";
			 }else{
			$errchange="Error.";
		}
	}else{
		$errchange="*No Data Base Found.";
	}
	mysqli_close($con);
}	
?>
	<?php  
		$con=makeconnection();
			$name="";
			$gender="";
			$age="";
			$mobile="";
			$pic="";
		$q="SELECT * FROM donarsignup WHERE email='$loginid';  ";
		$r=mysqli_query($con,$q);
		while($data=mysqli_fetch_array($r) ){
			$name=$data[0];
			$gender=$data[1];
			$age=$data[2];
			$mobile=$data[3];
		}
		mysqli_close($con);
		?>

  <div class="row col-xm-7" style="height: 300px;width: 100%;padding: 10px" >
	<div style="width: 700px;height: 270px;background-color: #FFA597;padding:15px;align-content: center;
border-radius: 15px 15px 15px 15px;
border:2px solid red;
  left: 50%;">
  	<div style="width:400px;height: 230px;float:left">
		<form class="form" method="POST" onsubmit="return formValidation()" enctype="multipart/form-data" name="changepassform">
			<table>
			<tr class="form-group">
				<td>Donar Name </td>
				<td><input class="form-control" type="text" name="dname"  pattern="[a-zA-Z 0-9]{4,16}" value="<?php echo $name; ?>" title="Please Enter Only 4-15 Character."></td>
			</tr>
			
			<tr class="form-group">
				<td>Gender </td>
				<td><input type="radio" name="gender" value="male" checked>Male<input type="radio" name="gender" value="female" <?php if($gender=="female"){echo "checked";} ?>	>Female</td>
			</tr>
			<tr class="form-group">
				<td>Age (20-28)</td>
				<td><input class="form-control" type="number" name="age" value="<?php echo $age; ?>" title="Please Enter Age Between 20-28."  <?php if($gender=="male"){echo "checked";} ?> ></td>
			</tr>
			<tr class="form-group">
				<td>Mobile</td>
				<td><input class="form-control" type="number" name="mobile" pattern="[0-9]{10,13}" value="<?php echo $mobile; ?>" title="Please Enter Mobile Number." ></td>
			</tr>

<?php  
		$con=makeconnection();
		$q="SELECT * FROM donarsignup WHERE email='$loginid';  ";
		$r=mysqli_query($con,$q);
		while($data=mysqli_fetch_array($r) ){
			$pic=$data[7];
		}
		mysqli_close($con);
		?>
			<tr class="form-group">
				<td>Photo</td>
				<td><input  type="file"  name="photo" title="Upload Photo" ></td>
			</tr>
			<tr>
				<td><button class="btn btn-danger" type="submit" name="submit">Change</button></td>
				<td><?php echo $errchange; ?><?php echo $errphoto; ?></td>
			<tr>
			</table>
		</form>
	  </div>
	  <div class="col-4" style="float:left;padding: 3%;">
			<img class="fluid-img img-thumbnail rounded" src="../donarpic/<?php echo $loginid ?>/<?php echo $pic ?>" style="width:200px" alt="Profile Picture Removed"/>
			<h5 align="center">Profile Photo</h5>
	  </div>
	</div>

  </div>
	<?php require 'footer.php';?>
</div>
</body>
</html>
