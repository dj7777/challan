<?php
session_start();
	if(!(isset($_SESSION['adminlogin']))){
		header("location:adminlogin.php");
	} 
?>
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
     	 <ul class="nav navbar-nav pull-right" >
                   <li  ><a style="color:white;font-size:20px" href="dashboard.php"><b>Home</b></a></li>
				   <li  ><a style="color:white;font-size:20px" href="sendnotice.php"><b>Notices</b></a></li>
				   <li  ><a style="color:red;font-size:20px" href="logout.php"><b>Log Out</b></a></li>
               
           </ul>
		</div>
		
	</nav>
   
   <!-- Navigation bar ends -->
 
 <div class="container">
	 <div class="form-horizontal col-md-7 col-md-offset-2" style="margin-top:8px">
			<form method="POST"  role="form" >
				<label style="font-size:20px" >Enter Contact Details</label>
	 			<input type="text" class="form-control" style="margin-top:6px" name="name" id="name"  placeholder="Enter Name" required />
				 <input type="text" class="form-control" name="number" style="margin-top:8px" id="number" placeholder="Enter Number" required />
	    <?php
	        if(isset($_POST["name"]) && isset($_POST["number"] )){
			       
		         $name = $_POST["name"];
				 $number = $_POST["number"];
				 		 $date = date('Y-m-d H:i:s');
							
			  $conn= mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bf1de7f89ae3c8","dd207c01","challan");
			    
       			 $query= "insert into officers_contact(officer_name,mobile_no,o_date) values ('$name','$number','$date')";
                 $result = mysqli_query($conn,$query);
        	
               }	
	?>
				 <button class="btn btn-primary" style="margin-top:14px;margin-left:45%;width:90px" >Send</button>
	 		</form>
	</div>
	<div style="margin-top:20%">
	<table class="table table-bordered" >
		<thead style="background-color:#000021;color:#ffffff;font-size:17px;padding:2px">
			<th>S.No.</th>
			<th>Name</th>
			<th>Number</th>
			<th>Date & Time</th>
			<th>Delete</th>
		</thead>
		<?php
			$conn= mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bf1de7f89ae3c8","dd207c01","challan");
	$sql="select * from officers_contact ORDER BY o_date desc";
	$query=mysqli_query($conn,$sql);
	   
	   while($row= mysqli_fetch_assoc($query)):	 		
?>		
<tr style="font-size:16px">
	<td><?php echo $row['id'] ?></td>
	<td><?php echo $row['officer_name']; ?></td>
	<td><?php echo $row['mobile_no']; ?></td>
	<td><?php echo $row['o_date']; ?></td>
	<td><a  onclick="return confirm('Do you really want to delete???')" href="contactdelete.php?id=<?php echo $row['id'];?>">Delete</a>
	
	</td> 
	
</tr>
	<?php
		endwhile;
	?>
	</table>
	</div>
</div> 
   
</body>
</html>