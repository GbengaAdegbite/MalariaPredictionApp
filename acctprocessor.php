<?php
  include('mysqliconnector.php');
?>

<?php
  //This part processes the web form using php script
  

     $fnm = $_POST['fullnam'];
      $fone = $_POST['fone'];
      $email = $_POST['email'];
      $pass = $_POST['pass'];
      $confirmpass = $_POST['pass2'];
      $roles = $_POST['desig'];
      $timezone = date_default_timezone_get();
      date_default_timezone_set($timezone);
      $date = date('y-m-d h:i:s a', time());
	
	  
	if($pass == $confirmpass){
	  $sqlw = "INSERT INTO `users` (`userid` ,`fullname` ,`mobilephone` ,`email` ,`medicaldesignation` ,`password` ,`datelogged`) VALUES (NULL, '$fnm','$fone', '$email', '$roles', '$pass', '$date');";

	  $done = $dblink -> query($sqlw);
	  if($done){

echo "<script type='text/javascript'> window.alert('Your new account has just been created. You can now go and sign in with your account on the login page.');  </script>";}
	  
	}


 ?>
 
 
 