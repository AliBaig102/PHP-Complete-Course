<?php
// Polymorphism
// What is Polymorphism?
// Method Overloading and Overriding
// Abstract Classes and Methods
// Interfaces

// What is Polymorphism?
// Polymorphism is the ability of different objects to respond to the same function or method call in different ways.
// In PHP, polymorphism is mainly achieved through method overriding and the use of interfaces and abstract classes.

class Vehicle
{
    public $make;
    public $model;

    public function __construct($make, $model)
    {
        $this->make = $make;
        $this->model = $model;
    }

    public function startEngine()
    {
        echo "The engine of $this->make $this->model is starting.";
    }
}

// Method Overloading and Overriding
// Method Overloading is not natively supported in PHP, but Method Overriding allows a subclass to provide a specific implementation of a method already defined in its parent class.

class Car extends Vehicle
{
    public function startEngine()
    {
        echo "The engine of car $this->make $this->model is starting.";
    }
}

// Example
$car = new Car("Toyota", "Corolla");
$car->startEngine(); // Output: The engine of car Toyota Corolla is starting.

// Abstract Classes and Methods
// An abstract class cannot be instantiated and may contain abstract methods, which must be defined in the subclass.

abstract class AbstractVehicle
{
    public $make;
    public $model;

    public function __construct($make, $model)
    {
        $this->make = $make;
        $this->model = $model;
    }

    abstract public function startEngine(); // Abstract method declaration
}

class Truck extends AbstractVehicle
{
    public function startEngine()
    {
        echo "The engine of truck $this->make $this->model is starting.";
    }
}

// Example
$truck = new Truck("Ford", "F-150");
$truck->startEngine(); // Output: The engine of truck Ford F-150 is starting.

// Interfaces
// An interface defines a contract that any class implementing it must adhere to. Interfaces contain method declarations but no implementations.

interface VehicleInterface
{
    public function startEngine();
}

class Motorcycle implements VehicleInterface
{
    public $make;
    public $model;

    public function __construct($make, $model)
    {
        $this->make = $make;
        $this->model = $model;
    }

    public function startEngine()
    {
        echo "The engine of motorcycle $this->make $this->model is starting.";
    }
}

// Example
$motorcycle = new Motorcycle("Harley-Davidson", "Street 750");
$motorcycle->startEngine(); // Output: The engine of motorcycle Harley-Davidson Street 750 is starting.

