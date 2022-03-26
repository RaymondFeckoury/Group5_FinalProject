<?php

if (isset($_POST["reset-request-submit"])) {
    // We are going to use two tokens to help prevent brute force attacks
    $selector = bin2hex(random_bytes(8));
    // Authenticates the user
    $token = random_bytes(32);

    // If published this url would change. Currently works on local host
    $url = "localhost/Group5_4300FinalProject/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

    $expires = date("U") + 1800;

    require "connDB.php";

    $userEmail = $_POST["email"];

    // Deletes any existing tokens inside the database to prevent multiple tokens
    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "An error occurred";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "An error occurred";
        exit();
    } else {
        // Hashing the token
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    // SENDING THE EMAIL

    $to = $userEmail;
    $subject = 'Reset your password for application organizer';
    $message = '<p>The link to reset your password is below.</p><br>';
    $message .= '<a href="' . $url . '">' . $url . '</a>';

    // Maybe add headers later

    mail($to, $subject, $message);

    header("Location: reset-password-php?reset=success")
    

} else {
    header("LogIn.php");
}

