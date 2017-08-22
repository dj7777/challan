<?php
session_start();
	if(!(isset($_SESSION['adminlogin']))){
		header("location:adminlogin.php");
	} 
	    	  
include("dbConnect.php");
$start=0;
$limit=100;
  $count=1;
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $start=($id-1)*$limit;
}
else{
    $id=1;
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
                   <li  ><a style="color:white;font-size:20px" href="sendnotice.php"><b>Notices</b></a></li>
				   <li  ><a style="color:white;font-size:20px" href="contacts.php"><b>Contacts</b></a></li>
				   <li  ><a style="color:red;font-size:20px" href="logout.php"><b>Log Out</b></a></li>        
           </ul>
		</div>
		
	</nav>
   
   <!-- Navigation bar ends -->
   
   	<div class="container" style="margin-top:40px">
	<table class="table table-bordered" >
		
		<thead style="background-color:#000021;color:#ffffff;font-size:17px;padding:2px">
			<th>S.No.</th>
			<th>Complaint Number</th>
			<th>Comment</th>   
			<th>Vehicle Number</th>
     		<th>MVA/CMVA Code</th>
			<th>Date & Time</th>
			<th>View / Delete</th>
		</thead>
		<?php
			
//		static	$count = 1;
$query=mysqli_query($con,"select * from images ORDER BY Date_Time desc LIMIT $start, $limit");
		
	           while($row= mysqli_fetch_assoc($query)):
			 		
?>		
<tr style="font-size:16px">
	<td><?php echo $count ?></td>
	<td><?php echo $row['Complaint_No']; ?></td>
	<td><?php echo $row['comment']; ?></td>
	<td><?php echo $row['vehicle_no']; ?></td>
<td><?php echo $row['mvacode']; ?></td>
	<td><?php echo $row['Date_Time']; ?></td>

	<td><a href="location.php?id=<?php echo $row['Complaint_No']; ?>" target="_blank">View </a>
	<a  onclick="return confirm('Do you really want to delete???')" href="delete.php?id=<?php echo $row['id'];?>">/ Delete</a>
	
	</td> 
	
</tr>
	<?php
		$count++;
		
		endwhile;
	?>
	</table>
	<?php
//fetch all the data from database.
$rows=mysqli_num_rows(mysqli_query($con,"select * from images"));
//calculate total page number for the given table in the database
$total=ceil($rows/$limit);
echo " <ul class='pager'> ";
if($id>1)
{
    //Go to previous page to show previous 10 items. If its in page 1 then it is inactive
    echo "<li><a href='?id=".($id-1)."' class='button'>PREVIOUS</a></li>";
}
for($i=1;$i<=$total;$i++)
        {
            if($i==$id) { echo "<li><a hre='#'>".$i."</a></li>"; }
             
            else { echo "<li><a href='?id=".$i."'>".$i."</a></li>"; }
        }
if($id!=$total)
{
    ////Go to previous page to show next 10 items.
    echo "<li><a href='?id=".($id+1)."' class='button'>NEXT</a></li>";
}
?>

</ul>

</div>