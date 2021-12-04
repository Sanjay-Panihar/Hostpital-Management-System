<?php 
	session_start();
	include("connection.php");	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body style="background-image: url(Photos/5600412.jpg);">
	<?php 
		include("header.php");
	?>
	<div style="margin-top:60px;">

	</div>
	<div class="container">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
				</div>
				<div class="col-md-6 jumbotron" >
					<h5 class="text-center">Admin Login</h5>
					<form method="post">
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" autocomplete="off" placeholder="Enter Password" required>
						</div>
						<input type="submit" name="submit" value="Login" class="btn btn-danger">
					</form>
				</div>
				<div class="col-md-3">
				</div>
			</div>
		</div>
	</div>

</body>
</html>

<?php 
	if (isset($_POST['submit'])) 
	{
		$uname=$_POST['uname'];
		$password=$_POST['password'];
		$query="SELECT * FROM admin WHERE USERNAME='$uname' AND PASSWORD='$password'";
		$run=mysqli_query($conn,$query);
		$data=mysqli_num_rows($run);
		if ($data==1)
		 {
			$_SESSION['uname']=$uname;
			header("location:admin/index.php");
		}
		else
			?>
			<script type="text/javascript">
				alert("Username or Password does not match");
			</script>
			<?php  
	}
?>