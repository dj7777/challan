<?php
		$sql = "select * from images";
		require_once('dbConnect.php');
		
		$r = mysqli_query($con,$sql);
	header('content-type: image/jpeg');	
	
	while($result = mysqli_fetch_array($r)){
		
	
	 
		echo base64_decode($result['image']);
		
		}	
		mysqli_close($con);
	?>
	<html>
	<head></head>
<body>
	
</body>