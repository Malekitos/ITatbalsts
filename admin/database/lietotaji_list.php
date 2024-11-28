<?php
    require 'con_db.php';

    $vaicajums = "SELECT * FROM it_lietotaji ORDER BY lietotajs_id DESC";
    $rezultats = mysqli_query($savienojums, $vaicajums);

    while($ieraksts = $rezultats->fetch_assoc()){
        $json[] = array(
            'id' => htmlspecialchars($ieraksts['pieteikums_id']),
            'lietotajvards' => htmlspecialchars($ieraksts['lietotajvards']),
            'vards' => htmlspecialchars($ieraksts['vards']),
            'lietotajuzvards' => htmlspecialchars($ieraksts['lietotajuzvards']),
            'lietotajepasts' => htmlspecialchars($ieraksts['lietotajepasts']),
            'loma' => htmlspecialchars($ieraksts['loma']),
            'regdatums' => date("d.m.Y. H:i", strtotime($ieraksts['regdatums'])),
            'statuss' => htmlspecialchars($ieraksts['statuss']),
        );
    }

    $jsonstring = json_encode($json);
    echo $jsonstring;
?>