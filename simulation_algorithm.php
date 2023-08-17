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
 //**************************This code file shows the algorithm for the Malaria Prediction App  using Low Rain as example]*********************************
 //*****************************************************************************************************************************

 //Uncomment the next if statement block if you want to get the Inputs via the web form
if(isset($_POST['cnn'])){
/** 
  * This particular variable is used for the controlled simulation system
*/
	$compartment_limiter = 9;
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
    $simulations_dA = array();
    $simulations_dB = array();
    $T  = $_POST['travellers']; //This is where we take the number of Travellers  e.g. 70000;
	$S = $_POST['susceptible']; //This is where we take the number of Susceptible  e.g. 5000;
	$V = $_POST['vigilant']; //This is where we take the number of  the Vigilant Humans  e.g. 55000;
	$E = $_POST['exposed']; //This is where we take the number of the Exposed Humans  e.g. 10000;
    $VL = $_POST['vigilant1']; //This is where we take the number of the Vigilant Humans that use LLIN  e.g. 10000;
    $VI = $_POST['vigilant2']; //This is where we take the number of the Vigilant Humans that use IRS  e.g. 10000;
    $VT= $_POST['vigilant3']; //This is where we take the number of the Vigilant Humans that use traditionl malaria control strategies  e.g. 10000;
/**
  * Seeding and initializing the data for states I, D, R [Infected, Death, Recovered], A (Susceptible mosquitoes) & B (Infected mosquitoes) to zero.
  * These values change dynamically as the simulation begins 
*/
	$I = 0;
	$D = 0;
	$R = 0;
    $A = 0;
    $B = 0;
	
	//echo $T. ' - ' . $S . ' - ' . $V . ' - ' . $E . ' - ' . $I . ' - ' . $D . ' - ' . $R; ' - ' . $A; ' - ' . $B;
	
/** Here are the parameters for controlling the ODE Modelling Process and Simulations*/

$gamma = 1; $alpha1 = 0.965; $alpha2 = 0.03; $alpha3 = 0; $c1 = 0.0044; $c2 = 0.0044; $c3 = 0.0044; $r1 = 0.320; $r2 = 0.1577; $r3 = 0.099;
$r4 = 1.7326; $r = 0.99977; $d = 0.00023;$beta1 = 0.01; $beta2 = 0.01; $mu1 = 850;$mu2 = 3500; 

$timefactor = array(1,15,30,45, 60,75, 90,105,120); //This is the data structure storing the time in days in sequence
$params = array('T','S','E','I','R','D','V','A','B'); // This is the data structure storing the compartments in sequence


/**
* Defining a dynamic algorithm for getting time in days

**/
$day_1 = (1/365);   echo $day_1 . '<br/>';
$day_15 = (15/365);   echo $day_1 . '<br/>';
$day_30 = (30/365);   echo $day_30 . '<br/>';
$day_45 = (45/365);   echo $day_45 . '<br/>';
$day_60 = (60/365);    echo $day_60 . '<br/>';
$day_75 = (75/365);   echo $day_75 . '<br/>';
$day_90 = (90/365);     echo $day_90 . '<br/>';
$day_105 = (105/365);   echo $day_105 . '<br/>';
$day_120 = (120/365);    echo $day_120 . '<br/>';


/**This is the Ordinary Differential Equation (ODE) Solver Code Dynamics
**************This is where the dynamic Simulation is done*****************************
*/

/** dT compartment Simulations for T*/
   for($simul_iterative = 0; $simul_iterative < 9; $simul_iterative++){ 
   
	if($simul_iterative == 0){
	   $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_1;   //echo ' T ' . $dT;
        if($dT < 0){ $dT = -($dT);}
	   $simulations_dT[0] = floor($dT/1);  //storing the simulated data in the appropriate data rack
       }
    if($simul_iterative == 1){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_15;
       if($dT < 0){ $dT = -($dT);}
       $simulations_dT[1] = floor($dT/15); //storing the simulated data in the appropriate data rack
       
    }
       
	}
	if($simul_iterative == 2){
	   $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_30;
       if($dT < 0){ $dT = -($dT);}
	   $simulations_dT[2] = floor($dT/30); //storing the simulated data in the appropriate data rack
       
	}
	if($simul_iterative == 3){
	   $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_45;
        if($dT < 0){ $dT = -($dT);}
	   $simulations_dT[3] = floor($dT/45); //storing the simulated data in the appropriate data rack
          
	} 
    if($simul_iterative == 4){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_60;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT[4] = floor($dT/60); //storing the simulated data in the appropriate data rack
          
    }
    
    if($simul_iterative == 5){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_75;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT[5] = floor($dT/75); //storing the simulated data in the appropriate data rack 
    }
	if($simul_iterative == 6){
	   $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_90;
        if($dT < 0){ $dT = -($dT);}
	   $simulations_dT[6] = floor($dT/90); //storing the simulated data in the appropriate data rack 
    }
    
    if($simul_iterative == 7){
       $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_105;
        if($dT < 0){ $dT = -($dT);}
       $simulations_dT[7] = floor($dT/105); //storing the simulated data in the appropriate data rack 
             
    }
	if($simul_iterative == 8){
	   $dT = -$alpha1 * $T - $alpha2 * $T - $alpha3 * $T * $day_120;
        if($dT < 0){ $dT = -($dT);}
	   $simulations_dT[8] = floor($dT/120/($dT/120)); //storing the simulated data in the appropriate data rack
         
	}
  
 
/** dS compartment Simulations for S*/
     for($simul_iterative = 0; $simul_iterative < 9; $simul_iterative++){ 
   
	if($simul_iterative == 0){
	  $dS = -$r1 * $S - $r2 * $S - $r3 * $S - $c1* SB + $r4 * $V * $day_1;
       if($dS < 0){ $dS = -($dS);}
	  $simulations_dS[0] = floor($dS); 
    }
    if($simul_iterative == 1){
      $dS = -$r1 * $S - $r2 * $S - $r3 * $S - $c1* SB + $r4 * $V * $day_15;
       if($dS < 0){ $dS = -($dS);}
      $simulations_dS[1] = floor($dS); 
    }
	if($simul_iterative == 2){
      $dS = -$r1 * $S - $r2 * $S - $r3 * $S - $c1* SB + $r4 * $V * $day_30;
       if($dS < 0){ $dS = -($dS);}
      $simulations_dS[2] = floor($dS); 
    }
     if($simul_iterative == 3){
      $dS = -$r1 * $S - $r2 * $S - $r3 * $S - $c1* SB + $r4 * $V * $day_45;
       if($dS < 0){ $dS = -($dS);}
      $simulations_dS[3] = floor($dS); 
    }
    }
	if($simul_iterative == 4){
	   $dS = -$r1 * $S - $r2 * $S - $r3 * $S - $c1* SB + $r4 * $V * $day_60;
       if($dS < 0){ $dS = -($dS);}
      $simulations_dS[4] = floor($dS); 
    }	
    if($simul_iterative == 5){
      $dS = -$r1 * $S - $r2 * $S - $r3 * $S - $c1* SB + $r4 * $V * $day_75;
       if($dS < 0){ $dS = -($dS);}
      $simulations_dS[5] = floor($dS); 
    }
    if($simul_iterative == 6){
      $dS = -$r1 * $S - $r2 * $S - $r3 * $S - $c1* SB + $r4 * $V * $day_90;
       if($dS < 0){ $dS = -($dS);}
      $simulations_dS[6] = floor($dS); 
    }  
	if($simul_iterative == 7){
      $dS = -$r1 * $S - $r2 * $S - $r3 * $S - $c1* SB + $r4 * $V * $day_105;
       if($dS < 0){ $dS = -($dS);}
      $simulations_dS[7] = floor($dS); 
    }
    if($simul_iterative == 8){
       $dS = -$r1 * $S - $r2 * $S - $r3 * $S - $c1* SB + $r4 * $V * $day_120;
       if($dS < 0){ $dS = -($dS);}
      $simulations_dS[8] = floor($dS); 
    }
      }
		
