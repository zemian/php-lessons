<?php
/**
 * - PHP $_POST
 * - Form Process, redirect and data store
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form_data = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'message' => $_POST['message']
    ];

    // Save data here
    $file_count = count(glob("lesson-09-form-data/*.json"));
    $form_data['id'] = $file_count + 1;
    $form_data['processed_timestamp'] = date('c');
    file_put_contents("lesson-09-form-data/{$form_data['id']}.json", json_encode($form_data));

    // perform redirect
    header("Location: lesson-09-form-success.php?id={$form_data['id']}");
    exit;
}

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
        <div class="is-flex is-justify-content-center">
            <form method="POST" action="lesson-09-form.php" style="width: 40rem;">
                <h1 class="title">Contact Form</h1>
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input class="input" type="text" name="name">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                        <input class="input" type="email" name="email">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Message</label>
                    <div class="control">
                        <textarea class="textarea" name="message"></textarea>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <label class="checkbox">
                            <input type="checkbox" name="opt"> Option1
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" name="opt"> Option2
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" name="opt"> Option3
                        </label>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="choice"> Choice1
                        </label>
                        <label class="radio">
                            <input type="radio" name="choice"> Choice2
                        </label>
                        <label class="radio">
                            <input type="radio" name="choice"> Choice3
                        </label>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Select</label>
                    <div class="control">
                        <div class="select">
                            <select>
                                <option value="mon">Monday</option>
                                <option value="tue">Tuesday</option>
                                <option value="wed">Wednesday</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <input class="button" type="submit" name="Post">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
