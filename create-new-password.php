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
        // Grabs the tokens
        $selector = $_GET["selector"];
        $validator = $_GET["validator"];

        // Makes sure that none of the tokens are empty
        if (empty($selector) || empty($validator)) {
            echo "could not validate your request";
        } else {
            if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                // Closes the php to create the HTML form
                ?>

                <form action="reset-password.php" method="post">
                    <input type="hidden" name="selector" value="<?php echo $selector ?>">
                    <input type="hidden" name="validator" value="<?php echo $validator ?>">
                    <input type="password" name="pwd" placeholder="Enter a new password">
                    <input type="password" name="pwd" placeholder="Enter new password again">
                    <button type="submit" name="reset-password-submit">Reset Password</button>
                </form>
                
                <?php
            }
        }
    ?>
</body>
</html>