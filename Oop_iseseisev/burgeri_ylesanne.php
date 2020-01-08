<?php

// Põhiklass burger - üleval property-d

class Burger {
    private $nimetus = "";
    private $liha = "";
    private $sai = "";
    private $hind = 0.0;

    private $lisand1 = "";
    private $lisand1Hind = 0.0;
    private $lisand2 = "";
    private $lisand2Hind = 0.0;
    private $lisand3 = "";
    private $lisand3Hind = 0.0;
    private $lisand4 = "";
    private $lisand4Hind = 0.0;

    // Meetod tavalise burgeri loomiseks (ilma lisanditeta)
    public function __construct($nimetus, $sai, $liha, $hind)
    {
        // Defineerin võimalikud valikud
        $voimalikudSaiad = array ("valge burgerisai", "burgerileib");
        $voimalikudLihad = array ("sealiha", "loomaliha");
        // Kontrollin, kas valikus on antud toode
        if(in_array($sai, $voimalikudSaiad)) {
            $this -> sai = $sai;
            // Kui on mingi kindel sai, siis lisandub sellega kaasnev hind
            if ($sai == "valge burgerisai") {
                $this -> hind += 0.5;
                // Kui on valge burgerisai, siis on burgeri nimetus järgnev
                $this -> nimetus = "<i>Burger saiaga</i>";
            }
            elseif ($sai == "burgerileib") {
                $this -> hind += 1;
                // Kui on burgerilebi, siis on burgeri nimetus järgnev
                $this -> nimetus = "<i>Burger leivaga</i>";
            }

        }
        // Kui on mingi kindel liha, siis lisandub sellega kaasnev hind
        if(in_array($liha, $voimalikudLihad)) {
            $this -> liha = $liha;
            if ($liha == "sealiha") {
                $this -> hind += 2;
            }
            elseif ($liha == "loomaliha") {
                $this -> hind += 2.50;
            }
        }
        echo $this ->nimetus." sees on praegu <i>". $this -> sai. "</i> ja <i>". $this ->liha ."</i>, mis teeb kokku ". $this ->hind. "€<br>";
    }

    // Meetod lisandite lisamiseks - funktsiooni muutujatele lisan default väärtused, et saaks funktsiooni kasutada.

    public function lisandid($lisand1 = "puudub", $lisand2 = "puudub", $lisand3 = "puudub", $lisand4 = "puudub") {
        $voimalikudLisandid = array ("tomat", "juust", "majonees", "kurk");
         // Lisand 1
         // Kui $lisan ei ole "puudu" ja asub array's
         if(in_array($lisand1, $voimalikudLisandid) AND $lisand1 !== "puudub") {
             // Annan lisand1-le väärtuse, annan lisand1Hinna ning koguhinnale panen lisandi hinna juurde. Seejärel väljastan lisandi nime.
             $this -> lisand1 = $lisand1;
             $this -> lisand1Hind = 0.5;
             $this -> hind += 0.5;
             echo "Lisaks on valitud <i>". $this -> lisand1. ",</i> mis maksab ". $this -> lisand1Hind. "€<br>";
         };
         // Lisand 2
         if (in_array($lisand2, $voimalikudLisandid) AND $lisand2 !== "puudub"){
             $this -> lisand2 = $lisand2;
             $this -> lisand2Hind = 1;
             $this -> hind += 1;
             echo "Lisaks on valitud <i>". $this -> lisand2. "</i>, mis maksab ". $this -> lisand2Hind. "€<br>";
         }

         // Lisand 3
        if (in_array($lisand3, $voimalikudLisandid) AND $lisand3 !== "puudub"){
            $this -> lisand3 = $lisand3;
            $this -> lisand3Hind = 0.5;
            $this -> hind += 0.5;
            echo "Lisaks on valitud <i>". $this -> lisand3. "</i>, mis maksab ". $this -> lisand3Hind. "€<br>";
        }

        // Lisand 4
        if (in_array($lisand4, $voimalikudLisandid) AND $lisand4 !== "puudub"){
            $this -> lisand4 = $lisand4;
            $this -> lisand4Hind = 0.3;
            $this -> hind += 0.3;
            echo "Lisaks on valitud <i>". $this -> lisand4. "</i>, mis maksab ". $this -> lisand4Hind. "€<br>";
        }
        echo $this ->nimetus." on valmimisel - see teeb kokku ". $this ->hind. "€<br><hr>";
    }
};



class TervislikBurger extends Burger {
    private $nimetus = "";
    private $liha = "";
    private $sai = "";
    private $hind = 0.0;

    private $lisand1 = "";
    private $lisand1Hind = 0.0;
    private $lisand2 = "";
    private $lisand2Hind = 0.0;

    public function __construct($nimetus, $sai, $liha, $hind) {
        $voimalikudTSaiad = array ("must teraleib", "otse ahjust rukkileib");
        $voimalikudTLihad = array ("gurmee sealiha", "noore vasika liha");

        if(in_array($sai, $voimalikudTSaiad)) {
            $this -> sai = $sai;
            if ($sai == "must teraleib") {
                $this -> hind += 2;
                $this -> nimetus = '"<i>Tervislik leivaamps"';
            }
            elseif ($sai == "otse ahjust rukkileib") {
                $this -> hind += 2;
                $this -> nimetus = '"<i>Soe saiake';
            }
        }

        if(in_array($liha, $voimalikudTLihad)) {
            $this -> liha = $liha;
            if ($liha == "gurmee sealiha") {
                $this -> hind += 4;
                $this -> nimetus .= ' gurmee lihaga</i>"';
            }
            elseif ($liha == "noore vasika liha") {
                $this -> hind += 4;
                $this -> nimetus .= ' noore lihaga</i>"';
            }
        }
        echo $this ->nimetus." sees on praegu <i>". $this -> sai. "</i> ja <i>". $this ->liha ."</i>, mis teeb kokku ". $this ->hind. "€<br>";

    }

