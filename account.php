<?php
	include 'connection.php';
	session_start();
	if (isset($_POST['create_account'])) 
	{
		$firstname=$_POST['fname'];
		$surname=$_POST['surname'];
		$uname=$_POST['uname'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$gender=$_POST['gender'];
		$country=$_POST['country'];
		$password=$_POST['password'];
		$con_password=$_POST['con_password'];
		print($gender);

		$error=array();

		if (empty($firstname)) {
			$error['p']="Enter Firstname";
		}
		elseif (empty($surname)) 
		{
			$error['p']="Enter Surname";
		}
		elseif (empty($uname)) 
		{
			$error['p']="Enter Username";
		}
		elseif (empty($email)) 
		{
			$error['p']="Enter Email";
		}
		elseif (empty($phone)) 
		{
			$error['p']="Enter Phone No";
		}
		elseif (empty($gender)) 
		{
			$error['p']="Select your gender.";
		}
		elseif (empty($country)) 
		{
			$error['p']="Select your country.";
		}
		elseif (empty($password)) 
		{
			$error['p']="Enter Password";
		}
		elseif ($con_password!=$password) 
		{
			$error['p']="Password and Confirm Password does not match.";
		}
	
		if (count($error)==0) 
		{
			echo $insert_query="INSERT INTO `patient`(`id`, `firstname`, `surname`, `username`, `email`, `phone`, `gender`, `country`, `password`, `date_reg`, `profile`) VALUES ('','$firstname','$surname','$uname','$email','$phone','$gender','$country','$password',NOW(),'sanjay.jpg')";
			$run=mysqli_query($conn,$insert_query);
			if ($run) 
			{
				header('location:patient_login.php');
			}
			else
			{
				echo "<script> alert('Failed');</script>";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Create Account</title>
</head>
<body style="background-image:url('photos/5600412.jpg'); background-size:cover; background-repeat:no-repeat;">
	<?php 
		include 'header.php';

	?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
					
				</div>
				<div class="col-md-6 jumbotron my-2">
					<h5 class="text-center my-2 text-info ">Create Account</h5>
						<form method="post">
						<div class="form-group">
							<label>Firstname</label>
							<input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname" required>
						</div> 
						<div class="form-group">
							<label>Surname</label>
							<input type="text" name="surname" class="form-control" autocomplete="off" placeholder="Enter Surname" required>
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email" required>
						</div>
						<div class="form-group">
							<label>Phone no.</label>
							<input type="text" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone No" required>
						</div>
						<div class="form-group">
							<label>Gender</label>
							<select name="gender" class="form-control">
								<option>Select your gender</option>
								<option value="Male" name='Male'>Male</option>
								<option value="Female" name='Female'>Female</option>
							</select>
						</div>
						<div class="form-group">
							<label>Country</label>
							<select name="country" class="form-control">
								<option>Select your country</option>
								<option value="India" name='India'>India</option>
								<option value="Other"  name='other'>Other</option>
							</select>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" autocomplete="off" placeholder="Enter Password" required>
						</div>
						<div class="form-group">
							<label>Confirm Password</label>
							<input type="password" name="con_password" class="form-control" autocomplete="off" placeholder="Enter Confirm Password" required>
						</div>
						<input type="submit" name="create_account" value="Create Account" class="btn btn-danger">
						<p>Already have an account<a href="patient_login.php"> Click here</a></p>
						</form>
					</div>
					
				</div>
				<div class="col-md-3">
					
				</div>
			</div>
		</div>	
	</div>
</body>
</html>