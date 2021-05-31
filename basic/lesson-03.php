<?php
  /*
- html link (anchor), img
- php array, using for and foreach on  array
- php operators
- php if/else if/else

Exercises:
1. Create a list of all 50 states and print the list
2. List states with 5 letters or less
  */

$names = ['Dumpling', 'Kimchi', 'Apricot', 'Independence']
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP Lessons</title>
</head>
<body>
    <h1>Links & images</h1>

    <a href="lesson-01.php">Lesson1</a>
    <a href="../basic/lesson-01.php">Lesson1</a>
    <a href="/basic/lesson-01.php">Lesson1</a>

    <div>
    <a href="https://php.net">PHP site</a>
    </div>

    <div>
        Hi, my name is Dumpling. <img src="/images/dumpling.png">. Do I look cute?
    </div>

    <div>
        <span style="vertical-align: top">Hi, my name is Dumpling. </span><img src="/images/dumpling.png" width="100">. Do I look cute?
    </div>

    <div style="width: 33%;">
        <img src="/images/dumpling.png" width="100" align="right">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias amet aspernatur aut autem dolor enim est ex, exercitationem expedita facilis iste modi odit porro possimus reiciendis rem suscipit! Quia.
    </div>

    <h1>Array</h1>
    <ul>
        <?php foreach($names as $name) { ?>
        <li><?php echo $name; ?></li>
        <?php } ?>
    </ul>

    <pre>
    <?php

    // Operators: +, -, *, /, ()
    // Comparators: <, >, <=, >=, ===, ?:, ??

    // if, else, else if
    // for, while
    // switch

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
        $j++;
    }
    ?>
    </pre>

    <pre>
    <?php
    // Array
    $ary = [7, 8, 9];
    $ary2 = array(5, 6, 7);
    var_dump($ary);
    var_dump($ary2);

    for ($i = 0; $i < count($ary); $i++) {
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
    ?>
    </pre>
</body>
</html>
