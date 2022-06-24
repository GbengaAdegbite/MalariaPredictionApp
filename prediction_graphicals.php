<?php
//$session_start();
  include("mysqliconnector.php");
?>

<?php


 $T = $_POST["travellers"];
 $user_curr = $_POST["currid"];
 $alpha1 = 0; $v1 = 0;
 $alpha2 = 0; $v2 = 0;
 $alpha3 = 0; $v3 = 0;
 $r1 = 0; $v4 = 0;
 $r2 = 0; $v5 = 0;
 $r3 = 0; $v6 = 0;
 $r4 = 0; $v7 = 0;
 $r = 0; $v8 = 0;
 $d = 0; $v9 = 0;
 $c1 = 0; $v10 = 0;
 $c2 = 0; $v11 = 0;
 $lmda = 0; $v12 = 0;
 $regulator = 1;
 //if((isset($_Session['usa']))){
 //$curr_user =  $_Session['usa'];
 //echo "<center>" . $user_curr . ' - ' . $T . "<center>";
 
 //retrieving parameters from the db engine
 $param_picker_a = "Select * from parameter_status where ps_id=1;";
 $param_picker_b = "Select * from parameter_status where ps_id=2;";
 $param_picker_c = "Select * from parameter_status where ps_id=3;";
 $param_picker_d = "Select * from parameter_status where ps_id=4;";
 $param_picker_e = "Select * from parameter_status where ps_id=5;";
 $param_picker_f = "Select * from parameter_status where ps_id=6;";
 $param_picker_g = "Select * from parameter_status where ps_id=7;";
 $param_picker_h = "Select * from parameter_status where ps_id=8;";
 $param_picker_i = "Select * from parameter_status where ps_id=9;";
 $param_picker_j = "Select * from parameter_status where ps_id=10;";
 $param_picker_k = "Select * from parameter_status where ps_id=11;";
 $param_picker_l = "Select * from parameter_status where ps_id=12;";
 
 
 $param_loader_a = $dblink -> query($param_picker_a);
 $param_loader_b = $dblink -> query($param_picker_b);
  $param_loader_c = $dblink -> query($param_picker_c);
   $param_loader_d = $dblink -> query($param_picker_d);
    $param_loader_e = $dblink -> query($param_picker_e);
	 $param_loader_f = $dblink -> query($param_picker_f);
	  $param_loader_g = $dblink -> query($param_picker_g);
	   $param_loader_h = $dblink -> query($param_picker_h);
	    $param_loader_i = $dblink -> query($param_picker_i);
		 $param_loader_j = $dblink -> query($param_picker_j);
		  $param_loader_k = $dblink -> query($param_picker_k);
		   $param_loader_l = $dblink -> query($param_picker_l);
 if($param_loader_a){
	 while($row = mysqli_fetch_array($param_loader_a,MYSQLI_ASSOC)){
		$p1 =  $row['ps_id'];
		$alpha1 = $row['parameters'];
		$v1 = $row['values'];
		$s1 = $row['sources'];
	
	 }	 
 }
 
 if($param_loader_b){
	 while($row = mysqli_fetch_array($param_loader_b,MYSQLI_ASSOC)){
		$p2 =  $row['ps_id'];
		$alpha2 = $row['parameters'];
		$v2 = $row['values'];
		$s2 = $row['sources'];
		
	 }	 
 }
 
 if($param_loader_c){
	 while($row = mysqli_fetch_array($param_loader_c,MYSQLI_ASSOC)){
		$p3 =  $row['ps_id'];
		$alpha3 = $row['parameters'];
		$v3 = $row['values'];
		$s3 = $row['sources'];
		
	 }	 
 }
 
 if($param_loader_d){
	 while($row = mysqli_fetch_array($param_loader_d,MYSQLI_ASSOC)){
		$p4 =  $row['ps_id'];
		$r1 = $row['parameters'];
		$v4 = $row['values'];
		$s4 = $row['sources'];
		
	 }	 
 }
 
 if($param_loader_e){
	 while($row = mysqli_fetch_array($param_loader_e,MYSQLI_ASSOC)){
		$p5 =  $row['ps_id'];
		$r2 = $row['parameters'];
		$v5 = $row['values'];
		$s5 = $row['sources'];
		
	 }	 
 }
 
 if($param_loader_f){
	 while($row = mysqli_fetch_array($param_loader_f,MYSQLI_ASSOC)){
		$p6 =  $row['ps_id'];
		$r3 = $row['parameters'];
		$v6 = $row['values'];
		$s6 = $row['sources'];
		
	 }	 
 }
 
 if($param_loader_g){
	 while($row = mysqli_fetch_array($param_loader_g,MYSQLI_ASSOC)){
		$p7 =  $row['ps_id'];
		$r4 = $row['parameters'];
		$v7 = $row['values'];
		$s7 = $row['sources'];
		
	 }	 
 }
 
 if($param_loader_h){
	 while($row = mysqli_fetch_array($param_loader_h,MYSQLI_ASSOC)){
		$p8 =  $row['ps_id'];
		$r = $row['parameters'];
		$v8 = $row['values'];
		$s8 = $row['sources'];
		
	 }	 
 }
 
 if($param_loader_i){
	 while($row = mysqli_fetch_array($param_loader_i,MYSQLI_ASSOC)){
		$p9 =  $row['ps_id'];
		$d = $row['parameters'];
		$v9 = $row['values'];
		$s9 = $row['sources'];
		
	 }	 
 }
 
 if($param_loader_j){
	 while($row = mysqli_fetch_array($param_loader_j,MYSQLI_ASSOC)){
		$p10 =  $row['ps_id'];
		$c1 = $row['parameters'];
		$v10 = $row['values'];
		$s10 = $row['sources'];
		
	 }	 
 }
 
 if($param_loader_k){
	 while($row = mysqli_fetch_array($param_loader_k,MYSQLI_ASSOC)){
		$p11 =  $row['ps_id'];
		$c2 = $row['parameters'];
		$v11 = $row['values'];
		$s11 = $row['sources'];
		
	 }	 
 }
 
 if($param_loader_l){
	 while($row = mysqli_fetch_array($param_loader_l,MYSQLI_ASSOC)){
		$p12 =  $row['ps_id'];
		$lmda = $row['parameters'];
		$v12 = $row['values'];
		$s12 = $row['sources'];
		
	 }	 
 }
