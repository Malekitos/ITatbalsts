<?php
    require 'con_db.php';
    if(isset($_POST['id'])){
        $id = htmlspecialchars($_POST['id']);
        $vaicajums = $savienojums->prepare("SELECT * FROM it_pieteikumi WHERE pieteikums_id = ?");
        $vaicajums->bind_param("i", $id);
        $vaicajums->execute();
        $rezultats = $vaicajums->get_result();
        if(!$rezultats){
            die('Kļūda: '.$savienojums->error);
        }

        while($ieraksts = $rezultats->fetch_assoc()){
            $json[] = array(
                'id' => htmlspecialchars($ieraksts['pieteikums_id']),
                'vards' => htmlspecialchars($ieraksts['vards']),
                'uzvards' => htmlspecialchars($ieraksts['uzvards']),
                'epasts' => htmlspecialchars($ieraksts['epasts']),
                'talrunis' => htmlspecialchars($ieraksts['talrunis']),
                'apraksts' => htmlspecialchars($ieraksts['apraksts']),
                'datums' => date("d.m.Y. H:i", strtotime($ieraksts['datums'])),
                'last_updated' => date("d.m.Y. H:i", strtotime($ieraksts['last_updated'])),
                'ip_adrese' => htmlspecialchars($ieraksts['ip_adrese']),
                'statuss' => htmlspecialchars($ieraksts['statuss']),
            );
        }

        $vaicajums->close();
        $savienojums->close();
    
        $jsonstring = json_encode($json[0]);
        echo $jsonstring;
    }
?>