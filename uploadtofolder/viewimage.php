<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Traffic Click</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet"/>
</head>
	
<body style="background-color:#ffffff">
	<!-- Header Section Starts -->
	<nav class="navbar navbar-inverse">
		<div class="container"style="padding:2px" >
	     
         <div class="navbar-header"> 
           <ul style="color:#ffffff" class="nav navbar-nav pull-left" >
               <li style="font-size:30px" > <a href="#"><b>Traffic Police Jabalpur</b></a></li>
               
           </ul>
         </div>     
     	 
		</div>
		
	</nav>
   
   <!-- Navigation bar ends -->
  <div class="container"> 
   <?php   			require_once('dbConnect.php');
	$id= $_GET['id'];
	$sql = "select * from images where Complaint_No='$id'";
	$res = mysqli_query($con,$sql);
	           while($row= mysqli_fetch_array($res)):
?>
<div>
<img style="height:400px;width:400px;border: solid 2px black;padding:2px" src="<?php echo $row['image']; ?>">
</div>
<div style="margin-top:10px;margin-left:160px" >
<a href="<?php echo $row['image']; ?>" download>
<button class="btn btn-primary"  >Download</button>    </a>
</div>
<?php
	endwhile;
	?>
	</div>