<?php
header('Location: minichat.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <?php
    include('database.php');
    connection_db();
    $bdd = connection_db();

    $pseudo = $_POST['pseudo'];
    $msg = $_POST['msg'];
    $query = $bdd->prepare("INSERT INTO chat (pseudo,msg) VALUES (:pseudo, :msg)");
    $query->execute(array('pseudo' => $pseudo, 'msg' => $msg));



    ?>
</body>

</html>