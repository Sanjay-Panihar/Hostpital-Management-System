<?php 
	session_start();
	include '../connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-13/css/all.min.css">
	<title>Total Appointment</title>
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
						include "sidenav.php";
						$query="SELECT * FROM appointment";
						$run=mysqli_query($conn,$query);
						$num=mysqli_num_rows($run);
						$row=mysqli_fetch_array($run);
					?>
				</div>
				<div class="col-md-10">
					<h5 class="text-center my-4">Total Appointments</h5>
					<table class="table table-bordered">
						<tr>
							<th>ID</th>
							<th>Firstname</th>
							<th>Surname</th>
							<th>Gender</th>
							<th>Phone No.</th>
							<th>Appointment Date</th>
							<th>Symptoms</th>
							<th>Date of Booking</th>
							<th>Action</th>
						</tr>
						<tr>
							<?php 
								if ($num<1) 
								{
									echo "<td colspan='8'>No appointment found yet.</td>";
								}
								else
								{
									?>
										<tr>
											<td><?php echo $row['id']; ?></td>
											<td><?php echo $row['firstname']; ?></td>
											<td><?php echo $row['surname']; ?></td>
											<td><?php echo $row['gender']; ?></td>
											<td><?php echo $row['phone']; ?></td>
											<td><?php echo $row['appointment_date']; ?></td>
											<td><?php echo $row['symptoms']; ?></td>
											<td><?php echo $row['date_booked']; ?></td>
											<td><a href="discharge.php?id=<?php echo $row['id']; ?>"><button class="btn btn-danger">Check</button></a></td>
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