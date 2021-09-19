
    <?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=doigtdefee;charset=utf8', 'root', '');
        return $bdd;
    } catch (Exeption $e) {
        die('Erreur: ' . $e->getMessage());
    }


    ?>
