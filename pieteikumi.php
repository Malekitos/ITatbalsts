<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nosutit"])){
        require "admin/database/con_db.php";

        $vards = htmlspecialchars($_POST['vards']);
        $uzvards = htmlspecialchars($_POST['uzvards']);
        $epasts = htmlspecialchars($_POST['epasts']);
        $talrunis = htmlspecialchars($_POST['talrunis']);
        $apraksts = htmlspecialchars($_POST['apraksts']);
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN';

    
        if(!empty($vards) && !empty($uzvards) && !empty($epasts) && !empty($talrunis) && !empty($apraksts)){
            $vaicajums = $savienojums->prepare("INSERT INTO it_pieteikumi (vards, uzvards, epasts, talrunis, apraksts, statuss, ip_adrese) VALUES (?, ?, ?, ?, ?, ?, ?)"); // prepared statement
            $vaicajums->bind_param("sssisss", $vards, $uzvards, $epasts, $talrunis, $apraksts, $statuss, $ip);
            if($vaicajums->execute()){
                $_SESSION['pazinojums'] = "Pieteikums veiksmīgi nosūtīts! Sazināsimies ar jums pavisam drīz!";
            }else{
                $_SESSION['pazinojums'] = "Kļūda sistēmā! Sazinies ar vietnes administrāciju pa tālruni!".$vaicajums->error;
            }
            $vaicajums->close();
            $savienojums->close();
        }else{
            $_SESSION['pazinojums'] = "Visi ievades lauki nav aizpildīti!";
        }
    
    }

    header("Location: ./");
?>