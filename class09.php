<?php
// Math Functions

//1. abs() => returns the absolute value of a number
echo abs(-10); //output: 10
//2. ceil() => rounds up a number
echo ceil(4.3); //output: 5
//3. floor() => rounds down a number
echo floor(4.8); //output: 4
//4. round() => rounds a number
echo round(4.5); //output: 4
//5. sqrt() => returns the square root of a number
echo sqrt(16); //output: 4
//6. pow() => returns the result of raising a number to a power
echo pow(2, 3); //output: 8
//7. max() => returns the maximum value in an array
echo max(1, 2, 3); //output: 3
//8. min() => returns the minimum value in an array
echo min(1, 2, 3); //output: 1
//9. rand() => returns a random number between 0 and 100
echo rand(); //output: 0
//10. rand(min, max) => returns a random number between min and max
echo rand(1, 10); //output: 1
//11. mt_rand() => returns a random number between 0 and 100
echo mt_rand(); //output: 0

// Date and Time Functions

//1. date() => returns the current date and time
echo date("Y-m-d H:i:s"); //output: 2022-01-01 00:00:00
//2. time() => returns the current time in seconds since the Unix Epoch
echo time(); //output: 1640995200
//3. mktime() => returns the Unix timestamp for a given date and time
echo mktime(0, 0, 0, 1, 1, 2022); //output: 1640995200
//4. strtotime() => returns the Unix timestamp for a given date and time
echo strtotime("2022-01-01"); //output: 1640995200
//5. getdate() => returns an array with information about the current date and time
echo getdate(); //output: Array
//6. date_default_timezone_get() => returns the default timezone
echo date_default_timezone_get(); //output: UTC
//7. date_default_timezone_set() => sets the default timezone
date_default_timezone_set("Asia/Kolkata");
echo date_default_timezone_get(); //output: Asia/Kolkata

