<?php
// We demonstrate how raw data is encoded in JSON with PHP, and how JS library such
// as VueJS can render and escape the output on HTML side.
$data = [
    'hello' => 'Hello World',
    'double_quote' => 'I am a string that has "double" inside.',
    'single_quote' => "I am a string that has 'single' inside.",
    'tag' => "I am a string that has <script>alert('hi');</script> inside.",
    'unicode' => "My \u{1F600} brings a smile on you.",
];
//echo json_encode($data, JSON_PRETTY_PRINT);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>App</title>
    <link rel="stylesheet" href="https://unpkg.com/bulma">
    <script src="https://unpkg.com/vue@3"></script>
</head>
<body>

<div class="section container box">
    <h1>The encoded JSON string</h1>
    <pre><?php echo htmlentities(json_encode($data, JSON_PRETTY_PRINT)); ?></pre>
</div>

<div id="app" class="section container box">
    <h1>The VueJS escaped output for HTML</h1>
    <ul>
        <li v-for="item in list">{{item}}</li>
    </ul>
</div>
<script>
    Vue.createApp({
        data() {
            return {
                list: <?php echo json_encode($data); ?>
            }
        }
    }).mount('#app');
</script>

</body>
</html>