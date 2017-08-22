<?php
	session_start();
	if(isset($_SESSION['adminlogin']))
      {
	     if($_SESSION['adminlogin'] == "yes"){
			 header("location: dashboard.php");
			 exit();
		 }
      }
	?>
	

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Login</title>
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
	<!-- Main content starts -->
	<div class="container" style="padding:0px" >
			
		<div class="col-sm-4 col-sm-offset-4">
			 <div class="panel panel-default" style="padding:3px;border:solid 1px #000021"  >
				 <div class="panel-heading" style="background-color:#000021">
					 <h3 class="panel-title text-center" style="color:white;font-size:18px" ><b>Log In</b></h3>
				 </div>
				 <div class="panel-body">
			         <form method="POST" class="form" role="form" >
						  <div class="form-group">
							 <label class="control-label"for="fullname">User Name</label>
					         <input type="text" class="form-control" name="username" id="username" placeholder="User Name" required></input>
						 </div>
						 
	                     <div class="form-group">
							 <label for="password">Password</label>
					         <input type="password" class="form-control" name="password" id="password" placeholder="Password" required></input>
						 </div>
											 
	
	                 <?php
	                    if((isset($_POST["username"]) && isset($_POST["password"])) ){
			                $username= $_POST["username"];
			                $password = $_POST["password"];
						  
							if($username=="TPOLICEJBP" && $password == "trafficjbp./")
							{
								header("location: dashboard.php");
									$_SESSION["adminlogin"] = "yes";
							}
							
							else{
								echo '<p class="h2" style="color:red"> Login Failed</p>';
							}
		                 }	 
	?>
	
						 	 <button type="submit" name="insert" class="btn btn-primary col-sm-offset-5 col-md-offset-5"><b>Log In</b></button>
					 </form>
			     </div>
			</div>		 
		</div>
     </div>
	 </div>
	 
	 
<!-- Main content ends  -->
	

<script src="js/jquery1.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>