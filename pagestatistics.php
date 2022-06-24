<?php
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

<script type="text/javascript" src="jquery-1.11.2.jar"></script>
<script type="text/javascript" src="chart.js-3.5.0.jar"></script>
<script type="text/javascript" src="linegraph.js"></script>

<meta http-equiv="expires" content="0">

<meta name="Rights" content="Copyright Covenant University, Ota" />
<meta name="Language" content="en-uk" />
<title>Mathematical Model-based Malaria Prediction System</title>
<link href="pgstyler.css" rel="stylesheet" type="text/css" />
<style type="text/css">
 .chart_container{
     width:640px;
     height:auto;
 }
</style>

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
     <h1>Generated Malaria Prediction Data - version 2.0.7
     <span style="float:right; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size:12px; color:#ffffff;">
       <i class="fas fa-phone"></i>Tel:<a href="tel:07034668163">07034668163  </a>
       <i class="fa-brands fa-facebook"></i>
       <i class="fa-brands fa-twitter"></i>
       <i class="fa-brands fa-google-plus"></i>
       <i class="fa-brands fa-instagram-square"></i>
       &nbsp;&nbsp; <a href="mail: gbenga.adegbite@etu.cu.edu.ng">Mail us</a> &nbsp;&nbsp;
        &nbsp;&nbsp; <a href="index.php">Home</a> &nbsp;&nbsp; 

     </span></h1>
</div>
<div id="topcontainer">
  <img src="bg_1.jpg" width="100% height="200px" /> 
   <center><h1>Generated Malaria Prediction Data  <br/>
  <span style="font-size:13px; font-family:Gisha,Trebuchet; font-weight:normal;">This following data are the Malaria Prediction Data generated based on the Computations performed by the Malaria Prediction Application <br/>
 
</span>
</h1>

