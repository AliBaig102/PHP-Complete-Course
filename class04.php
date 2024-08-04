<?php
//## Class 4: Loops
//- For loop, while loop, do-while loop, foreach loop
//- Loop control statements (break, continue, goto)
//- Practical examples

// ## For Loop
for ($i = 0; $i < 10; $i++) {
    echo $i;
}

// ## While Loop
$i = 0;
while ($i < 10) {
    echo $i;
    $i++;
}

// ## Do-While Loop
$i = 0;
do {
    echo $i;
    $i++;
} while ($i < 10);

// ## Foreach Loop
$array = [1, 2, 3, 4, 5];
foreach ($array as $value) {
    echo $value;
}

// ## Loop Control Statements

// break
for ($i = 0; $i < 10; $i++) {
    if ($i == 5) {
        break;
    }
    echo $i;
}

// continue
for ($i = 0; $i < 10; $i++) {
    if ($i == 5) {
        continue;
    }
    echo $i;
}

// goto
for ($i = 0; $i < 10; $i++) {
    if ($i == 5) {
        goto label;
    }
    echo $i;
}
label:
    echo "Hello World!";





// >>>>>>>>>>>>>>>>>>>> Task 04 <<<<<<<<<<<<<<<<<<<<


// 1. For Loop Assignment

/*
Scenario:
Create a simple multiplication table generator for a given number.

Requirements:
- Use a for loop to generate a multiplication table from 1 to 10 for a given number.
- Display the multiplication table in a formatted manner.
- Bonus: Allow the user to specify the range of the multiplication table.

Example Output:
Enter a number: 7
Multiplication table for 7:
7 x 1 = 7
7 x 2 = 14
7 x 3 = 21
...
7 x 10 = 70
*/


// 2. While Loop Assignment

/*
Scenario:
Develop a simple number guessing game.

Requirements:
- Generate a random number between 1 and 100.
- Use a while loop to allow the user to guess the number.
- Provide "too high" or "too low" hints after each incorrect guess.
- Count and display the number of attempts when the correct number is guessed.
- Bonus: Implement a maximum number of attempts.

Example Output:
I'm thinking of a number between 1 and 100.
Enter your guess: 50
Too high!
Enter your guess: 25
Too low!
Enter your guess: 37
Correct! You guessed the number in 3 attempts.
*/


// 3. Do-While Loop Assignment

/*
Scenario:
Create a program that calculates the sum of digits for a given number.

Requirements:
- Use a do-while loop to extract each digit from the number.
- Calculate the sum of these digits.
- Display the original number and the sum of its digits.
- Bonus: Validate that the input is a positive integer.

Example Output:
Enter a positive integer: 12345
Sum of digits in 12345 is 15.

Enter a positive integer: 9876
Sum of digits in 9876 is 30.
*/


// 4. Foreach Loop Assignment

/*
Scenario:
Develop a program that finds the highest and lowest temperatures from a week's worth of daily temperatures.

Requirements:
- Create an array with seven daily temperatures.
- Use a foreach loop to iterate through the temperatures.
- Find and display the highest and lowest temperatures.
- Calculate and display the average temperature.
- Bonus: Count how many days were above average.

Example Output:
Weekly Temperatures: [23, 28, 22, 26, 25, 29, 27]
Highest temperature: 29°C
Lowest temperature: 22°C
Average temperature: 25.7°C
Days above average: 3
*/


// 5. Loop Control Statements Assignment

/*
Scenario:
Create a program that generates a list of prime numbers within a given range.

Requirements:
- Use a loop (your choice) to iterate through numbers in the given range.
- Use the 'break' statement to optimize the primality test.
- Use the 'continue' statement to skip even numbers (except 2).
- Display the list of prime numbers found.

Example Output:
Enter the start of the range: 10
Enter the end of the range: 50
Prime numbers between 10 and 50 are:
11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47
*/

// >>>>>>>>>>>>>>>>>>>>>>> Task 02 <<<<<<<<<<<<<<<<<<<<


// 1. For Loop Assignment

/*
Scenario:
Create a program that generates a pyramid pattern of numbers.

Requirements:
- Use a for loop to generate a pyramid pattern of numbers.
- The pyramid should have a specified number of rows (1 to 9).
- Each row should contain numbers starting from 1 up to the row number.
- Display the pyramid pattern.

Example Output:
Enter the number of rows (1-9): 5

1
1 2
1 2 3
1 2 3 4
1 2 3 4 5
*/


// 2. While Loop Assignment

