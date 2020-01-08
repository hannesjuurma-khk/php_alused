<?php

require_once "config.php";
require_once "database_functions.php";
require_once "output.php";
$ikt = connect(HOSTNAME,USER,PASSWORD,DATABASE);


if(!empty($_POST["nimi"]) and !empty($_POST["parool"])) {
    $nimi = $_POST["nimi"];
    $parool = $_POST["parool"];

    // Pärime antud nimega kasutajat andmebaasist

    $kasutajaParing = 'SELECT * FROM kasutajad WHERE nimi="'.$nimi.'" AND parool ="'.md5($parool).'"';
    $result = getData($kasutajaParing, $ikt);

    //Loome sessiooni antud kasutaja jaoks
    session_start();
    $_SESSION['kasutaja'] = $result[0]['nimi']; // Salvestame kasutajanime

}
//Sessiooni kontroll
/*
echo "<pre>";
print_r($_SESSION);
*/

// Kui sessioon antud kasutajale on loodud, ütleme "Tere tulemast!"
if(!empty($_SESSION["kasutaja"])) {
    echo "Tere tulemast, ".$_SESSION["kasutaja"]."!<br>";
    echo "<a href='logout.php'>Logige välja</a>";
} else {
    // Kutsun vormi sisselogimiseks
    loginForm();
}

?>