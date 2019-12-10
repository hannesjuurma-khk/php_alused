<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sõiduaeg</title>
    <style>
        table, tr, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

    </style>
</head>
<body>
<h1>Teekonna kalkulaator</h1>
<form action="soidu_ajad.php" method="get">
    <div id="algus">
        <label for="algusAeg">Sisestage teekonna algusaeg:</label>
        <input type="text" id="algusAeg" name="algusAeg" placeholder="HH:MM">
    </div>
    <div id="lopp">
        <label for="loppAeg">Sisestage teekonna lõppaeg:</label>
        <input type="text" id="loppAeg" name="loppAeg" placeholder="HH:MM">
    </div>
    <input type="submit" value="Arvuta">
</form>
</body>
</html>
<?php
//Sõiduaeg – leia auto sõiduaeg tundides ja minutites. Arvutused teosta kasutajalt saadud andmete põhjal, kus kasutaja lisab stardi ja lõppaja kujul hh:mm. Eeldame, et sõiduaeg jääb ühe ööpäeva sisse. Lisa tühja välja kontroll ja näiteks, kas lisatud ajad on vähemalt viis sümbolit pikad.

//Avatav fail
$andmeteAsukoht = "soiduajad.csv";

//Inimeste input-id
$algusAeg = $_GET["algusAeg"];
$loppAeg = $_GET["loppAeg"];
//Muudan saadud ajad kasutades strtotime sekunditeks
$teekondMinutites = (strtotime($loppAeg) - strtotime($algusAeg)) / 60;
$teekondTundides = round((strtotime($loppAeg) - strtotime($algusAeg)) / 3600,2);

if($algusAeg === "" or $loppAeg === "" or strlen($loppAeg) !== 5 or strlen($algusAeg) !== 5) {
    echo "Palun sisesta andmed korrektselt - midagi on valesti!";
} else {
    echo "<table>";
    echo "<tr>";
    echo "<td>Alustusaeg</td>";
    echo "<td>Lõpetusaeg</td>";
    echo "<td>Soiduaeg minutites</td>";
    echo "<td>Soiduaeg tundides</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>".$algusAeg."</td>";
    echo "<td>".$loppAeg."</td>";
    echo "<td>".$teekondMinutites."</td>";
    echo "<td>".$teekondTundides."</td>";
    echo "</tr>";
    echo "</table>";
}
$andmeRida = $algusAeg.";".$loppAeg.";".$teekondMinutites.";".$teekondTundides."\n";
file_put_contents($andmeteAsukoht,$andmeRida , FILE_APPEND);

$minuAndmed = fopen($andmeteAsukoht, r);
echo "<hr>";
// Palkade võrdlus – kasuta tootajad.csv andmefaili, kuhu on lisatud töötajate nimed, sugu ja palganumber. Koosta programm, mis analüüsib kas firmas toimub diskrimineerimist soo järgi. Too välja meeste ja naiste palkade keskmiseid ja kõige suuremad palgad.

$inimesteAndmed = "tootajad.csv";

$andmeteLugemine = fopen($inimesteAndmed, "r") or die("Sellist faili ei ole!");
$ridaAndmetest = fgetcsv($andmeteLugemine, filesize($inimesteAndmed), ";");
var_dump($ridaAndmetest);

while(!feof($andmeteLugemine)) {


}



?>