<?php
// Advanced OOP Features
// Traits
// Anonymous Classes
// Late Static Binding

// Traits
// Traits are a mechanism for code reuse in single inheritance languages like PHP.
// A Trait is intended to reduce some limitations of single inheritance by enabling a developer to reuse sets of methods freely in several independent classes living in different class hierarchies.

trait Loggable
{
    public function log($message)
    {
        echo "Log: $message";
    }
}

class User
{
    use Loggable;

    public function createUser($name)
    {
        $this->log("Creating user: $name");
    }
}

// Example
$user = new User();
$user->createUser("John Doe"); // Output: Log: Creating user: John Doe

// Anonymous Classes
// Anonymous classes are useful when simple, one-off objects need to be created. They can be used to define classes that have no name.

$bike = new class {
    public function ride()
    {
        echo "Riding a bike.";
    }
};

// Example
$bike->ride(); // Output: Riding a bike.

// Late Static Binding
// Late static binding is a feature in PHP that allows you to reference the called class in a context of static inheritance.
// It is used to ensure that static methods in a base class can call static methods in derived classes.

class Base
{
    public static function who()
    {
        echo "Base\n";
    }

    public static function test()
    {
        static::who(); // Here, static::who() is late static binding
    }
}

class Child extends Base
{
    public static function who()
    {
        echo "Child\n";
    }
}

// Example
Base::test();  // Output: Base
Child::test(); // Output: Child
