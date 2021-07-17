<?php

/**
 * We should always sanitize and validate user inputs for security reason!
 *
 * It's typically good idea to "Filter (sanitize & validate) on input, escape on output" as golden rule. However
 * this might not be the typical PHP way of processing data documented in their official documentation. In this
 * lesson, we will explore these tricky concerns of when/why we need to escape unsafe user inputs.
 *
 * - Sanitize input meaning strip out unwanted character, but do not escape (or transform/encode them) them yet.
 *
 *   Here it can be tricky. If you are doing purely PHP webapp, and you are okay and want to stored escaped/encoded
 *   data into DB, then you may use PHP filter_var() with sanitize flags
 *   (https://www.php.net/manual/en/filter.filters.sanitize.php) for this step. But these method  will sanitize
 *   AND escape the input all together!
 *
 *   NOTE: The word SANITIZE in PHP is confusing. In pure sense, the SANITIZE to me means we strip out
 *   characters we do not want, but we DO NOT encode/escape/transform the data. However PHP designer, especially
 *   context of filter_var(), the word SANITIZE can be used to strip data AND encoding at the same time!
 *   In this lesson, I will use the term SANITIZE to only strip unclean data, not encoding.
 *
 *   But if you want purely just sanitize unwanted data only, and then save to DB with unescape input, then you
 *   need to be more careful. For example the following might be enough to just SANITIZE input:
 *
 *     filter_var($input, FILTER_UNSAFE_RAW | FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
 *
 * - Validate input does not modify the input, but simply check weather data is valid or not. Putting
 *   a stop gate before proceeding. Here you may also use filter_var() one of validate flags
 *   (https://www.php.net/manual/en/filter.filters.validate.php) to check input. They should return you
 *   a boolean result.
 *
 * - After we validate data, we may store them into storage (like DB).
 *
 * - If we need to render these input data back onto the UI, example redisplay a form if input is
 *   invalid, or we simply want to query the data and render them in a table etc. We must first "escape"
 *   them (transform/encode) in HTML.
 *
 *   NOTE: When rendering the escaped text in a HTML form again, the value it displayed
 *   will be automatically "Unescaped" to show user their intended value! This is normal.
 *
 *   Again, here is also can be tricky. If you stored the input in DB already encoded, then you MUST not double
 *   encoding them here again to display on HTML, or you data may come out "garbled"! If you choose this method,
 *   you must ensure that no one can enter unsafe data in DB, since you will not be escaping the data queried from
 *   DB to display on HTML! This can be dangerous!
 *
 *   If you choose the method of storing "Unescaped" data in DB, then you would ALWAYS need to escape them
 *   explicitly before displaying the HTML. This is so that a "<" will become "&lt;". You may use PHP
 *   htmlspecialchars() method to escape data.
 *
 * The above is for typical PHP dynamic pages handling. But for REST API backend code it's
 * a little bit different. We still follow the sample principle of "Filter (sanitize & validate) on
 * input, escape on output". In this case, I highly recommend we do not escape the user input, and not
 * stored escaped input into DB!
 *
 * Also note that the PHP json_encode() will automatically escape characters properly for JSON transport
 * (eg: the double quotes will be added with forward slosh so it will become JSON valid), but the data
 * is considered raw (unescaped). The rest client who received it needs to decode the JSON string, and
 * they must escape the raw data before rendering as HTML output. (NOTE: JS library such as VueJS does
 * this automatically with their v-bind:text directive)
 */

//
// Lesson DEMO:
// We will demonstrate what double escape user input will happen:
//
$message = htmlspecialchars($_POST['message'] ?? '');

// Double escape it on purpose. To test this, enter "<script>" in textarea.
// NOTE: When you do this, the script tag will be escaped twice and display as "&lt;script&gt;",
//       which is NOT what you want!
$message = htmlspecialchars($message);
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
