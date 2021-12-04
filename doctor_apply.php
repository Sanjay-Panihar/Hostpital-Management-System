<?php 
	include 'connection.php';
	if(isset($_POST['apply']))
	{
		$firstname=$_POST['fname'];
		$surname=$_POST['surname'];
		$uname=$_POST['uname'];
		$email=$_POST['email'];
		$gender=$_POST['gender'];
		$phone=$_POST['phone'];
		$country=$_POST['country'];
		$password=$_POST['password'];
		$con_password=$_POST['con_password'];

		$error=array();

		if(empty($firstname))
		{
			$error['apply']="Enter First name";
		}
		elseif(empty($surname))
		{
			$error['apply']="Enter Surname";
		}
		elseif(empty($uname))
		{
			$error['apply']="Enter Username";
		}
		elseif(empty($email))
		{
			$error['apply']="Enter Email";
		}
		elseif(empty($gender))
		{
			$error['apply']="Please select gender";
		}
		elseif(empty($phone))
		{
			$error['apply']="Enter Phone Number";
		}
		elseif(empty($country))
		{
			$error['apply']="Please select country";
		}
		elseif(empty($password))
		{
			$error['apply']="Enter Password";
		}
		elseif($password!=$con_password)
		{
			$error['apply']="Password and confirm password does not match";
		}
		if(count($error)==0)
		{
			 $insert_query="INSERT INTO `doctors`(`id`, `firstname`, `surname`, `username`, `email`, `gender`, `phone`, `country`, `password`, `salary`, `date_reg`, `status`, `profile`) VALUES ('','$firstname','$surname','$uname','$email','$gender','$phone','$country','$password','0',NOW(),'Pending','sanjay.jpg')";
			$run=mysqli_query($conn,$insert_query);
		
			if($run)
			{
				echo "<script> alert('You have sucessfully applied');</script>";
				header('location:doctorlogin.php');
			}
			else
			{
				echo "<script> alert('Failed! Apply again');</script>";
			}
		}
	}
			if(isset($error['apply']))
			{
				$s=$error['apply'];
				$show="<h5 class='text-center alert alert-danger'>$s</h5>";
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
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-13/js/all.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-13/css/all.min.css">
	<title>Apply Now</title>
</head>
<body style="background-image: url('photos/5600412.jpg'); background-size: cover; background-repeat:no-repeat ;">
	<?php 
		include 'header.php';
	?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
				</div>
				<div class="col-md-6 jumbotron my-5">
					<h5 class="text-center my-1">Apply Now</h5>
						<div> <?php echo $show; ?></div>
					<form method="post">
						<div class="form-group">
							<label>First Name</label>
								<input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname" value="<?php if(isset($_POST['fname'])){ echo $_POST['fname'];}?>">
						</div>
							<div class="form-group">
								<label>Surname</label>
									<input type="text" name="surname" class="form-control" autocomplete="off" placeholder="Enter Surname" value="<?php if(isset($_POST['surname'])){ echo $_POST['surname'];}?>">
							</div>
							<div class="form-group">
								<label>Username</label>
									<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" value="<?php if(isset($_POST['uname'])){ echo $_POST['uname'];}?>">
							</div>
							<div class="form-group">
								<label>Email</label>
									<input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email" value="<?php if(isset($_POST['email'])){ echo $_POST['email'];}?>">
							</div>
								<div class="form-group">
								<label>Select Gender</label>
									<select name="gender" class="form-control">
										<option>Select Gender</option>
										<option name="Male">Male</option>
										<option name="Female">Female</option>
									</select>
							</div>
								<div class="form-group">
								<label>Phone Number</label>
									<input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone number" value="<?php if(isset($_POST['phone'])){ echo $_POST['phone'];}?>">
							</div>
							<div class="form-group">
								<label>Select Country</label>
									<select name="country" class="form-control">
										<option>Select Country</option>
										<option name="India">India</option>
										<option name="Other">Other</option>
									</select>
							</div>
							<div class="form-group">
								<label>Password</label>
									<input type="password" name="password" class="form-control" autocomplete="off" placeholder="Enter Password">
							</div>
							<div class="form-group">
								<label>Confirm Password</label>
									<input type="password" name="con_password" class="form-control" autocomplete="off" placeholder="Enter Confirm Password" >
							</div>
								<input type="submit" name="apply" value="Apply" class="btn btn-danger">

								<p>I already have an account. <a href="doctorlogin.php">Click here</a></p>
					</form>
				</div>
				<div class="col-md-3">
				</div>
			</div>
		</div>
	</div>
</body>
</html>