//echo $p10 . ' - ' . $c1 . ' - ' . $v10 . ' - ' . $s10;
 //########################################################################################
// Implementing the Ordinary Differentiation Equation's Mathematical Computations here
//########################################################################################
//Declaring seed values used to initialize important ODE determinants
$S = $_POST['s'];
$E = $_POST['e'];
$V = $_POST['v'];
$VI = $_POST['vi'];
$VT = $_POST['vt'];

$R = 0;
$D = 0;
$I = 0;
$leveler = "High Rain";

$Tx0; $Tx30; $Tx60; $Tx90; $Tx120;
$Sx0; $Sx30; $Sx60; $Sx90; $Sx120; 
$Ex0; $Ex30; $Ex60; $Ex90; $Ex120; 
$Vx0; $Vx30; $Vx60; $Vx90; $Vx120; 
$Rx0; $Rx30; $Rx60; $Rx90; $Rx120; 
$Dx0; $Dx30; $Dx60; $Dx90; $Dx120; 
$Ix0; $Ix30; $Ix60; $Ix90; $Ix120; 

//Performing the ODE Computations using ODE Mathematical Model  for High Rain

  //$Tx = 6102;
   $returned = ($T / 12.166 * (2*0+1)*30)/7/5;
   $Tx0 = $T; 
   $Tx30 = floor($returned-2);
   $Tx60 = floor(($returned * 6.083/60)/7);
   $Tx90 = floor(($returned * 4.055/90)/7/3);
   $Tx120 = floor(($returned * 3.042/120)/7/3);
   
   
  //$I = 0;
   $Ireturned = ($E * 0.002* 10 * 12.166 + pow(30,2)+(5 * 0.001 * 1.00)/1400);
   $Ix0 = $I;
   $Ix30 = 4.5 * $E;
   $Ix60 = 2.7 * $E;
   $Ix90 = 2.2 * $E;
   $Ix120 = 1.5 * $E;
   
  
   //$D = 0;
   $Dreturned = ($D + 30);
   //$Dx0 = $D;
   $Dx0 = 0.00023 * $Ireturned;
   $Dx30 = 0.00023 * $Ix30;
   $Dx60 = 0.00023 * $Ix60;
   $Dx90 = 0.00023 * $Ix90;
   $Dx120 = 0.00023 * $Ix120;
   
   //$Dx30 = floor($Dreturned);
   //$Dx60 = floor(($Dreturned) - 5);
   //$Dx90 = floor(($Dreturned)- 10);
   //$Dx120 = floor((($Dreturned)- 15)/($Dreturned/3)/2/1);
   
   
   
   //$S = 3800;
   $Sreturned = (($S / 2) + pow(10,2));
   $Sx0 = $S;
   $Sx30 = floor($Sreturned);
   $Sx60 = floor(($Sreturned) - 5);
   $Sx90 = floor(($Sreturned)- 10);
   $Sx120 = floor(($Sreturned)- 15);
   
  
   
   //$E = 400;
   $Ereturned = ($E + 200);
   $Ex0 = $E;
   $Ex30 = floor($Ereturned);
   $Ex60 = floor($Ereturned-100);
   $Ex90 = floor($Ereturned - 200 + 25);
   $Ex120 = floor($Ereturned - 200);
   
  
   
   //$V = 2400;
   $Vreturned = ($V + 20);
   $Vx0 = $V;
   $Vx30 = floor($Vreturned);
   $Vx60 = floor($Vreturned-40);
   $Vx90 = floor($Vreturned - 120);
   $Vx120 =  floor($Vreturned - 200);
   
   
   //$R = 0;
   $Rreturned = ($R + 540);
   //$Rx0 = $R;
   $Rx0 = 0.99977 * $Ix0;
   $Rx30 = 0.99977 * $Ix30;
   $Rx60 = 0.99977 * $Ix60;
   $Rx90 = 0.99977 * $Ix90;
   $Rx120 = 0.99977 * $Ix120;
  
	
 
 //****************************************************************************************************************
 //****************************************************************************************************************
  // For the simulation of compartments against a sequential change in time 
  // To get  back the value of the change in compartment 
  //***************************************************************************************************************
  $mdo_30 = "30 days";
  $mdo_60 = "60 days";
  $mdo_90 = "90 days";
  $mdo_120 = "120 days";
  
  $cat1 = "High Rain";
     $stat = 'live'; 
  
 
 
	   //Inserting the data into the database
	$data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','1','$Tx0','$Sx0','$Ex0','$Ix0','$Rx0','$Dx0','$Vx0','$stat','$cat1');";
$done = $dblink -> query($data_entry);
if($done){
	
}
	  
       //Inserting the data into the database
    $data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','30','$Tx30','$Sx30','$Ex30','$Ix30','$Rx30','$Dx30','$Vx30','$stat','$cat1');";
$done = $dblink -> query($data_entry);
if($done){
    
}	   
	 
       //Inserting the data into the database
    $data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','60','$Tx60','$Sx60','$Ex60','$Ix60','$Rx60','$Dx60','$Vx60','$stat','$cat1');";
$done = $dblink -> query($data_entry);
if($done){
    
}

       //Inserting the data into the database
    $data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','90','$Tx90','$Sx90','$Ex90','$Ix90','$Rx90','$Dx90','$Vx90','$stat','$cat1');";
$done = $dblink -> query($data_entry);
if($done){
    
}

       //Inserting the data into the database
    $data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','120','$Tx120','$Sx120','$Ex120','$Ix120','$Rx120','$Dx120','$Vx120','$stat','$cat1');";
$done = $dblink -> query($data_entry);
if($done){
    
}
 //*****************************************************************************************************************************
 //Pumping Statistic data
 $stat = 'live';
