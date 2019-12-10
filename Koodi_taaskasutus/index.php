<!doctype html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<!-- Kõigepealt koostan menüü, kus ma panen lehed index.php-le juurde GET meetodi moel (?muutuja = ...). See tähendab, et ma saan GET-meetodiga kontrollida muutuja "leht" tagust ning kui leidub selline leht, siis see laeb include abil selle sisu lehele.-->
<menu>
    <a href="index.php">Avaleht</a> |
    <a href="index.php?leht=portfoolio">Portfoolio</a> |
    <a href="index.php?leht=kaart">Kaart</a> |
    <a href="index.php?leht=kontakt">Kontakt</a>
</menu>


</body>
</html>
<?php
// Kontrollib, kas muutuja "leht" on tühi. Kui ei ole tühi, siis ta include-ib lehele faili, mis on muutuja "leht" väärtus ning lisab juurde.php.
if (!empty($_GET["leht"])) {
    $leht = htmlspecialchars($_GET["leht"]);
    $kontrollMassiiv = array("portfoolio", "kaart", "kontakt");
    $kontroll = in_array($leht, $kontrollMassiiv);
    // Kontrollib, kas fail on esiteks olemas ning kas see on array's olemas
    if (is_file($leht.".php") AND $kontroll === true) {
        include ($_GET["leht"].".php");
    }else {
        echo "<h3>Kahjuks sellist lehekülge ei leidu</h3>";
    }
}else {
?>
<section>
    <div>
        <h2>Tere tulemast avalehele!</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad autem eaque esse explicabo ipsam, ipsum voluptate.</p>
    </div>
</section>
<?php
};
?>

