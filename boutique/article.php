<?php
session_start();
function user_connected()
{
    if (!isset($_SESSION['email'])) {
        header('location: ../utils/404error.php');
    }
}
user_connected();
include('../utils/database.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="article_styles.css">
    <link rel="stylesheet" type="text/css" href="../utils/style_menu.css">


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


        <?php

        $article = $_GET['ref'];

        $query = $bdd->prepare("SELECT id, name, description, prix, type, img_products FROM products WHERE id = :article ");
        $query->execute(array('article' => $article));
        while ($res = $query->fetch()) {
            echo ' <div class="article-card">
            <div class="article-img">
                <img src="../ressources/' . $res['img_products'] . '" alt="manucure" style="display: hidden;">
            </div>
            <div class="article-info">
            
                <h2>' . $res['name'] . '</h2>
                <hr>
                <p class="prix">' . $res['prix'] . ' € </p>
                <mark>' . '<h2>Description : </h2>' . $res['description'] . '</mark>

            </div>
            <div class="details">
            <p class="prix_details">' . $res['prix'] . ' € </p>
            <hr>
            <p class="livraison">Livrason Gratuite : Expédié sous 3 à 4 jours ouvrés.</p>
            <hr>
           
            <a href="../shopping_cart/shopping_cart.php?article=' . $res['id'] . '&quantity=1&price=' . $res['prix'] . '" id="buy">
                <p>Ajouter au panier</p>
            </a>
            </div>
            
        </div>';
        }
        ?>




    </section>


    <footer>2021 ©</footer>



</body>

</html>
<script>
    call_script();
</script>
<?php

?>