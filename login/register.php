<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles2.css">
    <title>Login | Doig de fée </title>
</head>

<body>
    <article>
        <header>
            <div>
                <h1>
                    Doigt de Fée
                </h1>
                <h2>Inscrivez-vous !</h2>
            </div> required

        </header>
        <section>
            <div class="img">
                <img src="../ressources/login-banniere.jpg" alt="manucure">
            </div>

            <form action="register_post.php" method="POST">

                <input placeholder="Prénom" type="text" name="first-name" required>
                <input placeholder="Nom" type="text" name="second-name" required>
                <?php
                if (isset($_COOKIE['email_already_exist'])) {
                    echo "<div class='error'>Cette email est déjà enregistrer</div>
                    <style>
                    .red{
                    border : solid red 1px;
                    }
                    </style>";
                }
                ?>
                <input class="red" placeholder="E-mail" type="email" name="email" required>
                <input placeholder="Mot de passe" type="password" name="password" required>

                <input class='submit' type="submit" value="S'inscrire">

            </form>
        </section>
        <footer>
            <a href="login.php">Vous êtes déjà inscris ? Connectez-vous !</a>
        </footer>
    </article>
    <footer id='footer'>
        <div>2021 © Doigts de Fée</div>
    </footer>
</body>

</html>