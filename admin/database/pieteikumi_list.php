<?php
require 'con_db.php';

$search_term = isset($_POST['search_term']) ? mysqli_real_escape_string($savienojums, $_POST['search_term']) : '';

$vaicajums = "SELECT * FROM it_pieteikumi WHERE izmantots = 1 AND (
                vards LIKE '%$search_term%' OR
                uzvards LIKE '%$search_term%' OR
                epasts LIKE '%$search_term%' OR
                talrunis LIKE '%$search_term%'
            ) ORDER BY pieteikums_id DESC";

$rezultats = mysqli_query($savienojums, $vaicajums);

$json = [];
while ($ieraksts = $rezultats->fetch_assoc()) {
    $json[] = array(
        'id' => htmlspecialchars($ieraksts['pieteikums_id']),
        'vards' => htmlspecialchars($ieraksts['vards']),
        'uzvards' => htmlspecialchars($ieraksts['uzvards']),
        'epasts' => htmlspecialchars($ieraksts['epasts']),
        'talrunis' => htmlspecialchars($ieraksts['talrunis']),
        'datums' => date("d.m.Y. H:i", strtotime($ieraksts['datums'])),
        'statuss' => htmlspecialchars($ieraksts['statuss']),
    );
}

echo json_encode($json);
?>