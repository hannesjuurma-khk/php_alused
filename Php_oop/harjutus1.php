<?php

// Lisame andmebaasitöötuse funktsioonid
require_once 'database_functions.php';

// Lisame kasutusele andmebaasi serveri konfiguratsiooni
require_once 'config.php';

// Funktsioon tabeli jaoks
require_once 'output.php';

// Ühendus ikt serveris oleva andmebaasiga
$ikt = connect(HOSTNAME,USER,PASSWORD,DATABASE);

// Tabeli ümbernimetamine
/*
$sql = 'RENAME TABLE `juurmaha_php_alused`.`TABLE 1` TO juurmaha_php_alused.`koolid2015`';
query($sql,$ikt);
*/

// Andmete vaatamine -
// 1. väljastan kõik koolide andmed
$sql = 'SELECT Kool, Kokku FROM koolid2015';


$tulemus1 = query($sql,$ikt); // Kui ma tahan vaadata query funktsiooni tulemust (üldandmed)
$tulemus2 = getData($sql,$ikt);
$tabeliPealkirjad = array("Kool", 2015);
echo "<pre>";
print_r($tulemus2);
echo "<h1>Harjutus 1</h1>";

echo "Ridu kokku: ".count($tulemus2);
table($tulemus2, $tabeliPealkirjad); //- test funktsioonis pealkirjade kutsumiseks
/*
echo '<pre>';
// print_r($tulemus1);
echo "<hr>";
print_r($tulemus2);
*/


// Ühenduse vaatamine
/*
echo "<pre>";
print_r($ikt);
echo "</pre>"
*/




?>