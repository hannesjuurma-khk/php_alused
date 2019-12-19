<?php

// Lisame andmebaasitöötuse funktsioonid
require_once 'database_functions.php';

// Lisame kasutusele andmebaasi serveri konfiguratsiooni
require_once 'config.php';

// Funktsioon tabeli jaoks
require_once 'output.php';

// Ühendus ikt serveris oleva andmebaasiga
$ikt = connect(HOSTNAME,USER,PASSWORD,DATABASE);

// Harjutus 9 - Andmete lisamine
echo "<h1>Harjutus 9</h1>";

// Päring andmebaasi - eesnimi, perenimi ja kontakt
$sql = 'SELECT enimi, pnimi, kontakt FROM kliendid';

// Andmebaasi tabelis "kliendid" olevad veeru nimed
$sqlVeeruNimed = "SELECT COLUMN_NAME
  FROM INFORMATION_SCHEMA.COLUMNS
  WHERE TABLE_SCHEMA = 'juurmaha_php_alused' AND TABLE_NAME = 'kliendid' AND COLUMN_NAME != 'id'";

$tulemused = getData($sqlVeeruNimed,$ikt);

print_r($tulemused);
tabel2($sql, $sqlVeeruNimed);

// Tabeli isetegemise proov :)
function tabel2($andmed, $pealkirjad) {
    echo "<table>";
    echo "<thead>";
        echo "<th>";
            foreach ($pealkirjad as $pealkiri) {
                echo "tere";
            }

        echo "</th>";
    echo "</thead>";
    echo "<tbody>";

    echo "</tbody>";
};

?>