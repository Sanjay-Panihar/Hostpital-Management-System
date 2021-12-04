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
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-13/css/all.min.css">
	<title>My Invoice</title>
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
					<h5 class="text-center my-4">My Invoice</h5>
					<?php 
						$patient=$_SESSION['patient'];
						$query="SELECT * FROM patient WHERE USERNAME='$patient'";
						$run=mysqli_query($conn,$query);
						$row=mysqli_fetch_array($run);
						$fname=$row['firstname'];
						$qry="SELECT * FROM income WHERE patient='$fname'";
						$run_query=mysqli_query($conn,$qry);
						$data=mysqli_num_rows($run_query);
						$result=mysqli_fetch_array($run_query);
					?>
					<table class="table table-bordered">
						<tr>
							<th colspan="7" class="text-center">Details</th>
						</tr>
						<tr>
							<th>ID</th>
							<th>Doctor Name</th>
							<th>Patient Name</th>
							<th>Date of Discharge</th>
							<th>Amount Paid</th>
							<th>Description</th>
							<th>Action</th>
						</tr>
						<tr>
						<?php 
							if ($data<1) 
							{
								echo "<td colspan='2'>No invoice found.</td>";
							}
							else
							{
								?>
									<tr>
										<td><?php echo $result['id'];?></td>
									
										<td><?php echo $result['doctor'];?></td>
									
										<td><?php echo $patient;?></td>
									
										<td><?php echo $result['date_discharge'];?></td>
									
										<td><?php echo $result['amount_paid'];?></td>
									
										<td><?php echo $result['description'];?></td>

										<td><a href="view.php?id=<?php echo $result['id']; ?>"><button class="btn btn-danger">View Details</button></a></td>
									</tr>
								<?php
							}
						?>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>