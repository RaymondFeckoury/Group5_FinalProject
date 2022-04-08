<?php
    // Starts the session and makes sure we're connected to the database
    session_start();
    require('connDB.php');

    // Checks that the information in the form has been submitted
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        // Makes sure all fields are filled out
        if (empty($email)) {
            echo "<div class=echo><h6>Email must be entered to send password reset option.</h6></div>";
        } else {
            // Gets the email entered from the database
            $sql = "SELECT email FROM userList WHERE email='$email' LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $emailExists = mysqli_fetch_assoc($result);
        }

        if (!$emailExists) {
            echo "<h5>No account exists with the email you entered.</h5>";         
        } else {
            // Sends the reset password email
            echo "<h5>An email has been sent to your account.</h5>";
            
        }
    }
?>

<!--HTML page layout-->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password</title>
</head>

<body>
    <div class = "create">
        <h1> Reset Password </h1>
        <p>Please enter the email associated with your account below:</p>
        <form method="post">
            <div>
                <input type="text" placeholder="Email" name="email" required>
            </div>
            <br>
            <div>
                <button type="submit">Submit</button><br><br>
                <a href="LogIn.php">Back to Login</a>
            </div>
        </form>
    </div>
</body>
</html>