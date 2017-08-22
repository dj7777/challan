<?php
	 
//	 require "conn.php";
	 define('HOST','localhost');
 define('USER','root');
 define('PASS','123password,./');
 define('DB','employee101');
 
 $conn = mysqli_connect(HOST,USER,PASS,DB);
 

	 $user_name= $_POST['user_name'];
	 $user_pass= $_POST["password"];
	 $mysql_qry ="select * from employee_data where username like '$user_name' and password like '$user_pass';";
	 $result = mysqli_query($conn,$mysql_qry);
	 
	 if(mysqli_num_rows($result)>0){
	 echo "login success";
	 }
	 else{
	 echo "unsuccessful";
	 }
?>