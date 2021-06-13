<?php
/*
- html table
- php json_decode
- php associative array
 */

$json_string = file_get_contents('../data/us_state_capitals.json');
$data = json_decode($json_string, true); // true = return associate array
//var_dump($data);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP Lessons</title>
</head>
<body>

<h1>Table</h1>
<table>
    <?php foreach ($data as $state => $info) { ?>
    <tr>
        <td><?php echo $state; ?></td>
        <td><?php echo $info['name']; ?></td>
        <td><?php echo $info['capital']; ?></td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
