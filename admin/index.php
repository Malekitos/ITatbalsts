<?php
session_start();
if(!isset($_SESSION['lietotajvardsABC'])){
    header("Location: login.php");
    exit();
}
require "database/pieteikums_dati.php";
?>
<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT atbalsts - administrēšana</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <script src="database/graph.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header>
        <a href="./" class="logo">
            <i class="fa fa-server"></i> IT atbalsts
        </a>

        <div class="apply">
            <a href="./" class="btn">Sākums</a>
            <a href="./pieteikumi.php" class="btn">Pieteikumi</a>
            <a href="./" class="btn">PRO īpašnieki</a>
            <a href="./lietotaji.php" class="btn">Lietotaji</a>
            <a href="logout.php" class="btn"><i class="fas fa-power-off"></i></a>
        </div>
    </header>

    <div class="sakums-dala">
        <div class="sakums-info">
            <div class="augsejie-bloki sveiciens">
                <h2>Sveicināti, <?php echo $_SESSION["lietotajvardsABC"]; ?>!</h2>
                <p>Tava loma sistēmā: <?php echo $_SESSION["lietotajloma"]; ?></p>
            </div>

            <div class="augsejie-bloki">
                <div class="icon"><i class="fa-solid fa-pen-to-square"></i></div>
                <div class="text-block">
                    <h2><?php echo $jauni_pieteikumi; ?></h2>
                    <p>Jauni pieteikumi</p>
                </div>
            </div>

            <div class="augsejie-bloki">
                <div class="icon"><i class="fa-solid fa-chalkboard-user"></i></div>
                <div class="text-block">
                    <h2><?php echo $atverti_pieteikumi; ?></h2>
                    <p>Atvērtie pieteikumi</p>
                </div>
            </div>

            <div class="augsejie-bloki">
                <div class="icon"><i class="fa-solid fa-spinner"></i></div>
                <div class="text-block">
                    <h2><?php echo $gaida_pieteikumi; ?></h2>
                    <p>Gaida pieteikumi</p>
                </div>
            </div>

            <div class="augsejie-bloki">
                <div class="icon"><i class="fa-solid fa-list"></i></div>
                <div class="text-block">
                    <h2><?php echo $visi_pieteikumi; ?></h2>
                    <p>Kopā pieteikumi</p>
                </div>
            </div>
        </div>

        <div class="sakums-vide">
            <div class="sakums-block">
                <div class="uzraksts"><h2>JAUNĀKIE PIETEIKUMI</h2></div>
                <div class="uzraksts"><h2>PIETEIKUMU SKAITS</h2></div>
            </div>
            <div class="sakums-block">
                <table>
                <tr>
                    <th>Vārds, uzvārds</th>
                    <th>Datums</th>
                    <th>Statuss</th>
                </tr>
                <?php
                require "database/pieteikumi_tabula.php"
                ?>
            </table>
                <div class="graph">
                    <?php
                    require "database/pieteikumi_graph.php"
                    ?>
                    <canvas id="pieteikumuDiagramma"></canvas>
                </div>

            </div>


        </div>
    </div>

</body>
</html>
