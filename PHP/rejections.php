<?php
    include('session.php');
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
    <?php
        echo "<table><tr><th>id</th><th>Company</th><th>Location</th><th>Job Title</th><th>Date</th><th>Work Style</th><th>Comments</th></tr>";

    ?>
    
    </body>
</html>