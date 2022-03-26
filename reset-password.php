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

    <title>Reset Password</title>
</head>

<body>
    <h1>Reset your password</h1>
    <p>An email will be sent to you with instructions on how to reset your password.</p>
    <div>
        <form method="POST" action="reset-request.php">
            <input placeholder="Enter your email..." type="text" name="email">
            <button type="submit" name="reset-request-submit">Receive new password by email</button>
        </form>
        <!-- DID NOT INCLUDE PHP SCRIPT HERE -->
    </div>
</body>
</html>