<?php
    session_start();
    require('connDB.php');

    // If form data has been submitted
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $company = $_POST['company'];
        $date = $_POST['date'];
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
    <link rel="stylesheet" type="text/css" href="../CSS/login.css">
    <title>Add Applicaton</title>
</head>
<body>
    <div class="create">
        <h1>Add a New Application</h1>
        <form method="post">
            <input type="text" placeholder="Company Name" name="company"><br>
            <input type="text" placeholder="Location" name="location"><br>
            <input type="text" placeholder="Date" name="date"><br>
            <input type="text" placeholder="Work Style" name="style"><br>
            <input type="text" placeholder="Job Title" name="title"><br>
            <input type="text" placeholder="Comments" name="comments"><br>
            <button type="submit">Submit</button><br><br>
            <a href="../HTML/index.html">Return To Home Page</a><br>
        </form>
    </div>
</body>

</html>