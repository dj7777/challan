<?php 
		$conn= mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bf1de7f89ae3c8","dd207c01","challan");
	$id= $_GET['id'];
	$sql = "delete from officers_contact where id='$id'";
	if(mysqli_query($conn,$sql)){
		header("location:contacts.php");
	}
		
?>