<?php

// Declaring a class

class Car {

    public $comp;
    public $color = 'red';
    public $hasSunRoof = true;

    // Using $this to get properties value within the class
    // $this keyword indicates that we use the class's own methods and properties, and allows us to have access to them within the class's scope.
    public function hello() {
        return 'BeepBoop I am a <i>' . $this -> comp . '</i>, and I am <i>' .
        $this -> color;
    }
}

// Declaring objects out of "Car" class
$bmw = new Car ();
$mercedes = new Car ();

// Giving different property values to objects
$bmw -> color = 'black';
$bmw -> comp = 'BMW';

$mercedes -> color = 'blue';
$mercedes -> color = 'Mercedez';

// Calling the method - because the values are overwritten, it gives the information of the object properties instead (not the original one)!
echo $bmw ->hello();
echo "<br>";
echo $mercedes -> hello();
echo "<br>";

