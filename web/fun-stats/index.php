<?php
require('../php/sessionVerify.php');
require('../php/getData.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les-Sels.ml</title>

    <script src="https://kit.fontawesome.com/6e1e571185.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="../styles/index.css">
</head>
<body>
    <div class="menu">
        <div class="infos">
            <h1>Les-sels.ml</h1>
            <p>Salut Alexiis#9504</p>
        </div>
        <div class="link">
            <a href="../home/"><i class="fa-solid fa-house"></i> Page principale</a>
        </div>
        <div class="link">
            <a href="../day-by-day/"><i class="fa-solid fa-calendar-days"></i> Jour par jour</a>
        </div>
        <div class="link">
            <a href="../charts/"><i class="fa-solid fa-chart-line"></i> Graphiques</a>
        </div>
        <div class="link">
            <a href="../stats/"><i class="fa-solid fa-arrow-up-9-1"></i> Statistiques</a>
        </div>
        <div class="link">
            <a href="../forecasts/"><i class="fa-solid fa-temperature-half"></i> Prévisions</a>
        </div>
        <div class="link active">
            <a href="../fun-stats/"><i class="fa-solid fa-filter"></i> Statistiques inutiles</a>
        </div>
        <hr>
        <div class="link">
            <a href="#"><i class="fa-solid fa-user"></i> Mes Statistiques</a>
        </div>
        <?php
        if($_SESSION["user"]->id == "229178398893801472") {
            echo '<div class="link">
            <a href="../admin/"><i class="fa-solid fa-lock"></i> Admin</a></div>';
        }
        ?>
        <div class="link">
            <a href="../discord.php?action=logout"><i class="fa-solid fa-right-from-bracket"></i> Se déconnecter</a>
        </div>
        <a href="https://github.com/Alexis-Elaxis/les-sels.ml"><i class="fa-brands fa-github"></i> Open-source</a>
    </div>
    <div class="page">
         <div class="card">
            <h2><?= round($nombre_total_de_sachets*0.8/5) ?></h2>
            <p>Jours de sel nécéssaires pour un humain</p>
        </div>

        <div class="card">
            <h2><?= round($nombre_total_de_sachets*0.8/34.7, 1) ?></h2>
            <p>Litres d'eau de mer nécéssaires pour avoir la même quantité</p>
        </div>

        <div class="card">
            <h2><?php
            if(round($nombre_total_de_sachets*0.003, 2) > 20) {
                echo '<h2>Etage n°6</h2>';
            }
            else if(round($nombre_total_de_sachets*0.003, 2) > 16) {
                echo '<h2>Etage n°5</h2>';
            }
            else if(round($nombre_total_de_sachets*0.003, 2) > 13) {
                echo '<h2>Etage n°4</h2>';
            }
            else if(round($nombre_total_de_sachets*0.003, 2) > 10) {
                echo '<h2>Etage n°3</h2>';
            }
            else if(round($nombre_total_de_sachets*0.003, 2) > 6) {
                echo '<h2>Etage n°2</h2>';
            } else if(round($nombre_total_de_sachets*0.003, 2) > 3) {
                echo '<h2>Etage n°1</h2>';
            } else {
                echo '<h2>Rez-de-chaussée</h2>';
            }
            ?></h2>
            <p>Correspondance avec la hauteur de l'internat</p>
        </div>

        <div class="card">
            <h2><?= round($nombre_total_de_sachets*0.00206, 2) ?>m</h2>
            <p>Distance totale en ampilant tout les sachets récoltés</p>
        </div>
        
        <div class="card">
            <h2><?= round($nombre_total_de_sachets*0.044, 2) ?>m</h2>
            <p>Distance totale en metant tout les sachets récoltés côte à côte</p>
        </div>

        <div class="card">
            <h2><?= round((1.69/100)*$nombre_total_de_sachets, 2) ?>€</h2>
            <p>Estimation en euros</p>
        </div>
    </div>

    <style>
        .card {
            height: 7vw !important;
        }
    </style>
</body>
</html>