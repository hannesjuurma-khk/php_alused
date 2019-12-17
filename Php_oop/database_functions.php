<?php

// Ühenduse loomine andmebaasiga
function connect($host, $user, $password, $database){
    // Teostab ühendust andmebaasiga (kui ühendust ei ole, annab vastu "false")
    $link = mysqli_connect($host, $user,$password, $database);
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

// Päringu saatmine - ["query" tähendab päring]
// $sql - sql päring
// $link - ühendus andmebaasiga (connect)
function query($sql, $link) {
    $result = mysqli_query($link, $sql);    // Tagastab true/false või objekti
    if ($result === false) {
        echo "Probleem päringuga <b>".$sql."</b><br>";
        return false;
    }
    return $result;

}

// Funktsioon andmete väljastamiseks
function getData ($sql, $link){
    $result = query($sql, $link);
    $data = array();
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        $data[] = $row;
    }
    if (count($data) == 0) {
        return false;
    }
    return $data;
}

?>