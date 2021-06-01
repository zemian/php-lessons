<?php
/*
- php rand() function
- html div
- css border, background
 */

$images = [
    'http://www.gainesvillerabbitrescue.org/wp-content/uploads/2021/05/183872161_10157631978561883_7797108323982322461_n.jpg',
    'http://www.gainesvillerabbitrescue.org/wp-content/uploads/2021/03/157317399_10157504020001883_6020008799573241196_n.jpg',
    'http://www.gainesvillerabbitrescue.org/wp-content/uploads/2021/01/138721916_10157391956446883_9101875837231938206_n.jpg'
];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP Lessons</title>
</head>
<body>
    <p>Random: <?php echo rand(); ?></p>
    <p>Random: <?php echo rand(1, 3); ?></p>
    <p>Random: <?php echo rand(10, 20); ?></p>

    <!-- A picture and a caption text -->
    <!--
    The figure element is just a block element, and it's  automatic styled by browser.
    often time, we simply replace it with a more generic "div" instead.
    -->
    <figure>
        <img src="<?php echo $images[2]; ?>" width="600">
        <figcaption>Hello there!</figcaption>
    </figure>

    <h1>image ratio</h1>
    <div>
        <!-- Problem: if you don't, you end up this way -->
        <img src="<?php echo $images[0]; ?>" width="600" height="480">
        <p>Bad ratio.</p>
    </div>
    <div style="width: 600px;">
        <!-- you keep either height or width to be auto in length! -->
        <img src="<?php echo $images[0]; ?>" style="width: 100%; height: auto;">
        <p>Good ratio - but you can't control height here.</p>
    </div>
    <div>
        <!-- resize and keep ratio -->
        <img src="<?php echo $images[0]; ?>" style="width: auto; height: auto; max-width: 600px; max-height: 480px;">
        <p>Here we get to control size and ratio!</p>
    </div>

    <h1>random image</h1>
    <div>
        <img src="<?php echo $images[rand(0, count($images) - 1)]; ?>">
    </div>

    <h1>div center</h1>
    <div style="background-color: lightpink;">
        <!-- A div is a block and it has 100% width and auto content height -->
        <!-- You need to specify height explicitly if you want to to shows up as a box -->
        <!-- If you want center a div, you must give a width then set margin "x" to auto. -->
        <div style="
                   width: 600px; height: 480px;
                   margin: 0 auto;
                   background-color: darkblue;
                   ">
        </div>
    </div>

    <h1>image center - bad one</h1>
    <!-- notice you can't just add img into a centered div. You must style the img itself! -->
    <div style="background-color: lightpink;">
        <div style="
                   width: 600px; height: 480px;
                   margin: 0 auto;
                   background-color: darkblue;
                   ">
            <img src="<?php echo $images[rand(0, count($images) - 1)]; ?>"
                 style="
                   width: auto; height: auto;
                   max-width: 600px; max-height: 480px;
                   ">
        </div>
    </div>

    <h1>image center - good one</h1>
    <div>
        <!-- You have to change a img to block display before you can set margin x to auto -->
        <img src="<?php echo $images[rand(0, count($images) - 1)]; ?>"
             style="
                   width: auto; height: auto;
                   max-width: 600px; max-height: 480px;
                   display: block;
                   margin: 0 auto;
                   border: 1px solid #000;
                   border-radius: 10px;
                   padding: 8px;
                   background-color: darkgreen;
                   ">
    </div>

</body>
</html>
