<?php
// https://www.php.net/manual/en/features.file-upload.post-method.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phpFileUploadErrors = array(
        0 => 'There is no error, the file uploaded with success',
        1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
        2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
        3 => 'The uploaded file was only partially uploaded',
        4 => 'No file was uploaded',
        6 => 'Missing a temporary folder',
        7 => 'Failed to write file to disk.',
        8 => 'A PHP extension stopped the file upload.',
    );

    if ($_FILES['userFile']['error'] === 0) {
        $form_data['userFile'] = $_FILES['userFile'];
    } else {
        $form_data['errors'] = [
                'userFile' => $phpFileUploadErrors[$_FILES['userFile']['error']]
        ];
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>App</title>
    <link rel="stylesheet" href="https://unpkg.com/bulma">
    <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    <script src="https://unpkg.com/vue@3"></script>
</head>
<body>

<div id="app" class="section">
    <div class="container">

        <?php if (isset($form_data['errors'])) { ?>
            <div class="notification is-danger">
                <?php echo $form_data['errors']['userFile']; ?>
            </div>
        <?php } ?>

        <form action="file-upload.php" method="POST" enctype="multipart/form-data">
            <div class="field" style="width: 30rem;">
                <div class="file has-name is-boxed is-fullwidth">
                    <label class="file-label">
                        <!-- php: MAX_FILE_SIZE must precede the file input field -->
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                        <input class="file-input" type="file" name="userFile" @change="uploadedFile = $event.target.files[0]">
                        <span class="file-cta">
                      <span class="file-icon">
                        <i class="fas fa-upload"></i>
                      </span>
                      <span class="file-label">
                        Choose a file…
                      </span>
                    </span>
                        <span class="file-name">
                        <span v-if="uploadedFile">{{uploadedFile.name}}</span>
                    </span>
                    </label>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <input class="button is-primary" type="submit">
                </div>
            </div>
        </form>
        <?php if (isset($form_data) && !isset($form_data['errors'])) { ?>
            <hr>
            <pre>
                <?php echo json_encode($form_data, JSON_PRETTY_PRINT); ?>
            </pre>
        <?php } ?>
    </div>
</div>
<script>
    const app = Vue.createApp({
        data() {
            return {
                uploadedFile: null
            }
        }
    });
    app.mount('#app');
</script>

</body>
</html>