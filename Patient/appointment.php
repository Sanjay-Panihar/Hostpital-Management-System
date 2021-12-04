<?php 
	session_start();
	include '../connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Book Appointment</title>
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
					<h5 class="text-center my-4">Book Appointment</h5>
					<?php 
						$patient=$_SESSION['patient'];
						$query="SELECT * FROM patient WHERE USERNAME='$patient'";
						$run=mysqli_query($conn,$query);
						$row=mysqli_fetch_array($run);
						$firstname=$row['firstname'];
						$surname=$row['surname'];
						$gender=$row['gender'];
						$phone=$row['phone'];
						if (isset($_POST['book'])) 
						{
							$date=$_POST['date'];
							$sym=$_POST['sym'];
							if (empty($date)) 
							{
								echo "";
							}
								elseif(empty($sym))
								{
									echo " Enter symptoms";
								}

							else
							{
							$qry="INSERT INTO `appointment`(`id`, `firstname`, `surname`, `gender`, `phone`, `appointment_date`, `symptoms`, `status`, `date_booked`) VALUES ('','$firstname','$surname','$gender','$phone','$date','$sym','Pending',NOW())";
							$data=mysqli_query($conn,$qry);
							if ($data) 
							{
								echo "<script> alert('You have sucessfully booked appointment.');</script>";
							}
						}
					}
					?>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6 jumbotron">
								<form method="post" class="form-group">
									<label>Appointment Date</label>
									<input type="date" name="date" autocomplete="off" class="form-control">
									<label>Symptoms</label>
									<input type="text" name="sym" autocomplete="off" class="form-control" placeholder="Enter Symptoms">
									<input type="submit" name="book" value="Book Appointment" class="btn btn-danger my-2">
								</form>
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