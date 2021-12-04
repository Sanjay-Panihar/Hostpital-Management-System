<?php
	include '../connection.php';
	$id=$_GET['id'];
	$query="DELETE FROM admin WHERE ID='$id'";
	$run=mysqli_query($conn,$query);
	if ($run) 
	{
		header('location:admin.php');
	}


?>