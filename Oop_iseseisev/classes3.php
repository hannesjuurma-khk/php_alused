<?php

class Car {

    public $tank;

    // Filling the tank (adding gallons of fuel to the tank)
    public function fill($amountOfFuel) {
        $this -> tank += $amountOfFuel;
        // Method should return $this because we need the method to return the object after the change. And $this refers to the object in this case (Car Object ( [tank] => 10) so we need to return it to implement its new value as a property.
        return $this;
    }

    // Losing the fuel aka driving (subtracting fuel from the tank)
    public function ride($drivingLength){
        $miles = $drivingLength;
        $gallons = $miles / 50; // 50 miles per gallon of fuel
        $this -> tank -= $gallons;
        return $this;
    }
}

// Create a new object from the Car class.
$bmw = new Car();

// Chaining

// First add 10 gallons of fuel, then ride 40 miles, and get the number of gallons in the tank.

// $bmw teostab kõigepealt "fill" meetodi 10 galloniga ehk tanki läheb 10 gallonit. Seejärel aktiveerub ride meetod 40 miili sõitmiseks. Peale arvutusi on 9.2 gallonit veel paagis ning see informatsioon salvestatakse tank property value-ks
$tank1 = $bmw -> tank;
$tank = $bmw -> fill(10) -> ride(40) -> tank;

// Print the results to the screen.
echo "The number of gallons left in the tank: " . $tank . " gal.";