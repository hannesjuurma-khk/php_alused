<?php
//Andmed kasutajalt
$raadius = $_GET["raadius"];
$raadius2 = $_GET["raadius2"];
$raadius3 = $_GET["raadius3"];
$korgus = $_GET["korgus"];
$korgus2 = $_GET["korgus2"];

$kera_ruumala = (4 * pi() * pow($raadius, 3)) / 3;
$koonuse_ruumala = (pi() * pow($raadius, 2) * $korgus) / 3;
$silindri_ruumala = pi() * pow($raadius, 2) * $korgus;

echo "Kera raadius on ".$raadius." ning kera ruumala on ".round($kera_ruumala,0)."<br>";
echo "Koonuse raadius on ".$raadius2." ning koonuse ruumala on ".round($koonuse_ruumala,0)."<br>";
echo "Silindri raadius on ".$raadius3." ning silindri ruumala on ".round($silindri_ruumala,0)."<br>";


?>