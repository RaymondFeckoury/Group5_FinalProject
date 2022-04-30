<!--HTML page layout-->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../CSS/login.css">
    <title>Forgot Password</title>
</head>

<body>
<div class="center">
        <h1> Reset Password </h1>
        <p>Please enter the email associated with your account below:</p>
        <form method="post" action="send-recovery-mail.php">
            <div>
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <br>
            <div>
                <input type="submit" value="Send Recovery Email"><br><br>
                <a href="LogIn.php">Back to Login</a>
            </div>
        </form>
    </div>
</body>
</html>

