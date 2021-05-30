<?php
// Array
$ary = [7, 8, 9];
$ary2 = array(5, 6, 7);
var_dump($ary);
var_dump($ary2);

for ($i = 0; $i < count($i); $i++) {
    echo $ary[$i];
}

foreach ($ary as $x) {
    echo $x;
}

// Append
array_push($ary, 11);
$ary[] = 12;
var_dump($ary);

// Remove - Index will NOT BE RESET!
unset($ary[0]);
var_dump($ary);

// Associative Array (Map/Dictionary)
$m = array("foo" => 99, "bar" => 88, "baz" => 77);
var_dump("array-map", $m);
echo $m['foo'];

if (isset($m['dummy'])) {
    echo $m['dummy'];
}
