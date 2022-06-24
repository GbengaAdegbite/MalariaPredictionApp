<?php
//$session_start();
  include("mysqliconnector.php");
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
  <img src="bblog4.jpg" width="100% height="400px" /> 
   <center><h1>Mathematical Model-based Malaria Prediction System <br/></h1>
  <span style="font-size:13px; font-family:Gisha,Trebuchet;">This App gives you real-time on-demand data on Malaria Prediction<br/> using Advanced Mathematical Model <br/><br/>
  
 Kindly sign in below with your registered login account
  </span>
</center>
<br/>

<center>
<table border="0" cellspacing="2"  style="padding:5px 5px 5px 5px;" align="center" cellpadding="2" width="80%">
 <tr>
  <td >
 <form name="frm" action="" method="post" enctype="multipart/form-data">
     <label>Enter your email address</label><br/>
     <input type="text" name="email" id="email"  /><br/>
     <label>Enter your username</label><br/>
     <input type="text" name="user" id="user"  /><br/><br/>
     <input type='submit' id="sbb" name="sbb" value='Get Password'/>&nbsp;&nbsp; <sub><em>To sign in again! <a href="signin.php" style="color:#009;" >click here</a></em></sub>
 </form>
 </td>
   <td>
   <h1><em><strong>Here is your Password</strong></em><br/>
   <?php
      if(isset($_POST['sbb'])){
		 $emai = $_POST['email'];  
		 $uza = $_POST['user'];
		 
		 $sq = "SELECT password FROM userlogin WHERE login='$uza';";
		 $dn = $dblink -> query($sq);
		 if($dn){
			while($row = mysqli_fetch_array($dn,MYSQLI_ASSOC)){
				$passwd = $row['password'];
				echo $passwd;
			}
			 
		 }
		 
		
  /** ini_set( 'display_errors', 1 );
   error_reporting( E_ALL );
   $from = "gbenga.adegbite@stu.cu.edu.ng";
   $to = $emai;
   $subject = "Your Password has been retrieved for you from our databank";
   $message = "
   <html>
   <head>
       <title>Password Recovery</title>
   </head>
   <body><br/>
   <img src='bg_1.jpg' width='450px' height='250px' /> <br/>
       <p>Hi $uza. Your Password has been confirmed as <em>$passwd</em></p>
	   <br/>
	   <sub><em>You can now go and sign in again with your login account<br/></em></sub><br/><br/>
	   <img src='computer.png' width='450px' height='250px' /> <br/>
	   <strong><em>Gbenga Adegbite</em><br/>
	   <em>Developer</em>
	   </strong>
   </body>
   </html>
   ";
  // The content-type header must be set when sending HTML email
   $headers = "MIME-Version: 1.0" . "\r\n";
   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
   $headers = "From:" . $from;
   if(mail($to,$subject,$message, $headers)) {
      echo "Message was sent.";
   } else {
      echo "Message was not sent.";
   }
}**/
}
?>
   
		 	  
	
  </h1>
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
 
 
 
 

</body>
</html>