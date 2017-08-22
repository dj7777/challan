<?php
  
 define('HOST','localhost');
 define('USER','root');
 define('PASS','123password,./');
 define('DB','challan');
 $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
 /*
 define('HOST','ap-cdbr-azure-southeast-b.cloudapp.net');
 define('USER','bf1de7f89ae3c8');
 define('PASS','dd207c01');
 define('DB','challan');
 
 
 */
 //$conn= mysqli_connect("ap-cdbr-azure-southeast-b.cloudapp.net","bf1de7f89ae3c8","dd207c01","challan");

?>