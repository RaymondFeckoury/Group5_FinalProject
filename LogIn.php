<?php    
    // Starts the session and makes sure we're connected to the database
    session_start();
    require('connDB.php');

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $emptyUP = false;
        // Makes sure all fields are filled out
        if (empty($username) || empty($password)) {
            echo "<div class=echo><h6>Please fill out all fields.</h6></div>";
        } else {
            // Gets the login info from the database
            $sql = "SELECT * FROM userList WHERE username='$username' AND password = '$password' LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_assoc($result);
        }

        if (!$user) {
            echo "<h5>Username or password is incorrect.</h5>";         
        } else {
            // If user successfully signs in we redirect to a welcome page
            // again I DONT KNOW HOW THIS WORKS lol but it does
            if(isset($_SESSION['username'])) {
                header('Location: welcome.html');
                exit();
            } else if (isset($_POST['username'])) {
                $username = $_POST['username'];
                $_SESSION['username'] = $username;
                $url = "welcome.html";
                header('Location: welcome.html');
                exit();
            }
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

    <title>Log In/Create Account</title>
</head>

<body>
    <div>
        <h1> Log In </h1>
        <p>Welcome!</p>
        <form method="post">
            <div>
                <input type="text" placeholder="Username" name="username" required>
            </div>
            <div>
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div>
                <button type="submit">Submit</button>
                <p> Forgot password? Reset <a href="reset-password.php">here</a>.</p>
                <p> New to the site? Register <a href="createAccount.php">here</a>.</p>
            </div>
        </form>
        <?php
        if (isset($_GET["newpwd"])) {
            if ($_GET["newpwd"] == "passwordupdated") {
                echo '<p>Your password has been reset!</p>';
            }
        }
        ?>
    </div>
</body>
</html>