$data_port = "INSERT IGNORE INTO `prediction_dynamictable` (`statisticid` ,`modelsimulation` ,`predictdata` ,`observeddata` ,`predictcategory` ,`status`)
Values(NULL,'$mdo_30','$Ix30',' ','$cat1','$stat');";
$done = $dblink -> query($data_port);
if($done){}
$data_port = "INSERT IGNORE INTO `prediction_dynamictable` (`statisticid` ,`modelsimulation` ,`predictdata` ,`observeddata` ,`predictcategory` ,`status`)
Values(NULL,'$mdo_60','$Ix60',' ','$cat1','$stat');";
$done = $dblink -> query($data_port);
if($done){}
$data_port = "INSERT IGNORE INTO `prediction_dynamictable` (`statisticid` ,`modelsimulation` ,`predictdata` ,`observeddata` ,`predictcategory` ,`status`)
Values(NULL,'$mdo_90','$Ix90',' ','$cat1','$stat');";
$done = $dblink -> query($data_port);
if($done){}
$data_port = "INSERT IGNORE INTO `prediction_dynamictable` (`statisticid` ,`modelsimulation` ,`predictdata` ,`observeddata` ,`predictcategory` ,`status`)
Values(NULL,'$mdo_120','$Ix120',' ','$cat1','$stat');";
$done = $dblink -> query($data_port);
if($done){}
//****************************************************************************************************************************    
  
  
$Ia1;$Ia2;$Ia3;$Ia4;$Ia5;

//Performing the ODE Computations using ODE Mathematical Model  for Low Rain

  //$Tx = 6102;
   $T = (1 * $T);
   $returned = ($T / 12.166 * (2*0+1)*30)/7/5;
   $Tx0 = $T; 
   $Tx30 = floor($returned);
   $Tx60 = floor(($returned * 6.083/60)/7);
   $Tx90 = floor(($returned * 4.055/90)/7/3);
   $Tx120 = floor(($returned * 3.042/120)/7/3);
   
   
  //$I = 0;
   $Ireturned = ($I * 0.002* 10 * 12.166 + pow(30,2)+(5 * 0.001 * 1.00)/1400);
   $Ix0 = $I;
   $Ix30 = ((4.5 * $E)/4) + 18;
   $Ix60 = (2.7 * $E)/2.3;
   $Ix90 = (2.2 * $E)/5;
   $Ix120 = (1.5 * $E)/3;
   
  $Ia1 = $Ix0;$Ia2 = $Ix30;$Ia3 = $Ix60;$Ia4 = $Ix90; $Ia5 = $Ix120;
  
   //$D = 0;
   $Dreturned = ($D + 30);
   $Dx0 = 0.00023 * $Ireturned;
   $Dx30 = 0.00023 * $Ix30;
   $Dx60 = 0.00023 * $Ix60;
   $Dx90 = 0.00023 * $Ix90;
   $Dx120 = 0.00023 * $Ix120;
   
   
   
   //$S = 3800;
   $Sreturned = (($S / 2) + pow(10,2));
   $Sx0 = $S;
   $Sx30 = floor($Sreturned);
   $Sx60 = floor(($Sreturned) - 5);
   $Sx90 = floor(($Sreturned)- 10);
   $Sx120 = floor(($Sreturned)- 15);
   
  
   
   //$E = 400;
   $Ereturned = ($E + 200);
   $Ex0 = $E;
   $Ex30 = floor($Ereturned/4);
   $Ex60 = floor($Ereturned/2);
   $Ex90 = floor($Ereturned/3);
   $Ex120 = floor($Ereturned/5);
   
  
   
   //$V = 2400;
   $Vreturned = ($V + 20);
   $Vx0 = $V;
   $Vx30 = floor($Vreturned);
   $Vx60 = floor($Vreturned-40);
   $Vx90 = floor($Vreturned - 120);
   $Vx120 =  floor($Vreturned - 200);
   
   
   //$R = 0;
   $Rreturned = ($R + 540);
   $Rx0 = 0.99977 * $Ix0;
   $Rx30 = 0.99977 * $Ix30;
   $Rx60 = 0.99977 * $Ix60;
   $Rx90 = 0.99977 * $Ix90;;
   $Rx120 = 0.99977 * $Ix120;
  
	
 
 //****************************************************************************************************************
 //****************************************************************************************************************
  // For the simulation of compartments against a sequential change in time 
  // To get  back the value of the change in compartment 
  //***************************************************************************************************************
  $mdo_30 = "30 days";
  $mdo_60 = "60 days";
  $mdo_90 = "90 days";
  $mdo_120 = "120 days";
  
  $cat1 = "Low Rain";
     $stat = 'live'; 
  
 
 
	   //Inserting the data into the database
	$data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','1','$Tx0','$Sx0','$Ex0','$Ix0','$Rx0','$Dx0','$Vx0','$stat','$cat1');";
$done = $dblink -> query($data_entry);
if($done){
	
}
	  
       //Inserting the data into the database
    $data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','30','$Tx30','$Sx30','$Ex30','$Ix30','$Rx30','$Dx30','$Vx30','$stat','$cat1');";
$done = $dblink -> query($data_entry);
if($done){
    
}	   
	 
       //Inserting the data into the database
    $data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','60','$Tx60','$Sx60','$Ex60','$Ix60','$Rx60','$Dx60','$Vx60','$stat','$cat1');";
$done = $dblink -> query($data_entry);
if($done){
    
}

       //Inserting the data into the database
    $data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','90','$Tx90','$Sx90','$Ex90','$Ix90','$Rx90','$Dx90','$Vx90','$stat','$cat1');";
$done = $dblink -> query($data_entry);
if($done){
    
}

       //Inserting the data into the database
    $data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','120','$Tx120','$Sx120','$Ex120','$Ix120','$Rx120','$Dx120','$Vx120','$stat','$cat1');";
$done = $dblink -> query($data_entry);

if($done){
    
}
 //*****************************************************************************************************************************
 //Pumping Statistic data
 $stat = 'live';
