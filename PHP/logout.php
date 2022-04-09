<?php
    // creates a session puts it in an array and then destroys the session with the current user and log in
    session_start();
    $_SESSION = array();
    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<body>
    <h1>You have successfully logged out.</h1>
    <a href="../HTML/index.html">Home Page</a>
</body>

</html>