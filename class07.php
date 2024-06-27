<?php
//## Class 7: Strings and Number
//- String functions
//- Number functions

//1.String Functions
$string = "Hello World";
//strlen() => returns the length of a string
echo strlen($string); //output: 11
//str_word_count() => returns the number of words in a string
echo str_word_count($string); //output
//strrev() => reverses a string
echo strrev($string); //output: dlroW olleH
//strpos() => returns the position of the first occurrence of a substring in a string
echo strpos($string, "World");//output: 6
//str_replace() => replaces all occurrences of a substring in a string
echo str_replace("World", "Everyone", $string);//output: Hello Everyone
//str_split() => splits a string into an array
echo implode(",", str_split($string));//output: H,e,l,l,o, ,W,o,r,l,d
//trim() => removes whitespace from the beginning and end of a string
echo trim($string);//output: Hello World
//ltrim() => removes whitespace from the beginning of a string
echo ltrim($string);//output: Hello World
//rtrim() => removes whitespace from the end of a string
echo rtrim($string);//output: Hello World
//ucfirst() => capitalizes the first character of a string
echo ucfirst($string);//output: Hello World
//ucwords() => capitalizes the first character of each word in a string
echo ucwords($string);//output: Hello World
//strtoupper() => converts a string to uppercase
echo strtoupper($string);//output: HELLO WORLD
//strtolower() => converts a string to lowercase
echo strtolower($string);//output: hello world
//substr() => returns a substring
echo substr($string, 0, 5);//output: Hello
//substr_count() => returns the number of occurrences of a substring in a string
echo substr_count($string, "o");//output: 2
//str_pad() => pads a string to a certain length with another string
echo str_pad($string, 20, " ");//output: Hello World
//str_repeat() => repeats a string
echo str_repeat($string, 3);//output: Hello WorldHello WorldHello World
//str_shuffle() => shuffles a string
echo str_shuffle($string);//output: dHloWrolleH
//str_ireplace() => replaces all occurrences of a substring in a string, case-insensitive
echo str_ireplace("world", "everyone", $string);//output: Hello Everyone

//2.Number Functions
$number = 10;
//abs() => returns the absolute value of a number
echo abs($number);//output: 10
//ceil() => rounds up a number
echo ceil($number);//output: 10
//floor() => rounds down a number
echo floor($number);//output: 10
//round() => rounds a number
echo round($number);//output: 10

// String To Number Conversion

//String to Int
$string = "10";
echo (int)$string;//output: 10
//String to Float
$string = "10.5";
echo (float)$string;//output: 10.5
//String to Bool
$string = "true";
echo (bool)$string;//output: true

//Number to String
$number = 10;
echo (string)$number;//output: 10
