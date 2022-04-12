<?php
    require('session.php');
    require('connDB.php');

    // If form data has been submitted
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $move = $_POST['move'];   
        $appid = $_POST['appSelect'];
        // If user wants to delete the application
        if ($_POST['move'] == 'offers') {
            // SQL queries to get information about the application we are moving
            $getCompany = "SELECT company FROM `completed` WHERE `completed`.`id` = $appid";
            $getLocation = "SELECT location FROM `completed` WHERE `completed`.`id` = $appid";
            $getJT = "SELECT jobTitle FROM `completed` WHERE `completed`.`id` = $appid";
            $getDate = "SELECT date FROM `completed` WHERE `completed`.`id` = $appid";
            $getWL = "SELECT workLocation FROM `completed` WHERE `completed`.`id` = $appid";
            $getComments = "SELECT comments FROM `completed` WHERE `completed`.`id` = $appid";

            // Executes the SQL queries
            $company = mysqli_query($conn, $getCompany);
            $location = mysqli_query($conn, $getLocation);
            $jobTitle = mysqli_query($conn, $getJT);
            $date = mysqli_query($conn, $getDate);
            $wl = mysqli_query($conn, $getWL);
            $comments = mysqli_query($conn, $getComments);

            // Moves the application to offers
            /*$toOffers = "INSERT INTO `offers` (`company`, `location`, `jobTitle`, `date`, `workLocation`, `comments`, `username`) VALUES ($company, $location, $jobTitle, $date, $wl, $comments, 'hardcoded')";
            mysqli_query($conn, $toOffers);*/

        } else if ($_POST['move'] == 'rejections') {
            // SQL queries to get information about the application we are moving
            $getCompany = "SELECT company FROM `completed` WHERE `completed`.`id` = $appid";
            $getLocation = "SELECT location FROM `completed` WHERE `completed`.`id` = $appid";
            $getJT = "SELECT jobTitle FROM `completed` WHERE `completed`.`id` = $appid";
            $getDate = "SELECT date FROM `completed` WHERE `completed`.`id` = $appid";
            $getComments = "SELECT comments FROM `completed` WHERE `completed`.`id` = $appid";

            // Executes the SQL queries
            $company = mysqli_query($conn, $getCompany);
            $location = mysqli_query($conn, $getLocation);
            $jobTitle = mysqli_query($conn, $getJT);
            $date = mysqli_query($conn, $getDate);
            $comments = mysqli_query($conn, $getComments);

            // Moves to rejections
            //$query2 = "INSERT INTO `Rejections` (`company`, `location`, `jobTitle`, `date`, `comments`, `username`) VALUES ('$company', '$location', '$jobTitle', '$date', '$comments', '" . $un . "');";
            //mysqli_query($conn, $query2);

        }

        $query = "DELETE FROM completed WHERE `completed`.`id` = $appid";
        mysqli_query($conn, $query);
        
        // Returns to the saved page
        header('Location: completed.php');
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
    <title>Completed</title>
</head>
<body>
    
    <!--This is the topnav-->
    <div class="topnav">
        <a class="active" href="../HTML/index.html">Home</a>
        <a href="newApplication.php">Add a New Application</a>
        <a href="saved.php">Saved Applications</a>
        <a href="">Upcoming Interviews</a>
        <a href="">Offers</a>
        <a href="">Rejections</a>
    </div>

    <!--This is the application modifying option-->
    <form method="post">
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