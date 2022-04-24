<?php
    require('session.php');
    require('connDB.php');

    // If form data has been submitted
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $move = $_POST['move'];   
        $appid = $_POST['appSelect'];
        // Deletes the rejection specified by the user
        $query = "DELETE FROM rejections WHERE `rejections`.`id` = $appid";
        mysqli_query($conn, $query);
        
        // Returns to the offers page
        header('Location: rejections.php');
        exit();
    }
?>
<html>
    <head>
        <!--Meta tags-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../CSS/index.css">
        <link rel="stylesheet" type="text/css" href="completedStyle.php">
        <title>Rejections</title>   
    </head>
    <body>
    <div class="topnav">
        <a class="active" href="../HTML/index2.html">Home</a>
    </div>
    
    <!--Delete by ID option-->
    <form method="post">
        <h1>Rejections:<h1>
        <label for="appSelect" style="font-size: 18px;">Select rejection id to delete:</label>
        <input type="number" id="appSelect" name="appSelect" min="1" max="500">
        <input type="submit" value="Delete Rejection"><br><br>
    </form>

    <?php
        $un = $_SESSION["username"];
        $sql = "SELECT * FROM rejections WHERE username='" . $un . "'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<table><tr><th>id</th><th>Company</th><th>Location</th><th>Job Title</th><th>Date</th><th>Work Style</th><th>Comments</th></tr>";
            while ($row = mysqli_fetch_assoc($result))
            {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["company"]. "</td><td>" . $row["location"] . "</td><td>" . $row["jobTitle"] . "</td><td>" . $row["date"] . "</td><td>" . $row["workLocation"] . "</td><td>" . $row["comments"] . "</td></tr>";
            }
        } else {
            echo "You currently have 0 rejections.";
        }
    ?>
    
    </body>
</html>