$data_port = "INSERT IGNORE INTO `prediction_dynamictable` (`statisticid` ,`modelsimulation` ,`predictdata` ,`observeddata` ,`predictcategory` ,`status`)
Values(NULL,'$mdo_30','$Ia2',' ','$cat1','$stat');";
$done = $dblink -> query($data_port);
if($done){}
$data_port = "INSERT IGNORE INTO `prediction_dynamictable` (`statisticid` ,`modelsimulation` ,`predictdata` ,`observeddata` ,`predictcategory` ,`status`)
Values(NULL,'$mdo_60','$Ia3',' ','$cat1','$stat');";
$done = $dblink -> query($data_port);
if($done){}
$data_port = "INSERT IGNORE INTO `prediction_dynamictable` (`statisticid` ,`modelsimulation` ,`predictdata` ,`observeddata` ,`predictcategory` ,`status`)
Values(NULL,'$mdo_90','$Ia4',' ','$cat1','$stat');";
$done = $dblink -> query($data_port);
if($done){}
$data_port = "INSERT IGNORE INTO `prediction_dynamictable` (`statisticid` ,`modelsimulation` ,`predictdata` ,`observeddata` ,`predictcategory` ,`status`)
Values(NULL,'$mdo_120','$Ia5',' ','$cat1','$stat');";
$done = $dblink -> query($data_port);
if($done){}
//**************************************************************************************************************************** 

//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//This is where I am performing the ODE Simulation for 80% High Rain and Low Rain Period
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$

//Performing the ODE Computations using ODE Mathematical Model  for High Rain

  //$Tx = 6102;
   $returned = ($T / 12.166 * (2*0+1)*30)/7/5;
   $Tx0 = $T; 
   $Tx30 = floor($returned-2);
   $Tx60 = floor(($returned * 6.083/60)/7);
   $Tx90 = floor(($returned * 4.055/90)/7/3);
   $Tx120 = floor(($returned * 3.042/120)/7/3);
   
   
  //$I = 0;
   $Ireturned = ($I * 0.002* 10 * 12.166 + pow(30,2)+(5 * 0.001 * 1.00)/1400)/8;
   $Ix0 = $I;
   $Ix30 = (4.5 * $E)/8;
   $Ix60 = (2.7 * $E)/6;
   $Ix90 = (2.2 * $E)/4;
   $Ix120 = (1.5 * $E)/3;
   
  
   //$D = 0;
   $Dreturned = ($D + 30);
   //$Dx0 = $D;
   $Dx0 = 0.00023 * $Ireturned;
   $Dx30 = 0.00023 * $Ix30;
   $Dx60 = 0.00023 * $Ix60;
   $Dx90 = 0.00023 * $Ix90;
   $Dx120 = 0.00023 * $Ix120;
   
   //$Dx30 = floor($Dreturned);
   //$Dx60 = floor(($Dreturned) - 5);
   //$Dx90 = floor(($Dreturned)- 10);
   //$Dx120 = floor((($Dreturned)- 15)/($Dreturned/3)/2/1);
   
   
   
   //$S = 3800;
   $Sreturned = ((20/100) * $T);
   $Sx0 = $S;
   $Sx30 = floor($Sreturned);
   $Sx60 = floor(($Sreturned) - 5);
   $Sx90 = floor(($Sreturned)- 10);
   $Sx120 = floor(($Sreturned)- 15);
   
  
   
   //$E = 400;
   $Ereturned = ($E + 200)-200;
   $Ex0 = $E;
   $Ex30 = floor($Ereturned);
   //$Ex60 = floor($Ereturned/5);
   //$Ex90 = floor($Ereturned/4);
   $Ex60 = (($E + 200)/8.5)/2 * 2.002;
   $Ex90 = (($E + 200)/8.5)/2 * 2.502;
   $Ex120 = (($E + 200)/8.5)/3 * 3.502;
   //$Ex120 = floor($Ereturned/12);
   
  
   
   //$V = 2400;
   $Vreturned = ((80/100) * $T);
   $Vx0 = $V;
   $Vx30 = floor($Vreturned);
   $Vx60 = floor($Vreturned-40);
   $Vx90 = floor($Vreturned - 120);
   $Vx120 =  floor($Vreturned - 200);
   
   
   //$R = 0;
   $Rreturned = ($R + 540);
   //$Rx0 = $R;
   $Rx0 = 0.99977 * $Ix0;
   $Rx30 = 0.99977 * $Ix30;
   $Rx60 = 0.99977 * $Ix60;
   $Rx90 = 0.99977 * $Ix90;
   $Rx120 = 0.99977 * $Ix120;
  
	
 
 //****************************************************************************************************************
 //****************************************************************************************************************
  // For the simulation of compartments against a sequential change in time - 
  // To get  back the value of the change in compartment - 
  //***************************************************************************************************************
  $mdo_30 = "30 days";
  $mdo_60 = "60 days";
  $mdo_90 = "90 days";
  $mdo_120 = "120 days";
  
  $cat1 = "80 High Rain";
     $stat = 'live'; 
  
 
 
	   //Inserting the data into the database
	$data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','1','$Tx0','$Sx0','$Ex0','$Ix0','$Rx0','$Dx0','$Vx0','$stat','$cat1');";
$done = $dblink -> query($data_entry);
if($done){
	
}
	  
       //Inserting the data into the database
    $data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','30','$Tx30','$Sx30','$Ex30','$Ix30','$Rx30','$Dx30','$Vx30','$stat','$cat1');";
$done = $dblink -> query($data_entry);
if($done){
    
}	   
	 
       //Inserting the data into the database
    $data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','60','$Tx60','$Sx60','$Ex60','$Ix60','$Rx60','$Dx60','$Vx60','$stat','$cat1');";
$done = $dblink -> query($data_entry);
if($done){
    
}

       //Inserting the data into the database
    $data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','90','$Tx90','$Sx90','$Ex90','$Ix90','$Rx90','$Dx90','$Vx90','$stat','$cat1');";
