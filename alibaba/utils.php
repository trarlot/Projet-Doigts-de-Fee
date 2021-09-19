<?php
$mois = array('JAN', 'FEV', 'MAR', 'AVR', 'MAI', 'JUI', 'JUI', 'AOU', 'SEP', 'OCT', 'NOV', 'DEC');
for ($i = 0; $i <= 11; $i++) {
    echo ("<option value=\"$mois[$i]\"");
    echo (">$mois[$i]</option>");
}
