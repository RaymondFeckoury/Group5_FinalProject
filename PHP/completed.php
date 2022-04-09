<?php
    session_start();
    require('connDB.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--Meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../CSS/index.css">
    <title>Completed</title>
</head>
<body>
    <div class="topnav">
        <a class="active" href="../HTML/index.html">Home</a>
        <a href="newApplication.php">Add a New Application</a>
        <a href="">Saved Applications</a>
        <a href="">Upcoming Interviews</a>
    </div>
    <h1>Here are your completed applications:</h1>
</body>

</html>

<?php
    $un = $_SESSION["username"];
    echo $un;
    $sql = "SELECT * FROM completed WHERE username='" . $un . "'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Company: " . $row["company"]. " - Date: " . $row["date"]. " - Comments:" . $row["comments"]. "<br>";
        }
    } else {
        echo "You currently have 0 completed applications.";
    }
?>