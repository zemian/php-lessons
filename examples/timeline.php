<?php
//echo date('c', strtotime('today')), "\n";
//echo date('c', strtotime('yesterday')), "\n";
//echo date('c', strtotime('-3 days')), "\n";
$timeline = [];
for ($i = 0; $i < 10; $i++) {
    $timeline[] = ['comment' => "Test $i", "datetime" => date('c', strtotime("-$i days"))];
}
#var_dump($timeline);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>App</title>
    <link rel="stylesheet" href="https://unpkg.com/bulma">
</head>
<body>

<div id="app" class="section">
    <div class="container">
        <ul class="timeline">
            <?php foreach ($timeline as $item) { ?>
                <li class="block"><?php echo $item['datetime'] ?></li>
            <?php } ?>
        </ul>
    </div>
</div>

</body>
</html>