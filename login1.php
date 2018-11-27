  <div class="modal fade" id="login">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">LOGIN</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
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
        
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>





	<?php
	if(isset($_POST['submit'])){
		require ('admin/dbcon.php');
		$_SESSION["loginstatus"]="";
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
