<?php
$message = htmlspecialchars($_POST['message'] ?? '');

// Double escape it on purpose. To test this, enter "<script>" in textarea.
// NOTE: When you do this, the script tag will be escaped twice and display as "&lt;script&gt;",
//       which is NOT what you want!
$message = htmlspecialchars($message);

// NOTE: How should we store the user input then?
// We are suppose to "Filter (sanitize & validate) on input, escape on output". but don't escape more than once.
// Therefore we store data after we filtered them, but before escape. Data retrieved from DB
// needs to be escaped before display on UI.
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/bulma">
</head>
<body>
    <form class="section container box" method="POST">
        <div class="field">
            <div class="label">Message</div>
            <div class="control">
                <textarea class="textarea" name="message"><?php echo $message; ?></textarea>
            </div>
        </div>

        <div class="control">
            <input class="button" type="submit"></input>
        </div>
    </form>

</body>
</html>
