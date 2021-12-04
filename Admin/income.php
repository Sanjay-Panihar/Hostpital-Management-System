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
	<title>Total income</title>
</head>
<body>
		<?php 
			include "../header.php";
		?>
		<div class="container-fluid" style="margin-left:-30px;">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-2">
						<?php 
							include 'sidenav.php';
							$query="SELECT * FROM income";
							$run=mysqli_query($conn,$query);
							$num=mysqli_num_rows($run);
							$row=mysqli_fetch_array($run);
						?>
					</div>
					<div class="col-md-10">
						<h5 class="text-center my-4">Total income</h5>
						<table class="table table-bordered">
							<tr>
								<th>ID</th>
								<th>Doctor</th>
								<th>Patient</th>
								<th>Date of Discharge</th>
								<th>Fees Paid</th>
							</tr>
							<tr>
								<?php
									if ($num<1) 
									{
										echo "<td colspan='5' class='text-center'>No patient discharge yet.</td>";
									}
									else
									{
										?>
											<tr>
												<td><?php echo $row['id']; ?></td>
												<td><?php echo $row['doctor']; ?></td>
												<td><?php echo $row['patient']; ?></td>
												<td><?php echo $row['date_discharge']; ?></td>
												<td><?php echo $row['amount_paid']; ?></td>
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