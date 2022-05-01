<?php
  require('session.php');
  require('connDB.php');

  echo '<script>alert("goes in the file")</script>';
  $sql = "SELECT * FROM userlist WHERE username = '".$_SESSION["username"]."'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $verfiy = password_verify($_POST["oldPassword"],$row["password"]);
    if($verfiy){
        if($_POST["Password"] == $_POST["confirmPassword"])
        {
            $hash = password_hash($_POST["Password"],PASSWORD_DEFAULT);
            $sqlQ = "UPDATE userlist SET password = '".$hash."' WHERE username = '".$_SESSION["username"]."'";
            echo '<script>alert("Password Updated")</script>';
            header('Location: ../PHP/profile.php');
        } 
        else {
            echo '<script>alert("Password Do not match")</script>';
            header('Location: ../PHP/profile.php');
        }
    } else {
      echo '<script>alert("You entered incorrect password")</script>';
      header('Location: ../PHP/profile.php');
    }
  }
?>