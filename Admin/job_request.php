<?php 
		session_start();
		$user=$_SESSION['uname'];

	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Job Request</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<?php 
			include '../header.php';
			
		?>
	<div class="container-fluid" style="margin-left:-30px;">
		<div class="col-md-12">
			<div class="row" >
				<div class="col-md-2">
					<?php 
						include "sidenav.php";
					 ?>
				</div>
				<div class="col-md-10">
					<h5 class="text-center my-1">Job Request</h5>
					<div id="show"> </div>
				</div>
			</div>
			
		</div>
		
	</div>
	<script type="text/javascript">
		$(document).ready(function () 
		{
				show();
			function show() 
			{
				$.ajax({
				url: "ajax_job_request.php",
				method:"POST",
				success:function(data){
					$("#show").html(data);
					}
				});
			}
				$(document).on('click','.approve',function(){
				var id=$(this).attr("id");
				$.ajax({
				url: "ajax_approve.php",
				method:"POST",
				data:{id:id},
				success:function(data){
					$("#show").html(data);
					}
				});
			});
				$(document).on('click','.reject',function(){
				var id=$(this).attr("id");
				$.ajax({
				url: "ajax_reject.php",
				method:"POST",
				data:{id:id},
				success:function(data){
					$("#show").html(data);
					}
				});
			});
		});
	</script>
</body>
</html>