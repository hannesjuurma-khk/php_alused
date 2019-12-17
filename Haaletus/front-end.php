<?php

// Lisame andmebaasitöötuse funktsioonid
require_once 'db-func.php';

// Lisame kasutusele andmebaasi serveri konfiguratsiooni
require_once 'config.php';

// Ühendus ikt serveris oleva andmebaasiga
$ikt = connect(HOSTNAME,USER,PASSWORD,DATABASE);
?>

<!doctype html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS - BootStrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Hääletus</title>
</head>
<body>
<header class="container">
    <div class="row">
        <h1 class="text-center">Tere tulemast iga-aastasele hääletusele!</h1>
    </div>
</header>
<section class="container">
    <div class="row text-primary text-center">
        <?php

        // Andmete vaatamine -
        // Väljastan kõik haaletuse andmed
        $sql = 'SELECT * FROM HAALETUS';
        $haaletus = getData($sql,$ikt);
        print_r($haaletus);
        echo "<br>";

        $i = 0;
        foreach ($haaletus as $rida){
            foreach ($rida as $sisu => $vaartus) {
                switch (pealkirja_muutus){
                    case $sisu == "sisuetus_ID":
                        $sisu = "Hääletuse ID";
                        break;
                    case $sisu == "Tulemus_ID":
                        $sisu = "Tulemuse ID";
                        break;
                    case $sisu == "sisuetaja_ID":
                        $sisu = "Hääletaja ID";
                        break;
                    case $sisu == "sisu":
                        $sisu = "Hääl";
                        break;
                    case $sisu == "Haal_viimane_aeg":
                        $sisu = "Viimase hääletuse aeg";
                        break;
                }
                echo $sisu."<br>";
            }
        }
        ?>



    </div>

</section>

</body>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>


<?php

// Päringu saatmine - ["query" tähendab päring]
// $sql - sql päring
// $link - ühendus andmebaasiga (connect)
function query($sql, $link) {
    $result = mysqli_query($link, $sql);    // Tagastab true/false või objekti
    if ($result === false) {
        echo "Probleem päringuga <b>".$sql."</b><br>";
        return false;
    }
    return $result;

}

// Funktsioon andmete väljastamiseks
function getData ($sql, $link){
    $result = query($sql, $link);
    $data = array();
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        $data[] = $row;
    }
    if (count($data) == 0) {
        return false;
    }
    return $data;
}
?>




