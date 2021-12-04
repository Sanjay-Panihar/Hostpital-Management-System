<?php 
	include '../connection.php';
	$id=$_POST['id'];
	echo $query="UPDATE doctors SET STATUS='Rejected' WHERE ID='$id'";
	$run=mysqli_query($conn,$query);
	if ($run) {
		echo "Rejected";
	}
	else
	{
		echo "not Rejected";
	}
	
?>