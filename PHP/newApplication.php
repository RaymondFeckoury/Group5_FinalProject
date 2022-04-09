<?php
    session_start();
    require('connDB.php');

    // If form data has been submitted
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $company = $_POST['company'];
        $location = $_POST['location'];
        $date = $_POST['date'];

        $title = $_POST['title'];
        $comments = $_POST['comments'];
        if (empty($company)) { // Requires company name
            echo "<h5>Company name is required.</h5>";
        } else {
            // Inserts application info into the database
            $un = $_SESSION["username"];
            $query = "INSERT INTO `completed` (`company`, `date`, `comments`, `username`) VALUES ('$company', '$date', '$comments', '" . $un . "');";
            mysqli_query($conn, $query);
            // Returns to the completed page
            header('Location: completed.php');
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Applicaton</title>
    <link rel="stylesheet" type="text/css" href="../CSS/login.css">
</head>
<body>
    <div class="create">
        <h1>Add a New Application</h1>
        <form method="post">
            <div class="name-location-date">
                <input type="text" placeholder="Company Name" name="company"><br>
                <input type="text" placeholder="Location" name="location"><br>
                <label for="date">Date Applied:</label>
                <input type="date" id="date" name="date">
            </div>
            <div class="style-title">
                <h5>Work Style Options:</h5>
                <input type="checkbox" name="in-person" value="in-person">
                <label for="in-person">In-Person</label>
                <input type="checkbox" name="remote" value="remote">
                <label for="remote">Remote</label><br>
                <input type="checkbox" name="hybrid" value="hybrid">
                <label for="hybrid">Hybrid</label>
                <input type="checkbox" name="unclear" value="unclear">
                <label for="in-person">Unclear</label><br>
                <input type="text" placeholder="Job Title" name="title"><br>
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
            <a href="../HTML/index.html">Return To Home Page</a><br>
        </form>
    </div>
</body>

</html>