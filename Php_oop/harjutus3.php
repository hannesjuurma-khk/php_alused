<?php

// Lisame andmebaasitöötuse funktsioonid
require_once 'database_functions.php';

// Lisame kasutusele andmebaasi serveri konfiguratsiooni
require_once 'config.php';

// Funktsioon tabeli jaoks
require_once 'output.php';

// Harjutus 1 getData

// Ühendus ikt serveris oleva andmebaasiga
$ikt = connect(HOSTNAME,USER,PASSWORD,DATABASE);

// Otsinguvormi väljastamine
otsinguVorm();

// Vormist tulnud andmete kasutamine
if(isset($_GET['otsi'])){ // Kui on olemas element "otsi"
    // Salvestame otsingu väärtuse
    $otsi = $_GET['otsi'];
    // Päringu koostamine
    $sql = 'SELECT 2015,Kool FROM koolid2015 WHERE Kool LIKE "%'.$otsi.'%"';
    // Saadame päringu andmebaasi
    $result = getData($sql, $ikt);
    // Kui andmed on olemas
    if($result !== false){
        // Väljastame need andmed
        $pealkirjad = array("2015", "Kool");
        table($result, $pealkirjad);

    }
}
?>