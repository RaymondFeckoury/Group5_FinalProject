<?php
    // Makes sure all session variables are destroyed
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