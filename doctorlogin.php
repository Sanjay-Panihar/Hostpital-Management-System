<?php
	include 'connection.php';
	error_reporting(0);
	session_start();
	if (isset($_POST['login'])) 
	{
		$username=$_POST['uname'];
		$password=$_POST['pass'];

		$error=array();
		$login_query="SELECT * FROM doctors WHERE USERNAME='$username' AND PASSWORD='$password'";
		$run=mysqli_query($conn,$login_query);
		$num=mysqli_fetch_assoc($run);

		if (empty($username)) 
		{
			$error['login']="Enter Username";
		}
		elseif (empty($password)) 
		{
			$error['login']="Enter Password";
		}
		elseif($num['status']=="Pending")
		{
			$error['login']="Please wait for the admin to confirm";
		}
		elseif($num['status']=="Rejected")
		{
			$error['login']="Try again later";
		}
			if (count($error)==0) 
			{
				$query="SELECT * FROM doctors WHERE USERNAME='$username' AND PASSWORD='$password'";
				$data=mysqli_query($conn,$query);
				$row=mysqli_num_rows($data);
				if ($row) 
				{
					echo "<script> alert('Done');</script>";
					$_SESSION['doctor']=$username;	
					header('location:doctors/index.php');
				}
				else
				{
					echo "<script> alert('Invalid account');</script>";
				}
			}
	} 
	 	if (isset($error['login'])) {
	 		$l=$error['login'];
	 		$show="<h5 class='text-center alert alert-danger'>$l </h5>";
	 	}
	 	else
	 	{
	 		$show="";
	 	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-13/js/all.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-13/css/all.min.css">
	<title>Doctor Login</title>
</head>
<body background="photos/5600412.jpg">
	<?php 
		include 'header.php';
	?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
				</div>
				<div class="col-md-6 jumbotron my-5">
					<h5 class="text-center my-2">Doctors Login</h5>
					<div><?php echo $show; ?></div>
					<form method="post">
						<div class="form-group">
							<label>Username</label>
								<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
						</div>
							<div class="form-group">
								<label>Password</label>
									<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
							</div>
								<input type="submit" name="login" value="Login" class="btn btn-danger">
								<p>I do not have account <a href="doctor_apply.php">Apply Now</a></p>
					</form>
				</div>
				<div class="col-md-3">
				</div>
			</div>
		</div>
	</div>
</body>
</html>