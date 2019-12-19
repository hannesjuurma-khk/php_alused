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
echo "<h1>Harjutus 5</h1>";

// Vormi väljastamine
lisaAndemedVorm();

// Kontrollime andmete olemasolu
if(isset($_GET['enimi']) && isset($_GET['pnimi']) && isset($_GET['kontakt'])){
    $enimi = $_GET['enimi'];
    $pnimi = $_GET['pnimi'];
    $kontakt = $_GET['kontakt'];
    if(strlen($enimi) > 0 and strlen($pnimi) > 0 and strlen($kontakt) > 0) {
        $sql = 'INSERT INTO kliendid SET '.
            'enimi="'.$enimi.'",'.
            'pnimi="'.$pnimi.'",'.
            'kontakt="'.$kontakt.'"';
        // Salvestame andmed andmebaasi
        $result = query($sql, $ikt);
        if($result) {
            echo "Andmebaasi on lisatud ".mysqli_affected_rows($ikt)." rida <br>";
            echo "Viimane muudetud id on ".mysqli_insert_id($ikt)."<br>";
            // Küsi kõikide klientide andmed andmebaasist
            $sql2 = 'SELECT enimi, pnimi, kontakt FROM kliendid';
            $result = getData($sql2, $ikt);
            // Väljastame tabeli
            $tabeliPealkirjad = array("Eesnimi", "Perenimi", "Kontakt");
            table($result, $tabeliPealkirjad);
        } else {
            echo "Midagi on puudu";
        }

    } else {
        echo "Midagi on puudu";
    }

}








?>