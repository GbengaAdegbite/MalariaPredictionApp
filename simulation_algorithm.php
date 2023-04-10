<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php

echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Untitled Document</title>
 <meta charset='utf-8'/>
        


<script type='text/javascript' src='jquery-1.11.2.jar'></script>
<script type='text/javascript' src='chart.js-3.5.0.jar'></script>
<script type='text/javascript' src='linegraph.js'></script>
</head>

<body>";
 //*****************************************************************************************************
 //**************THE PSEUDO CODE FOR THE MATHEMATICAL MODEL BASED MALARIA PREDICTION SYSTEM************* ************************************
 //*****************************************************************************************************************************
 //**************************This code file shows the algorithm for the Malaria Prediction App  [LOW RAIN]*********************************
 //*****************************************************************************************************************************

 //Uncomment the next if statement block if you want to get the Inputs via the web form
//if(isset($_POST['cnn'])){
/** 
  * This particular variable is used for the controlled simulation system
*/
	$compartment_limiter = 7;
    $compartment_data = array();

/**These are the siimulation data structure for storing the dynamic simulated data of 
  * the various compartments in realtime.
*/
	$simulations_dT = array();
	$simulations_dS = array();
	$simulations_dV = array();
	$simulations_dE = array();
	$simulations_dI = array();
	$simulations_dR = array();
	$simulations_dD = array();
    
    //High Rain Arrays
    
    $simulations_dT_High = array();
    $simulations_dS_High = array();
    $simulations_dV_High = array();
    $simulations_dE_High = array();
    $simulations_dI_High = array();
    $simulations_dR_High = array();
    $simulations_dD_High = array();
    
    
    //80% High Rain Arrays
    
    $simulations_dT_High80 = array();
    $simulations_dS_High80 = array();
    $simulations_dV_High80 = array();
    $simulations_dE_High80 = array();
    $simulations_dI_High80 = array();
    $simulations_dR_High80 = array();
    $simulations_dD_High80 = array();
    
    //80% Low Rain Arrays
    
    $simulations_dT_80_low = array();
    $simulations_dS_80_low = array();
    $simulations_dV_80_low = array();
    $simulations_dE_80_low = array();
    $simulations_dI_80_low = array();
    $simulations_dR_80_low = array();
    $simulations_dD_80_low = array();
    
    
    
     //98% High Rain Arrays
    
    $simulations_dT_High98 = array();
    $simulations_dS_High98 = array();
    $simulations_dV_High98 = array();
    $simulations_dE_High98 = array();
    $simulations_dI_High98 = array();
    $simulations_dR_High98 = array();
    $simulations_dD_High98 = array();
    
    //98%  Low Rain Arrays
    
    $simulations_dT_98_low = array();
    $simulations_dS_98_low = array();
    $simulations_dV_98_low = array();
    $simulations_dE_98_low = array();
    $simulations_dI_98_low = array();
    $simulations_dR_98_low = array();
    $simulations_dD_98_low = array();
    
      //80% Moderate Rain Arrays
    
    $simulations_dT_80_mod = array();
    $simulations_dS_80_mod = array();
    $simulations_dV_80_mod = array();
    $simulations_dE_80_mod = array();
    $simulations_dI_80_mod = array();
    $simulations_dR_80_mod = array();
    $simulations_dD_80_mod = array();
    
    //98% Moderate Rain Arrays
    
    $simulations_dT_98_mod = array();
    $simulations_dS_98_mod = array();
    $simulations_dV_98_mod = array();
    $simulations_dE_98_mod = array();
    $simulations_dI_98_mod = array();
    $simulations_dR_98_mod = array();
    $simulations_dD_98_mod = array();
    
     // Moderate Rain Arrays
    
    $simulations_dT_mod = array();
    $simulations_dS_mod = array();
    $simulations_dV_mod = array();
    $simulations_dE_mod = array();
    $simulations_dI_mod = array();
    $simulations_dR_mod = array();
    $simulations_dD_mod = array();
    
  // Please uncomment the next input statements for Variables T, S, V, E if you want to get their initial simulation data values via the web form     
	
	//$T  = $_POST['travellers']; //This is where we take the number of Travellers  e.g. 70000;
	//$S = $_POST['susceptible']; //This is where we take the number of Susceptible  e.g. 5000;
	//$V = $_POST['vigilant']; //This is where we take the number of  the Vigilant Humans  e.g. 55000;
	//$E = $_POST['exposed']; //This is where we take the number of the Exposed Humans  e.g. 10000;
    
    $T = 6102;
    $S = 3869;
    $V = 2233; 
	$E = 213;
/**
  * Seeding and initializing the data for states I, D, R [Infected, Death, Recovered] to zero.
  * These values change dynamically as the simulation begins 
*/
	$I = 0;
	$d = 0;
	$r = 0;
	
	//echo $T. ' - ' . $S . ' - ' . $V . ' - ' . $E . ' - ' . $I . ' - ' . $d . ' - ' . $r;
	
/** Here are the parameters for controlling the ODE Modelling Process and Simulations*/

$gamma = 1; $alpha1 = 0.965; $alpha2 = 0.03; $alpha3 = 0; $c1 = 0.25; $c2 = 0.25; $r1 = 0.320; $r2 = 0.1577; $r3 = 0.099;
$r4 = 1.7326; $r = 0.99977; $d = 0.00023;

$timefactor = array(1, 30, 60, 90); //This is the data structure storing the time in days in sequence
$params = array('T','S','E','I','R','D','V'); // This is the data structure storing the compartments in sequence


/**
* Defining a dynamic algorithm for getting time in days
* 12 months makes a year (365 days)
* 1 day will be used to represent the first day of malaria prediction
* 1 day will be (1/365) 
* 30 day will be (30/365)
* 60 day will be (60/365)
* 90 day will be (90/365)
**/
$day_1 = (1/365);   echo $day_1 . '<br/>';
$day_30 = (30/365);   echo $day_30 . '<br/>';
$day_60 = (60/365);    echo $day_60 . '<br/>';
$day_90 = (90/365);     echo $day_90 . '<br/>';
$day_120 = (120/365);    echo $day_120 . '<br/>';


/**This is the Ordinary Differential Equation (ODE) Solver Code Dynamics
**************This is where the dynamic Simulation is done*****************************
*/

/** dT compartment Simulations for T*/
   for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
	if($simul_iterative == 0){
	   $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_1;   //echo ' T ' . $dT;
        if($dT < 0){ $dT = -($dT);}
	   $simulations_dT[0] = floor($dT/1);  //storing the simulated data in the appropriate data rack
       
	}
	if($simul_iterative == 1){
	   $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_30;
       if($dT < 0){ $dT = -($dT);}
	   $simulations_dT[1] = floor($dT/30); //storing the simulated data in the appropriate data rack
       
	}
	if($simul_iterative == 2){
	   $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_60;
        if($dT < 0){ $dT = -($dT);}
	   $simulations_dT[2] = floor($dT/60); //storing the simulated data in the appropriate data rack
          
	}
	if($simul_iterative == 3){
	   $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_90;
        if($dT < 0){ $dT = -($dT);}
	   $simulations_dT[3] = floor($dT/90); //storing the simulated data in the appropriate data rack 
             
	}
	if($simul_iterative == 4){
	   $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_120;
        if($dT < 0){ $dT = -($dT);}
	   $simulations_dT[4] = floor($dT/120/($dT/120)); //storing the simulated data in the appropriate data rack
         
	}
  }
 
/** dS compartment Simulations for S*/
     for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
	if($simul_iterative == 0){
	  $dS = -$c1 * $S - $c2 * $S - $r1 * $S - $r2 * S - $r3 * $S + $alpha1 * $T + $r4 * $V * $day_1;
       if($dS < 0){ $dS = -($dS);}
	  $simulations_dS[0] = floor($dS); 
       
	}
	if($simul_iterative == 1){
	  $dS = -$c1 * $S - $c2 * $S - $r1 * $S - $r2 * S - $r3 * $S + $alpha1 * $T + $r4 * $V * $day_30;
       if($dS < 0){ $dS = -($dS);}  
	  $simulations_dS[1] = floor($dS); 
      
	}
	if($simul_iterative == 2){
	  $dS = -$c1 * $S - $c2 * $S - $r1 * $S - $r2 * S - $r3 * $S + $alpha1 * $T + $r4 * $V * $day_60;
       if($dS < 0){ $dS = -($dS);}  
	  $simulations_dS[2] = floor($dS); 	
      
	}
                   if($simul_iterative == 3){
	  $dS = -$c1 * $S - $c2 * $S - $r1 * $S - $r2 * S - $r3 * $S + $alpha1 * $T + $r4 * $V * $day_90;
       if($dS < 0){ $dS = -($dS);}  
	  $simulations_dS[3] = floor($dS);                                           
      
	}
	if($simul_iterative == 4){
	  $dS = -$c1 * $S - $c2 * $S - $r1 * $S - $r2 * S - $r3 * $S + $alpha1 * $T + $r4 * $V * $day_120;
       if($dS < 0){ $dS = -($dS);}  
	  $simulations_dS[4] = floor($dS); 
      
	}
  }
		
/** dE compartment Simulations for E*/		
for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
	if($simul_iterative == 0){
	   $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_1;
       if($dE < 0){ $dE = -($dE);} 
	   $simulations_dE[0] = floor($dE); 
       
	}
	if($simul_iterative == 1){
	   $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_30;
       if($dE < 0){ $dE = -($dE);}   
	   $simulations_dE[1] = floor($dE); 
       
	}
	if($simul_iterative == 2){
	   $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_60;	
       if($dE < 0){ $dE = -($dE);}   
	   $simulations_dE[2] = floor($dE); 
         
	}
	if($simul_iterative == 3){
	   $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_90;
       if($dE < 0){ $dE = -($dE);}   
	   $simulations_dE[3] = floor($dE); 
          
	}
	if($simul_iterative == 4){
	   $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_120;
       if($dE < 0){ $dE = -($dE);}   
	   $simulations_dE[4] = floor($dE); 
         
	}
	
}

/** dI compartment Simulations for I*/
for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
          if($simul_iterative == 0){
	  $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_1;
      if($dI < 0){ $dI = -($dI);}
	   $simulations_dI[0] = floor($dI); 
           
	}
          if($simul_iterative == 1){
	  $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_30;
       if($dI < 0){ $dI = -($dI);}  
	   $simulations_dI[1] = floor($dI); 
       
	}
          if($simul_iterative == 2){
	  $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_60;
       if($dI < 0){ $dI = -($dI);}  	
	   $simulations_dI[2] = floor($dI); 
       
	}
          if($simul_iterative == 3){
	  $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_90;
       if($dI < 0){ $dI = -($dI);}  
	   $simulations_dI[3] = floor($dI); 
        
	}
          if($simul_iterative == 4){
	  $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_120;
       if($dI < 0){ $dI = -($dI);}  
	   $simulations_dI[4] = floor($dI);  
        
	}
}
   

/** dR compartment Simulations for R*/
  for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
          if($simul_iterative == 0){
	   $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_1 * $r + $day_1;
        if($dR < 0){ $dR = -($dR);}  
	    $simulations_dR[0] = floor($dR/1); 
         
	}
          if($simul_iterative == 1){
	   $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_30 * $r + $day_30;
       if($dR < 0){ $dR = -($dR);}
	   $simulations_dR[1] = floor($dR); 
        
                        
	}
          if($simul_iterative == 2){
	   $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_60 * $r + $day_60;
       if($dR < 0){ $dR = -($dR);}
	   $simulations_dR[2] = floor($dR); 
        
	}
          if($simul_iterative == 3){
	   $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_90 * $r + $day_90;
       if($dR < 0){ $dR = -($dR);}
	   $simulations_dR[3] = floor($dR); 
        
	} 
          if($simul_iterative == 4){
	   $dR =$gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_120 * $r + $day_120;
       if($dR < 0){ $dR = -($dR);}
	   $simulations_dR[4] = floor($dR); 
        
	} 
}

    
 
/** dD compartment Simulations for D*/        
  for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
        if($simul_iterative == 0){
	   $dD = $I * $d *  $day_1;
       if($dD < 0){ $dD = -($dD);}
	   $simulations_dD[0] = floor($dD); 
        
	}
        if($simul_iterative == 1){
	   $dD = $d * $I  * $day_30;
       if($dD < 0){ $dD = -($dD);}
	   $simulations_dD[1] = floor($dD); 
        
	}
        if($simul_iterative == 2){
	   $dD = $d * $I * $day_60;
       if($dD < 0){ $dD = -($dD);}
	   $simulations_dD[2] = floor($dD); 
          
	}
        if($simul_iterative == 3){
	   $dD = $d * $I * $day_90;
       if($dD < 0){ $dD = -($dD);}
	   $simulations_dD[3] = floor($dD); 
        
	}
        if($simul_iterative == 4){
	   $dD = $d * $I * $day_90;
       if($dD < 0){ $dD = -($dD);}
	   $simulations_dD[4] = floor($dD); 
          
	}
  }


