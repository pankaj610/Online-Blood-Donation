

<?php

function makeconnection(){
	$localhost="localhost";
	$username="root";
	$password="";
	$database="blood";
	$con=mysqli_connect($localhost,$username,$password,$database);

	if(  mysqli_connect_errno() )
		{echo "Cannot connect to MYSQL".mysqli_connect_errno();}
	return $con;
}
?>