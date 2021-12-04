<?php 
	session_start();

	include '../connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Doctor's Dashboard</title>
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
					<div class="container-fluid">	
						<h5> Doctor Dashboard</h5>
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-3 my-2 bg-info mx-2" style="height:150px;">
									<div class="col-md-12">
											<div class="row">
												<div class="col-md-8">
													<h5 class="text-white my-4">My Profile</h5>
												</div>
													<div class="col-md-4">
														<a href="profile.php"><i class="fa fa-user-circle fa-3x my-3" style="color: white;"></i></a>
													</div>
											</div>
										</div>

								</div>
								<div class="col-md-3 my-2 bg-success mx-2" style="height:150px;">
									<div class="col-md-12">
										<?php
											$query="SELECT * FROM patient";
											$run=mysqli_query($conn,$query);
											$row=mysqli_num_rows($run);

										 ?>
											<div class="row">
												<div class="col-md-8">
													<h5 class="text-white my-2 " style="font-size: 30px;"><?php echo $row; ?></h5>
													<h5 class="text-white">Total</h5>
													<h5 class="text-white">Patients</h5>
												</div>
													<div class="col-md-4">
														<a href="patient.php"><i class="fa fa-procedures fa-3x my-3" style="color: white;"></i></a>
													</div>
											</div>
										</div>

								</div>
								<div class="col-md-3 my-2 bg-warning mx-2" style="height:150px;">
									<?php
											$query="SELECT * FROM appointment WHERE STATUS='Pending'";
											$run=mysqli_query($conn,$query);
											$row=mysqli_num_rows($run);

										 ?>
									<div class="col-md-12">
											<div class="row">
												<div class="col-md-8">
													<h5 class="text-white my-2" style="font-size: 30px;"><?php echo $row;?></h5>
													<h5 class="text-white">Total</h5>
													<h5 class="text-white">Appointments</h5>
												</div>
													<div class="col-md-4">
														<a href="appointment.php"><i class="fa fa-calendar fa-3x my-3" style="color: white;"></i></a>
													</div>
											</div>
										</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>