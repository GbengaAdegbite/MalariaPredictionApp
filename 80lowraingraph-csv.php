<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
<head>
<title>Malaria Prediction Data for the Period of Low Rain</title>
</head>
<body >
<?Php
$f_pointer=fopen("chart_data_line.csv","r"); // file pointer
$php_data_array = Array(); // create PHP array
while(! feof($f_pointer)){
$ar=fgetcsv($f_pointer);
//echo print_r($ar); // print the array 
$php_data_array[] = $ar; // Adding to array
}
//print_r($php_data_array);
echo "<script>
var my_2d=".json_encode($php_data_array)."

</script>";
?>
<strong><em>Period of 80 Low Rain</em></strong>
<div id='curve_chart'></div>
<script type="text/javascript"
    src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current',{packages:['corechart']})
google.charts.setOnLoadCallback(drawChart);
function drawChart(){
    //var data=new google.visualization
    var data=new google.visualization.DataTable();
    //data.addColumn('string','uid');
	data.addColumn('string','timeindays');
    data.addColumn('number','T');
    data.addColumn('number','S');
    data.addColumn('number','E');
    data.addColumn('number','I');
    data.addColumn('number','R');
    data.addColumn('number','D');
    data.addColumn('number','V');
    window.alert(my_2d.length);
       for(i=0;i<5;i++)                                                          
data.addRow([my_2d[i][0],parseInt(my_2d[i][1]),parseInt(my_2d[i][2]),parseInt(my_2d[i][3]),
parseInt(my_2d[i][4]),parseInt(my_2d[i][5]),parseInt(my_2d[i][6]),parseInt(my_2d[i][7])]);

var options = {
 title: 'Malaria Prediction Data - version 1.0.2',
 curveType: 'function',
width: 800,
 height: 500,
     legend: { position: 'bottom' },
       animation:{'startup':true,
        duration: 5000,
        easing: 'out',
      },
 };
 var chart=new
 google.visualization.LineChart(document.getElementById('curve_chart'))
chart.draw(data,options);
}
</script>












</body></html>
