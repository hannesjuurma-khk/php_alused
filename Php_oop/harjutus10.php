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
echo "<h1>Harjutus 10</h1>";

// Küsime kõik andmed
$sql = "SELECT * FROM kliendid";
$result = getData($sql, $ikt);

// Kutsume tabeli, koos etteantud pealkirjadega
$tabeliPealkirjad = array("Eesnimi", "Perenimi", "Kontakt", "Kustuta", "Muuda");
tableKustutaJaMuuda($result, $tabeliPealkirjad);

// Kustutamine

    // Kustutatava isiku ID andmebaasist
    $kustumiseID = $_GET["kustutaID"];

    $sqlKustutamine = 'DELETE FROM kliendid WHERE id="'.$kustumiseID.'"';

    if (!empty($_GET["kustutaID"]) and strlen($_GET["kustutaID"]) > 0) {
        $result = query($sqlKustutamine, $ikt);
        if ($result !== false) {
            // taaskäivitame antud lehekülg
            header('Location: '.$_SERVER['PHP_SELF']);
        }
    }


// Muutmine

    // Klikkides "muuda" peale muudame kasutaja andmed
    if(!empty($_GET['muudaID'])){
        $id = $_GET['muudaID'];
        // Kui id käes, küsin vajalikud andmed andmebaasist
        $sql = 'SELECT * FROM kliendid WHERE id="'.$id.'"';
        $result = getData($sql, $ikt);
        // Kui andmed on olemas, lisame need vormi
        if($result !== false) {
            muudaAndmedVorm($result[0]);

        }
    }

// Kui vajutasime muuda nuppu  - siis andmed on lingis

if(!empty($_GET['muudanyyd'] == 'Muuda')){
    $id = $_GET['id'];
    $enimi = $_GET['enimi'];
    $pnimi = $_GET['pnimi'];
    $kontakt = $_GET['kontakt'];

    // Koostame uue lause
    $sql = 'UPDATE kliendid SET '.
        'enimi="'.$enimi.'", '.
        'pnimi="'.$pnimi.'", '.
        'kontakt="'.$kontakt.'" WHERE '.
        'id="'.$id.'"';
    $result = query($sql, $ikt);
    if ($result !== false) {
        // taaskäivitame antud lehekülg
        header('Location: '.$_SERVER['PHP_SELF']);
    }
}

?>