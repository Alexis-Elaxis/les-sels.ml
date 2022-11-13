<?php
require('../php/sessionVerify.php');
require('../php/getData.php');
require('../php/objectif.php');

// if($_SESSION["user"]->id != "229178398893801472") {
//     header('Location: ../home/');
//     exit();
// }

if(isset($_GET["id"]) && isset($_GET["sel_midi"]) && isset($_GET["sel_soir"]) && $_SESSION["user"]->id == "229178398893801472"){
    $sql = "UPDATE par_jour SET sel_midi='".$_GET["sel_midi"]."', sel_soir='".$_GET["sel_soir"]."' WHERE id=".$_GET["id"];

    if ($conn->query($sql) === TRUE) {
        header('Location: ?');
    } else {
        echo "Erreur: " . $conn->error;
    }
}

if(isset($_GET["date"]) && isset($_GET["sel_midi"]) && isset($_GET["sel_soir"])){
    $sql = "INSERT INTO par_jour (date, sel_midi, sel_soir) VALUES ('".$_GET["date"]."', '".$_GET["sel_midi"]."', '".$_GET["sel_soir"]."')";

    if ($conn->query($sql) === TRUE) {
        header('Location: ?');
    } else {
        echo "Erreur: " . $conn->error;
    }
}
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
        <div class="link">
            <a href="../fun-stats/"><i class="fa-solid fa-filter"></i> Statistiques inutiles</a>
        </div>
        <hr>
        <div class="link">
            <a href="#"><i class="fa-solid fa-user"></i> Mes Statistiques</a>
        </div>
        <?php
        if($_SESSION["user"]->id == "229178398893801472") {
            echo '<div class="link active">
            <a href="../admin/"><i class="fa-solid fa-lock"></i> Admin</a></div>';
        }
        ?>
        <div class="link">
            <a href="../discord.php?action=logout"><i class="fa-solid fa-right-from-bracket"></i> Se déconnecter</a>
        </div>
        <a href="https://github.com/Alexis-Elaxis/les-sels.ml"><i class="fa-brands fa-github"></i> Open-source</a>
    </div>
    <div class="page">
        <div class="table">
            <table cellspacing="0">
                <thead>
                    <td>Jour</td>
                    <td>Nombre de sachets de sel récoltés le midi</td>
                    <td>Nombre de sachets de sel récoltés le soir</td>
                    <td>Total</td>
                    <td>Nombre de sachets au total</td>
                </thead>
                <tbody>
                    <?php
                    $sachets = 0;
                    for($i = 0; $i < count($pure_data_par_jour); $i++){
                        $sachets += ($pure_data_par_jour[$i]['sel_midi'] + $pure_data_par_jour[$i]['sel_soir']);
                        echo "<tr><form>";
                        echo "<td><input name='id' value='".$pure_data_par_jour[$i]["id"]."' hidden><input type='text' value='".$pure_data_par_jour[$i]['date']."' disabled></td>";
                        echo "<td><input type='number' value='".$pure_data_par_jour[$i]['sel_midi']."' name='sel_midi' min='0'></td>";
                        echo "<td><input type='number' value='".$pure_data_par_jour[$i]['sel_soir']."' name='sel_soir' min='0'></td>";
                        echo "<td>" . ($pure_data_par_jour[$i]['sel_midi'] + $pure_data_par_jour[$i]['sel_soir']) . "</td>";
                        echo "<td>" .$sachets."</td>";
                        echo "<td><input type='submit'/></td></form>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <form>
                <input type="date" name="date" value="<?php echo date("d/m/Y"); ?>">
                <input type="number" name="sel_midi" min="0" placeholder="Sel récolté ce midi">
                <input type="number" name="sel_soir" min="0" placeholder="Sel récolté ce soir">
                <input type="submit" value="Ajouter">
            </form>
        </div>
    </div>
</body>
</html>