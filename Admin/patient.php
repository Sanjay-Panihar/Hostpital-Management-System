<?php 
	session_start();
	include '../connection.php';
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
	<title>Total Patients</title>
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
					?>
				</div>
				<div class="col-md-10">
					<?php 
						$query="SELECT * FROM patient";
						$run=mysqli_query($conn,$query);
						$result=mysqli_num_rows($run);
					?>
					<h5 class="text-center my-4">Total Patients</h5>
					<table class="table table-bordered">
						<tr>
							<th>ID</th>
							<th>First Name</th>
							<th>Surname</th>
							<th>Username</th>
							<th>Email</th>
							<th>Phone No</th>
							<th>Gender</th>
							<th>Country</th>
							<th>Date of Reg.</th>
							<th colspan="2">Action</th>
						</tr>
						<?php 
							if ($result<1) 
							{
								echo "<tr>
										<td colspan='10' class='text-center'>No record found.</td>
								</tr>";
							}
							else
							{
								while($row=mysqli_fetch_array($run))
								{
									?>
										<tr>
											<td><?php echo $row['id']; ?></td>
											<td><?php echo $row['firstname']; ?></td>
											<td><?php echo $row['surname']; ?></td>
											<td><?php echo $row['username']; ?></td>
											<td><?php echo $row['email']; ?></td>
											<td><?php echo $row['phone']; ?></td>
											<td><?php echo $row['gender']; ?></td>
											<td><?php echo $row['country']; ?></td>
											<td><?php echo $row['date_reg']; ?></td>
											<td><a href="view.php?id=<?php echo $row['id'];?> "><button class="btn btn-danger">View</button></a></td>
										</tr>
									<?php 
								}
							}
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>