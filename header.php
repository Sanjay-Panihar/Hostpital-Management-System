<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hospital Management System</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-13/css/all.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-info bg-info">
		<h5 class="text-white"><a href="../index.php" class="nav-link text-white"> Hospital Management System</a></h5>
		<div class="mr-auto"></div>

		<ul class="navbar-nav">
			<?php 
				if (isset($_SESSION['uname'])) 
				{
					$user=$_SESSION['uname'];
					echo '<li class="nav-item"><a href="#" class="nav-link text-white"> Welcome! '.$user.' | </a></li>
			<li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
				}
				elseif (isset($_SESSION['doctor'])) 
				{	
					$username=$_SESSION['doctor'];
					echo '<li class="nav-item"><a href="#" class="nav-link text-white">Welcome! '.$username.'</a></li>
					<li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
				}
				elseif (isset($_SESSION['patient'])) 
				{
					$username=$_SESSION['patient'];
					echo '<li class="nav-item"><a href="#" class="nav-link text-white">Welcome! '.$username.'</a></li>
					<li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
				}
				
				else
				{
					echo'
			<li class="nav-item"><a href="index.php" class="nav-link text-white">Home</a></li>
			<li class="nav-item"><a href="admin_login.php" class="nav-link text-white">Admin</a></li>
			<li class="nav-item"><a href="doctorlogin.php" class="nav-link text-white">Doctor</a></li>
			<li class="nav-item"><a href="patient_login.php" class="nav-link text-white">Patient</a></li>';
				}
			?>
		</ul>
	</nav>	
</body>
</html>