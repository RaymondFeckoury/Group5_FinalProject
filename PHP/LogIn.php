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
            $sql = "SELECT * FROM userList WHERE username='$username'";
            $result = mysqli_query($conn, $sql);
            $users = mysqli_fetch_assoc($result);
        }

        if (!$users) {
            echo "<h5>Username or password is incorrect.</h5>";         
        } else {
            // If user successfully signs in we redirect to a welcome page
            // again I DONT KNOW HOW THIS WORKS lol but it does
            
            while($users){
                $verfiy = password_verify($password, $users["password"]);
                if ($verfiy){
                    if(isset($_SESSION['username'])) {
                        header('Location: ../HTML/index2.html');
                        exit();
                    } else if (isset($_POST['username'])) {
                        $username = $_POST['username'];
                        $_SESSION["username"] = $username;
                        $url = "../HTML/index2.html";
                        header('Location: ../HTML/index2.html');
                        exit();
                    }
                } 
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
    <link rel="stylesheet" type="text/css" href="../CSS/login.css">
</head>

<body>
    <div class = "create">
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
                <button type="submit">Submit</button><br><br>
                <a class="forgotLink" href="forgotPassword.php">Forgot Password?</a>
                <p> New to the site? Register <a href="createAccount.php">here</a>.</p>
                <a href="../HTML/index.html">Return To Home Page</a>
            </div>
        </form>
    </div>
</body>
</html>