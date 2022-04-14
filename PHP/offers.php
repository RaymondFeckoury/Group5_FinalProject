<?php
    require('session.php');
    require('connDB.php');

    // If form data has been submitted
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $move = $_POST['move'];   
        $appid = $_POST['appSelect'];
        // If user wants to delete the offer
        if ($move == 'offers') {
            $query = "DELETE FROM offers WHERE `completed`.`id` = $appid";
            mysqli_query($conn, $query);
        } 
        
        // Returns to the offers page
        header('Location: offers.php');
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
        <a href="newOffer.php">Add New Offer</a>
        <a href="completed.php">Completed Applications</a>
        <a href="saved.php">Saved Applications</a>
        <a href="">Upcoming Interviews</a>
        <a href="">Rejections</a>
    </div>

    <!--This is the application modifying option-->
    <form method="post">
        <h1>Here are your current offers:</h1>
        <label for="appSelect">Select offer id to delete:</label>
        <input type="number" id="appSelect" name="appSelect" min="1" max="500">
        <input type="submit" value="Delete Offer"><br><br>
    </form>

</body>

</html>

<?php
    $un = $_SESSION["username"];
    $sql = "SELECT * FROM offers WHERE username='" . $un . "'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // Table headers
        echo "<table><tr><th>Company</th><th>Location</th><th>Job Title</th><th>Date</th><th>Work Style</th><th>Comments</th></tr>";
        // Puts all results of the sql query into the table
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["company"]. "</td><td>" . $row["location"] . "</td><td>" . $row["jobTitle"] . "</td><td>" . $row["date"] . "</td><td>" . $row["workLocation"] . "</td><td>" . $row["comments"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "You currently have 0 offers.";
    }
?>