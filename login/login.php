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
    <script type="text/javascript" src="scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Login | Doig de fée </title>
</head>

<body>
    <article>
        <header>
            <div>
                <h1>
                    Doigt de Fée
                </h1>
                <h2>Connectez-vous !</h2>
            </div>

        </header>
        <section>
            <div class="img">
                <img src="../ressources/login-banniere.png" alt="manucure">
            </div>

            <form action="login_post.php" method="POST">

                <input placeholder="E-mail" type="email" name="email" required>
                <input placeholder="Mot de passe" type="password" name="password" required>
                <?php
                if (isset($_COOKIE['wrong_password'])) {
                    echo '<div class="error">Mot de passe incorrect.</div>';
                }
                if (isset($_COOKIE['wrong_email'])) {
                    echo '<div class="error">Cet e-mail ne correspond à aucun compte.</div>';
                }

                ?>
                <input class="submit" type="submit">

            </form>
        </section>
        <footer>
            <a href="register.php">Vous ne possédez pas de compte ? Inscrivez-vous!</a>
        </footer>
    </article>
    <footer id='footer'>
        2021 © Doigts de Fée
    </footer>
</body>

</html>