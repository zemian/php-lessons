<?php
  /*
- html, title, header, text, inline elements
- html list: ul, ol, li
- php for loop, using for loop in html

Exercises:
1. List all alphabet letters (see chr function)
  */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP Lessons</title>
</head>
<body>
    <h1>Header, Text and List</h1>
    <h2>Sub header</h2>
    <p>We <b>will</b> <i>learn</i> about list <code>below</code>.
        Look a <button>button</button> is also an inline element.</p>
    <ul>
        <li>one</li>
        <li>two</li>
        <li>three</li>
    </ul>
    <ol>
        <li>one</li>
        <li>two</li>
        <li>three</li>
    </ol>
    <p>Thank you for participating.</p>

    <ul>
        <?php
        for ($i = 0; $i < 10; $i++) {
            echo "<li>$i</li>";
        }
        ?>
    </ul>
    <ol>
        <?php
        for ($i = 0; $i < 10; $i++) {
            ?>
            <li><?php echo $i; ?></li>
            <?php
        }
        ?>
    </ol>
</body>
</html>
