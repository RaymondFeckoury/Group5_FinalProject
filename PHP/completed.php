<!DOCTYPE html>
<html lang="en">

<body>
    <a href="newApplication.php">Click to add new application</a>
    <h1>Here are your completed applications:</h1>
</body>

</html>

<?php 
    session_start();
    require('connDB.php');
    $un = $_SESSION["username"];
    $sql = "SELECT * FROM completed WHERE username='$un'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          echo "Company: " . $row["company"]. " - Date: " . $row["date"]. " - Comments:" . $row["comments"]. "<br>";
        }
    } else {
        echo "You currently have 0 completed applications.";
    }
?>