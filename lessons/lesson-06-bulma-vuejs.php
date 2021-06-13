<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>App</title>
    <link rel="stylesheet" href="https://unpkg.com/bulma">
    <script src="https://unpkg.com/vue@3"></script>
</head>
<body>

<div id="app" class="section">
    <div class="container">
        <button class="button" @click="count++">Test</button>
        <p>Clicked Count: {{count}}</p>
    </div>
</div>
<script>
    const app = Vue.createApp({
        data: function () {
            return {
                count: 0
            }
        }
    });
    app.mount('#app');
</script>

</body>
</html>