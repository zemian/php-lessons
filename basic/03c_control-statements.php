<?php

// Operators: +, -, *, /, ()
// Operator: &&, ||
// Comparators: <, >, <=, >=, ===, ?:, ??

// if, else, else if
// for, while
// switch

$n = 10;
if ($n < 10) {
    echo "n is less than 10";
}

$x = 99;
if ($x < 10) {
    echo "x is less than 10";
} else if ($x > 10 && $x < 50) {
    echo "x is between 10 and 50";
} else {
    echo "x is greater than 50";
}

if (isset($y)) {
    echo "y is set";
}

for ($i = 0; $i < 10; $i++) {
    echo $i;
}

$j = 0;
while ($j < 10) {
    echo $j;
}
