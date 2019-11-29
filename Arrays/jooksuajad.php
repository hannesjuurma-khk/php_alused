<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
        }
        #tava {
            font-size: 1rem;
        }
        #bold {
            color: green;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
<div id="andmed">
    <h1>60-meetri jooksu tulemused 2019</h1>
</div>
</body>
</html>

<?php
//JOOKSUAJAD – Jüri, Mari, Kati, Mati, Juuli ja Maali osalesid 60m jooksus ning saavutasid ajad vastavalt 11.5, 10.7, 9.5, 11.7, 10.2 ja 9.4.
//Kasuta massiivides sama järjestust ning sinu ülesandeks on väljastada esikolmik koos kohanumbri ja nimega.


//Kasutades assotsiatiivseid massiive
/*
//Array tulemuste ja inimeste jaoks
$jooksjad = array(
    "Jüri" => 11.5,
    "Mari" => 10.7,
    "Kati" => 9.5,
    "Mati" => 11.7,
    "Juuli" => 10.2,
    "Maali" => 9.4,
    "Georg" => 7.4,
);
//Väljastan kõikide jooksjate tulemused
foreach ($jooksjad as $nimed => $aeg) {
    echo "<p id='tava'>".$nimed." - ".$aeg."</p>";

}
//Sorteerib value'de põhjal array järjekorda (väiksest suuremaks)
asort($jooksjad);
//Muutuja, mis defineerib, mitu väljundit väljastada
$muutuja = 1;
//Väljastan esimesed 3 kohta
foreach ($jooksjad as $nimed => $aeg) {
    echo "<p id='bold'>".$muutuja.". koha sai ".$nimed." ajaga ".$aeg."</p>";
    ++$muutuja;
    if ($muutuja == 4) {
        break;
    }
}
*/

//Kasutades mitut array-d

$nimed = array("Jüri", "Mari", "Kati", "Mati", "Juuli", "Maali");
$jooksuAjad = array(11.5, 10.7, 9.5, 11.7, 10.2, 9.4);
//Sorteerin array "$nimed" array "$jooksuajad" järgi (suuruselt kasvavalt - numbrid).
array_multisort($jooksuAjad,SORT_ASC, SORT_NUMERIC, $nimed);
//Kombineerin sorteeritud array'd omavahel
$edetabel = array_combine($jooksuAjad,$nimed);
//Slice'in esimesed 3 olevat suurust eraldi muutujasse, et saada top 3
$top3 = array_slice($edetabel, 0,3);
//Väljastan kõik jooksjad
foreach ($edetabel as $ajad => $nimed) {
    echo "<p id='tava'>".$nimed." - ".$ajad."</p>";
}
//Väljastan $top3 iga rea ning lisan muutuja, et saada numbrid kohtadele ette.
$muutuja = 1;
foreach ($top3 as $ajad => $nimed) {
    echo "<p id='bold'>".$muutuja.". koha sai ".$nimed." ajaga ".$ajad."</p>";
    ++$muutuja;
}

?>