/** dV compartment Simulations for V*/	
  for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
        if($simul_iterative == 0){
	  $dV = $r1 * $S + $r2 * $S + $r3 * $S - $r4 * $V * $day_1;
      if($dV < 0){ $dV = -($dV);}
	  $simulations_dV[0] = floor($dV); 
       
	}
        if($simul_iterative == 1){
	   $dV = $r1 * $S + $r2 * $S + $r3 * $S - $r4 * $V * $day_30;
       if($dV < 0){ $dV = -($dV);} 
	   $simulations_dV[1] = floor($dV);    
         
	}
        if($simul_iterative == 2){
	  $dV = $r1 * $S + $r2 * $S + $r3 * $S - $r4 * $V * $day_60;
      if($dV < 0){ $dV = -($dV);} 
	  $simulations_dV[2] = floor($dV); 
          
	}
         if($simul_iterative == 3){
	  $dV = $r1 * $S + $r2 * $S + $r3 * $S - $r4 * $V * $day_90;
      if($dV < 0){ $dV = -($dV);} 
	  $simulations_dV[3] = floor($dV); 
           
	}      
         if($simul_iterative == 4){
	  $dV = $r1 * $S + $r2 * $S + $r3 * $S - $r4 * $V * $day_120;
      if($dV < 0){ $dV = -($dV);} 
	  $simulations_dV[4] = floor($dV); 
          
	}      
 }
 
 
 //************************************************************************************************************************
 //  HIGH RAIN
 //*************************************************************************************************************************
 
  /**This is the Ordinary Differential Equation (ODE) Solver Code Dynamics
**************This is where the dynamic Simulation is done*****************************
*/
//Parameters for low rain
$gamma = 1; $alpha1 = 0.965; $alpha2 = 0.03; $alpha3 = 0; $c1 = 1; $c2 = 1; $r1 = 0.320; $r2 = 0.1577; $r3 = 0.099;
$r4 = 1.7326; $r = 0.99977; $d = 0.00023; 

/** dT compartment Simulations for T*/
   for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
    if($simul_iterative == 0){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_1;   //echo ' T ' . $dT;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_High[0] = floor($dT/1);  //storing the simulated data in the appropriate data rack
       
    }
    if($simul_iterative == 1){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_30;
       if($dT < 0){ $dT = -($dT);}
       $simulations_dT_High[1] = floor($dT/30); //storing the simulated data in the appropriate data rack
       
    }
    if($simul_iterative == 2){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_60;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_High[2] = floor($dT/60); //storing the simulated data in the appropriate data rack
          
    }
    if($simul_iterative == 3){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_90;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_High[3] = floor($dT/90); //storing the simulated data in the appropriate data rack 
             
    }
    if($simul_iterative == 4){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_120;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_High[4] = floor($dT/120); //storing the simulated data in the appropriate data rack
          
    }
    //getGraph("High Rain");
  }
 
/** dS compartment Simulations for S*/
     for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
    if($simul_iterative == 0){
      $dS = -$c1 * $S - $c2 * $S - $r1 * $S - $r2 * S - $r3 * $S + $alpha1 * $T + $r4 * $V * $day_1;
       if($dS < 0){ $dS = -($dS);}
      $simulations_dS_High[0] = floor($dS); 
       
    }
    if($simul_iterative == 1){
      $dS = -$c1 * $S - $c2 * $S - $r1 * $S - $r2 * S - $r3 * $S + $alpha1 * $T + $r4 * $V * $day_30;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_High[1] = floor($dS); 
     
    }
    if($simul_iterative == 2){
      $dS = -$c1 * $S - $c2 * $S - $r1 * $S - $r2 * S - $r3 * $S + $alpha1 * $T + $r4 * $V * $day_60;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_High[2] = floor($dS);     
      
    }
                   if($simul_iterative == 3){
      $dS = -$c1 * $S - $c2 * $S - $r1 * $S - $r2 * S - $r3 * $S + $alpha1 * $T + $r4 * $V * $day_90;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_High[3] = floor($dS);                                           
      
    }
    if($simul_iterative == 4){
      $dS = -$c1 * $S - $c2 * $S - $r1 * $S - $r2 * S - $r3 * $S + $alpha1 * $T + $r4 * $V * $day_120;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_High[4] = floor($dS); 
      
    }
  }
        
/** dE compartment Simulations for E*/        
for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
    if($simul_iterative == 0){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_1;
       if($dE < 0){ $dE = -($dE);} 
       $simulations_dE_High[0] = floor($dE); 
       
    }
    if($simul_iterative == 1){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_30;
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_High[1] = floor($dE); 
      
    }
    if($simul_iterative == 2){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_60;    
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_High[2] = floor($dE); 
          
    }
    if($simul_iterative == 3){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_90;
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_High[3] = floor($dE); 
          
    }
    if($simul_iterative == 4){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_120;
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_High[4] = floor($dE); 
          
    }
    
}

/** dI compartment Simulations for I*/
for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
          if($simul_iterative == 0){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_1;
      if($dI < 0){ $dI = -($dI);}
       $simulations_dI_High[0] = floor($dI); 
          
    }
          if($simul_iterative == 1){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_30;
       if($dI < 0){ $dI = -($dI);}  
       $simulations_dI_High[1] = floor($dI); 
        
    }
          if($simul_iterative == 2){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_60;
       if($dI < 0){ $dI = -($dI);}      
       $simulations_dI_High[2] = floor($dI); 
        
    }
          if($simul_iterative == 3){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_90;
       if($dI < 0){ $dI = -($dI);}  
       $simulations_dI_High[3] = floor($dI); 
        
    }
          if($simul_iterative == 4){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_120;
       if($dI < 0){ $dI = -($dI);}  
       $simulations_dI_High[4] = floor($dI);  
        
    }
}
   

/** dR compartment Simulations for R*/
  for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
          if($simul_iterative == 0){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_1 * $r + $day_1;
        if($dR < 0){ $dR = -($dR);}  
        $simulations_dR_High[0] = floor($dR); 
       
    }
          if($simul_iterative == 1){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_30 * $r + $day_30;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_High[1] = floor($dR); 
      
                        
    }
          if($simul_iterative == 2){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_60 * $r + $day_60;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_High[2] = floor($dR); 
      
    }
          if($simul_iterative == 3){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_90 * $r + $day_90;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_High[3] = floor($dR); 
      
    } 
          if($simul_iterative == 4){
       $dR =$gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_120 * $r + $day_120;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_High[4] = floor($dR); 
      
    } 
}

    
 
/** dD compartment Simulations for D*/        
  for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
        if($simul_iterative == 0){
       $dD = $I * $d *  $day_1;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_High[0] = floor($dD); 
      
    }
        if($simul_iterative == 1){
       $dD = $d * $I  * $day_30;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_High[1] = floor($dD); 
        
    }
        if($simul_iterative == 2){
       $dD = $d * $I * $day_60;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_High[2] = floor($dD); 
        
    }
        if($simul_iterative == 3){
       $dD = $d * $I * $day_90;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_High[3] = floor($dD); 
        
    }
        if($simul_iterative == 4){
       $dD = $d * $I * $day_90;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_High[4] = floor($dD); 
        
    }
  }


/** dV compartment Simulations for V*/    
  for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
        if($simul_iterative == 0){
      $dV = $r1 * $S + $r2 * $S + $r3 * $S - $r4 * $V * $day_1;
      if($dV < 0){ $dV = -($dV);}
      $simulations_dV_High[0] = floor($dV); 
       
    }
        if($simul_iterative == 1){
       $dV = $r1 * $S + $r2 * $S + $r3 * $S - $r4 * $V * $day_30;
       if($dV < 0){ $dV = -($dV);} 
       $simulations_dV_High[1] = floor($dV);    
            
    }
        if($simul_iterative == 2){
      $dV = $r1 * $S + $r2 * $S + $r3 * $S - $r4 * $V * $day_60;
      if($dV < 0){ $dV = -($dV);} 
      $simulations_dV_High[2] = floor($dV); 
            
    }
         if($simul_iterative == 3){
      $dV = $r1 * $S + $r2 * $S + $r3 * $S - $r4 * $V * $day_90;
      if($dV < 0){ $dV = -($dV);} 
      $simulations_dV_High[3] = floor($dV); 
            
    }      
         if($simul_iterative == 4){
      $dV = $r1 * $S + $r2 * $S + $r3 * $S - $r4 * $V * $day_120;
      if($dV < 0){ $dV = -($dV);} 
      $simulations_dV_High[4] = floor($dV); 
            
    }      
 }
 
 
 //************************************************************************************************************************
 //  80% HIGH RAIN
 //*************************************************************************************************************************
 
  /**This is the Ordinary Differential Equation (ODE) Solver Code Dynamics
**************This is where the dynamic Simulation is done*****************************
*/
//Parameters for low rain
$gamma = 1; $alpha1 = 0.965; $alpha2 = 0.03; $alpha3 = 0; $c1 = 1; $c2 = 1; $r1 = 0.320; $r2 = 0.1577; $r3 = 0.099;
$r4 = 1.7326; $r = 0.99977; $d = 0.00023;

/** dT compartment Simulations for T*/
   for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
    if($simul_iterative == 0){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_1;   //echo ' T ' . $dT;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_High80[0] = floor($dT/1);  //storing the simulated data in the appropriate data rack
       
    }
    if($simul_iterative == 1){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_30;
       if($dT < 0){ $dT = -($dT);}
       $simulations_dT_High80[1] = floor($dT/30); //storing the simulated data in the appropriate data rack
       
    }
    if($simul_iterative == 2){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_60;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_High80[2] = floor($dT/60); //storing the simulated data in the appropriate data rack
       
    }
    if($simul_iterative == 3){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_90;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_High80[3] = floor($dT/90); //storing the simulated data in the appropriate data rack 
          
    }
    if($simul_iterative == 4){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_120;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_High80[4] = floor($dT/120/($dT/120)); //storing the simulated data in the appropriate data rack
       
    }
  }
 
/** dS compartment Simulations for S*/
     for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
    if($simul_iterative == 0){
      $dS = ($T - ((80/100) * $T))  * $day_1;
       if($dS < 0){ $dS = -($dS);}
      $simulations_dS_High80[0] = floor($dS); 
       
    }
    if($simul_iterative == 1){
      $dS = ($T - ((80/100) * $T))  * $day_30;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_High80[1] = floor($dS); 
      
    }
    if($simul_iterative == 2){
      $dS = ($T - ((80/100) * $T))  * $day_60;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_High80[2] = floor($dS);     
      
    }
                   if($simul_iterative == 3){
      $dS = ($T - ((80/100) * $T))  * $day_90;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_High80[3] = floor($dS);                                           
      
    }
    if($simul_iterative == 4){
      $dS = ($T - ((80/100) * $T))  * $day_120;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_High80[4] = floor($dS); 
      
    }
  }
        
/** dE compartment Simulations for E*/        
for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
    if($simul_iterative == 0){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_1;
       if($dE < 0){ $dE = -($dE);} 
       $simulations_dE_High80[0] = floor($dE); 
       
    }
    if($simul_iterative == 1){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_30;
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_High80[1] = floor($dE); 
       
    }
    if($simul_iterative == 2){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_60;    
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_High80[2] = floor($dE); 
          
    }
    if($simul_iterative == 3){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_90;
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_High80[3] = floor($dE); 
          
    }
    if($simul_iterative == 4){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_120;
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_High80[4] = floor($dE); 
          
    }
    
}

/** dI compartment Simulations for I*/
for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
          if($simul_iterative == 0){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_1;
      if($dI < 0){ $dI = -($dI);}
       $simulations_dI_High80[0] = floor($dI); 
          
    }
          if($simul_iterative == 1){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_30;
       if($dI < 0){ $dI = -($dI);}  
       $simulations_dI_High80[1] = floor($dI); 
        
    }
          if($simul_iterative == 2){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_60;
       if($dI < 0){ $dI = -($dI);}      
       $simulations_dI_High80[2] = floor($dI); 
        
    }
          if($simul_iterative == 3){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_90;
       if($dI < 0){ $dI = -($dI);}  
       $simulations_dI_High80[3] = floor($dI); 
        
    }
          if($simul_iterative == 4){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_120;
       if($dI < 0){ $dI = -($dI);}  
       $simulations_dI_High80[4] = floor($dI);  
        
    }
}
   

/** dR compartment Simulations for R*/
  for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
          if($simul_iterative == 0){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_1 * $r + $day_1;
        if($dR < 0){ $dR = -($dR);}  
        $simulations_dR_High80[0] = floor($dR/1); 
        
    }
          if($simul_iterative == 1){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_30 * $r + $day_30;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_High80[1] = floor($dR); 
      
                        
    }
          if($simul_iterative == 2){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_60 * $r + $day_60;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_High80[2] = floor($dR); 
      
    }
          if($simul_iterative == 3){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_90 * $r + $day_90;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_High80[3] = floor($dR); 
      
    } 
          if($simul_iterative == 4){
       $dR =$gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_120 * $r + $day_120;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_High80[4] = floor($dR); 
      
    } 
}

    
 
/** dD compartment Simulations for D*/        
  for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
        if($simul_iterative == 0){
       $dD = $I * $d *  $day_1;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_High80[0] = floor($dD); 
      
    }
        if($simul_iterative == 1){
       $dD = $d * $I  * $day_30;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_High80[1] = floor($dD); 
        
    }
        if($simul_iterative == 2){
       $dD = $d * $I * $day_60;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_High80[2] = floor($dD); 
        
    }
        if($simul_iterative == 3){
       $dD = $d * $I * $day_90;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_High80[3] = floor($dD); 
        
    }
        if($simul_iterative == 4){
       $dD = $d * $I * $day_90;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_High80[4] = floor($dD); 
        
    }
  }


