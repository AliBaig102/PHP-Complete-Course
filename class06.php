<?php
//## Class 6: Arrays
//- Indexed arrays, associative arrays, multidimensional arrays
//- Array functions (array_merge, array_push, array_pop, etc.)

// ## Indexed arrays

// Defining an array
$numbers = array(1, 2, 3, 4, 5);

// Accessing array elements
echo $numbers[0]; // Output: 1
echo $numbers[1]; // Output: 2
echo $numbers[2]; // Output: 3
echo $numbers[3]; // Output: 4
echo $numbers[4]; // Output: 5

// Updating array elements
$numbers[0] = 10;
echo $numbers[0]; // Output: 10

// Deleting array elements
unset($numbers[0]);
//echo $numbers[0]; // Output: NULL

// ## Associative arrays

// Defining an associative array
$person = array("name" => "John", "age" => 30);

// Accessing associative array elements
echo $person["name"]; // Output: John
echo $person["age"]; // Output: 30

// Updating associative array elements
$person["name"] = "Jane";
echo $person["name"]; // Output: Jane

// Deleting associative array elements
unset($person["age"]);
//echo $person["age"]; // Output: NULL

// ## Multidimensional arrays

// Defining a multidimensional array
$matrix = array(
    array(1, 2, 3),
    array(4, 5, 6),
    array(7, 8, 9)
);

// Accessing multidimensional array elements
echo $matrix[0][0]; // Output: 1
echo $matrix[1][1]; // Output: 5
echo $matrix[2][2]; // Output: 9

// Updating multidimensional array elements
$matrix[0][0] = 10;
echo $matrix[0][0]; // Output: 10

// Deleting multidimensional array elements
unset($matrix[1][1]);
//echo $matrix[1][1]; // Output: NULL

//Looping through an array
$fruits = ["apple", "banana", "orange", "grape", "mango", "lemon", "pineapple"];


// for loop
for ($i = 0; $i < count($fruits); $i++) {
    echo "$i: $fruits[$i]\n";
}

// while loop
$i = 0;
while ($i < count($fruits)) {
    echo "$i: $fruits[$i]\n";
    $i++;
}

// do-while loop
$i = 0;
do {
    echo "$i: $fruits[$i]\n";
    $i++;
}
while ($i < count($fruits));

// foreach loop
$person= array("name" => "John", "age" => 30, "city" => "New York", "state" => "NY", "country" => "USA", "phone" => "123-456-7890", "email" => "<EMAIL>");
foreach ($person as $key => $value) {
    echo "<h1>$key: $value</h1>";
}

// Looping in multidimensional array

$employees=[
    [
        "id"=> 1,
        "name" => "John",
        "age" => 30,
        "Salary" => 10000
    ],
    [
        "id" => 2,
        "name" => "Jane",
        "age" => 25,
        "Salary" => 8000
    ],
    [
        "id" => 3,
        "name" => "Jill",
        "age" => 28,
        "Salary" => 12000
    ],
    [
        "id" => 4,
        "name" => "Jake",
        "age" => 22,
        "Salary" => 15000,
    ],
    [
        "id" => 5,
        "name" => "Jess",
        "age" => 24,
        "Salary" => 10000
    ],
    [
        "id" => 6,
        "name" => "Jim",
        "age" => 26,
        "Salary" => 9000
    ],
    [
        "id" => 7,
        "name" => "Jack",
        "age" => 28,
        "Salary" => 12000
    ]
];

foreach ($employees as $employee) {
    echo "<h1>ID: $employee[id], Name: $employee[name], Age: $employee[age], Salary: $employee[Salary]</h1>";
}

// ## Array functions

$shakes = ["chocolate", "vanilla", "strawberry", "mint", "hazelnut"];

// array_push => pushes an element onto the end of an array
array_push($fruits, "strawberry", "kiwi", "watermelon");
print_r($fruits);

// array_pop => pops the last element of an array
array_pop($fruits);
print_r($fruits);

// array_shift => pops the first element of an array
array_shift($fruits);
print_r($fruits);

// array_unshift => pushes an element onto the beginning of an array
array_unshift($fruits, "strawberry", "kiwi", "watermelon");
print_r($fruits);

// array_merge => merges two or more arrays
$allFruits = array_merge($fruits, $shakes);
print_r($allFruits);

// array_key_exists => checks if an array key exists
if (array_key_exists("apple", $allFruits)) {
    echo "apple exists in the array";
} else {
    echo "apple does not exist in the array";
}

// in_array => checks if an element exists in an array
if (in_array("apple", $allFruits)) {
    echo "apple exists in the array";
} else {
    echo "apple does not exist in the array";
}

//array_search => searches an array for a given value and returns the corresponding key if successful
$key = array_search("apple", $allFruits);
echo $key;

//array_slice => extracts a slice of the array
$slice = array_slice($allFruits, 2, 3);
print_r($slice);

//array_splice => extracts a slice of the array and replaces it with something else
$splice = array_splice($allFruits, 2, 3, "kiwi", "watermelon");
print_r($allFruits);
// array_keys => returns all the keys of an array
$keys = array_keys($allFruits);
print_r($keys);

// array_values => returns all the values of an array
//echo "<br> <pre>";
$values = array_values($allFruits);
print_r($values);// 
//exit("exit");

// array_merge_recursive => merges two or more arrays recursively
$allFruits = array_merge_recursive($fruits, $shakes);
print_r($allFruits);

// array_diff => returns the difference between two arrays
$diff = array_diff($allFruits, $fruits);
print_r($diff);

// array_intersect => returns the intersection of two arrays
$intersect = array_intersect($allFruits, $fruits);
print_r($intersect);

// array_sum => returns the sum of all array elements
$sum = array_sum($allFruits);
echo $sum;

// array_reverse => reverses an array
$reversed = array_reverse($allFruits);
print_r($reversed);

// array_chunk => splits an array into chunks
$chunked = array_chunk($allFruits, 3);
print_r($chunked);

// array_filter => filters an array
$filtered = array_filter($allFruits, function ($fruit) {
    return $fruit !== "apple";
});
print_r($filtered);

// array_map => applies the callback to the elements of the given arrays
$mapped = array_map(function ($fruit) {
    return strtoupper($fruit);
}, $allFruits);
print_r($mapped);

// array_reduce => reduces an array to a single value
$reduced = array_reduce($allFruits, function ($acc, $fruit) {
    return $acc . " " . $fruit;
});
echo $reduced;

// ## Sorting arrays
asort($allFruits);
print_r($allFruits);

// ## Sorting associative arrays
ksort($allFruits);
print_r($allFruits);


// Array Intersection
$array1 = [1, 2, 3, 4, 5];
$array2 = [3, 4, 5, 6, 7];
$array3 = array_intersect($array1, $array2);
print_r($array3); // Output: Array ( [0] => 3 [1] => 4 [2] => 5 )

// Array Difference
$array1 = [1, 2, 3, 4, 5];
$array2 = [3, 4, 5, 6, 7];
$array3 = array_diff($array1, $array2);
print_r($array3); // Output: Array ( [0] => 1 [1] => 2 [2] => 6 [3] => 7 )

// array_unique => removes duplicate values from an array
$array3 = array_unique($array3);
print_r($array3); // Output: Array ( [0] => 1 [1] => 2 [2] => 6 [3] => 7 )


?>