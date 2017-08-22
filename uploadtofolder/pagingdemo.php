<?php
	include('dbConnect.php');
	$per_page=2;
	$adjacents=2;
	$query1= "SELECT count(Complaint_No) FROM images";
	$pages_query= mysqli_query($con,$query1);
		
		
		$pages= ceil(mysql_result($pages_query,0)/$per_page);
		
		$page= (isset($_GET['page']))? (int)$_GET['page']:1;
		
		$start= ($page - 1) * $per_page;
		$sql1= "select * from images LIMIT $start, $per_page";
		$query= mysqli_query($con,$sql1);
		
		$pagination= "pagination";
		
		$prev_page = ($page=1)?1:$page-1;
		
		$next_page= ($page>=$pages)?$page:$page +1;
		
		if($page!=1) $pagination.='<a href="?page=1">First</a>';
		if($page!=1) $pagination.='<a href="?page='.$prev_page.'">Previous</a>';
		$numberoflinks= 5;
		
		$upage= ceil(($page)/$numberoflinks)*$numberoflinks;
		$lpage= floor(($page)/$numberoflinks)*$numberoflinks;
		
		$lpage= ($lpage==0)?1:$lpage;
		$upage= ($lpage==$upage)?$upage+$numberoflinks:$upage;
		if($upage>$pages) $upage=($pages-1);
		
		for($x=$lpage; $x<=$upage;$x++){
			$pagination.=($x== $page)?'<strong>'.$x.'</strong>':'<a href="?page='.$x.'">'.$x.'</a>';
		}
		
		if($page!=$pages) $pagination.= '<a href="?page='.$next_page.'">Next</a>';
		if($page!=$pages) $pagination.= '<a href="?page='.$pages.'">Last</a>';
		
		
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
     	 
		</div>
		
	</nav>
   
   <!-- Navigation bar ends -->
   
   	<div class="container" style="margin-top:40px">
	<table class="table table-bordered" >
		
		<thead style="background-color:#000021;color:#ffffff;font-size:17px;padding:2px">
			<th>S.No.</th>
			<th>Complaint Number</th>
			<th>Description</th>
			<th>Vehicle Number</th>
			<th>Date & Time</th>
			<th>Status</th>
			<th>View / Delete</th>
		</thead>
		<?php
		$count = 1;
	           while($row= mysqli_fetch_assoc($query)):
			 		
?>		
<tr style="font-size:16px">
	<td><?php echo $count ?></td>
	<td><?php echo $row['Complaint_No']; ?></td>
	<td><?php echo $row['Description']; ?></td>
	<td><?php echo $row['vehicle_no']; ?></td>
	<td><?php echo $row['Date_Time']; ?></td>
	<td><?php echo $row['Status']; ?></td>
	<td><a href="viewimage.php?id=<?php echo $row['id']; ?>" target="_blank">View </a>
	<a class="glyphicon glyphicon-search" onclick="return confirm('Do you really want to delete???')" href="delete.php?id=<?php echo $row['id'];?>">/ Delete</a>
	
	</td> 
	
</tr>
	<?php
		$count++;
		
		endwhile;
	?>
	</table>
</div>
<nav>
		<ul class="pager">
			<li> <a href="#"><?php echo $pagination; ?></a></li>
		</ul>
	</nav>		
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery1.js"></script>	
</body>
</html>