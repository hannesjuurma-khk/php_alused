<?php

// Declaring a class - First Capital Letter / Usually Singular Noun

class Car {
    // Declaring properties
    public $comp;
    public $color = 'red';
    public $hasSunRoof = true;
}

// Creating objects out of classes
$bmw = new Car();
$mercedes = new Car();


// Getting objects property values (object -> property;)
echo $bmw -> color;
echo "<br>";
echo $mercedes -> color;
echo "<br>";

// Changing property values - this overwrites default from the original class.
$bmw -> color = 'black';
$mercedes -> color = 'orange';
$mercedes -> comp = 'Mercedes';
$bmw -> comp = 'BMW';

// Checking the change
echo $bmw -> color;
echo "<br>";
echo $mercedes -> color;
echo "<br>";




// Method - A function inside a class

class House {
    public $comp;
    public $color = 'red';
    public $hasSunRoof = true;

    // Declaring methods
    public function hello() {
        return "beepboop";
    }
}

// Creating objects out of the class
$valgeMaja = new House();
$sinineMaja = new House();

// Calling a method
echo $valgeMaja -> hello();
echo "<br>";
echo $sinineMaja -> hello();
echo "<br>";

?>