<?php
    // Starts the session and makes sure we're connected to the database
    session_start();
    require('connDB.php');

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        // Validates input: all fields filled and password is at least 7 characters
        if (empty($username) || empty($password) || empty($email)) {
            echo "<h5>Please fill out all fields.</h5>";
        } else if (strlen($password) < 7) {
            echo "<h5>Password must be more than 6 characters.</h6>";
        } else {
            // Checks for duplicates already in the user list database
            $checkDuplicate = "SELECT * FROM userList WHERE username='$username' OR email='$email' LIMIT 1";
            $result = mysqli_query($conn, $checkDuplicate);
            $user = mysqli_fetch_assoc($result);
            // If a user with the same info already exists
            if ($user) {
                // Case: same username
                if ($user['username'] === $username) {
                    echo "<h5>Username already exists!</h5>";
                }
                // Case: same email
                if ($user['email'] === $email) {
                    echo "<h5>Email already exists!</h5>";
                }
            } else {
                // Inserts account info into the database
                $query = "INSERT INTO userList VALUES('$username', '$password', '$email')";
                mysqli_query($conn, $query);
                // I DONT KNOW WHAT THE POINT OF THIS IS BUT WE END UP AT LOGGEDIN.HTML (hopefully)
                if(isset($_SESSION['username'])) {
                    header('Location: ../HTML/index.html');
                    exit();
                } else if (isset($_POST['username'])) {
                    $username = $_POST['username'];
                    $_SESSION['username'] = $username;
                    $url = "../HTML/index.html";
                    header('Location: ../HTML/index.html');
                    exit();
                }
            }
        }
    }
     
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../CSS/login.css">
    <title>Log In/Create Account</title>
</head>

<body>
    <div class = "create">
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