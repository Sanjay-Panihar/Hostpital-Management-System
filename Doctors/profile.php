<?php 
	session_start();
	include '../connection.php';
	$doctor=$_SESSION['doctor'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Doctor Profile</title>
</head>
<body>
	<?php 
		include '../header.php';
	?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left:-30px;">
					<?php 
						include 'sidenav.php';
					?>
				</div>
				<div class="col-md-10">
					<div class="container-fluid">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<?php
																					  
											$profile_query="SELECT * FROM doctors WHERE USERNAME='$doctor'";
											$run=mysqli_query($conn,$profile_query);
											$row=mysqli_fetch_array($run);
											
											if (isset($_POST['upload'])) 
											{
												$img=$_FILES['img']['name'];
												if (empty($img)) 
												{
													
												}
												else
												{
													$update_query="UPDATE doctors SET PROFILE='$img' WHERE USERNAME='$doctor'";
													$run_update=mysqli_query($conn,$update_query);
													if ($run_update) 
													{
														move_uploaded_file($_FILES['img']['tmp_name'],"img/$img");
													}
												}
											}
									?>
									<form method="post" enctype="multipart/form-data">
										<?php 
											echo "<img src='img/".$row['profile']."' style='height:250px;' class='my-4'>";
										?>
										<input type="file" name="img" class="form-control my-1">
										<input type="submit" name="upload" value="Update Profile" class="btn btn-danger my-2">
									</form>
									<div class="my-2">
										<table class="table table-bordered">
											<tr>
												<th colspan="2" class="text-center">Details</th>
											</tr>
											<tr>
												<td>Firstname</td><td><?php echo $row['firstname']; ?></td>
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
												<td>Salary</td><td><?php echo $row['salary']; ?></td>
											</tr>
											<tr>
												<td>Country</td><td><?php echo $row['country']; ?></td>
											</tr>
										</table>
									</div>
								</div>
								<div class="col-md-6">
									<h5 class="text-center">Change Username</h5>
									<?php 
										if (isset($_POST['change_uname'])) 
										{
											$uname=$_POST['uname'];
											$uname_query="UPDATE doctors SET USERNAME='$uname' WHERE USERNAME='$doctor'";
											$run_uname=mysqli_query($conn,$uname_query);
											if($run_uname)
											{
												$_SESSION['uname']=$doctor;
											}
										}
									?>
									<form method="post" class="form-group">
										<label>Change Username</label>
										<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
										<br>
										<input type="submit" name="change_uname" value="Change Username" class="btn btn-danger">
									</form>
									<br>
									<h5 class="text-center">Change Password</h5>
									<?php 
										if (isset($_POST['change_password'])) 
										{
											$old=$_POST['old_password'];
											$new=$_POST['new_password'];
											$con=$_POST['con_password'];
											$cpass_qry="SELECT * FROM doctors WHERE USERNAME ='$doctor'";
											$run_cpass=mysqli_query($conn,$cpass_qry);
											$row=mysqli_fetch_array($run_cpass);
											if ($old!=$row['password']) 
											{
											}
											elseif(empty($new)){
											}
											elseif ($con!=$new) {														
											}
											else
											{
											$query="UPDATE doctors SET PASSWORD='$new' WHERE USERNAME='$doctor'";
											$run=mysqli_query($conn,$query);
											}
																					
										}


									?>
										<form method="post">
											<div class="form-group">
												<label>Old Password</label>
												<input type="password" name="old_password" class="form-control" autocomplete="off" placeholder="Enter Password">
											</div>
											<div class="form-group">
												<label>New Password</label>
												<input type="password" name="new_password" class="form-control" autocomplete="off" placeholder="Enter New Password">
											</div>
											<div class="form-group">
												<label>Confirm Password</label>
												<input type="password" name="con_password" class="form-control" autocomplete="off" placeholder="Enter Confirm Password">
											</div><br>
											<input type="submit" name="change_password" value="Change Password" class="btn btn-danger">
										</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>