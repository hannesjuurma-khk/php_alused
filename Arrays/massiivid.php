<?php

// Ül. 1 - Õppeained
$oppeained = array("Matemaatika", "Veebidisaini alused", "Programmeerimine", "Kontoritöö tarkvara", "Inglise keel");
sort($oppeained);
foreach ($oppeained as $oppeaine) {
    echo "$oppeaine <br>";
}

// Ül. 2 - Pallivise
$nimed = array('Martin','Hardi','Juhan','Tiina','Sirje','Kaie');
$pallivisked = array(33, 32, 27, 11, 15, 28);

$osalejate_arv = count($nimed);
$keskmine_vise = round(array_sum($pallivisked) / $osalejate_arv,0);
$korgeim_tulemus = max($pallivisked);
$parim_indeks = array_combine($nimed, $pallivisked);
$parim_viskaja = array_keys($parim_indeks, $korgeim_tulemus);



echo "Osalejate arv: ".$osalejate_arv."<br>";
echo "Keskmine pallivise: ".$keskmine_vise."<br>";
echo "Kaugeim pallivise: ".$korgeim_tulemus."<br>";
echo "Parim viskaja: ".$parim_viskaja[0]."<br>";
?>
