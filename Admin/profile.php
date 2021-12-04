<?php 
		session_start();
		$user=$_SESSION['uname'];
		include '../connection.php';
		$query="SELECT * FROM admin WHERE USERNAME='$user'";
		$run=mysqli_query($conn,$query);
		$data=mysqli_fetch_assoc($run);
		$profile=$data['profile'];
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
	<title>Admin Profile</title>
</head>
<body>
	<?php
		include '../header.php';
	 ?>
	<div class="container-fluid" style="margin-left:-30px">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-2">
						<?php
							
							include 'sidenav.php';			
						 ?>
					</div>
					<div class="col-md-10">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<h5><?php echo $user; ?> Profile</h5>
										<?php 
											if (isset($_POST['update'])) {
												$profile=$_FILES['profile']['name'];
												if (empty($profile)) {
													

												}
												else
												{
													$qry="UPDATE admin SET PROFILE='$profile' WHERE USERNAME='$user'";
													$run2=mysqli_query($conn,$qry);
													if ($run2) 
													{
														move_uploaded_file($_FILES['profile']['tmp_name'],"images/$profile");
													}
													else{
														echo 'ss';
													}
												}
											}
										?>
										<form method="post" enctype="multipart/form-data">
											<?php
												echo "<img src='images/$profile' style='height:250px; width:200px;' '>"; 
											?>
										
											<br><br>
											<div class="form-group">
												<label>Update Profile</label>
												<input type="file" name="profile" class="form-group" required>
											</div>
											<br>
											<input type="submit" name="update" value="Update" class="btn btn-danger">
										</form>
								</div>
								<div class="col-md-6">
									<?php 
										if (isset($_POST['change'])) 
										{
											$uname=$_POST['uname'];
											if (empty($uname)) 
											{
												
											}
											else
											{
												$qry2="UPDATE admin SET USERNAME='$uname' WHERE USERNAME='$user'";
												$run3=mysqli_query($conn,$qry2);
												if ($run3) 
												{
													$_SESSION['username']=$user;
												}
											}
										}
									?>
									<form method="post">
										<label>Change Username</label>
										<input type="text" name="uname" class="form-control" autocomplete="off" required><br>
										<input type="submit" name="change" value="Update" class="btn btn-danger">
									</form>
									<br><br>
									<?php 
										if (isset($_POST['update_password'])) 
										{
											$old_password=$_POST['old_password'];
											$new_password=$_POST['new_password'];
											$conf_password=$_POST['conf_password'];
											$error=array();
											$old=mysqli_query($conn,"SELECT * FROM admin WHERE USERNAME='$user'");
											$row= mysqli_fetch_array($old);
											$pass=$row['password'];
											if (empty($old_password)) 
											{
												$error['p']= "Enter old password";
											}
											elseif (empty($new_password)) 
											{
												$error['p']= " Enter new password";
											}
											elseif (empty($conf_password)) 
											{
												$error['p']=  "Enter confirm password";
											}
											elseif ($old_password!=$pass) 
											{
												$error['p']= "Invalid old password";
											}
											elseif ($new_password!=$conf_password) 
											{
												$error['p']= "New password and confirm password does not match!";
											}
											if (count($error)==0) 
											{
												$query="UPDATE admin SET PASSWORD='$new_password' WHERE USERNAME='$user'";
												$run=mysqli_query($conn,$query);
											}
											
										}
										if (isset($error['p'])) 
											{
												$e=$error['p'];
												$show= "<h5 class='text-center alert alert-danger'>$e</h5>";
											}
											else
											{
												$show="";
											}
									?>
									<form method="post">
										<h5 class="text-center my-4">Change Password</h5>
										<div>
											<?php 
												echo $show;
											?>
										</div>
										<div class="form-group">
											<label>Old Password</label>
											<input type="password" name="old_password" class="form-control">
										</div>
										<div class="form-group">
											<label>New Password</label>
											<input type="password" name="new_password" class="form-control">
										</div>
										<div class="form-group">
											<label>Confirm Password</label>
											<input type="password" name="conf_password" class="form-control"><br>
											<input type="submit" name="update_password" value="Update Password" class="btn btn-danger">
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
	</body>
	</html>	