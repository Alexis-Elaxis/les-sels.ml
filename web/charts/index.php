<?php
require('../php/sessionVerify.php');
require('../php/getData.php');
require('../php/objectif.php');
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
        <div class="link active">
            <a href="../charts/"><i class="fa-solid fa-chart-line"></i> Graphiques</a>
        </div>
        <div class="link">
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
        <div class="graph">
            <canvas id="graph1" style="width:90%;max-height: 90%;margin-right: 10;"></canvas>
        </div>

        <div class="graph">
            <canvas id="graph2" style="width:90%;max-height: 90%;margin-right: 10;"></canvas>
        </div>
    </div>
    <script>
        const dates = <?= json_encode($dates_de_recolte) ?>

        <?php
        $croissance_sachets = array();
        $sachets = 0;
        for($i = 0; $i < count($pure_data_par_jour); $i++){
            $sachets += ($pure_data_par_jour[$i]['sel_midi'] + $pure_data_par_jour[$i]['sel_soir']);
            array_push($croissance_sachets, $sachets);
        }
        ?>

        var grpah1 = new Chart("graph1", {
            type: "line",
            data: {
                labels: dates,
                datasets: [{
                    label:"Récolte de Sel en fonction du temps",
                    backgroundColor: "rgb(255, 99, 132)",
                    borderColor: "rgb(255, 99, 132)",
                    fill:false,
                    data: <?= json_encode($sachets_par_jour) ?>
                }]
            },
            options: {}
        });

        var grpah2 = new Chart("graph2", {
            type: "line",
            data: {
                labels: dates,
                datasets: [{
                    label:"Sachets de Sel en fonction du temps",
                    backgroundColor: "rgb(99, 255, 132)",
                    borderColor: "rgb(99, 255, 132)",
                    fill:false,
                    data: <?= json_encode($croissance_sachets) ?>
                }]
            },
            options: {}
        });
    </script>
</body>
</html>