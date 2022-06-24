
<?php
//$session_start();
  include('mysqliconnector.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Untitled Document</title>
</head>

<body>
<?php
$user_curr = "Gbenga CU";
		//setting header to json
		header('content-type:application/json'); 
		 $query = "Select T,S,E,I,R,D,V from compartment_data where uid = '$user_curr';";
		 $result = $dblink -> query($query);
		 $data = array();
		 //foreach($result as $row){
		  while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
		   $data[] = $row; 
		 }
		 //free memory associated with resultset
		 $result -> close();
		 $dblink -> close();
		 print json_encode($data);
		?>
</body>
</html>