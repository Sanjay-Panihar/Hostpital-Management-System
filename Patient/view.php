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
	<title>Invoice Details</title>
</head>
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
					<h5 class="text-center my-4">Invoice Details</h5>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<?php 
									$id=$_GET['id'];
									$query="SELECT * FROM income WHERE ID='$id'";
									$run=mysqli_query($conn,$query);
									$row=mysqli_fetch_array($run);
									$num=mysqli_num_rows($run);
								?>
								<table class="table table-bordered">
									<tr>
										<td>ID</td><td><?php echo $row['id']; ?></td>
									</tr>
									<tr>
										<td>Doctor Name</td><td><?php echo $row['doctor']; ?></td>
									</tr>
									<tr>
										<td>Patient Name</td><td><?php echo $row['patient']; ?></td>
									</tr>
									<tr>
										<td>Discharge Date</td><td><?php echo $row['date_discharge']; ?></td>
									</tr>
									<tr>
										<td>Amount Paid</td><td><?php echo $row['amount_paid']; ?></td>
									</tr>
									<tr>
										<td>Description</td><td><?php echo $row['description']; ?></td>
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
<body>

</body>
</html>