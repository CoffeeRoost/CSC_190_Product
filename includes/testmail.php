<?php
// Include configuration file
require_once './email_config.inc.php';
require './PHPMailer.php';
require './SMTP.php';
require './Exception.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


// Create a new PHPMailer instance
$mail = new PHPMailer;

// Set up SMTP connection
$mail->isSMTP();
$mail->Host = SMTP_HOST;
$mail->Port = SMTP_PORT;
$mail->SMTPAuth = true;
$mail->Username = SMTP_USERNAME;
$mail->Password = SMTP_PASSWORD;

// Set up email content
$mail->setFrom(EMAIL_FROM, EMAIL_FROM_NAME);
$mail->addAddress('thinhnguyen1961973@gmail.com', 'thinhNguyen');
$mail->Subject = 'Test email';
$mail->Body = 'This is a test email 2 sent from PHPMailer.';

// Send the email
if ($mail->send()) {
    echo 'Email sent successfully.';
} else {
    echo 'Email could not be sent. Error: ' . $mail->ErrorInfo;
}
?>