/** dV compartment Simulations for V*/    
  for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
        if($simul_iterative == 0){
      $dV = ((80/100) * $T)* $day_1;
      if($dV < 0){ $dV = -($dV);}
      $simulations_dV_High80[0] = floor($dV); 
        
    }
        if($simul_iterative == 1){
       $dV = ((80/100) * $T) * $day_30;
       if($dV < 0){ $dV = -($dV);} 
       $simulations_dV_High80[1] = floor($dV);    
            
    }
        if($simul_iterative == 2){
      $dV = ((80/100) * $T) * $day_60;
      if($dV < 0){ $dV = -($dV);} 
      $simulations_dV_High80[2] = floor($dV); 
            
    }
         if($simul_iterative == 3){
      $dV = ((80/100) * $T) * $day_90;
      if($dV < 0){ $dV = -($dV);} 
      $simulations_dV_High80[3] = floor($dV); 
            
    }      
         if($simul_iterative == 4){
      $dV = ((80/100) * $T) * $day_120;
      if($dV < 0){ $dV = -($dV);} 
      $simulations_dV_High80[4] = floor($dV); 
            
    }      
 }
 
 
 //***********************************************************************************************************************************************
 //    80% LOW RAIN
 //***********************************************************************************************************************************************
    /** Here are the parameters for controlling the ODE Modelling Process and Simulations for 80% Low Rain*/

$gamma = 1; $alpha1 = 0.965; $alpha2 = 0.03; $alpha3 = 0; $c1 = 0.25; $c2 = 0.25; $r1 = 0.320; $r2 = 0.1577; $r3 = 0.099;
$r4 = 1.7326; $r = 0.99977; $d = 0.00023;
 
/** dT compartment Simulations for T*/
   for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
    if($simul_iterative == 0){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_1;   //echo ' T ' . $dT;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_80_low[0] = floor($dT/1);  //storing the simulated data in the appropriate data rack
         
    }
    if($simul_iterative == 1){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_30;
       if($dT < 0){ $dT = -($dT);}
       $simulations_dT_80_low[1] = floor($dT/30); //storing the simulated data in the appropriate data rack
        
    }
    if($simul_iterative == 2){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_60;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_80_low[2] = floor($dT/60); //storing the simulated data in the appropriate data rack
        
    }
    if($simul_iterative == 3){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_90;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_80_low[3] = floor($dT/90); //storing the simulated data in the appropriate data rack 
           
    }
    if($simul_iterative == 4){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_120;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_80_low[4] = floor($dT/120/($dT/120)); //storing the simulated data in the appropriate data rack
        
    }
  }
 
/** dS compartment Simulations for S*/
     for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
    if($simul_iterative == 0){
      $dS = ($T - ((80/100) * $T)) * $day_1;
       if($dS < 0){ $dS = -($dS);}
      $simulations_dS_80_low[0] = floor($dS); 
       
    }
    if($simul_iterative == 1){
      $dS = ($T - ((80/100) * $T)) * $day_30;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_80_low[1] = floor($dS); 
      
    }
    if($simul_iterative == 2){
      $dS = ($T - ((80/100) * $T)) * $day_60;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_80_low[2] = floor($dS);     
      
    }
                   if($simul_iterative == 3){
      $dS = ($T - ((80/100) * $T)) * $day_90;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_80_low[3] = floor($dS);                                           
      
    }
    if($simul_iterative == 4){
      $dS = ($T - ((80/100) * $T)) * $day_120;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_80_low[4] = floor($dS); 
      
    }
  }
        
/** dE compartment Simulations for E*/        
for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
    if($simul_iterative == 0){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_1;
       if($dE < 0){ $dE = -($dE);} 
       $simulations_dE_80_low[0] = floor($dE); 
       
    }
    if($simul_iterative == 1){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_30;
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_80_low[1] = floor($dE); 
       
    }
    if($simul_iterative == 2){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_60;    
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_80_low[2] = floor($dE); 
          
    }
    if($simul_iterative == 3){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_90;
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_80_low[3] = floor($dE); 
         
    }
    if($simul_iterative == 4){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_120;
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_80_low[4] = floor($dE); 
          
    }
    
}

/** dI compartment Simulations for I*/
for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
          if($simul_iterative == 0){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_1;
      if($dI < 0){ $dI = -($dI);}
       $simulations_dI_80_low[0] = floor($dI); 
          
    }
          if($simul_iterative == 1){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_30;
       if($dI < 0){ $dI = -($dI);}  
       $simulations_dI_80_low[1] = floor($dI); 
        
    }
          if($simul_iterative == 2){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_60;
       if($dI < 0){ $dI = -($dI);}      
       $simulations_dI_80_low[2] = floor($dI); 
        
    }
          if($simul_iterative == 3){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_90;
       if($dI < 0){ $dI = -($dI);}  
       $simulations_dI_80_low[3] = floor($dI); 
         
    }
          if($simul_iterative == 4){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_120;
       if($dI < 0){ $dI = -($dI);}  
       $simulations_dI_80_low[4] = floor($dI);  
         
    }
}
   

/** dR compartment Simulations for R*/
  for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
          if($simul_iterative == 0){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_1 * $r + $day_1;
        if($dR < 0){ $dR = -($dR);}  
        $simulations_dR_80_low[0] = floor($dR/1); 
         
    }
          if($simul_iterative == 1){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_30 * $r + $day_30;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_80_low[1] = floor($dR); 
        
                        
    }
          if($simul_iterative == 2){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_60 * $r + $day_60;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_80_low[2] = floor($dR); 
        
    }
          if($simul_iterative == 3){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_90 * $r + $day_90;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_80_low[3] = floor($dR); 
        
    } 
          if($simul_iterative == 4){
       $dR =$gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_120 * $r + $day_120;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_80_low[4] = floor($dR); 
        
    } 
}

    
 
/** dD compartment Simulations for D*/        
  for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
        if($simul_iterative == 0){
       $dD = $I * $d *  $day_1;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_80_low[0] = floor($dD); 
        
    }
        if($simul_iterative == 1){
       $dD = $d * $I  * $day_30;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_80_low[1] = floor($dD); 
          
    }
        if($simul_iterative == 2){
       $dD = $d * $I * $day_60;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_80_low[2] = floor($dD); 
          
    }
        if($simul_iterative == 3){
       $dD = $d * $I * $day_90;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_80_low[3] = floor($dD); 
         
    }
        if($simul_iterative == 4){
       $dD = $d * $I * $day_90;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_80_low[4] = floor($dD); 
          
    }
  }


/** dV compartment Simulations for V*/    
  for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
        if($simul_iterative == 0){
      $dV = ((80/100) * $T) * $day_1;
      if($dV < 0){ $dV = -($dV);}
      $simulations_dV_80_low[0] = floor($dV); 
         
    }
        if($simul_iterative == 1){
       $dV = ((80/100) * $T) * $day_30;
       if($dV < 0){ $dV = -($dV);} 
       $simulations_dV_80_low[1] = floor($dV);    
             
    }
        if($simul_iterative == 2){
      $dV = ((80/100) * $T) * $day_60;
      if($dV < 0){ $dV = -($dV);} 
      $simulations_dV_80_low[2] = floor($dV); 
            
    }
         if($simul_iterative == 3){
      $dV = ((80/100) * $T) * $day_90;
      if($dV < 0){ $dV = -($dV);} 
      $simulations_dV_80_low[3] = floor($dV); 
            
    }      
         if($simul_iterative == 4){
      $dV = ((80/100) * $T) * $day_120;
      if($dV < 0){ $dV = -($dV);} 
      $simulations_dV_80_low[4] = floor($dV); 
         
    }      
 }
 


//************************************************************************************************************************
 //  98% HIGH RAIN
 //*************************************************************************************************************************
 
  /**This is the Ordinary Differential Equation (ODE) Solver Code Dynamics
**************This is where the dynamic Simulation is done*****************************
*/
//Parameters for 98% high rain
$gamma = 1; $alpha1 = 0.965; $alpha2 = 0.03; $alpha3 = 0; $c1 = 1; $c2 = 1; $r1 = 0.320; $r2 = 0.1577; $r3 = 0.099;
$r4 = 1.7326; $r = 0.99977; $d = 0.00023;

/** dT compartment Simulations for T*/
   for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
    if($simul_iterative == 0){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_1;   //echo ' T ' . $dT;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_High98[0] = floor($dT/1);  //storing the simulated data in the appropriate data rack
         
    }
    if($simul_iterative == 1){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_30;
       if($dT < 0){ $dT = -($dT);}
       $simulations_dT_High98[1] = floor($dT/30); //storing the simulated data in the appropriate data rack
       
    }
    if($simul_iterative == 2){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_60;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_High98[2] = floor($dT/60); //storing the simulated data in the appropriate data rack
        
    }
    if($simul_iterative == 3){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_90;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_High98[3] = floor($dT/90); //storing the simulated data in the appropriate data rack 
           
    }
    if($simul_iterative == 4){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_120;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_High98[4] = floor($dT/120/($dT/120)); //storing the simulated data in the appropriate data rack
        
    }
  }
 
/** dS compartment Simulations for S*/
     for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
    if($simul_iterative == 0){
      $dS = ($T - ((98/100) * $T))  * $day_1;
       if($dS < 0){ $dS = -($dS);}
      $simulations_dS_High98[0] = floor($dS); 
        
    }
    if($simul_iterative == 1){
      $dS = ($T - ((98/100) * $T))  * $day_30;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_High98[1] = floor($dS); 
      
    }
    if($simul_iterative == 2){
      $dS = ($T - ((98/100) * $T))  * $day_60;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_High98[2] = floor($dS);     
      
    }
                   if($simul_iterative == 3){
      $dS = ($T - ((98/100) * $T))  * $day_90;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_High98[3] = floor($dS);                                           
      
    }
    if($simul_iterative == 4){
      $dS = ($T - ((98/100) * $T))  * $day_120;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_High98[4] = floor($dS); 
      
    }
  }
        
/** dE compartment Simulations for E*/        
for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
    if($simul_iterative == 0){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_1;
       if($dE < 0){ $dE = -($dE);} 
       $simulations_dE_High98[0] = floor($dE); 
       
    }
    if($simul_iterative == 1){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_30;
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_High98[1] = floor($dE); 
       
    }
    if($simul_iterative == 2){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_60;    
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_High98[2] = floor($dE); 
          
    }
    if($simul_iterative == 3){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_90;
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_High98[3] = floor($dE); 
       //echo ' <br/> Eh ' .  $simulations_dE_High98[3];    
    }
    if($simul_iterative == 4){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_120;
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_High98[4] = floor($dE); 
       //echo ' <br/> Eh ' .  $simulations_dE_High98[4];    
    }
    
}

/** dI compartment Simulations for I*/
for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
          if($simul_iterative == 0){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_1;
      if($dI < 0){ $dI = -($dI);}
       $simulations_dI_High98[0] = floor($dI); 
       //echo ' <br/> Ih ' .  $simulations_dI_High98[0];    
    }
          if($simul_iterative == 1){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_30;
       if($dI < 0){ $dI = -($dI);}  
       $simulations_dI_High98[1] = floor($dI); 
       //echo ' <br/> Ih ' .  $simulations_dI_High98[1];  
    }
          if($simul_iterative == 2){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_60;
       if($dI < 0){ $dI = -($dI);}      
       $simulations_dI_High98[2] = floor($dI); 
       //echo ' <br/> Ih ' .  $simulations_dI_High98[2];  
    }
          if($simul_iterative == 3){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_90;
       if($dI < 0){ $dI = -($dI);}  
       $simulations_dI_High98[3] = floor($dI); 
       //echo ' <br/> Ih ' .  $simulations_dI_High98[3];  
    }
          if($simul_iterative == 4){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_120;
       if($dI < 0){ $dI = -($dI);}  
       $simulations_dI_High98[4] = floor($dI);  
       //echo ' <br/> Ih ' .  $simulations_dI_High98[4];  
    }
}
   

/** dR compartment Simulations for R*/
  for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
          if($simul_iterative == 0){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_1 * $r + $day_1;
        if($dR < 0){ $dR = -($dR);}  
        $simulations_dR_High98[0] = floor($dR/1); 
        //echo ' <br/> Rh ' .  $simulations_dR_High98[0];  
    }
          if($simul_iterative == 1){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_30 * $r + $day_30;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_High98[1] = floor($dR); 
        //echo ' <br/> Rh ' .  $simulations_dR_High98[1];
                        
    }
          if($simul_iterative == 2){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_60 * $r + $day_60;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_High98[2] = floor($dR); 
        //echo ' <br/> Rh ' .  $simulations_dR_High98[2];
    }
          if($simul_iterative == 3){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_90 * $r + $day_90;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_High98[3] = floor($dR); 
        //echo ' <br/> Rh ' .  $simulations_dR_High98[3];
    } 
          if($simul_iterative == 4){
       $dR =$gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_120 * $r + $day_120;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_High98[4] = floor($dR); 
        //echo ' <br/> Rh ' .  $simulations_dR_High98[4];
    } 
}

    
 
/** dD compartment Simulations for D*/        
  for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
        if($simul_iterative == 0){
       $dD = $I * $d *  $day_1;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_High98[0] = floor($dD); 
        //echo ' <br/> Dh ' .  $simulations_dD_High98[0];
    }
        if($simul_iterative == 1){
       $dD = $d * $I  * $day_30;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_High98[1] = floor($dD); 
        //echo ' <br/> Dh ' .  $simulations_dD_High98[1];  
    }
        if($simul_iterative == 2){
       $dD = $d * $I * $day_60;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_High98[2] = floor($dD); 
        //echo ' <br/> Dh ' .  $simulations_dD_High98[2];  
    }
        if($simul_iterative == 3){
       $dD = $d * $I * $day_90;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_High98[3] = floor($dD); 
        //echo ' <br/> Dh ' .  $simulations_dD_High98[3];  
    }
        if($simul_iterative == 4){
       $dD = $d * $I * $day_90;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_High98[4] = floor($dD); 
        //echo ' <br/> Dh ' .  $simulations_dD_High98[4];  
    }
  }


