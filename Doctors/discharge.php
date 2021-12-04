<?php
	session_start();
	include "../connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Appointment Details </title>
	<?php 
		include "../header.php";

	 ?>
</head>
<body>
	
	 <div class="container-fluid" style="margin-left:-30px;">
	 	<div class="col-md-12">
	 		<div class="row">
	 			<div class="col-md-2">
	 				<?php 
	 					include "sidenav.php";
	 				?>
	 			</div>
	 			<div class="col-md-10">
	 				<h5 class="text-center my-4">Total Appointments</h5>
	 				<div class="col-md-12">
	 					<div class="row">
	 						<div class="col-md-6">
	 							<h5 class="text-center">Appointment Details</h5>
	 							<?php 
	 								$id=$_GET['id'];
	 								$query="SELECT * FROM appointment WHERE ID='$id'";
	 								$run=mysqli_query($conn,$query);
	 								$num=mysqli_num_rows($run);
	 								$row=mysqli_fetch_array($run);
	 							?>
	 							<table class="table table-bordered">
	 								<tr>
	 									<th colspan="2" class="text-center my-2">Details</th>
	 								</tr>
	 								<tr>
	 									<?php 
	 										if ($num<1) 
	 										{
	 											echo " <td colspan ='2'>No details found. </td>";
	 										}
	 										else
	 										{
	 											?>
	 												<tr>
	 													<td>ID</td><td><?php echo $row['id']; ?></td>
	 												</tr>
	 												<tr>
	 													<td>Firstname</td><td><?php echo $row['firstname']; ?></td>
	 												</tr>
	 												<tr>
	 													<td>Surname</td><td><?php echo $row['surname']; ?></td>
	 												</tr>
	 												<tr>
	 													<td>Gender</td><td><?php echo $row['gender']; ?></td>
	 												</tr>
	 												<tr>
	 													<td>Phone No.</td><td><?php echo $row['phone']; ?></td>
	 												</tr>
	 												<tr>
	 													<td>Appointment Date</td><td><?php echo $row['appointment_date']; ?></td>
	 												</tr>
	 												<tr>
	 													<td>Symptoms</td><td><?php echo $row['symptoms']; ?></td>
	 												</tr>
	 												<tr>
	 													<td>Date of Booked</td><td><?php echo $row['date_booked']; ?></td>
	 												</tr>
	 											<?php 
	 										}
	 									?>
	 								</tr>
	 							</table>
	 						</div>
	 						<div class="col-md-6">
	 							<h5 class="text-center">Invoice</h5>
	 							<?php 
	 								if (isset($_POST['send'])) 
	 								{
	 									$fees=$_POST['fees'];
	 									$desc=$_POST['desc'];
	 									$doctor=$_SESSION['doctor'];
	 									$firstname=$row['firstname'];
	 									if (empty($fees)) 
	 									{
	 										echo "<span style='color:red;'> Please enter fees </span>";
	 									}
	 									elseif(empty($desc))
	 									{
	 										echo "<span style='color:red;'>Please enter description</span>";
	 									}
	 									else
	 									{
	 										$qry="INSERT INTO `income`(`id`, `doctor`, `patient`, `date_discharge`, `amount_paid`, `description`) VALUES ('','$doctor','$firstname',NOW(),'$fees','$desc')";
	 										$data=mysqli_query($conn,$qry);
	 										if ($data) 
	 										{
	 											echo "<script> alert('Description sent successfully.');</script>";
	 											$d_querry="UPDATE appointment SET STATUS='discharge' WHERE ID='$id'";
	 											$d_run=mysqli_query($conn,$d_querry);
	 										}
	 										else
	 										{
	 											echo "<script> alert('Failed to send.');</script>";
	 										}
	 									}
	 									
	 								}
	 							?>
	 							<form method="post" class="form-group">
	 								<label>Fees</label>
	 								<input type="number" name="fees" class="form-control" autocomplete="off" placeholder="Enter Fees">
	 								<label>Description</label>
	 								<input type="text" name="desc" class="form-control" autocomplete="off" placeholder="Enter Description">
	 								<input type="submit" name="send" value="Send" class="btn btn-danger my-2">
	 							</form>
	 						</div>
	 					</div>
	 				</div>
	 			</div>
	 		</div>
	 	</div>
	 </div>
</body>
</html>