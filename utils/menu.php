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
<a class="icon" href="../shopping_cart/shopping_cart.php">
    <img src="../ressources/shopping_cart.png">
    <?php
    if (isset($_COOKIE['added_to_shopping_cart'])) {
        echo '<p class="dote">●</p>';
    }
    ?>

</a>



</div>
<div class="navbar-burger">
    <h2>Menu</h2>

    <a id="home" href="../index.php">Accueil </a>
    <a id="manucure" href="../manucure/manucure.php">Manucure </a>
    <a id="pedicure" href="../pedicure/pedicure.php">Pédicure</a>
    <a id="boutique" href="../boutique/boutique.php">Boutique</a>
    <a id="profil" href="../profil/profil.php">Votre Profil</a>

</div>
<div class=" background close">

</div>


<div class="navbar">
    <a id="home" href="../index.php">Accueil </a>
    <a id="manucure" href="../manucure/manucure.php">Manucure</a>
    <a id="pedicure" href="../pedicure/pedicure.php">Pédicure</a>
    <a id="boutique" href="../boutique/boutique.php">Boutique</a>

    <a id="profil" href="../profil/profil.php">Votre Profil</a>
</div>
<hr>