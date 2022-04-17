<?php
    session_start();
    require('connDB.php');

    // If form data has been submitted
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $company = $_POST['company'];
        $location = $_POST['location'];
        $date = $_POST['date'];
        $workLocation = $_POST['worklocation'];
        $title = $_POST['jobtitle'];
        $comments = $_POST['comments'];
        if (empty($company)) { // Requires company name
            echo "<h5>Company name is required.</h5>";
        } else {
            // Inserts application info into the database
            $un = $_SESSION["username"];
            $query = "INSERT INTO `interviews`(`company`, `location`, `jobTitle`, `date`, `comments`, `username`) VALUES ('$company', '$location', '$title', '$date', '$comments', '" . $un . "');";
            mysqli_query($conn, $query);
            // Returns to the completed page
            header('Location: interviews.php');
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Interview</title>
    <link rel="stylesheet" type="text/css" href="../CSS/login.css">
</head>
<body>
    <div class="create">
        <h1>Add a New Interview</h1>
        <form method="post">
            <div class="name-location-date">
                <input type="text" placeholder="Company Name" name="company"><br>
                <input type="text" placeholder="Location (State, City, etc.)" name="location"><br>
                <input type="text" placeholder="Job Title" name="jobtitle">
            </div>
            <div class="style-title">
                <label for="date">Interview Date:</label>
                <input type="date" id="date" name="date"><br>
            </div>
            <div class="comments">
                <hr>
                <input type="text" placeholder="Comments" name="comments"><br>
            </div>
            <div class="buttons">
                <br>
                <button type="submit">Submit</button>
                <input type="reset"><br><br>
            </div>
            <a href="../HTML/index2.html">Return To Home Page</a><br>
        </form>
    </div>
</body>

</html>