/** dV compartment Simulations for V*/    
  for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
        if($simul_iterative == 0){
      $dV = ((98/100) * $T)* $day_1;
      if($dV < 0){ $dV = -($dV);}
      $simulations_dV_High98[0] = floor($dV); 
       //echo ' <br/> Vh ' .  $simulations_dV_High98[0];  
    }
        if($simul_iterative == 1){
       $dV = ((98/100) * $T) * $day_30;
       if($dV < 0){ $dV = -($dV);} 
       $simulations_dV_High98[1] = floor($dV);    
       //echo ' <br/> Vh ' .  $simulations_dV_High98[1];      
    }
        if($simul_iterative == 2){
      $dV = ((98/100) * $T) * $day_60;
      if($dV < 0){ $dV = -($dV);} 
      $simulations_dV_High98[2] = floor($dV); 
      //echo ' <br/> Vh ' .  $simulations_dV_High98[2];      
    }
         if($simul_iterative == 3){
      $dV = ((98/100) * $T) * $day_90;
      if($dV < 0){ $dV = -($dV);} 
      $simulations_dV_High98[3] = floor($dV); 
      //echo ' <br/> Vh ' .  $simulations_dV_High98[3];      
    }      
         if($simul_iterative == 4){
      $dV = ((98/100) * $T) * $day_120;
      if($dV < 0){ $dV = -($dV);} 
      $simulations_dV_High98[4] = floor($dV); 
      //echo ' <br/> Vh ' .  $simulations_dV_High98[4];      
    }      
 }
 
 
 //***********************************************************************************************************************************************
 //    98% LOW RAIN
 //***********************************************************************************************************************************************
    /** Here are the parameters for controlling the ODE Modelling Process and Simulations for 80% Low Rain*/

$gamma = 1; $alpha1 = 0.965; $alpha2 = 0.03; $alpha3 = 0; $c1 = 0.25; $c2 = 0.25; $r1 = 0.320; $r2 = 0.1577; $r3 = 0.099;
$r4 = 1.7326; $r = 0.99977; $d = 0.00023;
 
/** dT compartment Simulations for T*/
   for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
    if($simul_iterative == 0){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_1;   //echo ' T ' . $dT;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_98_low[0] = floor($dT/1);  //storing the simulated data in the appropriate data rack
       //echo ' <br/> T ' . floor($dT/1);  
    }
    if($simul_iterative == 1){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_30;
       if($dT < 0){ $dT = -($dT);}
       $simulations_dT_98_low[1] = floor($dT/30); //storing the simulated data in the appropriate data rack
       //echo ' <br/> T ' . floor($dT/30); 
    }
    if($simul_iterative == 2){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_60;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_98_low[2] = floor($dT/60); //storing the simulated data in the appropriate data rack
          //echo ' <br/> T ' . floor($dT/60); 
    }
    if($simul_iterative == 3){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_90;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_98_low[3] = floor($dT/90); //storing the simulated data in the appropriate data rack 
          //echo ' <br/> T ' . floor($dT/90);    
    }
    if($simul_iterative == 4){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_120;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_98_low[4] = floor($dT/120/($dT/120)); //storing the simulated data in the appropriate data rack
          //echo ' <br/> T ' . floor($dT/120/($dT/120)); 
    }
  }
 
/** dS compartment Simulations for S*/
     for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
    if($simul_iterative == 0){
      $dS = ($T - ((98/100) * $T)) * $day_1;
       if($dS < 0){ $dS = -($dS);}
      $simulations_dS_98_low[0] = floor($dS); 
       //echo ' <br/> S ' .  $simulations_dS_98_low[0]; 
    }
    if($simul_iterative == 1){
      $dS = ($T - ((98/100) * $T)) * $day_30;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_98_low[1] = floor($dS); 
      //echo ' <br/> S ' .  $simulations_dS_98_low[1];
    }
    if($simul_iterative == 2){
      $dS = ($T - ((98/100) * $T)) * $day_60;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_98_low[2] = floor($dS);     
      //echo ' <br/> S ' .  $simulations_dS_98_low[2];
    }
                   if($simul_iterative == 3){
      $dS = ($T - ((98/100) * $T)) * $day_90;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_98_low[3] = floor($dS);                                           
      //echo ' <br/> S ' .  $simulations_dS_98_low[3];
    }
    if($simul_iterative == 4){
      $dS = ($T - ((98/100) * $T)) * $day_120;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_98_low[4] = floor($dS); 
      //echo ' <br/> S ' .  $simulations_dS_98_low[4];
    }
  }
        
/** dE compartment Simulations for E*/        
for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
    if($simul_iterative == 0){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_1;
       if($dE < 0){ $dE = -($dE);} 
       $simulations_dE_98_low[0] = floor($dE); 
       //echo ' <br/> E ' .  $simulations_dE_98_low[0]; 
    }
    if($simul_iterative == 1){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_30;
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_98_low[1] = floor($dE); 
       //echo ' <br/> E ' .  $simulations_dE_98_low[1]; 
    }
    if($simul_iterative == 2){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_60;    
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_98_low[2] = floor($dE); 
       //echo ' <br/> E ' .  $simulations_dE_98_low[2];    
    }
    if($simul_iterative == 3){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_90;
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_98_low[3] = floor($dE); 
       //echo ' <br/> E ' .  $simulations_dE_98_low[3];    
    }
    if($simul_iterative == 4){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_120;
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_98_low[4] = floor($dE); 
       //echo ' <br/> E ' .  $simulations_dE_98_low[4];    
    }
    
}

/** dI compartment Simulations for I*/
for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
          if($simul_iterative == 0){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_1;
      if($dI < 0){ $dI = -($dI);}
       $simulations_dI_98_low[0] = floor($dI); 
       //echo ' <br/> I ' .  $simulations_dI_98_low[0];    
    }
          if($simul_iterative == 1){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_30;
       if($dI < 0){ $dI = -($dI);}  
       $simulations_dI_98_low[1] = floor($dI); 
       //echo ' <br/> I ' .  $simulations_dI_98_low[1];  
    }
          if($simul_iterative == 2){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_60;
       if($dI < 0){ $dI = -($dI);}      
       $simulations_dI_98_low[2] = floor($dI); 
       //echo ' <br/> I ' .  $simulations_dI_98_low[2];  
    }
          if($simul_iterative == 3){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_90;
       if($dI < 0){ $dI = -($dI);}  
       $simulations_dI_98_low[3] = floor($dI); 
       //echo ' <br/> I ' .  $simulations_dI_98_low[3];  
    }
          if($simul_iterative == 4){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_120;
       if($dI < 0){ $dI = -($dI);}  
       $simulations_dI_98_low[4] = floor($dI);  
       //echo ' <br/> I ' .  $simulations_dI_98_low[4];  
    }
}
   

/** dR compartment Simulations for R*/
  for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
          if($simul_iterative == 0){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_1 * $r + $day_1;
        if($dR < 0){ $dR = -($dR);}  
        $simulations_dR_98_low[0] = floor($dR/1); 
        //echo ' <br/> R ' .  $simulations_dR_98_low[0];  
    }
          if($simul_iterative == 1){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_30 * $r + $day_30;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_98_low[1] = floor($dR); 
        //echo ' <br/> R ' .  $simulations_dR_98_low[1];
                        
    }
          if($simul_iterative == 2){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_60 * $r + $day_60;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_98_low[2] = floor($dR); 
        //echo ' <br/> R ' .  $simulations_dR_98_low[2];
    }
          if($simul_iterative == 3){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_90 * $r + $day_90;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_98_low[3] = floor($dR); 
        //echo ' <br/> R ' .  $simulations_dR_98_low[3];
    } 
          if($simul_iterative == 4){
       $dR =$gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_120 * $r + $day_120;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_98_low[4] = floor($dR); 
        //echo ' <br/> R ' .  $simulations_dR_98_low[4];
    } 
}

    
 
/** dD compartment Simulations for D*/        
  for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
        if($simul_iterative == 0){
       $dD = $I * $d *  $day_1;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_98_low[0] = floor($dD); 
        //echo ' <br/> D ' .  $simulations_dD_98_low[0];
    }
        if($simul_iterative == 1){
       $dD = $d * $I  * $day_30;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_98_low[1] = floor($dD); 
        //echo ' <br/> D ' .  $simulations_dD_98_low[1];  
    }
        if($simul_iterative == 2){
       $dD = $d * $I * $day_60;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_98_low[2] = floor($dD); 
        //echo ' <br/> D ' .  $simulations_dD_98_low[2];  
    }
        if($simul_iterative == 3){
       $dD = $d * $I * $day_90;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_98_low[3] = floor($dD); 
        //echo ' <br/> D ' .  $simulations_dD_98_low[3];  
    }
        if($simul_iterative == 4){
       $dD = $d * $I * $day_90;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_98_low[4] = floor($dD); 
        //echo ' <br/> D ' .  $simulations_dD_98_low[4];  
    }
  }


/** dV compartment Simulations for V*/    
  for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
        if($simul_iterative == 0){
      $dV = ((98/100) * $T) * $day_1;
      if($dV < 0){ $dV = -($dV);}
      $simulations_dV_98_low[0] = floor($dV); 
       //echo ' <br/> V ' .  $simulations_dV_98_low[0];  
    }
        if($simul_iterative == 1){
       $dV = ((98/100) * $T) * $day_30;
       if($dV < 0){ $dV = -($dV);} 
       $simulations_dV_98_low[1] = floor($dV);    
       //echo ' <br/> V ' .  $simulations_dV_98_low[1];      
    }
        if($simul_iterative == 2){
      $dV = ((98/100) * $T) * $day_60;
      if($dV < 0){ $dV = -($dV);} 
      $simulations_dV_98_low[2] = floor($dV); 
      //echo ' <br/> V ' .  $simulations_dV_98_low[2];      
    }
         if($simul_iterative == 3){
      $dV = ((98/100) * $T) * $day_90;
      if($dV < 0){ $dV = -($dV);} 
      $simulations_dV_98_low[3] = floor($dV); 
      //echo ' <br/> V ' .  $simulations_dV_98_low[3];      
    }      
         if($simul_iterative == 4){
      $dV = ((98/100) * $T) * $day_120;
      if($dV < 0){ $dV = -($dV);} 
      $simulations_dV_98_low[4] = floor($dV); 
      //echo ' <br/> V ' .  $simulations_dV_98_low[4];      
    }      
 }
 
//*****************************************************************************************************************************************************************
//   MODERATE RAIN SIMULATION
//******************************************************************************************************************************************************************  

/**This is the Ordinary Differential Equation (ODE) Solver Code Dynamics
**************This is where the dynamic Simulation is done*****************************
*/

/** Here are the parameters for controlling the ODE Modelling Process and Simulations*/

$gamma = 1; $alpha1 = 0.965; $alpha2 = 0.03; $alpha3 = 0; $c1 = 0.6; $c2 = 0.6; $r1 = 0.320; $r2 = 0.1577; $r3 = 0.099;
$r4 = 1.7326; $r = 0.99977; $d = 0.00023;


/** dT compartment Simulations for T*/
   for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
    if($simul_iterative == 0){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_1;   //echo ' T ' . $dT;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_mod[0] = floor($dT/1);  //storing the simulated data in the appropriate data rack
       //echo ' <br/> T ' . floor($dT/1);  
    }
    if($simul_iterative == 1){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_30;
       if($dT < 0){ $dT = -($dT);}
       $simulations_dT_mod[1] = floor($dT/30); //storing the simulated data in the appropriate data rack
       //echo ' <br/> T ' . floor($dT/30); 
    }
    if($simul_iterative == 2){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_60;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_mod[2] = floor($dT/60); //storing the simulated data in the appropriate data rack
          //echo ' <br/> T ' . floor($dT/60); 
    }
    if($simul_iterative == 3){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_90;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_mod[3] = floor($dT/90); //storing the simulated data in the appropriate data rack 
          //echo ' <br/> T ' . floor($dT/90);    
    }
    if($simul_iterative == 4){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_120;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_mod[4] = floor($dT/120/($dT/120)); //storing the simulated data in the appropriate data rack
          //echo ' <br/> T ' . floor($dT/120/($dT/120)); 
    }
  }
 
/** dS compartment Simulations for S*/
     for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
    if($simul_iterative == 0){
      $dS = -$c1 * $S - $c2 * $S - $r1 * $S - $r2 * S - $r3 * $S + $alpha1 * $T + $r4 * $V * $day_1;
       if($dS < 0){ $dS = -($dS);}
      $simulations_dS_mod[0] = floor($dS); 
       //echo ' <br/> S ' .  $simulations_dS_mod[0]; 
    }
    if($simul_iterative == 1){
      $dS = -$c1 * $S - $c2 * $S - $r1 * $S - $r2 * S - $r3 * $S + $alpha1 * $T + $r4 * $V * $day_30;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_mod[1] = floor($dS); 
      //echo ' <br/> S ' .  $simulations_dS_mod[1];
    }
    if($simul_iterative == 2){
      $dS = -$c1 * $S - $c2 * $S - $r1 * $S - $r2 * S - $r3 * $S + $alpha1 * $T + $r4 * $V * $day_60;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_mod[2] = floor($dS);     
      //echo ' <br/> S ' .  $simulations_dS_mod[2];
    }
                   if($simul_iterative == 3){
      $dS = -$c1 * $S - $c2 * $S - $r1 * $S - $r2 * S - $r3 * $S + $alpha1 * $T + $r4 * $V * $day_90;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_mod[3] = floor($dS);                                           
      //echo ' <br/> S ' .  $simulations_dS_mod[3];
    }
    if($simul_iterative == 4){
      $dS = -$c1 * $S - $c2 * $S - $r1 * $S - $r2 * S - $r3 * $S + $alpha1 * $T + $r4 * $V * $day_120;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_mod[4] = floor($dS); 
      //echo ' <br/> S ' .  $simulations_dS_mod[4];
    }
  }
        
