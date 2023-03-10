<?php
// part 1 of the password reset system. This script file will check if the email exists create the tokens used to ensure the correct user,
// generate the url for a reset password link, insert the data into a new password reset table, and send an email to the user. 

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';
require_once './email_config.inc.php';
require './PHPMailer.php';
require './SMTP.php';
require './Exception.php';

// checks that the user accessed the page correctly
if(isset($_POST["passBoxSubmit"])){

    //variable with login token
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    //create a clickable url to be sent to the email   
    $url = "http://54.67.115.77/resetPage.php?selector=" . $selector . "&validator=" . bin2hex($token);

    //sets expires to current time + 1hr
    $expires = date("U") + 1800;

    require 'dbh.inc.php';

    $userEmail = $_POST["email"];

    // delete any possible previous reset requests from the user in the database
    $sql = "DELETE FROM passReset WHERE passResetEmail=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an error!";
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }


    // insert new data into the database
    $sql = "INSERT INTO passReset (passResetEmail, passResetSelector, passResetToken, passResetExpires) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an error!";
        exit();
    }
    else{
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
    $sender = EMAIL_FROM;
    $senderName = EMAIL_FROM_NAME;
    $recipient = $userEmail;

    // Replace smtp_username with your Amazon SES SMTP user name.
//    $usernameSmtp = 'AKIA5GFPXH3WQE56FMPY';
$usernameSmtp = SMTP_USERNAME;

    // Replace smtp_password with your Amazon SES SMTP password.
//    $passwordSmtp = 'BBjXl6ukU/eaCByNjtCD0oazr8a1rzTM419aO4NGDUIE';
$passwordSmtp = SMTP_PASSWORD;

//    $host = 'email-smtp.us-west-1.amazonaws.com';
//    $port = 587;
$host = SMTP_HOST;
$port = SMTP_PORT;


    $subject =  'PASSWORD RESET REQUEST';
    $bodyHtml =  '<p> Recived a password reset request. The link to reset your password is below. If you did not make this request, you can ignore this email</p>';
    $bodyHtml .= '<p>Here is your password reset link: </br>';
    $bodyHtml .= '<a href="' . $url . '">' . $url . '</a></p>';


    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->setFrom($sender, $senderName);
        $mail->Username = $usernameSmtp;
        $mail->Password = $passwordSmtp;
        $mail->Host = $host;
        $mail->Port = $port;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
//        $mail->addCustomHeader('X-SES-CONFIGURATION-SET', $configurationSet);
        $mail->addAddress($recipient);
        $mail->isHTML(true);
        $mail->Subject    = $subject;
        $mail->Body       = $bodyHtml;
//        $mail->AltBody    = $bodyText;
        $mail->Send();
        echo "Email sent!" , PHP_EOL;
    } catch (Exception $e) {
        echo "Email not sent. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
    }
} else{
    //kick back to login if accesssed incorrectly
    header("Location:../login.php");
}

?>