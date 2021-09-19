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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="../utils/style_menu.css">
    <script type="text/javascript" src="scripts.js"></script>

    <title>Manucure | Doigt de Fée</title>
</head>

<body>
    <header>
        <?php
        include('../utils/menu.php')
        ?>

        <div class="onglets">
            <button id="naturelle">Manucure naturelle</button>
            <button id="artificielle">Manucure artificielle</button>
            <button id="soin">Soin</button>
        </div>

    </header>


    <section>


        <?php
        include('utils.php');

        show_article($bdd);
        ?>
        <div class="naturelle section-card ">
            <?php
            set_card_natural($bdd);
            ?>


        </div>
        <div class="artificielle section-card " style="display: none;">
            <?php
            set_card_artificial($bdd);
            ?>
        </div>
        <div class="soin section-card " style="display: none;">
            <?php
            set_card_soin($bdd);
            ?>
        </div>

    </section>
    <?php
    include('../utils/footer.php')
    ?>




</body>

</html>
<script>
    call_script();
</script>