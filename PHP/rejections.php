<?php
    require('session.php');
    require('connDB.php');
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
        <a class="active" href="../HTML/index.html">Home</a>
        <a href="newApplication.php">Add a New Application</a>
        <a href="saved.php">Saved Applications</a>
        <a href="">Upcoming Interviews</a>
        <a href="">Offers</a>
    </div>
    <br>
    <br>
    <?php
        $un = $_SESSION["username"];
        $sql = "SELECT * FROM rejections WHERE username='" . $un . "'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result))
            {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["company"]. "</td><td>" . $row["location"] . "</td><td>" . $row["jobTitle"] . "</td><td>" . $row["date"] . "</td><td>" . $row["workLocation"] . "</td><td>" . $row["comments"] . "</td></tr>";
            }
        } else {
            echo "You currently have 0 rejections applications.";
        }


    ?>
    
    </body>
</html>