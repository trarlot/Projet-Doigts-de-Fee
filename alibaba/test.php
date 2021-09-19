<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="test.js"></script>
    <title>Document</title>
</head>

<body>
    <form method="post" action="traitement.php">
        <p>
            <select name="year" id="year">
                <option value="2021">2021</option>
                <option value="2022">2022</option>
            </select>     
            <select name="mois" id="mois">

                <?php
                $mois = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
                for ($i = 0; $i <= 11; $i++) {
                    echo ("<option id='optionMois' value=\"$mois[$i]\"");
                    echo (">$mois[$i]</option>");
                }
                ?>
            </select>
            <select name="day" id="day">
                <?php

                for ($i = 1; $i <= 31; $i++) {
                    echo ("<option value=\"$i\"");
                    echo (">$i" . "&nbsp" . "&nbsp" . "&nbsp" . "&nbsp" . "</option>");
                }
                ?>
                <script>
                    callScript()
                </script>

            </select>

        </p>
</body>

</html>