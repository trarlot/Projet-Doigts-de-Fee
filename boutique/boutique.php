<?php
session_start();
function user_connected()
{
    if (!isset($_SESSION['email'])) {
        header('location: ../utils/404error.php');
    }
}
user_connected();
include('../utils/database.php');
include('../utils/cookies.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../utils/style_menu.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript" src="scripts.js"></script>
    <title>Boutique | Doigt de Fée</title>
</head>

<body>
    <header>
        <?php
        include('../utils/menu.php')
        ?>

        <div class="onglets">
            <form action="boutique.php" method="POST">
                <input type="submit" name="cream" value="Crèmes">
                <input type="submit" name="huile" value="Huiles">
                <input type="submit" name="vernis" value="Vernis">
            </form>
        </div>

    </header>


    <section>
        <div class="naturelle section-card ">
            <?php
            //Si aucune requete POST est presente, on affiche la section crème, qui sera la section par defaut
            if (!isset($_POST['cream']) && !isset($_POST['huile']) && !isset($_POST['vernis'])) {
                echo '<p id="title_section">Crèmes</p>';
                $query = $bdd->query("SELECT id, name, description, prix, type, img_products FROM products WHERE type = 'cream' ");
                while ($res = $query->fetch()) {
                    echo '<button onclick=window.location.href="http://doigtsdefee.org/boutique/article.php?ref=' . $res['id'] . '">
                    <div class="card ' . $res['id'] . '">
                        <div class="img">
                            <img src="../ressources/' . $res['img_products'] . '" alt="manucure">
                        </div>
                        <div class="info">
                            <h2>' . $res['name'] . '</h2>
                            <p class="prix">' . $res['prix'] . '€ </p>
                        </div>
                    </div>
                    </button>';
                }
            } else {

                /*Si les POST exist: On check les variable POST pour recupérer les trois input (onglets) 
                creme, huiles, vernis,pour les afficher lorsqu'on click dessus*/
                foreach ($_POST as $key => $val) {

                    $button_selected = $key;
                    echo '<p id="title_section">' . $val . '</p>';

                    $query2 = $bdd->prepare("SELECT id, name, description, prix, type, img_products FROM products WHERE type = :onglet ");
                    $query2->execute(array('onglet' => $button_selected));
                    while ($res2 = $query2->fetch()) {
                        echo '<button onclick=window.location.href="article.php?ref=' . $res2['id'] . '">
                    <div class="card ' . $res2['id'] . '">
                        <div class="img">
                            <img src="../ressources/' . $res2['img_products'] . '" alt="manucure">
                        </div>
                        <div class="info">
                            <h2>' . $res2['name'] . '</h2>
                            <p class="prix">' . $res2['prix'] . '€ </p>
                        </div>
                    </div>
                    </button>';
                    }
                }
            }


            ?>

            <?php

            ?>


    </section>
    <?php
    include('../utils/footer.php')
    ?>



</body>

</html>
<script>
    call_script();
</script>