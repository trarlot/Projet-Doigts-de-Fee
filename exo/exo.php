<?php
session_start();
function user_connected()
{
    if (!isset($_SESSION['email'])) {
        header('location: ../utils/404error.php');
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
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Document</title>
</head>

<body>
    <header>
        <div class="navbar">
            <a id="home" href="../index.php">Accueil </a>|
            <a id="manucure" href="../manucure/manucure.php">Manucure </a>|
            <a id="pedicure" href="../pedicure/pedicure.php">Pédicure </a>|
            <a id="boutique" href="../boutique/boutique.php">Boutique </a>|
            <a id="profil" href="../profil/profil.php">Votre Profil</a>
        </div>
        <div class="banner">
            <img src="../ressources/img_the_best_shop\background_2.jpg" class="header">
        </div>
    </header>
    <section>
        <div class="products">
            <img src="../ressources\img_the_best_shop\luffy.png" class="fig">
            <img src="../ressources\img_the_best_shop\ryu.png" class="fig">
            <img src="../ressources\img_the_best_shop\saint_seiya.png" class="fig">
            <img src="../ressources\img_the_best_shop\naruto.webp" class="fig">
            <img src="../ressources\img_the_best_shop\son_goku.webp" class="fig">
            <img src="../ressources\img_the_best_shop\hinata.png" class="fig">
            <img src="../ressources\img_the_best_shop\jurassic.png" class="fig">
            <img src="../ressources\img_the_best_shop\jurassic.png" class="fig">
        </div>
    </section>

</body>

</html>