<?php

require('databaseConnect.php');

$moy_lun = 0;
$sac_lun = 0;

$moy_mar = 0;
$sac_mar = 0;

$moy_mer = 0;
$sac_mer = 0;

$moy_jeu = 0;
$sac_jeu = 0;

$moy_ven = 0;
$sac_ven = 0;

$sachets_quoitidiens = 0;
$total_sachets = 0;

$result = $conn->query("SELECT * FROM par_jour WHERE jour = 'lun'");
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $sac_lun += $row["sel_midi"] + $row["sel_soir"];
    }
    $moy_lun = round($sac_lun / $result->num_rows);
}

$result = $conn->query("SELECT * FROM par_jour WHERE jour = 'mar'");
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $sac_mar += $row["sel_midi"] + $row["sel_soir"];
    }
    $moy_mar = round($sac_mar / $result->num_rows);

}

$result = $conn->query("SELECT * FROM par_jour WHERE jour = 'mer'");
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $sac_mer += $row["sel_midi"] + $row["sel_soir"];
    }
    $moy_mer = round($sac_mer / $result->num_rows);
}

$result = $conn->query("SELECT * FROM par_jour WHERE jour = 'jeu'");
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $sac_jeu += $row["sel_midi"] + $row["sel_soir"];
    }
    $moy_jeu = round($sac_jeu / $result->num_rows);

}

$result = $conn->query("SELECT * FROM par_jour WHERE jour = 'ven'");
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $sac_ven += $row["sel_midi"] + $row["sel_soir"];
    }
    $moy_ven = round($sac_ven / $result->num_rows);
}

$sql = "SELECT * FROM par_jour ORDER BY id DESC";
$result = $conn->query($sql);

$jours_de_recolte = 0;

$today_set = 0;

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $total_sachets += intval($row["sel_midi"]) + intval($row["sel_soir"]);
        $jours_de_recolte += 1;
        
    }
    $sachets_quoitidiens = round($total_sachets/$result->num_rows);
}