<?php
//Selleks et testida GET meetodit ilma vormita, lisada veebilehe lõppu nt failinimi.php?getMuutuja=väärtus.


// Ül.1 - Kasutaja lisab vormi nime, seda näiteks suured ja väikesed tähed läbisegi. Sina kood tervitab teda kenasti nimepidi, kus nimi algab suure algustähega. Näiteks: sisend–>mARiO; väljund–>Tere, Mario!

$nimi = $_GET["nimi"];
$muudetudNimi = ucfirst(strtolower($nimi));  //Muudan kõigepealt nime väikesteks tähtedeks ja siis omakorda veel suure esitähe.
echo "Tere, ".$muudetudNimi.", pole ammu teid näinud!";
echo "<hr>";
// Ül.2 - Kuna on teada, et PHP käsitleb teksti kui massiivi, siis peaks saama seda tsükli abil nö. tükeldada. Ülesandeks on etteantud teksti iga tähe järgi lisada punkt. Näiteks: sisend–>stalker; väljund–>S.T.A.L.K.E.R.

$sisend = $_GET["sisend"];
$muudetudSisend = strtoupper($sisend);

//Ül.3 - Kuna foreach on mõeldud array jaoks, tuleb muuta muudetudSisend arrayks. Selleks kasutan str_split, mis teeb iga tähe eraldi array osaks
foreach (str_split($muudetudSisend,1) as $taht) {
    echo $taht.".";
}
echo "<hr>";

//Ül.4 Koosta tekstiväli, mis kuvab kasutaja sisestatud sõnumeid. Kasutaja ropud sõnad asendatakse tärnidega.
//Näiteks: sisend–>Sa oled täielik noob; väljund–>Sa oled täielik ***
$lause = $_GET["lause"];
$ropudSonad = array("noob","jobu","pahapoiss","koaala");


foreach ($ropudSonad as $ropendamine) {
    $halbSonaAsendus = "";
    for($kordaja = 1; $kordaja <= strlen($ropendamine); $kordaja++) {
        $halbSonaAsendus .= "*";
    }

    if (strpos($lause, $ropendamine, 0) !== false) {
        $asenduseAlgus = strpos($lause, $ropendamine, 0);
        $asendusePikkus = strlen($ropendamine);
        $lause = substr_replace($lause, $halbSonaAsendus, $asenduseAlgus,$asendusePikkus);
    }
}
echo $lause;
echo "<hr>";
//Ül. 4 - Kasutajalt saadud eesnime ja perenime põhjal luuakse talle email lõpuga @hkhk.edu.ee. Kusjuures täpitähed asendatakse ä->a, ö->o, ü->y, õ->o ja kogu email on väikeste tähtedega
//Näiteks: sisend–>Ülle ja Doos; väljund–>ylle.doos@hkhk.edu.ee

$taisNimi = $_GET['taisNimi'];
$asendus = array(
    'ä' => 'a',
    'ö' => 'o',
    'ü' => 'u',
    'õ' => 'o',
    'Ä' => 'A',
    'Ö' => 'O',
    'Ü' => 'U',
    'Õ' => 'O',
);
foreach ($asendus as $algus=>$parast){
   $taisNimi = str_replace($algus, $parast ,$taisNimi);
}
$tyhikuIndeks = strpos($taisNimi, " ", 0);
$nimi = strtolower(substr($taisNimi, 0, $tyhikuIndeks));
$taisNimi = substr($taisNimi, $tyhikuIndeks+1);
$tyhikuIndeks = strpos($taisNimi, " ");
$perenimi = strtolower(substr($taisNimi,$tyhikuIndeks+1));
$email = $nimi.".".$perenimi."@gmail.com";
echo $email;

?>