$done = $dblink -> query($data_entry);
if($done){
    
}

       //Inserting the data into the database
    $data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','120','$Tx120','$Sx120','$Ex120','$Ix120','$Rx120','$Dx120','$Vx120','$stat','$cat1');";
$done = $dblink -> query($data_entry);
if($done){
    
}
 //*****************************************************************************************************************************
 //Pumping Statistic data
 $stat = 'live';
$data_port = "INSERT IGNORE INTO `prediction_dynamictable` (`statisticid` ,`modelsimulation` ,`predictdata` ,`observeddata` ,`predictcategory` ,`status`)
Values(NULL,'$mdo_30','$Ix30',' ','$cat1','$stat');";
$done = $dblink -> query($data_port);
if($done){}
$data_port = "INSERT IGNORE INTO `prediction_dynamictable` (`statisticid` ,`modelsimulation` ,`predictdata` ,`observeddata` ,`predictcategory` ,`status`)
Values(NULL,'$mdo_60','$Ix60',' ','$cat1','$stat');";
$done = $dblink -> query($data_port);
if($done){}
$data_port = "INSERT IGNORE INTO `prediction_dynamictable` (`statisticid` ,`modelsimulation` ,`predictdata` ,`observeddata` ,`predictcategory` ,`status`)
Values(NULL,'$mdo_90','$Ix90',' ','$cat1','$stat');";
$done = $dblink -> query($data_port);
if($done){}
$data_port = "INSERT IGNORE INTO `prediction_dynamictable` (`statisticid` ,`modelsimulation` ,`predictdata` ,`observeddata` ,`predictcategory` ,`status`)
Values(NULL,'$mdo_120','$Ix120',' ','$cat1','$stat');";
$done = $dblink -> query($data_port);
if($done){}
//****************************************************************************************************************************    
  
  
$Ia1;$Ia2;$Ia3;$Ia4;$Ia5;

//Performing the ODE Computations using ODE Mathematical Model 80% for Low Rain

  //$Tx = 6102;
   $T = (1 * $T);
   $returned = ($T / 12.166 * (2*0+1)*30)/7/5;
   $Tx0 = $T; 
   $Tx30 = floor($returned);
   $Tx60 = floor(($returned * 6.083/60)/7);
   $Tx90 = floor(($returned * 4.055/90)/7/3);
   $Tx120 = floor(($returned * 3.042/120)/7/3);
   
   
  //$I = 0;
   $Ireturned = ($I * 0.002* 10 * 12.166 + pow(30,2)+(5 * 0.001 * 1.00)/1400)/8.5;
  $Ix0 = $I;
   $Ix30 = (4.5 * $E)/16;
   $Ix60 = (2.7 * $E)/14;
   $Ix90 = (2.2 * $E)/12;
   $Ix120 = (1.5 * $E)/11;
   
  $Ia1 = $Ix0;$Ia2 = $Ix30;$Ia3 = $Ix60;$Ia4 = $Ix90; $Ia5 = $Ix120;
  
   //$D = 0;
   $Dreturned = ($D + 30);
   $Dx0 = 0.00023 * $Ireturned;
   $Dx30 = 0.00023 * $Ix30;
   $Dx60 = 0.00023 * $Ix60;
   $Dx90 = 0.00023 * $Ix90;
   $Dx120 = 0.00023 * $Ix120;
   
   
   
   //$S = 3800;
   $Sreturned = ((20/100) * $T);
   $Sx0 = $S;
   $Sx30 = floor($Sreturned);
   $Sx60 = floor(($Sreturned) - 5);
   $Sx90 = floor(($Sreturned)- 10);
   $Sx120 = floor(($Sreturned)- 15);
   
  
   
   //$E = 400;
   $Ereturned = ($E + 200)/8.5;
   $Ex0 = $E;
   $Ex30 = floor($Ereturned/4);
   $Ex60 = floor($Ereturned/2);
   $Ex90 = floor($Ereturned/3);
   $Ex120 = floor($Ereturned/5);
   
  
   
   //$V = 2400;
   $Vreturned = ((80/100)* $T);
   $Vx0 = $V;
   $Vx30 = floor($Vreturned);
   $Vx60 = floor($Vreturned-40);
   $Vx90 = floor($Vreturned - 120);
   $Vx120 =  floor($Vreturned - 200);
   
   
   //$R = 0;
   $Rreturned = ($R + 540);
   $Rx0 = 0.99977 * $Ix0;
   $Rx30 = 0.99977 * $Ix30;
   $Rx60 = 0.99977 * $Ix60;;
   $Rx90 = 0.99977 * $Ix90;;
   $Rx120 = 0.99977 * $Ix120;
  
	
 
 //****************************************************************************************************************
 //****************************************************************************************************************
  // For the simulation of compartments against a sequential change in time 
  // To get  back the value of the change in compartment 
  //***************************************************************************************************************
  $mdo_30 = "30 days";
  $mdo_60 = "60 days";
  $mdo_90 = "90 days";
  $mdo_120 = "120 days";
  
  $cat1 = "80 Low Rain";
     $stat = 'live'; 
  
 
 
	   //Inserting the data into the database
	$data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','1','$Tx0','$Sx0','$Ex0','$Ix0','$Rx0','$Dx0','$Vx0','$stat','$cat1');";
$done = $dblink -> query($data_entry);
if($done){
	
}
	  
       //Inserting the data into the database
    $data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','30','$Tx30','$Sx30','$Ex30','$Ix30','$Rx30','$Dx30','$Vx30','$stat','$cat1');";
$done = $dblink -> query($data_entry);
if($done){
    
}	   
	 
       //Inserting the data into the database
    $data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','60','$Tx60','$Sx60','$Ex60','$Ix60','$Rx60','$Dx60','$Vx60','$stat','$cat1');";
$done = $dblink -> query($data_entry);
if($done){
    
}

       //Inserting the data into the database
    $data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','90','$Tx90','$Sx90','$Ex90','$Ix90','$Rx90','$Dx90','$Vx90','$stat','$cat1');";
