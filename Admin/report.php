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
	
	<title>Report</title>
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
							$query="SELECT * FROM report";
							$run=mysqli_query($conn,$query);
							$result=mysqli_num_rows($run);
							$row=mysqli_fetch_array($run);
						?>
					</div>
					<div class="col-md-10">
						<h5 class="text-center my-4">Total Request</h5>
						<table class="table table-bordered">
							<tr>
								<th>ID</th>
								<th>Title</th>
								<th>Message</th>
								<th>Username</th>
								<th>Date of Send</th>
								<th>Action</th>
								
							</tr>
							<tr>
								<?php
									if ($result<1) 
									{
										echo"<td colspan='5'> No report found yet.</td>";
									}
									else
									{
										?>
											<tr>
												<td><?php echo $row['id']; ?></td>
												<td><?php echo $row['title']; ?></td>
												<td><?php echo $row['message']; ?></td>
												<td><?php echo $row['username']; ?></td>
												<td><?php echo $row['date_reg']; ?></td>
												<td><a href="#"><button class="btn btn-danger">View</button></a></td>
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