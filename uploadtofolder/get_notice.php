<?php
	include('dbConnect.php');
	
	$query= "select * from notices";
	$result= mysqli_query($con,$query);
	
	$response= array();
	
	while($row= mysqli_fetch_array($result)){
		array_push($response,array('notice'=>$row[1]));
	} 	
	mysqli_close($con);
	
	echo json_encode(array('server_response'=>$response));
?>