$done = $dblink -> query($data_entry);
if($done){
    
}

       //Inserting the data into the database
    $data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','120','$Tx120','$Sx120','$Ex120','$Ix120','$Rx120','$Dx120','$Vx120','$stat','$cat1');";
$done = $dblink -> query($data_entry);

if($done){
    
}
 //*****************************************************************************************************************************
 //Pumping Statistic data
 $stat = 'live';
$data_port = "INSERT IGNORE INTO `prediction_dynamictable` (`statisticid` ,`modelsimulation` ,`predictdata` ,`observeddata` ,`predictcategory` ,`status`)
Values(NULL,'$mdo_30','$Ia2',' ','$cat1','$stat');";
$done = $dblink -> query($data_port);
if($done){}
$data_port = "INSERT IGNORE INTO `prediction_dynamictable` (`statisticid` ,`modelsimulation` ,`predictdata` ,`observeddata` ,`predictcategory` ,`status`)
Values(NULL,'$mdo_60','$Ia3',' ','$cat1','$stat');";
$done = $dblink -> query($data_port);
if($done){}
$data_port = "INSERT IGNORE INTO `prediction_dynamictable` (`statisticid` ,`modelsimulation` ,`predictdata` ,`observeddata` ,`predictcategory` ,`status`)
Values(NULL,'$mdo_90','$Ia4',' ','$cat1','$stat');";
$done = $dblink -> query($data_port);
if($done){}
$data_port = "INSERT IGNORE INTO `prediction_dynamictable` (`statisticid` ,`modelsimulation` ,`predictdata` ,`observeddata` ,`predictcategory` ,`status`)
Values(NULL,'$mdo_120','$Ia5',' ','$cat1','$stat');";
$done = $dblink -> query($data_port);
if($done){}
//****************************************************************************************************************************    
  
  
 //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//This is where I am performing the ODE Simulation for 98% High Rain and Low Rain Period
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$

//Performing the ODE Computations using ODE Mathematical Model  for 98 High Rain

  //$Tx = 6102;
   $returned = ($T / 12.166 * (2*0+1)*30)/7/5;
   $Tx0 = $T; 
   $Tx30 = floor($returned-2);
   $Tx60 = floor(($returned * 6.083/60)/7);
   $Tx90 = floor(($returned * 4.055/90)/7/3);
   $Tx120 = floor(($returned * 3.042/120)/7/3);
   
   
  //$I = 0;
   $Ireturned = ($I * 0.002* 10 * 12.166 + pow(30,2)+(5 * 0.001 * 1.00)/1400)/9;
   $Ix0 = $I;
   $Ix30 = (4.5 * $E)/24;
   $Ix60 = (2.7 * $E)/22;
   $Ix90 = (2.2 * $E)/19;
   $Ix120 = (1.5 * $E)/17;
   
  
   //$D = 0;
   $Dreturned = ($D + 30);
   //$Dx0 = $D;
   $Dx0 = 0.00023 * $Ireturned;
   $Dx30 = 0.00023 * $Ix30;
   $Dx60 = 0.00023 * $Ix60;
   $Dx90 = 0.00023 * $Ix90;
   $Dx120 = 0.00023 * $Ix120;
   //$Dx30 = floor($Dreturned);
   //$Dx60 = floor(($Dreturned) - 5);
   //$Dx90 = floor(($Dreturned)- 10);
   //$Dx120 = floor((($Dreturned)- 15)/($Dreturned/3)/2/1);
   
   
   
   //$S = 3800;
   $Sreturned = ((2/100) * $T);
   $Sx0 = $S;
   $Sx30 = floor($Sreturned);
   $Sx60 = floor(($Sreturned) - 5);
   $Sx90 = floor(($Sreturned)- 10);
   $Sx120 = floor(($Sreturned)- 15);
   
  
   
   //$E = 400;
   $Ereturned = ($E + 200)/9;
   $Ex0 = $E;
   $Ex30 = floor($Ereturned);
   $Ex60 = floor($Ereturned/4*2);
   $Ex90 = floor($Ereturned/3*2);
   $Ex120 = floor($Ereturned/4);
   
  
   
   //$V = 2400;
   $Vreturned = (98/100) * $T;
   $Vx0 = $V;
   $Vx30 = floor($Vreturned);
   $Vx60 = floor($Vreturned-40);
   $Vx90 = floor($Vreturned - 120);
   $Vx120 =  floor($Vreturned - 200);
   
   
   //$R = 0;
   $Rreturned = ($R + 540);
   //$Rx0 = $R;
   $Rx0 = 0.99977 * $Ix0;
   $Rx30 = 0.99977 * $Ix30;
   $Rx60 = 0.99977 * $Ix60;
   $Rx90 = 0.99977 * $Ix90;
   $Rx120 = 0.99977 * $Ix120;
  
	
 
 //****************************************************************************************************************
 //****************************************************************************************************************
  // For the simulation of compartments against a sequential change in time - 
  // To get  back the value of the change in compartment - 
  //***************************************************************************************************************
  $mdo_30 = "30 days";
  $mdo_60 = "60 days";
  $mdo_90 = "90 days";
  $mdo_120 = "120 days";
  
  $cat1 = "98 High Rain";
     $stat = 'live'; 
  
 
 
	   //Inserting the data into the database
	$data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','1','$Tx0','$Sx0','$Ex0','$Ix0','$Rx0','$Dx0','$Vx0','$stat','$cat1');";
$done = $dblink -> query($data_entry);
if($done){
	
}
	  
       //Inserting the data into the database
    $data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','30','$Tx30','$Sx30','$Ex30','$Ix30','$Rx30','$Dx30','$Vx30','$stat','$cat1');";
$done = $dblink -> query($data_entry);
if($done){
    
}	   
	 
       //Inserting the data into the database
    $data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','60','$Tx60','$Sx60','$Ex60','$Ix60','$Rx60','$Dx60','$Vx60','$stat','$cat1');";
$done = $dblink -> query($data_entry);
if($done){
    
}

       //Inserting the data into the database
    $data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','90','$Tx90','$Sx90','$Ex90','$Ix90','$Rx90','$Dx90','$Vx90','$stat','$cat1');";
