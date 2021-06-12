<?php
$form_data = json_decode(file_get_contents("lesson-09-form-data/{$_GET['id']}.json"), true);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>App</title>
    <link rel="stylesheet" href="https://unpkg.com/bulma">
</head>
<body>

<div id="app" class="section">
    <div class="container">
        <div class="notification is-success">
            <p>Thank you <b><?php echo $form_data['name']; ?></b> for the message.</p>
            <p>Back to <a href="lesson-09-form.php">form</a></p>
        </div>
    </div>
</div>

</body>
</html>
