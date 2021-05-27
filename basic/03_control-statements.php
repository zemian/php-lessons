<?php
$n = 10;
if ($n < 10) {
    echo "n is less than 10";
}

$x = null;
if ($x) {
    echo "x is true";
} else {
    echo "x is false";
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