/** dE compartment Simulations for E*/        
for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
    if($simul_iterative == 0){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_1;
       if($dE < 0){ $dE = -($dE);} 
       $simulations_dE_mod[0] = floor($dE); 
       //echo ' <br/> E ' .  $simulations_dE_mod[0]; 
    }
    if($simul_iterative == 1){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_30;
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_mod[1] = floor($dE); 
       //echo ' <br/> E ' .  $simulations_dE_mod[1]; 
    }
    if($simul_iterative == 2){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_60;    
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_mod[2] = floor($dE); 
       //echo ' <br/> E ' .  $simulations_dE_mod[2];    
    }
    if($simul_iterative == 3){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_90;
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_mod[3] = floor($dE); 
       //echo ' <br/> E ' .  $simulations_dE_mod[3];    
    }
    if($simul_iterative == 4){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_120;
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_mod[4] = floor($dE); 
       //echo ' <br/> E ' .  $simulations_dE_mod[4];    
    }
    
}

/** dI compartment Simulations for I*/
for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
          if($simul_iterative == 0){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_1;
      if($dI < 0){ $dI = -($dI);}
       $simulations_dI_mod[0] = floor($dI); 
       //echo ' <br/> I ' .  $simulations_dI_mod[0];    
    }
          if($simul_iterative == 1){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_30;
       if($dI < 0){ $dI = -($dI);}  
       $simulations_dI_mod[1] = floor($dI); 
       //echo ' <br/> I ' .  $simulations_dI_mod[1];  
    }
          if($simul_iterative == 2){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_60;
       if($dI < 0){ $dI = -($dI);}      
       $simulations_dI_mod[2] = floor($dI); 
       //echo ' <br/> I ' .  $simulations_dI_mod[2];  
    }
          if($simul_iterative == 3){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_90;
       if($dI < 0){ $dI = -($dI);}  
       $simulations_dI_mod[3] = floor($dI); 
       //echo ' <br/> I ' .  $simulations_dI_mod[3];  
    }
          if($simul_iterative == 4){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_120;
       if($dI < 0){ $dI = -($dI);}  
       $simulations_dI_mod[4] = floor($dI);  
       //echo ' <br/> I ' .  $simulations_dI_mod[4];  
    }
}
   

/** dR compartment Simulations for R*/
  for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
          if($simul_iterative == 0){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_1 * $r + $day_1;
        if($dR < 0){ $dR = -($dR);}  
        $simulations_dR_mod[0] = floor($dR/1); 
        //echo ' <br/> R ' .  $simulations_dR_mod[0];  
    }
          if($simul_iterative == 1){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_30 * $r + $day_30;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_mod[1] = floor($dR); 
        //echo ' <br/> R ' .  $simulations_dR_mod[1];
                        
    }
          if($simul_iterative == 2){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_60 * $r + $day_60;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_mod[2] = floor($dR); 
        //echo ' <br/> R ' .  $simulations_dR_mod[2];
    }
          if($simul_iterative == 3){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_90 * $r + $day_90;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_mod[3] = floor($dR); 
        //echo ' <br/> R ' .  $simulations_dR_mod[3];
    } 
          if($simul_iterative == 4){
       $dR =$gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_120 * $r + $day_120;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_mod[4] = floor($dR); 
        //echo ' <br/> R ' .  $simulations_dR_mod[4];
    } 
}

    
 
/** dD compartment Simulations for D*/        
  for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
        if($simul_iterative == 0){
       $dD = $I * $d *  $day_1;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_mod[0] = floor($dD); 
        //echo ' <br/> D ' .  $simulations_dD_mod[0];
    }
        if($simul_iterative == 1){
       $dD = $d * $I  * $day_30;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_mod[1] = floor($dD); 
        //echo ' <br/> D ' .  $simulations_dD_mod[1];  
    }
        if($simul_iterative == 2){
       $dD = $d * $I * $day_60;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_mod[2] = floor($dD); 
        //echo ' <br/> D ' .  $simulations_dD_mod[2];  
    }
        if($simul_iterative == 3){
       $dD = $d * $I * $day_90;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_mod[3] = floor($dD); 
       // echo ' <br/> D ' .  $simulations_dD_mod[3];  
    }
        if($simul_iterative == 4){
       $dD = $d * $I * $day_90;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_mod[4] = floor($dD); 
        //echo ' <br/> D ' .  $simulations_dD_mod[4];  
    }
  }


/** dV compartment Simulations for V*/    
  for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
        if($simul_iterative == 0){
      $dV = $r1 * $S + $r2 * $S + $r3 * $S - $r4 * $V * $day_1;
      if($dV < 0){ $dV = -($dV);}
      $simulations_dV_mod[0] = floor($dV); 
       //echo ' <br/> V ' .  $simulations_dV_mod[0];  
    }
        if($simul_iterative == 1){
       $dV = $r1 * $S + $r2 * $S + $r3 * $S - $r4 * $V * $day_30;
       if($dV < 0){ $dV = -($dV);} 
       $simulations_dV_mod[1] = floor($dV);    
       //echo ' <br/> V ' .  $simulations_dV_mod[1];      
    }
        if($simul_iterative == 2){
      $dV = $r1 * $S + $r2 * $S + $r3 * $S - $r4 * $V * $day_60;
      if($dV < 0){ $dV = -($dV);} 
      $simulations_dV_mod[2] = floor($dV); 
      //echo ' <br/> V ' .  $simulations_dV_mod[2];      
    }
         if($simul_iterative == 3){
      $dV = $r1 * $S + $r2 * $S + $r3 * $S - $r4 * $V * $day_90;
      if($dV < 0){ $dV = -($dV);} 
      $simulations_dV_mod[3] = floor($dV); 
      //echo ' <br/> V ' .  $simulations_dV_mod[3];      
    }      
         if($simul_iterative == 4){
      $dV = $r1 * $S + $r2 * $S + $r3 * $S - $r4 * $V * $day_120;
      if($dV < 0){ $dV = -($dV);} 
      $simulations_dV_mod[4] = floor($dV); 
      //echo ' <br/> V ' .  $simulations_dV_mod[4];      
    }      
 }
 
 //************************************************************************************************************************************************************
 // END OF MODERATE RAIN SIMULATION
 //*************************************************************************************************************************************************************
 
 
 
 //*****************************************************************************************************************************************************************
//   98% MODERATE RAIN SIMULATION
//******************************************************************************************************************************************************************  
 /** Here are the parameters for controlling the ODE Modelling Process and Simulations for 80% Low Rain*/

$gamma = 1; $alpha1 = 0.965; $alpha2 = 0.03; $alpha3 = 0; $c1 = 0.6; $c2 = 0.6; $r1 = 0.320; $r2 = 0.1577; $r3 = 0.099;
$r4 = 1.7326; $r = 0.99977; $d = 0.00023;
 
/** dT compartment Simulations for T*/
   for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
    if($simul_iterative == 0){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_1;   //echo ' T ' . $dT;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_98_mod[0] = floor($dT/1);  //storing the simulated data in the appropriate data rack
       //echo ' <br/> T ' . floor($dT/1);  
    }
    if($simul_iterative == 1){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_30;
       if($dT < 0){ $dT = -($dT);}
       $simulations_dT_98_mod[1] = floor($dT/30); //storing the simulated data in the appropriate data rack
       //echo ' <br/> T ' . floor($dT/30); 
    }
    if($simul_iterative == 2){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_60;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_98_mod[2] = floor($dT/60); //storing the simulated data in the appropriate data rack
          //echo ' <br/> T ' . floor($dT/60); 
    }
    if($simul_iterative == 3){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_90;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_98_mod[3] = floor($dT/90); //storing the simulated data in the appropriate data rack 
          //echo ' <br/> T ' . floor($dT/90);    
    }
    if($simul_iterative == 4){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_120;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_98_mod[4] = floor($dT/120/($dT/120)); //storing the simulated data in the appropriate data rack
          //echo ' <br/> T ' . floor($dT/120/($dT/120)); 
    }
  }
 
/** dS compartment Simulations for S*/
     for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
    if($simul_iterative == 0){
      $dS = ($T - ((98/100) * $T)) * $day_1;
       if($dS < 0){ $dS = -($dS);}
      $simulations_dS_98_mod[0] = floor($dS); 
      // echo ' <br/> S ' .  $simulations_dS_98_mod[0]; 
    }
    if($simul_iterative == 1){
      $dS = ($T - ((98/100) * $T)) * $day_30;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_98_mod[1] = floor($dS); 
      //echo ' <br/> S ' .  $simulations_dS_98_mod[1];
    }
    if($simul_iterative == 2){
      $dS = ($T - ((98/100) * $T)) * $day_60;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_98_mod[2] = floor($dS);     
      //echo ' <br/> S ' .  $simulations_dS_98_mod[2];
    }
                   if($simul_iterative == 3){
      $dS = ($T - ((98/100) * $T)) * $day_90;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_98_mod[3] = floor($dS);                                           
      //echo ' <br/> S ' .  $simulations_dS_98_mod[3];
    }
    if($simul_iterative == 4){
      $dS = ($T - ((98/100) * $T)) * $day_120;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_98_mod[4] = floor($dS); 
      //echo ' <br/> S ' .  $simulations_dS_98_mod[4];
    }
  }
        
/** dE compartment Simulations for E*/        
for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
    if($simul_iterative == 0){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_1;
       if($dE < 0){ $dE = -($dE);} 
       $simulations_dE_98_mod[0] = floor($dE); 
       //echo ' <br/> E ' .  $simulations_dE_98_mod[0]; 
    }
    if($simul_iterative == 1){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_30;
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_98_mod[1] = floor($dE); 
       //echo ' <br/> E ' .  $simulations_dE_98_mod[1]; 
    }
    if($simul_iterative == 2){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_60;    
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_98_mod[2] = floor($dE); 
       //echo ' <br/> E ' .  $simulations_dE_98_mod[2];    
    }
    if($simul_iterative == 3){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_90;
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_98_mod[3] = floor($dE); 
       //echo ' <br/> E ' .  $simulations_dE_98_mod[3];    
    }
    if($simul_iterative == 4){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_120;
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_98_mod[4] = floor($dE); 
      // echo ' <br/> E ' .  $simulations_dE_98_mod[4];    
    }
    
}

/** dI compartment Simulations for I*/
for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
          if($simul_iterative == 0){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_1;
      if($dI < 0){ $dI = -($dI);}
       $simulations_dI_98_mod[0] = floor($dI); 
       //echo ' <br/> I ' .  $simulations_dI_98_mod[0];    
    }
          if($simul_iterative == 1){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_30;
       if($dI < 0){ $dI = -($dI);}  
       $simulations_dI_98_mod[1] = floor($dI); 
       //echo ' <br/> I ' .  $simulations_dI_98_mod[1];  
    }
          if($simul_iterative == 2){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_60;
       if($dI < 0){ $dI = -($dI);}      
       $simulations_dI_98_mod[2] = floor($dI); 
       //echo ' <br/> I ' .  $simulations_dI_98_mod[2];  
    }
          if($simul_iterative == 3){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_90;
       if($dI < 0){ $dI = -($dI);}  
       $simulations_dI_98_mod[3] = floor($dI); 
       //echo ' <br/> I ' .  $simulations_dI_98_mod[3];  
    }
          if($simul_iterative == 4){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_120;
       if($dI < 0){ $dI = -($dI);}  
       $simulations_dI_98_mod[4] = floor($dI);  
       //echo ' <br/> I ' .  $simulations_dI_98_mod[4];  
    }
}
   

/** dR compartment Simulations for R*/
  for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
          if($simul_iterative == 0){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_1 * $r + $day_1;
        if($dR < 0){ $dR = -($dR);}  
        $simulations_dR_98_mod[0] = floor($dR/1); 
        //echo ' <br/> R ' .  $simulations_dR_98_mod[0];  
    }
          if($simul_iterative == 1){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_30 * $r + $day_30;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_98_mod[1] = floor($dR); 
        //echo ' <br/> R ' .  $simulations_dR_98_mod[1];
                        
    }
          if($simul_iterative == 2){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_60 * $r + $day_60;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_98_mod[2] = floor($dR); 
        //echo ' <br/> R ' .  $simulations_dR_98_mod[2];
    }
          if($simul_iterative == 3){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_90 * $r + $day_90;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_98_mod[3] = floor($dR); 
        //echo ' <br/> R ' .  $simulations_dR_98_mod[3];
    } 
          if($simul_iterative == 4){
       $dR =$gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_120 * $r + $day_120;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_98_mod[4] = floor($dR); 
        //echo ' <br/> R ' .  $simulations_dR_98_mod[4];
    } 
}

    
 
/** dD compartment Simulations for D*/        
  for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
        if($simul_iterative == 0){
       $dD = $I * $d *  $day_1;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_98_mod[0] = floor($dD); 
        //echo ' <br/> D ' .  $simulations_dD_98_mod[0];
    }
        if($simul_iterative == 1){
       $dD = $d * $I  * $day_30;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_98_mod[1] = floor($dD); 
        //echo ' <br/> D ' .  $simulations_dD_98_mod[1];  
    }
        if($simul_iterative == 2){
       $dD = $d * $I * $day_60;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_98_mod[2] = floor($dD); 
        //echo ' <br/> D ' .  $simulations_dD_98_mod[2];  
    }
        if($simul_iterative == 3){
       $dD = $d * $I * $day_90;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_98_mod[3] = floor($dD); 
        //echo ' <br/> D ' .  $simulations_dD_98_mod[3];  
    }
        if($simul_iterative == 4){
       $dD = $d * $I * $day_90;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_98_mod[4] = floor($dD); 
       // echo ' <br/> D ' .  $simulations_dD_98_mod[4];  
    }
  }


