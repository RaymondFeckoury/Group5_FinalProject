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
    <title>Completed</title>
</head>
<body>
    <div class="topnav">
        <a class="active" href="../HTML/index.html">Home</a>
        <a href="newApplication.php">Add a New Application</a>
        <a href="saved.php">Saved Applications</a>
        <a href="">Upcoming Interviews</a>
    </div>
    <form method="post" action="">
        <h1>Here are your completed applications:</h1>
        <label for="appSelect">Select Application id to Modify:</label>
        <input type="number" id="appSelect" name="appSelect" min="1" max="500">
        <select name="move">
            <option value="delete">Delete</option>
            <option value="offers">Move to Offers</option>
            <option value="rejections">Move to Rejections</option>
        </select>
        <input type="submit" value="Submit Changes"><br><br>
    </form>

</body>

</html>

<?php
    $un = $_SESSION["username"];
    $sql = "SELECT * FROM completed WHERE username='" . $un . "'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // Table headers
        echo "<table><tr><th>id</th><th>Company</th><th>Location</th><th>Job Title</th><th>Date</th><th>Work Style</th><th>Comments</th></tr>";
        // Puts all results of the sql query into the table
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["company"]. "</td><td>" . $row["location"] . "</td><td>" . $row["jobTitle"] . "</td><td>" . $row["date"] . "</td><td>" . $row["workLocation"] . "</td><td>" . $row["comments"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "You currently have 0 completed applications.";
    }
?>