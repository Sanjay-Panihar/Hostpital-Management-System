<?php 
	include '../connection.php';
	$id=$_POST['id'];
	$query="UPDATE doctors SET STATUS='Approved' WHERE ID='$id'";
	$run=mysqli_query($conn,$query);
	if ($run) {
		echo "approved";
	}
	else
	{
		echo "not approved";
	}
	
?>