<?php
    require "connDB.php";
?>

<!--HTML page layout-->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create password</title>
</head>

<body>
    <?php
        $selector = $_GET["selector"];
        $selector = $_GET["validator"];

        if (empty($selector) || empty($validator)) {
            echo "could not validate your request";
        } else {
            if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                ?>

                

                <?php
            }
        }
    ?>
</body>
</html>