<?php
    require('session.php');
    require('connDB.php');

    // If form data has been submitted
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $move = $_POST['move'];   
        $appid = $_POST['appSelect'];
        // Deletes the offer specified by the user
        $query = "DELETE FROM interviews WHERE `interviews`.`id` = $appid";
        mysqli_query($conn, $query);
        
        // Returns to the offers page
        header('Location: interviews.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--Meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../CSS/index.css">
    <link rel="stylesheet" type="text/css" href="completedStyle.php">
    <title>Interviews</title>
</head>
<body>
    
    <!--This is the topnav-->
    <div class="topnav">
        <a class="active" href="../HTML/index2.html">Home</a>
        <a href="newInterview.php">Add Interview</a>
    </div>

    <!--This is the application modifying option-->
    <form method="post">
        <h1>Here are your Upcoming Interviews:</h1>
        <label for="appSelect">Select interview id to delete:</label>
        <input type="number" id="appSelect" name="appSelect" min="1" max="500">
        <input type="submit" value="Delete Interview"><br><br>
    </form>

</body>

</html>

<?php
    $un = $_SESSION["username"];
    $sql = "SELECT * FROM interviews WHERE username='" . $un . "'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // Table headers
        echo "<table><tr><th>id</th><th>Company</th><th>Location</th><th>Job Title</th><th>Date</th><th>Comments</th></tr>";
        // Puts all results of the sql query into the table
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["company"] . "</td><td>" . $row["location"] . "</td><td>" . $row["jobTitle"] . "</td><td>" . $row["date"] . "</td><td>" . $row["comments"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "You currently have 0 upcoming interviews.";
    }
?>