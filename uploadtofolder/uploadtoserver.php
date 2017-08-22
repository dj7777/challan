<?php

	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$image = $_POST['image'];
	$vehicle_no = strtoupper($_POST['vehicle_no']);
//	$location= strtoupper($_POST['location']);
	$latitude= strtoupper($_POST['latitude']);
	$longitude= strtoupper($_POST['longitude']);
		 $date = date('Y-m-d H:i:s');
		 $dateran= date('YDM')	;	
        $complaintnumber=strtoupper("JBP".$dateran.rand(10000,99999));
		 
	 
	define('HOST','localhost');
 define('USER','root');
 define('PASS','123password,./');
 define('DB','challan');
 /*
 
 define('HOST','ap-cdbr-azure-southeast-b.cloudapp.net');
 define('USER','bf1de7f89ae3c8');
 define('PASS','dd207c01');
 define('DB','challan');
 */
 $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
 
		
		$sql ="SELECT id FROM images ORDER BY id ASC";
		
		$res = mysqli_query($con,$sql);
		
		$id = 0;
		
		while($row = mysqli_fetch_array($res)){
				$id = $row['id'];
		}
		
		$path = "uploads/$id.png";
		
		$actualpath = "http://localhost:8081/challan/uploadtofolder/$path";
		//$actualpath = "http://challan.azurewebsites.net/uploadtofolder/$path";
		
		$sql = "INSERT INTO images (image,vehicle_no,Complaint_No,longitude,latitude,Date_Time) VALUES ('$actualpath','$vehicle_no','$complaintnumber','$longitude','$latitude','$date')";
		
		if(mysqli_query($con,$sql)){
			file_put_contents($path,base64_decode($image));
			echo "Successfully Uploaded";
		}
		else{
			echo "Failed";
		}
		
		mysqli_close($con);
	}else{
		echo "Error";
	}
	
	?>