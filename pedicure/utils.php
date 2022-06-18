<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="scripts.js"></script>
    <title>Document</title>
</head>

<body>
    <?php
    include('../utils/database.php');


    function set_card_natural($bdd)
    {
        $query = $bdd->query("SELECT id, nom, prix, duree FROM pedicure_naturelle");
        while ($res = $query->fetch()) {
            echo '<button class="' . $res['id'] . ' naturelle"><div class="card ' . $res['id'] . '">
                    <div class="img">
                        <img class="pedicure" src="../ressources/pedicure-naturelle.jpg" alt="pedicure">
                    </div>
                    <div class="info">
                        <h2>' . $res['nom'] . '</h2>
                        <p>' . $res['duree'] . '</p><p class="prix">' . $res['prix'] . '€ </p>
                    </div>
                  </div>
                  </button>';
        }
    }

    function set_card_soin($bdd)
    {
        $query = $bdd->query("SELECT id,nom, prix, duree FROM pedicure_soin");
        while ($res = $query->fetch()) {
            echo '<button class="' . $res['id'] . ' soin"><div class="card ' . $res['id'] . '">
                    <div class="img">
                        <img class="pedicure" src="../ressources/manucure-soin.jpg" alt="pedicure">
                    </div>
                    <div class="info">
                        <h2>' . $res['nom'] . '</h2>
                        <p>' . $res['duree'] . '</p><p class="prix">' . $res['prix'] . '€  </p>
                    </div>
                  </div>
                  </button>';
        }
    }

    function show_article($bdd)
    {
        $query = $bdd->query("SELECT id, nom, prix, duree FROM pedicure_naturelle ");
        while ($res = $query->fetch()) {
            echo '<div class="article article-naturelle ' . $res['id'] . '">
                    <div class="article-card" >
                        <div class="article-img">
                            <img src="../ressources/pedicure-naturelle.jpg" alt="manucure">
                        </div>
                        <div class="article-info">
                            <h2>' . $res['nom'] . '</h2>
                            <button class="X">X</button>
                            <hr>
                            <mark>Lorem ipsum dolor sit amet,
                                consectetur adipiscing elit,
                                sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat.
                                Duis aute irure dolor in reprehenderit
                                in voluptate velit esse cillum dolore eu
                                fugiat nulla pariatur.</mark>
                            <p>Durée : ' . $res['duree'] . '</p>
                            <p class="prix">PRIX: ' . $res['prix'] . '€ </p>
                            <a href="mailto:tristan45220@hotmail.fr" id="buy">
                        Réservez !
                    </a>
                        </div>
                    </div>
                    </div>';
        }

        $query3 = $bdd->query("SELECT id, nom, prix, duree FROM pedicure_soin");
        while ($res3 = $query3->fetch()) {
            echo '<div class="article article-soin ' . $res3['id'] . '">
                    <div class="article-card" >
                <div class="article-img">
                    <img src="../ressources/manucure-soin.jpg" alt="manucure">
                </div>
                <div class="article-info">
                    <h2>' . $res3['nom'] . '</h2>
                    <button class="X">X</button>
                    <hr>
                    <mark>Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt
                        ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit
                        in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur.</mark>
                    <p>Durée : ' . $res3['duree'] . '</p>
                    <p class="prix">PRIX: ' . $res3['prix'] . '€ </p>
                    <a href="mailto:tristan45220@hotmail.fr" id="buy">
                        Réservez !
                    </a>
                </div>
            </div>
            </div>';
        }
    }



    ?>
</body>

</html>