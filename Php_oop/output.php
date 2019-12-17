<?php
// Funktsioon, mis väljastab tabeli koos pealkirjaga

function table($andmed, $pealkirjad){
    echo "<table>";
        echo "<thead>";
            echo "<tr>";
            // Funktsioonile antud pealkirjad eraldan üksikuteks väärtusteks ning panen need ükshaaval ritta <th> sisse
            foreach ($pealkirjad as $pealkiri) {
                echo "<th>".$pealkiri."</th>";
            }

            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

            // Andmed, mis mulle antakse massiivis, jagan üksikuteks masiivi juppideks ning panen <tr> sisse
            foreach ($andmed as $tabeliRida) {
                echo "<tr>";
                    //Iga massiivijupp teen eraldi väärtuseks ning echo'n need ükshaaval <td> sisse
                    foreach ($tabeliRida as $nimetus => $vaartus){
                        echo "<td>".$vaartus."</td>";
                    }
                echo "</tr>";
            }

        echo "</tbody>";
    echo "</table>";

}

// Otsingu vorm

function otsinguVorm() {
    echo "
    <form action=\"\" method=\"get\">
		<input type=\"text\" name=\"otsi\">
		<input type=\"submit\" value=\"Otsi\"> 
	</form>
    ";
}

// Andmete lisamise vorm
function lisaAndemedVorm() {
    echo "
    <form action=\"\" method=\"get\">
		Eesnimi: <input type=\"text\" name='enimi'> <br>
		Perenimi: <input type=\"text\" name='pnimi'> <br>
		Email: <input type=\"text\" name='kontakt'> <br>
		<input type=\"submit\" value='Saada andmed'> 
	</form>
    ";
}

// Tabel kustuta

function tableKustuta($andmed, $pealkirjad){
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    // Funktsioonile antud pealkirjad eraldan üksikuteks väärtusteks ning panen need ükshaaval ritta <th> sisse
    foreach ($pealkirjad as $pealkiri) {
        echo "<th>".$pealkiri."</th>";
    }

    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    // Andmed, mis mulle antakse massiivis, jagan üksikuteks masiivi juppideks ning panen <tr> sisse
    foreach ($andmed as $tabeliRida) {
        echo "<tr>";
            echo "<td>".$tabeliRida['enimi']."</td>";
            echo "<td>".$tabeliRida['pnimi']."</td>";
            echo "<td>".$tabeliRida['kontakt']."</td>";
            echo "<td><a href='?kustutaID=".$tabeliRida["id"]."'>Kustuta andmed</a></td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";

}


?>