/** dE compartment Simulations for E*/		
for($simul_iterative = 0; $simul_iterative < 9; $simul_iterative++){ 
   
	if($simul_iterative == 0){
	   $dE = $c1 * $S * $B   + $alpha2 * $T - $gamma * $E * $day_1;
       if($dE < 0){ $dE = -($dE);} 
	   $simulations_dE[0] = floor($dE); 
       
	}
    if($simul_iterative == 1){
       $dE = $c1 * $S * $N   + $alpha2 * $T - $gamma * $E * $day_15;
       if($dE < 0){ $dE = -($dE);} 
       $simulations_dE[1] = floor($dE); 
     }
      if($simul_iterative == 2){
       $dE = $c1 * $S * $B   + $alpha2 * $T - $gamma * $E * $day_30;
       if($dE < 0){ $dE = -($dE);} 
       $simulations_dE[2] = floor($dE); 
       
    }
    if($simul_iterative == 3){
       $dE = $c1 * $S * $B   + $alpha2 * $T - $gamma * $E * $day_45;
       if($dE < 0){ $dE = -($dE);} 
       $simulations_dE[3] = floor($dE); 
       
    }
    if($simul_iterative == 4){
       $dE = $c1 * $S * $B   + $alpha2 * $T - $gamma * $E * $day_60;
       if($dE < 0){ $dE = -($dE);} 
       $simulations_dE[4] = floor($dE); 
       
    }
	if($simul_iterative == 5){
	   $dE = $c2 * $B  + $alpha2 * $T - $gamma * $E * $day_75;
       if($dE < 0){ $dE = -($dE);}   
	   $simulations_dE[5] = floor($dE); 
       
	}
	if($simul_iterative == 6){
	   $dE = $c2 * $B  + $alpha2 * $T - $gamma * $E * $day_90;	
       if($dE < 0){ $dE = -($dE);}   
	   $simulations_dE[6] = floor($dE); 
         
	}
	if($simul_iterative == 7){
	   $dE = $c2 * $B  + $alpha2 * $T - $gamma * $E * $day_105;
       if($dE < 0){ $dE = -($dE);}   
	   $simulations_dE[7] = floor($dE); 
          
	}
	if($simul_iterative == 8){
	   $dE = $c2 * $B  + $alpha2 * $T - $gamma * $E * $day_120;
       if($dE < 0){ $dE = -($dE);}   
	   $simulations_dE[8] = floor($dE); 
         
	}
	
}

