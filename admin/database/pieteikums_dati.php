<?php

    require "con_db.php";

    # 1.statistika
    $jauni_pieteikumi_SQL = "SELECT COUNT(pieteikums_id) from it_pieteikumi where statuss = 'Jauns' and izmantots = '1'";
    $atlasa_jauni_pieteikumi = mysqli_query($savienojums, $jauni_pieteikumi_SQL);

    while($ieraksts = mysqli_fetch_array($atlasa_jauni_pieteikumi)){
        $jauni_pieteikumi = "{$ieraksts['COUNT(pieteikums_id)']}";
    }

    # 2.statistika
    $atverti_piet_SQL = "SELECT COUNT(pieteikums_id) from it_pieteikumi where statuss = 'Atvērts' and izmantots = '1'";
    $atlasa_atverti_piet = mysqli_query($savienojums, $atverti_piet_SQL);

    while($ieraksts = mysqli_fetch_array($atlasa_atverti_piet)){
        $atverti_pieteikumi = "{$ieraksts['COUNT(pieteikums_id)']}";
    }

    # 3.statistika
    $gaida_piet_SQL = "SELECT COUNT(pieteikums_id) from it_pieteikumi where statuss = 'Gaida'and izmantots = '1'";
    $atlasa_gaida_piet = mysqli_query($savienojums, $gaida_piet_SQL);

    while($ieraksts = mysqli_fetch_array($atlasa_gaida_piet)){
        $gaida_pieteikumi = "{$ieraksts['COUNT(pieteikums_id)']}";
    }

    # 4.statistika
    $pieteikumi_SQL = "SELECT COUNT(pieteikums_id) from it_pieteikumi where izmantots = '1'";
    $atlasa_pieteikumi = mysqli_query($savienojums, $pieteikumi_SQL);

    while($ieraksts = mysqli_fetch_array($atlasa_pieteikumi)){
        $visi_pieteikumi = "{$ieraksts['COUNT(pieteikums_id)']}";
    }

?>