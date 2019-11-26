<?php


//Ülesanne 1 - Kuva kuupäev ja kellaaeg formaadis 20.03.2013 12:31
$aeg = mktime(12,31,0,03,20,2013);
echo date("d.m.Y G:i", $aeg);
echo "<br>";
echo "<hr>";


//Ülesanne 2 - Kuva tänane eestikeelne nädalapäev
$paevaNumber = date("N",time());
$nadalapaevad = array(
    "1" => "esmaspäev",
    "2" => "teisipäev",
    "3" => "kolmapäev",
    "4" => "neljapäev",
    "5" => "reede",
    "6" => "laupäev",
    "7" => "pühapäev",
);
$tananePaev = $nadalapaevad[$paevaNumber];

echo "Täna on ".$tananePaev.".";
echo "<br>";
echo "<hr>";


// Ülesanne 3 - Kuva eestikeelne kuupäev koos nädalapäevaga. Näiteks: 23.veebruar 2013 laupäev
$paevaNumber = date("N",time());
$kuupäevaNumber = date("d",time());
$kuuNumber = date("m",time());
$aastaNumber = date("Y",time());
$nadalapaevad = array(
    "1" => "esmaspäev",
    "2" => "teisipäev",
    "3" => "kolmapäev",
    "4" => "neljapäev",
    "5" => "reede",
    "6" => "laupäev",
    "7" => "pühapäev",
);
$kuud = array(
    "1" => "jaanuar",
    "2" => "veebruar",
    "3" => "märts",
    "4" => "aprill",
    "5" => "mai",
    "6" => "juuni",
    "7" => "juuli",
    "8" => "august",
    "9" => "september",
    "10" => "oktoober",
    "11" => "november",
    "12" => "detsember",
);

echo "Täna on: ".$kuupäevaNumber.". ".$kuud[$kuuNumber]." ".$aastaNumber." ".$nadalapaevad[$paevaNumber].".";
echo "<hr>";

//Ülesanne 4 - Leia mitu päeva on jäänud järgmise jaanipäevani. Näiteks: 2014 aasta jaanipäevani on jäänud 236 päeva!
$praeguneAeg = time(); //sekundites
$jaanipaev = mktime(0,0,0,06,24,2020);
$aegJaanini = round(($jaanipaev - $praeguneAeg) / (60 * 60 * 24),0);

echo "Rahu! Jaanipäevani on jäänud veel ".$aegJaanini." päeva.";
echo "<hr>";

//Ülesanne 4 - Minu sünnipäev on 06.11.1980! Leia kumb on meist vanem. Kuva mõlema sünnikuupäevad ning vahe aastates.
$minuSünnipäev = mktime(0,0,0,05,31,2000);
$temaSünnipäev = mktime(0,0,0,11,06,1980);
$minuSünnikuupäev = date("d.m.Y", $minuSünnipäev);
$temaSünnikuupäev = date("d.m.Y", $temaSünnipäev);
$vanuseVahe = round(($minuSünnipäev - $temaSünnipäev) / (60 * 60 * 24 * 30 * 12),0);
echo "Tema on sündinud: ".$temaSünnikuupäev."<br>";
echo "Mina olen sündinud: ".$minuSünnikuupäev."<br>";
echo "Ta on minust ".$vanuseVahe." aastat vanem";
echo "<hr>";


//Ülesanne 5 - Maailmalõpp saabub 29.02.2016! Las PHP otsustab, kas see on võimalik.
if(checkdate(02,29,2016)) {
    echo("Kuupäev korras! Meie elud on läbi! :)");
} else {
    echo ("Kuupäev on valesti sisestatud ja tegu on valede uudistega");
}
echo "<hr>";


//Ülesanne 6 - Leia, kas sul on järgmine aasta juubel?
$minuVanusSekundites = mktime(0,0,0,05,31,2000);
$minuVanus = round((time() - $minuVanusSekundites) / 31556926, 0);

if ($minuVanus % 5 == 0) {
    echo "Sul on juubeliaasta! Palju õnne!";
} else {
    echo "Ela veidi kauem, veel pole juubel";
}
echo "<hr>";


//Ülesanne 7 - Koosta kood, mis tervitab sind vastavalt ajale. N: 8:00+ “Tere hommikust!”, 13:00+ “Tere päevast!” ja 17:00+ “Tere õhtust!”
date_default_timezone_set('Europe/Tallinn');
$kellaAeg = date("G", time());
if ($kellaAeg < 8) {
    echo "Praegu on öö, miks sa veel ei maga?";
} elseif ($kellaAeg < 13) {
    echo "Tere hommikust, kaunitar!";
} elseif ($kellaAeg < 17) {
    echo "Tere päevast!";
} else {
    echo "Tere õhtust!";
}

?>