<?php
$json_string = file_get_contents('../data/us_state_capitals.json');
$data = json_decode($json_string);
$props = get_object_vars($data);
//var_dump($props);
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
    <?php foreach ($props as $state => $info) { ?>
    <tr>
        <td><?php echo $state; ?></td>
        <td><?php echo $info->name; ?></td>
        <td><?php echo $info->capital; ?></td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
