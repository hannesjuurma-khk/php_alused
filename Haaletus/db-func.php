<?php

// Ühenduse loomine andmebaasiga
function connect($host, $user, $password, $database){
    // Teostab ühendust andmebaasiga (kui ühendust ei ole, annab vastu "false")
    $link = mysqli_connect($host, $user, $password, $database);
    // Kui ühendust ei tekkinud
    if ($link === false) {
        echo "Probleem andmebaasi ühendamisega<br>";
        // Exit paneb kõik järgnevad tegevused kinni, isegi kui midagi võiks juhtuda veel. Siis pole nt else vaja
        exit;
    }
    mysqli_set_charset($link,"utf8");
    // Olemasoleva ühenduse tagastame põhiprogrammile
    return $link;
}


?>