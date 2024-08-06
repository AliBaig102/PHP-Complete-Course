<?php
// Encapsulation
// Introduction to Encapsulation
// Getter and Setter Methods
// Property and Method Visibility
// The `static` Keyword

// Introduction to Encapsulation
// Encapsulation is one of the fundamental principles of OOP. It refers to the bundling of data (properties) and methods that operate on the data within a single unit, known as a class.
// Encapsulation helps protect the internal state of an object from unintended or harmful modifications by restricting direct access to some of the object's components.

class Vehicle
{
    private $make;
    private $model;
    private $speed;

    // Getter and Setter Methods
    // Getter methods are used to access private properties, and setter methods are used to modify private properties.
    public function getMake()
    {
        return $this->make;
    }

    public function setMake($make)
    {
        $this->make = $make;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function setSpeed($speed)
    {
        if ($speed > 0) {
            $this->speed = $speed;
        } else {
            echo "Speed must be positive.";
        }
    }

    // Property and Method Visibility
    // PHP supports three visibility modifiers: public, private, and protected.
    // - public: The property or method can be accessed from anywhere.
    // - private: The property or method can only be accessed within the class itself.
    // - protected: The property or method can be accessed within the class itself and by inheriting classes.

    public function accelerate()
    {
        $this->speed += 10;
        echo "The vehicle accelerates. Current speed: $this->speed km/h.";
    }

    public function brake()
    {
        $this->speed -= 10;
        echo "The vehicle slows down. Current speed: $this->speed km/h.";
    }

    // The `static` Keyword
    // The `static` keyword is used to declare properties and methods that belong to the class rather than any instance of the class.
    // Static properties and methods can be accessed without creating an instance of the class.

    private static $vehicleCount = 0;

    public function __construct($make, $model)
    {
        $this->make = $make;
        $this->model = $model;
        $this->speed = 0;
        self::$vehicleCount++;
    }

    public static function getVehicleCount()
    {
        return self::$vehicleCount;
    }
}

// Example usage
$car = new Vehicle("Toyota", "Corolla");
$car->setSpeed(50);
echo $car->getSpeed(); // Output: 50
$car->accelerate(); // Output: The vehicle accelerates. Current speed: 60 km/h.
$car->brake(); // Output: The vehicle slows down. Current speed: 50 km/h.

$truck = new Vehicle("Ford", "F-150");
echo Vehicle::getVehicleCount(); // Output: 2
