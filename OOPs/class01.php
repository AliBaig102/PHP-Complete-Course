<?php
// Introduction to PHP OOPs
// What is OOP?
//OOP stands for Object-Oriented Programming, a programming paradigm based on the concept of "objects",
// which are instances of classes. Objects can contain data, in the form of fields (often known as attributes or properties),
// and code, in the form of procedures (often known as methods).

//Benefits of OOP

// OOP offers several benefits including
// - Modularity: Makes code easier to manage and debug.
// - Reusability: Allows using existing code in new applications.
// - Complex Data Structures: Enables the creation of more complex data structures such as inheritance and polymorphism.


// Procedural vs. Object-Oriented Programming
// Procedural programming is a paradigm based on the concept of the procedure call.
// Procedures, also known as routines, subroutines, or functions, contain a series of computational steps to be carried out.
// OOP, in contrast, is based on the concept of objects and classes, promoting greater modularity and code reuse.


// Basic OOP Terminology
// Key terms in OOP include:
// - Class: A blueprint for creating objects. A class defines a type of object according to the methods and properties it has.
// - Object: An instance of a class.
// - Method: A function that is defined inside a class and describes the behaviors of the objects that are created from the class.
// - Property: A variable that is defined inside a class and describes the attributes of the objects that are created from the class.
// - Inheritance: A mechanism for creating a new class from an existing class.
// - Encapsulation: The bundling of data and the methods that operate on that data within one unit, such as a class,
//   and restricting access to some of the object's components.
// - Polymorphism: The ability to create a variable, a function, or an object that has more than one form.
// - Abstraction: The process of hiding the implementation details and showing only functionality to the user.


// Basic OOP Concepts
// - Classes
// - Objects
// - Methods
// - Properties
// - Inheritance
// - Encapsulation
// - Polymorphism
// - Abstraction


// Classes and Objects
// - Defining Classes
// - Creating Objects
// - Properties and Methods
// - Access Modifiers
// - The `$this` Keyword

// - Defining Classes

// Class Syntax

/*
 class ClassName {
    Properties
    Methods
    }
 */

// Example

class Person
{
    // Access Modifiers
    // public - accessible from anywhere
    // private - accessible only from within the class
    // protected - accessible only from within the class and its subclasses

    public $name= "ALi"; // properties
    public $age = 20;
    public $city = "Karachi";
    public $country = "Pakistan";

    // The `$this` Keyword
    // The `$this` keyword refers to the current object.
    public function getDetails() // methods
    {
        echo "Name: " . $this->name . "<br>";
        echo "Age: " . $this->age . "<br>";
        echo "City: " . $this->city . "<br>";
        echo "Country: " . $this->country . "<br>";
    }
}

// - Creating Objects

// Object Syntax

/*
 $objectName = new ClassName();
 */

// Example

$person = new Person();
$person->getDetails();