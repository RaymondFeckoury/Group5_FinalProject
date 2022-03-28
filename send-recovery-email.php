<?php
    // Includes mailer library and connects to database
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'connDB.php';

    // Makes sure that a user with that email exists
    $email = $_POST["email"];
    $sql = "SELECT * FROM userList WHERE email = '$email'";
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0)
    {
        // Generates a unique token which is sent via email
        $reset_token = time() . md5($email);
        // Saves this token in this user's database record
        $sql = "UPDATE userList SET reset_token='$reset_token' WHERE email='$email'";
        mysqli_query($connection, $sql);
        // This is the text that goes in the recovery email
        $message = "<p>Please click the link below to reset your password</p>";
        $message .= "<a href='http://localhost/Group5_Assignment4/Group5_FinalProject/reset-password.php?email=$email&reset_token=$reset_token'>";
        $message .= "Reset password";
        $message .= "</a>";
        send_mail($email, "Reset password", $message);
    }
    else
    {
        echo "Email does not exists";
    }

    // Sends the email via PHPMailer
    function send_mail($to, $subject, $message)
    {
        $mail = new PHPMailer(true);
    
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'your_gmail_address';                     // SMTP username
            $mail->Password   = 'your_gmail_password';                               // SMTP password
            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to
        
            $mail->setFrom('your_gmail_address', 'your_name');
            //Recipients
            $mail->addAddress($to);
        
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;
        
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

