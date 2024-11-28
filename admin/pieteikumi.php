<?php
    session_start();
    if(!isset($_SESSION['lietotajvardsABC'])){
        header("Location: login.php");
        exit();
    }
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" defer></script>
    <script src="script-admin.js" defer></script>
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

    <div class="admin-top">
        <div>
            <input type="text" id="search_input" placeholder="Meklēšana">
            <a class="btn-sm" id="search_button">Meklēt</a>
        </div>
        <a class="btn-sm" id="new-btn">
            <i class="fa fa-plus"></i> Pievienot jaunu
        </a>
    </div>     
    
    <div class="admin-main">
        <table>
            <tr>
                <th>ID</th>
                <th>Vārds</th>
                <th>Uzvārds</th>
                <th>E-pasts</th>
                <th>Tālrunis</th>
                <th>Datums</th>
                <th>Statuss</th>
                <th></th>
            </tr>
            <tbody id="pieteikumi"></tbody>
        </table>
    </div>

    <div class="modal" id="modal-admin">
        <div class="modal-box">
            <div class="close-modal">
                <i class="fa fa-times"></i>
            </div>
            <h2>Pieteikums:</h2>
            <form id="pieteikumaForma">
                <div class="formElements">
                    <label>Vārds:</label>
                    <input type="text" id="vards" required>
                    <label>Uzvārds:</label>
                    <input type="text" id="uzvards" required>
                    <label>E-pasta adrse:</label>
                    <input type="email" id="epasts" required>
                    <label>Tālrunis:</label>
                    <input type="tel" pattern="[0-9]{8}" id="talrunis" required>
                    <label>Problēmas / veicamā uzdevuma apraksts:</label>
                    <textarea id="apraksts" rows="4" required></textarea>
                    <label>Statuss:</label>
                    <select id="statuss" required>
                        <option value="Jauns">Jauns</option>
                        <option value="Atvērts">Atvērts</option>
                        <option value="Gaida">Gaida</option>
                        <option value="Pabeigts">Pabeigts</option>
                    </select>
                    <input type="hidden" id="piet_ID">
                </div>
                <button type="submit" name="nosutit" id="nosutit" class="btn active">Saglabāt</button>

                <div class="apaksa-pieteikums">
                    <div class="pieteikumsLaiksIp">
                        <p id="created-time"></p>
                        <p id="created-ip"></p>
                    </div>
                    <div class="pieteikumsIzmainas">
                        <p id="edit-time"></p>
                    </div>
                </div>


            </form>
        </div>
    </div>
</body>
</html>