/** dI compartment Simulations for I*/
for($simul_iterative = 0; $simul_iterative < 9; $simul_iterative++){ 
   
          if($simul_iterative == 0){
	  $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T * $day_1;
      if($dI < 0){ $dI = -($dI);}
	   $simulations_dI[0] = floor($dI); 
           
	}
          if($simul_iterative == 1){
	  $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T  * $day_15;
       if($dI < 0){ $dI = -($dI);}  
	   $simulations_dI[1] = floor($dI); 
       
	}
          if($simul_iterative == 2){
	  $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T * $day_30;
       if($dI < 0){ $dI = -($dI);}  	
	   $simulations_dI[2] = floor($dI); 
       
	}
          if($simul_iterative == 3){
	  $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T * $day_45;
       if($dI < 0){ $dI = -($dI);}  
	   $simulations_dI[3] = floor($dI); 
        
	}
          if($simul_iterative == 4){
	  $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T  * $day_60;
       if($dI < 0){ $dI = -($dI);}  
	   $simulations_dI[4] = floor($dI);  
        
	}
        if($simul_iterative == 5){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T  * $day_75;
       if($dI < 0){ $dI = -($dI);}  
       $simulations_dI[5] = floor($dI);  
     }
      if($simul_iterative == 6){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T  * $day_90;
       if($dI < 0){ $dI = -($dI);}  
       $simulations_dI[6] = floor($dI);  
      }
      if($simul_iterative == 7){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T  * $day_105;
       if($dI < 0){ $dI = -($dI);}  
       $simulations_dI[7] = floor($dI);  
     }
      if($simul_iterative == 8){
      $dI = $gamma * $E - $I * $r - $I * $d + $alpha3 * $T  * $day_120;
       if($dI < 0){ $dI = -($dI);}  
       $simulations_dI[8] = floor($dI);  
        
    }
}
   

