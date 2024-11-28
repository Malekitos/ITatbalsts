<?php
    require 'con_db.php';
    if(isset($_POST['id'])){
        $id = htmlspecialchars($_POST['id']);
        $vaicajums = $savienojums->prepare("SELECT * FROM it_lietotaji WHERE lietotajs_id = ?");
        $vaicajums->bind_param("i", $id);
        $vaicajums->execute();
        $rezultats = $vaicajums->get_result();
        if(!$rezultats){
            die('Kļūda: '.$savienojums->error);
        }

        while($ieraksts = $rezultats->fetch_assoc()){
            $json[] = array(
                'id' => htmlspecialchars($ieraksts['lietotajs_id']),
                'lietotajvards' => htmlspecialchars($ieraksts['lietotajvards']),
                'vards' => htmlspecialchars($ieraksts['vards']),
                'lietotajuzvards' => htmlspecialchars($ieraksts['lietotajuzvards']),
                'lietotajepasts' => htmlspecialchars($ieraksts['lietotajepasts']),
                'parole' => htmlspecialchars($ieraksts['parole']),
                // 'regdatums' => date("d.m.Y. H:i", strtotime($ieraksts['regdatums'])),
                'loma' => htmlspecialchars($ieraksts['loma']),
            );
        }

        $vaicajums->close();
        $savienojums->close();
    
        $jsonstring = json_encode($json[0]);
        echo $jsonstring;
    }
?>