<?php
$typera = 'High Rain';
 $sql1 = "Select * from prediction_dynamictable where predictcategory='$typera';";
 
 $typerb = 'Low Rain';
 $sql2 = "Select * from prediction_dynamictable where predictcategory='$typerb';";
 
 $typerc = '80 High Rain';
 $sql3 = "Select * from prediction_dynamictable where predictcategory='$typerc';";
 
 $typerd = '80 Low Rain';
 $sql4 = "Select * from prediction_dynamictable where predictcategory='$typerd';";
 
 $typere = '98 High Rain';
 $sql5 = "Select * from prediction_dynamictable where predictcategory='$typere';";
 
 $typerf = '98 Low Rain';
 $sql6 = "Select * from prediction_dynamictable where predictcategory='$typerf';";
 
 $d1 = $dblink -> query($sql1);
 $d2 = $dblink -> query($sql2);
 $d3 = $dblink -> query($sql3);
 $d4 = $dblink -> query($sql4);
 $d5 = $dblink -> query($sql5);
 $d6 = $dblink -> query($sql6);
 
 echo "<br/><br/><center><caption><strong><em>Malaria Prediction for High Rain</em></strong></caption></center><br/><table border='1' align='center' cellspacing='2' cellpadding='2' width='95%' bgcolor='#000066' style='color:#ffffff; font-weight:bold; font-family:Arial,Trebuchet; font-size:18px; border-collapse:collapse;'>
        <tr><td valign='top' align='center'>
           MODEL SIMULATION DESCRIPTION
        </td>
        <td valign='top' align='center'>
           MALARIA PREDICTION DATA FOR THE INFECTED COMPARTMENT
        </td>
        
        <td valign='top' align='center' >
           PREDICTION CATEGORIES
        </td>
        </tr>";
        
 if($d1){
     
     while($row = mysqli_fetch_array($d1,MYSQLI_ASSOC)){
        $stid =  $row['statisticid'];
        $modelsim = $row['modelsimulation'];
        $pdata = $row['predictdata'];
        $odata = $row['observeddata'];
        $predcateg = $row['predictcategory'];
        
        if($odata == "NULL"){$odata = " ";}
        if($odata > 0){$odata = $odata;}
        $st = $row['status'];
     if($st == 'live'){
        echo "<tr><td valign='top'  bgcolor='#FFFFFF' style='color:#03C;font-size:13px;'>
           $modelsim
        </td>
        <td valign='top'  bgcolor='#FFFFFF' style='color:#03C;font-size:13px;'>
          $pdata
        </td>
       
        <td valign='top'  bgcolor='#FFFFFF' style='color:#03C;font-size:13px;'>
          $predcateg
        </td>
        </tr>
        <tr><td valign='top' colspan='3' height='3px' bgcolor='#CCCCCC'></tr>";
     }
        
     }
     echo "</table>";     
 }
 
  echo "<br/><br/><center><caption><strong><em>Malaria Prediction for Low Rain</em></strong></caption></center><br/><table border='1' align='center' cellspacing='2' cellpadding='2' width='95%' bgcolor='#000066' style='color:#ffffff; font-weight:bold; font-family:Arial,Trebuchet; font-size:18px; border-collapse:collapse;'>
        <tr><td valign='top' align='center'>
           MODEL SIMULATION DESCRIPTION
        </td>
        <td valign='top' align='center'>
           MALARIA PREDICTION DATA FOR THE INFECTED COMPARTMENT
        </td>
        
        <td valign='top' align='center' >
           PREDICTION CATEGORIES
        </td>
        </tr>";
        
 if($d2){
     
     while($row = mysqli_fetch_array($d2,MYSQLI_ASSOC)){
        $stid =  $row['statisticid'];
        $modelsim = $row['modelsimulation'];
        $pdata = $row['predictdata'];
        $odata = $row['observeddata'];
        $predcateg = $row['predictcategory'];
        if($odata == "NULL"){$odata = " ";}
        if($odata > 0){$odata = $odata;}
        $st = $row['status'];
     if($st == 'live'){   
        echo "<tr><td valign='top'  bgcolor='#FFFFFF' style='color:#03C;font-size:13px;'>
           $modelsim
        </td>
        <td valign='top'  bgcolor='#FFFFFF' style='color:#03C;font-size:13px;'>
          $pdata
        </td>
      
        <td valign='top'  bgcolor='#FFFFFF' style='color:#03C;font-size:13px;'>
          $predcateg
        </td>
        </tr>
        <tr><td valign='top' colspan='3' height='3px' bgcolor='#CCCCCC'></tr>";
     }   
        
     }
     echo "</table>";     
 }
 
 
  echo "<br/><br/><center><caption><strong><em>Malaria Prediction for 80% High Rain</em></strong></caption></center><br/><table border='1' align='center' cellspacing='2' cellpadding='2' width='95%' bgcolor='#000066' style='color:#ffffff; font-weight:bold; font-family:Arial,Trebuchet; font-size:18px; border-collapse:collapse;'>
        <tr><td valign='top' align='center'>
           MODEL SIMULATION DESCRIPTION
        </td>
        <td valign='top' align='center'>
           MALARIA PREDICTION DATA FOR THE INFECTED COMPARTMENT
        </td>
       
        <td valign='top' align='center' >
           PREDICTION CATEGORIES
        </td>
        </tr>";
        
 if($d3){
     
     while($row = mysqli_fetch_array($d3,MYSQLI_ASSOC)){
        $stid =  $row['statisticid'];
        $modelsim = $row['modelsimulation'];
        $pdata = $row['predictdata'];
        $odata = $row['observeddata'];
        $predcateg = $row['predictcategory'];
        if($odata == "NULL"){$odata = " ";}
        if($odata > 0){$odata = $odata;}
         $st = $row['status'];
     if($st == 'live'){  
        echo "<tr><td valign='top'  bgcolor='#FFFFFF' style='color:#03C;font-size:13px;'>
           $modelsim
        </td>
        <td valign='top'  bgcolor='#FFFFFF' style='color:#03C;font-size:13px;'>
          $pdata
        </td>
       
        <td valign='top'  bgcolor='#FFFFFF' style='color:#03C;font-size:13px;'>
          $predcateg
        </td>
        </tr>
        <tr><td valign='top' colspan='3' height='3px' bgcolor='#CCCCCC'></tr>";
     }
        
     }
     echo "</table>";     
 }
 
  echo "<br/><br/><center><caption><strong><em>Malaria Prediction for 80% Low Rain</em></strong></caption></center><br/><table border='1' align='center' cellspacing='2' cellpadding='2' width='95%' bgcolor='#000066' style='color:#ffffff; font-weight:bold; font-family:Arial,Trebuchet; font-size:18px; border-collapse:collapse;'>
        <tr><td valign='top' align='center'>
           MODEL SIMULATION DESCRIPTION
        </td>
        <td valign='top' align='center'>
           MALARIA PREDICTION DATA FOR THE INFECTED COMPARTMENT
        </td>
       
        <td valign='top' align='center' >
           PREDICTION CATEGORIES
        </td>
        </tr>";
        
 if($d4){
     
     while($row = mysqli_fetch_array($d4,MYSQLI_ASSOC)){
        $stid =  $row['statisticid'];
        $modelsim = $row['modelsimulation'];
        $pdata = $row['predictdata'];
        $odata = $row['observeddata'];
        $predcateg = $row['predictcategory'];
        if($odata == "NULL"){$odata = " ";}
        if($odata > 0){$odata = $odata;}
        $st = $row['status'];
     if($st == 'live'){   
        echo "<tr><td valign='top'  bgcolor='#FFFFFF' style='color:#03C;font-size:13px;'>
           $modelsim
        </td>
        <td valign='top'  bgcolor='#FFFFFF' style='color:#03C;font-size:13px;'>
          $pdata
        </td>
        
        <td valign='top'  bgcolor='#FFFFFF' style='color:#03C;font-size:13px;'>
          $predcateg
        </td>
        </tr>
        <tr><td valign='top' colspan='3' height='3px' bgcolor='#CCCCCC'></tr>";
     }   
        
     }
     echo "</table>";     
 }
 
  echo "<br/><br/><center><caption><strong><em>Malaria Prediction for 96% High Rain</em></strong></caption></center><br/><table border='1' align='center' cellspacing='2' cellpadding='2' width='95%' bgcolor='#000066' style='color:#ffffff; font-weight:bold; font-family:Arial,Trebuchet; font-size:18px; border-collapse:collapse;'>
        <tr><td valign='top' align='center'>
           MODEL SIMULATION DESCRIPTION
        </td>
        <td valign='top' align='center'>
           MALARIA PREDICTION DATA FOR THE INFECTED COMPARTMENT
        </td>
       
        <td valign='top' align='center' >
           PREDICTION CATEGORIES
        </td>
        </tr>";
        
 if($d5){
     
     while($row = mysqli_fetch_array($d5,MYSQLI_ASSOC)){
        $stid =  $row['statisticid'];
        $modelsim = $row['modelsimulation'];
        $pdata = $row['predictdata'];
        $odata = $row['observeddata'];
        $predcateg = $row['predictcategory'];
        if($odata == "NULL"){$odata = " ";}
        if($odata > 0){$odata = $odata;}
           $st = $row['status'];
     if($st == 'live'){
        echo "<tr><td valign='top'  bgcolor='#FFFFFF' style='color:#03C;font-size:13px;'>
           $modelsim
        </td>
        <td valign='top'  bgcolor='#FFFFFF' style='color:#03C;font-size:13px;'>
          $pdata
        </td>
       
        <td valign='top'  bgcolor='#FFFFFF' style='color:#03C;font-size:13px;'>
          $predcateg
        </td>
        </tr>
        <tr><td valign='top' colspan='3' height='3px' bgcolor='#CCCCCC'></tr>";
     }   
        
     }
     echo "</table>";     
 }
 
  echo "<br/><br/><center><caption><strong><em>Malaria Prediction for 96% Low Rain</em></strong></caption></center><br/><table border='1' align='center' cellspacing='2' cellpadding='2' width='95%' bgcolor='#000066' style='color:#ffffff; font-weight:bold; font-family:Arial,Trebuchet; font-size:18px; border-collapse:collapse;'>
        <tr><td valign='top' align='center'>
           MODEL SIMULATION DESCRIPTION
        </td>
        <td valign='top' align='center'>
           MALARIA PREDICTION DATA FOR THE INFECTED COMPARTMENT
        </td>
       
        <td valign='top' align='center' >
           PREDICTION CATEGORIES
        </td>
        </tr>";
        
 if($d6){
     
     while($row = mysqli_fetch_array($d6,MYSQLI_ASSOC)){
        $stid =  $row['statisticid'];
        $modelsim = $row['modelsimulation'];
        $pdata = $row['predictdata'];
        $odata = $row['observeddata'];
        $predcateg = $row['predictcategory'];
        if($odata == "NULL"){$odata = " ";}
        if($odata > 0){$odata = $odata;}
         $st = $row['status'];
     if($st == 'live'){  
        echo "<tr><td valign='top'  bgcolor='#FFFFFF' style='color:#03C;font-size:13px;'>
           $modelsim
        </td>
        <td valign='top'  bgcolor='#FFFFFF' style='color:#03C;font-size:13px;'>
          $pdata
        </td>
        
        <td valign='top'  bgcolor='#FFFFFF' style='color:#03C;font-size:13px;'>
          $predcateg
        </td>
        </tr>
        <tr><td valign='top' colspan='3' height='3px' bgcolor='#CCCCCC'></tr>";
     }  
        
     }
     echo "</table>";     
 }
?>
<br/><br/><br/><br/><br/>
<center>

<?php
   //Setting the statuses from live to inactive
   
   $upd1 = "Update compartment_data set status='inactive';";
   $upd2 = "Update prediction_dynamictable set status='inactive';";
   
   $updatedone1 = $dblink -> query($upd1); if($upd1){}
   $updatedone2 = $dblink -> query($upd2); if($upd2){}
?>
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