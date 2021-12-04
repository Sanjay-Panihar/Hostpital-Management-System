<?php 
	session_start();
	include '../connection.php';
	$patient=$_SESSION['patient'];
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
	<title>Patient Profile</title>
</head>
<body>
	<?php 
		include '../header.php';
	?>
	<div class="container-fluid" style="margin-left:-30px;">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2">
					<?php 
						include 'sidenav.php';
						$query="SELECT * FROM patient WHERE USERNAME='$patient'";
						$run=mysqli_query($conn,$query);
						$row=mysqli_fetch_array($run);
					?>
				</div>
				<div class="col-md-10">
					<div class="row">
						<div class="col-md-6">
							<h5 class="my-2">Profile Photo</h5>
							<?php 
								echo "<img src='img/".$row['profile']."' style='height:200px; width:150px;'>";
							?>
							<div class="row my-2">
<!-----------------------------------------------Change Photo starts------------------------------------------------------------------------->
								<?php 
									if (isset($_POST['change_photo'])) 
									{
										
										$photo=$_FILES['photo']['name'];
										if (empty($photo)) 
										{
											
										}
										else
										{
										$profile_query="UPDATE patient SET PROFILE='$photo' WHERE USERNAME='$patient'";
										$profile_run=mysqli_query($conn,$profile_query);
										if ($profile_run) 
										{
											move_uploaded_file($_FILES['photo']['tmp_name'],"img/$photo");
										}
										else
										{
											echo "failed";
										}
									}}
								?>
								<form method="post" enctype="multipart/form-data">
									<label>Change Profile Photo</label>
									<input type="file" name="photo" class="form-control" autocomplete="off" >
									<input type="submit" name="change_photo" value="Update" class="btn btn-danger my-2">
								</form>
<!-----------------------------------------------Change Photo ends--------------------------------------------------------------------------->
								<table class="table table-bordered">
									<tr><th colspan="2" class="text-center">Details</th></tr>
									<tr>
										<td>First Name</td><td><?php echo $row['firstname']; ?></td>
									</tr>
									<tr>
										<td>Surname</td><td><?php echo $row['surname']; ?></td>
									</tr>
									<tr>
										<td>Username</td><td><?php echo $row['username']; ?></td>
									</tr>
									<tr>
										<td>Email</td><td><?php echo $row['email']; ?></td>
									</tr>
									<tr>
										<td>Phone No.</td><td><?php echo $row['phone']; ?></td>
									</tr>
									<tr>
										<td>Gender</td><td><?php echo $row['gender']; ?></td>
									</tr>
									<tr>
										<td>Country</td><td><?php echo $row['country']; ?></td>
									</tr>
									<tr>
										<td>Date of Reg</td><td><?php echo $row['date_reg']; ?></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="col-md-6">
							<h5 class="my-2 text-center">Change Username</h5>
								<?php 
									if (isset($_POST['submit'])) 
									{
										$uname=$_POST['change_uname'];
										$uname_query="UPDATE patient SET USERNAME='$uname'WHERE USERNAME='$patient' ";
										$uname_run=mysqli_query($conn,$uname_query);
										if ($uname_run) 
										{
											$_SESSION['patient']=$uname;
										}
									}
								?>
								<form method="post">
									<label>Change Username</label>
									<input type="text" name="change_uname" class="form-control" autocomplete="off" placeholder="Enter Username" required>
									<input type="submit" name="submit" value="Change Username" class="btn btn-danger my-2">
								</form>
									<h5 class="text-center my-2">Change Password</h5>
									<?php 
										if (isset($_POST['change_password'])) 
										{
											$old=$_POST['old_password'];
											$new=$_POST['new_password'];
											$con=$_POST['con_password'];
											if (empty($old))
											 {
												echo "<script> alert('Enter old password');</script>";
											}
											elseif (empty($new)) 
											{
												echo "<script> alert('Enter new password');</script>";
											}
											elseif (empty($con)) 
											{
												echo "<script> alert('Enter confirm password');</script>";
											}
											elseif ($new!=$con) 
											{
												echo "<script> alert('Password and confirm password doest not match.');</script>";
											}
											elseif ($old!=$row['password']) 
											{
												echo "<script> alert('Invalid password');</script>";
											}
											else
											{
												$query="UPDATE patient SET PASSWORD='$new' WHERE USERNAME='$patient'";
												$run=mysqli_query($conn,$query);
											}
										}
									?>
									<form method="post" class="form-group">
										<label>Old Password</label>
										<input type="password" name="old_password" placeholder="Enter Old Password" class="form-control" autocomplete="off">
										<label>New Password</label>
										<input type="password" name="new_password" placeholder="Enter New Password" class="form-control" autocomplete="off">
										<label>Confirm Password</label>
										<input type="password" name="con_password" placeholder="Enter Confirm Password" class="form-control" autocomplete="off">
										<input type="submit" name="change_password" value="Update Password" class="btn btn-danger my-2">
									</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>