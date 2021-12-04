<?php 
	session_start();
	$id=$_GET['id'];
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
	<title>Patient Profile</title>
</head>
<body>
	<?php 
		include '../header.php';

	?>
		<div class="container-fluid" style="margin-left: -30px;">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-2">
						<?php
							include 'sidenav.php';
						?>
					</div>
					<div class="col-md-10">
						<h5 class="text-center my-4">View Patient Details</h5>
						<?php 
							$query="SELECT * FROM patient WHERE ID='$id'";
							$run=mysqli_query($conn,$query);
							$result=mysqli_fetch_array($run);
						?>
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-3"></div>
						<div class="col-md-6 jumbotron">
							<table class="table table-bordered">
							<?php 
									echo "<tr>
									<td colspan=2 class='text-center'><img src='../Patient/img/".$result['profile']."' style='height:200px;'></td>
									</tr>";
							?>
							
								<tr>
									<td>ID</td><td><?php echo $result['id'];?></td>
								</tr>
								<tr>
									<td>Firstname</td><td><?php echo $result['firstname'];?></td>
								</tr>
								<tr>
									<td>Surname</td><td><?php echo $result['surname'];?></td>
								</tr>
								<tr>
									<td>Username</td><td><?php echo $result['username'];?></td>
								</tr>
								<tr>
									<td>Email</td><td><?php echo $result['email'];?></td>
								</tr>
								<tr>
									<td>Phone No.</td><td><?php echo $result['phone'];?></td>
								</tr>
								<tr>
									<td>Gender</td><td><?php echo $result['gender'];?></td>
								</tr>
								<tr>
									<td>Country</td><td><?php echo $result['country'];?></td>
								</tr>
								<tr>
									<td>Date of Reg</td><td><?php echo $result['date_reg'];?></td>
								</tr>
							</table>
						</div>
						<div class="col-md-3"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

</body>
</html>