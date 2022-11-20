<?php
// part 1 of the password reset system. This script file will check if the email exists create the tokens used to ensure the correct user,
// generate the url for a reset password link, insert the data into a new password reset table, and send an email to the user. 

// checks that the user accessed the page correctly
if(isset($_POST["passBoxSubmit"])){

    //variable with login token
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    //create a clickable url to be sent to the email   ~~NEEDS CHANGING~~
    //add website url in here ~www.californiamobilitycenter.org/.../resetPass.php
    $url = "../resetPage.php?selector=" . $selector . "&validator=" . bin2hex($token);

    //sets expires to current time + 1hr
    $expires = date("U") + 1800;

    //create a new sql table passwordreset
    //  CREATE TABLE passReset
    //  passResetId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    //  passResetEmail TEXT NOT NULL,
    //  passResetSelector TEXT NOT NULL,
    //  passResetToken LONGTEXT NOT NULL,
    //  passResetExpires TEXT NOT NULL

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

    //creating email to send to user
    $to = $userEmail;

    $subject =  'PASSWORD RESET REQUEST';
    $message =  '<p> Recived a password reset request. The link to reset your password is below. If you did not make this request, you can ignore this email</p>';
    $message .= '<p>Here is your password reset link: </br>';
    $message .= '<a href="' . $url . '">' . $url . '</a></p>';

    $headers =  "From: CMC <test@test.com>\r\n";
    $headers .= "Reply-To: test@test.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);

    // header("Location: ../forgotPass.php?reset=success");
    // for testing -- skip email verification
    header("Location: $url");


} else{
    //kick back to login if accesssed incorrectly
    header("Location:../login.php");
}