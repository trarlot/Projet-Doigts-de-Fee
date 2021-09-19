<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>

    <?php
    include('../utils/database.php');
    include('../utils/cookies.php');
    remove_cookies();


    $name = htmlspecialchars($_POST['first-name']) . ' ' . htmlspecialchars($_POST['second-name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query1 = $bdd->prepare("SELECT count(1) FROM users WHERE email = :email");
    $query1->execute(['email' => $email]);
    $res1 = $query1->fetch();

    if ($res1[0] == 0) {
        $query = $bdd->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $query->execute(['name' => $name, 'email' => $email, 'password' => $hashed_password]);
        setcookie('successfull_registration', true, time() + 300, '/');
        header('Location: login.php');
    } else {
        setcookie('email_already_exist', true, time() + 300, '/');
        header('Location: register.php');
    }
    ?>
</body>

</html>