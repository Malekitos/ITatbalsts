<?php
    require "con_db.php";

    if(isset($_POST['ielogoties'])){
        session_start();

        $lietotajvards = htmlspecialchars($_POST['lietotajs']);
        $parole = $_POST['parole'];

        $vaicajums = $savienojums->prepare("SELECT * FROM it_lietotaji WHERE lietotajvards = ?");
        $vaicajums->bind_param("s", $lietotajvards);
        $vaicajums->execute();
        $rezulats = $vaicajums->get_result();
        $lietotajs = $rezulats->fetch_assoc();

        if($lietotajs && password_verify($parole, $lietotajs['parole'])){
            $_SESSION['lietotajvardsABC'] = $lietotajs['lietotajvards'];

            $loma = '';

            if($lietotajs['loma'] === 'moder'){
                $loma = 'Moderators';
            }else{
                $loma = 'Administrators';
            }

            $_SESSION['lietotajloma'] = $loma;

            echo "Veiksmīga ielogošanās!";
        }else{
            echo $_SESSION['pazinojums'] = "Nepareizs lietotājvārds vai parole!";
        }

        header("Location: ../");
        $vaicajums->close();
        $savienojums->close();
    }
?>