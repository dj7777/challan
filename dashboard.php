<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Smart City Jabalpur</title>
	<link href="css/bootstrap.min.css" rel="stylesheet"/>
</head>
	
<body>
	<!-- Header Section Starts -->
	<nav class="navbar navbar-default">
		<div class="container"style="padding:2px" >
	     
         <div class="navbar-header"> 
           <ul class="nav navbar-nav" >
               <li><a href="#">Home</a></li>
               
           </ul>
         </div>     
     	 
		</div>
		
	</nav>
   
   <!-- Navigation bar ends -->
  

<?php
 define('HOST','localhost');
 define('USER','root');
 define('PASS','123password,./');
 define('DB','challan');
 
 $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
 

 
		$sql = "select * from images";
		
		
		$r = mysqli_query($con,$sql);
		
		while($result = mysqli_fetch_array($r)){
		
	header('content-type: image/jpeg');
	
		echo base64_decode($result['image']);
		}
		mysqli_close($con);
		
	
	?>
	
</body>
</html>