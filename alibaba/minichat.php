<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="minichat_post.php" method="POST">
        <input placeholder="Votre pseudo" type="text" name="pseudo"><br>
        <input placeholder="Votre message" type="text" name="msg"><br>
        <input type="submit">
    </form>


    <div class="chat">
        <?php
        include('database.php');
        connection_db();
        $bdd = connection_db();

        $query_msg = $bdd->query("SELECT * FROM (SELECT id, pseudo, msg, DATE_FORMAT(date_msg, '%d/%m-%Hh%im') AS date_ FROM chat ORDER BY id DESC LIMIT  4) AS Q2 ORDER BY id ASC");


        while ($res = $query_msg->fetch()) {

            echo '  <mark>' . $res['date_'] . '</mark> |' . ' <bold>' . $res['pseudo'] . '</bold> : ' . $res['msg'] . '<br>';
        }

        ?>
    </div>
    <style>
        mark {
            color: grey;
            font-size: 10px;
            background-color: white;
        }
    </style>
</body>

</html>