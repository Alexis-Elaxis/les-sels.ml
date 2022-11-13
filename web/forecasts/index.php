<?php
require('../php/sessionVerify.php');
require('../php/forecasts.php');
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
        <div class="link active">
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
            <h2>5. Sept 2022</h2>
            <p>Début de la récolte</p>
        </div>

        <div class="card">
            <h2><?= $jours_de_recolte ?></h2>
            <p>Jours de récolte, depuis le début</p>
        </div>

        <div class="card">
            <h2><?= gmdate('j M', $jours-86400) ?>. <?= gmdate('Y', $jours-86400) ?></h2>
            <p>Fin estimée</p>
        </div>

        <div class="card">
            <h2><?= ($jour_prevision_actuel-$base_jours)/86400 ?></h2>
            <p>Nombre de jours restants selon les estimations (sans les week-end)</p>
        </div>

        <div class="graph">
            <canvas id="graph1" style="width:90%;max-height: 90%;margin-right: 10;"></canvas>
        </div>
    </div>

    <style>
        .card {
            height: 7vw !important;
        }
    </style>

    <script>
        const dates = <?= json_encode($label_chart) ?>

        var grpah1 = new Chart("graph1", {
            type: "bar",
            data: {
                labels: dates,
                datasets: [{
                    label:"Prévision de la récolte de sel en fonction du temps, selon la moyenne des jours précédents",
                    backgroundColor: "rgb(255, 99, 132)",
                    borderColor: "rgb(255, 99, 132)",
                    fill:false,
                    data: <?= json_encode($data_chart) ?>
                }]
            },
            options: {}
        });
    </script>
</body>
</html>