/** dV compartment Simulations for V*/    
  for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
        if($simul_iterative == 0){
      $dV = ((98/100) * $T) * $day_1;
      if($dV < 0){ $dV = -($dV);}
      $simulations_dV_98_mod[0] = floor($dV); 
       //echo ' <br/> V ' .  $simulations_dV_98_mod[0];  
    }
        if($simul_iterative == 1){
       $dV = ((98/100) * $T) * $day_30;
       if($dV < 0){ $dV = -($dV);} 
       $simulations_dV_98_mod[1] = floor($dV);    
       //echo ' <br/> V ' .  $simulations_dV_98_mod[1];      
    }
        if($simul_iterative == 2){
      $dV = ((98/100) * $T) * $day_60;
      if($dV < 0){ $dV = -($dV);} 
      $simulations_dV_98_mod[2] = floor($dV); 
      //echo ' <br/> V ' .  $simulations_dV_98_mod[2];      
    }
         if($simul_iterative == 3){
      $dV = ((98/100) * $T) * $day_90;
      if($dV < 0){ $dV = -($dV);} 
      $simulations_dV_98_mod[3] = floor($dV); 
      //echo ' <br/> V ' .  $simulations_dV_98_mod[3];      
    }      
         if($simul_iterative == 4){
      $dV = ((98/100) * $T) * $day_120;
      if($dV < 0){ $dV = -($dV);} 
      $simulations_dV_98_mod[4] = floor($dV); 
      //echo ' <br/> V ' .  $simulations_dV_98_mod[4];      
    }      
 }
 
 //************************************************************************************************************************************************************
 // END OF 98% MODERATE RAIN SIMULATION
 //*************************************************************************************************************************************************************
 
 

//*****************************************************************************************************************************************************************
//   80% MODERATE RAIN SIMULATION
//******************************************************************************************************************************************************************  
 /** Here are the parameters for controlling the ODE Modelling Process and Simulations for 80% Moderate Rain*/

$gamma = 1; $alpha1 = 0.965; $alpha2 = 0.03; $alpha3 = 0; $c1 = 0.6; $c2 = 0.6; $r1 = 0.320; $r2 = 0.1577; $r3 = 0.099;
$r4 = 1.7326; $r = 0.99977; $d = 0.00023;
 
/** dT compartment Simulations for T*/
   for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
    if($simul_iterative == 0){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_1;   //echo ' T ' . $dT;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_80_mod[0] = floor($dT/1);  //storing the simulated data in the appropriate data rack
       //echo ' <br/> T ' . floor($dT/1);  
    }
    if($simul_iterative == 1){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_30;
       if($dT < 0){ $dT = -($dT);}
       $simulations_dT_80_mod[1] = floor($dT/30); //storing the simulated data in the appropriate data rack
       //echo ' <br/> T ' . floor($dT/30); 
    }
    if($simul_iterative == 2){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_60;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_80_mod[2] = floor($dT/60); //storing the simulated data in the appropriate data rack
          //echo ' <br/> T ' . floor($dT/60); 
    }
    if($simul_iterative == 3){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_90;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_80_mod[3] = floor($dT/90); //storing the simulated data in the appropriate data rack 
          //echo ' <br/> T ' . floor($dT/90);    
    }
    if($simul_iterative == 4){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_120;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT_80_mod[4] = floor($dT/120/($dT/120)); //storing the simulated data in the appropriate data rack
          //echo ' <br/> T ' . floor($dT/120/($dT/120)); 
    }
  }
 
/** dS compartment Simulations for S*/
     for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
    if($simul_iterative == 0){
      $dS = ($T - ((80/100) * $T)) * $day_1;
       if($dS < 0){ $dS = -($dS);}
      $simulations_dS_80_mod[0] = floor($dS); 
       //echo ' <br/> S ' .  $simulations_dS_80_mod[0]; 
    }
    if($simul_iterative == 1){
      $dS = ($T - ((80/100) * $T)) * $day_30;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_80_mod[1] = floor($dS); 
      //echo ' <br/> S ' .  $simulations_dS_80_mod[1];
    }
    if($simul_iterative == 2){
      $dS = ($T - ((80/100) * $T)) * $day_60;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_80_mod[2] = floor($dS);     
      //echo ' <br/> S ' .  $simulations_dS_80_mod[2];
    }
                   if($simul_iterative == 3){
      $dS = ($T - ((80/100) * $T)) * $day_90;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_80_mod[3] = floor($dS);                                           
      //echo ' <br/> S ' .  $simulations_dS_80_mod[3];
    }
    if($simul_iterative == 4){
      $dS = ($T - ((80/100) * $T)) * $day_120;
       if($dS < 0){ $dS = -($dS);}  
      $simulations_dS_80_mod[4] = floor($dS); 
      //echo ' <br/> S ' .  $simulations_dS_80_mod[4];
    }
  }
        
/** dE compartment Simulations for E*/        
for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
    if($simul_iterative == 0){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_1;
       if($dE < 0){ $dE = -($dE);} 
       $simulations_dE_80_mod[0] = floor($dE); 
       //echo ' <br/> E ' .  $simulations_dE_80_mod[0]; 
    }
    if($simul_iterative == 1){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_30;
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_80_mod[1] = floor($dE); 
       //echo ' <br/> E ' .  $simulations_dE_98_mod[1]; 
    }
    if($simul_iterative == 2){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_60;    
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_80_mod[2] = floor($dE); 
       //echo ' <br/> E ' .  $simulations_dE_80_mod[2];    
    }
    if($simul_iterative == 3){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_90;
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_80_mod[3] = floor($dE); 
       //echo ' <br/> E ' .  $simulations_dE_80_mod[3];    
    }
    if($simul_iterative == 4){
       $dE = $c2 * $S  + $alpha2 * $T - $gamma * $E * $day_120;
       if($dE < 0){ $dE = -($dE);}   
       $simulations_dE_80_mod[4] = floor($dE); 
       //echo ' <br/> E ' .  $simulations_dE_80_mod[4];    
    }
    
}

/** dI compartment Simulations for I*/
for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
          if($simul_iterative == 0){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_1;
      if($dI < 0){ $dI = -($dI);}
       $simulations_dI_80_mod[0] = floor($dI); 
      // echo ' <br/> I ' .  $simulations_dI_80_mod[0];    
    }
          if($simul_iterative == 1){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_30;
       if($dI < 0){ $dI = -($dI);}  
       $simulations_dI_80_mod[1] = floor($dI); 
       //echo ' <br/> I ' .  $simulations_dI_80_mod[1];  
    }
          if($simul_iterative == 2){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_60;
       if($dI < 0){ $dI = -($dI);}      
       $simulations_dI_80_mod[2] = floor($dI); 
       //echo ' <br/> I ' .  $simulations_dI_80_mod[2];  
    }
          if($simul_iterative == 3){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_90;
       if($dI < 0){ $dI = -($dI);}  
       $simulations_dI_80_mod[3] = floor($dI); 
       //echo ' <br/> I ' .  $simulations_dI_80_mod[3];  
    }
          if($simul_iterative == 4){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S * $day_120;
       if($dI < 0){ $dI = -($dI);}  
       $simulations_dI_80_mod[4] = floor($dI);  
       //echo ' <br/> I ' .  $simulations_dI_80_mod[4];  
    }
}
   

/** dR compartment Simulations for R*/
  for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
          if($simul_iterative == 0){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_1 * $r + $day_1;
        if($dR < 0){ $dR = -($dR);}  
        $simulations_dR_80_mod[0] = floor($dR/1); 
        //echo ' <br/> R ' .  $simulations_dR_80_mod[0];  
    }
          if($simul_iterative == 1){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_30 * $r + $day_30;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_80_mod[1] = floor($dR); 
        //echo ' <br/> R ' .  $simulations_dR_80_mod[1];
                        
    }
          if($simul_iterative == 2){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_60 * $r + $day_60;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_80_mod[2] = floor($dR); 
        //echo ' <br/> R ' .  $simulations_dR_80_mod[2];
    }
          if($simul_iterative == 3){
       $dR = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_90 * $r + $day_90;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_80_mod[3] = floor($dR); 
        //echo ' <br/> R ' .  $simulations_dR_80_mod[3];
    } 
          if($simul_iterative == 4){
       $dR =$gamma * $E - $I * $r - $I * $d + $alpha3 * $T + $c1 * $S  * $day_120 * $r + $day_120;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR_80_mod[4] = floor($dR); 
        //echo ' <br/> R ' .  $simulations_dR_80_mod[4];
    } 
}

    
 
/** dD compartment Simulations for D*/        
  for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
        if($simul_iterative == 0){
       $dD = $I * $d *  $day_1;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_80_mod[0] = floor($dD); 
        //echo ' <br/> D ' .  $simulations_dD_80_mod[0];
    }
        if($simul_iterative == 1){
       $dD = $d * $I  * $day_30;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_80_mod[1] = floor($dD); 
        //echo ' <br/> D ' .  $simulations_dD_80_mod[1];  
    }
        if($simul_iterative == 2){
       $dD = $d * $I * $day_60;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_80_mod[2] = floor($dD); 
        //echo ' <br/> D ' .  $simulations_dD_80_mod[2];  
    }
        if($simul_iterative == 3){
       $dD = $d * $I * $day_90;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_80_mod[3] = floor($dD); 
        //echo ' <br/> D ' .  $simulations_dD_80_mod[3];  
    }
        if($simul_iterative == 4){
       $dD = $d * $I * $day_90;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD_80_mod[4] = floor($dD); 
        //echo ' <br/> D ' .  $simulations_dD_80_mod[4];  
    }
  }


/** dV compartment Simulations for V*/    
  for($simul_iterative = 0; $simul_iterative < 5; $simul_iterative++){ 
   
        if($simul_iterative == 0){
      $dV = ((80/100) * $T) * $day_1;
      if($dV < 0){ $dV = -($dV);}
      $simulations_dV_80_mod[0] = floor($dV); 
       //echo ' <br/> V ' .  $simulations_dV_80_mod[0];  
    }
        if($simul_iterative == 1){
       $dV = ((80/100) * $T) * $day_30;
       if($dV < 0){ $dV = -($dV);} 
       $simulations_dV_80_mod[1] = floor($dV);    
       //echo ' <br/> V ' .  $simulations_dV_80_mod[1];      
    }
        if($simul_iterative == 2){
      $dV = ((80/100) * $T) * $day_60;
      if($dV < 0){ $dV = -($dV);} 
      $simulations_dV_80_mod[2] = floor($dV); 
      //echo ' <br/> V ' .  $simulations_dV_80_mod[2];      
    }
         if($simul_iterative == 3){
      $dV = ((80/100) * $T) * $day_90;
      if($dV < 0){ $dV = -($dV);} 
      $simulations_dV_80_mod[3] = floor($dV); 
      //echo ' <br/> V ' .  $simulations_dV_80_mod[3];      
    }      
         if($simul_iterative == 4){
      $dV = ((80/100) * $T) * $day_120;
      if($dV < 0){ $dV = -($dV);} 
      $simulations_dV_80_mod[4] = floor($dV); 
      //echo ' <br/> V ' .  $simulations_dV_80_mod[4];      
    }      
 }
 
 //************************************************************************************************************************************************************
 // END OF 80% MODERATE RAIN SIMULATION
 //*************************************************************************************************************************************************************
 
 
 //************************************************************************************************************************************************************
 //     The Graph Renderer Code -  for displaying the statistical graph for High, Low, 80%, 98% and Moderate Rain etcetera
 //************************************************************************************************************************************************************

 /**
 function getGraph($context){
  if($context == "High Rain") {
    
    
  }
  
  if($context == "Low Rain") {
    
  
  
  }
  
  if($context == "80% High Rain") {
    
  
  
  }
  if($context == "80% Low Rain") {
    
  
  
  }
  if($context == "98% High Rain") {
    
  
  
  }
  if($context == "98% Low Rain") {
    
  
  
  }
  if($context == "Moderate Rain") {
    
      
  
  }
  if($context == "80% Moderate Rain") {
    
  
  
  }
  if($context == "98% Moderate Rain") {
    
  
  
  }
 
 
 
 }
    **/

    
 
  echo "<center><div id='chart_div' style='width:80%; height:450px; background-color:#ffffff; color:#009; border-style:solid; border-color:#009;'></div><br/><br/>";
  
  echo "<div id='chart_div2' style='width:80%; height:450px; background-color:#ffffff; color:#009; border-style:solid; border-color:#009;'></div><br/><br/>";   
  
    echo "<div id='chart_div3' style='width:80%; height:450px; background-color:#ffffff; color:#009; border-style:solid; border-color:#009;'></div><br/><br/>"; 
    echo "<div id='chart_div4' style='width:80%; height:450px; background-color:#ffffff; color:#009; border-style:solid; border-color:#009;'></div><br/><br/>"; 
    
      echo "<div id='chart_div5' style='width:80%; height:450px; background-color:#ffffff; color:#009; border-style:solid; border-color:#009;'></div><br/><br/>";   
      
        echo "<div id='chart_div6' style='width:80%; height:450px; background-color:#ffffff; color:#009; border-style:solid; border-color:#009;'></div><br/><br/>";  
        
          echo "<div id='chart_div7' style='width:80%; height:450px; background-color:#ffffff; color:#009; border-style:solid; border-color:#009;'></div><br/><br/>"; 
          
            echo "<div id='chart_div8' style='width:80%; height:450px; background-color:#ffffff; color:#009; border-style:solid; border-color:#009;'></div><br/><br/>";
              echo "<div id='chart_div9' style='width:80%; height:450px; background-color:#ffffff; color:#009; border-style:solid; border-color:#009;'></div><br/><br/>";        
 
 //*************************************************************************************************************************************************************
 //    End of the Function Module Section
 //**************************************************************************************************************************************************************

  
    for($j = 0; $j < strlen($simulations_dT_High); $j++)   {
     // echo ' ' . $simulations_dT_High[$j];
    }
  
  
 
 
 //} //Close the if at the top
 

 echo '<br/><br/>

 
