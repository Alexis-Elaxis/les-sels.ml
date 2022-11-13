<?php
require('../php/sessionVerify.php');
require('../php/average.php');
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
        <div class="link active">
            <a href="../stats/"><i class="fa-solid fa-arrow-up-9-1"></i> Statistiques</a>
        </div>
        <div class="link">
            <a href="../forecasts/"><i class="fa-solid fa-temperature-half"></i> Prévisions</a>
        </div>
        <div class="link">
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
            <h2><?= $moy_lun ?> sachets</h2>
            <p>Moyenne de sachets le lundi</p>
        </div>

        <div class="card">
            <h2><?= $moy_mar ?> sachets</h2>
            <p>Moyenne de sachets le mardi</p>
        </div>

        <div class="card">
            <h2><?= $moy_mer ?> sachets</h2>
            <p>Moyenne de sachets le mercredi</p>
        </div>

        <div class="card">
            <h2><?= $moy_jeu ?> sachets</h2>
            <p>Moyenne de sachets le jeudi</p>
        </div>

        <div class="card">
            <h2><?= $moy_ven ?> sachets</h2>
            <p>Moyenne de sachets le vendredi</p>
        </div>

        <div class="card">
            <h2><?= $sachets_quoitidiens ?> sachets</h2>
            <p>Moyenne de sachets journalière</p>
        </div>
    </div>

    <style>
        .card {
            height: 7vw !important;
        }
    </style>
</body>
</html>