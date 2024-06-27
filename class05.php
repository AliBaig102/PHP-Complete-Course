<?php
//## Class 5: Functions
//- Defining and calling functions
//- Function parameters and return values
//- Variable scope (local, global)
//- Built-in PHP functions

// ## Defining and calling functions

// Defining a function
function hello() {
    echo "Hello World";
}

// Calling a function
hello();

// ## Function parameters and return values

// Defining a function with parameters
function add($num1, $num2) {
    $sum = $num1 + $num2;
    return $sum;
}
// Calling a function with parameters
$result = add(5, 10);
echo $result; // Output: 15

// default parameter and rest parameters
function sub($num1, $num2, $num3 = 5)
{
    $sum = $num1 - $num2 - $num3;
    return $sum;
}

$result = sub(5, 10, 15);
echo $result; // Output: -5
// rest parameters
function sum(...$nums)
{
    $sum = 0;
    foreach ($nums as $num) {
        $sum += $num;
    }
    return $sum;
}

$result = sum(1, 2, 3, 4, 5);
echo $result; // Output: 15

// ## Variable scope (local, global)

// Local variable
// Local variables are declared inside a function and can only be accessed inside that function.

function adding()
{
    $x = 5;
    $y = 10;
    $sum = $x + $y;
    echo $sum;
}

adding(); // Output: 15

// Global variable
// Global variables are declared outside a function and can be accessed from anywhere in the script.

$x = 5;
$y = 10;
$sum = $x + $y;
echo $sum; // Output: 15


// Variable function / function expression

// Example

$divide=function (){
    $x = 5;
    $y = 10;
    $sum = $x / $y;
    echo $sum;
};
$divide();


// Passing arguments by value
// Passing arguments by reference
// What the difference?

// Example by Value

function greeting($name)
{
    $name = "Hello, " . $name;
    echo $name;
}

$name = "John";
greeting($name); // Output: Hello, John
echo $name; // Output: John

// Example by Reference

function greeting2(&$name)
{
    $name = "Hello, " . $name;
    echo $name;
}

$name = "John";
greeting2($name); // Output: Hello, John
echo $name; // Output: Hello, John

// Recursive function

function factorial($n)
{
    if ($n == 1) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
}
echo factorial(5); // Output: 120
