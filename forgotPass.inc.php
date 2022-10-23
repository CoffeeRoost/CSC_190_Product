<?php

if(isset($_POST["forgotPass-submit"])){

    //create a secure login token
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    //create a clickable url to be sent to the email
    //add website url in here ~www.something.com/.../create-new-password.php
    $url = " .../create-new-password.php?Selector=" . $selector . "&validator=" . bin2hex($token);

    //makes the token fail after 1800 seconds
    $expires = date("U") + 1800;

    //create a new sql table passwordreset
    //CREATE TABLE pwdReset
    //  pwdresetId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    //  pwsResetEmail TEXT NOT NULL,
    //  pwdResetToken LONGTEXT NOT NULL,
    //  pwdResetExpires TEXT NOT NULL

    require 'dbh.inc.php';

    $userEmail = $_POST["email"];

    // delete any possible previous enteries in the database from the user
    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an error!";
        exit();
    }
    else{
        myslqi_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }


    // insert everything from the script to the sql database
    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an error!";
        exit();
    }
    else{
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        myslqi_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    //creating email to send to user
    $to = $userEmail;

    $subject =  'PASSWORD RESET';
    $message =  '<p> Recived a password reset request. The link to reset your password is below. If you did not make this request, you can ignore this email</p>';
    $message .= '<p>Here is your password reset link: </br>';
    $message .= '<a href="' . $url . '">' . $url . '</a></p>';

    $headers =  "From: CMC <test@test.com>\r\n";
    $headers .= "Reply-To: test@test.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);

    header("Location: ../reset-password.php?reset=success");



} else{
    header("Location:.../index.php");
}