    public function lisandid($lisandT1 = "puudub", $lisandT2 = "puudub") {
        $voimalikudTLisandid = array ("väga tervislik salatileht", "väga tervislik ketšup");

        // Tervislik lisand 1
        if(in_array($lisandT1, $voimalikudTLisandid) AND $lisandT1 !== "puudub") {
            // Annan lisand1-le väärtuse, annan lisand1Hinna ning koguhinnale panen lisandi hinna juurde. Seejärel väljastan lisandi nime.
            $this -> lisand1 = $lisandT1;
            $this -> lisand1Hind = 3;
            $this -> hind += 3;
            echo "Lisaks on valitud <i>". $this -> lisand1. "</i>, mis maksab ". $this -> lisand1Hind. "€<br>";
        };

        // Tervislik lisand 2
        if(in_array($lisandT2, $voimalikudTLisandid) AND $lisandT2 !== "puudub") {
            // Annan lisand1-le väärtuse, annan lisand1Hinna ning koguhinnale panen lisandi hinna juurde. Seejärel väljastan lisandi nime.
            $this -> lisand2 = $lisandT2;
            $this -> lisand2Hind = 3.25;
            $this -> hind += 3.25;
            echo "Lisaks on valitud <i>". $this -> lisand2. "</i>, mis maksab ". $this -> lisand2Hind. "€<br>";
        };

        echo $this ->nimetus." on valmimisel - see teeb kokku ". $this ->hind. "€<br><hr>";
    }

};

class LuxBurger extends Burger{
    private $nimetus = "";
    private $liha = "";
    private $sai = "";
    private $hind = 0.0;

    private $lisand1 = "";
    private $lisand1Hind = 0.0;
    private $lisand2 = "";
    private $lisand2Hind = 0.0;

    public function __construct($nimetus, $sai, $liha, $hind) {

        $voimalikudLuxSaiad = array ("kullast tehtud nisukukkel", "hõbedast tehtud ciabatta");
        $voimalikudLuxLihad = array ("sealiha, mis on korra juba seeditud", "peekon");

        if(in_array($sai, $voimalikudLuxSaiad)) {
            $this -> sai = $sai;
            if ($sai == "kullast tehtud nisukukkel") {
                $this -> hind += 15;
                $this -> nimetus = '"<i>LuxGoldenBurger';
            }
            elseif ($sai == "hõbedast tehtud ciabatta") {
                $this -> hind += 12;
                $this -> nimetus = '"<i>LuxSilverBurger';
            }
        }

        if(in_array($liha, $voimalikudLuxLihad)) {
            $this -> liha = $liha;
            if ($liha == "sealiha, mis on korra juba seeditud") {
                $this -> hind += 25;
                $this -> nimetus .= 'Deluxe</i>"';

            }
            elseif ($liha == "peekon") {
                $this -> hind += 250;
                $this -> nimetus .= ' Bacon</i>"';
            }
        }
        echo $this ->nimetus." sees on praegu <i>". $this -> sai. "</i> ja <i>". $this ->liha ."</i>, mis teeb kokku ". $this ->hind. "€<br>";

    }
    public function lisandid($lisandLux1 = "puudub", $lisandLux2 = "puudub") {
        $voimalikudLuxLisandid = array ("laivis kartuli korjamine ja friikartuliks tegemine", "soolane tee");

        // Tervislik lisand 1
        if(in_array($lisandLux1, $voimalikudLuxLisandid) AND $lisandLux1 !== "puudub") {
            // Annan lisand1-le väärtuse, annan lisand1Hinna ning koguhinnale panen lisandi hinna juurde. Seejärel väljastan lisandi nime.
            $this -> lisand1 = $lisandLux1;
            $this -> lisand1Hind = 125;
            $this -> hind += 125;
            echo "Lisaks on valitud <i>". $this -> lisand1. "</i>, mis maksab ". $this -> lisand1Hind. "€<br>";
        };

        // Tervislik lisand 2
        if(in_array($lisandLux2, $voimalikudLuxLisandid) AND $lisandLux2 !== "puudub") {
            // Annan lisand1-le väärtuse, annan lisand1Hinna ning koguhinnale panen lisandi hinna juurde. Seejärel väljastan lisandi nime.
            $this -> lisand2 = $lisandLux2;
            $this -> lisand2Hind = 1.25;
            $this -> hind += 1.25;
            echo "Lisaks on valitud <i>". $this -> lisand2. "</i>, mis maksab ". $this -> lisand2Hind. "€<br>";
        };

        echo $this ->nimetus." on valmimisel - see teeb kokku ". $this ->hind. "€<br>";
    }
}


//Kutsun objektid ja meetodid

$algneBurger = new Burger ("?","burgerileib", "loomaliha", "?");
$algneBurger -> lisandid("tomat","juust","majonees", "kurk");

// Kõik, mis burgerist tuleb on ka siin - sellepärast töötab
$tervilikBurger = new TervislikBurger("?","otse ahjust rukkileib", "noore vasika liha", "?");
$tervilikBurger -> lisandid("väga tervislik salatileht", "väga tervislik ketšup");

$luxBurger = new LuxBurger("?","kullast tehtud nisukukkel", "sealiha, mis on korra juba seeditud", "?");
$luxBurger -> lisandid("laivis kartuli korjamine ja friikartuliks tegemine", "soolane tee");


