/** dR compartment Simulations for R*/
  for($simul_iterative = 0; $simul_iterative < 9; $simul_iterative++){ 
   
          if($simul_iterative == 0){
	   $dR = $I * $r  * $day_1;
        if($dR < 0){ $dR = -($dR);}  
	    $simulations_dR[0] = floor($dR/1); 
         
	}
          if($simul_iterative == 1){
	   $dR = $I * $r * $day_15; 
       if($dR < 0){ $dR = -($dR);}
	   $simulations_dR[1] = floor($dR); 
        
                        
	}
          if($simul_iterative == 2){
	   $dR = $I * $r * $day_30;
       if($dR < 0){ $dR = -($dR);}
	   $simulations_dR[2] = floor($dR); 
        
	}
          if($simul_iterative == 3){
	   $dR =  $I * $r  * $day_45;
       if($dR < 0){ $dR = -($dR);}
	   $simulations_dR[3] = floor($dR); 
        
	} 
          if($simul_iterative == 4){
	   $dR = $I * $r  * $day_60;
       if($dR < 0){ $dR = -($dR);}
	   $simulations_dR[4] = floor($dR); 
        
	} 
}       if($simul_iterative == 5){
       $dR = $I * $r  * $day_75;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR[5] = floor($dR); 
        
    } 
       if($simul_iterative == 6){
       $dR = $I * $r  * $day_90;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR[6] = floor($dR); 
    } 
        if($simul_iterative == 7){
       $dR = $I * $r  * $day_105;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR[7] = floor($dR); 
    } 
        if($simul_iterative == 8){
       $dR = $I * $r  * $day_120;
       if($dR < 0){ $dR = -($dR);}
       $simulations_dR[8] = floor($dR); 
        
    } 
               /** dD compartment Simulations for D*/        
  for($simul_iterative = 0; $simul_iterative < 9; $simul_iterative++){ 
   
        if($simul_iterative == 0){
	   $dD = $I * $d *  $day_1;
       if($dD < 0){ $dD = -($dD);}
	   $simulations_dD[0] = floor($dD); 
        
	}
        if($simul_iterative == 1){
	   $dD = $d * $I  * $day_15;
       if($dD < 0){ $dD = -($dD);}
	   $simulations_dD[1] = floor($dD); 
        
	}
    if($simul_iterative == 2){
       $dD = $d * $I  * $day_30;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD[2] = floor($dD); 
        
    }
    if($simul_iterative == 3){
       $dD = $d * $I  * $day_45;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD[3] = floor($dD); 
        
    }
    if($simul_iterative == 4){
       $dD = $d * $I  * $day_60;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD[4] = floor($dD); 
        
    }
        if($simul_iterative == 5){
	   $dD = $d * $I * $day_75;
       if($dD < 0){ $dD = -($dD);}
	   $simulations_dD[5] = floor($dD); 
          
	}
        if($simul_iterative == 6){
	   $dD = $d * $I * $day_90;
       if($dD < 0){ $dD = -($dD);}
	   $simulations_dD[6] = floor($dD); 
        
	}
    
        if($simul_iterative == 7){
       $dD = $d * $I * $day_105;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD[7] = floor($dD); 
          
    }
        if($simul_iterative == 8){
       $dD = $d * $I * $day_120;
       if($dD < 0){ $dD = -($dD);}
       $simulations_dD[8] = floor($dD); 
          
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
	   $dV = $r1 * $S + $r2 * $S + $r3 * $S - $r4 * $V * $day_15;
       if($dV < 0){ $dV = -($dV);} 
	   $simulations_dV[1] = floor($dV);    
         
	}
    
        if($simul_iterative == 2){
       $dV = $r1 * $S + $r2 * $S + $r3 * $S - $r4 * $V * $day_30;
       if($dV < 0){ $dV = -($dV);} 
       $simulations_dV[2] = floor($dV);    
         
    }
        if($simul_iterative == 3){
	  $dV = $r1 * $S + $r2 * $S + $r3 * $S - $r4 * $V * $day_45;
      if($dV < 0){ $dV = -($dV);} 
	  $simulations_dV[3] = floor($dV); 
          
	}
         if($simul_iterative == 4){
	  $dV = $r1 * $S + $r2 * $S + $r3 * $S - $r4 * $V * $day_60;
      if($dV < 0){ $dV = -($dV);} 
	  $simulations_dV[4] = floor($dV); 
           
	}      
         if($simul_iterative == 5){
	  $dV = $r1 * $S + $r2 * $S + $r3 * $S - $r4 * $V * $day_75;
      if($dV < 0){ $dV = -($dV);} 
	  $simulations_dV[5] = floor($dV); 
          
	}  
    
        if($simul_iterative == 6){
       $dV = $r1 * $S + $r2 * $S + $r3 * $S - $r4 * $V * $day_90;
       if($dV < 0){ $dV = -($dV);} 
       $simulations_dV[6] = floor($dV);    
         
    }
    
        if($simul_iterative == 7){
       $dV = $r1 * $S + $r2 * $S + $r3 * $S - $r4 * $V * $day_105;
       if($dV < 0){ $dV = -($dV);} 
       $simulations_dV[7] = floor($dV);    
         
    }  
    
        if($simul_iterative == 8){
       $dV = $r1 * $S + $r2 * $S + $r3 * $S - $r4 * $V * $day_120;
       if($dV < 0){ $dV = -($dV);} 
       $simulations_dV[8] = floor($dV);    
         
    }  
 }
 //////....Iteration at low rain for Compartment A as an example/////
 for($simul_iterative = 0; $simul_iterative < 9; $simul_iterative++){ 
   
    if($simul_iterative == 0){
       $dA = $mu1  - $beta1 * $A - $c2 * $A* $E - $c3 * $A *$I * $day_1;   
        if($dA < 0){ $dA = -($dA);}
       $dA[0] = floor($dA/1);  //storing the simulated data in the appropriate data rack
       
    }   
     if($simul_iterative == 1){
       $dA = $mu1  - $beta1 * $A - $c2 * $A* $E - $c3 * $A *$I * $day_15;  
        if($dA < 0){ $dA = -($dA);}
       $dA[1] = floor($dA/15);  //storing the simulated data in the appropriate data rack
       
    }  
    if($simul_iterative == 2){
       $dA = $mu1  - $beta1 * $A - $c2 * $A* $E - $c3 * $A *$I * $day_30;   
        if($dA < 0){ $dA = -($dA);}
       $dA[2] = floor($dA/30);  //storing the simulated data in the appropriate data rack
       
    }    
      if($simul_iterative == 3){
       $dA = $mu1  - $beta1 * $A - $c2 * $A* $E - $c3 * $A *$I * $day_45;   
        if($dA < 0){ $dA = -($dA);}
       $dA[3] = floor($dA/45);  //storing the simulated data in the appropriate data rack
       
    } 
     if($simul_iterative == 4){
       $dA = $mu1  - $beta1 * $A - $c2 * $A* $E - $c3 * $A *$I * $day_60;   
        if($dA < 0){ $dA = -($dA);}
       $dA[4] = floor($dA/60);  //storing the simulated data in the appropriate data rack
       
    }   
     if($simul_iterative == 5){
       $dA = $mu1  - $beta1 * $A - $c2 * $A* $E - $c3 * $A *$I * $day_75;   
        if($dA < 0){ $dA = -($dA);}
       $dA[5] = floor($dA/75);  //storing the simulated data in the appropriate data rack
       
    }
     if($simul_iterative == 6){
       $dA = $mu1  - $beta1 * $A - $c2 * $A* $E - $c3 * $A *$I * $day_90;   
        if($dA < 0){ $dA = -($dA);}
       $dA[6] = floor($dA/90;  //storing the simulated data in the appropriate data rack
       
    }
     if($simul_iterative == 7){
       $dA = $mu1  - $beta1 * $A - $c2 * $A* $E- $c3 * $A *$I * $day_105;   
        if($dA < 0){ $dA = -($dA);}
       $dA[7] = floor($dA/105);  //storing the simulated data in the appropriate data rack
       
    }  
     if($simul_iterative == 8){
       $dA = $mu1  - $beta1 * $A - $c2 * $A* $E - $c3 * $A *$I * $day_120;   
      if($dA < 0){ $dA = -($dA);}
       $dA[8] = floor($dA/120);  //storing the simulated data in the appropriate data rack
       
    }
 }
  //////....Iteration  for Compartment B /////
 for($simul_iterative = 0; $simul_iterative < 9; $simul_iterative++){ 
   
    if($simul_iterative == 0){
       $dB =  - $beta2 * $B +  $c3 * $A *$I  +  $c2 * $A *$E * $day_1;   
        if($dB < 0){ $dB = -($dB);}
       $dB[0] = floor($dB/1);  //storing the simulated data in the appropriate data rack
       
    } if($simul_iterative == 1){
       $dB =  - $beta2 * $B +  $c3 * $A *$I  +  $c2 * $A *$E * $day_15;   
        if($dB < 0){ $dB = -($dB);}
       $dB[1] = floor($dB/15);  //storing the simulated data in the appropriate data rack
       
    }   if($simul_iterative == 2){
       $dB =  - $beta2 * $B +  $c3 * $A *$I  +  $c2 * $A *$E * $day_30;   
        if($dB < 0){ $dB = -($dB);}
       $dB[2] = floor($dB/30);  //storing the simulated data in the appropriate data rack
       
    }
       if($simul_iterative == 3){
       $dB =   - $beta2 * $B +  $c3 * $A *$I  +  $c2 * $A *$E * $day_45;   
        if($dB < 0){ $dB = -($dB);}
       $dB[3] = floor($dB/45);  //storing the simulated data in the appropriate data rack
       
    }
       if($simul_iterative == 4){
       $dB =  - $beta2 * $B +  $c3 * $A *$I  +  $c2 * $A *$E * $day_60;   
        if($dB < 0){ $dB = -($dB);}
       $dB[4] = floor($dB/60);  //storing the simulated data in the appropriate data rack
       
    }
       if($simul_iterative == 5){
       $dB = - $beta2 * $B +  $c3 * $A *$I  +  $c2 * $A *$E * $day_75;   
        if($dB < 0){ $dB = -($dB);}
       $dB[5] = floor($dB/75);  //storing the simulated data in the appropriate data rack
       
    }
       if($simul_iterative == 6){
       $dB =  - $beta2 * $B +  $c3 * $A *$I  +  $c2 * $A *$E * $day_90;   
        if($dB < 0){ $dB = -($dB);}
       $dB[6] = floor($dB/90);  //storing the simulated data in the appropriate data rack
       
    }
       if($simul_iterative == 7){
       $dB = - $beta2 * $B +  $c3 * $A *$I  +  $c2 * $A *$E * $day_105;   
        if($dB < 0){ $dB = -($dB);}
       $dB[7] = floor($dB/105);  //storing the simulated data in the appropriate data rack
       
    }
       if($simul_iterative == 8){
       $dB = - $beta2 * $B +  $c3 * $A *$I  +  $c2 * $A *$E * $day_120;   
        if($dB < 0){ $dB = -($dB);}
       $dB[8] = floor($dB/120);  //storing the simulated data in the appropriate data rack
       
    }
 }
     