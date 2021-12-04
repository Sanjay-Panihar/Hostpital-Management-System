<?php
	$servername="localhost";
	$dbname="hms";
	$username="root";
	$password="";
	$conn=mysqli_connect($servername,$username,$password,$dbname);
	if (!$conn) 
	{
		die("Database not connected").mysqli_connect_error() ;	
	}
	
?>