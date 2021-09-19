
    <?php


    include('../utils/database.php');
    include('../utils/cookies.php');
    remove_cookies();


    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);




    $query = $bdd->prepare("SELECT count(1) FROM users WHERE email = :email");
    $query->execute(['email' => $email]);
    $res = $query->fetch();
    if ($res[0] != 0) {

        $query_password = $bdd->prepare("SELECT password, email, name FROM users WHERE email = :email");
        $query_password->execute(['email' => $email]);
        $res_password = $query_password->fetch();
        if (password_verify($password, $res_password['password']) == TRUE) {
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $res_password['name'];
            header("Location: ../index.php");
        } else {
            setcookie('wrong_password', true, time() + 20, '/');
            header("Location: login.php");
        }
    } else {
        setcookie('wrong_email', true, time() + 20, '/');
        header("Location: login.php");
    }



    ?>