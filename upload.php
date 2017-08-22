<?php

	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$image = $_POST['image'];
		
		define('HOST','localhost');
 define('USER','root');
 define('PASS','123password,./');
 define('DB','challan');
 
 $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
 
		//require_once('dbConnect.php');
		
		$sql = "INSERT INTO images (image) VALUES (?)";

		$stmt = mysqli_prepare($con,$sql);
		
		mysqli_stmt_bind_param($stmt,"s",$image);
		mysqli_stmt_execute($stmt);
		
		$check = mysqli_stmt_affected_rows($stmt);
		
		if($check == 1){
			echo "Image Uploaded Successfully";
		}else{
			echo "Error Uploading Image";
		}
		mysqli_close($con);
	}else{
		echo "Error";
	}
?>