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