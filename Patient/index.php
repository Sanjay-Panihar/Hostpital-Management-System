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
	<title>Patient Dashboard</title>
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
					<h5 class="my-2">Patient Dashboard</h5>
					<div class="col-md-12" >
						<div class="row">
							
								<div class="col-md-3 mx-1 bg-success " style="height:150px;">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-8">
												<h5 class="text-center my-2 text-white">My Profile</h5>
											</div>
											<div class="col-md-4">
												<a href="profile.php"><i class="fa fa-user-circle fa-3x my-3 text-white"></i></a>
											</div>
										</div>
										
									</div>
								</div>
								<div class="col-md-3 mx-1 bg-warning " style="height:150px;">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-8">
												<h5 class="text-center my-2 text-white">Book Appointment</h5>
											</div>
											<div class="col-md-4">
												<a href="appointment.php"><i class="fa fa-calendar fa-3x my-3 text-white"></i></a>
											</div>
										</div>
										
									</div>
								</div>
								<div class="col-md-3 mx-1 bg-danger " style="height:150px;">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-8">
												<h5 class="text-center my-2 text-white">My Invoice</h5>
											</div>
											<div class="col-md-4">
												<a href="invoice.php"><i class="fas fa-file-invoice-dollar fa-3x my-3 text-white"></i></a>
											</div>
										</div>
										
									</div>
								</div>
								<div class="col-md-12">
									<?php 
										if (isset($_POST['submit'])) 
										{
											$title=$_POST['title'];
											$message=$_POST['message'];
											$patient= $_SESSION['patient'];
											$query="INSERT INTO report VALUES('','$title','$message','$patient',NOW())";
											$run=mysqli_query($conn,$query);
											if ($run) 
											{
												echo "<script> alert('You have sucessfully send the report.')</script>";
											}
											else
											{
												echo "<script> alert('Failed.')</script>";
											}
										}
									?>
									<div class="row">
										<div class="col-md-3"></div>
										<div class="col-md-6 jumbotron my-5">
											<h5 class="text-center my-1">Send a Report</h5>
											<form method="post" class="form-group">
												<label>Title</label>
												<input type="text" name="title" class="form-control" autocomplete="off" placeholder="Enter title of the report" required>
												<label>Message</label>
												<input type="text" name="message" class="form-control" autocomplete="off" placeholder="Enter Message" required>
												<input type="submit" name="submit" value="Send Report" class="btn btn-danger my-2">
											</form>
										</div>
										<div class="col-md-3"></div>
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
						
						
					