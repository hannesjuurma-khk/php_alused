<?php

// Lisame andmebaasitöötuse funktsioonid
require_once 'database_functions.php';

// Lisame kasutusele andmebaasi serveri konfiguratsiooni
require_once 'config.php';

// Funktsioon tabeli jaoks
require_once 'output.php';

// Ühendus ikt serveris oleva andmebaasiga
$ikt = connect(HOSTNAME,USER,PASSWORD,DATABASE);

// Päring
$sql = 'INSERT INTO kliendid SET enimi="Karu", pnimi="Poeg", kontakt="karu.poeg@puhh.com"';

    // Päringu alternatiivne struktureerimine
    /*
    $sql = 'INSERT INTO kliendid SET '.
        'enimi="Karu",'.
        'pnimi="Poeg",'.
        'kontakt="karu.poeg@puhh.com"';
    */

// Päringu saatmine andmebaasi
$result = query($sql, $ikt);

if($result == true) {
    echo "Andmebaasi on lisatud ".mysqli_affected_rows($ikt)." rida.<br>";
    echo "Viimane muudetud id on ".mysqli_insert_id($ikt)."<br>";
}

?>