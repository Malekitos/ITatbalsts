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
            <input type="text" placeholder="Meklēšana">
            <a class="btn-sm">Meklēt</a>
        </div>
        <a class="btn-sm" id="new-btn">
            <i class="fa fa-plus"></i> Pievienot jaunu
        </a>
    </div>     
    
    <div class="admin-main">
        <table>
            <tr>
                <th>ID</th>
                <th>Lietotājvārds</th>
                <th>Vārds</th>
                <th>Uzvārds</th>
                <th>E-pasts</th>
                <th>Loma</th>
                <th>Reģ. datums</th>
                <th></th>
            </tr>
            <!-- <tbody id="pieteikumi"></tbody> -->
            <tbody id="lietotaji"></tbody>
        </table>
    </div>

    <div class="modal" id="modal-admin">
        <div class="modal-box">
            <div class="close-modal">
                <i class="fa fa-times"></i>
            </div>
            <h2>Lietotājs:</h2>
            <form id="lietotajuForma">
                <div class="formElements">
                    <label>Lietotajvārds</label>
                    <input type="text" id="lietotajvards" required>
                    <label>Vārds:</label>
                    <input type="text" id="vards" required>
                    <label>Uzārds:</label>
                    <input type="text" id="lietotajuzvards" required>
                    <label>E-pasta adrse:</label>
                    <input type="email" id="lietotajepasts" required>
                    <label>Loma:</label>
                    <select id="loma" required>
                        <option value="moder">Moderators</option>
                        <option value="admin">Administrātors</option>
                    </select>
                    <input type="hidden" id="liet_ID">
                    <label>Parole:</label>
                    <button type="button" name="paradit" id="paradit" class="btn active">izveidot jaunu paroli <i class="fa-solid fa-down-long"></i> </button>
                    <label></label>
                    <input type="password" id="parole" required>
                </div>
                <button type="submit" name="nosutit" id="nosutit" class="btn active">Saglabāt</button>
            </form>
        </div>
    </div>
</body>
</html>