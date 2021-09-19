<?php
session_start();
function user_connected()
{
    if (!isset($_SESSION['email']) && !isset($_SESSION['password'])) {
        header('location: ../utils/404error.php');
    }
}
user_connected();

$name = $_SESSION['name'];
$email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../utils/style_menu.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script type="text/javascript" src="../utils/scripts_menu.js"></script>

    <title>Document</title>
</head>

<body>
    <header>
        <?php
        include('../utils/menu.php')
        ?>
        <h2>Profil</h2>
    </header>
    <section>
        <div class="profil">
            <div class="id">
                <?php
                echo '<div class="type">Nom </div><div> ' . $name . '</div><hr>';
                echo '<div class="type">Adresse mail </div><div> ' . $email . '</div><hr>';
                ?>
            </div>

            <p>Changer de mot de passe :</p>
            <form action="profil_post.php" method="POST">
                <div class="mdp">Ancien mot de passe : <input type="password" name="old" required>
                    <br>
                    <?php
                    if (isset($_COOKIE['wrong_password2'])) {
                        echo '<div style="color: red;">Mot de passe incorrect.</div>';
                    }
                    ?>
                </div>

                <div class="mdp">Nouveau mot de passe : <input type="password" name="new" required>

                </div>
                <input class="btn" type="submit">
            </form>
            <?php
            if (isset($_COOKIE['password_changed'])) {
                echo '<div style="color: green;">Votre mot de passe à été modifié.</div>';
            }
            ?>

        </div>
        <a class="log-out" href="../login/login.php">Se Déconnecter</a>

    </section>
    <?php
    include('../utils/footer.php')
    ?>

</body>
<script>
    call_script_menu();
</script>

</html>