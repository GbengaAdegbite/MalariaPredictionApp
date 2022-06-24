<?php
  include('mysqliconnector.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--META DATA-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width,initial-scale=1" />  
<script src="https://kit.fontawesome.com/2ed29b2ae9.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="Publisher" content="Covenant University" />
<meta name="Description" content="For the Mathematical based Malaria Prediction System" />
  
<meta http-equiv="expires" content="0">

<meta name="Rights" content="Copyright Covenant University, Ota" />
<meta name="Language" content="en-uk" />
<title>Mathematical Model-based Malaria Prediction System</title>
<link href="pgstyler.css" rel="stylesheet" type="text/css" />

<script>
function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>
</head>

<body>
<div id="floatedtoplayer">
     <h1>Mathematical Model-based Malaria Prediction System 
     <span style="float:right; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size:12px; color:#ffffff;">
       <i class="fas fa-phone"></i>Tel:<a href="tel:07034668163">07034668163  </a>
       <i class="fa-brands fa-facebook"></i>
       <i class="fa-brands fa-twitter"></i>
       <i class="fa-brands fa-google-plus"></i>
       <i class="fa-brands fa-instagram-square"></i>
       &nbsp;&nbsp; <a href="mail: gbenga.adegbite@etu.cu.edu.ng">Mail us</a> &nbsp;&nbsp;

     </span></h1>
</div>
<div id="topcontainer">
 
   <center><span style="font-size:30px;"><strong>SIGN UP PAGE &nbsp;<br/>Mathematical Model-based Malaria Prediction System </span><br/>
  <span style="font-size:13px; font-family:Gisha,Trebuchet;">This App gives you real-time on-demand data on Malaria Prediction using Advanced Mathematical Model <br/><br/>
  <img src="computer.png" width="320px" height="200px" />&nbsp;  AUTOMATED SOLUTION<br/><br/>
  
 Kindly Create a new account below 
  </span>
</center>
<br/>

<center>
<table border="0" cellspacing="2" cellpadding="2" width="80%">
 <tr>
 <td align="center">
     <form name="frm" action="" method="post" enctype="multipart/form-data">
     <label>Enter your fullname</label><br/>
     <input type="text" name="fullnam" id="fullnam" value=""  /><br/>
     
     <label>Enter your mobile phone</label><br/>
     <input type="text" name="fone" id="fone" value=""  /><br/>
     
     <label>Enter your email</label><br/>
     <input type="text" name="email" id="email" value=""  /><br/>
     
    
     <label>Enter your password</label><br/>
     <input type="password" name="pass" id="pass" value=""   /><br/>
     
     
     <label>Reconfirm your password</label><br/>
     <input type="password" name="pass2" id="pass2" value=""  /><br/>
     
     <label>Enter your Medical Role</label><br/>
     <input type="text" name="desig" id="desig"  /><br/><br/>
     <input type="submit"  name="but2" id="but2" value="Create Account" />
 </form>
 </td>
 </tr>
</table>
</center>
 <br/> <br/><br/>
 
 <center>
<div id="footer">
 <strong>
    Copyrighted &copy; 2022. All Rights Reserved.<br/>
    Gbenga Adegbite - Department of Computer and Information Sciences<br/>
    Covenant University, Ota, Nigeria.<br/> 
    </strong>
    </div>
 </center>
 
 <br/><br/>
 
</div>
 
 
<?php
  //This part processes the web form using php script
  if(isset($_POST['but2'])){

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

 $sqlwe = "INSERT INTO `userlogin` (`uid` ,`login` ,`password`) VALUES (NULL, '$fnm','$pass');";
 
	  $done = $dblink -> query($sqlw);
	  $done = $dblink -> query($sqlwe);
	  
	  if($done && $sqlwe){

echo "<script type='text/javascript'> window.alert('Your new account has just been created. You can now go and sign in with your account on the login page.'); window.open('signin.php');  </script>";}
	  
	}

}
 ?>

</body>
</html>