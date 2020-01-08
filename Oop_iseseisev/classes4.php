<?php
// Public access modifier allows a code from outside or inside the class to access the class's methods and properties
// Private modifier prevents access to a class's methods or properties from any code that is outside the class.

// Public modifer
class Car {

    // public methods and properties.
    public $model;

    public function getModel()
    {
        return "The car model is " . $this -> model;
    }
}

$mercedes = new Car();
//Here we access a property from outside the class
$mercedes -> model = "Mercedes";
//Here we access a method from outside the class
echo $mercedes -> getModel();



// Private modifier

class House {

    // The private access modifier denies access to the method from outside the class’s scope
    private $model;
    // The public access modifier allows the access to the method from outside the class
    public function setModel($model)
    {
        //validate that only certain house models are assigned to the $houseModel property
        $allowedModels = array("Black house","Yellow house");

        if(in_array($model,$allowedModels))
        {
            $this -> model = $model;
        }
        else
        {
            $this -> model = "not in our list of models.";
        }
    }


    public function getModel()
    {
        return "The house model is ".$this -> model;
    }
}

$blackHouse = new House();
// Set house's model
$blackHouse -> setModel("Black house");
// Get the house's model
echo $blackHouse -> getModel();
