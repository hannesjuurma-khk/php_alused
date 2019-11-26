<h1>Tellimine</h1>
<?php
//Kasutaja sisend tuleb alati sõne kujul
    //get - $_GET
    //post - $_POST
    //var_dump($_GET); - näed sisestatud andmed suurema koguse metadata-ga
echo "<pre>";
print_r($_GET); //näed sisestatud andmeid väiksema metadata-ga
echo "</pre>";

$toode1 = $_GET["t1"];
$toode2 = $_GET["t2"];
$toode3 = $_GET["t3"];

echo "Toode 1: ".$toode1."tk <br>";
echo "Toode 2: ".$toode2."tk <br>";
echo "Toode 3: ".$toode3."tk <br>";

?>

