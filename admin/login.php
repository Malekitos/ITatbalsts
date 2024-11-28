<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT atbalsts - ielogošanās</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
</head>
<body>

    <div class="modal modal-active">
        <div class="modal-box">
            <h2>Ielogoties sistēmā</h2>
            <?php
                if(isset($_SESSION['pazinojums'])){
                    echo "<p class='login-notif'>".$_SESSION['pazinojums']."</p>";
                    unset($_SESSION['pazinojums']);
                }
            ?>
            <form action="database/login_function.php" method="post">
                    <label>Lietotājvārds:</label>
                    <input type="text" name="lietotajs" required>
                    <label>Parole:</label>
                    <input type="password" name="parole" required>
                <button type="submit" name="ielogoties" class="btn active">Ielogoties</button>
            </form>
        </div>
    </div>
</body>
</html>