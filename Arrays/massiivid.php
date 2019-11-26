<?php

// Ül. 1 - Õppeained
$oppeained = array("Matemaatika", "Veebidisaini alused", "Programmeerimine", "Kontoritöö tarkvara", "Inglise keel");
sort($oppeained);
foreach ($oppeained as $oppeaine) {
    echo "$oppeaine <br>";
}
echo "<br>";


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



// Ül. 3 - Raamatud
$raamatud = array(
    "It" => array("Raamatu pealkiri" => "It","Autor" => "Stephen King","Žanr" => "Õudus", "Aasta" => 1986),
    "Hunger Games" => array("Raamatu pealkiri" => "Hunger Games","Autor" => "Suzanne Collins","Žanr" => "Ulme", "Aasta" => 2008),
    "Last Stop Tokyo" => array("Raamatu pealkiri" => "Last Stop Tokyo","Autor" => "James Buckler","Žanr" => "Krimi", "Aasta" => 2017)
);
$raamatute_arv = count($raamatud);
sort($raamatud);

foreach ($raamatud as $raamat => $andmed) {
    echo "<br>";
    foreach ($andmed as $voti => $vaartused ) {
        echo $voti.": ".$vaartused."<br>";
    }
}
echo "<br>";
echo "Kogu raamatute arv: ".$raamatute_arv;

?>
