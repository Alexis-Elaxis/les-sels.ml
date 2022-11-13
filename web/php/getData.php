<?php

require('databaseConnect.php');

$nombre_total_de_sachets = 0;
$dates_de_recolte = array();
$sachets_par_jour = array();
$pure_data_par_jour = array();

$sql = "SELECT * FROM `par_jour` ORDER BY `id`";
$result = $conn->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
        array_push($pure_data_par_jour, $row);

        $nombre_total_de_sachets += $row['sel_midi'] + $row['sel_soir'];
        array_push($dates_de_recolte, $row['date']);
        array_push($sachets_par_jour, $row['sel_midi'] + $row['sel_soir']);
    }
}