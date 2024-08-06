<?php
// Inheritance
// Understanding Inheritance
// Creating Subclasses
// Overriding Methods
// The `parent` Keyword
// The `final` Keyword

// What is inheritance?
// Inheritance is a mechanism in which one class inherits the properties and methods of another class.
// The class inherited from is called the parent or base class, and the class that inherits is called the child or derived class.

// Why use inheritance?
// Inheritance promotes code reusability, allows for the creation of a more complex class hierarchy, and makes it easier to manage and maintain code.

class Vehicle
{
    public string $make;
    public string $model;

    public function __construct($make, $model)
    {
        $this->make = $make;
        $this->model = $model;
    }

    public function startEngine() : void
    {
        echo "The engine of $this->make $this->model is starting.";
    }
}

// Creating Subclasses
// A subclass inherits all the properties and methods from the parent class.
class Car extends Vehicle
{
    public function startEngine(): void
    {
        echo "The engine of car $this->make $this->model is starting.";
    }
}

// Example
$car = new Car("Toyota", "Corolla");
$car->startEngine(); // Output: The engine of car Toyota Corolla is starting.

// Overriding Methods
// A subclass can override methods from the parent class to provide specific implementation.
class Truck extends Vehicle
{
    public function startEngine(): void
    {
        echo "The engine of truck $this->make $this->model is starting.";
    }
}

// Example
$truck = new Truck("Ford", "F-150");
$truck->startEngine(); // Output: The engine of truck Ford F-150 is starting.

// The `parent` Keyword
// The `parent` keyword is used to access the parent class's properties and methods.
class Motorcycle extends Vehicle
{
    public function startEngine() : void
    {
        parent::startEngine(); // Calls the startEngine method from the parent class
        echo " The motorcycle $this->make $this->model is ready to go.";
    }
}

// Example
$motorcycle = new Motorcycle("Harley-Davidson", "Street 750");
$motorcycle->startEngine(); // Output: The engine of Harley-Davidson Street 750 is starting. The motorcycle Harley-Davidson Street 750 is ready to go.

// The `final` Keyword
// The `final` keyword prevents a class from being inherited and a method from being overridden.
final class Bicycle extends Vehicle
{
    final public function startEngine() : void
    {
        echo "$this->make $this->model does not have an engine to start.";
    }
}

// Example
$bicycle = new Bicycle("Giant", "Escape 3");
$bicycle->startEngine(); // Output: Giant Escape 3 does not have an engine to start.
