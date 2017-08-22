<?php
	include('dbConnect.php');
	
	$query= "select * from officers_contact";
	$result= mysqli_query($con,$query);
	
	$response= array();
	
	while($row= mysqli_fetch_array($result)){
		array_push($response,array('name'=>$row[1],'number'=>$row[2]));
	} 	
	mysqli_close($con);
	
	echo json_encode(array('server_response'=>$response));
?>