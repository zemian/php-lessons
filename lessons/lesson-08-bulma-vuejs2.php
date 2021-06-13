<?php
/**
 * - PHP constants: __DIR__, __FILE__
 * - PHP globalvar: $_SERVER, $_GET
 * - CSS: center text vs div
 * - Bulma level
 * - CSS: display:none, visibility
 * - Vue v-if/v-show, using fetch()
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>App</title>
    <link rel="stylesheet" href="https://unpkg.com/bulma">
    <script src="https://unpkg.com/vue@3"></script>
</head>
<body>

<div id="app">
    <div class="section">
        <div class="container">
            <h1 class="title">Constants</h1>
            <p class="block"><code>__DIR__</code>: <?php echo __DIR__; ?></p>
            <p class="block"><code>__FILE__</code>: <?php echo __FILE__; ?></p>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <h1 class="title">GlobalVars</h1>

            <p class="block"><code>$SERVER</code>: </p>
            <pre><?php echo json_encode($_SERVER, JSON_PRETTY_PRINT); ?></pre>

            <p class="block"><code>$_GET</code>: </p>
            <pre><?php echo json_encode($_GET, JSON_PRETTY_PRINT); ?></pre>
        </div>
    </div>
</div>

<script>
    const app = Vue.createApp({
        data: function () {
            return {
            }
        }
    });
    app.mount('#app');
</script>

</body>
</html>