<a href=https://www.plus2net.com/php_tutorial/chart-line-database.php></a>';
?>

<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
<script type='text/javascript'>

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      //google.charts.setOnLoadCallback(drawChart2);  
      
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
         //data.addColumn('string','uid'); 
        data.addColumn('number','timeindays');
    data.addColumn('number','T');
    data.addColumn('number','S');
    data.addColumn('number','E');
    data.addColumn('number','I');
    data.addColumn('number','R');
    data.addColumn('number','D');
    data.addColumn('number','V');
    
    var C_RACK =  <?php    
    
   //A multi-dimensional associative array for employee data.


 $compartment_data = array(
      'T' => array($simulations_dT_High),
      'S' => array($simulations_dS_High), 
      'V' => array($simulations_dV_High), 
      'E' => array($simulations_dE_High), 
      'I' => array($simulations_dI_High), 
      'R' => array($simulations_dR_High), 
      'D' => array($simulations_dD_High)
      );  
       
 
 //)
 

 
//Echo the output of the json_encode function.
echo json_encode($compartment_data); 

 ?> ;
    
    
  
   // for(i=0;i<5;i++)                                                          
//data.addRow([my_2d[i][0],parseInt(my_2d[i][1]),parseInt(my_2d[i][2]),parseInt(my_2d[i][3]),
//parseInt(my_2d[i][4]),parseInt(my_2d[i][5]),parseInt(my_2d[i][6]),parseInt(my_2d[i][7])]);


//data.addRows(C_RACK);


var data = google.visualization.arrayToDataTable([
  [ ' ', 'T', 'S','E', 'I','R', 'D','V'],  
  [' ', <?php echo $simulations_dT_High[0]?>,<?php echo $simulations_dS_High[0] ?>,<?php echo $simulations_dE_High[0] ?>,
  <?php echo $simulations_dI_High[0] ?>,<?php echo $simulations_dR_High[0] ?>, <?php echo $simulations_dD_High[0] ?>
  , <?php echo $simulations_dV_High[0] ?>],
  
  [' ', <?php echo $simulations_dT_High[1]?>,<?php echo $simulations_dS_High[1] ?>,<?php echo $simulations_dE_High[1] ?>,
  <?php echo $simulations_dI_High[1] ?>,<?php echo $simulations_dR_High[1] ?>, <?php echo $simulations_dD_High[1] ?>
  , <?php echo $simulations_dV_High[1] ?>],
  
  [' ', <?php echo $simulations_dT_High[2]?>,<?php echo $simulations_dS_High[2] ?>,<?php echo $simulations_dE_High[2] ?>,
  <?php echo $simulations_dI_High[2] ?>,<?php echo $simulations_dR_High[2] ?>, <?php echo $simulations_dD_High[2] ?>
  , <?php echo $simulations_dV_High[2] ?>],
  
  [' ', <?php echo $simulations_dT_High[3]?>,<?php echo $simulations_dS_High[3] ?>,<?php echo $simulations_dE_High[3] ?>,
  <?php echo $simulations_dI_High[3] ?>,<?php echo $simulations_dR_High[3] ?>, <?php echo $simulations_dD_High[3] ?>
  , <?php echo $simulations_dV_High[3] ?>],
  
 [' ', <?php echo $simulations_dT_High[4]?>,<?php echo $simulations_dS_High[4] ?>,<?php echo $simulations_dE_High[4] ?>,
  <?php echo $simulations_dI_High[4] ?>,<?php echo $simulations_dR_High[4] ?>, <?php echo $simulations_dD_High[4] ?>
  , <?php echo $simulations_dV_High[4] ?>]
  
  ]);

/**var data = google.visualization.arrayToDataTable([
  ['T', 'S','E', 'I','R', 'D','V'],
  [50,7],[60,8],[70,8],[80,9],[90,9],[100,9],
  [110,10],[120,11],[130,14],[140,14],[150,15]
  ]);  
    **/

const options = {
  title: 'Mathematical-based model for Malaria Predictions - High Rain',

  hAxis: {title: 'Time in Days'},
  vAxis: {title: 'Compartment Data'},
  legend: {position: 'right'}
};
      

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    
       }
    ///////////////////////////////
</script>
 
 
 <script type='text/javascript'>  
   // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart']});
      //google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart2);
      
      function drawChart2() {

        // Create the data table.
        var data = new google.visualization.DataTable();
      
 
  var data = google.visualization.arrayToDataTable([
  [ ' ', 'T', 'S','E', 'I','R', 'D','V'],  
  [' ', <?php echo $simulations_dT[0]?>,<?php echo $simulations_dS[0] ?>,<?php echo $simulations_dE[0] ?>,
  <?php echo $simulations_dI[0] ?>,<?php echo $simulations_dR[0] ?>, <?php echo $simulations_dD[0] ?>
  , <?php echo $simulations_dV[0] ?>],
  
  [' ', <?php echo $simulations_dT[1]?>,<?php echo $simulations_dS[1] ?>,<?php echo $simulations_dE[1] ?>,
  <?php echo $simulations_dI[1] ?>,<?php echo $simulations_dR[1] ?>, <?php echo $simulations_dD[1] ?>
  , <?php echo $simulations_dV[1] ?>],
  
  [' ', <?php echo $simulations_dT[2]?>,<?php echo $simulations_dS[2] ?>,<?php echo $simulations_dE[2] ?>,
  <?php echo $simulations_dI[2] ?>,<?php echo $simulations_dR[2] ?>, <?php echo $simulations_dD[2] ?>
  , <?php echo $simulations_dV[2] ?>],
  
  [' ', <?php echo $simulations_dT[3]?>,<?php echo $simulations_dS[3] ?>,<?php echo $simulations_dE[3] ?>,
  <?php echo $simulations_dI[3] ?>,<?php echo $simulations_dR[3] ?>, <?php echo $simulations_dD[3] ?>
  , <?php echo $simulations_dV[3] ?>],
  
 [' ', <?php echo $simulations_dT[4]?>,<?php echo $simulations_dS[4] ?>,<?php echo $simulations_dE[4] ?>,
  <?php echo $simulations_dI[4] ?>,<?php echo $simulations_dR[4] ?>, <?php echo $simulations_dD[4] ?>
  , <?php echo $simulations_dV[4] ?>]
  
  ]);



const options = {
  title: 'Mathematical-based model for Malaria Predictions - Low Rain',

  hAxis: {title: 'Time in Days' },
  vAxis: {title: 'Compartment Data'},
  legend: {position: 'right'}
};
      

        var chart = new google.visualization.LineChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
    
       }
    ///////////////////////////////
</script>

 <script type='text/javascript'>  
   // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart']});
      //google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart3);
      
      function drawChart3() {

        // Create the data table.
        var data = new google.visualization.DataTable();
      
 
  var data = google.visualization.arrayToDataTable([
  [ ' ', 'T', 'S','E', 'I','R', 'D','V'],  
  [' ', <?php echo $simulations_dT_80_low[0]?>,<?php echo $simulations_dS_80_low[0] ?>,<?php echo $simulations_dE_80_low[0] ?>,
  <?php echo $simulations_dI_80_low[0] ?>,<?php echo $simulations_dR_80_low[0] ?>, <?php echo $simulations_dD_80_low[0] ?>
  , <?php echo $simulations_dV_80_low[0] ?>],
  
  [' ', <?php echo $simulations_dT_80_low[1]?>,<?php echo $simulations_dS_80_low[1] ?>,<?php echo $simulations_dE_80_low[1] ?>,
  <?php echo $simulations_dI_80_low[1] ?>,<?php echo $simulations_dR_80_low[1] ?>, <?php echo $simulations_dD_80_low[1] ?>
  , <?php echo $simulations_dV_80_low[1] ?>],
  
  [' ', <?php echo $simulations_dT_80_low[2]?>,<?php echo $simulations_dS_80_low[2] ?>,<?php echo $simulations_dE_80_low[2] ?>,
  <?php echo $simulations_dI_80_low[2] ?>,<?php echo $simulations_dR_80_low[2] ?>, <?php echo $simulations_dD_80_low[2] ?>
  , <?php echo $simulations_dV_80_low[2] ?>],
  
  [' ', <?php echo $simulations_dT_80_low[3]?>,<?php echo $simulations_dS_80_low[3] ?>,<?php echo $simulations_dE_80_low[3] ?>,
  <?php echo $simulations_dI_80_low[3] ?>,<?php echo $simulations_dR_80_low[3] ?>, <?php echo $simulations_dD_80_low[3] ?>
  , <?php echo $simulations_dV_80_low[3] ?>],
  
 [' ', <?php echo $simulations_dT_80_low[4]?>,<?php echo $simulations_dS_80_low[4] ?>,<?php echo $simulations_dE_80_low[4] ?>,
  <?php echo $simulations_dI_80_low[4] ?>,<?php echo $simulations_dR_80_low[4] ?>, <?php echo $simulations_dD_80_low[4] ?>
  , <?php echo $simulations_dV_80_low[4] ?>]
  
  ]);



const options = {
  title: 'Mathematical-based model for Malaria Predictions - 80% Low Rain',

  hAxis: {title: 'Time in Days' },
  vAxis: {title: 'Compartment Data'},
  legend: {position: 'right'}
};
      

        var chart = new google.visualization.LineChart(document.getElementById('chart_div3'));
        chart.draw(data, options);
    
       }
    ///////////////////////////////
</script>


 <script type='text/javascript'>  
   // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart']});
      //google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart4);
      
      function drawChart4() {

        // Create the data table.
        var data = new google.visualization.DataTable();
      
 
  var data = google.visualization.arrayToDataTable([
  [ ' ', 'T', 'S','E', 'I','R', 'D','V'],  
  [' ', <?php echo $simulations_dT_80_low[0]?>,<?php echo $simulations_dS_80_low[0] ?>,<?php echo $simulations_dE_80_low[0] ?>,
  <?php echo $simulations_dI_80_low[0] ?>,<?php echo $simulations_dR_80_low[0] ?>, <?php echo $simulations_dD_80_low[0] ?>
  , <?php echo $simulations_dV_80_low[0] ?>],
  
  [' ', <?php echo $simulations_dT_80_low[1]?>,<?php echo $simulations_dS_80_low[1] ?>,<?php echo $simulations_dE_80_low[1] ?>,
  <?php echo $simulations_dI_80_low[1] ?>,<?php echo $simulations_dR_80_low[1] ?>, <?php echo $simulations_dD_80_low[1] ?>
  , <?php echo $simulations_dV_80_low[1] ?>],
  
  [' ', <?php echo $simulations_dT_80_low[2]?>,<?php echo $simulations_dS_80_low[2] ?>,<?php echo $simulations_dE_80_low[2] ?>,
  <?php echo $simulations_dI_80_low[2] ?>,<?php echo $simulations_dR_80_low[2] ?>, <?php echo $simulations_dD_80_low[2] ?>
  , <?php echo $simulations_dV_80_low[2] ?>],
  
  [' ', <?php echo $simulations_dT_80_low[3]?>,<?php echo $simulations_dS_80_low[3] ?>,<?php echo $simulations_dE_80_low[3] ?>,
  <?php echo $simulations_dI_80_low[3] ?>,<?php echo $simulations_dR_80_low[3] ?>, <?php echo $simulations_dD_80_low[3] ?>
  , <?php echo $simulations_dV_80_low[3] ?>],
  
 [' ', <?php echo $simulations_dT_80_low[4]?>,<?php echo $simulations_dS_80_low[4] ?>,<?php echo $simulations_dE_80_low[4] ?>,
  <?php echo $simulations_dI_80_low[4] ?>,<?php echo $simulations_dR_80_low[4] ?>, <?php echo $simulations_dD_80_low[4] ?>
  , <?php echo $simulations_dV_80_low[4] ?>]
  
  ]);



const options = {
  title: 'Mathematical-based model for Malaria Predictions - 80% High Rain',

  hAxis: {title: 'Time in Days' },
  vAxis: {title: 'Compartment Data'},
  legend: {position: 'right'}
};
      

        var chart = new google.visualization.LineChart(document.getElementById('chart_div4'));
        chart.draw(data, options);
    
       }
    ///////////////////////////////
