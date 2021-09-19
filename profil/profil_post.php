<?php
session_start();

header('location: profil.php');
include('../utils/database.php');
include('../utils/cookies.php');
remove_cookies();
$old_password = $_POST['old'];
$new_password = $_POST['new'];
$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
$email = $_SESSION['email'];

$query_password = $bdd->prepare("SELECT password, email, name FROM users WHERE email = :email");
$query_password->execute(['email' => $email]);
$res_password = $query_password->fetch();
if (password_verify($old_password, $res_password['password']) == TRUE) {
    $query_new_pswd = $bdd->prepare("UPDATE users SET password = :new_password");
    $query_new_pswd->execute(['new_password' => $hashed_password]);
    setcookie('password_changed', true, time() + 20, '/');
} else {
    setcookie('wrong_password2', true, time() + 20, '/');
}
