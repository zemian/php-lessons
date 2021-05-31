<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bulma.css">
    <script src="../js/vue.js"></script>
    <title>PHP Lessons</title>
</head>
<body>
    <div class="section">
        <div class="container">
            <h1 class="title">File Listing</h1>
            <ul class="panel">
                <?php
                // List of PHP files
                $files = scandir(".");
                for ($i = 0; $i < count($files); $i++) {
                    $file = $files[$i];
                    $ext = ".php";
                    $len = strlen($ext);
                    if (substr_compare( $file, $ext, -$len ) === 0) {
                        echo "<li class='panel-block'><a href='$file'>$file</a></li>";
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</body>
</html>