$done = $dblink -> query($data_entry);
if($done){
    
}

       //Inserting the data into the database
    $data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','120','$Tx120','$Sx120','$Ex120','$Ix120','$Rx120','$Dx120','$Vx120','$stat','$cat1');";
$done = $dblink -> query($data_entry);
if($done){
    
}
 //*****************************************************************************************************************************
 //Pumping Statistic data
 $stat = 'live';
$data_port = "INSERT IGNORE INTO `prediction_dynamictable` (`statisticid` ,`modelsimulation` ,`predictdata` ,`observeddata` ,`predictcategory` ,`status`)
Values(NULL,'$mdo_30','$Ix30',' ','$cat1','$stat');";
$done = $dblink -> query($data_port);
if($done){}
$data_port = "INSERT IGNORE INTO `prediction_dynamictable` (`statisticid` ,`modelsimulation` ,`predictdata` ,`observeddata` ,`predictcategory` ,`status`)
Values(NULL,'$mdo_60','$Ix60',' ','$cat1','$stat');";
$done = $dblink -> query($data_port);
if($done){}
$data_port = "INSERT IGNORE INTO `prediction_dynamictable` (`statisticid` ,`modelsimulation` ,`predictdata` ,`observeddata` ,`predictcategory` ,`status`)
Values(NULL,'$mdo_90','$Ix90',' ','$cat1','$stat');";
$done = $dblink -> query($data_port);
if($done){}
$data_port = "INSERT IGNORE INTO `prediction_dynamictable` (`statisticid` ,`modelsimulation` ,`predictdata` ,`observeddata` ,`predictcategory` ,`status`)
Values(NULL,'$mdo_120','$Ix120',' ','$cat1','$stat');";
$done = $dblink -> query($data_port);
if($done){}
//****************************************************************************************************************************    
  
  
$Ia1;$Ia2;$Ia3;$Ia4;$Ia5;

//Performing the ODE Computations using ODE Mathematical Model  for 98 Low Rain

  //$Tx = 6102;
   $T = (1 * $T);
   $returned = ($T / 12.166 * (2*0+1)*30)/7/5;
   $Tx0 = $T; 
   $Tx30 = floor($returned);
   $Tx60 = floor(($returned * 6.083/60)/7);
   $Tx90 = floor(($returned * 4.055/90)/7/3);
   $Tx120 = floor(($returned * 3.042/120)/7/3);
   
   
  //$I = 0;
   $Ireturned = ($I * 0.002* 10 * 12.166 + pow(30,2)+(5 * 0.001 * 1.00)/1400)/9.5;
  $Ix0 = $I;
   $Ix30 = (4.5 * $E)/36;
   $Ix60 = (2.7 * $E)/34;
   $Ix90 = (2.2 * $E)/29;
   $Ix120 = (1.5 * $E)/26;
   
  $Ia1 = $Ix0;$Ia2 = $Ix30;$Ia3 = $Ix60;$Ia4 = $Ix90; $Ia5 = $Ix120;
  
   //$D = 0;
   $Dreturned = ($D + 30);
   $Dx0 = 0.00023 * $Ix0;
   $Dx30 = 0.00023 * $Ix30;
   $Dx60 = 0.00023 * $Ix60;;
   $Dx90 = 0.00023 * $Ix90;;
   $Dx120 = 0.00023 * $Ix120;
   
   
   
   //$S = 3800;
   //$Sreturned = (($S / 2) + pow(10,2));
   $Sreturned = (2/100)* $T;
   $Sx0 = $S;
   $Sx30 = floor($Sreturned);
   $Sx60 = floor(($Sreturned) - 5);
   $Sx90 = floor(($Sreturned)- 10);
   $Sx120 = floor(($Sreturned)- 15);
   
  
   
   //$E = 400;
   $Ereturned = ($E + 200)/9.5;
   $Ex0 = $E;
   $Ex30 = floor($Ereturned/4);
   $Ex60 = floor($Ereturned/2);
   $Ex90 = floor($Ereturned/3);
   $Ex120 = floor($Ereturned/5);
   
  
   
   //$V = 2400;
   $Vreturned = (98/100) * $T;
   $Vx0 = $V;
   $Vx30 = floor($Vreturned);
   $Vx60 = floor($Vreturned-40);
   $Vx90 = floor($Vreturned - 120);
   $Vx120 =  floor($Vreturned - 200);
   
   
   //$R = 0;
   $Rreturned = ($R + 540);
   $Rx0 = 0.99977 * $Ix0;
   $Rx30 = 0.99977 * $Ix30;
   $Rx60 = 0.99977 * $Ix60;;
   $Rx90 = 0.99977 * $Ix90;;
   $Rx120 = 0.99977 * $Ix120;
  
	
 
 //****************************************************************************************************************
 //****************************************************************************************************************
  // For the simulation of compartments against a sequential change in time 
  // To get  back the value of the change in compartment 
  //***************************************************************************************************************
  $mdo_30 = "30 days";
  $mdo_60 = "60 days";
  $mdo_90 = "90 days";
  $mdo_120 = "120 days";
  
  $cat1 = "98 Low Rain";
     $stat = 'live'; 
  
 
 
	   //Inserting the data into the database
	$data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','1','$Tx0','$Sx0','$Ex0','$Ix0','$Rx0','$Dx0','$Vx0','$stat','$cat1');";
$done = $dblink -> query($data_entry);
if($done){
	
}
	  
       //Inserting the data into the database
    $data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','30','$Tx30','$Sx30','$Ex30','$Ix30','$Rx30','$Dx30','$Vx30','$stat','$cat1');";
$done = $dblink -> query($data_entry);
if($done){
    
}	   
	 
       //Inserting the data into the database
    $data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','60','$Tx60','$Sx60','$Ex60','$Ix60','$Rx60','$Dx60','$Vx60','$stat','$cat1');";
$done = $dblink -> query($data_entry);
if($done){
    
}

       //Inserting the data into the database
    $data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','90','$Tx90','$Sx90','$Ex90','$Ix90','$Rx90','$Dx90','$Vx90','$stat','$cat1');";
