<?php 
	session_start();
?>
<table class='table table-bordered'>
			<tr>
				<th>ID </th>
				<th>First Name </th>
				<th>Surname </th>
				<th>Username</th>
				<th>Gender</th>
				<th>Phone No.</th>
				<th>Country</th>
				<th>Date of Reg </th>
				<th class="text-center">Action</th>
			</tr>
<?php
	include '../connection.php';
	$show_job_query="SELECT * FROM doctors WHERE STATUS='Pending' ORDER BY date_reg ASC";
	$run=mysqli_query($conn,$show_job_query);
	if(mysqli_num_rows($run)<1)
			{
				echo "
				<tr>
					<td colspan='9' class='text-center'> No request found yet.</td>
				</tr>
				";
			}
		else
		{
			while ($row=mysqli_fetch_array($run)) 
			{
				?>
					<tr>
				<td><?php echo $row['id']; ?> </td>
				<td><?php echo $row['firstname']; ?> </td>
				<td><?php echo $row['surname']; ?> </td>
				<td><?php echo $row['username']; ?> </td>
				<td><?php echo $row['gender']; ?> </td>
				<td><?php echo $row['phone']; ?> </td>
				<td><?php echo $row['country']; ?> </td>
				<td><?php echo $row['date_reg']; ?> </td>
				<td>
					<div class='col-md-12'>
						<div class='row'>
							<div class='col-md-6'>
								<button id='<?php  echo $row['id']; ?> ' class='btn btn-danger approve'>Approve</button>
							</div>
							<div class='col-md-6'>
								<button id='<?php echo $row['id']; ?> ' class='btn bg-success text-white reject'>Reject</button>
							</div>
						</div>
					</div>
				</td>
			</tr>
			<?php 
		}
	}
	?>
		
</table>		
			
