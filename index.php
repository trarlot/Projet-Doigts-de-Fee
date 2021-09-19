<?php
session_start();
function user_connected()
{
    if (!isset($_SESSION['email'])) {
        header('location: login/login.php');
    }
}
user_connected();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="utils/style_menu.css">
    <link rel="stylesheet" type="text/css" href="styles.css">

    <script type="text/javascript" src="utils/scripts_menu.js"></script>
    <title>Accueil | Doigts de Fée</title>
</head>

<body>
    <div class="background-img">
        <img src="ressources/background.jpg">
    </div>
    <header>
        <div class="title">
            <h1>Doigts de Fée</h1>
        </div>
        <div class="burger_content">

            <button class="burger close">
                <div class="line_1">
                </div>
                <div class="line_2">
                </div>
                <div class="line_3">
                </div>
            </button>
        </div>
        <a class="icon" href="shopping_cart/shopping_cart.php">
            <img src="ressources/shopping_cart.png">
            <?php
            if (isset($_COOKIE['added_to_shopping_cart'])) {
                echo '<p class="dote">●</p>';
            }
            ?>

        </a>



        </div>
        <div class="navbar-burger">
            <h2>Menu</h2>

            <a id="home" href="index.php">Accueil </a>
            <a id="manucure" href="manucure/manucure.php">Manucure </a>
            <a id="pedicure" href="pedicure/pedicure.php">Pédicure</a>
            <a id="boutique" href="boutique/boutique.php">Boutique</a>
            <a id="profil" href="profil/profil.php">Votre Profil</a>

        </div>
        <div class=" background close">

        </div>


        <div class="navbar">
            <a id="home" href="index.php">Accueil </a>
            <a id="manucure" href="manucure/manucure.php">Manucure</a>
            <a id="pedicure" href="pedicure/pedicure.php">Pédicure</a>
            <a id="boutique" href="boutique/boutique.php">Boutique</a>

            <a id="profil" href="profil/profil.php">Votre Profil</a>
        </div>
        <hr>
    </header>

    <div class="hello">
        <h2>Bienvenue <br>sur<br> Doigts de Fée</h2>
        <p>Prenez rendez-vous dans notre espace manucure et pédicure
            ou alors venez faire un tours sur notre boutique ! </p>
    </div>
    <section>

        <div class="page manucure">

            <div class="img1">
                <img class="img-manucure" src="ressources/manucure.jpg">
            </div>
            <div class="info">
                <a class="lorem" href="manucure/manucure.php">
                    <h3>Coté Manucure</h3>
                    Venez découvrir nos différentes prestations, de la french manucure jusqu'à la pose en gel,
                    plusieurs services à votre disposition pour des mains plus belle que jamais...
                </a>
            </div>

        </div>


        <div class="page pedicure">

            <div class="info">
                <a class="lorem" href="pedicure/pedicure.php">
                    <h3>Coté Pédicure</h3>
                    Ici, nous vous proposons differents soins adaptés à vos orteils, ainsi que des poses de vernis qui sauront vous charmer...
                </a>
            </div>
            <div class="img2">
                <img class="img-pedicure" src="ressources/pedicure.jpg">
            </div>
        </div>

        <div class="page boutique">

            <div class="img3">
                <img class="img-boutique" src="ressources/boutique.jpg">
            </div>
            <div class="info">
                <a class="lorem" href="boutique/boutique.php">
                    <h3>Notre Boutique</h3>
                    Retrouvez nos meilleurs produit de soin pour vos ongles, ou encore notre selection de vernis au sein de notre boutique...
                </a>

            </div>
        </div>
        <div class="page about-us">
            <div class="info ">
                <div class="lorem" href="boutique/boutique.php">
                    <h3>À propos de nous...</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Suspendisse tempus velit feugiat vestibulum scelerisque.
                        Donec feugiat eu dolor id fermentum.
                        Ipsum dolor sit amet, consectetur adipiscing elit.
                        Suspendisse tempus velit feugiat vestibulum scelerisque.
                        Donec feugiat eu dolor id fermentum.

                        Suspendisse tempus velit feugiat vestibulum scelerisque.
                        Donec feugiat eu dolor id fermentum.</p>
                </div>

            </div>
            <div class="img4">
                <img class="img-boutique" src="ressources/unicorne.png">
            </div>

        </div>
    </section>
    <footer>2021 © Doigts de Fée </footer>



</body>
<script>
    call_script_menu();
</script>

</html>