<div class="container">	
  <div style="overflow-x: auto;border-collapse: collapse;
    		border-spacing: 0;
    		">
	<table class="table table-bordered table-striped table-hover table-secondary">
		<tr>
			<td>Photo</td>
			<td>Name</td>
			<td>Gender</td>
			<td>Mobile No.</td>
			<td>Email</td>
			<td>Blood Group</td>
		</tr>
	<?php 
		$con=makeconnection();
		$q="select * from donarsignup,bloodgroup where donarsignup.b_id=$bgid and donarsignup.b_id=bloodgroup.bg_id;";
		$result=mysqli_query($con,$q);
		$rows=mysqli_num_rows($result);
	if($rows>0){
		while($data = mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<td><img width='100px' height='100px' src='../donarpic/$data[5]/$data[7]'></td>";
			echo "<td>$data[0]</td><td>$data[1]</td><td>$data[3]</td><td>$data[5]</td><td>$data[9]</td>";
			echo "</tr>";
		}
	}else{
		echo "<tr><td>No Data Found.</td><td>No Data Found.</td><td>No Data Found.</td><td>No Data Found.</td><td>No Data Found.</td><td>No Data Found.</td></tr>";
	}
	 ?>
	</table>
   </div>
</div>