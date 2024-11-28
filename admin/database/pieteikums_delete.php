<?php
    require 'con_db.php';
    if(isset($_POST['id'])){
        $id = intval($_POST['id']);

        //$vaicajums = $savienojums->prepare("DELETE FROM it_pieteikumi WHERE pieteikums_id = ?");
        //$vaicajums->bind_param("i", $id);

        $delete = 0;

        $sql = "UPDATE it_pieteikumi SET izmantots = ? WHERE pieteikums_id = ?";
        $vaicajums = $savienojums->prepare($sql);
        $vaicajums->bind_param("ii", $delete, $id);


        if($vaicajums->execute()){
            // echo "Veiksmīgi dzēsts";
        }else{
            // echo "Kļūda: ".$savienojums->error;
        }

        $vaicajums->close();
        $savienojums->close();
    }
?>