</script>
 
 
 
 <script type='text/javascript'>  
   // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart']});
      //google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart5);
      
      function drawChart5() {

        // Create the data table.
        var data = new google.visualization.DataTable();
      
 
  var data = google.visualization.arrayToDataTable([
  [ ' ', 'T', 'S','E', 'I','R', 'D','V'],  
  [' ', <?php echo $simulations_dT_High98[0]?>,<?php echo $simulations_dS_High98[0] ?>,<?php echo $simulations_dE_High98[0] ?>,
  <?php echo $simulations_dI_High98[0] ?>,<?php echo $simulations_dR_High98[0] ?>, <?php echo $simulations_dD_High98[0] ?>
  , <?php echo $simulations_dV_High98[0] ?>],
  
  [' ', <?php echo $simulations_dT_High98[1]?>,<?php echo $simulations_dS_High98[1] ?>,<?php echo $simulations_dE_High98[1] ?>,
  <?php echo $simulations_dI_High98[1] ?>,<?php echo $simulations_dR_High98[1] ?>, <?php echo $simulations_dD_High98[1] ?>
  , <?php echo $simulations_dV_High98[1] ?>],
  
  [' ', <?php echo $simulations_dT_High98[2]?>,<?php echo $simulations_dS_High98[2] ?>,<?php echo $simulations_dE_High98[2] ?>,
  <?php echo $simulations_dI_High98[2] ?>,<?php echo $simulations_dR_High98[2] ?>, <?php echo $simulations_dD_High98[2] ?>
  , <?php echo $simulations_dV_High98[2] ?>],
  
  [' ', <?php echo $simulations_dT_High98[3]?>,<?php echo $simulations_dS_High98[3] ?>,<?php echo $simulations_dE_High98[3] ?>,
  <?php echo $simulations_dI_High98[3] ?>,<?php echo $simulations_dR_High98[3] ?>, <?php echo $simulations_dD_High98[3] ?>
  , <?php echo $simulations_dV_High98[3] ?>],
  
 [' ', <?php echo $simulations_dT_High98[4]?>,<?php echo $simulations_dS_High98[4] ?>,<?php echo $simulations_dE_High98[4] ?>,
  <?php echo $simulations_dI_High98[4] ?>,<?php echo $simulations_dR_High98[4] ?>, <?php echo $simulations_dD_High98[4] ?>
  , <?php echo $simulations_dV_High98[4] ?>]
  
  ]);



const options = {
  title: 'Mathematical-based model for Malaria Predictions - 98% High Rain',

  hAxis: {title: 'Time in Days' },
  vAxis: {title: 'Compartment Data'},
  legend: {position: 'right'}
};
      

        var chart = new google.visualization.LineChart(document.getElementById('chart_div5'));
        chart.draw(data, options);
    
       }
    ///////////////////////////////
</script>
 
 
 <script type='text/javascript'>  
   // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart']});
      //google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart6);
      
      function drawChart6() {

        // Create the data table.
        var data = new google.visualization.DataTable();
      
 
  var data = google.visualization.arrayToDataTable([
  [ ' ', 'T', 'S','E', 'I','R', 'D','V'],  
  [' ', <?php echo $simulations_dT_98_low[0]?>,<?php echo $simulations_dS_98_low[0] ?>,<?php echo $simulations_dE_98_low[0] ?>,
  <?php echo $simulations_dI_98_low[0] ?>,<?php echo $simulations_dR_98_low[0] ?>, <?php echo $simulations_dD_98_low[0] ?>
  , <?php echo $simulations_dV_98_low[0] ?>],
  
  [' ', <?php echo $simulations_dT_98_low[1]?>,<?php echo $simulations_dS_98_low[1] ?>,<?php echo $simulations_dE_98_low[1] ?>,
  <?php echo $simulations_dI_98_low[1] ?>,<?php echo $simulations_dR_98_low[1] ?>, <?php echo $simulations_dD_98_low[1] ?>
  , <?php echo $simulations_dV_98_low[1] ?>],
  
  [' ', <?php echo $simulations_dT_98_low[2]?>,<?php echo $simulations_dS_98_low[2] ?>,<?php echo $simulations_dE_98_low[2] ?>,
  <?php echo $simulations_dI_98_low[2] ?>,<?php echo $simulations_dR_98_low[2] ?>, <?php echo $simulations_dD_98_low[2] ?>
  , <?php echo $simulations_dV_98_low[2] ?>],
  
  [' ', <?php echo $simulations_dT_98_low[3]?>,<?php echo $simulations_dS_98_low[3] ?>,<?php echo $simulations_dE_98_low[3] ?>,
  <?php echo $simulations_dI_98_low[3] ?>,<?php echo $simulations_dR_98_low[3] ?>, <?php echo $simulations_dD_98_low[3] ?>
  , <?php echo $simulations_dV_98_low[3] ?>],
  
 [' ', <?php echo $simulations_dT_98_low[4]?>,<?php echo $simulations_dS_98_low[4] ?>,<?php echo $simulations_dE_98_low[4] ?>,
  <?php echo $simulations_dI_98_low[4] ?>,<?php echo $simulations_dR_98_low[4] ?>, <?php echo $simulations_dD_98_low[4] ?>
  , <?php echo $simulations_dV_98_low[4] ?>]
  
  ]);



const options = {
  title: 'Mathematical-based model for Malaria Predictions - 98% Low Rain',

  hAxis: {title: 'Time in Days' },
  vAxis: {title: 'Compartment Data'},
  legend: {position: 'right'}
};
      

        var chart = new google.visualization.LineChart(document.getElementById('chart_div6'));
        chart.draw(data, options);
    
       }
    ///////////////////////////////
</script>



 <script type='text/javascript'>  
   // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart']});
      //google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart7);
      
      function drawChart7() {

        // Create the data table.
        var data = new google.visualization.DataTable();
      
 
  var data = google.visualization.arrayToDataTable([
  [ ' ', 'T', 'S','E', 'I','R', 'D','V'],  
  [' ', <?php echo $simulations_dT_98_mod[0]?>,<?php echo $simulations_dS_98_mod[0] ?>,<?php echo $simulations_dE_98_mod[0] ?>,
  <?php echo $simulations_dI_98_mod[0] ?>,<?php echo $simulations_dR_98_mod[0] ?>, <?php echo $simulations_dD_98_mod[0] ?>
  , <?php echo $simulations_dV_98_mod[0] ?>],
  
  [' ', <?php echo $simulations_dT_98_mod[1]?>,<?php echo $simulations_dS_98_mod[1] ?>,<?php echo $simulations_dE_98_mod[1] ?>,
  <?php echo $simulations_dI_98_mod[1] ?>,<?php echo $simulations_dR_98_mod[1] ?>, <?php echo $simulations_dD_98_mod[1] ?>
  , <?php echo $simulations_dV_98_mod[1] ?>],
  
  [' ', <?php echo $simulations_dT_98_mod[2]?>,<?php echo $simulations_dS_98_mod[2] ?>,<?php echo $simulations_dE_98_mod[2] ?>,
  <?php echo $simulations_dI_98_mod[2] ?>,<?php echo $simulations_dR_98_mod[2] ?>, <?php echo $simulations_dD_98_mod[2] ?>
  , <?php echo $simulations_dV_98_mod[2] ?>],
  
  [' ', <?php echo $simulations_dT_98_mod[3]?>,<?php echo $simulations_dS_98_mod[3] ?>,<?php echo $simulations_dE_98_mod[3] ?>,
  <?php echo $simulations_dI_98_mod[3] ?>,<?php echo $simulations_dR_98_mod[3] ?>, <?php echo $simulations_dD_98_mod[3] ?>
  , <?php echo $simulations_dV_98_mod[3] ?>],
  
 [' ', <?php echo $simulations_dT_98_mod[4]?>,<?php echo $simulations_dS_98_mod[4] ?>,<?php echo $simulations_dE_98_mod[4] ?>,
  <?php echo $simulations_dI_98_mod[4] ?>,<?php echo $simulations_dR_98_mod[4] ?>, <?php echo $simulations_dD_98_mod[4] ?>
  , <?php echo $simulations_dV_98_mod[4] ?>]
  
  ]);



const options = {
  title: 'Mathematical-based model for Malaria Predictions - 98% Moderate Rain',

  hAxis: {title: 'Time in Days' },
  vAxis: {title: 'Compartment Data'},
  legend: {position: 'right'}
};
      

        var chart = new google.visualization.LineChart(document.getElementById('chart_div7'));
        chart.draw(data, options);
    
       }
    ///////////////////////////////
</script>



 <script type='text/javascript'>  
   // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart']});
      //google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart8);
      
      function drawChart8() {

        // Create the data table.
        var data = new google.visualization.DataTable();
      
 
  var data = google.visualization.arrayToDataTable([
  [ ' ', 'T', 'S','E', 'I','R', 'D','V'],  
  [' ', <?php echo $simulations_dT_80_mod[0]?>,<?php echo $simulations_dS_80_mod[0] ?>,<?php echo $simulations_dE_80_mod[0] ?>,
  <?php echo $simulations_dI_80_mod[0] ?>,<?php echo $simulations_dR_80_mod[0] ?>, <?php echo $simulations_dD_80_mod[0] ?>
  , <?php echo $simulations_dV_80_mod[0] ?>],
  
  [' ', <?php echo $simulations_dT_80_mod[1]?>,<?php echo $simulations_dS_80_mod[1] ?>,<?php echo $simulations_dE_80_mod[1] ?>,
  <?php echo $simulations_dI_80_mod[1] ?>,<?php echo $simulations_dR_80_mod[1] ?>, <?php echo $simulations_dD_80_mod[1] ?>
  , <?php echo $simulations_dV_80_mod[1] ?>],
  
  [' ', <?php echo $simulations_dT_80_mod[2]?>,<?php echo $simulations_dS_80_mod[2] ?>,<?php echo $simulations_dE_80_mod[2] ?>,
  <?php echo $simulations_dI_80_mod[2] ?>,<?php echo $simulations_dR_80_mod[2] ?>, <?php echo $simulations_dD_80_mod[2] ?>
  , <?php echo $simulations_dV_80_mod[2] ?>],
  
  [' ', <?php echo $simulations_dT_80_mod[3]?>,<?php echo $simulations_dS_80_mod[3] ?>,<?php echo $simulations_dE_80_mod[3] ?>,
  <?php echo $simulations_dI_80_mod[3] ?>,<?php echo $simulations_dR_80_mod[3] ?>, <?php echo $simulations_dD_80_mod[3] ?>
  , <?php echo $simulations_dV_80_mod[3] ?>],
  
 [' ', <?php echo $simulations_dT_80_mod[4]?>,<?php echo $simulations_dS_80_mod[4] ?>,<?php echo $simulations_dE_80_mod[4] ?>,
  <?php echo $simulations_dI_80_mod[4] ?>,<?php echo $simulations_dR_80_mod[4] ?>, <?php echo $simulations_dD_80_mod[4] ?>
  , <?php echo $simulations_dV_80_mod[4] ?>]
  
  ]);



const options = {
  title: 'Mathematical-based model for Malaria Predictions - 80% Moderate Rain',

  hAxis: {title: 'Time in Days' },
  vAxis: {title: 'Compartment Data'},
  legend: {position: 'right'}
};
      

        var chart = new google.visualization.LineChart(document.getElementById('chart_div8'));
        chart.draw(data, options);
    
       }
    ///////////////////////////////
</script>


 <script type='text/javascript'>  
   // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart']});
      //google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart9);
      
      function drawChart9() {

        // Create the data table.
        var data = new google.visualization.DataTable();
      
 
  var data = google.visualization.arrayToDataTable([
  [ ' ', 'T', 'S','E', 'I','R', 'D','V'],  
  [' ', <?php echo $simulations_dT_mod[0]?>,<?php echo $simulations_dS_mod[0] ?>,<?php echo $simulations_dE_mod[0] ?>,
  <?php echo $simulations_dI_mod[0] ?>,<?php echo $simulations_dR_mod[0] ?>, <?php echo $simulations_dD_mod[0] ?>
  , <?php echo $simulations_dV_mod[0] ?>],
  
  [' ', <?php echo $simulations_dT_mod[1]?>,<?php echo $simulations_dS_mod[1] ?>,<?php echo $simulations_dE_mod[1] ?>,
  <?php echo $simulations_dI_mod[1] ?>,<?php echo $simulations_dR_mod[1] ?>, <?php echo $simulations_dD_mod[1] ?>
  , <?php echo $simulations_dV_mod[1] ?>],
  
  [' ', <?php echo $simulations_dT_mod[2]?>,<?php echo $simulations_dS_mod[2] ?>,<?php echo $simulations_dE_mod[2] ?>,
  <?php echo $simulations_dI_mod[2] ?>,<?php echo $simulations_dR_mod[2] ?>, <?php echo $simulations_dD_mod[2] ?>
  , <?php echo $simulations_dV_mod[2] ?>],
  
  [' ', <?php echo $simulations_dT_mod[3]?>,<?php echo $simulations_dS_mod[3] ?>,<?php echo $simulations_dE_mod[3] ?>,
  <?php echo $simulations_dI_mod[3] ?>,<?php echo $simulations_dR_mod[3] ?>, <?php echo $simulations_dD_mod[3] ?>
  , <?php echo $simulations_dV_mod[3] ?>],
  
 [' ', <?php echo $simulations_dT_mod[4]?>,<?php echo $simulations_dS_mod[4] ?>,<?php echo $simulations_dE_mod[4] ?>,
  <?php echo $simulations_dI_mod[4] ?>,<?php echo $simulations_dR_mod[4] ?>, <?php echo $simulations_dD_mod[4] ?>
  , <?php echo $simulations_dV_mod[4] ?>]
  
  ]);



const options = {
  title: 'Mathematical-based model for Malaria Predictions -  Moderate Rain',

  hAxis: {title: 'Time in Days' },
  vAxis: {title: 'Compartment Data'},
  legend: {position: 'right'}
};
      

        var chart = new google.visualization.LineChart(document.getElementById('chart_div9'));
        chart.draw(data, options);
    
       }
    ///////////////////////////////
</script>
 
 
<?php
  
 echo "</center></body>
</html>";
?>


 
