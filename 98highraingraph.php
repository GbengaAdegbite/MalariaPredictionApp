<?php
//$session_start();
  include("mysqliconnector.php");
?>

<?php


 
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
#floatedleftdiv{
	position:relative;
	width:120px;
	height:2px;
	left:10px;
	top:40%;
	z-index:30;
	background-color:#006;
	font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
	font-size:15px;
	color:#ffffff;
	font-weight:bold; 
 }
 #floateddiv{
	position:absolute;
	width:120px;
	height:20px;
	left:350px;
	top:40%;
	z-index:31;
	background-color:#006;
	font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
	font-size:15px;
	color:#ffffff;
	font-weight:bold; 
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
<div style="width:100%; height:430px;">
<strong><em>Period of 98% High Rain</em><span style="float:right;"><a href="#sub" style="text-decoration:none;background-color:#006; border-style:none; border-color:#006; color:#ffffff; border-radius:15px 15px;width:140px; height:45px; text-align:center; vertical-align:middle; padding:5px 5px 5px 5px; box-shadow:4px 2px 3px rgba(0,0,0,0.3);">View Preliminary Statistics</a></span></strong><br/>
<center>

<div style=" width:100%;" id="curve_chart">
</div>
<div id="floateddiv">
    <em>Compartment <font color='#000066'><strong>Data</strong></font></em>
</div>
<div id="floatedleftdiv">
    <font color='#000066'><strong><em>Time in days</em></strong></font>
</div>
<strong><em></em></strong>
</center>

</div>
<br><br>

    <?Php
//require "config.php";// Database connection

if($stmt = $dblink->query("SELECT timeindays,T,S,E,I,R,D,V FROM compartment_data where categories='98 High Rain' AND status='live';")){

  echo "<br/><br/><hr/><br/><strong><center>No of records : ".$stmt->num_rows."</center></strong><br>";
$php_data_array = Array(); // create PHP array
  echo "<table border='0' cellspacing='2' width='80%' align='center' cellpadding='2' style='border-collapse:collapse;'>
<tr bgcolor='#000066' style='font-family:Trebuchet,Arial; font-size:13px; color:#ffffff;'> <th align='left'>Times In Days</th><th align='left'>T</th><th align='left'>S</th>
<th align='left'>E</th><th align='left'>I</th><th align='left'>R</th><th align='left'>D</th><th align='left'>V</th></tr>";
while ($row = $stmt->fetch_row()) {

  echo "<tr style='font-family:Trebuchet,Arial; font-size:13px; color:#03c;'><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td></tr>
  <tr><td colspan='8' height='1px' bgcolor='#ccc'></td></tr>
  ";
   $php_data_array[] = $row; // Adding to array
  
}
echo "</table>";
}else{
echo $connection->error;
}
//print_r( $php_data_array);
// You can display the json_encode output here. 
//echo json_encode($php_data_array); 

// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d = ".json_encode($php_data_array)."
       
</script>";
?>

 <br/><br/>
<strong><em>Malaria Prediction Statistics for 98% High Rain</em></strong><br/><hr/><br/>
<?php
$typera = '98 High Rain';
 $sql1 = "Select * from prediction_dynamictable where predictcategory='$typera';";
$d1 = $dblink -> query($sql1);

  echo "<br/><br/><a name='sub'></a><center><caption><strong><em>Malaria Prediction for 98% High Rain</em></strong></caption></center><br/><table border='1' align='center' cellspacing='2' cellpadding='2' width='95%' bgcolor='#000066' style='color:#ffffff; font-weight:bold; font-family:Arial,Trebuchet; font-size:18px; border-collapse:collapse;'>
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
        <tr><td valign='top' colspan='4' height='3px' bgcolor='#CCCCCC'></tr>";
     }   
        
     }
     echo "</table>";     
 }
 ?>
 
<a href=https://www.plus2net.com/php_tutorial/chart-line-database.php></a>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
         //data.addColumn('string','uid'); 
		  data.addColumn('string','timeindays');
    data.addColumn('number','T');
    data.addColumn('number','S');
    data.addColumn('number','E');
    data.addColumn('number','I');
    data.addColumn('number','R');
    data.addColumn('number','D');
    data.addColumn('number','V');
    for(i=0;i<5;i++)                                                          
data.addRow([my_2d[i][0],parseInt(my_2d[i][1]),parseInt(my_2d[i][2]),parseInt(my_2d[i][3]),
parseInt(my_2d[i][4]),parseInt(my_2d[i][5]),parseInt(my_2d[i][6]),parseInt(my_2d[i][7])]);
       var options = {
          title: 'Malaria Prediction Data',
        curveType: 'function',
        width: 1000,
        height: 430,
          legend: { position: 'right' }
	    };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        chart.draw(data, options);
	
       }
    ///////////////////////////////
</script>
 
 


 
 
 
 

</body>
</html>