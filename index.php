<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="LV">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IT atbalsts</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="shourtcut icon" href="image/logo.png" type="image/x-icon">
    <script src="script.js" defer></script>

</head>

<body>
    <header>

        <a href="./" class="logo">
            <i class="fa fa-server"></i> IT atbalsts 
        </a>

        <div class="apply">

            <a class="btn" data-target="#modal-ticket">Izveidot pieteikumu</a>

            <a class="btn active" data-target="#modal-pro">Iegadaties PRO</a>

        </div>

    </header>

    <section id="home" class="info">

        <div class="content">

            <h1>Uzticams IT atbalsts</h1>

            <p>Sniedzam kvalitativu IT atbalstu privātpersonām un uzņēmumiem dažādās problēmsituācijās ar datoru, tă perifērijas ierīcēm, programmatūru un internetu gan attālināti, gan dodoties pie klienta klātienē. Iesniedz savu pieteikumu un mēs ar Jums sazināsimies!</p>

            <a class="btn active"  data-target="#modal-ticket">
                <i class="fa fa-check-circle"></i>Izveidot pieteikum
            </a>

        </div>

        <div class="images">

            <img src="images/main.png" alt="">

        </div>

    </section>

    <section class="services">

        <h1>Mūsu piedāvātie <span>pakalpojumi</span></h1>

        <div class="box-container">

            <div class="box pirmais">
                <i class="fa fa-desktop"></i>
                <h2>Pakalpojums 1</h2>
                <p>Apraksts par konkretu pakalpojumu</p>
            </div>

            <div class="box otrais">
                <i class="fa fa-download"></i>
                <h2>Pakalpojums 2</h2>
                <p>Apraksts par konkretu pakalpojumu</p>
            </div>

            <div class="box tresais">
                <i class="fa fa-wifi"></i>
                <h2>Pakalpojums 3</h2>
                <p>Apraksts par konkretu pakalpojumu</p>
            </div>

            <div class="box ceturtais">
                <i class="fa fa-server"></i>
                <h2>Pakalpojums 4</h2>
                <p>Apraksts par konkretu pakalpojumu</p>
            </div>

        </div>

    </section>

    <section id="pro-plans" class="info">

            <div class="images">
    
                <img src="images/pro.png" alt="">
    
            </div>    

            <div class="content pro">
                

                <h1>Iegadajies <span>Pro</span> plānu!</h1>
    
                <p>Izvēloties maksas plānu PRO, mūsu speciālisti ar Jums sazināsies daudz ätråk nekā tas ir bezmaksas versijäl Turklāt visiem klātienes pakalpojumien tiks pieškirta 50% atlaidell</p>
    
                <a class="btn active" data-target="#modal-pro">
                    <i class="fa fa-check-circle" ></i>Iegādājies PRO tikai par 99<sup>99</sup> EUR/gadā
                </a>
    
            </div>
    

    </section>


    <!-- te buss patstavigais darbs-->


    <div class="virsraksts">
        <h1>Mūsu <span>komanda</span></h1>
    </div>

    <div class="komandas">
        <div class="komanda-box">

            <img src="images/team/team-1.jpg" alt="">
            <h2 class="janis">Jānis Bērziņš</h2>
            <em class="direktors">Direktors</em>

            <div class="ikonas">

                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-linkedin"></i>
                <i class="fa-brands fa-instagram"></i>

            </div>

        </div>
        <div class="komanda-box">

            <img src="images/team/team-2.jpg" alt="">
            <h2 class="uldis">Uldis Kļaviņš</h2>
            <em class="vadosais">Vadošais IT speciālists</em>

            <div class="ikonas">

                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-linkedin"></i>
                <i class="fa-brands fa-instagram"></i>

            </div>

        </div>
        <div class="komanda-box">

            <img src="images/team/team-3.jpg" alt="">
            <h2 class="andris">Andris Ozoliņš</h2>
            <em class="direktors2">Direktors</em>

            <div class="ikonas">

                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-linkedin"></i>
                <!-- <i class="fa-brands fa-instagram"></i> -->

            </div>

        </div>
        <div class="komanda-box">

            <img src="images/team/team-4.jpg" alt="">
            <h2 class="ilze">Ilze Eglīte</h2>
            <em class="itspec">IT speciāliste</em>

            <div class="ikonas">

                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-linkedin"></i>
                <i class="fa-brands fa-instagram"></i>

            </div>

        </div>
        <div class="komanda-box">

            <img src="images/team/team-5.jpg" alt="">
            <h2 class="martins">Mārtiņš Zariņš</h2>
            <em class="programmetajs">Programmētajs</em>

            <div class="ikonas">

                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-linkedin"></i>
                <!-- <i class="fa-brands fa-instagram"></i> -->

            </div>

        </div>
    </div>


    <footer>

        <div class="footer-box">

            <div class="footer-info">

                <div class="footer-kolonna">
                    <h3>Valodas</h3>
                    <!-- <p class="language-option" data-lang="lv"><i class="fa-solid fa-location-dot"></i>Latviski</p>
                    <p class="language-option" data-lang="en"><i class="fa-solid fa-location-dot"></i>Angliski</p>
                    <p class="language-option" data-lang="ru"><i class="fa-solid fa-location-dot"></i>Krieviski</p> -->
                    <button id="lang-lv" class="language-option"><i class="fa-solid fa-location-dot"></i>Latviski</button>
                    <button id="lang-ru" class="language-option"><i class="fa-solid fa-location-dot"></i>Krieviski</button>
                    <button id="lang-en" class="language-option"><i class="fa-solid fa-location-dot"></i>Angliski</button>
                  </div>
    
                <div class="footer-kolonna kontakti">
                    <h3>Kontakti</h3>
                    <button><i class="fa-solid fa-phone"></i>+371 29 999 999</button>
                    <button><i class="fa-solid fa-envelope"></i>it@atbalsts.lv</button>
                    <button><i class="fa-solid fa-location-dot"></i>Ventspils iela 51, Liepāja</button>
                </div>
    
                <div class="footer-kolonna seko">
                    <h3 class="seko">Seko mums</h3>
                    <button><i class="fa-brands fa-facebook-f"></i>Facebook</button>
                    <button><i class="fa-brands fa-instagram"></i>Instagram</button>
                </div>

            </div>


            <p class="autor">
                Visas autortiesības aizsargātas - IT atbalsts &copy 2024
            </p>

        </div>

    </footer>

    <!-- te buss patstavigais darbs-->
 
            <div class="modal" id="modal-pro">
                <div class="modal-box">
                    <div class="close-model" data-target="#modal-pro">
                        <i class="fas fa-times"></i>
                    </div>
                    <h2>
                   Iegadajies <span>Pro</span> planu!
                    </h2>
                    <div class="buy-pro">
                        <p>Ieguvumi iegadajaties pro versiju</p>
                        <ul>
                            <li>
                                <i class="fa-solid fa-check"></i>
                                Komunidacija ar klientu dazu minusu laika
                            </li>
                            <li>
                                <i class="fa-solid fa-check"></i>
                                50% atlaidie visiem klatienies pakalpojumiem
                            </li>
                            <li>
                                <i class="fa-solid fa-check"></i>
                                pieteikumos statusa un vestures aplukosana
                            </li>
                        </ul>
                    </div>
                    <div class="buy-pro">
                        Cena: 99.99 EUR/Gada
                    </div>
                    <a class="btn active" href="payment/checkout.php">Iegadaties PRO planu</a>
                </div>
            </div>


    <div class="modal" id="modal-ticket">

        <div class="modal-box">

            <div class="close-model" data-target="#modal-ticket">
                <i class="fas fa-times"></i>
            </div>

            <h2>Izveidot jaunu pieteikumu</h2>

            <form action="pieteikumi.php" method="POST">

                <label>Vārds:</label>
                <input type="text" name="vards" required>

                <label>Uzvārds:</label>
                <input type="text" name="uzvards" required>

                <label>E-pasta adrese:</label>
                <input type="email" name="epasts" required>

                <label>Tālrunis:</label>
                <input type="tel" pattern="[0-9]{8}" name="talrunis" required>

                <label>Problēmas / vaicamo uzdevumu apraksts:</label>
                <textarea name="apraksts" rows="4"></textarea>

                <button type="submit" name="nosutit" class="btn active">Nosūtīt pieteikumu</button>
                
            </form>

        </div>

    </div>

    <?php
    if(isset($_SESSION['pazinojums'])):
    ?>

        <div class="modal modal-active" id="modal-message">
                <div class="modal-box">
                    <div class="close-model" data-target="#modal-message">
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="notif">

                    <?php
                        echo $_SESSION['pazinojums'];
                        unset($_SESSION['pazinojums'])
                    ?>

                </div>
                </div>
            </div>

        <?php
        endif;
        ?>

</body>
</html>