<?php
    require 'con_db.php';

    if(isset($_POST['id'])){
        $p_vards = htmlspecialchars($_POST['vards']);
        $p_uzvards = htmlspecialchars($_POST['uzvards']);
        $p_epasts = htmlspecialchars($_POST['epasts']);
        $p_talrunis = htmlspecialchars($_POST['talrunis']);
        $p_apraksts = htmlspecialchars($_POST['apraksts']);
        $p_statuss = htmlspecialchars($_POST['statuss']);
        $id = intval($_POST['id']);

        $sql = "UPDATE it_pieteikumi SET vards = ?, uzvards = ?, epasts = ?, talrunis = ?, apraksts =?, statuss = ? WHERE pieteikums_id = ?";
        $vaicajums = $savienojums->prepare($sql);
        $vaicajums->bind_param("ssssssi", $p_vards, $p_uzvards, $p_epasts, $p_talrunis, $p_apraksts, $p_statuss, $id);

        if($vaicajums->execute()){
            echo "Veiksmīgi rediģēts!";
        }else{
            echo "Kļūda: ".$savienojums->error;
        }

        $vaicajums->close();
        $savienojums->close();
    }
?>