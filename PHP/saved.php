<?php
    require('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--Meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../CSS/index.css">
    <link rel="stylesheet" type="text/css" href="completedStyle.php">
    <title>Saved</title>
</head>
<body>
    <div class="topnav">
        <a class="active" href="../HTML/index2.html">Home</a>
        <a href="newSaved.php">Save a New Application</a>
        <a href="completed.php">Completed Applications</a>
        <a href="">Upcoming Interviews</a>
    </div>
    <h1>Here are your saved applications:</h1>
</body>

</html>

<?php
    $un = $_SESSION["username"];
    $sql = "SELECT * FROM saved WHERE username='" . $un . "'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // Table headers
        echo "<table><tr><th>Priority Ranking</th><th>Company</th><th>Location</th><th>Job Title</th><th>Date</th><th>Work Style</th><th>Comments</th></tr>";
        // Puts all results of the sql query into the table
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["priority"]. "</td><td>" . $row["company"]. "</td><td>" . $row["location"] . "</td><td>" . $row["jobTitle"] . "</td><td>" . $row["date"] . "</td><td>" . $row["workLocation"] . "</td><td>" . $row["comments"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "You currently have 0 saved applications.";
    }
?>