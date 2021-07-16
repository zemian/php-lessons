<?php
/**
 * - PHP $_POST
 * - Form Process, redirect and data store
 */

$form_errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form_data = [
        'name' => filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS),
        'email' => filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS),
        'message' => filter_var($_POST['message'], FILTER_SANITIZE_SPECIAL_CHARS)
    ];

    if (isset($_POST['opt']) && !empty($_POST['opt'])) {
        $form_data['opt'] = filter_var_array($_POST['opt'], FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if (isset($_POST['choice']) && !empty($_POST['choice'])) {
        $form_data['choice'] = filter_var($_POST['choice'], FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if (isset($_POST['weekday']) && !empty($_POST['weekday'])) {
        $form_data['weekday'] = filter_var($_POST['weekday'], FILTER_SANITIZE_SPECIAL_CHARS);
    }

    if (empty($form_data['name'])) {
        $form_errors['name'] = 'Name is required';
    } else if (strlen($form_data['name']) > 200) {
        $form_errors['name'] = 'Name can not be longer than 200 characters';
    }

    if (empty($form_data['email'])) {
        $form_errors['email'] = 'Email is required';
    } else if (strlen($form_data['email']) > 400) {
        $form_errors['email'] = 'Email can not be longer than 400 characters';
    } else if (!filter_var($form_data['email'], FILTER_VALIDATE_EMAIL)) {
        $form_errors['email'] = 'Email is invalid';
    }

    if (empty($form_data['message'])) {
        $form_errors['message'] = 'Message is required';
    } else if (strlen($form_data['message']) > 1000) {
        $form_errors['message'] = 'Message can not be longer than 100 characters';
    }

    if (count($form_errors) === 0) {
        // Save data here
        $file_count = count(glob("lesson-09-form-data/*.json"));
        $form_data['id'] = $file_count + 1;
        $form_data['processed_timestamp'] = date('c');
        file_put_contents("lesson-09-form-data/{$form_data['id']}.json",
            json_encode($form_data, JSON_PRETTY_PRINT));

        // perform redirect
        header("Location: lesson-09-form-success.php?id={$form_data['id']}");
        exit;
    }
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
                        <input class="input" type="text" name="name" value="<?php echo $form_data['name'] ?? ''; ?>">
                    </div>
                    <?php if (!empty($form_errors['name'])) { ?>
                        <p class="help is-danger"><?php echo $form_errors['name']; ?></p>
                    <?php } ?>
                </div>
                <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                        <input class="input" type="email" name="email" value="<?php echo $form_data['email'] ?? ''; ?>">
                    </div>
                    <?php if (!empty($form_errors['email'])) { ?>
                        <p class="help is-danger"><?php echo $form_errors['email']; ?></p>
                    <?php } ?>
                </div>
                <div class="field">
                    <label class="label">Message</label>
                    <?php if (!empty($form_errors['message'])) { ?>
                        <p class="help is-danger"><?php echo $form_errors['message']; ?></p>
                    <?php } ?>
                    <div class="control">
                        <textarea class="textarea" name="message"><?php echo $form_data['message'] ?? ''; ?></textarea>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <label class="checkbox">
                            <input type="checkbox" name="opt[]" value="c1"
                                    <?php echo isset($form_data['opt']) && array_search('c1', $form_data['opt']) !== false ? 'checked' : ''; ?>
                            > Option1
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" name="opt[]" value="c2"
                                <?php echo isset($form_data['opt']) && array_search('c2', $form_data['opt']) !== false ? 'checked' : ''; ?>
                            > Option2
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" name="opt[]" value="c3"
                                <?php echo isset($form_data['opt']) && array_search('c3', $form_data['opt']) !== false ? 'checked' : ''; ?>
                            > Option3
                        </label>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="choice" value="r1"
                                <?php echo isset($form_data['choice']) && $form_data['choice'] === 'r1' ? 'checked' : ''; ?>
                            > Choice1
                        </label>
                        <label class="radio">
                            <input type="radio" name="choice" value="r2"
                                <?php echo isset($form_data['choice']) && $form_data['choice'] === 'r2' ? 'checked' : ''; ?>
                            > Choice2
                        </label>
                        <label class="radio">
                            <input type="radio" name="choice" value="r3"
                                <?php echo isset($form_data['choice']) && $form_data['choice'] === 'r3' ? 'checked' : ''; ?>
                            > Choice3
                        </label>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Select</label>
                    <div class="control">
                        <div class="select">
                            <select name="weekday">
                                <option value="">Please Select One...</option>
                                <option value="mon"
                                    <?php echo isset($form_data['weekday']) && $form_data['weekday'] === 'mon' ? 'selected' : ''; ?>
                                >Monday</option>
                                <option value="tue"
                                    <?php echo isset($form_data['weekday']) && $form_data['weekday'] === 'tue' ? 'selected' : ''; ?>
                                >Tuesday</option>
                                <option value="wed"
                                    <?php echo isset($form_data['weekday']) && $form_data['weekday'] === 'wed' ? 'selected' : ''; ?>
                                >Wednesday</option>
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
