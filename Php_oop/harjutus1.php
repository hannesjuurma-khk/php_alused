<?php

// Lisame andmebaasitöötuse funktsioonid
require_once 'database_functions.php';

// Lisame kasutusele andmebaasi serveri konfiguratsiooni
require_once 'config.php';

// Ühendus ikt serveris oleva andmebaasiga
$ikt = connect(HOSTNAME,USER,PASSWORD,DATABASE);

// Tabeli ümbernimetamine
/*
$sql = 'RENAME TABLE `juurmaha_php_alused`.`TABLE 1` TO juurmaha_php_alused.`koolid2015`';
query($sql,$ikt);
*/

// Andmete vaatamine -
// 1. väljastan kõik koolide andmed
$sql = 'SELECT * FROM koolid2015';

$tulemus1 = query($sql,$ikt); // Kui ma tahan vaadata query funktsiooni tulemust (üldandmed)
$tulemus2 = getData($sql,$ikt);
echo '<pre>';
print_r($tulemus1);
echo "<hr>";
print_r($tulemus2);




// Ühenduse vaatamine
/*
echo "<pre>";
print_r($ikt);
echo "</pre>"
*/

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