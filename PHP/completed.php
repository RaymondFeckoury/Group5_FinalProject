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
    <link rel="stylesheet" type="text/css" href="completedStyle.php">
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
        echo "<table><tr><th>Company</th><th>Location</th><th>Job Title</th><th>Date</th><th>Work Style</th><th>Comments</th></tr>";
        echo "<tr><td>Amazon</td><td>Seattle</td><td>SWE</td><td>3/14/2022</td><td>In-Person</td><td>This is a comment.</td></tr></table>";
        // Puts all results of the sql query into the table
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Company: " . $row["company"]. " - Date: " . $row["date"]. " - Comments:" . $row["comments"]. "<br>";
        }
    } else {
        echo "You currently have 0 completed applications.";
    }
?>