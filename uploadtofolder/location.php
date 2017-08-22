<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Traffic Click</title>
    <script src="http://maps.googleapis.com/maps/api/js"></script>
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
<?php 
/*
    $id= $_GET['id'];
    include("dbConnect.php");
    $query= "select latitude,longitude,image from images where Complaint_No='$id'";
    $result= mysqli_query($con,$query);
    
           while($row= mysqli_fetch_array($result)){
               $latitude= $row['latitude'];
               $longitude= $row['longitude'];
               $image = $row['image'];
           }
*/
$latitude = '23.1332979';
$longitude= '79.8795473';
$geolocation = $latitude.','.$longitude;
//$geolocation = '51.5032520','-0.1278990';
$request = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.$geolocation.'&sensor=false'; 
$file_contents = file_get_contents($request);
$json_decode = json_decode($file_contents);
if(isset($json_decode->results[0])) {
    $response = array();
    foreach($json_decode->results[0]->address_components as $addressComponet) {
        if(in_array('political', $addressComponet->types)) {
                $response[] = $addressComponet->long_name; 
        }
    }

    if(isset($response[0])){ $first  =  $response[0];  } else { $first  = 'null'; }
    if(isset($response[1])){ $second =  $response[1];  } else { $second = 'null'; } 
    if(isset($response[2])){ $third  =  $response[2];  } else { $third  = 'null'; }
    if(isset($response[3])){ $fourth =  $response[3];  } else { $fourth = 'null'; }
    if(isset($response[4])){ $fifth  =  $response[4];  } else { $fifth  = 'null'; }

    if( $first != 'null' && $second != 'null' && $third != 'null' && $fourth != 'null' && $fifth != 'null' ) {
        echo "<br/>Address:: ".$first;
        echo "<br/>City:: ".$second;
        echo "<br/>State:: ".$fourth;
        echo "<br/>Country:: ".$fifth;
    }
    else if ( $first != 'null' && $second != 'null' && $third != 'null' && $fourth != 'null' && $fifth == 'null'  ) {
        echo "<br/>Address:: ".$first;
        echo "<br/>City:: ".$second;
        echo "<br/>State:: ".$third;
        echo "<br/>Country:: ".$fourth;
    }
    else if ( $first != 'null' && $second != 'null' && $third != 'null' && $fourth == 'null' && $fifth == 'null' ) {
        echo "<br/>City:: ".$first;
        echo "<br/>State:: ".$second;
        echo "<br/>Country:: ".$third;
    }
    else if ( $first != 'null' && $second != 'null' && $third == 'null' && $fourth == 'null' && $fifth == 'null'  ) {
        echo "<br/>State:: ".$first;
        echo "<br/>Country:: ".$second;
    }
    else if ( $first != 'null' && $second == 'null' && $third == 'null' && $fourth == 'null' && $fifth == 'null'  ) {
        echo "<br/>Country:: ".$first;
    }
  }

?>

    <script>
function initialize() {
    var latitude = '<?php echo $latitude; ?>';
    var longitude = '<?php echo $longitude; ?>';
  var mapProp = {
    center:new google.maps.LatLng(latitude,longitude),
    zoom:18,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>

<div class="pull-right" id="googleMap" style="width:500px;height:380px;"></div>

<form method="POST"  role="form" style="margin-top:450px" >
	 			<input type="text" class="form-control" name="mvacode" id="mvacode"  placeholder="Enter MVA/CMVA Code" required />
                 </br>
                <input type="text" class="form-control" name="vehicle_no" id="vehicle_no"  placeholder="Enter Vehicle Number" />
                </br>
                <input type="text" class="form-control" name="complaint_no" id="complaint_no"  placeholder="Enter Complaint Number" required />
	    <?php
	        if(isset($_POST["mvacode"]) ){
			       
		         $mvacode= $_POST["mvacode"];
                 $vehicle_no= $_POST["vehicle_no"];
                 $complaint_no = $_POST["complaint_no"];
                 
		 $date = date('Y-m-d H:i:s');
							
			     //include("dbConnect.php");
			    
       			 $query= "update images SET mvacode= '$mvacode', vehicle_no='$vehicle_no' where complaint_no='$complaint_no' ";
                 $result = mysqli_query($con,$query);
        	
               }	
	?>
				 <button class="btn btn-primary" style="margin-top:14px;margin-left:45%;width:90px" >Submit</button>
	 		</form>
</div>