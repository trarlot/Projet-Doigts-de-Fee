<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $bdd = new PDO('mysql:host=localhost;dbname=mysql;charset=utf8', 'root', '');



    /*
    $query = $bdd->query("SELECT * FROM jeux_video WHERE prix>35 ORDER BY prix ASC");
    $query_PC_Game = $bdd->query("SELECT * FROM jeux_video WHERE console = 'PC'");
    $query_Florent_Game = $bdd->query("SELECT COUNT(*) FROM jeux_video WHERE possesseur = 'Florent'");

    while ($res = $query->fetch()) {
        echo $res['nom'] . ' vaut ' . $res['prix'] . '€<br>';
    }
    echo '<br>';
    while ($res = $query_PC_Game->fetch()) {
        echo $res['nom'] . ' on ' . $res['console'] . '<br>';
    }
    echo '<br>';

    while ($res = $query_Florent_Game->fetch()) {
        echo 'Florent à ' . $res[0] . ' jeux.';
    }*/

    /*$user = $_POST['name'];
    $prixMax = $_POST['filter'];
    $query_count = $bdd->prepare(("SELECT count(1) FROM jeux_video WHERE possesseur = :possesseur"));
    $query_count->execute(array('possesseur' => $user));
    $query = $bdd->prepare(("SELECT nom, prix FROM jeux_video WHERE possesseur = :possesseur AND prix <= :filter1"));
    $query->execute(array('possesseur' => $user, 'filter1' => $prixMax));




    $res1 = $query_count->fetch();

    if ($res1[0] != 0) {

        echo $_POST['name'] . ' possède tous ces jeux: <br>';

        while ($res = $query->fetch()) {

            echo $res['nom'] . ' ' . $res['prix'] . '€<br>';
        }
    } else {
        echo "Cet utilisateur n'existe pas";
    }*/
    /*$nom = $_POST['name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];

    $query = $bdd->prepare("INSERT INTO user (nom, last_name, email, telephone) VALUES (:nom, :last_name, :email, :tel)");
    $query->execute(['nom' => $nom, 'last_name' => $last_name, 'email' => $email, 'tel' => $tel]);
    echo 'Bienvenu' . $nom;*/

    function maxq($bdd)
    {
        $query = $bdd->query("SELECT MAX(prix) AS prix_max FROM jeux_video");
        while ($res = $query->fetch()) {
            echo 'le prix max est ' . $res['prix_max'];
        }
    }
    function game3($bdd)
    {
        $query = $bdd->query("SELECT nom_jeu, prix FROM jeux_video ORDER BY prix ASC LIMIT 3");
        echo '<br>les jeux les moins cher son :<br>';
        while ($res = $query->fetch()) {
            echo $res['nom_jeu'] . ' : ' . $res['prix'] . '€<br>';
        }
    }

    function prix_moyen($bdd)
    {
        $query = $bdd->query("SELECT possesseur, ROUND(AVG(prix),2) AS prix_moyen FROM jeux_video GROUP BY possesseur");
        echo '<br>le prix moyen par possesseur est : <br>';
        while ($res = $query->fetch()) {
            echo $res['possesseur'] . ' : ' . $res['prix_moyen'] . '€<br>';
        }
    }

    function plus_depensier($bdd)
    {
        $query = $bdd->query("SELECT possesseur, sum(prix) AS cout_totaux FROM jeux_video GROUP BY possesseur ORDER BY cout_totaux DESC LIMIT 1");
        echo '<br>le possesseur le plus dépensier est : <br>';
        while ($res = $query->fetch()) {
            echo $res['possesseur'] . ' : ' . $res['cout_totaux'] . '€<br>';
        }
    }

    function moins_depensier($bdd)
    {
        $query = $bdd->query("SELECT possesseur, sum(prix) AS cout_totaux FROM jeux_video GROUP BY possesseur ORDER BY cout_totaux ASC LIMIT 2 ");
        echo '<br>les 2 possesseur les moins dépensier sont : <br>';
        while ($res = $query->fetch()) {
            echo $res['possesseur'] . ' : ' . $res['cout_totaux'] . '€<br>';
        }
    }

    function nb_jeux_possesseur($bdd)
    {
        $query = $bdd->query("SELECT possesseur, count(nom_jeu) AS nb_jeux FROM jeux_video  GROUP BY possesseur ");
        echo '<br>nomre de jeux par possesseur : <br>';
        while ($res = $query->fetch()) {
            echo $res['possesseur'] . ' : ' . $res['nb_jeux'] . '<br>';
        }
    }

    function posseseur_moins_jeux($bdd)
    {
        $query = $bdd->query("SELECT possesseur, COUNT(nom_jeu) AS nb_jeux FROM jeux_video  GROUP BY possesseur ORDER BY nb_jeux ASC LIMIT 2 ");
        echo '<br>les 2 possesseur qui possèdent le moins de jeux : <br>';
        while ($res = $query->fetch()) {
            echo $res['possesseur'] . ' : ' . $res['nb_jeux'] . '<br>';
        }
    }

    function console_moyenne_12($bdd)
    {
        $query = $bdd->query("SELECT console, ROUND(AVG(prix),2) AS prix_moyen FROM jeux_video GROUP BY console HAVING prix_moyen <12 ");
        echo '<br>Prix moyen des jeux de chaque console : <br>';
        while ($res = $query->fetch()) {
            echo $res['console'] . ' : ' . $res['prix_moyen'] . '€<br>';
        }
    }


    maxq($bdd);
    echo '<br>';
    game3($bdd);
    echo '<br>';
    prix_moyen($bdd);
    echo '<br>';
    plus_depensier($bdd);
    echo '<br>';
    moins_depensier($bdd);
    echo '<br>';
    nb_jeux_possesseur($bdd);
    echo '<br>';
    posseseur_moins_jeux($bdd);
    echo '<br>';
    console_moyenne_12($bdd)





    ?>



</body>

</html>