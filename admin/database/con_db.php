<?php
      $serveris = "localhost";
      $lietotajs = "grobina1_svilis";
      $parole = "21LnaFGk!";
      $db_nosaukums = "grobina1_svilis";

  
      $savienojums = mysqli_connect($serveris,$lietotajs,$parole,$db_nosaukums);

    // if(!$savienojums){
    //     echo "Viss slikti";
    // }else{
    //     echo "Savienojums darbojas!";
    // }
?>