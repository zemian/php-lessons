<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contacts Management</title>
    <link rel="stylesheet" href="https://unpkg.com/bulma">
    <script src="https://unpkg.com/vue@next"></script>
</head>
<body>

<div id="app" class="section">
    <div class="columns is-centered">
        <div class="column is-one-third">
            <div class="panel">
                <p class="panel-heading">
                    Contacts Management
                </p>
                <div class="panel-block">
                    <a href="list.html">List</a>
                </div>
                <div class="panel-block">
                    <a href="setup.php?action=init_table">Create Table</a>
                </div>
                <div class="panel-block">
                    <a href="setup.php?action=create_data&count=40">Create Data</a>
                </div>
                <div class="panel-block">
                    <a href="setup.php?action=test_db">Test DB</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>