$done = $dblink -> query($data_entry);
if($done){
    
}

       //Inserting the data into the database
    $data_entry = "INSERT IGNORE INTO `compartment_data` (`trackid` ,`uid`,`timeindays`,`T` ,`S` ,`E` ,`I` ,`R` ,`D` ,`V` ,`status`,`categories`)
Values(NULL,'$user_curr','120','$Tx120','$Sx120','$Ex120','$Ix120','$Rx120','$Dx120','$Vx120','$stat','$cat1');";
$done = $dblink -> query($data_entry);

if($done){
    
}
 //*****************************************************************************************************************************
 //Pumping Statistic data
 $stat = 'live';
$data_port = "INSERT IGNORE INTO `prediction_dynamictable` (`statisticid` ,`modelsimulation` ,`predictdata` ,`observeddata` ,`predictcategory` ,`status`)
Values(NULL,'$mdo_30','$Ia2',' ','$cat1','$stat');";
$done = $dblink -> query($data_port);
if($done){}
$data_port = "INSERT IGNORE INTO `prediction_dynamictable` (`statisticid` ,`modelsimulation` ,`predictdata` ,`observeddata` ,`predictcategory` ,`status`)
Values(NULL,'$mdo_60','$Ia3',' ','$cat1','$stat');";
$done = $dblink -> query($data_port);
if($done){}
$data_port = "INSERT IGNORE INTO `prediction_dynamictable` (`statisticid` ,`modelsimulation` ,`predictdata` ,`observeddata` ,`predictcategory` ,`status`)
Values(NULL,'$mdo_90','$Ia4',' ','$cat1','$stat');";
$done = $dblink -> query($data_port);
if($done){}
$data_port = "INSERT IGNORE INTO `prediction_dynamictable` (`statisticid` ,`modelsimulation` ,`predictdata` ,`observeddata` ,`predictcategory` ,`status`)
Values(NULL,'$mdo_120','$Ia5',' ','$cat1','$stat');";
$done = $dblink -> query($data_port);
if($done){}
//****************************************************************************************************************************    
  
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
     <h1>Mathematical Model-based Malaria Prediction System 
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
   <center><h1>Mathematical Model-based Malaria Prediction System <br/>
  <span style="font-size:13px; font-family:Gisha,Trebuchet; font-weight:normal;"><span style='color:#ffffff; padding:5px 5px 5px 5px; background-color:#006; border-style:none; border-color:#006; border-collapse:collapse; border-radius:10px 10px;'>User's Guide...</span>&nbsp;&nbsp;This App gives you real-time on-demand data on Malaria Prediction using Advanced Mathematical Model. <br/><br/>
  
To operate this Malaria Prediction Application, you will need to first view your graph and then you can now click on the View 
Preliminary Statistics to view the synchronized Statistics for the displayed graph. After  you have viewed all the graphs for the various prediction levels, you can click on the View Final Statistics button to view all the combined statistics for High Rain, Low Rain, 80% High Rain, 80% Low Rain, 98% High Rain, 98% Low Rain.
</span>
</h1>

<table border="0" cellspacing="2"  align="center" cellpadding="2" width="100%" height="650px">
<tr>
  <td align="center" height="450px">
     <table border="0" cellspacing="2"  align="center"  bgcolor="#ffffff" cellpadding="2" width="100%">  
      <tr>
        <td>
     <div style="background-image:url('bblog1.jpg'); background-size:100%; height:100%; background-repeat:no-repeat;">
     <span style='float:right;'>
          <a href="graph.php" target="fview"><button style="width:150px;">Get Graph</button> &nbsp;&nbsp;</a> 
     <a href="pagestatistics.php" target="_blank"><button style="width:150px;">View All Final Statistics</button> &nbsp; &nbsp;</a>
     </span>
     
     
       <iframe src="" width="100%" height="750px" name="fview" frameborder="0" scrolling="yes">
       </iframe>

     </div>
<br><br>
<a href=https://www.plus2net.com/php_tutorial/chart-line-database.php>Column Chart from MySQL database</a>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart']});
      google.charts.setOnLoadCallback(drawChart);
	  
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('number', 'T');
        data.addColumn('number', 'S');
		data.addColumn('number', 'E');
		data.addColumn('number', 'I');
		data.addColumn('number', 'R');
        data.addColumn('number', 'D');
        data.addColumn('number', 'v');
        for(i = 0; i < my_2d.length; i++)
   data.addRow([parseInt(my_2d[i][0]), parseInt(my_2d[i][1]),parseInt(my_2d[i][2]),parseInt(my_2d[i][3]),parseInt(my_2d[i][4]),parseInt(my_2d[i][5]),parseInt(my_2d[i][6])]);
       var options = {
          title: 'Mathematical-based model for Malaria Predictions',
        curveType: 'function',
		width: 800,
        height: 500,
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        chart.draw(data, options);
       }
	///////////////////////////////
</script>
        </td>
       </tr>
       <tr>
        <td align="center">
     
     <a href="lowraingraph.php" target="fview"><button style="width:auto;">Low Rain</button> &nbsp;&nbsp; </a>
     <a href="graph.php" target="fview"><button style="width:auto;">High Rain</button> &nbsp;&nbsp;</a>
     <a href="80lowraingraph.php" target="fview"><button style="width:auto;">Low Rain-80% Vigilance</button> &nbsp;&nbsp;</a>
     <a href="80highraingraph.php" target="fview"><button style="width:auto;">High Rain-80% Vigilance</button> &nbsp;&nbsp; </a>
     <a href="98lowraingraph.php" target="fview"><button style="width:auto;">Low Rain-98% Vigilance</button> &nbsp;&nbsp;</a>
     <a href="98highraingraph.php" target="fview"><button style="width:auto;">High Rain-98% Vigilance</button> &nbsp;&nbsp;</a>
     
      
  </td>
       </tr>
     </table>
  </td>
  </tr>
</table>
</center>
 
 
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