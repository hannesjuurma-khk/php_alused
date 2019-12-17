<?php

// Lisame andmebaasitöötuse funktsioonid
require_once 'database_functions.php';

// Lisame kasutusele andmebaasi serveri konfiguratsiooni
require_once 'config.php';

// Funktsioon tabeli jaoks
require_once 'output.php';

// Ühendus ikt serveris oleva andmebaasiga
$ikt = connect(HOSTNAME,USER,PASSWORD,DATABASE);

// Pealkiri
echo "<h1>Harjutus 6</h1>";

    // Päring kustutamiseks
    /*
    $sql = 'DELETE FROM kliendid WHERE id="2"';
    if($result !== false) {
        echo mysqli_affected_rows($ikt)." rida on ära kutustatud";
    }
    */

// Küsime kõik andmed
$sql = "SELECT * FROM kliendid";
$result = getData($sql, $ikt);

// Kutsume tabeli, koos etteantud pealkirjadega
$tabeliPealkirjad = array("Eesnimi", "Perenimi", "Kontakt", "Kustuta");
tableKustuta($result, $tabeliPealkirjad);

// Kustutamine andmebaasist
$kustumiseID = $_GET["kustutaID"];

$sqlKustutamine = 'DELETE FROM kliendid WHERE id="'.$kustumiseID.'"';
if (!empty($_GET["kustutaID"]) and strlen($_GET["kustutaID"]) > 0) {
    $result = query($sqlKustutamine, $ikt);
    if($result !== false) {
        // Taaskäivita lehekülg - JavaScript
        /*
        echo '<script type="text/javascript">
           window.location = "http://juurmahannes.ikt.khk.ee/php_alused/Php_oop/harjutus6.php"
              </script>';
        */
        // Taaskäivita lehekülg
        header("location: http://juurmahannes.ikt.khk.ee/php_alused/Php_oop/harjutus6.php?");
        echo("<meta http-equiv='refresh'>");


    }

}



?>