<?php 
	include 'connection.php';
	session_start();
	if (isset($_POST['login'])) {
		$uname=$_POST['uname'];
		$pass=$_POST['pass'];
		$query="SELECT * FROM Patient WHERE USERNAME='$uname' AND PASSWORD='$pass'";
		$run=mysqli_query($conn,$query);
		$data=mysqli_num_rows($run);
		if ($data==1) 
		{
			header('location:patient/index.php');
			$_SESSION['patient']=$uname;
		}
		else
		{
			echo " <script> alert('Login failed');</script>";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Patient Login</title>
</head>
<body style="background-image:url('photos/5600412.jpg');">
	<?php 
		include 'header.php';
	?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
					
				</div>
				<div class="col-md-6 jumbotron my-5">
					<h5 class="text-center my-2 ">Patient Login</h5>
						<form method="post">
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" required>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password" required>
							</div>
							<input type="submit" name="login" value="Login" class="btn btn-danger">
							<p>I do not have an account. <a href="account.php">Click here</a></p>
						</form>
				</div>
				<div class="col-md-3">
					
				</div>
			</div>
		</div>	
	</div>	
	

</body>
</html>