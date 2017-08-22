<?php 
		define('HOST','ap-cdbr-azure-southeast-b.cloudapp.net');
 define('USER','bf1de7f89ae3c8');
 define('PASS','dd207c01');
 define('DB','challan');
 $conn = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
	
	$id= $_GET['id'];
	$sql = "delete from notices where id='$id'";
	if(mysqli_query($conn,$sql)){
		header("location:sendnotice.php");
	}
		
?>