<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    function connection_db()
    {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=mysql;charset=utf8', 'root', '');
            return $bdd;
        } catch (Exeption $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    ?>
</body>

</html>