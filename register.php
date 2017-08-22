<?php 
	define('HOST','localhost');
 define('USER','root');
 define('PASS','123password,./');
 define('DB','challan');
 
 $conn = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
 
  $user_name= $_POST['user_name'];
	 $user_pass= $_POST["password"];
 
// $user_name = $_POST['user_name'];
 //$user_city = $_POST['user_city'];
 
 $mysql_query = "INSERT INTO userinfo (name,city) VALUES ('$user_name','$user_pass')";
 //$mysql_query = "INSERT INTO employee_data (username,password) VALUES ('$user_name','$user_pass')";
 $result= mysqli_query($conn,$mysql_query);
 if($result){
	 echo "Registered successfully";
 }
 else{
	 echo "Registration Failed";
 }
 
 ?>