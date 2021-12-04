<?php 
	session_start();
	include '../connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Doctors Details</title>
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
					<h5 class="text-center my-1">Edit Doctors</h5>
					<?php 
						$id=$_GET['id'];
						$edit_query="SELECT * FROM doctors WHERE ID='$id'";
						$run=mysqli_query($conn,$edit_query);
						$row=mysqli_fetch_array($run);
					?>
					<div class="row">
					<div class="col-md-8">
						<h5>Doctors Details</h5>
						<table>
							<tr>
								<td>ID</td><td><?php echo $row['id']; ?></td>
								
							</tr>
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
								<td>Gender</td><td><?php echo $row['gender']; ?></td>
								
							</tr>
							<tr>
								<td>Phone</td><td><?php echo $row['phone']; ?></td>
								
							</tr>
							<tr>
								<td>Country</td><td><?php echo $row['country']; ?></td>
								
							</tr>
							<tr>
								<td>Salary</td><td><?php echo $row['salary']; ?></td>
								
							</tr>
							<tr>
								<td>Date of Reg</td><td><?php echo $row['date_reg']; ?></td>
								
							</tr>
						</table>
						
					</div>
					
					<div class="col-md-4">
						<h5 class="text-center">Update Salary</h5>
						<form method="post" class="form-group">
							<label>Enter Doctor's Salary</label>
							<input type="text" name="salary" class="form-control" autocomplete="off" placeholder="Update Salary" required>
							<input type="submit" name="update_salary" value="Update" class="btn btn-danger my-2">

						</form>
						<?php 
							if (isset($_POST['update_salary'])) 
							{
								$salary=$_POST['salary'];
								
								$salary_query="UPDATE doctors SET SALARY='$salary' WHERE ID='$id'";
								$salary_run=mysqli_query($conn,$salary_query);
								if ($salary_run) 
								{
									echo "Salary Updated.";
									
								}
								else
								{
									echo " Salary Not Updated";
								}
							}
						?>
					</div>
						
						
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>