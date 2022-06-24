<?php
session_start();
  include('mysqliconnector.php');
?>

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<!--META DATA-->
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<meta http-equiv='X-UA-Compatible' content='IE=edge' />
<meta name='viewport' content='width=device-width,initial-scale=1' />  
<script src='https://kit.fontawesome.com/2ed29b2ae9.js' crossorigin='anonymous'></script>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<meta name='Publisher' content='Covenant University' />
<meta name='Description' content='For the Mathematical based Malaria Prediction System' />
  
<meta http-equiv='expires' content='0'>

<meta name='Rights' content='Copyright Covenant University, Ota' />
<meta name='Language' content='en-uk' />
<title>Mathematical Model-based Malaria Prediction System</title>
<link href='pgstyler.css' rel='stylesheet' type='text/css' />

<script>
function myFunction() {
  var x = document.getElementById('myLinks');
  if (x.style.display === 'block') {
    x.style.display = 'none';
  } else {
    x.style.display = 'block';
  }
}

function hideDivs(){
  div_obj1 = window.document.getElementById('left');
  div_obj2 = window.document.getElementById('right'); 
  
  div_obj1.style.visibility="hidden";
  div_obj2.style.visibility="hidden"; 
}
</script>
</head>

<body>
<?php
  //This part processes the web form using php script
  

      $user = $_POST['user'];
      $psse = $_POST['pass'];
     	
	   $acct_sniffer = "Select login, password from userlogin where login='$user' AND password='$psse';";
	   $finder = $dblink -> query($acct_sniffer);
       if($finder){
		   while($row = mysqli_fetch_array($finder,MYSQLI_ASSOC)){
                     //$userid = $row['uid'];
					 $useri = $row['login'];
                     $pssi = $row['password'];
					 
					 //Doing further confirmation of acct
					 if(($user == $useri) && ($psse == $pssi)){
					   $_Session['usa'] = $user;
					   $_Session['passwd'] = $psse;
					   $uza = $_Session['usa'];
					   
					   if((isset($_Session['usa'])) && (isset($_Session['passwd']))){
						 echo "<div id='floatedtoplayer'>
     <h1>Mathematical Model-based Malaria Prediction System 
     <span style='float:right; font-family:Lucida Sans Unicode, Lucida Grande, sans-serif; font-size:12px; color:#ffffff;'>
       <i class='fas fa-phone'></i>Tel:<a href='tel:07034668163'>07034668163  </a>
       <i class='fa-brands fa-facebook'></i>
       <i class='fa-brands fa-twitter'></i>
       <i class='fa-brands fa-google-plus'></i>
       <i class='fa-brands fa-instagram-square'></i>
       &nbsp;&nbsp; <a href='mail: gbenga.adegbite@etu.cu.edu.ng'>Mail us</a> &nbsp;&nbsp;
       &nbsp;&nbsp; <a href='index.php'>Home</a> &nbsp;&nbsp;

     </span></h1>
</div>
<div id='topcontainer'>
<div style='font-family:Palatino Linotype, Book Antiqua, Palatino, serif; font-size17px; font-weight:bold; padding:5px 5px 5px 5px;'>Welcome $uza -  <sub><em>Connected as registered User</em></sub></div>


  <img src='bg_1.jpg' width='100%' height='200px' /> 
   <center><h1>Mathematical Model-based Malaria Prediction System <br/></h1>
  <span style='font-size:13px; font-family:Gisha,Trebuchet;'>This App gives you real-time on-demand data on Malaria Prediction<br/> using Advanced Mathematical Model <br/><br/>
  
To get predictions on Malaria data based on Mathematical Model, you will need to provide the total number of Travellers in the textbox below:
<br/><br/>
  </span>
</center>
<br/>

<center>
<div style='width:100%; height:auto; background:url(bg_5.jpg); background-size:100%; background-repeat:no-repeat; display:inline-block' >
  <div id='left' style='width:40%; height:250px; float:left;' >
         <span style='float:right; clear:both;'>  <br/><br/><br/><br/>
          <button name='1' id='1' style='width:165px; height:30px;'>Input Parameters</button><br/> <br/>
          
          <a href='index.php'><button id='4' onclick='javascript:hideDivs();' style='width:165px; height:30px;'>Exit Application</button></a><br/><br/> 
          
          <br/><br/>
              
         </span>
  </div>
  <div id='right' style='width:60%; height:auto;  float:right;color:#03c;' ><br/> <br/>
     <form name='frm' action='prediction_graphicals.php' method='post' enctype='multipart/form-data'>
     <label>Enter the Total Number of Travellers</label><br/>
     <input type='text' name='travellers' id='travellers' value='' style='width:70%;'/><br/>
     <br/>
      <label>Enter the Total Number of Susceptible Humans</label><br/>
     <input type='text' name='s' id='s' value='' style='width:70%;'/><br/>
     <br/>
      <label>Enter the Total Number of Exposed Humans</label><br/>
     <input type='text' name='e' id='e' value='' style='width:70%;'/><br/>
     <br/>
      <label>Enter the Total Number of Vigilant Human In The Entire Population</label><br/>
     <input type='text' name='v' id='v' value='' style='width:70%;'/><br/>
     <br/>
      <label>Enter the Total Number of Vigilant Humans using Long Lasting Insecticide-treated Net </label><br/>
     <input type='text' name='vl' id='vl' value='' style='width:70%;'/><br/>
     <br/>
      <label>Enter the Total Number of Vigilant Humans using Indoor Residual Spray</label><br/>
     <input type='text' name='vi' id='vi' value='' style='width:70%;'/><br/>
     <br/>
      <label>Enter the Total Number of Vigilant Humans using Traditional Malaria Control Strategies</label><br/>
     <input type='text' name='vt' id='vt' value='' style='width:70%;' /><br/>
     <br/>
    
     <br/>
    <input type='submit' id='bux' name='bux' value='Get Prediction' /> <br/>
    <input type='text' name='currid' id='currid' value='$uza' style='visibility:hidden;'/>
 </form>
  </div>
</div>
<br/><br/>

<table border='0' cellspacing='2'  align='center' cellpadding='2' width='80%'>
 <tr>
  <td align='center'>
  
 </td>
  
 </tr>
</table>
</center>
 <br/> <br/><br/>
 
 <center>
 
 <div id='footer'>
 <strong>
    Copyrighted &copy; 2022. All Rights Reserved.<br/>
    Gbenga Adegbite - Department of Computer and Information Sciences<br/>
    Covenant University, Ota, Nigeria.<br/> 
    </strong>
    </div>
 </center>
 
 <br/><br/>
 
</div>";  
					   }
					 }
					
                     
		   }
	   }
			    
				
 ?>


 
 

</body>
</html>