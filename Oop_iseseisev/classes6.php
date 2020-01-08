<?php
// When we declare a property or a method as "protected", we can approach it from both the parent and the child classes.

// The parent class
class Car {
    //The $model property is now protected, so it can be accessed from within the class and its child classes
    protected $model;

    //Public setter method
    public function setModel($model)
    {
        $this -> model = $model;
    }
}

// The child class (In order to declare that one class inherits the code from another class, we use the extends keyword)
// //The child class can use the code it inherited from the parent class and it can also have its own code

class SportsCar extends Car {
    //Has no problem to get a protected property that belongs to the parent
    public function hello()
    {
        return "beep! I am a <i>" . $this -> model . "</i><br />";
    }
}

//Create an instance from the child class
$sportsCar1 = new SportsCar();

//Set the class model name
$sportsCar1 -> setModel('Mercedes Benz');

//Get the class model name
echo $sportsCar1 -> hello();



// The child class overrides parent class
// The parent class has hello method that returns "beep".

class Car2 {
    public function hello2()
    {
        return "beep";
    }
}

//The child class has hello method that tries to override the hello method in the parent
class SportsCar2 extends Car2 {
    public function hello2()
    {
        return "Hallo";
    }
}


//Create a new object
$sportsCar2 = new SportsCar2();

//Get the result of the hello method
echo $sportsCar2 -> hello2();




// Prevent the child class from overriding the parent’s method. Prefix the method in the parent with the "final" keyword.
// The parent class has hello method that returns "beep".

class Car3 {
    final public function hello3()
    {
        return "beep";
    }
}

//The child class has hello method that tries to override the hello method in the parent. It wont even start
/*
class SportsCar3 extends Car3 {
    public function hello3()
    {
        return "Hallo";
    }
}
*/

//Create a new object
$sportsCar3 = new SportsCar3();

//Get the result of the hello method
echo $sportsCar3 -> hello3();