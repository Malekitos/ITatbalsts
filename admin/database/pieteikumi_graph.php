<?php
    require "con_db.php";

    // Datu iegūšana no datubāzes
    $sql = "SELECT DATE(datums) as datuma_diena, COUNT(*) as pieteikumu_skaits
            FROM it_pieteikumi where izmantots = '1'
            GROUP BY datuma_diena
            ORDER BY datuma_diena DESC ";
    $result = $savienojums->query($sql);

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Datu sagatavošana JavaScript formātam
    echo "<script>
        const chartData = " . json_encode($data) . ";
    </script>";
?>
