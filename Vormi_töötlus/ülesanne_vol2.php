<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Tere tulemast minu kalkulaatori lehele!</h1>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="get"> <!-- Viis kuidas andmed saata samale leheküljele -->
    <div>
        <h2>Kera ruumala</h2>
        <label for="raadius">Sisestage ringi raadius: </label>
        <input type="text" id="raadius" name="raadius">
    </div>
    <div>
        <h2>Koonuse ruumala</h2>
        <label for="raadius2">Sisestage ringi raadius: </label>
        <input type="text" id="raadius2" name="raadius2">
        <br>
        <label for="korgus">Sisestage koonuse kõrgus: </label>
        <input type="text" id="korgus" name="korgus">
    </div>
    <div>
        <h2>Silindri ruumala</h2>
        <label for="raadius3">Sisestage silindri raadius: </label>
        <input type="text" id="raadius3" name="raadius3">
        <br>
        <label for="korgus2">Sisestage silindri kõrgus: </label>
        <input type="text" id="korgus2" name="korgus2">
    </div>
    <br>
    <input type="submit" value="Leia vastused">
</form>
</body>
</html>

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

/*
echo "<pre>";
print_r($_SERVER);  - Sellega saab vaadata serveri massiiv, kus on palju infot serveri kui ka dokumentide kohta
echo "</pre>";
*/

?>