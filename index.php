<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/vue.js"></script>
    <title>PHP Lessons</title>
</head>
<body>
<div id="app">
    <nav class="navbar is-dark">
        <div class="navbar-burger" data-target="navbar-menu"
             :class="{'is-active': isMobileMenuActive}" @click="toggleIsMobileMenuActive">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="navbar-menu" id="navbar-menu" :class="{'is-active': isMobileMenuActive}">
            <div class="navbar-start">
                <a class="navbar-item">Home</a>
                <a class="navbar-item">Basic</a>
                <a class="navbar-item">Common Tasks</a>
            </div>
        </div>
    </nav>
    <section class="hero is-large is-primary">
        <div class="hero-body">
            <div class="columns m-4">
                <div class="column">
                    <div class="notification is-danger notification-box">
                        PHP
                    </div>
                </div>
                <div class="column">
                    <div class="notification is-warning notification-box">
                        HTML/CSS/JavaScript
                    </div>
                </div>
                <div class="column">
                    <div class="notification is-info notification-box">
                        Bulma/VueJS
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer has-text-centered">
        Zemian Deng &copy; <?php echo date('Y'); ?>
    </footer>
</div>
<script>
    new Vue({
        data: function () {
            return {
                isMobileMenuActive: null
            }
        },
        methods: {
            toggleIsMobileMenuActive() {
                this.isMobileMenuActive = (this.isMobileMenuActive ? null : true);
            }
        }
    }).$mount('#app');
</script>
</body>
</html>