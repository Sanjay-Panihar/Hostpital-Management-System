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
	

		<title>Admin Dashboard</title>
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
							include "sidenav.php";
							include "../connection.php";
						?>
					</div>
						<div class="col-md-10">
							<h4 class="my-2">Admin Dashboard</h4>
							<div class="col-md-12 my-1">
								<div class="row">
									<div class="col-md-3 bg-success mx-1" style="height:130px;">
										<div class="col-md-12">
											<div class="row">
												<div class="col-md-8">
													<?php 
														$query="SELECT * FROM admin";
														$run=mysqli_query($conn,$query);
														$num=mysqli_num_rows($run);
													?>
													<h5 class="text-white my-2" style="font-size: 30px;"><?php echo $num ?></h5>
													<h5 class="text-white">Total</h5>
													<h5 class="text-white">Admin</h5>
												</div>
													<div class="col-md-4">
														<a href="admin.php"><i class="fa fa-users-cog fa-3x my-3" style="color: white;"></i></a>
													</div>
											</div>
										</div>
									</div>
									<div class="col-md-3 bg-info mx-1" style="height:130px;">
										<div class="col-md-12">
											<div class="row">
												<div class="col-md-8">
													<?php
														$doctor_query="SELECT * FROM doctors WHERE STATUS='Approved'";
														$doctor_run=mysqli_query($conn,$doctor_query);
														$doctor_data=mysqli_num_rows($doctor_run);
													?>
													<h5 class="text-white my-2" style="font-size: 30px;"><?php echo $doctor_data; ?></h5>
													<h5 class="text-white">Total</h5>
													<h5 class="text-white">Doctors</h5>
												</div>
													<div class="col-md-4">
														<a href="doctor.php"><i class="fa fa-user-md fa-3x my-3" style="color: white;"></i></a>
													</div>
											</div>
										</div>
									</div>
									<div class="col-md-3 bg-warning mx-1" style="height:130px;">
										<div class="col-md-12">
											<div class="row">
												<div class="col-md-8">
													<?php 
														$query="SELECT * FROM patient";
														$run=mysqli_query($conn,$query);
														$data=mysqli_num_rows($run);
													?>
													<h5 class="text-white my-2" style="font-size: 30px;"><?php echo $data; ?></h5>
													<h5 class="text-white">Total</h5>
													<h5 class="text-white">Patients</h5>
												</div>
													<div class="col-md-4">
														<a href="patient.php"><i class="fa fa-procedures fa-3x my-3" style="color: white;"></i></a>
													</div>
											</div>
										</div>
									</div>
									<div class="col-md-3 bg-danger mx-1 my-2" style="height:130px;">
										<?php 
														$query="SELECT * FROM report";
														$run=mysqli_query($conn,$query);
														$data=mysqli_num_rows($run);
													?>
										<div class="col-md-12">
											<div class="row">
												<div class="col-md-8">
													<h5 class="text-white my-2" style="font-size: 30px;"><?php echo $data; ?></h5>
													<h5 class="text-white">Total</h5>
													<h5 class="text-white">Report</h5>
												</div>
													<div class="col-md-4">
														<a href="report.php"><i class="fa fa-flag fa-3x my-3" style="color: white;"></i></a>
													</div>
											</div>
										</div>
									</div>
									<div class="col-md-3 bg-warning mx-1 my-2" style="height:130px;">
										<div class="col-md-12">
											<div class="row">
												<div class="col-md-8">
													<?php 
														$job_query="SELECT * FROM doctors WHERE STATUS='Pending'";
														$run=mysqli_query($conn,$job_query);
														$data=mysqli_num_rows($run);
													?>
													<h5 class="text-white my-2" style="font-size: 30px;"><?php echo $data; ?></h5>
													<h5 class="text-white">Total</h5>
													<h5 class="text-white">Job Request</h5>
												</div>
													<div class="col-md-4">
														<a href="job_request.php"><i class="fa fa-book-open fa-3x my-3" style="color: white;"></i></a>
													</div>
											</div>
										</div>
									</div>
									<div class="col-md-3 bg-success mx-1 my-2" style="height:130px;">
										<?php 
														$query="SELECT sum(amount_paid) as profit FROM income";
														$run=mysqli_query($conn,$query);
														$data=mysqli_fetch_array($run);
														$inc=$data['profit'];
													?>
										<div class="col-md-12">
											<div class="row">
												<div class="col-md-8">
													<h5 class="text-white my-2" style="font-size: 30px;"><?php echo "Rs.". $inc; ?></h5>
													<h5 class="text-white">Total</h5>
													<h5 class="text-white">Income</h5>
												</div>
													<div class="col-md-4">
														<a href="income.php"><i class="fa fa-money-check-alt fa-3x my-3" style="color: white;"></i></a>
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
	