/*
Scenario:
Develop a program that simulates a simple ATM machine with a starting balance.

Requirements:
- Start with a predetermined account balance.
- Use a while loop to allow multiple transactions.
- Offer options to deposit, withdraw, or check balance.
- End the program when the user chooses to exit.
- Display the final balance when exiting.
- Bonus: Implement overdraft protection for withdrawals.

Example Output:
Starting balance: $1000
1. Deposit
2. Withdraw
3. Check Balance
4. Exit
Enter your choice: 2
Enter amount to withdraw: $300
Withdrawal successful. New balance: $700

1. Deposit
2. Withdraw
3. Check Balance
4. Exit
Enter your choice: 4
Thank you for using our ATM. Final balance: $700
*/


// 3. Do-While Loop Assignment

/*
Scenario:
Create a program that validates a password based on certain criteria.

Requirements:
- Use a do-while loop to prompt the user for a password until a valid one is entered.
- Password criteria:
  - At least 8 characters long
  - Contains at least one uppercase letter
  - Contains at least one lowercase letter
  - Contains at least one number
- Display appropriate error messages for invalid passwords.
- Congratulate the user when a valid password is entered.

Example Output:
Enter a password: password123
Error: Password must contain at least one uppercase letter.

Enter a password: Password
Error: Password must contain at least one number.

Enter a password: Password123
Congratulations! You've created a valid password.
*/


// 4. Foreach Loop Assignment

/*
Scenario:
Develop a program that analyzes a list of student grades and provides statistics.

Requirements:
- Create an associative array with student names as keys and their grades as values.
- Use a foreach loop to iterate through the grades.
- Calculate and display:
  - The class average
  - The highest and lowest grades
  - The number of passing grades (60 and above)
- Bonus: Sort and display the list of students who passed.

Example Output:
Student Grades: 
['Alice' => 85, 'Bob' => 72, 'Charlie' => 59, 'David' => 95, 'Eve' => 68]

Class Average: 75.8
Highest Grade: 95 (David)
Lowest Grade: 59 (Charlie)
Number of Passing Grades: 4

Students who passed:
1. David (95)
2. Alice (85)
3. Bob (72)
4. Eve (68)
*/


// 5. Loop Control Statements Assignment

/*
Scenario:
Create a program that finds and displays all the perfect numbers within a given range.

Requirements:
- Use a loop of your choice to iterate through numbers in the given range.
- Use the 'break' statement to optimize the factor checking process.
- Use the 'continue' statement to skip numbers that are clearly not perfect.
- A perfect number is a positive integer that is equal to the sum of its proper divisors.
- Display all perfect numbers found in the range.

Example Output:
Enter the start of the range: 1
Enter the end of the range: 1000
Perfect numbers between 1 and 1000 are:
6, 28, 496
*/

// >>>>>>>>>>>>>>>>>>>>>>> Task 03 <<<<<<<<<<<<<<<<<<<<


// 1. For Loop Assignment

/*
Scenario:
Create a program that prints the first 10 even numbers.

Requirements:
- Use a for loop to generate and print even numbers.
- Start from 2 and print the first 10 even numbers.
- Display each number on a new line.

Example Output:
2
4
6
8
10
12
14
16
18
20
*/


// 2. While Loop Assignment

/*
Scenario:
Develop a simple countdown program.

Requirements:
- Start with a number (e.g., 10) and count down to 1.
- Use a while loop for the countdown.
- Print each number on a new line.
- Print "Blast off!" after the countdown finishes.

Example Output:
10
9
8
7
6
5
4
3
2
1
Blast off!
*/


// 3. Do-While Loop Assignment

/*
Scenario:
Create a basic number guessing game with a predetermined number.

Requirements:
- Set a fixed number as the correct answer (e.g., 7).
- Use a do-while loop to allow the user to guess the number.
- Provide "too high" or "too low" hints after each incorrect guess.
- End the game when the correct number is guessed.

Example Output:
Guess the number (1-10): 5
Too low!
Guess the number (1-10): 8
Too high!
Guess the number (1-10): 7
Correct! You guessed the number!
*/


// 4. Foreach Loop Assignment

/*
Scenario:
Print out the days of the week.

Requirements:
- Create an array containing the days of the week.
- Use a foreach loop to iterate through the array.
- Print each day on a new line.

Example Output:
Monday
Tuesday
Wednesday
Thursday
Friday
Saturday
Sunday
*/


// 5. Loop Control Statements Assignment

/*
Scenario:
Create a program that prints numbers from 1 to 20, but skips multiples of 3.

Requirements:
- Use a loop to iterate from 1 to 20.
- Use the 'continue' statement to skip multiples of 3.
- Print each number that isn't skipped on a new line.

Example Output:
1
2
4
5
7
8
10
11
13
14
16
17
19
20
*/
