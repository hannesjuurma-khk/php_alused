<?php

// Magic Methods
// The names of magic methods always start with two underscores __

// We use __construct() in order to do something as soon as we create an object out of a class.

class Car {
    private $model;

    // We want to set the value of the $model property as soon as we create the object
    public function __construct($model)
    {
        $this -> model = $model;
    }
    public function getModel()
    {
        return "The model of our car is ". $this -> model;
    }
}

// If we want to create an object out of the class with construct, we need to insert the value asked.
// If we try to create a new object without assigning the value that the constructor needs, we will encounter an error.
// $car1 = new Car(); -- this brings a error
$car1 = new Car("Mercedes");

// Get the car model to show
echo $car1 -> getModel();
echo "<br>";;


// How to make construct more reliable

class Car2 {
    // The $model property has a default value of "N/A"
    private $model = "N/A";

    // We don’t have to assign a value to the $model property since it already has a default value
    public function __construct($model = null)
    {
        // Only if the model value is passed it will be assigned
        if($model)
        {
            $this -> model = $model;
        }
    }

    public function getCarModel()
    {
        return ' The car model is: ' . $this -> model;
    }
}

//We create the new Car object without passing a value to the model
$car2 = new Car2();
echo $car2 -> getCarModel();
echo "<br>";

$car21 = new Car2("Mercedez");
echo $car21 -> getCarModel();
echo "<br>";





// Magic Constants - magic constants are written in uppercase letters and prefixed and suffixed with two underlines
// __CLASS__ - Get the name of the class in which it resides.
// __LINE__ to get the line number in which the constant is used.
// __FILE__ to get the full path or the filename in which the constant is used.
// __METHOD__ to get the name of the method in which the constant is used.

class Car3 {
    private $model = '';

    //__construct
    public function __construct($model = null)
    {
        if($model)
        {
            $this -> model = $model;
        }
    }

    public function getCarModel()
    {
        //We use the __CLASS__ magic constant in order to get the class name

        return " The <b>" . __CLASS__ . "</b> model is: " . $this -> model;
    }
}

$car4 = new Car3('Mercedes');

echo $car4 -> getCarModel();