<?php
    require 'con_db.php';

    if(isset($_POST['id'])){
        $lietotajvards = htmlspecialchars($_POST['lietotajvards']);
        $vards = htmlspecialchars($_POST['vards']);
        $lietotajuzvards = htmlspecialchars($_POST['lietotajuzvards']);
        $lietotajepasts = htmlspecialchars($_POST['lietotajepasts']);
        $parole = htmlspecialchars($_POST['parole']);
        $loma = htmlspecialchars($_POST['loma']);
        $id = intval($_POST['id']);

        $sql = "UPDATE it_lietotaji SET lietotajvards = ?, vards = ?, lietotajepasts = ?, parole = ?, loma =? WHERE pieteikums_id = ?";
        $vaicajums = $savienojums->prepare($sql);
        $vaicajums->bind_param("sssssi", $lietotajvards, $vards, $lietotajuzvards, $lietotajepasts, $parole, $loma, $id);

        if($vaicajums->execute()){
            echo "Veiksmīgi rediģēts!";
        }else{
            echo "Kļūda: ".$savienojums->error;
        }

        $vaicajums->close();
        $savienojums->close();
    }
?>