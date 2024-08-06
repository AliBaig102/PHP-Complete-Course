<?php
// Constructors and Destructors
// Introduction to Constructors
// Writing Constructors in PHP
// Destructor Methods
// The `__construct()` and `__destruct()` Magic Methods

// What is a constructor?
// A constructor is a special method in a class that is automatically called when an object of that class is created.

// What is a destructor?
// A destructor is a special method in a class that is automatically called when an object of that class is destroyed.

// Why use constructors and destructors?

class Person
{
    public $name;
    public $age;
    public $gender;

    /* Constructor Syntax
     access modifiers function __construct(parameters){

    }*/
    // Example
    public function __construct($name, $age, $gender)
    {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
    }


    /* Destructors Syntax
   access modifiers function __destruct(){

    }*/
    // Example
    public function __destruct()
    {
        echo "Person $this->name is destroyed";
    }
}


// Example
$person = new Person("John", 25, "Male");
$person = null;
