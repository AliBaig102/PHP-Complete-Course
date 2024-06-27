<?php
// ## Class 3: Control Flow
//- Conditional statements: if, else, elseif, switch Ternary operator
//- Writing scripts using control flow

// if
$x = 10;
if ($x > 5) {
    echo "x is greater than 5";
}

// else
$x = 10;
if ($x > 5) {
    echo "x is greater than 5";
} else {
    echo "x is less than or equal to 5";
}

// elseif
$x = 10;
if ($x > 5) {
    echo "x is greater than 5";
} elseif ($x < 5) {
    echo "x is less than 5";
} else {
    echo "x is less than or equal to 5";
}

// switch
$x = 10;
switch ($x) {
    case 5:
        echo "x is 5";
        break;
    case 10:
        echo "x is 10";
        break;
    default:
        echo "x is neither 5 nor 10";
}

// ternary operator
$x = 10;
echo ($x > 5) ? "x is greater than 5" : "x is less than or equal to 5";