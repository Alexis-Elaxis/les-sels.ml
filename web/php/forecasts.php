<?php

require('average.php');
require('objectif.php');

$semaine = array("dimanche","lundi","mardi","mercredi","jeudi", "vendredi","samedi");

$time = time();
$time_collect = time();

$vac_start = "1667257200"; 
$vac_end = "1667343599"; 

$prev_actual = $total_sachets*0.8;

$i = 0;

$label_chart = array();
$data_chart = array();

$sachets_prevision_actuel = $total_sachets; //Nombre de sachets pour l'objectif
$jour_prevision_actuel = time(); //Temps pour attendre cet objectif
$base_jours = time();
$jours = time(); //De base

while($sachets_prevision_actuel <= $current_objectif_value/0.8){
    if(($jours >= $vac_start) && ($jours <= $vac_end)) {
        $jours += 86400;
        $jour_prevision_actuel += 86400;
        $i = $i+1;
    } else {
        if($semaine[gmdate('w', $jours)] == "lundi") {
            $sachets_prevision_actuel += $moy_lun;
            $jour_prevision_actuel += 86400;
            array_push($label_chart, gmdate('j M Y', $jours));
            array_push($data_chart, $sachets_prevision_actuel);
            
            if(isset($_GET["debug"]) && $_GET["debug"] == true) {
                echo $semaine[gmdate('w', $jours)];
                echo gmdate('j M', $jours);
                echo " : ";
                echo $sachets_prevision_actuel;
                echo "<br>";
            }

        }
        else if($semaine[gmdate('w', $jours)] == "mardi") {
            $sachets_prevision_actuel += $moy_mar;
            $jour_prevision_actuel += 86400;
            array_push($label_chart, gmdate('j M Y', $jours));
            array_push($data_chart, $sachets_prevision_actuel);
            
             if(isset($_GET["debug"]) && $_GET["debug"] == true) {
                echo $semaine[gmdate('w', $jours)];
                echo gmdate('j M', $jours);
                echo " : ";
                echo $sachets_prevision_actuel;
                echo "<br>";
            }

        }
        else if($semaine[gmdate('w', $jours)] == "mercredi") {
            $sachets_prevision_actuel += $moy_mer;
            $jour_prevision_actuel += 86400;
            array_push($label_chart, gmdate('j M Y', $jours));
            array_push($data_chart, $sachets_prevision_actuel);
            
            if(isset($_GET["debug"]) && $_GET["debug"] == true) {
                echo $semaine[gmdate('w', $jours)];
                echo gmdate('j M', $jours);
                echo " : ";
                echo $sachets_prevision_actuel;
                echo "<br>";
            }

        }
        else if($semaine[gmdate('w', $jours)] == "jeudi") {
            $sachets_prevision_actuel += $moy_jeu;
            $jour_prevision_actuel += 86400;
            array_push($label_chart, gmdate('j M Y', $jours));
            array_push($data_chart, $sachets_prevision_actuel);
            
             if(isset($_GET["debug"]) && $_GET["debug"] == true) {
                echo $semaine[gmdate('w', $jours)];
                echo gmdate('j M', $jours);
                echo " : ";
                echo $sachets_prevision_actuel;
                echo "<br>";
            }

        }
        else if($semaine[gmdate('w', $jours)] == "vendredi") {
            $sachets_prevision_actuel += $moy_ven;
            $jour_prevision_actuel += 86400;
            array_push($label_chart, gmdate('j M Y', $jours));
            array_push($data_chart, $sachets_prevision_actuel);
            
            
            if(isset($_GET["debug"]) && $_GET["debug"] == true) {
                echo $semaine[gmdate('w', $jours)];
                echo gmdate('j M', $jours);
                echo " : ";
                echo $sachets_prevision_actuel;
                echo "<br>";
            }
        } 
        
        else if($semaine[gmdate('w', $jours)] == "samedi" || $semaine[gmdate('w', $jours)] == "dimanche") {
             
           if(isset($_GET["debug"]) && $_GET["debug"] == true) {
                echo $semaine[gmdate('w', $jours)];
                echo gmdate('j M', $jours);
                echo " : ";
                echo $sachets_prevision_actuel;
                echo "<br>";
            }
        }
        
        $jours += 86400;
        
       
    }
}