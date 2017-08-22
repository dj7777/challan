<?php 
	require_once('dbConnect.php');
	$id= $_GET['id'];
	$sql = "delete from images where id='$id'";
	if(mysqli_query($con,$sql)){
		header("location:dashboard.php");
	}
		
?>