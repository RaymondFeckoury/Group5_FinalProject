<?php
    require('connDB.php');
    $email = $_POST["email"];
    $reset_token = $_POST["reset_token"];
    $new_password = $_POST["new_password"];
    
    $sql = "SELECT * FROM userList WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
    {
        $user = mysqli_fetch_object($result);
        if ($user->reset_token == $reset_token)
        {
            $sql = "UPDATE userList SET password='$new_password' WHERE email='$email' AND reset_token='$reset_token'";
            mysqli_query($conn, $sql);
            echo "Password has been changed";
        }
        else
        {
            echo "Recovery email has been expired";
        }
    }
    else
    {
        echo "Email does not exists";
    }
?>