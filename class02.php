<?php
//## Class 2: Basic Syntax and Variables
//- PHP syntax
//- Variables and data types
//- Basic operators

// ## Variables and data types

// 1. Variables

// Variables are named containers that can hold data.

// Variables are declared with the $ sign.

//Example
$x = 5;
$y = 10.5;
$z = "Hello, World!";

echo $x;
echo $y;
echo $z;

// Constant variables are declared in uppercase letters and cannot be changed.

//Example 1 using const
const greeting = "Welcome to Aptech";
echo greeting;
//Example 2 using define
define("PI", 3.14);
echo PI;


// 2. Data types
// string
// int
// float
// bool
// array
// object
// null
// 3. Operators

// arithmetic
// assignment
// comparison
// logical
// string
// increment/decrement

// arithmetic
// + - * / %

// assignment
// = += -= *= /= %=

// comparison
// == === != !== > < >= <=

// logical
// && || !

// string
// .

// increment/decrement
// ++ --

// How to check the data type of variable?

// echo gettype($variable);