<?php 
		session_start();
		$user=$_SESSION['uname'];

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
	<title>Admin</title>
</head>
<body>
	<?php 
		include '../header.php';
	?>

<!-----------------------------------------------------first Half Starts------------------------------------------------------------->	
	<div class="container-fluid" style="margin-left:-30px;">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2">
					<?php 
						
						include 'sidenav.php';
						include '../connection.php';
					?>
				</div>
					<div class="col-md-10">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<h5 class="text-center">All Admin</h5>
										<table class="table table-bordered ">
										<th>ID</th>
										<th>Username</th>
										<th>Action</th>
											<?php 
												$query="SELECT * FROM admin WHERE USERNAME !='$user'";
												$run=mysqli_query($conn,$query);
												$num=mysqli_num_rows($run);
												$output="";
												$count=0;
												if ($num<1) 
												{

													?>
														<tr><td colspan="3" class="text-center">No admin found</td></tr>

													<?php 
												}
												else{
												while($result=mysqli_fetch_assoc($run))
												{
													$id=$result['id'];
													$count++;
													?>
													<tr>
														<td><?php echo $count; ?></td>
														<td><?php echo $result['username']; ?></td>
														<td><a href='delete.php?id=<?php echo $result['id']; ?>' onclick='return checkdelete()'><button id="<?php echo $id; ?>" class="btn btn-danger">Remove</button></a></td>
													</tr>
												<?php 
												}
											}
											?>
									
										
									</table>
								</div>
								<script>
									function checkdelete()
									{
										return confirm('Are you sure want to delete this data?');
									}
								</script>

<!-----------------------------------------------------Second Half Starts------------------------------------------------------------->
									<div class="col-md-6">
										<table>
										<?php 
											if (isset($_POST['add'])) 
											{
												$uname=$_POST['uname'];
												$pwd=$_POST['password'];
												$image=$_FILES['img']['name'];
												$tmpname=$_FILES['img']['tmp_name'];
												$folder="images/".$image;
												move_uploaded_file($tmpname, $folder);
												$check="SELECT * FROM admin WHERE USERNAME='$uname'";
												$run2=mysqli_query($conn,$check);
												$data=mysqli_num_rows($run2);
												if ($data>0) 
												{
													echo "Username already exist";
												}
												else
												{
													$query="INSERT INTO `admin`(`id`, `username`, `password`, `profile`) VALUES ('','$uname','$pwd','$image')";
													$run=mysqli_query($conn,$query);
													if ($run) 
													{
														echo "Value added sucessfully";
														header("Refresh:0.5; url=admin.php");
												}	}
											}

										?>
									</table>
										<h5 class="text-center">Add Admin</h5>
											<form method="post" enctype="multipart/form-data">
												<div class="form-group">
													<label>Username</label>
													<input type="text" name="uname" autocomplete="off" placeholder="Enter Username" required>
												</div>
												<div class="form-group">
													<label>Password</label>
													<input type="password" name="password" autocomplete="off" placeholder="Enter Password" required>
												</div>
												<div class="form-group">
													<label>Add admin photo</label>
													<input type="file" name="img" required>
												</div>
													<div class="form-group">
														<input type="submit" name="add" value="Add new admin" class="btn btn-danger">
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