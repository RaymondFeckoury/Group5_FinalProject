<!DOCTYPE html>
<html lang="en-US">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Log In/Create Account</title>
</head>

<body>
    <div>
        <h1>Create an account</h1>
        <p>Let's Get Started!<p>
        <form method="post">
            <div>
                <input type="text" placeholder="Username" name ="username" required>
            </div>
            <div>
                <input type="email" placeholder="Email" name ="email" required>
            </div>
            <div>
                <input type="password" placeholder="Password" name ="password" required>
            </div>
            <div>
                <button type="submit">Submit</button>
                <button>Learn More</button>
            </div>
            <div>
                <p> Have an account? Log in <a href="LogIn.php">here</a>.</p>
            </div>
        </form>
    </div>
</body>
</html>