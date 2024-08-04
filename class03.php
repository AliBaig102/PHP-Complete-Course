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

//  >>>>>>>>>>>>>>>>>>>> Task 01 <<<<<<<<<<<<<<<<<<<<


// 1. If-Else Statement Assignment

/*
Scenario:
You're creating a simple login system for a website.

Requirements:
- Use an if-else statement to check if the entered password matches the correct password.
- If the password is correct, display a welcome message.
- If the password is incorrect, display an error message.
- Use a variable to store the correct password and another to store the user's input.

Example Output:
Enter your password: mysecretpass
Welcome! You have successfully logged in.

Enter your password: wrongpass
Error: Incorrect password. Please try again.
*/


// 2. Else-If Statement Assignment

/*
Scenario:
You're developing a program for a fruit vendor to calculate discounts based on the quantity of fruits purchased.

Requirements:
- Use else-if statements to determine the discount percentage based on the quantity purchased.
- Apply the following discount rules:
  - 0-4 kg: No discount
  - 5-9 kg: 5% discount
  - 10-14 kg: 10% discount
  - 15 kg and above: 15% discount
- Display the original price, discount percentage, and final price after discount.

Example Output:
Quantity purchased: 12 kg
Price per kg: $5
Original price: $60
Discount: 10%
Final price: $54
*/


// 3. Switch Statement Assignment

/*
Scenario:
Create a simple calculator that performs basic arithmetic operations.

Requirements:
- Use a switch statement to perform the calculation based on the operator.
- Support addition (+), subtraction (-), multiplication (*), and division (/).
- If an invalid operator is entered, display an error message.
- Use variables to store two numbers and the operator.

Example Output:
Enter first number: 10
Enter operator (+, -, *, /): *
Enter second number: 5
Result: 10 * 5 = 50

Enter first number: 20
Enter operator (+, -, *, /): %
Enter second number: 3
Error: Invalid operator
*/


// 4. Ternary Operator Assignment

/*
Scenario:
You're creating a program for a movie theater to determine ticket prices based on age.

Requirements:
- Use the ternary operator to set the ticket price based on the customer's age.
- If the customer is 12 years old or younger, the ticket price is $8. Otherwise, it's $12.
- Display the customer's age and the ticket price.

Example Output:
Enter customer's age: 10
Customer age: 10
Ticket price: $8

Enter customer's age: 25
Customer age: 25
Ticket price: $12
*/


//  >>>>>>>>>>>>>>>>>>>> Task 02 <<<<<<<<<<<<<<<<<<<<


// 1. If-Else Statement Assignment

/*
Scenario:
You're developing a program for a swimming pool that determines if it's safe to swim based on water temperature.

Requirements:
- Use an if-else statement to check if the water temperature is safe for swimming.
- If the temperature is between 78°F and 85°F (inclusive), it's safe to swim.
- Display an appropriate message for safe or unsafe conditions.
- Use a variable to store the water temperature.

Example Output:
Water temperature: 80°F
It's safe to swim. Enjoy the pool!

Water temperature: 90°F
The water is too warm. Swimming is not recommended.
*/


// 2. Else-If Statement Assignment

/*
Scenario:
Create a program that provides UV index warnings based on the current UV index level.

Requirements:
- Use else-if statements to determine the warning message based on the UV index.
- Use the following UV index ranges:
  - 0-2: Low
  - 3-5: Moderate
  - 6-7: High
  - 8-10: Very High
  - 11+: Extreme
- Display the UV index and the corresponding warning message.

Example Output:
Current UV Index: 7
Warning: High UV levels. Protection against sun damage is required.

Current UV Index: 1
UV levels are low. No protection required.
*/


// 3. Switch Statement Assignment

/*
Scenario:
You're creating a program for a coffee shop that calculates the price of a coffee based on its size.

Requirements:
- Use a switch statement to determine the price based on the coffee size.
- Offer the following sizes and prices:
  - Small: $2.50
  - Medium: $3.00
  - Large: $3.50
  - Extra Large: $4.00
- If an invalid size is entered, display an error message.
- Use a variable to store the coffee size.

Example Output:
Enter coffee size (Small/Medium/Large/Extra Large): Medium
Price for Medium coffee: $3.00

Enter coffee size (Small/Medium/Large/Extra Large): Super Size
Error: Invalid coffee size
*/


// 4. Ternary Operator Assignment

/*
Scenario:
Develop a simple program for a library that determines if a book is overdue.

Requirements:
- Use the ternary operator to determine if a book is overdue based on the number of days it has been borrowed.
- If the book has been borrowed for more than 14 days, it's overdue.
- Display whether the book is overdue or not.

Example Output:
Enter the number of days the book has been borrowed: 12
Book status: Not overdue. Enjoy your reading!

Enter the number of days the book has been borrowed: 16
Book status: Overdue. Please return the book as soon as possible.
*/

//  >>>>>>>>>>>>>>>>>>>> Task 03 <<<<<<<<<<<<<<<<<<<<


// 1. If-Else Statement Assignment

/*
Scenario:
Create a simple rock-paper-scissors game where the computer's choice is predetermined.

Requirements:
- Use if-else statements to determine the winner.
- The computer's choice should be stored in a variable.
- The player's choice should be stored in another variable.
- Display the choices and the result (win, lose, or tie).
- Bonus: Use nested if-else statements to handle all possible combinations.

Example Output:
Computer chose: Rock
You chose: Paper
Result: You win!

Computer chose: Scissors
You chose: Scissors
Result: It's a tie!
*/


// 2. Else-If Statement Assignment

/*
Scenario:
Develop a program that calculates and displays shipping costs based on package weight and destination.

Requirements:
- Use else-if statements to determine the shipping cost.
- Consider two destinations: Domestic and International.
- Use the following weight ranges and prices:
  Domestic:
  - 0-1 kg: $5
  - 1.1-3 kg: $10
  - 3.1-5 kg: $15
  - Over 5 kg: $20
  International:
  - 0-1 kg: $15
  - 1.1-3 kg: $25
  - 3.1-5 kg: $40
  - Over 5 kg: $60
- Display the weight, destination, and calculated shipping cost.
- Bonus: Add input validation to ensure weight is a positive number.

Example Output:
Enter package weight (kg): 2.5
Enter destination (Domestic/International): Domestic
Shipping cost for a 2.5 kg package to a Domestic address: $10

Enter package weight (kg): 4.2
Enter destination (Domestic/International): International
Shipping cost for a 4.2 kg package to an International address: $40
*/


// 3. Switch Statement Assignment

/*
Scenario:
Create a program that converts a numeric grade to a letter grade for a school.

Requirements:
- Use a switch statement to convert the numeric grade to a letter grade.
- Use the following grading scale:
  90-100: A
  80-89: B
  70-79: C
  60-69: D
  0-59: F
- Display both the numeric and letter grade.
- Bonus: Use fall-through behavior in the switch statement to simplify the code.

Example Output:
Enter numeric grade: 85
Numeric grade: 85
Letter grade: B

Enter numeric grade: 92
Numeric grade: 92
Letter grade: A
*/


// 4. Ternary Operator Assignment

/*
Scenario:
Develop a simple leap year checker.

Requirements:
- Use the ternary operator to determine if a given year is a leap year.
- A leap year is divisible by 4, but century years must also be divisible by 400.
- Display whether the year is a leap year or not.
- Bonus: Use nested ternary operators to handle the century year exception.

Example Output:
Enter a year: 2024
2024 is a leap year.

Enter a year: 1900
1900 is not a leap year.

Enter a year: 2000
2000 is a leap year.
*/
