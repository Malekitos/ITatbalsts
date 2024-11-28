<?php

    if (isset($_POST["id"])){
        require "con_db.php";

        $lietotajvards = htmlspecialchars($_POST['lietotajvards']);
        $vards = htmlspecialchars($_POST['vards']);
        $lietotajuzvards = htmlspecialchars($_POST['lietotajuzvards']);
        $lietotajepasts = htmlspecialchars($_POST['lietotajepasts']);
        $parole = $_POST['parole'];
        $parole = password_hash($parole, PASSWORD_DEFAULT);
        $loma = htmlspecialchars($_POST['loma']);
    
        // if(!empty($lietotajvards) && !empty($vards) && !empty($lietotajuzvards) && !empty($lietotajepasts) && !empty($loma) && !empty($parole)&& !empty($statuss)){
            $vaicajums = $savienojums->prepare("INSERT INTO it_lietotaji (lietotajvards, vards, lietotajuzvards, lietotajepasts, parole, loma) VALUES (?, ?, ?, ?, ?, ?)"); // prepared statement
            $vaicajums->bind_param("ssssss", $lietotajvards, $vards, $lietotajuzvards, $lietotajepasts, $parole, $loma);
            if($vaicajums->execute()){
                echo "Lietotajs veiksmīgi pievienots!";
            }else{
                echo "Kļūda sistēmā: ".$vaicajums->error;
            }
            $vaicajums->close();
            $savienojums->close();
        }else{
            echo "Visi ievades lauki nav aizpildīti!";
        }
    
    // }
?>