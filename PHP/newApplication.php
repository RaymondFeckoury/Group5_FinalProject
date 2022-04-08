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

<body>
    <div class=newApp>
        <form method="post">
            <input type="text" placeholder="Company" name="company"><br>
            <input type="text" placeholder="Date" name="date"><br>
            <input type="text" placeholder="Comments" name="comments"><br>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>