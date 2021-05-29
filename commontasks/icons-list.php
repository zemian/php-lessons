<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <script src="../js/vue.js"></script>
    <title>PHP Lessons</title>
</head>
<body>
<div id='app' class="section">
    <div class="container">
        <h1 class="title">Icons Listing</h1>
        <p class="subtitle">There {{icons.length}} icons found.</p>
        <div class="columns is-flex-wrap-wrap">
            <div class="column is-one-quarter" v-for="name in icons">
                <span class="icon-text is-large">
                    <span class="icon">
                        <i class="fa-lg" :class="name"></i>
                    </span>
                    <span>{{name}}</span>
                </span>
            </div>
        </div>
    </div>
</div>
<script>
    new Vue({
        data() {
            return {
                icons: []
            }
        },
        created() {
            fetch('../css/fontawesome/metadata/icons.json')
                .then(resp => resp.json()).then(data => {
                // console.log("icons", data);
                for (let name in data) {
                    let pre = 'fas';
                    const meta = data[name];
                    if (meta.styles[0] === 'brands')
                        pre = 'fab';
                    this.icons.push(pre + ' fa-' + name);
                }
            });
        }
    }).$mount('#app')
</script>

</body>
</html>