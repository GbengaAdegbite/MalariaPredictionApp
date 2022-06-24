<?php
//ENTER YOUR DATABASE CONNECTION INFO BELOW:
$hostname="localhost";
$database="MBMPS_db";
$username="root";
$password="";

 //Connecting to Data
		  $dblink = new mysqli($hostname,$username,$password,$database);
		  if($dblink){
			 // echo "Database Connect";
		  }
		  if(mysqli_connect_errno())
		  {
			  die("MySQL Connection failed :".mysqli_connect_error());
		  }
?>