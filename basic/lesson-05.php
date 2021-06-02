<?php
/*
- html div, navbar and menu
- php require/include
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP Lessons</title>
</head>
<body>

<?php include 'lesson-05-navbar.php'; ?>

<h1>A div box - horizontal center</h1>
<div style="background-color: pink; height: calc(88px * 3);">
    <div style="background-color: lightblue; width: 88px; height: 88px;  margin: 0 auto;"></div>
</div>

<h1>A flex box - both horizontal and vertical center</h1>
<div style="background-color: pink; height: calc(88px * 3); display: flex; justify-content: center; align-items: center">
    <div style="background-color: lightblue; width: 88px; height: 88px;"></div>
    <div style="background-color: lightyellow; width: 88px; height: 88px;"></div>
    <div style="background-color: lightgreen; width: 88px; height: 88px;"></div>
</div>

<h1>A flex box - navbar</h1>
<div style="background-color: pink; height: 100px; display: flex; justify-content: center; align-items: center">
    <div style="padding: 1em;"><a href="">One</a></div>
    <div style="padding: 1em;"><a href="">Two</a></div>
    <div style="padding: 1em;"><a href="">Three</a></div>
</div>

</body>
</html>
